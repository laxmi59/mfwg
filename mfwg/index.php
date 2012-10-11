<?php
include_once("classes/class.system.php");
include_once("classes/class.js.php");
$S = new System();
$S->dbconn();
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["singup"] == 1)
{
	extract($_POST);
	$data=$_POST;
	//$phonenumber=$phone1."-".$phone2."-".$phone3;
	$res=$S->userAdd($data);
	if($res[0]==1)
	{
		Header("Location: package.php");
		exit;
	}
	else
	{
		$error_msg = $res[1];
	}
}
if(isset($_POST['email']) && $_POST['email']!='' && isset($_POST['password']) && $_POST['password']!='')
{	$email=$S->cleanEmail($S->clean($_POST['email']));
	$password=$S->clean(md5($_POST['password']));
	if(!$email)
	{
	 $error='Enter valid email.';
	}
	if(!$password)
	{
	 $error='Enter password.';
	}
	if($error=='')
	{
		$result=$S->checklogin($email,$password);
		if($result)
		{
			header('Location: member-home.php');
			exit;
		}
		else
		{
			$error='Username / Password invalid.';
		}
	}
}
if(isset($_POST['fg_email']) && $_POST['fg_email']!='')
{	 $email=$S->cleanEmail($S->clean($_POST['fg_email']));
	//$password=$S->clean(md5($_POST['password']));
	
	if(!$email)
	{
	 $error='Enter valid email.';
	}
	if($error=='')
	{
		$result=$S->checkuser($email);
		if($result)
		{
			$token=$S->reset_password_token($email,$result);
			if($token)
			{
			$error='Your reset password link has been sent to your Email Address.';
			}
			
		}
		else
		{
			$error='Email does not exists.';
		}
	}
}

?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fitness Website Gurus</title>
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<!--[if lt IE 9]>
<script src="js/html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]-->
<script type="text/javascript">
function validate()
{
	 var err='';
	
	if($.trim($('#email').val())=='')
	{
		if(err=='')$('#email').focus();
		err+='Please enter email.\n';
		
	}
	else if (!is_email($.trim($('#email').val())))
	{	if(err=='')$('#email').focus();
		err+='Please enter valid email.\n';
		
	}
	if($.trim($('#password').val())=='')
	{	if(err=='')$('#password').focus();
		err+='Please enter password.\n';
		
	}
	if(err!='')
	{
		alert(err);
		return false;
	 }
	else
	{
		$('#login').submit();
	}

}
function fogetpassword()
{

var err='';
if($.trim($('#fg_email').val())=='')
	{
		err+='Please enter email.';
		$('#fg_email').focus();

	}
	else if (!is_email($.trim($('#fg_email').val())))
	{
		err+='Please enter valid email.';
		$('#fg_email').focus();
	}
	if(err!='')
	{
		alert(err);
		return false;
	 }
	else
	{
		$('#AddItem_form').submit();
	}
}

function is_email(email)
{
pattren=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
return pattren.test(email);
}

