<?php
session_start();
$_SESSION = array();
session_unset();
session_destroy();

//Weiterleitung zur Backend-Login-Seite
header("Location: index.php");
?>