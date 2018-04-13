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
    <script type="text/javascript" src="questionaire.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <style>
        .page-header{
            color: white;
            margin-top: 0px;
            background-color:darkred;
            font-family: 'Playfair Display', serif;
        }
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
            background: url('resources/pics/dorm.jpg') no-repeat;
            background-size:cover;
            font-family: 'Fira Sans', sans-serif;
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
            font-family: 'Playfair Display', serif;
            margin: 2%;
        }
        .container{
            margin-bottom:5%;
            padding: 3%;
            background:rgba(255,255,255,0.8);
            margin-top: 50px;
            border: 10px solid rgba(139, 0, 0, 0.8);
        }
        /* Floats need to be cleared so the container will wrap correctly. */
        div.clear {
            clear:both;
        }
    </style>
  </head>
  <body >
      <h1 class="page-header">Form Q</h1>
        <div class="container"><div class="row">
            <form action="questionaire.php" method="post" id="myform">
                <div id="first">
                    <h2>Grouping</h2>
                    <p>Click on an image below to choose group or single</p>
                    <div class="col-sm-6"><img src="resources/pics/group.png" id="groupphoto" style="width:400px;height:400px;"></div>
                    <div class="col-sm-6"><img src="resources/pics/single.png" id="singlephoto" style="width:170px;height:300px;"></div>
                </div>
                <div id="campus">
                    <h2>On campus</h2>
                    <p class="center">Click on an image below to choose on campus or off campus living</p>
                    <div class="col-sm-6"><div class="center"><img src="resources/pics/Barton.jpg" id="ocampus" class="center" style="width:300px;height:300px;"></div></div>
                    <div class="col-sm-6"><div class="center"><img src="resources/pics/troy.JPG" id="offcampus" style="width:300px;height:300px;"></div></div>
                </div>
                <div id="secondI">
                    <h2>Individual Information</h2>
                    <div class="col-sm-6" style="padding-left: 20%;">
                        <div class="form-group">
                            <label for="individual_name">Name:</label>
                            <input type="text" class="form-control" id="individual_name" placeholder="Your name" name="name" required>
                        </div>
<!--                        <p>Name:</p><input type="text" name="name">-->
                        <div class="form-group">
                            <label for="individual_rin">RIN:</label>
                            <input type="number" class="form-control" id="individual_rin" placeholder="Your RIN number" name="rin" required>
                        </div>
                        <div class="form-group">
                            <label for="individual_email">E-mail:</label>
                            <input type="email" class="form-control" id="individual_email" placeholder="Your e-mail address" name="email" required>
                        </div>
<!--                        <p>E-mail:</p><input type="text" name="email">-->
                        <div class="form-group">
                            <label for="individual_age">Age:</label>
                            <input type="number" class="form-control" id="individual_age" placeholder="Your age" name="age" required>
                        </div>
<!--                        <p>Age:</p><input type="text" name="age">-->
                        <div class="form-group">
                            <label for="individual_year">Year in College:</label>
                            <select id="individual_year" class="form-control" name="year">
                                <option value="freshman">Freshman</option>
                                <option value="sophomore">Sophomore</option>
                                <option value="junior">Junior</option>
                                <option value="senior">Senior</option>
                                <option value="graduate">Graduate Student</option>
                            </select>
                        </div>
