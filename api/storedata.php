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

$action = $_POST['action'];
$content = json_decode($_POST['content'],true);
$column = json_decode($_POST['column'],true);
$rcsid = $_SESSION["rcsid"];
$email = $_POST["email"];

$id = $dbo->selectSIS('users','user',array('rcsid'=>$rcsid),array('_id'))[0]['_id'];

$err = false;
$success = true;
if ($action == "store") {
    for ($i=0;$i<count($content);$i++) {
        $thisContent = $content[$i];
        $thisColumn = $column[$i];
        if ($thisColumn == "group_answers") {
            $thisColumn = "group";
            $success = $dbo->updateSIS('users',array("group_answers" => $thisContent),$thisColumn,array(),array('_id'=>$id));
        } else {
            $success = $dbo->updateSIS('users',$thisContent,$thisColumn,array(),array('_id'=>$id));
        }
        if ($success != true) {
            $err = true;
        }
    }
}

$response = array();
if ($err) {
    $response = [
        "status" => -1,
        "error" => "An error occur!",
    ];
} else {
    $response = [
        "status" => 0,
        "error" => null,
    ];
}

echo json_encode($response);

if ($email != "") {
    $result = $dbo->selectSIS("users","user",array("rcsid"=>$rcsid))[0];
    if ($result != null) {
        $user_array=$result["user"];
        $_SESSION["name"] = $user_array["name"];
        $_SESSION["rin"] = $user_array["rin"];
        $_SESSION["email"] = $user_array["email"];
        $_SESSION["role"] = $user_array["role"];
        $encrypt = crypt(md5($user_array["name"].$user_array["email"].$user_array["role"]),md5(md5($user_array["rin"])));
        $_SESSION["token"] = $encrypt;
        $_SESSION["last_activity"] = time();

        $smtpemailto = $email;
        $contentFromOthers = "Congratulations ".$user_array["name"]."! You have successfully signed up!<br>";
        $contentFromOthers .= "Your information: <br><table style='margin-top: 10px; margin-left: auto;margin-right: auto; color: white;'><tbody>";
        $contentFromOthers .= "<tr><td>Name</td>";
        $contentFromOthers .= "<td>".$user_array["name"]."</td></tr>";
        $contentFromOthers .= "<tr><td>RIN</td>";
        $contentFromOthers .= "<td>".$user_array["rin"]."</td></tr>";
        $contentFromOthers .= "<tr><td>Email</td>";
        $contentFromOthers .= "<td>".$user_array["email"]."</td></tr>";
        $contentFromOthers .= "<tr><td>RCSID</td>";
        $contentFromOthers .= "<td>".$rcsid."</td></tr>";
        $contentFromOthers .= "</tbody></table>";

        include_once("sendmail.php");

    }
}
