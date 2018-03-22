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
					<li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="reported_users" class="panel panel-default">
		<div class="panel-heading">Reported Users</div>
		<ul class="list-group">
  			<li id ="0" class="list-group-item clearfix" style="word-wrap: break-word;">
      			User 1
      			<span class="pull-right">
      				<button class="btn btn-warning blackText" onclick="ignoreClick('0')">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash" onclick="blacklistClick('0')"></span>
      				<button class="hidden-xs btn btn-danger blackText" onclick="blacklistClick('0')">Blacklist</button>
      			</span>
  			</li>
  			<li id="1" class="list-group-item">
  				User 2
  				<span class="pull-right">
      				<button class="btn btn-warning blackText" onclick="ignoreClick('1')">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash" onclick="blacklistClick('1')"></span>
      				<button class="hidden-xs btn btn-danger blackText" onclick="blacklistClick('1')">Blacklist</button>
      			</span>
  			</li>
  			<li id="2" class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText" onclick="ignoreClick('2')">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash" onclick="blacklistClick('2')"></span>
      				<button class="hidden-xs btn btn-danger blackText" onclick="blacklistClick('2')">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>
   			<li class="list-group-item">
  				User 3
  				<span class="pull-right">
      				<button class="btn btn-warning blackText">Ignore</button>
      				<span class="hidden-lg hidden-md hidden-sm glyphicon glyphicon-trash"></span>
      				<button class="hidden-xs btn btn-danger blackText">Blacklist</button>
      			</span>
  			</li>

		</ul>
	</div>
	<script type="text/javascript" src = "user_dashboard.js"></script>
</body>
</html>