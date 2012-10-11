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
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data=$_POST;
	$res=$S->saveSalesPageContent($data);
	//print_r($res);
	if($res[0]==1)
	{
		echo "<script>location.replace('sales-page-testimonials.php')</script>";
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
	<form method="post" onSubmit="return salesPageContentValidation(this)" enctype="multipart/form-data">
      <div id="primary" class="pd30">
        <div class="blue-grd blue-bdr tabs">
          <div class="tab2-arrow"></div>
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <ul class="threecol">
            <li><a href="sales-page-design.php">Design</a></li>
            <li class="active "><span class="edit-icon"></span> <a href="sales-page-content.php"> Content </a></li>
            <li class="last"><a href="sales-page-testimonials.php"> Testimonials </a></li>
          </ul>
        </div>
        <div class="jmsg mt20">This page allows you to provide content for your website, including a headline, sub headline, “about” section, body section, and up to 3 images. 
          and up to 3 images.</div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">headline </h2>
              <h3 class="small">editor</h3>
            </div>
          </div>
          <div class="col560 p20">Enter your website’s headline below. Make sure your headline will leave a lasting impression on visitors and get them to continue reading.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col23 "> </div>
          <div class="col245 ">
            <div class="f-right mt30">
                 <a id="editor_opt_headline" href="images/Watermarked/salespagecontentheadlinescreenshot.png" title="Headline"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
			  
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/sales_page_content_headline_thumb.png"></div>
          </div>
          <div class="col30 ">
            <div class="vline h185"></div>
          </div>
          <div class="col500 ">
            <div class="mt30"><!--<img src="images/editor-options.png" width="510" height="24">--></div>
            <textarea class="editable lg-input w100p h80 mt20" name="editor_headline" id="editor_headline"><?php echo $data->headline?></textarea>
          </div>
        </div>  
        
         <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">subheadline </h2>
              <h3 class="small">editor</h3>
            </div>
          </div>
          <div class="col560 p20">Enter your sub headline below. Your sub headline should add on to your headline and provide additional informative content.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col23 "> </div>
          <div class="col245 ">
            <div class="f-right mt30">
             
			   <a id="editor_opt_subheadline" href="images/Watermarked/salespagecontentsubheadlinescreenshot.png" title="Sub Headline"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/salespagecontentsubheadlinethumb.png"></div>
          </div>
          <div class="col30 ">
            <div class="vline h185"></div>
          </div>
          <div class="col500 ">
            <div class="mt30"><!--<img src="images/editor-options.png" width="510" height="24">--></div>
            <textarea class="editable lg-input w100p h80 mt20" name="editor_subheadline" id="editor_subheadline"><?php echo $data->subheadline;?></textarea>
          </div>
        </div> 
         <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">about </h2>
              <h3 class="small">editor</h3>
            </div>
          </div>
          <div class="col560 p20">Enter some information about yourself below. This should be information that potential clients would like to know about you (e.g. your credentials).</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col23 "> </div>
          <div class="col245 ">
            <div class="f-right mt30">
              <a id="editor_opt_about" href="images/Watermarked/about_editor.png" title="Editor About"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/about_editor_thumb.png" width="224" height="61"></div>
          </div>
          <div class="col30 ">
            <div class="vline h185"></div>
          </div>
          <div class="col500 ">
            <div class="mt30"><!--<img src="images/editor-options.png" width="510" height="24">--></div>
            <textarea class="editable lg-input w100p h80 mt20" name="editor_about" id="editor_about"><?php echo $data->about;?></textarea>
          </div>
        </div> 
         <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">body </h2>
              <h3 class="small">editor</h3>
            </div>
          </div>
          <div class="col560 p20">Enter your website’s body content below. Remember that your body content should serve two purposes: to interest your reader and to make sure that they remember your brand/product/service.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col23 "> </div>
          <div class="col245 ">
            <div class="f-right mt30">
              <a id="editor_opt_body" href="images/Watermarked/body_editor.png" title="Editor Body"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
            </div>
            <div class="row20"></div>
            <div class="picbg240"><img src="images/screenshots/body_editor_thumb.png" width="224" height="61"></div>
          </div>
          <div class="col30 ">
            <div class="vline h185"></div>
          </div>
          <div class="col500 ">
            <div class="mt30"><!--<img src="images/editor-options.png" width="510" height="24">--></div>
            <textarea class="editable lg-input w100p h80 mt20" name="editor_body" id="editor_body"><?php echo $data->body;?></textarea>
          </div>
        </div> 
        <div class="gray-grd gray-bdr graybox  mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">homepage </h2>
              <h3 class="small">image</h3>
            </div>
          </div>
          <div class="col560 p20"> You may select up to 3 images to upload from your computer. After they are uploaded, Images will appear in the corresponding boxes below. To replace a particular image, click on its “Upload” button again. </div>
        </div>
		
        <div class="gray-grd gray-bdr graybox bdr-top-none p20 ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 1</label>
            </div>
            <div class="row">
              <input id="home_image1_file_upload" name="home_image1_file_upload" type="file" class="uploadimagebtn f-right mt5 mr5"/>
			  <input type="hidden" name="home_image1" id="home_image1" value="<?php echo $data->homepage_image_1?>">
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img src="<?php if($data->homepage_image_1<>'') echo "uploads/".$data->homepage_image_1; else echo 'images/no-image-224x136.png';?>" width="224" height="136" id="homeimage1prev"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 2</label>
            </div>
            <div class="row">
              
               <input id="home_image2_file_upload" name="home_image2_file_upload" type="file" class="uploadimagebtn f-right mt5 mr5"/>
			  <input type="hidden" name="home_image2" id="home_image2" value="<?php echo $data->homepage_image_2?>">
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img src="<?php if($data->homepage_image_2<>'') echo "uploads/".$data->homepage_image_2; else echo 'images/no-image-224x136.png';?>" width="224" height="136" id="homeimage2prev"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 3</label>
            </div>
            <div class="row">
              <input id="home_image3_file_upload" name="home_image3_file_upload" type="file" class="uploadimagebtn f-right mt5 mr5"/>
			  <input type="hidden" name="home_image3" id="home_image3"  value="<?php echo $data->homepage_image_3?>">
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img src="<?php if($data->homepage_image_3<>'') echo "uploads/".$data->homepage_image_3; else echo 'images/no-image-224x136.png';?>" width="224" height="136" id="homeimage3prev"></div>
          </div>
        </div>
        <div><input type="button" name="content_submit_back" value="" class="prevbtn mt20 ml20 f-left"  onClick="javascript:window.location='sales-page-design.php'"></div>
        <div><input type="submit" name="content_submit" value="" class="nextbtn mt20 mr20 f-right"></div>
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
