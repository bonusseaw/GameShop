<?php
session_start();
session_unset();
session_destroy();
if (ini_get("session.use_cookies")) 
    { setcookie(session_name(),'',time() -3600,"/"); } 
header("Location: index.php");
?>