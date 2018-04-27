<?php
define( 'check', true );
include_once("api/checkLogin.php");
define('profile', true);
$column = ["user","profile"];
$columnData = [array("user"=>array()),array("profile"=>array())];
$user = array();
$profile = array();
if ($_SESSION['rcsid'] != null) {
    include_once("api/readdata.php");
    $user = $columnData[0]["user"];
    $profile = $columnData[1]["profile"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FORM QS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="profile.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Knewave" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style>
        .slidercontainer{
            width: 25%;
        }
        #first{
            text-align: center;
        }
        .center{
            text-align: center;
        }
        body{
            color: black;
            background: url('resources/pics/desk.jpeg');
            background-size:150% 150%;
            font-family: 'Fira Sans', sans-serif;
            font-size: 150%;
        }
        h1{
            color: white;
            text-align: center;
            font-size: 600%;
        }
        h2{
            color: white;
            font-size: 400%;
            text-align: center;
            font-family: 'Playfair Display', serif;
            margin: 2%;
        }
        .container:not(#footcontainer){
            margin-bottom:5%;
            padding: 3%;
            background-color: darkred;
            margin-top: 50px;
            color: white;
            border: 10px solid white;
        }
      @media (min-width: 768px) {
          .border-right-container {
              border-right: 5px solid white;
          }
      }
        /* Floats need to be cleared so the container will wrap correctly. */
        div.clear {
            clear:both;
        }
    </style>
  </head>
  <body id = "bodyforNav">
      <!-- THIS PAGE WAS CREATED SO A USER'S INDIVIDUAL INFORMATION COULD BE VIEWED AND CHANGED BY CLICKING THE RETURN TO QUESTIONNAIRE BUTTON -->
      <!-- WE ATTEMPTED TO DISPLAY THE INFORMATION THAT WAS MOST PERTINENT, INCLUDING NAME, AGE ETC -->
      <div class = "page-wrap">
      <?php include_once('navbar.php'); ?>
            <div class="container"><div class="row">
                <h2 class="col-md-12">Individual Profile</h2>
                <form>
                    <!-- HERE WE HAVE A BUTTON THAT ALLOWS THE USER TO TRAVEL BACK TO QUESTIONAIRE IN ORDER TO CHANGE THEIR ANSWERS -->
                    <div style="text-align: center; ">If you would like to change your individual answers, click this button to go to our questionnaire.<button id="button" style="background-color:white; margin: 1%; color: black;" class="btn btn-primary" type="button" onclick="jump();">Questionnaire</button></div>
                </form>
                <form action="profile.php" method="post" id="profile">
                    <div class="col-sm-6 border-right-container">
                        <div class="form-group">
                            <label for="individual_name">Name:</label>
                            <input type="text" class="form-control" id="individual_name" value="<?php echo $user["name"]; ?>" placeholder="Your name" name="gname" disabled>
                        </div>
                        <div class="form-group">
                            <label for="individual_rin">RIN:</label>
                            <input type="number" class="form-control" id="individual_rin" value="<?php echo $user["rin"]; ?>" placeholder="Your RIN number" name="grin" disabled>
                        </div>
                        <div class="form-group">
                            <label for="individual_email">E-mail:</label>
                            <input type="email" class="form-control" id="individual_email" value="<?php echo $user["email"]; ?>" placeholder="Your e-mail address" name="gemail" disabled>
                        </div>
                        <div class="form-group">
                            <label for="individual_age">Age:</label>
                            <input type="number" class="form-control" id="individual_age" value="<?php echo $profile["age"]; ?>" placeholder="Your age" name="gage" disabled>
                        </div>
                        <div class="form-group">
                            <label for="individual_year">Year in College:</label>
                            <select id="individual_year" class="form-control" name="gyear" disabled>
                                <option value="freshman">Freshman</option>
                                <option value="sophomore">Sophomore</option>
                                <option value="junior">Junior</option>
                                <option value="senior">Senior</option>
                                <option value="graduate">Graduate Student</option>
                            </select>
                        </div>
                        </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="individual_budget">What is your budget for housing per month?</label>
                            <input type="text" class="form-control" id="individual_budget" value="<?php echo $profile["budget"]; ?>" placeholder="Your budget" name="gbudget" disabled>
                        </div>
                        <div class="form-group">
                            <label for="individual_number">How many people are you looking for?</label>
                            <input type="text" class="form-control" id="individual_number" value="<?php echo $profile["number"]; ?>" placeholder="Number of people" name="gnumber" disabled>
                        </div>
                        <div class="form-group">
                            <label for="individual_gender">Gender:</label>
                            <input type="text" class="form-control" id="individual_gender" value="<?php echo $profile["gender"]; ?>" placeholder="Your gender" name="ggender" disabled>
                        </div>
                        <div class="form-group">
                            <label for="individual_coed">Co-Ed Housing?</label>
                            <select id="individual_coed" class="form-control" name="gcoed" disabled>
                                <option value="coedno">No</option>
                                <option value="coedyes">Yes</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once('footer.php') ?>
  </body>
</html>
