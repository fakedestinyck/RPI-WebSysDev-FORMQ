<?php
    // defined('BASEPATH') OR exit('No direct script access allowed');
    if(empty($_SESSION['loginStatus']['status']) || !$_SESSION['loginStatus']['status']) {
        header("Location: index.php");
    } else {
        echo "Login";
    }
?>
