<?php
//define( 'check', true );
//include_once("api/checkLogin.php"); ?>
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
                <div id = "requests" class = "panel-group">
                    <div class = "panel panel-danger pointer" id = "request1">
                        <div class = "panel-heading">
                            <b>Match #1</b> <span style="float: right;" class="hidden-xs">example@email.com</span>
                            <span class ="hidden-lg hidden-md hidden-sm"><br>example@email.com</span><br>
                            Group Members: user1, user2, user3 <span style="float: right;" class="hidden-xs">Price: $100000</span>
                            <span class ="hidden-lg hidden-md hidden-sm"><br>Price: $1000000</span><br>
                            <div id = "expand">click to expand</div>
                        </div>
                        <div id ="contentx" class = "panel-body hidden">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Ages: </b><span>20, 21, 22, 23, 24, 25, 26, 27, 28</p>
                                    <p><b>Years in College: </b><span>1, 2, 3, 4</span></p>
                                    <p><b># Roommates Looking For: </b><span>7</span></p>
                                    <p><b>Co-ed: </b><span>Nein</span></p>
                                    <p><b>Allergies: </b><span>Peanuts, Walnuts, Coconuts, Almonds, Pistachios, Cashews</span></p>
                                    <p><b>Smoking: </b><span>illegal</span></p>
                                    <p><b>Bedtime: </b><span>inconsistent</span></p>
                                    <p><b>Morning/Night Person(s): </b><span>afternoon</span></p>
                                    <p><b>Pets: </b><span>are cool</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>On a scale from 1-5 (5 being the most strict)</b></p>
                                    <p>Sticks to Schedules: <span class="pull-right">1</span></p>
                                    <p>Messiness: <span class="pull-right">2</span></p>
                                    <p>Alcholic Drinking: <span class="pull-right">3</span></p>
                                    <p>Partying: <span class="pull-right">4</span></p>
                                    <p>TV Watching: <span class="pull-right">5</span></p>
                                    <p>Gaming: <span class="pull-right">4</span></p>
                                    <p>Sensitvity to Music: <span class="pull-right">3</span></p>
                                </div>
                                <br>
                            </div>
                            <div class="form-group">
                                <h2 style="color:black; font-size: 150%; text-align: left; margin: 1%;"><b>Notes</b></h2>
                                notes Notes NOtes NOTes NOTEs NOTES
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('footer.php') ?>
    </body>
</html>

<!-- <?php
//define( 'check', true );
//include_once("api/checkLogin.php"); ?>
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
            background: url('resources/pics/desk.jpeg');
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
        <?php //include_once('navbar.php'); ?>
        <div class = "container" id = "requests_container">
            <h2 id = "req_heading" style="color: white;">Match</h2>
            <p style="color:white; text-align:center;">To see a group's information, please click their names</p>
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
<!--         </div>
        <script type="text/javascript" src="search.js"></script>
        <?php //include_once('footer.php') ?>
    </body>
</html> -->
 <!-- -->