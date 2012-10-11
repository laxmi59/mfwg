<?php
if(!isset($_SESSION["userid"]) || (int)$_SESSION["userid"]==0)
{
	header('Location: index.php');
	exit;
}
?>