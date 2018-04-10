<?php
define( 'check', true );
include_once("api/checkLogin.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FORM QS</title>
<!--    <link href="lab4.css" rel="stylesheet" type="text/css" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="questionaire.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Knewave" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <style>
      .page-header{
        color: white;
        margin-top: 0px;
        background-color:darkred;
        font-family: 'Knewave', cursive;
        }
      #first{
          text-align: center;
      }
      body{
          color: black;
          font-family: 'Roboto', sans-serif;
          background-image: url('resources/pics/dormpic.jpg');
          background-repeat: no-repeat;
          background-size:cover;
          font-family: 'Oswald', sans-serif;
          font-size: 200%;
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
          font-family: 'Knewave', cursive;
      }

      .container{
          margin-bottom:5%;
          padding: 3%;
          background:rgba(255,255,255,0.6);
          border-width: 10px 10px 10px 10px;
          height: 550px;
          margin-top: 50px;
          border-style: solid;
          border-color:rgba(139,0,0,0.6);

      }
      li{
          padding: 5%;
          background:rgba(255,255,255,0.6);
      }
    </style>
  </head>
  <body >
      <h1 class="page-header">Form Q</h1>
        <div class="container">
            <a href="api/logout.php">Demo Logout</a>
            <h2>Profile</h2>
            <form action="profile.php" method="post" id="profile">
                <div class="col-sm-6"style="padding-left: 20%;">
                    <p>Name: </p><input type="text" name="gname">
                    <p>E-mail: </p><input type="text" name="gemail">
                    <p>Age: </p><input type="text" name="gage">
                    <p>Year in College: </p><select name="gyear">
                        <option value="gfresman">Freshman</option>
                        <option value="gsophmore">Sophmore</option>
                        <option value="gjunior">Junior</option>
                        <option value="gsenior">Senior</option>
                        <option value="ggraduate">Graduate Student</option>
                    </select>
                    </div>
                <div class="col-sm-6"style="border-left: 5px solid darkred;padding-left: 13%">
                    <p>Budget for housing per month: </p><input type="text" name="gbudget">
                    <p>The number of people you are looking for: </p><input type="text" name="gnumber">
                    <p>Gender: </p><input type="text" name="ggender">
                    <p>Co-Ed Housing? </p><select name="gcoed">
                      <option value="gcoedyes">Yes</option>
                      <option value="gcoedno">No</option>
                    </select>
                </div>
            </form>
      </div>

  </body>
</html>
