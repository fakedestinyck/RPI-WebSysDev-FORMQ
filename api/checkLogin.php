<?PHP defined('check') or die('No direct script access allowed.');
    session_start();
    $is_token_valid = false;
    if (isset($_SESSION["token"])) {
        $user_name = $_SESSION["name"];
        $user_rin = $_SESSION["rin"];
        $user_email = $_SESSION["email"];
        $user_role = $_SESSION["role"];
        $encrypt = crypt(md5($user_name.$user_email.$user_role),md5(md5($user_rin)));
        if ($_SESSION["token"] == $encrypt) {
            $is_token_valid = true;
        }
    }
    if (!$is_token_valid) {
        include_once("CAS-1.3.5/CAS.php");
        phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
        // SSL!
        phpCAS::setCasServerCACert("./cacert.pem");//this is relative to the cas client.php file

        if (!phpCAS::isAuthenticated())
        {
            header("Location: api/login.php");
        }
    }
?>
