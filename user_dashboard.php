<?php
define( 'check', true );
include_once("api/checkLogin.php"); 
include "api/Library_Mongo.php";
use Library_Mongo as Mongo;
$dbo = new Mongo();
$s = $dbo->selectSIS('users','user',array('rcsid'=>$_SESSION["rcsid"]));
$a = $dbo->selectSIS('users','user',array('requested_group'=>$s[0]['group']['group_id']));
$g = $dbo->selectSIS('users','group',array("group_id"=>$s[0]['group']['group_id']));
if (isset($_GET['r'])){
	$r = $_GET['r'];
	$dbo->updateSIS('users',array('requested_group'=>0),'user',array('rcsid'=>$r));
	header("Refresh:0; url=user_dashboard.php");
};
if (isset($_GET['y'])){
 	$y = $_GET['y'];
 	$u = $dbo->selectSIS('users','user',array('rcsid'=>$y));
 	if (count($u)==0){
 		echo "<script type='text/javascript'>alert('User not found in database');</script>";
 		header("Refresh:0; url=user_dashboard.php");
 	}
 	else {
        $z=$u[0]['_id'];
	 	$dbo->updateSIS('users',array("group_id"=>$s[0]['group']['group_id'], "name"=>$s[0]['group']['name']),'group', array(),array('_id'=>$z));
	 	$dbo->updateSIS('users',array("current_num"=>$s[0]['group']['current_num']+1, "desired_num"=>$s[0]['group']['desired_num']-1),'group',array('group_id'=> $s[0]['group']['group_id']));
		$dbo->updateSIS('users',array('requested_group'=>0),'user',array('rcsid'=>$y));
        $smtpemailto = $u[0]['user']['email'];
        $contentFromOthers = "You have been added to a group on FORM Q by user ".$_SESSION["rcsid"].'</h2>';
        $contentFromOthers .= '<h2>';
        $contentFromOthers .= '<a type="button" href="http://ec2-54-158-25-237.compute-1.amazonaws.com/itws4500/api/leaveorspam.php?action=leave&rcsid='.$_SESSION['rcsid'].'&self='.$y.'&token='.crypt($u[0]['user']['email'].$y,$_SESSION['rcsid']).'">Leave the group</a>';
        $contentFromOthers .= '<div><br></div>';
        $contentFromOthers .= '<a type="button" href="http://ec2-54-158-25-237.compute-1.amazonaws.com/itws4500/api/leaveorspam.php?action=spam&rcsid='.$_SESSION['rcsid'].'&self='.$y.'&token='.crypt($u[0]['user']['email'].$y,$_SESSION['rcsid']).'">Report spam and leave the group</a></h2>';
        include_once("api/sendmail.php");
	 	header("Refresh:0; url=user_dashboard.php");
 	};
};
if (isset($_GET['d'])){
    $d = $_GET['d'];
    $dd = $dbo->selectSIS('users','user',array('rcsid'=>$d));
    $du = $dd[0]['_id'];
    $dbo->updateSIS('users',array("current_num"=>$s[0]['group']['current_num']-1, "desired_num"=>$s[0]['group']['desired_num']+1),'group',array('group_id'=> $s[0]['group']['group_id']));
    $dbo->updateSIS('users',array("group_id"=>$du,"name"=>""),'group',array(),array('_id'=>$du));
    header("Refresh:0; url=user_dashboard.php");

};
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Knewave" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body {
            height: 100%;
        }
        body{
            background-color: #E0E0E0;
            background-size:150% 150%;
            font-family: 'Oswald', sans-serif;
            font-size: 200%;
            margin: 0 auto;
        }
        #admin-body {
            padding-top: 65px;
        }
        #header{
            color: white;
            /* background-color:darkred; */
            font-family: 'Oswald', sans-serif;
            font-size: 130%
        }
        #welcome_msg{
            text-align: right;
        }

        #user_nav{
            background-color: darkred;
            position: relative;
        }
        #admin_nav {
            background-color: darkred;
        }
        #sch_btn{
            margin-left: 35%;
        }
        #groups{
            height: 100%;
            width: 350px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #E57373;
            overflow-x: hidden;
            padding-top: 20px;	
            margin-top: 3.37%;
        }
        #groups a{
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }
        #groups button{
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }
        #groups button:hover {
            color: #f1f1f1;
        }
        @media screen and (max-height: 450px) {
            #groups {padding-top: 15px; margin-top: 3.37%;}
            #groups a {font-size: 18px;}
        }
        #requests{
            margin-left: 500px;
            padding-bottom: 20px;
        }
        #req_heading{
            margin-left: 500px;
        }
        @media (max-width: 768px) {
            ul.container-fluid li.inline {
                float: left; /*// make .inline items to float on mobile*/
            }
            ul.container-fluid li.last-inline + li {
                clear: both; /*// avoid next item to float*/
            }
            ul.container-fluid li.inline a { /*// fix broken padding*/
                padding-top: 15px;
                padding-bottom: 15px;
            }
        }
        .blackText {
            color: black;
        }
        #reported_users {
            margin-left: 5%;
            margin-right: 5%;
        }
        .footer {
            background-color: darkred;
            color: white;
        }
        .page-wrap {
            min-height: 100%;
            /* equal to footer height */
            margin-bottom: -50px; 
        }
        .page-wrap:after {
            content: "";
            display: block;
        }
        .footer, .page-wrap:after {
            height: 50px;
        }
        div.clear {
            clear:both;
        }
    </style>
