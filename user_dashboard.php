<?php
define( 'check', true );
include_once("api/checkLogin.php"); 
include "api/Library_Mongo.php";
use Library_Mongo as Mongo;
$dbo = new Mongo();
$s = $dbo->selectSIS('users','user',array('user_id'=>701));
$a = $dbo->selectSIS('users','user',array('requested_group'=>$s[0]['group']['group_id']));
if (isset($_GET['r'])){
	$r = $_GET['r'];
	$dbo->updateSIS('users',array('requested_group'=>0),'user',array('rcsid'=>$r));
	header("Refresh:0; url=user_dashboard.php");
};
if (isset($_GET['y'])){
 	$y = $_GET['y'];
 	$u = $dbo->selectSIS('users','user',array('rcsid'=>$y));
 	$dbo->updateSIS('users',array("group_id"=>$s[0]['group']['group_id'], "name" => $s[0]['group']['name'], "group_members"=>array("member1"=>$s[0]['group']['group_members']['member1'],"member2"=>$s[0]['group']['group_members']['member2'],"member3"=>$s[0]['group']['group_members']['member3'],"member4"=>$s[0]['group']['group_members']['member4'],"member5"=>$s[0]['group']['group_members']['member5'],"member6"=>$s[0]['group']['group_members']['member6'],"member7"=>$s[0]['group']['group_members']['member7'],"member8"=>$s[0]['group']['group_members']['member8'],"member9"=>$s[0]['group']['group_members']['member9'],"member10"=>$s[0]['group']['group_members']['member10'])),'group', array('rcsid'=>$y));
 	$dbo->updateSIS('users',array("current_num"=>$s[0]['group']['current_num']+1, "desired_num"=>$s[0]['group']['desired_num']-1),'group',array('group_id'=> $s[0]['group']['group_id']));
 	$g = $dbo->selectSIS('users','group',array('group_id'=>$s[0]['group']['group_id']));
 	$gn = $g[0]['group']['current_num'];
 	$gm = $g[0]['group']['group_members'];
 	$gm['member'.$gn]= $u[0]['user']['name'];
 	$dbo->updateSIS('users',array('group_members'=>$gm),'group',array('group_id'=>$s[0]['group']['group_id']));
	$dbo->updateSIS('users',array('requested_group'=>0),'user',array('rcsid'=>$y));
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
    <link href="user_dashboard.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Knewave" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body id="admin-body">
	<div class = "page-wrap">
	<!-- Make a header first. Actually, a Bootstrap navbar is better-->
	<!-- <div class = "jumbotron" id = "header"> 
		<h1>Form Q</h1>
		<span id = "welcome_msg" align = "right">Welcome, test_user</span>
	</div>  -->
<!--	<nav id = "admin_nav" class = "navbar navbar-inverse navbar-fixed-top" data-spy="affix">-->
<!--		  <div class = "container-fluid">-->
<!--        <div class = "navbar-header">-->
<!--          <a class = "navbar-brand" id = "header" href = "index.php">Form Q</a>-->
<!--          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">-->
<!--            <span class="sr-only">Toggle navigation</span>-->
<!--            <span class="icon-bar"></span>-->
<!--            <span class="icon-bar"></span>-->
<!--            <span class="icon-bar"></span>-->
<!--          </button>-->
<!--			  </div>-->
<!--			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--				  <ul class = "nav navbar-nav navbar-right">-->
<!--					  <li><a><span class = "glyphicon glyphicon-user"></span>Welcome, --><?php //echo $user_name;?><!--</a></li>-->
<!--					  <li><a href = "search.php"><span class = "glyphicon glyphicon-search">Search</span></a></li>-->
<!--					  <li><a href = "admin_dashboard.php"><span>Admin Dashboard ONLY ADMINS</span></a></li>-->
<!--					  <li><a href = "api/logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>-->
<!--				  </ul>-->
<!--			  </div>-->
<!--		  </div>-->
<!--    </nav>-->
        <?php include_once('navbar.php'); ?>
	<!-- <nav id = "user_nav" class = "navbar navbar-inverse" data-spy="affix">
		<div class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" id = "header" href = "index.php">Form Q</a>
			</div>
			<a href= "#"><button id = "sch_btn" class = "btn btn-danger navbar-btn">Click here to go to the search page!</button></a> --> <!-- link to search page -->
		<!-- 	<ul class = "nav navbar-nav navbar-right">
				<li><a><span class = "glyphicon glyphicon-user"></span>Welcome, <?php echo $user_name;?>!</a></li>
				<li><a href = "api/logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>
			</ul>
		</div>
	</nav> -->

	<!-- Sidebar -->
	<!-- Current problems: the sidenav goes up as window size decreases -->
	<div class = "sidenav" id = "groups">
		<h1>Groups</h1>
		<!-- These will be automatically generated in the backend from javascript once stuff is in your database. -->
		<div id = "group_list">
			<button type = "button" class = "btn btn-link" data-toggle = "modal" data-target = "#Modal_group1"><?php echo $s[0]['group']['name'] ?></button>
				<p>&emsp;<?php echo $s[0]['group']['group_members']['member1'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member2'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member3'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member4'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member5'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member6'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member7'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member8'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member9'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member10'] ?></p>
		</div>
		
	</div>

	<!-- Modals for groups go here. These html tags will be put into the id modal_groups-->
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
				<p>&emsp;<?php echo $s[0]['group']['group_members']['member1'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member2'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member3'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member4'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member5'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member6'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member7'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member8'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member9'] ?></p>
		        <p>&emsp;<?php echo $s[0]['group']['group_members']['member10'] ?></p>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" id = "view_group1"><!-- The IDs here need to be different based on what number group it is for the user.-->Edit Group Info</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  	</div>
		</div>
	</div>

	<div class = "container" id = "requests_container">
		<h3 id = "req_heading">Group Requests</h3>
		<!-- The following are boxes that need to be built using the backend by pulling info from the db to fill them up.-->
		<div id = "requests" class = "panel-group">
			<!-- These will be built by the backend. Javascript will fill in the values. MAke sure that the requests have ids of request 1, 2, etc and then the buttons in them are specific to hiding those requests.-->

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