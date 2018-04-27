<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FORM QS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
    <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
    <style>
      .page-header{
        color: white;
        margin-top: 0px;
        background-color:darkgray;
        font-family: 'Playfair Display', serif;
      }
      body{
        color: black;
        background-color:darkgray;
        font-family: 'Fira Sans', sans-serif;
        font-size: 200%;
      }
      .format{
        margin-left: 10%;  
        margin-right: 10%;
        color:white;
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
      h2{
        color: white;
        font-size: 300%;
        text-align: center;
        font-family: 'Playfair Display', serif;
        margin: 2%;
      }    
    </style>
  </head>
  <body id = "bodyforNav">
  <?php include_once('navbar.php'); ?>
  <!-- BOOTSTRAP CONTAINER WAS USED TO MAKE EASY TO READ COLUMNS -->
  <div class="container">
      <h2>About FORM Q</h2>
      <div class="format">
          <div class="row"> We want to help Rensselaer students find roommates.  As members of both Rensselaer's community, we recognize there are challenges for students looking to find roommates. We look to alleviate these problems.  After students sign in with Rensselaer's very own Central Authentication System, our website helps students with the following:
              <div class="col-sm-4">
                  <h2 style = "font-size:150%;">Off Campus Living</h2>
                  <p style="font-size:80%;">Rensselaer has no tool to help students looking to live off campus find roommates. FORM Q provides students, typically upperclassmen, to find other students living off campus.  FORM Q provides a search option that will list the most similar groups/individuals to a user's preferences.  Rent, proximaty to campus and other important questions are all included!</p>
              </div>
              <div class="col-sm-4">
                  <h2 style = "font-size:150%;">Grouping</h2>
                  <p style="font-size:80%;">Ever had a hard time looking for a group of 2 to room with?  What about groups even larger?  Our solution looks to fill the need of students looking for groups and the need of groups to find additional people to live with.  This is especially important for students looking to live off campus.</p>
              </div>
              <div class="col-sm-4">
                  <h2 style = "font-size:150%;">Customization</h2>
                  <p style="font-size:80%;">Our questions are made by students for students. We put effort into making sure our questions covered topics we identified important as students (and include questions the school may be hesistant to ask). We also have an option for a customized paragraph where students can include a more in depth description of group/individual they are looking to match with.</p>
              </div>
          </div>
          <h2>Who are we?</h2>
          <!-- AS WE ARE ADMINISTRATORS OF THIS WEBSITE, OUR USERS NEED TO KNOW MORE DETAILES ABOUT WHO WE ARE AND WHY WE WANTED TO
          MAKE FORM Q-->
          <div class="row">
              <div class="col-md-2 col-md-offset-1"> 
                  <img src="resources/aboutus/samad.jpg" class="img-circle" style="max-width: 100%;    height: auto;">
                  <p style="font-size:60%">Samad Farooqui is a junior Computer Science (CS) and ITWS dual major. He has experience as a Software Development Intern at Optum, and currently serves as a Resident Assistant at RPI. He served as a Front End Developer for this project.</p>
              </div>
              <div class="col-md-2">
                  <img src="resources/aboutus/osama.jpg" class="img-circle" style="max-width: 100%;    height: auto;">
                  <p style="font-size:60%">Osama Minhas is a sophomore CS and ITWS dual major. His skills include PHP, SQL, HTML5, CSS, JavaScript, jQuery, C/C++, and Python. He served as a Full Stack Developer for this project. </p>    
              </div>
              <div class="col-md-2">
                  <img src="resources/aboutus/omer.jpg" class="img-circle" style="max-width: 100%;    height: auto;">
                  <p style="font-size:60%">Omer Osman is a senior ITWS major with a concentration in Management Information Systems. He has experience as an IT Project Management Intern for the New York State Workers’ Compensation Board, a System Administrator for Annur Islamic School, and as Webmaster for RPI’s Muslim Student Association. He served as a Back End Developer for this project.</p> 
              </div>
              <div class="col-md-2">
                  <img src="resources/aboutus/caspar.jpg" class="img-circle" style="max-width: 100%;    height: auto;">
                  <p style="font-size:60%">Haochang Qian is a sophomore CS and ITWS dual major. He has experience in Full Stack Development, and Laravel Framework Applications. His skills include Back End Development, PHP, HTML5, CSS, JavaScript, Bootstrap, jQuery, C/C++, Java, PS/ID/AI, and Python. He served as a Back End Developer for this project. </p> 
              </div>
              <div class="col-md-2">
                  <img src="resources/aboutus/andrea2.jpg" class="img-circle" style="max-width: 100%;    height: auto;">
                  <p style="font-size:60%">Andrea O’Brisky is a junior ITWS major. She has experience working for IT Research and Development at Johnson and Johnson, as a Learning Assistant at RPI and as a Website Manager for the Women's Mentoring Program. She served as a Front End Developer for this project.
                  </p> 
              </div>
          </div>
      </div>
    </div>
    <?php include_once('footer.php') ?>
  </body>
</html>
