<?php
/**
 * Mongo API
 *
 * param: array('id'=>1)
 * Similar to: where id=1
 *
 * param: array('id'=>1,'num'=>10)
 * Similar to: where id=1 and num=10
 *
 * param: array('id'=>array($mongo->cmd('>')=>3))
 * Similar to: where id>3
 *
 * param: array('id'=>array($mongo->cmd('!=')=>3))
 * Similar to: where id!=3
 *
 * param: array('id'=>array($mongo->cmd('>')=>5, $mongo->cmd('<')=>10))
 * Similar to: where id>5 and id<10
 *
 * param: array('id'=>array($mongo->cmd('in')=>array(2,3,8)))
 * Similar to: where id in (2,3,8)
 *
 * param: array('id'=>array($mongo->cmd('%')=>array(3,1)))
 * Similar to: where id % 3 = 1
 *
 * param: array($mongo->cmd('or') => array( array('id'=>array($mongo->cmd('>')=>2)), array('id'=>array($mongo->cmd('<')=>10)) ) )
 * Similar to: where id>2 or id<10
 *
 **/

class Library_Mongo {

    /**
     * Mongo object
     *
     * @var object Mongo
     */
    private $_mongo = null;

    /**
     * current database
     *
     * @var object MongoDB
     */
    private $_db = null;

    /**
     * command prefix
     *
     * @var string
     */
    private $_cmd = '$';


    /**
     * @var boolean
     */
    const DEBUG = TRUE;

    /**
     * @var array
     */
    private $_condMap = array(
        '<'=>'lt',
        '<='=>'lte',
        '>'=>'gt',
        '>='=>'gte',
        '!='=>'ne',
        '%'=>'mod',
        'in'=>'in', // id in (2,3,8)
        'notin'=>'nin',// id not in (2,3,8)
        'or'=>'or', // id=1 or id=2
        'not'=>'not', // !(id=1)
    );


    /**
     * Constructor
     *
     */
    public function __construct(){
        try {
            $this->_mongo = new MongoClient();
        }catch (MongoConnectionException $e){
            if(self::DEBUG) {
                echo $e->getMessage();
            }
            return false;
        }
        $this->_db = $this->_mongo->formq;
    }

    /**
     * @param string $option Command, if empty, return command prefix
     *
     * @return string
     */
    public function cmd($option=''){
        if($option == ''){
            return $this->_cmd;
        }
        if(isset($this->_condMap[$option])){
            $option = $this->_condMap[$option];
        }
        return $this->_cmd.$option;
    }

    /**
     * Insert into database
     *
     * insert into $colName set id=10086,name='Psama';
     *
     * @param string $colName Collection name
     * @param array $sets Data , like: array('id'=>10086,'name'=>'Psama')
     * @param boolean $safe Safe mode? true:wait for server response
     * @param boolean $fsync Whether sync immediately. Default is decided by the server
     *
     * @return boolean
     */
    public function insert($colName, $sets, $safe=true, $fsync=false){
        $col = $this->_getCol($colName);
        try {
            $col->insert($sets,array('w'=>$safe,'fsync'=>$fsync));
            return true;
        }catch (MongoCursorException $e){
            return false;
        }
    }

    /**
     * If there is a column '_id' in $sets, update data. Otherwise insert new data.
     *
     * @param string $colName Collection name
     * @param array $sets Data , like: array('id'=>10086,'name'=>'Psama')
     * @param boolean $safe Safe mode? true:wait for server response; false otherwise
     * @param boolean $fsync Whether sync immediately. Default is decided by the server
     *
     * @return boolean
     */
    public function save($colName, $sets, $safe=false, $fsync=false){
        $sets = $this->_parseId($sets);
        $ret = $this->_getCol($colName)->save($sets,array('w'=>$safe,'fsync'=>$fsync));
        return $ret;
    }

