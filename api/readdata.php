<?php defined('profile') or die('No direct script access allowed.');
include "Library_Mongo.php";
use Library_Mongo as Mongo;

$dbo = new Mongo();
$rcsid = $_SESSION['rcsid'];
$result = $dbo->selectSIS('users','user',array('rcsid'=>$rcsid),$column)[0];

if (count($result) == 0) {
    header('HTTP/1.0 500 Internal Server Error');
    include_once('error/500.php');
    die;
}

for ($i = 0; $i<count($column); $i++) {
    $columnData[$i][$column[$i]] = $result[$column[$i]];
}