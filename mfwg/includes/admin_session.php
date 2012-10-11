<?php
if(!isset($_SESSION["ADMIN_USER_ID"]) || (int)$_SESSION["ADMIN_USER_ID"]==0)
{
header('Location: index.php');
//echo 'hi';
exit;
}
?>