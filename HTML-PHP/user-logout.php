<?php
session_start();
$_SESSION = array();
session_unset();
session_destroy();

//Weiterleitung zur User-Login-Seite
header("Location: user-login.php");
?>