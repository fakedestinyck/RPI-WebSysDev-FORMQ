<?php defined('login') or die('No direct script access.');
include_once("./CAS-1.3.5/CAS.php");
include_once("connect.php");
if (!phpCAS::isAuthenticated()) {
    header("Location: login.php");
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
    $user_exists = true;
}
$_SESSION['rcsid'] = $rcsid;
