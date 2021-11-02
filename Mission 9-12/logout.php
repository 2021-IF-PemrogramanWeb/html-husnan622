<?php
session_start();
//make sure the session is not running again
$_SESSION=[];
session_unset();
session_destroy();

//back to login page
header("Location: login.php");
exit;
?>