$(document).ready(function(){
$('#fp').click(function(){
$('#forget_password').show();
$('#member-login').hide();
});

$('#can').click(function(){
$('#forget_password').hide();
$('#member-login').show();
});
});
function chkvalid() {
	
	if(document.regForm.invcode.value == "")
	{
		alert("Please Enter Invitation Code");
		document.regForm.invcode.focus();
		return false;
	}
	if(document.regForm.firstname.value == "")
	{
		alert("Please Enter Name");
		document.regForm.firstname.focus();
		return false;
	}
	if(document.regForm.lastname.value == "")
	{
		alert("Please Enter Name");
		document.regForm.lastname.focus();
		return false;
	}

	//phone
	if(document.regForm.phone1.value == "")
	{
		alert("Please enter first three numbers of your phone number.");
		document.regForm.phone1.focus();
		return false;
	}
	if(document.regForm.phone1.value.length != 3)
	{
		alert("Please enter first three numbers of your phone number.");
		document.regForm.phone1.focus();
		return false;
	}
	if(document.regForm.phone2.value == "")
	{
		alert("Please enter second set of three numbers of your phone number.");
		document.regForm.phone2.focus();
		return false;
	}
	if(document.regForm.phone2.value.length != 3)
	{
		alert("Please enter second set of three numbers of your phone number.");
		document.regForm.phone2.focus();
		return false;
	}
	if(document.regForm.phone3.value == "")
	{
		alert("Please enter third set of your phone number.");
		document.regForm.phone3.focus();
		return false;
	}
	if(document.regForm.phone3.value.length != 4)
	{
		alert("Please enter third set of your phone number.");
		document.regForm.phone3.focus();
		return false;
	}
	//end phone
	if(document.regForm.email.value == "")
	{
		alert("Please Enter Your Contact Email");
		document.regForm.email.focus();
		return false;
	}
		// Start Email Validation
	if(document.regForm.email.value != "")
	{
		var i;
		var input = document.regForm.email.value ;
		var lenth = input.length ;
		var ctr=0 ;
	
		if ( ( document.regForm.email.value.charAt(i) == '!' ) || ( 	document.regForm.email.value.charAt(i) == '#' ) )
	    {
		  alert("Please enter a proper email address") ;
		  document.regForm.email.focus();
	      return false;
	    }
		if (input =="")
		{
			alert("Please enter email address") ;
		    document.regForm.email.focus();
			return false ;
		}
		if(input.length == 40)
		{
			alert("Please enter a proper email address") ;
		    document.regForm.email.focus();
			return false ;
		}
	
		for ( i=0; i < lenth; i++ )
		{
			var oneChar = input.charAt(i) ;
			if(oneChar == "@")
			{
				ctr = ctr+1 ;
			}
			if ( (i == 0 && oneChar == "@") || (i == 0 && oneChar == ".") || 
				( oneChar == " " ) )
			{
				alert ( "This does not seem to be a proper email address" ) ;
		        document.regForm.email.focus();
				return false ;
			}
			if ( (oneChar == "@" && input.charAt(i+1) == ".") || 
				(oneChar == "." && input.charAt(i+1) == "@") ||
				(oneChar == "." && input.charAt(i+1) == ".") )
			{
				alert ( "This does not seem to be a proper email address" ) ;
		        document.regForm.email.focus();
				return false ;
			}
			if( input.indexOf("@") < 2 )
			{
				alert ( "This does not seem to be a proper email address" ) ;
		        document.regForm.email.focus();
				return false ;
			}
			if(input.indexOf(".")<1)
			{
				alert ( "This does not seem to be a proper email address" ) ;
		        document.regForm.email.focus();
				return false ;
			}
			if (ctr > 1)
			{
				alert ( "This does not seem to be a proper email address" ) ;
		        document.regForm.email.focus();
				return false ;
			}
		}
	}	
	// End Email Validation Script
	if(document.regForm.passwd.value == "")
	{
		alert("Please Enter Password");
		document.regForm.passwd.focus();
		return false;
	}
	if(document.regForm.rpasswd.value == "")
	{
		alert("Please Enter Re-Type Password");
		document.regForm.rpasswd.focus();
		return false;
	}
	if(document.regForm.passwd.value != document.regForm.rpasswd.value)
	{
		alert("Password and Re-Type word should be same");
		document.regForm.rpasswd.focus();
		return false;
	}
	
	
	document.regForm.submit();
}

function validate_pphone(pphone,val,xval)
{
	if(xval == 1)
	{
		if(val == 1)
		if(pphone.length ==3)
			document.regForm.phone2.focus();
		if(val == 2)
		if(pphone.length ==3)
			document.regForm.phone3.focus();
	}
	else if(xval == 2)
	{
		if(val == 1)
		if(pphone.length ==3)
			document.regForm.wphone2.focus();
		if(val == 2)
		if(pphone.length ==3)
			document.regForm.wphone3.focus();
	}
}

function numbersonly1(e, decimal) {
var key;
var keychar;

if (window.event) {
   key = window.event.keyCode;
}
else if (e) {
   key = e.which;
}
else {
   return true;
}
keychar = String.fromCharCode(key);

if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
   return true;
}
else if ((("0123456789").indexOf(keychar) > -1)) {
   return true;
}
else if (decimal && (keychar == ".")) { 
  return true;
}
else if (key >= 97 && key <=105) { 
  return true;
}
else
{
	alert("Phone number value must be numeric.\n");
   return false;
}
}
</script>
</head>
<body>
 <?php include('includes/header.php'); ?>
