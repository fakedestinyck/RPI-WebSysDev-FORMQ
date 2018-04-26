<?php
include "Library_Mongo.php";
use Library_Mongo as Mongo;

session_start();

$dbo = new Mongo();

if (!isset($_POST['action'])) {
    http_response_code(405);
    include_once('../error/405.php');
}

header('Content-Type: application/json');

$all_users = $dbo->select("users");


$response = array();
$response = [
    "status" => 0,
    "error" => null,
    "users" => $all_users
];

echo json_encode($response);