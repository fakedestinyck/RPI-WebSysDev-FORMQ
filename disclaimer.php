<?php
define( 'check', true );
include_once("api/checkLogin.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FORM QS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <style>
      .page-header{
          color: white;
          margin-top: 0px;
          background-color:darkred;
          font-family: 'Playfair Display', serif;
      }
      body{
          color: black;
          background-color:darkred;
          font-family: 'Fira Sans', sans-serif;
          font-size: 200%;
      }
      h1{
        color: white;
        text-align: center;
        font-size: 600%;
      }
      h2{
        color: white;
        font-size: 300%;
        text-align: center;
        font-family: 'Playfair Display', serif;
        margin: 2%;
      }   
    </style>
  </head>
  <body>
      <?php include_once('navbar.php'); ?>
      <h1 class="page-header">Form Q</h1>
      <h2>Disclaimer</h2>
        <!-- inspired by https://www.bu.edu/tech/about/policies/websites-disclaimer/-->
        <div class="forstyle" style="color:white; margin-left: 7%;margin-right: 7%">
            <p> The contents of all pages published by students or individuals are solely the responsibility of the page authors. Statements made and opinions expressed are strictly those of the authors and not Rensselaer Polytechnic Institute.</p>
            <p>Rensselaer Polytechnic Institute does not review, approve, or endorse the contents of personal pages, nor does the University monitor the content of any page except as necessary to investigate alleged violations of Institute policies, federal, state, or local laws, or the rights of other persons.</p>
            <p>By using this website, you agree to let other all other students at Rensselaer Polytechnic Institute see your responses to the questionnaire.  Administrators (see the About Us page for more details) reserve the right to remove a student, or his or her answers, from the website for any reason.</p>
            <p>FORM Q uses cookies.  By continuing to use this website, you are providing consent for cookies to be used.</p>
        </div>
    <?php include_once('footer.php') ?>
  </body>
</html>
