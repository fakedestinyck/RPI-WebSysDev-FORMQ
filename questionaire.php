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
      }
      
      .container{
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
            <form action="testingidea.php" method="post">
                <div id="first">
                    <h2>Grouping</h2> 
                    <p>Click on an image below to choose group or single</p>
                    <div class="col-sm-6"><img src="group.png" id="groupphoto" style="width:400px;height:400px;"></div>
                    <div class="col-sm-6"><img src="single.png" id="singlephoto" style="width:170px;height:300px;"></div>
                </div>
                <div id="campus">
                    <h2>On campus</h2>
                    <p>Click on an image below to choose on campus or off campus living</p>
                    <div class="col-sm-6"><img src="Barton.jpg" id="ocampus" style="width:300px;height:300px;"></div>
                    <div class="col-sm-6"><img src="troy.jpg" id="offcampus" style="width:300px;height:300px;"></div>
                </div> 
                <div id="secondI">
                    <h2>Individual Information</h2>
                    Name: <input type="text" name="name"><br>
                    E-mail: <input type="text" name="email"><br>
                </div>
                <div id="secondG">
                    <h2>Group Information</h2>
                    Name: <input type="text" name="name"><br>
                    E-mail: <input type="text" name="email"><br>
                </div>
                <div id="life">
                    <h2>Life Style</h2>
                    Name: <input type="text" name="name"><br>
                    E-mail: <input type="text" name="email"><br>
                </div>
                <div id="pref">
                    <h2>Preferences</h2>
                    Name: <input type="text" name="name"><br>
                    E-mail: <input type="text" name="email"><br>
                </div>
            </form>
            <button id="button">Submit</button>
      </div>

  </body>
</html>