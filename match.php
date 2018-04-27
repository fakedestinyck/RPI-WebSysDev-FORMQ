<!-- Displays possible matches for roommates. Should only be accessed after search page. -->

<?php
define( 'check', true );
include_once("api/checkLogin.php");
include_once("api/connect.php");
include "api/Library_Mongo.php";
use Library_Mongo as Mongo;
$dbo = new Mongo();
$groupids = $_POST["groupid"];
$group_ids = json_decode($groupids,true);
$allResults = array();
foreach ($group_ids as $group_idone) {
    if ($group_idone == 0){
        continue;
    }
    $allResults[] = $dbo->selectSIS('users','group',array('group_id'=>$group_idone),array('group'),array())[0];
}

//$allResults = $dbo->selectSIS('users','group',array('group_id'=>$group_ids),array('group'),array());
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
        <!-- THIS DISPLAYS MATCHES FOR THE GROUP/USER BASED OFF OF THE ALGORITHM DEVELOPED -->
        <!-- MULTIPLE RESULTS SHOW UP AND THE PROFILES CAN BE HIDDEN OR SHOWN IF ONE CLICKS THE HEADER OF THE PROFILE -->
        <div class="page-wrap">
            <?php include_once('navbar.php'); ?>
            <div class = "container" id = "requests_container">
                <h2 id = "req_heading" style="color: white;">Matches</h2>
                <?php
                $num = 1;
                foreach ($allResults as $result) {
                    $group = $result['group'];
                    $people = $group['group_members'];
                    $single_array = array();
                    $names = "";
                    $years = "";
                    $ages = "";
                    $answers = [];
                    $coed = true;
                    $smoking = true;
                    $pets = true;
                    foreach ($people as $single) {
                        if ($single != null && $single != "" && $single != "null") {
                            $single_array[] = $dbo->selectSIS("users","user",array("rcsid"=>$single))[0];
                        }
                    }
                    $numberpeople = count($single_array);
                    foreach ($single_array as $single_row) {
                        $names .= $single_row['user']['name']. ", ";
                        $years .= $single_row['profile']['year']. ", ";
                        $ages .= $single_row['profile']['age']. ", ";
                        $answers["q1"] .= $single_row['answers']['q1'] . ", ";
//                        $answers["q2"] .= $single_row['answers']['q2'] . ", ";
                        $answers["q3"] .= substr($single_row['answers']['q3'],7) . ", ";
                        $answers["q4"] .= $single_row['answers']['q4'] . ", ";
//                        $answers["q5"] .= $single_row['answers']['q5'] . ", ";
                        $answers["q6"] = $single_row['answers']['q6']/$numberpeople;
                        $answers["q7"] = $single_row['answers']['q7']/$numberpeople;
                        $answers["q8"] = $single_row['answers']['q8']/$numberpeople;
                        $answers["q9"] = $single_row['answers']['q9']/$numberpeople;
                        $answers["q10"] = $single_row['answers']['q10']/$numberpeople;
                        $answers["q11"] = $single_row['answers']['q11']/$numberpeople;
                        $answers["q12"] = $single_row['answers']['q12']/$numberpeople;
                        $answers["notes"] .= $single_row['answers']['notes'] . "<br>";
                        if ($single_row['profile']['coed'] == 'coedno') {
                            $coed = false;
                        }
                        if ($single_row['answers']['q2'] == 'smokeno') {
                            $smoking = false;
                        }
                        if ($single_row['answers']['q5'] == 'petsno') {
                            $pets = false;
                        }
                    }
                    $emailaddress = $single_array[0]["user"]["email"];
//                    $answers = $group['group_answers'];
                    echo '<div id="requests" class="panel panel-primary panel-group">';
                    echo '<div class = "panel panel-danger" id = "request1">';
                    echo '<div class="panel-heading">';

//                    echo '<h3 class="panel-title">'.$group['name'].'</h3>';

//                    echo '<h3 class="panel-title">'.$group['name'].'<span style="float: right;" class="hidden-xs">example@email.com</span></h3>';
                    echo 'Group Members:'.$names;
//
//                    echo 'Group Members: user1, user2, user3 <span style="float: right;" class="hidden-xs">Price: $100000</span>';
//                    echo '<span class ="hidden-lg hidden-md hidden-sm"><br>Price: $1000000</span><br>';
                    echo '<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>';
//                echo '<div id = "expand">click to expand</div>';

                    echo '</div>';

                    echo '<div class = "panel-body" style="display: none"><div class="row">';
                    echo '<div class="col-sm-6">';
                    echo '<p><b>Email: </b><span>'.$emailaddress.'</p>';
                    echo '<p><b>Ages: </b><span>'.$ages.'</p>';
                    echo '<p><b>Years in College: </b><span>'.$years.'</span></p>';
                    echo '<p><b># Roommates Looking For: </b><span>'.$group['desired_num'].'</span></p>';
                    echo '<p><b>Co-ed: </b><span>'.($coed == false ? 'No' : 'Yes').'</span></p>';
                    echo '<p><b>Allergies: </b><span>'.$answers['q1'].'</span></p>';
                    echo '<p><b>Smoking: </b><span>'.($smoking == false ? 'No' : 'Yes').'</span></p>';
                    echo '<p><b>Bedtime: </b><span>'.$answers['q3'].'</span></p>';
                    echo '<p><b>Morning/Night Person(s): </b><span>'.$answers['q4'].'</span></p>';
                    echo '<p><b>Pets: </b><span>'.($pets == false ? 'No' : 'Yes').'</span></p>';
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
                    echo '<h2 style="color:black; font-size: 150%; text-align: left; margin: 1%;"><b>Notes</b></h2>'.$answers["notes"];
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <?php include_once('footer.php') ?>
    </body>
</html>
