<?PHP

    include_once("./CAS-1.3.5/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    // SSL!
    phpCAS::setCasServerCACert("./cacert.pem");//this is relative to the cas client.php file
    unset($_SESSION["name"]);
    unset($_SESSION["rin"]);
    unset($_SESSION["email"]);
    unset($_SESSION["rcsid"]);
    unset($_SESSION["role"]);
    if (phpCAS::isAuthenticated())
    {
        phpCAS::logoutWithRedirectService('www.google.com');
    }else{
        header('location: ./index.php');
    }
?>
