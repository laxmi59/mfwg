<div class="opacitypopup" id="opacitypopup">
  <div class="main" id="popmasksettingmain" style="height:500px;display:none"></div>
</div>
<header role="banner" id="branding">
  <hgroup>
    <h1 id="site-title"><span><a rel="home" title="Fitness Website Gurus" href="/"></a></span></h1>
    <div class="phone"></div>
	<?php
	if(!isset($_SESSION['userid']) || (int)$_SESSION['userid']==0)
	{
	?>
	<form action='' method='POST' id='login'>
	<?php if($error != "") { echo "<div class='err_msg'>$error</div>"; } else if(isset($_GET['msg'])) { echo "<div class='err_msg'>".$successmessage[$_GET['msg']]."</div>";  }?>
    <div class="member-login" id='member-login' style="display:"> <h2>Member Sign In</h2>
      <ul>
        <li>
          <label>Email</label><input name="email" id='email' type="text" class="input" value="<?=$email?>"  />
        </li>
        <li>
          <label>Password</label><input name="password" id='password' type='password'  class="input"  />
        </li>
        <li><a href="#AddItem_form" id='additem-btn'>Forgot your password ?</a>
          <input name="" type="button" class="signin-btn" onclick="return validate()"/>
        </li>
      </ul>
    </div>
	</form>
	<?php
	}
	else
	{
	?>
    <div class="welcome-member" style="display:">
      <ul>
        <li>
          <div class="w118 f-left">
            <h2>Welcome Back</h2>
          </div>
          <div class="w130 f-right">
            <h2><strong><?php echo $_SESSION['NAME']; ?></strong></h2>
          </div>
        </li>
        <li>
          <div class="w118 f-left"></div>
          <div class="w130 f-right">
            <input name="" type="button" class="signout-btn" onclick="javascript:window.location.href='logout.php';" />
          </div>
        </li>
      </ul>
    </div>
	<?php } ?>
 </hgroup>
<?php if(isset($_SESSION['userid']) && $_SESSION['userid'] != "")  { 
		
		?>
  <nav role="navigation" id="access">
    <div class="menu-main-menu-container">
      <ul class="menu" id="menu-main-menu">
        <li class="menu-item menu-item-type-custom menu-item-object-custom  <?php echo $main_page; ?> menu-item-home"><a href="member-home.php">Main</a></li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $mysite_page; ?>"  ><a href="my-sites.php">My Site</a></li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $library_page; ?>" ><a href="my-library.php">My Library</a></li>
    	<li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $cart_page; ?>"><a href="my-shopping-cart.php">My Shopping Cart</a></li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $cal_page; ?>"><a href="my-calendar.php">My Calendar</a></li>
	    <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $help_page; ?>"><a href="help.php">Help</a></li>
      </ul>
    </div>
  </nav>
<?php } ?>
  <!-- #access -->
</header>
