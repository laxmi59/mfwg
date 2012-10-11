<?php
include_once("classes/class.system.php");
include_once("classes/class.js.php");
$S = new System();
$S->dbconn();
if(isset($_SESSION['userid'])){
	$data=$S->getProjectData();
}else{
	$data='';
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data=$_POST;
	$res=$S->saveSalesPageDesign($data);
	if($res[0]==1)
	{
		echo "<script>location.replace('blog-page-first-post.php')</script>";
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
<div class="site-image" id="site-image">
  <div class="hfeed" id="page">
    <div id="main">
<form method="post" onSubmit="return salesPageDesignValidation(this)" enctype="multipart/form-data">
      <div id="primary" class="pd30">
        <div class="blue-grd blue-bdr tabs">
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <ul class="fourcol">
            <li class="active "><span class="design-icon"></span><a href="blog-page-design.php">Design</a></li>
            <li><a href="blog-page-first-post.php"> First Post </a></li>
            <li><a href="blog-default-page.php"> Default Pages </a></li>
            <li class="last"><a href="blog-custom-page.php"> Custom Pages </a></li>
          </ul>
        </div>
        <div class="blue-grd blue-bdr msgbox mt20">
          <div class="tooltip-arrow"></div>
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          This page allows you to tailor the design of your website. Here you can customize the colors, header, logo, phone color, and profile image. </div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">color </h2>
              <h3 class="small">options</h3>
            </div>
          </div>
          <div class="col560 p20"> Choose a color from the available options. Click on the thumbnail to the right of the option to see what your site will look like.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none p20 ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col175 ">
            <div class="f-left label">
              <input name="color_options" type="radio" value="1" <?php if($data->color == 1) echo 'checked="checked"';?>>
              Red</div>
            <div class="f-right">              
			  <a id="color_opt_red" href="images/Watermarked/FWG-Blog-Page-Red.png" title="Color Options Red"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg173"><img src="images/screenshots/red.png" width="159" height="209"></div>
          </div>
          <div class="col30 "></div>
          <div class="col175 ">
            <div class="f-left label">
              <input name="color_options" type="radio" value="2" <?php if($data->color == 2) echo 'checked="checked"';?>>
              Blue</div>
            <div class="f-right">
              <a id="color_opt_blue" href="images/Watermarked/FWG-Blog-Page-Blue.png" title="Color Options Blue"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg173"><img src="images/screenshots/blue.png" width="159" height="209"></div>
          </div>
          <div class="col30 "></div>
          <div class="col175 ">
            <div class="f-left label">
              <input name="color_options" type="radio" value="3" <?php if($data->color == 3) echo 'checked="checked"';?>>
              Purple</div>
            <div class="f-right">
              <a id="color_opt_purple" href="images/Watermarked/FWG-Blog-Page-Purple.png" title="Color Options Purple"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg173"><img src="images/screenshots/purple.png" width="159" height="209"></div>
          </div>
          <div class="col30 "></div>
          <div class="col175 ">
            <div class="f-left label">
              <input name="color_options" type="radio" value="4" <?php if($data->color == 4) echo 'checked="checked"';?>>
              Black</div>
            <div class="f-right">
               <a id="color_opt_black" href="images/Watermarked/FWG-Blog-Page-Grey.png" title="Color Options Grey"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg173"><img src="images/screenshots/black.png" width="159" height="209"></div>
          </div>
        </div>
        
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">header </h2>
              <h3 class="small">options</h3>
            </div>
          </div>
          <div class="col560 p20"> Choose a header picture from the available options. Click on the thumbnail to the right of the option to see what your header will look like.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none p20 ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col240 ">
            <div class="f-left label">
              <input name="header_optons" type="radio" value="1" <?php if($data->header == 1) echo 'checked="checked"';?>>
              Men</div>
            <div class="f-right">
                <a id="header_opt_men" href="images/Watermarked/FWG-Blog-Page-Men.png" title="Header Options Men"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/men-header.png" width="224" height="61"></div>
          </div>
          <div class="col30 "></div>
          <div class="col240 ">
            <div class="f-left label">
              <input name="header_optons" type="radio" value="2" <?php if($data->header == 2) echo 'checked="checked"';?>>
              Women</div>
            <div class="f-right">
              <a id="header_opt_women" href="images/Watermarked/FWG-Blog-Page-Women.png" title="Header Options Women"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/women-header.png" width="224" height="61"></div>
          </div>
          <div class="col30 "></div>
          <div class="col240 ">
            <div class="f-left label">
              <input name="header_optons" type="radio" value="3" <?php if($data->header == 3) echo 'checked="checked"';?>>
              Men & Women</div>
            <div class="f-right">
               <a id="header_opt_men-women" href="images/Watermarked/FWG-Blog-Page-Men&Women.png" title="Header Options Men&Women"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/men-women-header.png" width="224" height="61"></div>
          </div>
        </div>
        
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">logo </h2>
              <h3 class="small">options</h3>
            </div>
          </div>
          <div class="col560 p20"> Choose a logo from the available option or upload a logo image from your computer. Click on the thumbnail to the right of the option to see what your logo will look like.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none p20 ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
		   <div class="col360">
		<input name="logo_optons" type="radio" value="1" <?php if($data->logo_type == 1) echo 'checked="checked"';?>> Pre-made
		   <div class="row">
			   <div class="col360">
					<div class="f-left label ml20"> Title </div>
					<div class="f-right mr5">
					   <input name="logo_title" id="logo_title" class="lg-input w270" value="<?php echo $data->logo_title?>">
					</div>
				</div>
			</div>
			<div class="row5"></div>
          <div class="col272 pl80">
            <div class="f-left label"> 
				<input type="button" value="" class="select-color-btn  f-left" id="premade_title" name="premade_title">
				<input type="text" readonly=""  class="lg-input w20 f-left ml10" style="height: 20px; background-image:none;  <?php if($data->logo_subtitle_color <> '') echo 'background:'.$data->logo_title_color?>" size="2" id="prmade_title_demo" > 
				<input type="hidden" class="cp2  f-left" id="prmade_title_color" name="prmade_title_color" value="<?php echo $data->logo_title_color;?>">
              </div>
            <div class="f-right">
             <a id="logo_opt_title" href="images/Watermarked/Logo.png" title="Logo Title Color"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div><div class="row10"></div>
             <div class="picbg268"><img src="images/screenshots/title.png" width="250" height="61"></div> 
          </div>
		  <div class="row10"></div>
		   <div class="row">
			   <div class="col370">
					<div class="f-left label ml20"> Subtitle </div>
					<div class="f-right mr5">
					   <input name="logo_subtitle" id="logo_subtitle" class="lg-input w270" value="<?php echo $data->logo_subtitle?>">
					</div>
				</div>
			</div>
			<div class="row5"></div>
          <div class="col272 pl80">
            <div class="f-left label">
                 <input type="button" value="" class="select-color-btn  f-left" id="premade_subtitle" name="premade_subtitle"> 
				<input readonly="" type="text" class="lg-input w20 f-left ml10" style="height: 20px; background-image:none;  <?php if($data->logo_subtitle_color <> '') echo 'background:'.$data->logo_subtitle_color;?>" size="2" id="prmade_subtitle_demo" > 
				
				<input type="hidden" class="cp2  f-left" id="prmade_subtitle_color" name="prmade_subtitle_color" value="<?php echo $data->logo_subtitle_color;?>">
              </div>
            <div class="f-right">
             <a id="logo_opt_subtitle" href="images/Watermarked/Sub-Logo.png" title="Logo Sub Title Color"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div><div class="row10"></div>
             <div class="picbg268"><img src="images/screenshots/subtitle.png" width="250" height="61"></div> 
          </div>
          </div>
		  
 
		<div class="col60 "><div class="vline h380 "></div></div>
	 <div class="col360 "> 
	 <input name="logo_optons" type="radio" value="2" <?php if($data->logo_type == 2) echo 'checked="checked"';?>> Custom
          <div class="col27"> </div>
          <div class="col333"> 
             
			  <div class="row">
			<div class="pt10 pb20">Select an image from your computer :</div> 
			</div> 
			<div class="row">
			   <input id="logo_file_upload" name="logo_file_upload" type="file" class="upload-image-btn f-right mt7 mb26"/>
					<input type="hidden" name="logo_custom" id="logo_custom">
			</div> 
			<div class="row ">
			 <div>&nbsp;</div> 
			</div> 
			<div class="row">
			  <div class="picbg330"><img src="<?php if($data->logo_custom<>'') echo "uploads/".$data->logo_custom; else echo 'images/no-image-312.png';?>" id="logo_img" width="312" height="136"></div> 
			</div> 
			<div class="row">
			  <div class="note mt20"> Note : Please upload your logo file in transparent .PNG format with dimension of 290 x 75 pixel.</div> 
			</div> 
            
          </div>
          </div>
		  <div class="col30 "></div>
           
        </div>
        
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">phone </h2>
              <h3 class="small">color</h3>
            </div>
          </div>
          <div class="col560 p20"> Choose the color of your phone number in your website’s header. Several examples are provided on the right, click to enlarge them.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none p20 ">
        <div>
			<input type="button" value="" class="select-color-btn f-left" id="phone_color_buttton" name="phone_color_buttton"> 
			<input type="text"  size="2" id="phone_color_demo" readonly="" class="lg-input w20 f-left ml10" style="height: 20px; background-image:none;  <?php if($data->phone_color <> '') echo 'background:'.$data->phone_color?>" >
			<input type="hidden" class="cp2 f-left" id="phone_color" name="phone_color" value="<?php echo $data->phone_color?>">
		</div>
       
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="row10"></div>
          <div class="col30 "><!--<div class="prev-arrow"></div>--></div>
          <div class="col240 "> 
            <div class="f-right">
              <a id="phone_number_opt" href="images/Watermarked/Phone-Yellow.png" title="Phone Number"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div><div class="row20"></div>
             <div class="picbg240"><img src="images/screenshots/yellow-ph.png" width="224" height="61"></div>
          </div><div class="col10 "></div>
            
          <div class="col240 "> 
            <div class="f-right">
             <a id="phone_number_opt2" href="images/Watermarked/Phone-Grey.png" title="Phone Number"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div><div class="row20"></div>
             <div class="picbg240"><img src="images/screenshots/gray-ph.png" width="224" height="61"></div>
          </div><div class="col10 "></div>
          <div class="col240 "> 
            <div class="f-right">
              <a id="phone_number_opt3" href="images/Watermarked/Phone-Blue.png" title="Phone Number"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a>
            </div><div class="row20"></div>
             <div class="picbg240"><img src="images/screenshots/blue-ph.png" width="223" height="61"></div>
          </div>
          <div class="col30 "><!--<div class="next-arrow"></div> --></div>
        </div>
       <div><input type="submit" name="submit" value="" class="nextbtn mt20 f-right" ></div>
		   </form>
      </div>
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
