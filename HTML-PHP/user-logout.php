<?php
session_start();
$_SESSION = array();
session_unset();
session_destroy();
header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php");
?>