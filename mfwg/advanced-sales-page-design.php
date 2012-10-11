<?php
include_once("classes/class.system.php");
include_once("classes/class.js.php");
$S = new System();
$S->dbconn();
if(isset($_SESSION['userid'])){
	$data=$S->getProjectData();
//print_r($data);
}else{
	$data='';
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$data=$_POST;
	$res=$S->saveSalesPageDesign($data);
	if($res[0]==1){
		echo "<script>location.replace('advanced-sales-page-content.php')</script>";
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
<div class="opacitypopup" id="opacitypopup"><div class="main" id="popmasksettingmain" style="height:500px;display:none"></div></div> 
 <?php include('includes/header.php'); ?>
<div class="site-image" id="site-image">
  <div class="hfeed" id="page">
    <div id="main">
	<form method="post" onSubmit="return salesPageDesignValidation(this)" enctype="multipart/form-data">
      <div id="primary" class="pd30">
        <div class="blue-grd blue-bdr tabs">
          <div class="tab1-arrow"></div>
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <ul class="threecol">
            <li class="active "><span class="design-icon"></span> <a href="advanced-sales-page-design.php">Design</a></li>
            <li><a href="advanced-sales-page-content.php"> Content </a></li>
            <li class="last"><a href="advanced-sales-page-testimonials.php"> Testimonials </a></li>
          </ul>
        </div>
        <div class="jmsg mt20"> This page allows you to tailor the design of your website. Here you can customize the colors, header, logo, phone color, and profile image. </div>
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
            <div class="f-left label lh-normal">
              <input name="color_options" type="radio" value="1" <?php if($data->color == 1) echo 'checked="checked"';?>>
              Red</div>
            <div class="f-right">
               <a id="color_opt_red" href="images/advancedsalespage/men_women_red_large.jpg" title="Color Options Red"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg173"><img src="images/advancedsalespage/men_women_red_thumb.jpg" width="159" height="209"></div>
          </div>
          <div class="col30 "></div>
          <div class="col175 ">
            <div class="f-left label lh-normal">
              <input name="color_options" type="radio" value="2" <?php if($data->color == 2) echo 'checked="checked"';?>>
              Blue</div>
            <div class="f-right">
              <a id="color_opt_blue" href="images/advancedsalespage/men_women_blue_large.jpg" title="Color Options Blue"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg173"><img src="images/advancedsalespage/men_women_blue_thumb.jpg" width="159" height="209"></div>
          </div>
          <div class="col30 "></div>
          <div class="col175 ">
            <div class="f-left label lh-normal">
              <input name="color_options" type="radio" value="3" <?php if($data->color == 3) echo 'checked="checked"';?>>
              Purple</div>
            <div class="f-right">
              <a id="color_opt_purple" href="images/advancedsalespage/men_women_purple_large.jpg" title="Color Options Purple"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg173"><img src="images/advancedsalespage/men_women_purple_thumb.jpg" width="159" height="209"></div>
          </div>
          <div class="col30 "></div>
          <div class="col175 ">
            <div class="f-left label lh-normal">
              <input name="color_options" type="radio" value="4" <?php if($data->color == 4) echo 'checked="checked"';?>>
              Black</div>
            <div class="f-right">
             <a id="color_opt_black" href="images/advancedsalespage/men_women_grey_large.jpg" title="Color Options Grey"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg173"><img src="images/advancedsalespage/men_women_grey_thumb.jpg" width="159" height="209"></div>
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
            <div class="f-left label lh-normal">
              <input name="header_optons" type="radio" value="1" <?php if($data->header == 1) echo 'checked="checked"';?>>
              Men</div>
            <div class="f-right">
               <a id="header_opt_men" href="images/Watermarked/FWG-Blog-Page-Men.png" title="Header Options Men"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/men-header.png" width="224" height="61"></div>
          </div>
          <div class="col30 "></div>
          <div class="col240 ">
            <div class="f-left label lh-normal">
              <input name="header_optons" type="radio" value="2" <?php if($data->header == 2) echo 'checked="checked"';?>>
              Women</div>
            <div class="f-right">
              <a id="header_opt_women" href="images/Watermarked/FWG-Blog-Page-Women.png" title="Header Options Women"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/women-header.png" width="224" height="61"></div>
          </div>
          <div class="col30 "></div>
          <div class="col240 ">
            <div class="f-left label lh-normal">
              <input name="header_optons" type="radio" value="3" <?php if($data->header == 3) echo 'checked="checked"';?>>
              Men & Women</div>
            <div class="f-right">
               <a id="header_opt_men-women" href="images/Watermarked/FWG-Blog-Page-Men&Women.png" title="Header Options Men&Women"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
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
          <div class="col333">
            <div class="mb10"><input name="logo_optons" type="radio" value="1" <?php if($data->logo_type == 1) echo 'checked="checked"';?>> Pre-made</div>
            <div class="row">
              <div class="col333">
                <div class="f-left label ml20"> Title </div>
                <div class="f-right mr5">
                  <input name="logo_title" id="logo_title" class="lg-input w240" value="<?php echo $data->logo_title?>">
                </div>
              </div>
            </div>
            <div class="row5"></div>
            <div class="col245 pl90">
              <div class="f-left label"> 
				<input type="button" value="" class="select-color-btn f-left" id="premade_title" name="premade_title">
				<input type="text" readonly=""  class="lg-input w20 f-left ml10"  style="height: 20px; background-image:none; <?php if($data->logo_subtitle_color <> '') echo 'background:'.$data->logo_title_color?>" size="2" id="prmade_title_demo" > 
				<input type="hidden" class="cp2 f-left" id="prmade_title_color" name="prmade_title_color" value="<?php echo $data->logo_title_color;?>">
              </div>
              <div class="f-right">
                <a id="logo_opt_title" href="images/Watermarked/Logo.png" title="Logo Title Color"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
              </div>
              <div class="row10"></div>
              <div class="picbg240"><img src="images/screenshots/title.png" width="224" ></div>
            </div>
            <div class="row10"></div>
            <div class="row">
              <div class="col333">
                <div class="f-left label ml20"> Subtitle </div>
                <div class="f-right mr5">
                  <input name="logo_subtitle" id="logo_subtitle" class="lg-input w240" value="<?php echo $data->logo_subtitle?>">
                </div>
              </div>
            </div>
            <div class="row5"></div>
            <div class="col245 pl90">
              <div class="f-left label">
                 <input type="button" value="" class="select-color-btn f-left" id="premade_subtitle" name="premade_subtitle"> <input readonly="" type="text"  class="lg-input w20 f-left ml10"  style="height: 20px; background-image:none; <?php if($data->logo_subtitle_color <> '') echo 'background:'.$data->logo_subtitle_color;?>" size="2" id="prmade_subtitle_demo" >  
				<input type="hidden" class="cp2 f-left" id="prmade_subtitle_color" name="prmade_subtitle_color" value="<?php echo $data->logo_subtitle_color;?>">
              </div>
              <div class="f-right">
               <a id="logo_opt_subtitle" href="images/Watermarked/Sub-Logo.png" title="Logo Sub Title Color"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
              </div>
              <div class="row10"></div>
              <div class="picbg240"><img src="images/screenshots/subtitle.png" width="224" ></div>
            </div>
          </div>
          <div class="col30 "> 
          </div>
          <div class="col430 ">
          <div class="mb10"><input name="logo_optons" type="radio" value="2" <?php if($data->logo_type == 2) echo 'checked="checked"';?>> Custom</div> 
            <div class="col27"> </div>
            <div class="col400">
              <div class="pt10 pb20">Select an image from your computer :</div>
              <div class="row">
                <div class="col135 "><img src="<?php if($data->logo_custom<>'') echo "uploads/".$data->logo_custom; else echo 'images/no-image-129.png';?>" id="logo_img" width="129" height="125"></div>
                <div class="col245 ">
                  <div class="f-left">
                    <input id="logo_file_upload" name="logo_file_upload" type="file" class="choose-file-btn"/>
					<input type="hidden" name="logo_custom" id="logo_custom">
                  </div>
                  <div class="f-right">
                    <a id="custom_opt_logo" href="images/Watermarked/custom_logo.png" title="Custom Logo"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>      
                  </div>
                  <div class="row8"></div>
                  <div class="picbg240"><img src="images/screenshots/custom_logo_thumb.png" width="224" height="61"></div>
                </div>
              </div>
            </div>
          </div>
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
		   <!--Phone : <input name="phone_number" id="phone_number" class="lg-input w240" value="<?php echo $data->phone?>"><br><br>-->
		   <input type="button" value="" class="select-color-btn f-left" id="phone_color_buttton" name="phone_color_buttton"> 
				<input type="text"   size="2" id="phone_color_demo" readonly="" class="lg-input w20 f-left ml10" style="height: 20px; background-image:none; <?php if($data->phone_color <> '') echo 'background:'.$data->phone_color?>" >
				<input type="hidden" class="cp2 f-left" id="phone_color" name="phone_color" value="<?php echo $data->phone_color?>">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="row10"></div>
          <div class="col10"></div>
          <div class="col245 ">
            <div class="f-right">
                <a id="phone_number_opt" href="images/Watermarked/Phone-Yellow.png" title="Phone Number"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/yellow-ph.png" width="224" height="61"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="f-right">
               <a id="phone_number_opt2" href="images/Watermarked/Phone-Grey.png" title="Phone Number"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/gray-ph.png" width="224" height="61"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="f-right">
              <a id="phone_number_opt3" href="images/Watermarked/Phone-Blue.png" title="Phone Number"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/blue-ph.png" width="224" height="61"></div>
          </div>
          <div class="col30 "> </div>
        </div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">profile </h2>
              <h3 class="small">image</h3>
            </div>
          </div>
          <div class="col560 p20"> Upload a profile image from your computer. After uploading, the picture you have selected will appear in the box on the right. To replace an existing picture, click “Choose File” again.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none p20 ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="mb20"> Select an image from your computer :</div>
          <div class="row10"></div>
          <div class="col135 "><img src="<?php if($data->profile_image <>'') echo "uploads/".$data->profile_image; else echo 'images/no-image-129.png';?>" id="profile_img" width="129" height="125"></div>
          <div class="col245 ">
            <div class="f-left">
              <input id="profile_file_upload" name="profile_file_upload" type="file" class="choose-file-btn"/>
			  <input type="hidden" name="profile_image" id="profile_image">
            </div>
            <div class="f-right">
                <a id="profile_number_opt" href="images/Watermarked/profile_big.png" title="Profile Image"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row8"></div>
            <div class="picbg-222x176"><img src="images/screenshots/profile_small.png" width="200" height="150" ></div>
          </div>
        </div>
		<div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">video </h2> 
            </div>
          </div>
          <div class="col560 p20"> Upload video from your computer to Youtube. After uploading, paste your video link on YouTube to the linkbox provided below.</div>
        </div>
		<div class="gray-grd gray-bdr graybox bdr-top-none p20 ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div> 
           <div class="row"> <div class="f-left mt10 ml10 mr20 label13">
             Please provide a link to your Youtube video :
            </div>
            <div class="f-left  ">
               <textarea name="video_url" id="video_url" class="lg-input w400"><?php echo $data->video_url;?></textarea>
            </div></div>
               
        </div>
        <div class="col10 "></div>
        <div class="col30 "> </div>
         <div><input type="submit" name="submit" value="" class="nextbtn mt20 mr20 f-right" ></div>
      </div>
     </form>
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
