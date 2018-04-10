<?php include_once("checkLogin.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome, test_user!</title>
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
<body>
	<!-- Make a header first. Actually, a Bootstrap navbar is better-->
	<!-- <div class = "jumbotron" id = "header"> 
		<h1>Form Q</h1>
		<span id = "welcome_msg" align = "right">Welcome, test_user</span>
	</div>  -->
	<nav id = "user_nav" class = "navbar navbar-inverse" data-spy="affix">
		<div class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" id = "header" href = "index.php">Form Q</a>
			</div>
			<a href= "#"><button id = "sch_btn" class = "btn btn-danger navbar-btn">Click here to go to the search page!</button></a> <!-- link to search page -->
			<ul class = "nav navbar-nav navbar-right">
				<li><a><span class = "glyphicon glyphicon-user"></span>Welcome, <?php echo $user_name;?>!</a></li>
				<li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>
			</ul>
		</div>
	</nav>

	<!-- Sidebar -->
	<!-- Current problems: the sidenav goes up as window size decreases -->
	<div class = "sidenav" id = "groups">
		<h1>Groups</h1>
		<!-- These will be automatically generated in the backend from javascript once stuff is in your database. -->
		<div id = "group_list">
			<button type = "button" class = "btn btn-link" data-toggle = "modal" data-target = "#Modal_group1">Group 1</button>
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
		        <p>Put information built about group here, like number of people, who is in it, stuff from DB.</p>
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
			<div class = "panel panel-danger" id = "request1">
				<div class = "panel-heading"> Samad Fariiqui requested to join.</div>
				<div class = "panel-body">
					<div>Email: ThisIsNotAn@email.address</div>
					<div>Phone number: 666-666-5555</div>
					<button type = "button" id = "remover" class = "close">Click here to remove this request.</button>
				</div>
			</div>

			<div class = "panel panel-danger" id = "reqest2">
				<div class = "panel-heading"> Psama Minhas requested to join.</div>
				<div class = "panel-body">
					<div>Email: ThisIsNotAn@email.address</div>
					<div>Phone number: 666-666-5555</div>
					<button type = "button" id = "remover" class = "close">Click here to remove this request.</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src = "user_dashboard.js"></script>
</body>
</html>