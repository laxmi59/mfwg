<?php
include_once("classes/class.system.php");
include_once('includes/checksession.php');
ob_start();
$obj=new System();
$obj->dbconn();
$data=$obj->getlib((int)$_GET['id']);
#print_r($data);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>View Document </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>
 <body>
<?php echo $data['description']; ?>
 </body>
</html>