    /**
     * Update data records
     *
     * Like mysql: update $colName set name='Psama' where id=10086;
     *
     * @param string $colName Collection name
     * @param array $newDoc New data
     * @param array $query Search criteria. If it is an empty array, update all rows
     * @param string $option These options are available:
     * @param boolean $upAll Whether to update all found data
     * @param boolean $upsert Whether to insert new data when $query is not found
     * @param boolean $safe Safe delete? true:wait for server response; false otherwise
     * @param boolean $fsync Whether sync immediately. Default is decided by the server
     *
     * 'set': Only update specific section（update data. Otherwise insert new data.）.
     * Example: update('user', array('name'=>'Psama'), array('id'=>10806));
     * Similar to: update user set name='Psama' where id=10806;
     *
     * 'inc': self increment (If value is negative, then --, create new if not exist. Section type must be number)
     * Example: update('user', array('num'=>1), array('id'=>10086), 'inc');
     * Similar to: update user set num=num+1 where id=10086;
     *
     * 'push': Add data to a specific section (array), create a new one if key not exists. Otherwise, add to the end of the key
     * Example: update('user', array('rin'=>array('rinid'=>1,'rinnum'=>'12345')), array('id'=>1), 'push');
     * Which means: Add a 'rin' section to id = 1 which value is: array('rinid'=>1,'rinnum'=>'12345').
     *
     * 'pop': Delete the value in a specific section
     * Example: update('user', array('rin'=>array('rinid'=>1)), array('id'=>1), 'pop');
     * Which means: Remove from section 'rin' where 'rinid'= 1 where where id = 1.
     *
     * 'addToSet': Add if not exist
     * Example: update('user', array('names'=>'Psama'), array('id'=>1), 'addToSet');
     * Which means: In user collection, add 'Psama' to names where id=1 if not exist
     *
     * 'replace': Use $newDoc to substitute the data that $query found
     * Example: update('user', array('newid'=>1,'newnames'=>'Osama'), array('id'=>1), 'replace');
     * Which means: Substitute corresponding data with new data: array('newid'=>1,'newnames'=>'name1') where id = 1

     *
     * @return boolean
     */
    public function update($colName,$newDoc,$query=array(),$option='set',$upAll=true,$upsert=false,$safe=false,$fsync=false){
        $query = $this->_parseId($query);
        $col = $this->_getCol($colName);
        if($option != 'replace'){
            $newDoc = array($this->cmd($option) => $newDoc);
        }
        $options = array(
            'upsert'=>$upsert,
            'multiple'=>$upAll,
            'w'=>$safe,
            'fsync'=>$fsync,
        );
        return $col->update($query,$newDoc,$options);
    }

    /**
     * Similar to mysql - select * from table
     *
     * Example: select('user');
     * Similar to: select * from user;
     *
     * Example: select('user',array('id','name'));
     * Similar to: select id,name from user;
     *
     * Example: select('user',array('id'=>1),array('id','name'));
     * Similar to: select id,name from user where id=1;
     *
     * Example: select('user',array('id'=>1),array('id','name'),array('num'=>1));
     * Similar to: select id,name from user where id=1 order by num asc;
     *
     * Example: select('user',array('id'=>1),array('id','name'),array('num'=>1),10);
     * Similar to: select id,name from user where id=1 order by num asc limit 10;
     *
     * Example: select('user',array('id'=>1),array('id','name'),array('num'=>1),10,5);
     * Similar to: select id,name from user where id=1 order by num asc limit 5,10;
     *
     *
     *
     * @param string $colName Collection name
     * @param array $query Search criteria
     * @param array $fields Returned section name, array(): all sections; array('id','name'): only return "id,name"
     * @param array $sort Sort by, array('id'=>1): sort by id ,ascending; array('id'=>-1): sort by id, descending; array('id'=>1, 'age'=>-1): sort by id then age
     * @param int $limit Number of rows of data to get
     * @param int $skip Skip x rows of data. (Start from row number x)
     *
     * @return array
     */
    public function select($colName,$query=array(),$fields=array(),$sort=array(),$limit=0,$skip=0){
        $col = $this->_getCol($colName);
        $query = $this->_parseId($query);
        $cursor  = $col->find($query,$fields);
        if($sort){
            $cursor->sort($sort);
        }
        if($skip > 0){
            $cursor->skip($skip);
        }
        if($limit > 0){
            $cursor->limit($limit);
        }
        $result = array();
        foreach($cursor  as $row){
            $result[] = $this->_parseArr($row);
        }
        return $result;
    }

