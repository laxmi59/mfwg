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
	$res=$S->saveBlogDefaultPage($data);
	if($res[0]==1)
	{
		echo "<script>location.replace('blog-custom-page.php')</script>";
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
	<form method="post" onSubmit="return blogDefault_Page_FormValid(this)" enctype="multipart/form-data">	
      <div id="primary" class="pd30">
        <div class="blue-grd blue-bdr tabs">
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <ul class="fourcol">
            <li><a href="blog-page-design.php">Design</a></li>
            <li><a href="blog-page-first-post.php"> First Post </a></li>
            <li class="active"><span class="pages-icon"></span><a href="blog-default-page.php"> Default Pages </a></li>
            <li class="last"><a href="blog-custom-page.php"> Custom Pages </a></li>
          </ul>
        </div>
        <div class="blue-grd blue-bdr msgbox mt20 mb35">
          <div class="tooltip-arrow"></div>
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          Each blog requires “About” and “Contact” pages. You can customize the respective pages below.</div>
        <div class="page-title">About  Page</div>
        <div class="page-msg">
          <p>Create your “About” page below. This page should give visitors important information about you         (e.g. your credentials, your philosphy, etc.)</p>
        </div>
        <div class="gray-grd gray-bdr graybox  nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
             <div class="f-right mt20"><a id="about_page_title_opt" href="images/Watermarked/about_page_title.png" title="About Page Title"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
            <div class="p10 pl30">
              <h2 class="title">page </h2>
              <h3 class="small">title</h3>
            </div>
          </div>
          <div class="col560 p20"> Enter your page title below. The ideal blog page title is short and descriptive. It should describe exactly what the page contains and should not focus on being catchy. This way, you maximize search engine exposure after publication.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="col280 pr20 shadow-separator"></div>
          <div class="p20">
            <input name="about_page_title" id="about_page_title" type="input" value="<?php echo $data->about_page_title?>" class="lg-input w98p">
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="col280 pr20 shadow-separator">
            <div class="f-right mt20"><a id="about_page_content_opt" href="images/Watermarked/about_page_content.png" title="About Page Content"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
            <div class="p10 pl30">
              <h2 class="title">page </h2>
              <h3 class="small">content</h3>
            </div>
          </div>
          <div class="col560 p20"> Enter the content of your page below. Your page content should not be too lengthy or contain too much information, because you don’t want to overwhelm your readers. Your goal should be to develop a relationship with them. That way, you are more likely to convert them into clients.</div>
        </div>
        <div class="gray-grd gray-bdr graybox  nopad">
          <div class="col280 pr20 shadow-separator"></div>
          <div class="p20">
            <div class="pb20"></div>
            <textarea name="about_page_content" id="about_page_content" type="input" class="editable lg-input w98p h270"><?php echo $data->about_page_content?> </textarea>
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
           <div class="f-right mt20"><a id="about_page_image_opt" href="images/Watermarked/about_page_img.png" title="About Page Image"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
            <div class="p10 pl30">
              <h2 class="title">page </h2>
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
              <input name="about_page_image_1" id="about_page_image_1" type="hidden" value="<?php echo $data->about_page_image_1?>">
              <input name="about_page_image_1_upload" id="about_page_image_1_upload" type="file" class="upload-image-btn f-right mt5 mr5">              
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="about_page_image_1_show" src="<?php if($data->about_page_image_1<>'') echo "uploads/".$data->about_page_image_1; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 2</label>
            </div>
            <div class="row">
              <input name="about_page_image_2" id="about_page_image_2" type="hidden" value="<?php echo $data->about_page_image_2?>">
              <input name="about_page_image_2_upload" id="about_page_image_2_upload" type="file" class="upload-image-btn f-right mt5 mr5">          
              
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="about_page_image_2_show" src="<?php if($data->about_page_image_2<>'') echo "uploads/".$data->about_page_image_2; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 3</label>
            </div>
            <div class="row">
              <input name="about_page_image_3" id="about_page_image_3" type="hidden" value="<?php echo $data->about_page_image_3?>">
              <input name="about_page_image_3_upload" id="about_page_image_3_upload" type="file" class="upload-image-btn f-right mt5 mr5">        
              
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="about_page_image_3_show" src="<?php if($data->about_page_image_3<>'') echo "uploads/".$data->about_page_image_3; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div>
            <!--<div class="row">
              <div class="add-btn-cb mt20 f-right" ></div>
            </div>
-->          </div>
        </div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">meta </h2>
              <h3 class="small">keywords</h3>
            </div>
          </div>
          <div class="col560 p20"> Meta keywords are ideal if simply for the sake of organization. Scan your title/page body and make a list of the most important terms you see. Pick the terms that most accurately describe the content of the page.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="p20">
            <textarea name="about_page_meta_keywords" id="about_page_meta_keywords" type="input" class="lg-textarea-95 w98p"><?php echo $data->about_page_meta_keywords;?></textarea>
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">meta </h2>
              <h3 class="small">description</h3>
            </div>
          </div>
          <div class="col560 p20"> The Meta Description provides a clear explanation of your page. Make sure that your description is thorough and summarizes your page effectively. Your meta description should be between 150-160 characters.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none mb20  nopad">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col280 pr20 shadow-separator"></div>
          <div class="p20">
            <textarea name="about_page_meta_description" id="about_page_meta_description" type="input" class="lg-textarea-95 w98p"><?php echo $data->about_page_meta_description?></textarea>
          </div>
        </div>
        
        <div class="row mt20"><div class="page-title">Contact  Page</div>
        <div class="page-msg">
          <p>Create your “Contact” page below. This page should provide visitors with your relevant contact information (e.g. phone number, email address, etc.)</p>
        </div></div>
        <div class="gray-grd gray-bdr graybox  nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
           <div class="f-right mt20"><a id="contact_page_title_opt" href="images/Watermarked/contact_page_title.png" title="Contact Page Title"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
            <div class="p10 pl30">
              <h2 class="title">page </h2>
              <h3 class="small">title</h3>
            </div>
          </div>
          <div class="col560 p20"> Enter your page title below. The ideal blog page title is short and descriptive. It should describe exactly what the page contains and should not focus on being catchy. This way, you maximize search engine exposure after publication.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="col280 pr20 shadow-separator"></div>
          <div class="p20">
            <input name="contact_page_title" id="contact_page_title" type="input" value="<?php echo $data->contact_page_title?>" class="lg-input w98p">
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="col280 pr20 shadow-separator">
            <div class="f-right mt20"><a id="contact_page_content_opt" href="images/Watermarked/contact_page_content.png" title="Contact Page Content"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
            <div class="p10 pl30">
              <h2 class="title">page </h2>
              <h3 class="small">content</h3>
            </div>
          </div>
          <div class="col560 p20"> Enter the content of your page below. Your page content should not be too lengthy or contain too much information, because you don’t want to overwhelm your readers. Your goal should be to develop a relationship with them. That way, you are more likely to convert them into clients.</div>
        </div>
        <div class="gray-grd gray-bdr graybox  nopad">
          <div class="col280 pr20 shadow-separator"></div>
          <div class="p20">
            <div class="pb20"> </div>
            <textarea name="contact_page_content" id="contact_page_content" type="input" class="editable lg-input w98p h270"><?php echo $data->contact_page_content?> </textarea>
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="f-right mt20"><a id="contact_page_image_opt" href="images/Watermarked/contact_page_img.png" title="Contact Page Image"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
            <div class="p10 pl30">
              <h2 class="title">page </h2>
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
              <input name="contact_page_image_1" id="contact_page_image_1" type="hidden" value="<?php echo $data->contact_page_image_1?>">
              <input name="contact_page_image_1_upload" id="contact_page_image_1_upload" type="file" class="upload-image-btn f-right mt5 mr5">
              
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="contact_page_image_1_show" src="<?php if($data->contact_page_image_1<>'') echo "uploads/".$data->contact_page_image_1; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 2</label>
            </div>
            <div class="row">
              <input name="contact_page_image_2" id="contact_page_image_2" type="hidden" value="<?php echo $data->contact_page_image_2?>">
              <input name="contact_page_image_2_upload" id="contact_page_image_2_upload" type="file" class="upload-image-btn f-right mt5 mr5">
              
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="contact_page_image_2_show" src="<?php if($data->contact_page_image_2<>'') echo "uploads/".$data->contact_page_image_3; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 3</label>
            </div>
            <div class="row">
              <input name="contact_page_image_3" id="contact_page_image_3" type="hidden" value="<?php echo $data->contact_page_image_3?>">
              <input name="contact_page_image_3_upload" id="contact_page_image_3_upload" type="file" class="upload-image-btn f-right mt5 mr5">
             
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="contact_page_image_3_show" src="<?php if($data->contact_page_image_3<>'') echo "uploads/".$data->contact_page_image_3; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div>
            <!--<div class="row">
              <div class="add-btn-cb mt20 f-right" ></div>
            </div>-->
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">meta </h2>
              <h3 class="small">keywords</h3>
            </div>
          </div>
          <div class="col560 p20"> Meta keywords are ideal if simply for the sake of organization. Scan your title/page body and make a list of the most important terms you see. Pick the terms that most accurately describe the content of the page.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="p20">
            <textarea name="contact_page_meta_keywords" id="contact_page_meta_keywords" type="input" value="" class="lg-textarea-95 w98p"><?php echo $data->contact_page_meta_keywords?></textarea>
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="col280 pr20 shadow-separator">
            <div class="p10 pl30">
              <h2 class="title">meta </h2>
              <h3 class="small">description</h3>
            </div>
          </div>
          <div class="col560 p20"> The Meta Description provides a clear explanation of your page. Make sure that your description is thorough and summarizes your page effectively. Your meta description should be between 150-160 characters.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col280 pr20 shadow-separator"></div>
          <div class="p20">
            <textarea name="contact_page_meta_description" id="contact_page_meta_description" type="input" value="" class="lg-textarea-95 w98p"><?php echo $data->contact_page_meta_description?></textarea>
          </div>
        </div>
         <div><input type="button" name="default_page_submit_back" value="" class="prev-btn mt20 f-left" onClick="javascript:window.location='blog-page-first-post.php'"></div>
        <div><input type="submit" name="submit" value=""  class="next-btn mt20 f-right" ></div>
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
