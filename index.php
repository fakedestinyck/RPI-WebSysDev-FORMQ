<?PHP

    include_once("./CAS-1.3.5/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    phpCAS::setDebug("log.log");
    // SSL!
    phpCAS::setCasServerCACert("./cacert.pem");//this is relative to the cas client.php file

    if (phpCAS::isAuthenticated())
    {
        // echo "Welcome to FORM Q, " . phpCAS::getUser(). "!";
        //
        // echo "<a href='./logout.php'>Logout</a>";
        header('location: ./questionaire.php');
    }else{
        echo "<a href='./login.php'>Login</a>";
    }

?>
