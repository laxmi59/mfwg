<?php
include_once("classes/class.system.php");
$S = new System();
$S->dbconn();
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data=$_POST;
	$res=$S->selectPackage($data);
	if($res[0]==1)
	{
		Header("Location: template-selection.php");
		exit;
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
</head>
<body>
 <?php include('includes/header.php'); ?>
<div class="site-image">
  <div class="hfeed" id="page">
    <div id="main">
      <div id="primary" class="package">
        <div role="main" id="content">
          <div class="packagebox">
            <ul>
              <li class="head">
			  <span class="col1 pkgtitle">Package Details</span>
			  <span class="col2">
					<span class="bronze-badge"></span>
					<form method="post" name="bronze_form">
					<input type="hidden" name="pack_type" value="1"/>
					<input type="submit" name="bronze" value="" class="select-btn" >
					</form>
			  </span>
			  <span class="col3">
					<span class="silver-badge"></span>
					<form method="post" name="silver_form">
					<input type="hidden" name="pack_type" value="2"/>
					<input type="submit" name="silver" value="" class="select-btn" >
					</form>
			  </span>
			  <span class="col4">
				<span class="gold-badge"></span>
				<form method="post" name="gold_form">
					<input type="hidden" name="pack_type" value="3"/>
					<input type="submit" name="gold" value="" class="select-btn" >
					</form>
			</span>
			</li>
              <li><span class="col1">Your Own Domain Name </span><span class="col2"><span class="checkmark"></span></span><span class="col3"><span class="checkmark"></span></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Email Address at Domain Name</span><span class="col2"><span class="checkmark"></span></span><span class="col3"><span class="checkmark"></span></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Website Hosting &amp; Security Updates</span><span class="col2"><span class="checkmark"></span></span><span class="col3"><span class="checkmark"></span></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Optimized Sales Page with Contact Information and Multiple Color &amp; Header Combinations</span><span class="col2"><span class="checkmark"></span></span><span class="col3"><span class="checkmark"></span></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Advanced Sales Page with Video and Lead Capture and Multiple Color &amp; Header Combinations</span><span class="col2"></span><span class="col3"><span class="checkmark"></span></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Fitness Blog Targeting Search Engine Traffic and Multiple Color &amp; Header Combinations</span><span class="col2"></span><span class="col3"></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Fitness Marketing Education Center Bronze Access - Fitness Marketing Basics</span><span class="col2"><span class="checkmark"></span></span><span class="col3"><span class="checkmark"></span></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Fitness Marketing Education Center Silver Access - Fitness Marketing Intermediate</span><span class="col2"></span><span class="col3"><span class="checkmark"></span></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Fitness Marketing Education Center Gold Access - Fitness Marketing Advanced</span><span class="col2"></span><span class="col3"></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Sub Pages (About, FAQ, Services, and Contact) Content must be supplied</span><span class="col2"></span><span class="col3"></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Google Analytics - Find out who is visiting your site and how they got there</span><span class="col2"><span class="checkmark"></span></span><span class="col3"><span class="checkmark"></span></span><span class="col4"><span class="checkmark"></span></span></li>
              <li><span class="col1">Site Map Creation &amp; Submission - Allows search engines to find every page of your site</span><span class="col2"></span><span class="col3"></span><span class="col4"><span class="checkmark"></span></span></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- #content -->
    </div>
    <div class="pkgpage-shadow"></div>

	<div class="clr" id="main"> <span  class="pnote">* Please ask for our customer service assistance for a special package discount available</span>  <span class="backtotop-btn f-right"></span></div>
	<div class="clr" >	</div>
    <!-- #primary -->
  </div>
  <!-- #main -->
</div>
<!-- site-image --> 
  <?php include('includes/footer.php'); ?>
</body>
</html>