</head>
<body id="bodyforNav"style="background: url('resources/pics/desk.jpeg');">
	 <?php include_once('navbar.php'); ?>
	<div class = "page-wrap">
	<div class="container" id="adduser">
        <div class="row" style="width: 100%; margin: 0 auto; background-color: #E0E0E0">
            <div class="col-sm-3" style="background-color:darkred;color:white">
                <div id = "modal_groups">
                    <div id="Modal_group1" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Group Information</h4>
                          </div>
                          <div class="modal-body">
                            <p>Group Name: <?php echo $s[0]['group']['name'] ?></p>
                            <p>Current Number: <?php echo $s[0]['group']['current_num'] ?></p>
                            <p>Desired Number: <?php echo $s[0]['group']['desired_num'] ?></p>
                            <p>Members:</p>
                            <?php 
                            for($i=0;$i<count($g);$i++){
                                echo "<p>&emsp;".$g[$i]['user']['name']."</p>";
                            }
                                ?>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" id = "view_group1"><!-- The IDs here need to be different based on what number group it is for the user.-->Edit Group Info</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                <h1>Group Members</h1>
                <!-- These will be automatically generated in the backend from javascript once stuff is in your database. -->
                <div id = "group_list">
                    <button type = "button" class = "btn btn-link" data-toggle = "modal" data-target = "#Modal_group1"><?php echo $s[0]['group']['name'] ?></button>
                        <?php 
                            for($i=0;$i<count($g);$i++){
                                echo "<p>&emsp;".$g[$i]['user']['name']."</p>";
                            }

                        ?>
                </div>
            </div>
	    <!-- HERE WE ALLOW THE USER TO ADD OR REMOVE MEMBERS TO GROUP -->
            <h1 style = "text-align:center;">Add or Remove Users</h1>
	    <div class="addition" style="background-color:darkred;">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <p>Add Group Member by RCSID</p>
                            <p>Remove Group Member by RCSID</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="groupmember1" placeholder="RCS ID" name="groupmember1" required>
                            <input type="text" class="form-control" id="groupmemberr" placeholder="RCS ID" name="groupmemberr" required>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-2">
                        <div style="text-align: center;"><button type="button" id="addbutton" name="addbutton" style="background-color:white;  color: black; width: 100%" class="btn btn-primary">Add</button></div>
                        <div style="text-align: center;"><button type="button" id="removebutton" name="removebutton" style="background-color:white;  color: black; width: 100%;" class="btn btn-primary">Remove</button></div>
                </div>
            </div>
            </div>
        </div>
	</div>
	<?php include_once('footer.php') ?>
	<script type="text/javascript" src = "user_dashboard.js"></script>
</body>
</html>
