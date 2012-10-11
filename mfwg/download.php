<?php
include_once("classes/class.system.php");
include_once('includes/checksession.php');
ob_start();
$obj=new System();
$obj->dbconn();
$data=$obj->getlib((int)$_GET['id']);
header('Content-disposition: attachment; filename='.$data['path']);
header('Content-type: application/pdf');
readfile('uploads/'.$data['path']);
?>