<!--                        <p>Year in College:</p><select name="year">-->
<!--                    </select>-->
                    </div>
                    <div class="col-sm-6"style="border-left: 5px solid darkred;padding-left: 13%">
                        <p>What is your budget for housing per month?</p><input type="text" name="budget">
                        <p>How many people are you looking for?</p><input type="text" name="number">
                        <p>Gender: </p><input type="text" name="gender">
                        <p>Co-Ed Housing?</p><select name="coed">
                          <option value="coedyes">Yes</option>
                          <option value="coedno">No</option>
                        </select>
                    </div>
                </div>
                <div id="secondG">
                    <h2>Group Information</h2>
                    <div class="col-sm-6"style="padding-left: 20%; border-right: 5px solid darkred;">
                        <p>Name: </p><input type="text" name="gname">
                        <p>E-mail: </p><input type="text" name="gemail">
                        <div id="groupmembers"><p>Enter individual RCSIDs of group members: </p><input type="text" name="groupmember1" id ="groupmember1"><div style="text-align: center; padding: 2%;"><div id="toadd"></div><button type="button" id="addbutton" name="addbutton" style="background-color:darkred; margin: 2%;" class="btn btn-primary">Add Another Member</button></div></div>
                        <p>Age: </p><input type="text" name="gage">
                    </div>
                    <div class="col-sm-6" style="padding-left: 13%">
                        <p>Year in College: </p><select name="gyear">
                          <option value="gfresman">Freshman</option>
                          <option value="gsophmore">Sophmore</option>
                          <option value="gjunior">Junior</option>
                          <option value="gsenior">Senior</option>
                          <option value="ggraduate">Graduate Student</option>
                        </select>
                        <p>What is your budget for housing per month? </p><input type="text" name="gbudget">
                        <p>How many people are you looking for? </p><input type="text" name="gnumber">
                        <p>Gender: </p><input type="text" name="ggender">
                        <p>Co-Ed Housing? </p><select name="gcoed">
                          <option value="gcoedyes">Yes</option>
                          <option value="gcoedno">No</option>
                        </select>
                    </div>
                </div>
                <div id="life">
                    <h2>Life Style</h2>
                    <div class = "col-sm-4">
                        <p class="center">Please answer the following</p>
                    </div>
                    <div class = "col-sm-8">
                        <p class="center">On a scale from 1-5 rank:</p>
                    </div>
                    <div class = "col-sm-4">
                        <p>Any allergies? </p><input type="text" name="allergies">
                        <p>Do you smoke? </p><select name="smoke">
                          <option value="smokeyes">Yes</option>
                          <option value="smokeno">No</option>
                        </select>
                        <p>What is the latest time you go to bed? </p> <select name="bedtime">
                          <option value="bedtime8">8 PM</option>
                          <option value="bedtime9">9 PM</option>
                          <option value="bedtime10">10 PM</option>
                          <option value="bedtime11">11 PM</option>
                          <option value="bedtime12">12 AM</option>
                          <option value="bedtime1">1 AM</option>
                          <option value="bedtime2">2 AM</option>
                          <option value="bedtime3">3 AM</option>
                          <option value="bedtime4">4 AM</option>
                          <option value="bedtime5">5 AM</option>
                          <option value="bedtime6">6 AM</option>
                        </select>
                        <p>Morning Person or Night Person </p><select name="mornnight">
                          <option value="morning">Morning</option>
                          <option value="night">Night</option>
                          <option value="mornightnopref">No Preference</option>
                        </select>
                        <p>Pets? </p><select name="mornnight">
                          <option value="petsyes">Yes</option>
                          <option value="petsno">No</option>
                        </select>
                    </div>
                    <div class = "col-sm-4" style="border-left: 5px solid darkred;border-right: 5px solid darkred;">
                        <p>How strict are you with sticking to a schedule?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="schedule" name="schedule">
                            <div id="scheduleoutput">Output: </div>
                        </div>
                        <p>How much can you handle a mess?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="mess" name = "mess">
                            <div id="messoutput">Output: </div>
                        </div>
                        <p>How much alcohol do you drink?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="drink" name="drink">
                            <div id="drinkoutput">Output: </div>
                        </div>
                        <p>How much do you party?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="party" name="party">
                            <div id="partyoutput">Output: </div>
                        </div>
                        <p></p>
                    </div>
                    <div class = "col-sm-4">
                        <p>How much TV do you watch?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="tv" name="tv">
                            <div id="tvoutput">Output: </div>
                        </div>
                        <p>How much of a gamer are you?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="gamer" name="gamer">
                            <div id="gameroutput">Output: </div>
                        </div>
                        <p>How sensitive are you to loud music?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="music" name="music">
                            <div id="musicoutput">Output: </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <p style="padding: 2%;">Here is a section where you get to customize your response.  Feel free to create a more personal description of yourself, your group or your ideal roommate(s).  Think about this part like a "description" (i.e. 3 girls searching for a 4th female roommate who doesn't smoke...).</p>
                   <input type="text" id="notes" name="notes" style="padding: 1%; height: 250px; width: 100%;">
                </div>                
            </form></div>
            <div style="text-align: center; padding: 2%;"><button id="button" style="background-color:darkred; margin: 2%;" class="btn btn-primary">Submit</button></div>
            <div class="clear"></div>
      </div>
  </body>
</html>
