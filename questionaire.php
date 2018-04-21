<?php
define( 'check', true );
include_once("api/checkLogin.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FORM QS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="questionaire.js"></script>
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
            .border-left-container {
                border-left: 5px solid white;
            }
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
  <body  id = "bodyforNav">
  <div class="page-wrap">
    <?php include_once('navbar.php'); ?>
        <div class="container">
            <form action="questionaire.php" method="post" id="myform">
                <div id="first" class="row">
                    <h2 class="title">Grouping</h2>
                    <p class="center">Click on an image below to choose to fill out a group profile or an individual profile</p>
                    <div class="col-sm-6"><div class="center"><h2 style = "font-size: 140%;">Group</h2><img src="resources/pics/groupimg.jpg" id="groupphoto" class="img-thumbnail" class="center" style="width:450px;height:300px;"></div></div>
                    <div class="col-sm-6"><h2 style = "font-size: 140%;">Individual</h2><div class="center"><img src="resources/pics/individualimg.jpeg" id="singlephoto" class="img-thumbnail" style="width:450px;height:300px;"></div></div>
                </div>
                <div id="campus">
                    <h2>On campus</h2>
                    <p class="center">Click on an image below to choose on campus or off campus living</p>
                    <div class="col-sm-6"><div class="center"><h2 style = "font-size: 140%;">On Campus</h2><img src="resources/pics/Barton.jpg" id="ocampus" class="img-thumbnail" class="center" style="width:300px;height:300px;"></div></div>
                    <div class="col-sm-6"><div class="center"><h2 style = "font-size: 140%;">Off Campus</h2><img src="resources/pics/troy.JPG" id="offcampus" class="img-thumbnail" style="width:300px;height:300px;"></div></div>
                </div>
                <div id="secondI" class="row">
                    <h2>Individual Information</h2>
                    <div class="col-sm-6 border-right-container">
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
                        <div class="form-group">
                            <label for="individual_year">Year in College:</label>
                            <select id="individual_year" class="form-control" name="year"><div style="color:black">
                                <option value="freshman">Freshman</option>
                                <option value="sophomore">Sophomore</option>
                                <option value="junior">Junior</option>
                                <option value="senior">Senior</option>
                                <option value="graduate">Graduate Student</option>
                                </div>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="budget">What is your budget for housing per month?</label>
                            <input type="number" class="form-control" id="budget" placeholder="Your budget in dollars" name="budget" required>
                        </div>
                        <div class="form-group">
                            <label for="individual_number">How many people are you looking for?</label>
                            <input type="text" class="form-control" id="individual_number" placeholder="Number of people" name="number" required>
                        </div>
                        <div class="form-group">
                            <label for="individual_gender">Gender:</label>
                            <input type="text" class="form-control" id="individual_gender" placeholder="Your gender" name="gender" required>
                        </div>
                        <div class="form-group">
                            <label for="individual_coed">Co-Ed Housing?</label>
                            <select id="individual_coed" class="form-control" name="coed">
                                <option value="coedno">No</option>
                                <option value="coedyes">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="secondG">
                    <h2>Group Information</h2>
                    <div class="col-sm-6 border-right-container">
                        <div class="form-group">
                            <label for="group_name">Name:</label>
                            <input type="text" class="form-control" id="group_name" placeholder="Your name" name="gname"  required>
                        </div>
                        <div class="form-group">
                            <label for="group-rin">Rin:</label>
                            <input type="text" class="form-control" id="group_rin" placeholder="Your Rin" name="grin"  required>
                        </div>
                        <div class="form-group">
                            <label for="group_email">E-mail:</label>
                            <input type="email" class="form-control" id="group_email" placeholder="Your e-mail address" name="gmail" required>
                        </div>
                        <div class="form-group">
                            <label for="group_age">Age:</label>
                            <input type="number" class="form-control" id="group_age" placeholder="Your age" name="gage" required>
                        </div>
                        <div class="form-group">
                            <label for="groupmember1">RCS:</label>
                            <input type="number" class="form-control" id="groupmember1" placeholder="RCS ID" name="groupmember1" required>
                            <div style="text-align: center; padding: 2%;"><div id="toadd"></div><button type="button" id="addbutton" name="addbutton" style="background-color:white; margin: 2%; color: black;" class="btn btn-primary">Add Another Member</button></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="group_year">Year in College:</label>
                            <select id="group_year" class="form-control" name="gyear">
                                <div style="color:black">
                                    <option value="gfreshman">Freshman</option>
                                    <option value="gsophomore">Sophomore</option>
                                    <option value="gjunior">Junior</option>
                                    <option value="gsenior">Senior</option>
                                    <option value="ggraduate">Graduate Student</option>
                                </div>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="group_budge">What is your budget for housing per month?</label>
                            <input type="number" class="form-control" id="group_budge" placeholder="Your budget in dollars" name="gbudget" required>
                        </div>
                        <div class="form-group">
                            <label for="group_number">How many people are you looking for?</label>
                            <input type="text" class="form-control" id="group_number" placeholder="Number of people" name="gnumber" required>
                        </div>
                        <div class="form-group">
                            <label for="group_gender">Gender:</label>
                            <input type="text" class="form-control" id="group_gender" placeholder="Your gender" name="ggender" required>
                        </div>
                        <div class="form-group">
                            <label for="group_coed">Co-Ed Housing?</label>
                            <select id="group_coed" class="form-control" name="gcoed">
                                <option value="gcoedno">No</option>
                                <option value="gcoedyes">Yes</option>
                            </select>
                        </div>
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
                        <div class="form-group">
                            <label for="individual_number">Any allergies?</label>
                            <input type="text" class="form-control" id="allergies" placeholder="Ex: Peanuts, Dogs..." name="allergies" required>
                        </div>
                        <label for="smoke">Smoke?</label>
                        <select id="smoke" class="form-control" name="smoke">      <div style="color:black">
                                <option value="smokeyes">Yes</option>
                                <option value="smokeno">No</option>
                            </div>
                        </select>
                        <label for="bedtime">What is the latest bedtime?</label>
                        <select id="bedtime" class="form-control" name="bedtime">      <div style="color:black">
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
                            </div>
                        </select>
                        <label for="mornnight">What is the latest bedtime?</label>
                        <select id="mornnight" class="form-control" name="mornnight">      <div style="color:black">
                                <option value="Morning">Morning</option>
                                <option value="Night">Night</option>
                                <option value="No Preference">No Preference</option>
                            </div>
                        </select>
                        <label for="pets">Do you want pets?</label>
                        <select id="pets" class="form-control" name="pets">
                            <div style="color:black">
                                <option value="petsyes">Yes</option>
                                <option value="petsno">No</option>
                            </div>
                        </select>
                    </div>
                    <div class = "col-sm-4 border-left-container border-right-container">
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
                    <div class="form-group">
                        <p style="text-align: left; margin: 1%;">Here is a section where you get to customize your response.  Feel free to create a more personal description of yourself, your group or your ideal roommate(s).  Think about this part like a "description" (i.e. 3 girls searching for a 4th female roommate who doesn't smoke...).</p>
                        <textarea class="form-control" name="notes" rows="8" cols="168"></textarea>
                    </div>
                </div>                
            </form>
            <div style="text-align: center; padding: 2%;"><button id="button" style="background-color:white; margin: 1%; color: black;" class="btn btn-primary">Submit</button></div>
            <div class="clear"></div>
      </div>
  </div>
    <?php include_once('footer.php') ?>
  </body>
</html>
