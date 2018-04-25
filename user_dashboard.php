<?php
define( 'check', true );
include_once("api/checkLogin.php"); 
include "api/Library_Mongo.php";
use Library_Mongo as Mongo;
$dbo = new Mongo();
$s = $dbo->selectSIS('users','user',array('user_id'=>701));
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
	 	$dbo->updateSIS('users',array("group_id"=>$s[0]['group']['group_id'], "name" => $s[0]['group']['name']),'group', array('rcsid'=>$y));
	 	$dbo->updateSIS('users',array("current_num"=>$s[0]['group']['current_num']+1, "desired_num"=>$s[0]['group']['desired_num']-1),'group',array('group_id'=> $s[0]['group']['group_id']));
		$dbo->updateSIS('users',array('requested_group'=>0),'user',array('rcsid'=>$y));
	 	header("Refresh:0; url=user_dashboard.php");
 	};
};
if (isset($_GET['d'])){
    $d = $_GET['d'];
    $dd = $dbo->selectSIS('users','user',array('rcsid'=>$d));
    $dbo->updateSIS('users',array("current_num"=>$s[0]['group']['current_num']-1, "desired_num"=>$s[0]['group']['desired_num']+1),'group',array('group_id'=> $s[0]['group']['group_id']));
    $dbo->updateSIS('users',array("group_id"=>0,"name"=>""),'group',array("rcsid"=>$d));
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body {
            height: 100%;
        }
        body{
            background: url('resources/pics/desk.jpeg');
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
<body id="admin-body">
	 <?php include_once('navbar.php'); ?>
	<div class = "page-wrap">
	<div class="container" id="adduser" style="background-color: white;">
        <div class="row" style="width: 100%; margin: 0 auto;">
            <div class="col-sm-3" style="background-color:darkred;">
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
<!--                           
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
            <h1 style = "text-align:center;">Group Requests</h1>
            <!-- The following are boxes that need to be built using the backend by pulling info from the db to fill them up.-->
            <div id = "requests" class = "panel-group">
             <!-- These will be built by the backend. Javascript will fill in the values. MAke sure that the requests have ids of request 1, 2, etc and then the buttons in them are specific to hiding those requests.-->
            </div>
            <div class="addition" style="background-color:darkred;">
                    <div class="form-group">
                        <div class="col-sm-3">Add Group Member by RCSID</div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="groupmember1" placeholder="RCS ID" name="groupmember1" required>
                            <div id="addrcs"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    </div>
                <div class="col-sm-2">
                    <div style="text-align: center;"><button type="button" id="addbutton" name="addbutton" style="background-color:white;  color: black;" class="btn btn-primary">Add Another Member</button></div>
                </div>
                <div id="toadd"></div>
            </div>
            </div>
        </div>
	<?php include_once('footer.php') ?>
	<script type="text/javascript">
		$(document).ready(function(){
			var request_data = <?php echo json_encode($a);?>;
			
			for (var i = 0; i < request_data.length; i++) {
				var html = "<div class = \"panel panel-danger\" id = \"request"+i+"\"><div class = \"panel-heading\">"+ request_data[i]['user']['name'] + " requested to join.</div><div class = \"panel-body\"><div>Email: "+request_data[i]['user']['email']+"</div><button type = \"button\" id = \"adder\" class = \"close\" onclick='addRequest(\""+request_data[i]['user']['rcsid']+"\");'>Click here to add this member to your group!</button><br><button type = \"button\" id = \"remover\" class = \"close\" onclick='removeRequest(\""+request_data[i]['user']['rcsid']+"\");'>Click here to remove this request.</button></div></div>";
				$("#requests").append(html);
			}

		})
	</script>
	<script type="text/javascript" src = "user_dashboard.js"></script>
</body>
</html>
