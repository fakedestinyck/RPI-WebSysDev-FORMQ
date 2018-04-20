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
    </head>
    <body id = "bodyforNav">
        <div class="page-wrap">
            <?php include_once('navbar.php'); ?>
            <div class = "container" id = "requests_container">
                <h2 id = "req_heading">Matches</h2>
                <?php
                $num = 1;
                foreach ($allResults as $result) {
                    $group = $result['group'];
                    $answers = $group['group_answers'];
                    echo '<div id="requests" class="panel panel-primary panel-group">';
                    echo '<div class = "panel panel-danger" id = "request1">';
                    echo '<div class="panel-heading">';

                    echo '<h3 class="panel-title">'.$group['name'].'</h3>';

//                    echo '<h3 class="panel-title">'.$group['name'].'<span style="float: right;" class="hidden-xs">example@email.com</span></h3>';
                    echo 'Group Members: user1, user2, user3 ';
//
//                    echo 'Group Members: user1, user2, user3 <span style="float: right;" class="hidden-xs">Price: $100000</span>';
//                    echo '<span class ="hidden-lg hidden-md hidden-sm"><br>Price: $1000000</span><br>';
                    echo '<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>';
//                echo '<div id = "expand">click to expand</div>';

                    echo '</div>';

                    echo '<div class = "panel-body" style="display: none"><div class="row">';
                    echo '<div class="col-sm-6">';
                    echo '<p><b>Ages: </b><span>20, 21, 22, 23, 24, 25, 26, 27, 28</p>';
                    echo '<p><b>Years in College: </b><span>1, 2, 3, 4</span></p>';
                    echo '<p><b># Roommates Looking For: </b><span>'.$group['desired_num'].'</span></p>';
                    echo '<p><b>Co-ed: </b><span>Nein</span></p>';
                    echo '<p><b>Allergies: </b><span>'.$answers['q1'].'</span></p>';
                    echo '<p><b>Smoking: </b><span>'.($answers['q2'] == 'smokeno' ? 'No' : 'Yes').'</span></p>';
                    echo '<p><b>Bedtime: </b><span>'.substr($answers['q3'],7).'</span></p>';
                    echo '<p><b>Morning/Night Person(s): </b><span>'.$answers['q4'].'</span></p>';
                    echo '<p><b>Pets: </b><span>'.($answers['q5'] == 'petsno' ? 'No' : 'Yes').'</span></p>';
                    echo '</div>';
                    echo '<div class="col-sm-6">';
                    echo '<p><b>On a scale from 1-5 (5 being the most strict)</b></p>';
                    echo '<p>Sticks to Schedules: <span class="pull-right">'.$answers['q6'].'</span></p>';
                    echo '<p>Messiness: <span class="pull-right">'.$answers['q7'].'</span></p>';
                    echo '<p>Alcholic Drinking: <span class="pull-right">'.$answers['q8'].'</span></p>';
                    echo '<p>Partying: <span class="pull-right">'.$answers['q9'].'</span></p>';
                    echo '<p>TV Watching: <span class="pull-right">'.$answers['q10'].'</span></p>';
                    echo '<p>Gaming: <span class="pull-right">'.$answers['q11'].'</span></p>';
                    echo '<p>Sensitvity to Music: <span class="pull-right">'.$answers['q12'].'</span></p>';
                    echo '</div><br></div>';
                    echo '<div class="form-group">';
                    echo '<h2 style="color:black; font-size: 150%; text-align: left; margin: 1%;"><b>Notes</b></h2>notes Notes NOtes NOTes NOTEs NOTES';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                <div style="text-align: center; "><button id="button" style="background-color:white; margin: 1%; color: black;" class="btn btn-primary" id="requests">Request to Join Group</button></div>
            </div>
        </div>
        <?php include_once('footer.php') ?>
    </body>
</html>
