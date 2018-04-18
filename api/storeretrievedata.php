<?php defined('login') or die('No direct script access allowed.');
include_once("../CAS-1.3.5/CAS.php");
include_once("connect.php");
include "Library_Mongo.php";
use Library_Mongo as Mongo;

if (!phpCAS::isAuthenticated()) {
    header("Location: ../login.php");
}
$user_exists = false;
$rcsid = strtolower(phpCAS::getUser());
// search for produce that is sweet. Taste is a child of Details.
$userQuery = array('user.rcsid' => $rcsid);
$result = $collection->findOne($userQuery);
if ($result != null) {
    $user_array=$result["user"];
    $_SESSION["name"] = $user_array["name"];
    $_SESSION["rin"] = $user_array["rin"];
    $_SESSION["email"] = $user_array["email"];
    $_SESSION["role"] = $user_array["role"];
    $encrypt = crypt(md5($user_array["name"].$user_array["email"].$user_array["role"]),md5(md5($user_array["rin"])));
    $_SESSION["token"] = $encrypt;
    $_SESSION["last_activity"] = time();
    $user_exists = true;
}
$_SESSION['rcsid'] = $rcsid;
if (!$user_exists) {
    $dbo = new Mongo();
    $id = $dbo->selectSIS('users','user',array(),array('user'),array(),array('_id'=>-1),1)[0]['user']['user_id'] + 1;
    $document = array(
        "user" => array("user_id" => $id, "name" => "", "rin" => 0, "rcsid" => $rcsid, "role" => 2, "email" => "", "in_group" => "no"),
        "group" => array("group_id" => $id, "name" => "", "current_num" => 1, "desired_num" => 0,
            "group_members" => array("member1" => $rcsid, "member2" => "", "member3" => "", "member4" => "", "member5" => "", "member6" => "", "member7" => "", "member8" => "", "member9" => ""),
            "group_answers" => array("q1" => "", "q2" => "", "q3" => "", "q4" => "", "q5" => "", "q6" => 0, "q7" => 0, "q8" => 0, "q9" => 0, "q10" => 0, "q11" => 0, "q12" => 0, "q13" => "", "q14" => "")
        ),
        "profile" => array("age" => 0, "year" => 0, "budget" => 0, "gender" => "", "coed" => "", "on/off campus" => ""),
        "answers" => array("q1" => "", "q2" => "", "q3" => "", "q4" => "", "q5" => "", "q6" => 0, "q7" => 0, "q8" => 0, "q9" => 0, "q10" => 0, "q11" => 0, "q12" => 0, "q13" => "", "q14" => "")
    );
    $err = $dbo->insert('users',$document);
    if ($err != true) {
        http_response_code(500);
    } else {
        $_SESSION["name"] = "";
        $_SESSION["rin"] = 0;
        $_SESSION["email"] = "";
        $_SESSION["role"] = 2;
        $encrypt = crypt(md5("2"),md5(md5("0")));
        $_SESSION["token"] = $encrypt;
        $_SESSION["last_activity"] = time();
    }
}
