<?php
include "api/Library_Mongo.php";
use Library_Mongo as Mongo;
$dbo = new Mongo();

if (isset($_GET['d'])){
    $d = $_GET['d'];
    $dd = $dbo->selectSIS('users','user',array('rcsid'=>$d));
    $du = $dd[0]['_id'];
    $dbo->updateSIS('users',array("current_num"=>$s[0]['group']['current_num']-1, "desired_num"=>$s[0]['group']['desired_num']+1),'group',array('group_id'=> $s[0]['group']['group_id']));
    $dbo->updateSIS('users',array("group_id"=>0,"name"=>""),'group',array(),array('_id'=>$du));
    header("Refresh:0; url=user_dashboard.php");

};