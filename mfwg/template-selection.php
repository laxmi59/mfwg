<?php
include_once("classes/class.system.php");
include_once("classes/class.js.php");
$S = new System();
$S->dbconn();
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data=$_POST;
	$res=$S->selectTemplate($data);
	if($res[0]==1)
	{
		Header("Location: basic-site.php");
		exit;
	}
}
if(isset($_REQUEST['redfr'])){
	$_SESSION['redurl']=base64_decode($_REQUEST['redfr']);
	$getTemplateId=$S->getTemplate();
}else{
	$_SESSION['redurl']="thank-you.php";
	$getTemplateId='';
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
function confirmationTemp(id){
	var r=confirm("Are you sure you want to change the template?\n It will cause to loss of previous template content.");
	if (r==true){
		document.getElementById("template_type").value=id;
		document.getElementById("sales_form").submit();
  	}
}
function confirmationTemp1(id){
	document.getElementById("template_type").value=id;
	document.getElementById("sales_form").submit();
}
</script>
</head>
<body>
 <?php include('includes/header.php'); ?>
<div class="site-image" id="site-image">
  <div class="hfeed" id="page">
    <div id="main">
      <div id="primary" class="pd30">
        <div class="blue-grd blue-bdr ts-msg ">
          <div class="ts-arrow"></div>
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          Select  a template from the option below. <strong>You will be able to go back and change your selection at anytime.</strong></div>
          <form method="post" name="sales_form" id="sales_form">
            <input type="hidden" name="template_type" id="template_type">
		  <?php 
		  $res=$S->getPackage();
		  //$res=3;
		  //$getTemplateId=2;
		  if($res == 1 || $res == 2 || $res == 3){
		  ?>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="gray-corner bottomLeft"></div>
          <div class="gray-corner bottomRight"></div>
          <div class="col360 shadow-separator">
            <div class="gray-grd gray-bdr">
              <div class="shadow-separator p10   ">
                <h3 class="title a-cen">Sales Page</h3>
              </div>
            </div>
            <div class="row">
              <div class="col175 p15">
                <div class="picbg179"><img src="images/screenshots/sale-page.png" width="159" height="209"></div>
              </div>
              <div class="col30 va-bot   ">
					<!--<input type="submit" name="sales" value="" class="select-btn" >	-->			
                    <?php if($getTemplateId <> 1 && $getTemplateId <> ''){?>
             	<input type="button" name="sales" value="" class="select-btn" onclick = "return confirmationTemp('1')" >			
               <?php }else{?>
               <input type="button" name="sales" value=""  class="select-btn" onclick = "return confirmationTemp1('1')">
               <?php }?> 		
				<a id="salesPageview" href="images/Watermarked/FWG-Sales-Page-Purple.png" title="Sales Page Template"><img style="margin-left:-7px" src="images/buttons/view-example-btn.png" /></a>
              </div>
            </div>
          </div>
		  
          <div class="col500 ts">
            <div class="p27">
              <h2>What You Get</h2>
              <div class="hline m0"></div>
              <p>A basic fitness site complete with contact information and a section for sales copy and testimonials (with or without images).<br>
              </p>
              <br>
              <h2>Who Should Use</h2>
              <div class="hline m0"></div>
              <p>A professional who needs a streamlined site that will display basic information, testimonials, and contact details. Choose this template if you do not plan on adding content on a regular basis. </p>
            </div>
          </div>
        </div>
		<?php }?>
		<?php if($res == 2 || $res == 3){?>
         <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="gray-corner bottomLeft"></div>
          <div class="gray-corner bottomRight"></div>
          <div class="col360 shadow-separator">
            <div class="gray-grd gray-bdr">
              <div class="shadow-separator p10   ">
                 <h3 class="title a-cen">Advanced Sales Page</h3>
              </div>
            </div>
            <div class="row">
              <div class="col175 p15">
                <div class="picbg179"><img src="images/screenshots/adv-sales-page.png" width="162" height="213"></div>
              </div>
              <div class="col30 va-bot   ">
					<?php /*?><input type="submit" name="advanced_sales" value="" class="select-btn" ><?php */?>
                     <?php if($getTemplateId <> 2 && $getTemplateId <> ''){?>
             	<input type="button" name="advanced_sales" value="" class="select-btn" onclick = "return confirmationTemp('2')" >			
               <?php }else{?>
               <input type="button" name="advanced_sales" value=""  class="select-btn" onclick = "return confirmationTemp1('2')">
               <?php }?> 	
				<a id="advSalesPageview" href="images/Watermarked/FWG-Advanced-Sales-Page-Grey.png" title="Advaced Sales Page Template"><img style="margin-left:-7px" src="images/buttons/view-example-btn.png" /></a>
              </div>
            </div>
          </div>
          <div class="col500 ts">
            <div class="p27">
              <h2>What You Get</h2>
              <div class="hline m0"></div>
              <p>All the basic features of the Sales Page plus sections for video and a lead capture form that allows you to make special offers.<br>
              </p>
              <br>
              <h2>Who Should Use</h2>
              <div class="hline m0"></div>
              <p>A professional who needs a basic site to get the job done, but also wants video content and lead capturing along with direct call leads.</p>
            </div>
          </div>
        </div>
		<?php }?>
		<?php if($res == 3){?>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="gray-corner bottomLeft"></div>
          <div class="gray-corner bottomRight"></div>
          <div class="col360 shadow-separator">
            <div class="gray-grd gray-bdr">
              <div class="shadow-separator p10   ">
               <h3 class="title a-cen">Blog</h3>
              </div>
            </div>
            <div class="row">
              <div class="col175 p15">
                <div class="picbg179"><img src="images/screenshots/blog-page.png" width="161" height="213"></div>
              </div>
              <div class="col30 va-bot   ">
					<?php /*?><input type="submit" name="blog" value="" class="select-btn" ><?php */?>
                     <?php if($getTemplateId <> 3 && $getTemplateId <> ''){?>
             	<input type="button" name="blog" value="" class="select-btn" onclick = "return confirmationTemp('3')" >			
               <?php }else{?>
               <input type="button" name="blog" value=""  class="select-btn" onclick = "return confirmationTemp1('3')">
               <?php }?> 	
				<a id="blogPageview" href="images/Watermarked/FWG-Blog-Page-Blue.png" title="Blog Page Template"><img style="margin-left:-7px" src="images/buttons/view-example-btn.png" /></a>
              </div>
            </div>
          </div>
          <div class="col500 ts">
            <div class="p27">
              <h2>What You Get</h2>
              <div class="hline m0"></div>
              <p>A fitness blog layout with unlimited pages and blog posts, plus email marketing lead capture and a designated section for your contact information.<br>
              </p>
              <br>
              <h2>Who Should Use</h2>
              <div class="hline m0"></div>
              <p>A professional who plans to produce and post content on a regular basis. Choose this template if you intend to use content to draw traffic from search engines such as Google, Bing, and Yahoo. </p>
            </div>
          </div>
        </div>
         <?php }?>
       </form>  
         
      </div>
    </div>
    <!-- #content -->
  </div>
  <div class="pkgpage-shadow"></div>
  <div class="clr" > </div>
  <!-- #primary -->
</div>
<!-- #main --> 
<!-- site-image --> 
  <?php include('includes/footer.php'); ?>
</body>
</html>
