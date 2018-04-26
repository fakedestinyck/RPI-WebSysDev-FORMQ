<?php
define( 'check', true );
include_once("api/checkLogin.php");
include_once("api/connect.php");

include "api/Library_Mongo.php";
use Library_Mongo as Mongo;
$dbo = new Mongo();
$group_ids = array(1); // to be passed in
$allResults = $dbo->selectSIS('users','group',array('group_id'=>$group_ids),array('group'),array(),array('_id'=>-1));
$count = sizeof($allResults);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Find Matches</title>
        <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="search.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Knewave" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
        <script type="text/javascript" src = "search.js"></script>
        <script type="text/javascript" src = "algo.js"></script>
    </head>
        <body id = "bodyforNav">
        <div class="page-wrap">
            <?php include_once('navbar.php'); ?>
            <div class = "container" id = "requests_container">
                <h2 id = "req_heading" style="color:white">Search</h2>
                <div id = "requests" class = "panel-group">
                    <div class = "panel panel-danger" id = "request1">
                        <div class = "panel-heading" style="font-size: 200%;">
                            <p>Please check qualities that are not important to you when searching for a roommate.  Multiple can be checked.</p>
                            <input type="checkbox" class="form-check-input" id="smoking">
                            <label class="form-check-label" for="smoking">Smoking Frequency</label><br>
                            <input type="checkbox" class="form-check-input" id="bedtime">
                            <label class="form-check-label" for="bedtime">Bedtime</label><br>
                            <input type="checkbox" class="form-check-input" id="mornnight">
                            <label class="form-check-label" for="mornnight">Morning or Night Person/People</label><br>
                            <input type="checkbox" class="form-check-input" id="pets">
                            <label class="form-check-label" for="pets">Pets</label><br>
                            <input type="checkbox" class="form-check-input" id="schedule">
                            <label class="form-check-label" for="schedule">Schedule</label><br>
                            <input type="checkbox" class="form-check-input" id="mess">
                            <label class="form-check-label" for="mess">Mess</label><br>
                            <input type="checkbox" class="form-check-input" id="drink">
                            <label class="form-check-label" for="drink">Drinking Frequency</label><br>
                            <input type="checkbox" class="form-check-input" id="party">
                            <label class="form-check-label" for="party">Party Frequency</label><br>
                            <input type="checkbox" class="form-check-input" id="tv">
                            <label class="form-check-label" for="tv">TV Time</label><br>
                            <input type="checkbox" class="form-check-input" id="gamer">
                            <label class="form-check-label" for="gamer">Gaming Frequency</label><br>
                            <input type="checkbox" class="form-check-input" id="music">
                            <label class="form-check-label" for="music">Music Sensitivity</label><br>
                            <div style="text-align: center;"><button id="button" style="background-color:white; color: black;" class="btn btn-primary"  onclick="window.location='match.php';">Submit</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('footer.php') ?>
    </body>
</html>
