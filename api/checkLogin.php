<?PHP defined('check') or die('No direct script access allowed.');
    session_start();
    $is_token_valid = false;
    if (isset($_SESSION["token"])) {
        $delta = time()-$_SESSION["last_activity"];
        echo "<script type='text/javascript'>console.log($delta);</script>";
        if ($delta > 600) {
            $_SESSION["token"] = "invalid";
        } else {
            $_SESSION["last_activity"] = time();
        }
        $user_name = $_SESSION["name"];
        $user_rin = $_SESSION["rin"];
        $user_email = $_SESSION["email"];
        $user_role = $_SESSION["role"];
        $encrypt = crypt(md5($user_name.$user_email.$user_role),md5(md5($user_rin)));
        $token = $_SESSION["token"];
        if ($_SESSION["token"] == $encrypt) {
            $is_token_valid = true;
            if ($user_role == 3){
                header('HTTP/1.0 403 Forbidden');
                include_once('error/403.php');
                die;
            }
        }
    }

    if (!$is_token_valid) {
        echo "<script type='text/javascript'>console.log($user_name);;</script>";
        include_once("CAS-1.3.5/CAS.php");
        phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
        // SSL!
        phpCAS::setCasServerCACert("./cacert.pem");//this is relative to the cas client.php file

        session_unset();
        session_destroy();
        if (!phpCAS::isAuthenticated()) {
            header("Location: api/login.php");
        }
    }
?>
