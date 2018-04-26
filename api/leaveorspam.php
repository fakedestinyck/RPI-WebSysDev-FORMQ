<?php
include "Library_Mongo.php";
use Library_Mongo as Mongo;
$dbo = new Mongo();

if (!isset($_GET['action'])) {
    die('No direct script access allowed.');
}

$action = $_GET['action'];
$d = $_GET['rcsid'];
$dd = $dbo->selectSIS('users','user',array('rcsid'=>$d));
$email = $dd[0]['user']['email'];
$real_rcsid = $dd[0]['user']['rcsid'];
if ($d == crypt($email,$real_rcsid)) {
    $du = $dd[0]['_id'];
    $dbo->updateSIS('users',array("current_num"=>$s[0]['group']['current_num']-1, "desired_num"=>$s[0]['group']['desired_num']+1),'group',array('group_id'=> $s[0]['group']['group_id']));
    $dbo->updateSIS('users',array("group_id"=>0,"name"=>""),'group',array(),array('_id'=>$du));
    echo 'Successfully removed from group!';
    if ($action == 'spam') {
        $success = $dbo->updateSIS('users',array('reported'=>'yes'),'user',array('rcsid'=>$d));
        if ($success) {
            echo 'Successfully report user '.$d;
        }
    }
} else {
    die('Invalid access');
}
