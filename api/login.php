<?PHP

    include_once("../CAS-1.3.5/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    // SSL!
    phpCAS::setCasServerCACert("../cacert.pem");//this is relative to the cas client.php file

    if (!phpCAS::isAuthenticated())
    {
        phpCAS::forceAuthentication();
    }else{
        define( 'login', true );
        include_once("storeretrievedata.php");
        header('location: ../questionaire.php');
    }

?>
