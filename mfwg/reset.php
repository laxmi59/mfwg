<?php
include_once('classes/class.system.php');
include_once('classes/class.js.php');
$obj=new System();
$obj->dbconn();
extract($_POST);
extract($_GET);
$result=false;
$result_success=false;
$error='';
if($t!='')
{
$data=$obj->check_toke($obj->clean($t));

if($data)
{
$result=$data;
}
else
{
$error='This link expired.';
}

}
if(isset($Submit) && $auth_token!='')
{
$password=$obj->clean($password);
if($password!='')
{
$auth_token=$obj->clean($auth_token);
$result_success=$obj->set_password($auth_token,$password);
header('location: index.php?msg=8');
}
else
{
$error='Password not updates.';
}
}

?>

<script>
function checkpassword()
{	var err='';
	if($.trim($('#password_m').val())=='')
	{
		err+="Enter Password\n";
	}
	if($.trim($('#cpassword').val())=='')
	{
		err+="Enter confirm Password\n";
	}
	if($.trim($('#password_m').val())!='' && $.trim($('#cpassword').val())!='')
	{
		if($.trim($('#password_m').val())!=$.trim($('#cpassword').val()))
		err+="Password and confirm password are not match.\n";
	}
	if(err!='')
	{
	alert(err);
	return false;
	}
	else
	{
		return true;
	}
	
}
</script>
<title>Reset Password</title>
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<?php include('includes/header.php'); ?>
<body onload=P7_initPM(1,0,1,-20,10)>
<div class="site-image" id="site-image">
  <div class="hfeed" id="page">
    <div id="main">
      <form method="post" enctype="multipart/form-data">
        <div id="primary" class="reset pd30">
          <h1><span>Reset</span> Password </h1>
          <div class="content">   
	  <?php
		  if($result)
		  {
		  ?>
	 
      <ul>
        <li>
          <label>Password</label><input name="password" type="password" id='password_m' class="input"   />
        </li>
        <li>
          <label>Confirm Password</label><input name="cpassword" type='password' id='cpassword' class="inputs"  />
        </li>
		<li><input type='hidden' name='auth_token' value='<?php echo $result['auth_token']; ?>'>
			<input name="Submit" type="submit" class="reset-btn" id="button" value="" onclick='return checkpassword();' /></li>
      </ul>
    
	  
	  <?php } else if($result_success)
		  {?>
		  <ul>
            <li>Password updated successfully.</li>
          </ul>	
		  <?php
		  }
		  else
		  {
		  ?>
		  <ul>
            <li><?php echo $error; ?></li>
          </ul>	
		  <?php
		  }
		  ?> 
     </div> 
  
           
        </div>
      </form>
      <!-- #content -->
    </div>
    <div class="pkgpage-shadow"></div>
    <div class="clr" > </div>
    <!-- #primary -->
  </div>
  <!-- #main -->
</div>
<!-- site-image -->
    

<?php include('includes/footer.php'); ?>
</body>
</html>