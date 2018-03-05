<?php include_once("checkLogin.php") ?>
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
          font-family: 'Roboto', sans-serif;
          background-image: url('dorm.jpg');
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
          margin: 2%;
      }
      .container{
          margin-bottom:5%;
          padding: 3%;
          background:rgba(255,255,255,0.8);
          border-width: 10px 10px 10px 10px;
          margin-top: 50px;
          border-style: solid;
          border-color:rgba(139,0,0,0.8);
      }
      /* Floats need to be cleared so the container will wrap correctly. */
      div.clear {
          clear:both;
      }
    </style>
  </head>
  <body >
      <h1 class="page-header">Form Q</h1>
        <div class="container">
            <form action="questionaire.php" method="post">
                <div id="first">
                    <h2>Grouping</h2>
                    <p>Click on an image below to choose group or single</p>
                    <div class="col-sm-6"><img src="group.png" id="groupphoto" style="width:400px;height:400px;"></div>
                    <div class="col-sm-6"><img src="single.png" id="singlephoto" style="width:170px;height:300px;"></div>
                </div>
                <div id="campus">
                    <h2>On campus</h2>
                    <p class="center">Click on an image below to choose on campus or off campus living</p>
                    <div class="col-sm-6"><div class="center"><img src="Barton.jpg" id="ocampus" class="center" style="width:300px;height:300px;"></div></div>
                    <div class="col-sm-6"><div class="center"><img src="troy.JPG" id="offcampus" style="width:300px;height:300px;"></div></div>
                </div>
                <div id="secondI">
                    <h2>Individual Information</h2>
                    <div class="col-sm-6"style="padding-left: 20%;">
                        <p>Name:</p><input type="text" name="name">
                        <p>E-mail:</p><input type="text" name="email">
                        <p>Age:</p><input type="text" name="age">
                        <p>Year in College:</p><select name="year">
                          <option value="fresman">Freshman</option>
                          <option value="sophmore">Sophmore</option>
                          <option value="junior">Junior</option>
                          <option value="senior">Senior</option>
                          <option value="graduate">Graduate Student</option>
                    </select>
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
                            <input type="range" min="1" max="5" value="1" class="slider" id="schedule">
                            <div id="scheduleoutput">Output: </div>
                        </div>
                        <p>How much can you handle a mess?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="mess">
                            <div id="messoutput">Output: </div>
                        </div>
                        <p>How much do you drink?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="drink">
                            <div id="drinkoutput">Output: </div>
                        </div>
                        <p></p>
                    </div>
                    <div class = "col-sm-4">
                        <p>How much TV do you watch?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="tv">
                            <div id="tvoutput">Output: </div>
                        </div>
                        <p>How much of a gamer are you?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="gamer">
                            <div id="gameroutput">Output: </div>
                        </div>
                        <p>How sensitive are you to loud music?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="music">
                            <div id="musicoutput">Output: </div>
                        </div>
                        <p>How much do you party?</p><div class="slidercontainer">
                            <input type="range" min="1" max="5" value="1" class="slider" id="party">
                            <div id="partyoutput">Output: </div>
                        </div>
                        <p></p>
                    </div>
                </div>
                <div id="pref">
                    <h2>Preferences</h2>
                    <p>Do you have friends over often? </p><select name="friends">
                      <option value="friendsall">All the time</option>
                      <option value="friendsoften">Often</option>
                      <option value="friendssome">Sometimes</option>
                      <option value="friendsnever">Never</option>
                    </select>
                    <p>Do you want to host parties? </p><select name="friends">
                      <option value="partiesall">All the time</option>
                      <option value="partiessoften">Often</option>
                      <option value="partiesssome">Sometimes</option>
                      <option value="partiesnever">Never</option>
                    </select>
                </div>
            </form>
            <div class="center"><button id="button">Submit</button></div>
            <div class="clear"></div>
      </div>

  </body>
</html>
