<!-- Landing page -->

<?PHP

    include_once("./CAS-1.3.5/CAS.php");
    include_once("api/connect.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    phpCAS::setDebug("log.log");
    // SSL!
    phpCAS::setCasServerCACert("./cacert.pem");//this is relative to the cas client.php file

    if (phpCAS::isAuthenticated())
    {
        define( 'login', true );
        include_once("api/storeretrievedata.php");
        header('location: ./questionaire.php');
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Form Q</title>
        <script src="https://code.jquery.com/jquery-1.12.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
        <link href="index.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="full-wrapper">
            <h1 class="page-header">Form Q</h1>
            <div class ="container">
                <div class = "description"><h2 style="font-size:150%;">Welcome to Find Our Roommates Questionnaire</h2></div><br>
                <p>Our FORM Q team worked to create a website for Rensselaer students looking to find roommates.  We understand that finding roommates similar in personality and values can be difficult.  This becomes even harder as students become older and no longer want to live on campus.  Our solution works for on campus and off campus living.  Answer a few questions, and we'll match you with a roommate or group instantly.</p>
                <div class="btn-wrapper" style="text-align:center;">
                <a href="api/login.php"><button type="button" class="btn btn-outline-secondary btn-lg log" >Begin Your Search</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
