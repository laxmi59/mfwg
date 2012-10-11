<?php
session_start();
$_SESSION['userid']='';
$_SESSION['NAME']='';
$_SESSION['EMAIL']='';
session_destroy();
header('location: index.php');
exit;
?>