    /**
     * @param string $colName Collection name
     * @param string $sectionName The section in which you want to search
     * @param array $sectionQuery Search criteria inside the section
     * @param array $fields Returned section name, array(): all sections; array('id','name'): only return "id,name"
     * @param array $query Search criteria
     * @param array $sort Sort by, array('id'=>1): sort by id ,ascending; array('id'=>-1): sort by id, descending; array('id'=>1, 'age'=>-1): sort by id then age
     *
     * Example: selectSIS('users','user',array('email'=>'em@i.l','name'=>'Psama'),array('id'=>1));
     * Similar to: select rows in users collection where id = 1 AND where (email=em@i.l and name=Psama in section user)
     *
     * @return array
     */
    public function selectSIS($colName,$sectionName,$sectionQuery=array(),$fields=array(),$query=array(),$sort=array()){
        $result = array();
        $tmpResult = $this->select($colName,$query,array(),$sort,0,0);
        foreach ($tmpResult as $row){
            $section = $row[$sectionName];
            $match = true;
            foreach ($sectionQuery as $key => $value) {
                if ($section[$key] != $value) {
                    $match = false;
                    break;
                }
            }
            if ($match) {
                if (count($fields) == 0) {
                    $result[] = $row;
                } else {
                    $resultSection = array();
                    foreach ($fields as $field) {
                        $resultSection[$field] = $row[$field];
                    }
                    $result[] = $resultSection;
                }
            }
        }
        return $result;
    }

    /**
     * Update data in a specific section in a (some) rows
     *
     * @param string $colName Collection name
     * @param array $newContent New data
     * @param string $sectionName The section that is to be changed
     * @param array $query Search criteria. If it is an empty array, update all rows
     * @param bool $safe Safe delete? true:wait for server response; false otherwise
     * @param bool $fsync Whether sync immediately. Default is decided by the server
     */
    public function updateSIS($colName,$newContent,$sectionName,$query=array(),$safe=false,$fsync=false){

    }

    /**
     * Return number of rows
     *
     * @param string $colName Collection name
     * @param array $query Search criteria
     * @param int $limit Number of rows of data to get
     * @param int $skip Skip x rows of data. (Start from row number x)
     * @return int
     */
    public function count($colName,$query=array(),$limit=0,$skip=0){
        return $this->_getCol($colName)->count($query,$limit,$skip);
    }

    /**
     * Return one row from collection
     *
     * @param string $colName Collection name
     * @param array $query Search criteria
     * @param array $fields Returned section name, array(): all sections; array('id','name'): only return "id,name"
     *
     * @return array
     */
    public function fetchRow($colName,$query=array(), $fields=array()){
        $col = $this->_getCol($colName);
        $query = $this->_parseId($query);
        return $this->_parseArr($col->findOne($query,$fields));
    }

    /**
     * Return the value in a specific section with some criterion (the first one)
     *
     * @param string $colName Collection name
     * @param array $query Search criteria
     * @param string $fields Returned section name, default is "_id"
     *
     * @return mixed
     */
    public function fetchOne($colName,$query=array(), $fields='_id'){
        $ret = $this->fetchRow($colName,$query,array($fields));
        return isset($ret[$fields]) ? $ret[$fields] : false;
    }

    /**
     * Return all values in a specific section with some criterion
     *
     * @param string $colName Collection name
     * @param array $query Search criteria
     * @param string $fields Returned section name, default is "_id"
     *
     * @return array
     */
    public function fetchCol($colName,$query=array(), $fields='_id'){
        $result = array();
        $list = $this->select($colName,$query,array($fields));
        foreach ($list as $row){
            $result[] = $row[$fields];
        }
        return $result;
    }

    public function close(){
        $this->_mongo->close();
    }

    public function getError(){
        return $this->_db->lastError();
    }

    private function _parseId($arr){
        if(isset($arr['_id'])){
            $arr['_id'] = new MongoId($arr['_id']);
        }
        return $arr;
    }

    private function _getCol($colName){
        return $this->_db->selectCollection($colName);
    }


    private function _parseArr($arr){
        if(!empty($arr)) {
            $ret = (array)$arr['_id'];
            $arr['_id'] = $ret['$id'];
        }
        return $arr;
    }
}