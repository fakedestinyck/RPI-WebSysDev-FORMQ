<!-- Admin Dashboard. Currently allows Admins to Ban reported users or ignore the report -->

<?php
   define( 'check', true );
   include_once("api/checkLogin.php");
   include "api/Library_Mongo.php";
   use Library_Mongo as Mongo;
   $dbo = new Mongo();
   $s = $dbo->selectSIS('users','user',array('reported'=>'yes'));
   if (isset($_GET['b'])){
     $b = $_GET['b'];
     $dbo->updateSIS('users',array('role'=>3),'user',array('rcsid'=>$b));
     $dbo->updateSIS('users',array('reported'=>'no'),'user',array('rcsid'=>$b));
     header("Refresh:0; url=admin_dashboard.php");
   }
   if (isset($_GET['i'])){
     $i = $_GET['i'];
     $dbo->updateSIS('users',array('reported'=>'no'),'user',array('rcsid'=>$i));
     header("Refresh:0; url=admin_dashboard.php");

   }
?>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
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
    <?php include_once('navbar.php'); ?>
	  <h1 class ="hidden-xs" style="margin-left: 7%;">Admin Dashboard</h1>
	  <h3 class="hidden-lg hidden-md hidden-sm" style="margin-left: 7%;">Admin Dashboard</h3>
	  <div id="reported_users" class="panel panel-default">
		  <div class="panel-heading" onclick="removeHidden()"">
			  Reported Users
			  <span id ="symbol" class="pull-right glyphicon glyphicon-plus hidden-lg hidden-md hidden-sm" style="top: 5px;"></span>
		  </div>
		  <ul id ="reported_content" class="list-group hidden-xs">
		  </ul>
	  </div>
	</div>
  <?php include_once('footer.php') ?>

<script type="text/javascript">
  $(document).ready(function() {
    var user_data = <?php echo json_encode($s); ?>;
    console.log(user_data);
    var i = 0;

    for (var i = 0; i < user_data.length; i++) {
      var html = "<li id =\""+user_data[i]['user']['rcsid']+"\" class='list-group-item clearfix' style='word-wrap: break-word;'><span>"+user_data[i]['user']['name']+"</span><span class='pull-right'><button class='btn btn-warning blackText' onclick='ignoreClick(\""+user_data[i]['user']['rcsid']+"\")'>Ignore</button><button class='btn btn-danger blackText' onclick='banClick(\""+user_data[i]['user']['rcsid']+"\")'>Ban</button></span></li>";
      $("#reported_content").append(html);
    }
  });
  </script>
	<script type="text/javascript" src = "admin_dashboard.js"></script>

</body>
</html>