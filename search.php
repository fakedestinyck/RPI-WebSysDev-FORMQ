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
        <title>User Dashboard</title>
        <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Knewave" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    </head>
    <style>
        body{
            color: black;
            background-color: darkred;
            background-size:cover;
            font-family: 'Fira Sans', sans-serif;
        }
        h1{
            color: white;
            text-align: center;
            font-size: 600%;
        }
        h2{
            color: darkred;
            font-size: 400%;
            text-align: center;
            font-family: 'Playfair Display', serif;
            margin: 2%;
        }
        /* Floats need to be cleared so the container will wrap correctly. */
        div.clear {
            clear:both;
        }
        input[type=text]{
            float: right;
        }
        .row{
            margin-top:40px;
            padding: 0 10px;
        }

        .clickable{
            cursor: pointer;
        }

        .panel-heading span {
            margin-top: -20px;
            font-size: 15px;
        }

        .glyphicon {
            top: 4px;
        }

    </style>
    <body>
        <?php include_once('navbar.php'); ?>
        <div class = "container" id = "requests_container">
            <h2 id = "req_heading" style="color: white;">Match</h2>
            <?php
            foreach ($allResults as $result) {
                $group = $result['group'];
                $answers = $group['group_answers'];
                echo '<div id="requests" class="panel panel-primary panel-group">';
                echo '<div class = "panel panel-danger" id = "request1">';
                echo '<div class="panel-heading">';
                echo '<h3 class="panel-title">'.$group['name'].'</h3>';
                echo '<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>';
                echo '</div>';

                echo '<div class = "panel-body" style="display: none"><div class="row">';
                echo '<div class="col-sm-4">';
                echo '<p>E-mail: <input type="text" name="gemail"></p>';
                echo '<p>Ages: <input type="text" name="gage"></p>';
                echo '<p>Years in College: <input type="text" name="gyear"></p>';
                echo '<p>Budget: <input type="text" name="gbudget"></p>';
                echo '<p># Roommates Looking For: <input type="text" name="gnumber" value="'.$group['desired_num'].'"></p>';
                echo '<p>Co-ed: <input type="text" name="gcoed"></p>';
                echo '</div>';
                echo '<div id="life" class="col-sm-4">';
                echo '<p>Allergies: <input type="text" name="allergies" value="'.$answers['q1'].'"></p>';
                echo '<p>Smoking: <input type="text" name="smoke" value="'.($answers['q2'] == 'smokeno' ? 'No' : 'Yes').'"></p>';
                echo '<p>Bedtime: <input type="text" name="bedtime" value="'.substr($answers['q3'],7).'"></p>';
                echo '<p>Morning/Night Person(s): <input type="text" name="mornnight" value="'.$answers['q4'].'"></p>';
                echo '<p>Pets: <input type="text" name="pets" value="'.($answers['q5'] == 'petsno' ? 'No' : 'Yes').'"></p>';
                echo '</div>';
                echo '<div class="col-sm-4">';
                echo '<p>On a scale from 1-5 (5 being the most strict): </p>';
                echo '<p>Sticks to Schedules: <input type="text" name="schedule" value="'.$answers['q6'].'"></p>';
                echo '<p>Messiness: <input type="text" name="mess" value="'.$answers['q7'].'"></p>';
                echo '<p>Alcholic Drinking: <input type="text" name="drink" value="'.$answers['q8'].'"></p>';
                echo '<p>Partying: <input type="text" name="party" value="'.$answers['q9'].'"></p>';
                echo '<p>TV Watching: <input type="text" name="tv" value="'.$answers['q10'].'"></p>';
                echo '<p>Gaming: <input type="text" name="gamer" value="'.$answers['q11'].'"></p>';
                echo '<p>Sensitvity to Music: <input type="text" name="music" value="'.$answers['q12'].'"></p>';
                echo '</div></div>';
                echo '<div class="form-group">';
                echo '<h2 style="color:black; font-size: 150%; text-align: left; margin: 1%;">Advertisement</h2>';
                echo '<textarea class="form-control" name="notes" rows="8" cols="168"></textarea>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <script type="text/javascript" src="search.js"></script>
        <?php include_once('footer.php') ?>
    </body>
</html>
