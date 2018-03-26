<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome, test_admin!</title>
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

	<div class ="page-wrap">
	<nav id = "admin_nav" class = "navbar navbar-inverse navbar-fixed-top" data-spy="affix">
		<div class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" id = "header" href = "index.php">Form Q</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                	<span class="sr-only">Toggle navigation</span>
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
            	</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class = "nav navbar-nav navbar-right">
					<li><a><span class = "glyphicon glyphicon-user"></span>Welcome, test_admin!</a></li>
					<li><a href = "user_dashboard.php"><span>User Dashboard</span></a></li>
					<li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<h1 class ="hidden-xs" style="margin-left: 7%;">Admin Dashboard</h1>
	<h3 class="hidden-lg hidden-md hidden-sm" style="margin-left: 7%;">Admin Dashboard</h3>
	<div id="reported_users" class="panel panel-default">
		<div class="panel-heading" onclick="removeHidden()"">
			Reported Users
			<span id ="symbol" class="pull-right glyphicon glyphicon-plus hidden-lg hidden-md hidden-sm" style="top: 5px;"></span>
		</div>
		<ul id ="reported_content" class="list-group hidden-xs">
  			<li id ="0" class="list-group-item clearfix" style="word-wrap: break-word;">
      			<span>User 1</span>
      			<span class="pull-right">
      				<button class="btn btn-warning blackText" onclick="ignoreClick('0')">Ignore</button>
      				<button class="btn btn-danger blackText" onclick="banClick('0')">Ban</button>
      			</span>
      			<div class="text-muted" style="font-size: 15px;">Number of reports: X</div>
  			</li>
  			<li id="1" class="list-group-item">
  				User 2
  				<span class="pull-right">
      				<button class="btn btn-warning blackText" onclick="ignoreClick('1')">Ignore</button>
      				<button class="btn btn-danger blackText" onclick="banClick('1')">Ban</button>
      			</span>
  			</li>
  			<li id="2" class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText" onclick="ignoreClick('2')">Ignore</button>
      				<button class="btn btn-danger blackText" onclick="banClick('2')">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText" onclick="ignoreClick('3')">Ignore</button>
      				<button class="btn btn-danger blackText" onclick="banClick('3')">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<button class="btn btn-danger blackText">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<button class="btn btn-danger blackText">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<button class="btn btn-danger blackText">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<button class="btn btn-danger blackText">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<button class="btn btn-danger blackText">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<button class="btn btn-danger blackText">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<button class="btn btn-danger blackText">Ban</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<button class="btn btn-danger blackText">Ban</button>
      			</span>
  			</li>

		</ul>
	</div>
	</div>
	<footer class="footer">
		<div class="container">
			<form action="aboutus.php">
				<button class="btn btn-info" style="margin-top: 8px;">About Us</button>
			</form>
		</div>
	</footer>
	<script type="text/javascript" src = "admin_dashboard.js"></script>
</body>
</html>