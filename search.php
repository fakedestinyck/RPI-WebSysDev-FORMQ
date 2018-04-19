<?php
define( 'check', true );
include_once("api/checkLogin.php"); ?>
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

    </style>
    <body>
        <?php include_once('navbar.php'); ?>
        <div class = "container" id = "requests_container">
            <h2 id = "req_heading" style="color: white;">Match</h2>
            <div id = "requests" class="panel panel-primary panel-group">
                <div class = "panel panel-danger" id = "request1">
                <div class="panel-heading">
                    <h3 class="panel-title">Group name?</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class = "panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <p>E-mail: <input type="text" name="gemail"></p>
                            <p>Ages: <input type="text" name="gage"></p>
                            <p>Years in College: <input type="text" name="gyear"></p>
                            <p>Budget: <input type="text" name="gbudget"></p>
                            <p># Roommates Looking For: <input type="text" name="gnumber"></p>
                            <p>Co-ed: <input type="text" name="gcoed"></p>
                        </div>
                        <div id="life" class="col-sm-4">
                            <p>Allergies: <input type="text" name="allergies"></p>
                            <p>Smoking: <input type="text" name="smoke"></p>
                            <p>Bedtime: <input type="text" name="bedtime"></p>
                            <p>Morning/Night Person(s): <input type="text" name="mornnight"></p>
                            <p>Pets: <input type="text" name="pets"></p>
                        </div>
                        <div class="col-sm-4">
                            <p>On a scale from 1-5 (5 being the most strict): </p>
                            <p>Sticks to Schedules: <input type="text" name="schedule"></p>
                            <p>Messiness: <input type="text" name="mess"></p>
                            <p>Alcholic Drinking: <input type="text" name="drink"></p>
                            <p>Partying: <input type="text" name="party"></p>
                            <p>TV Watching: <input type="text" name="tv"></p>
                            <p>Gaming: <input type="text" name="gamer"></p>
                            <p>Sensitvity to Music: <input type="text" name="music"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <h2 style="color:black; font-size: 150%; text-align: left; margin: 1%;">Advertisement</h2>
                        <textarea class="form-control" name="notes" rows="8" cols="168"></textarea>
                    </div>
                </div>
                </div>
            </div>
<!--                <div class = "panel panel-danger" id = "request1">-->
<!--                    <div class = "panel-heading"> Names: <input type="text" name="gname" ></div>-->
<!---->
<!--                </div>-->
        </div>
        <script type="text/javascript" src="search.js"></script>
        <?php include_once('footer.php') ?>
    </body>
</html>
