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
	$res=$S->saveBlogPageFirstPost($data);
	if($res[0]==1)
	{
		echo "<script>location.replace('blog-default-page.php')</script>";
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
<form method="post" onSubmit="return blogFirstPost_FormValid(this)" enctype="multipart/form-data">	
      <div id="primary" class="pd30">
        <div class="blue-grd blue-bdr tabs">
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <ul class="fourcol">
            <li><a href="blog-page-design.php">Design</a></li>
            <li class="active"><span class="edit-icon"></span><a href="blog-page-first-post.php"> First Post </a></li>
            <li><a href="blog-default-page.php"> Default Pages </a></li>
            <li class="last"><a href="blog-custom-page.php"> Custom Pages </a></li>
          </ul>
        </div>
        <div class="blue-grd blue-bdr msgbox mt20 mb35">
          <div class="tooltip-arrow"></div>
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          Your first post is an important one, because it introduces you to your readers and can help you establish a loyal following. Be sure that your first post is concise and gets your point across effectively. and up to 3 images.</div> 
         
        <div class="gray-grd gray-bdr graybox  nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
            <div class="f-right mt20" id="post_title_opt"> <a id="post_title_opt" href="images/Watermarked/post_title.png" title="Blog Post Title"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
			
            <div class="p10 pl30">
              <h2 class="title">post </h2>
              <h3 class="small">title</h3>
            </div>
          </div>
          <div class="col560 p20"> Enter your post title below. The ideal blog post title is short and descriptive. It should describe exactly what the post contains and should not focus on being catchy. This way, you maximize search engine exposure after publication.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="col280 pr20 shadow-separator"></div>
          <div class="p20">
            <input name="post_title" id="post_title" type="input" value="<?php echo $data->post_title?>" class="lg-input w98p">
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none  nopad">
          <div class="col280 pr20 shadow-separator">
            <div class="f-right mt20" id="post_title_opt"> <a id="post_body_opt" href="images/Watermarked/post_body.png" title="Blog Post Body"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
            <div class="p10 pl30">
              <h2 class="title">post </h2>
              <h3 class="small">body</h3>
            </div>
          </div>
          <div class="col560 p20"> Enter the body of your post below. Your first blog post should not be too lengthy or contain too much information, because you don’t want to overwhelm your readers. Your goal should be to develop a relationship with them. That way, you are more likely to convert them into clients.</div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none nopad">
         <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col280 pr20 shadow-separator"></div>
          <div class="p20">
            <div class="pb20"></div>
            <textarea name="post_body" id="post_body" class="editable lg-input w98p h270"><?php echo $data->post_body?></textarea>
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox  mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="col280 pr20 shadow-separator">
             <div class="f-right mt20" id="post_image_opt"> <a id="post_image_opt" href="images/Watermarked/post_image.png" title="Blog Post Body"><img style="margin-left:-7px" src="images/buttons/view-example-btn-sm.png"/></a></div>
            <div class="p10 pl30">
              <h2 class="title">post </h2>
              <h3 class="small">image</h3>
            </div>
          </div>
          <div class="col560 p20"> You may select up to 3 images to upload from your computer. After they are uploaded, Images will appear in the corresponding boxes below. To replace a particular image, click on its “Upload” button again.  </div>
        </div>
        <div class="gray-grd gray-bdr graybox bdr-top-none p20 ">
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 1</label>
            </div>
            <div class="row">
			  <input name="post_image1" id="post_image1" type="hidden" value="<?php echo $data->post_image1?>">
              <input name="post_image1_upload" id="post_image1_upload" type="file" class="upload-image-btn f-right mt5 mr5">            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="post_image1_show" src="<?php if($data->post_image_1<>'') echo "uploads/".$data->post_image_1; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 2</label>
            </div>
            <div class="row">
              <input name="post_image2" id="post_image2" type="hidden" value="<?php echo $data->post_image2?>">
              <input name="post_image2_upload" id="post_image2_upload" type="file" class="upload-image-btn f-right mt5 mr5">
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="post_image2_show" src="<?php if($data->post_image_2<>'') echo "uploads/".$data->post_image_2; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div>
          </div>
          <div class="col30 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 3</label>
            </div>
            <div class="row">
              <input name="post_image3" id="post_image3" type="hidden" value="<?php echo $data->post_image3?>">
              <input name="post_image3_upload" id="post_image3_upload" type="file" class="upload-image-btn f-right mt5 mr5">
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img id="post_image3_show" src="<?php if($data->post_image_3<>'') echo "uploads/".$data->post_image_3; else echo 'images/no-image-224x136.png';?>" width="224" height="136"></div> 
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
            <textarea name="post_meta_keywords" id="post_meta_keywords" type="input" class="lg-textarea-95 w98p"><?php echo $data->post_meta_keywords?></textarea>
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
            <textarea name="post_meta_description" id="post_meta_description" type="input" class="lg-textarea-95 w98p"><?php echo $data->post_meta_description?></textarea>
          </div>
        </div>         
        
        <div><input type="button" name="first_page_submit_back" value="" class="prev-btn mt20 f-left" onClick="javascript:window.location='blog-page-design.php'"></div>
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