<div class="site-image">
  <div class="hfeed" id="page">
    <div id="main">
      <div id="primary" class="signupform">
        <div role="main" id="content">
          <div class="form">
            <div class="title"></div>
            <div class="formarea">
			<div class="error_msg"><font color=red><?php if($error_msg!= "") echo $error_msg;?></font></div>
			<form method="post" name="regForm" id="regForm">
			<input type="hidden" name="singup" value="1">
              <ul>
                <li>
                  <label>Invitation Code</label>
                  <input name="invcode" id="invcode" value="<?php echo $invcode?>" tabindex=1 type="text" class="input-126">
                </li>
                <li class="clr">
                  <label>First Name</label>
                  <input name="firstname" id="firstname" type="text" class="input-187" value="<?php echo $firstname?>" tabindex=2>
                </li>
                <li>
                  <label>Last Name</label>
                  <input name="lastname" id="lastname" type="text" class="input-187"  value="<?php echo $lastname?>" tabindex=3>
                </li>
                <li>
                  <label>Phone Number </label>
				  <input type="text" maxlength="3" class="input-57" name="phone1" tabindex="4" onkeyup="validate_pphone(this.value,1,1); return numbersonly1(event, false,1)" value="<?php echo $phone1?>"><input type="text" maxlength="3" class="input-57" name="phone2" tabindex="5" onkeyup="validate_pphone(this.value,2,1);return numbersonly1(event, false,1)" value="<?php echo $phone2?>"/> <input type="text" maxlength="4" class="input-57" name="phone3" tabindex="6" onkeyup="return numbersonly1(event, false,1)" value="<?php echo $phone3?>" /></li>
                <li>
                  <label>Email Address</label>
                  <input name="email"  id="email" type="text" class="input-187"  value="<?php echo $email?>" tabindex=7>
                </li>
                <li>
                  <label>Password</label>
                  <input name="passwd"  id="passwd" type="password" class="input-187"  value="<?php echo $passwd?>" tabindex=8>
                </li>
                <li>
                  <label>Re-enter Password</label>
                  <input name="rpasswd" id="rpasswd" type="password" class="input-187" value="<?php echo $rpasswd?>" tabindex=9>
                </li>
              </ul>
              <input name="b1" type="button" class="getstarted-btn" onClick="return chkvalid();">
			  </form>
            </div>
            <div class="end"></div>
          </div>
          <div class="getstartednow">
            <div class="title"></div>
            <ul>
              <li class="space"> </li>
              <li class="row">
                <p>Get More Customers and  
                  Make More Money</p>
              </li>
              <li class="space"> </li>
              <li class="altrow">
                <p>Get Your Business In Shape,  
                  Leave Your Competition In the 
                  Dust</p>
              </li>
              <li class="space"> </li>
              <li class="row">
                <p>We Use Proven Strategies That  
                  Will Make Your Business  
                  Successful</p>
              </li>
              <li class="space"> </li>
              <li class="altrow">
                <p>Let Us Do the Work For You  
                  So You Can Focus On Your 
                  Business</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- #content -->
    </div>
    <div class="formpage-shadow"></div>
    <!-- #primary -->
  </div>
  <!-- #main -->
</div>
<!-- site-image --> 
  <div id="AddItem_formdiv" style="display:none">
	<form id="AddItem_form" method="post" action="" onSubmit="return addItemShoppingCart(this)">
	
<div class="additem" style="height:280px">
<h1><span>Forgot Password</span></h1> 
<ul> <li class="ml20" style="margin-bottom: -20px ! important;"
>Enter your email to receive a link where you can reset your password. </li><li> 
<label>Email</label><input name="fg_email" id='fg_email' type="text" class="input"  style="width: 300px;"  />
        </li>
        <li  style="margin-top: 10px;" ><a href="#" class='reset-btn' onclick="javascript:fogetpassword();" style="margin: 0 0 0 108px; float: left;"></a>
          </li>
</ul>
</div>
  </form></div>
  <?php include('includes/footer.php'); ?>
</body>
</html>
