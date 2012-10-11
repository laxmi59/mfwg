<?php
include_once("classes/class.system.php");
include_once("classes/class.js.php");
$S = new System();
$S->dbconn();

if(isset($_REQUEST['act']) && isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$res=$S->deleteTestimonialText($id);
	if($res[0]==1){
		Header("Location: advanced-sales-page-testimonials.php");
		exit;
	}
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if($_POST['testimonial_plus_name']){
		$data=$_POST;
		$res=$S->saveTestimonialImage($data);
		if($res[0]==1){
			Header("Location: advanced-sales-page-testimonials.php");
			exit;
		}
	}else if($_POST['testimonial_name_edit']){
		$data=$_POST;
		$res=$S->updateTestimonialText($data);
		if($res[0]==1){
			Header("Location: advanced-sales-page-testimonials.php");
			exit;
		}
	}else{
		$data=$_POST;
		$res=$S->saveTestimonialText($data);
		if($res[0]==1){
			Header("Location: advanced-sales-page-testimonials.php");
			exit;
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
</head>
<body>
 <?php include('includes/header.php'); ?>
<div class="site-image" id="site-image">
  <div class="hfeed" id="page">
    <div id="main">
      <div id="primary" class="pd30">
        <div class="blue-grd blue-bdr tabs">
          <div class="tab3-arrow"></div>
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <ul class="threecol">
            <li><a href="advanced-sales-page-design.php">Design</a></li>
            <li> <a href="advanced-sales-page-content.php"> Content </a></li>
            <li class="last active"><span class="bubble-icon"></span><a href="advanced-sales-page-testimonials.php"> Testimonials </a></li>
          </ul>
        </div>
        <div class="jmsg mt20">This page allows you to provide content for your website, including a headline, sub headline, “about” section, body section, and up to 3 images. 
          and up to 3 images.</div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="gray-corner bottomLeft"></div>
          <div class="gray-corner bottomRight"></div>
          <div class="col280 shadow-separator">
            <div class="gray-grd gray-bdr"> 
              <div class="shadow-separator p10 pl30 ">
                <h3 class="small">text only</h3>
                <h2 class="title">testimonials </h2>
              </div>
            </div>
            <div class="col222 p24">
              <div class="f-right ">
                <a id="text_testimonial_opt" href="images/Watermarked/testimonial_text.png" title="Text only testimonials"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
              </div>
              <div class="row20"></div>
              <div class="picbg-222x176"><img src="images/screenshots/testimonial_text_thumb.png" width="205" height="158"></div>
            </div>
          </div>
          <div class="col560">
            <div class="p27">
			<form method="post"  onSubmit="return testmonialTextFormValid(this)">
              <div class="tst">
                <div class="f-left w49p">
                  <label>Name</label>
                  <input class="lg-input w100p" name="testimonial_name" id="testimonial_name">
                </div>
                <div class="f-left ml20">
                  <label>Location ( City, State/Province )</label>
                  <input class="lg-input w100p" name="testimonial_location" id="testimonial_location">
                </div>
                <label>Testimonials</label>
                <!--<img src="images/editor-options.png" width="510" height="24">-->
                <textarea class="editable lg-textarea-70 w100p" name="testimonial_content" id="testimonial_content"></textarea>
                <div><input type="submit" name="testimonialTextSubmit" value="" class="add-btn f-right" ></div>
              </div>
			  </form>
            </div>
          </div>
        </div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="gray-corner bottomLeft"></div>
          <div class="gray-corner bottomRight"></div>
          <div class="col280 shadow-separator">
            <div class="gray-grd gray-bdr"> 
              <div class="shadow-separator p10 pl30 ">
                <h3 class="small">your text only</h3>
                <h2 class="title">testimonials </h2>
              </div>
            </div>
            <div class="col222 p24">
              <div class="f-right ">
                <?php /*?><div class="see-example-btn"></div><?php */?>
              </div>
              <div class="row20"></div>
              
            </div>
          </div>
          <div class="col560">
            <div class="p27">
              <div class="tst"> 
			  
                <?php $getData=$S->getAllTextTestimonials('1');
				if($getData){
				foreach($getData as $data){?>
					<div class="lg-textarea-70 w100p pr mt30">
					<?php echo $data['tcontent']?><br><br>
					<?php echo $data['name']?><br>
					<?php echo $data['location']?><br>
					<div class="edit-btn" onClick= "return editTextTestimonial(<?php echo $data['id']?>)"></div>
					<div><a class="del-btn" href="advanced-sales-page-testimonials.php?act=del&id=<?php echo $data['id']?>" onclick = "if (! confirm('Are you sure you want to delete this Testimonial?')) return false;"> </a></div>
					</div> 
				<?php }
				}else{
					echo "Text testimonials not available";
				}?>                  

               <!-- <div class="lg-textarea-70 w100p pr mt30">
                <div class="edit-btn"></div><div class="del-btn"></div>
                </div>
                <div class="lg-textarea-70 w100p pr mt30">
                <div class="edit-btn"></div><div class="del-btn"></div>
                </div>-->
              </div>
            </div>
          </div>
        </div>
                 
         
        
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="gray-corner bottomLeft"></div>
          <div class="gray-corner bottomRight"></div>
          <div class="col280 shadow-separator">
            <div class="gray-grd gray-bdr"> 
              <div class="shadow-separator p10 pl30 ">
                     <h2 class="title">testimonials </h2>
                <h3 class="small">with images</h3>
              </div>
            </div>
            <div class="col222 p24">
              <div class="f-right ">
                <a id="img_testimonial_opt" href="images/Watermarked/testimonial_img.png" title="Image testimonials"><img style="margin-left:-7px" src="images/buttons/see-example-btn.png"/></a>
              </div>
              <div class="row20"></div>
              <div class="picbg-222x176"><img src="images/screenshots/testimonial_image_thumb.png" width="205" height="158"></div>
            </div>
          </div>
		 
          <div class="col560"> <form method="post" name="testimonialImageSubmitForm" onSubmit="return testmonialImageFormValid(this)">
            <div class="p27">
              <div class="tst">
                <div class="f-left w49p">
                  <label>Name</label>
                  <input class="lg-input w100p" name="testimonial_plus_name" id="testimonial_plus_name">
                </div>
                <div class="f-left ml20">
                  <label>Location ( City, State/Province )</label>
                  <input class="lg-input w100p" name="testimonial_plus_location" id="testimonial_plus_location">
                </div>
                <label>Testimonials</label>
                <!--<img src="images/editor-options.png" width="510" height="24">-->
                <textarea class="editable lg-textarea-70 w100p" name="testimonial_plus_content" id="testimonial_plus_content"></textarea>
                <div class="col245 ">
            <div class="mb15">
              <label>Image 1</label>
            </div>
            <div class="row">
              <input id="testimonial_image1_file_upload" name="testimonial_image1_file_upload" type="file" class="uploadimagebtn f-right mt5 mr5"/>
			  <input type="hidden" name="testimonial_image1" id="testimonial_image1">
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img src="images/no-image-224x136.png" width="224" height="136" id="testimonial_img1"></div>
          </div>
          <div class="col15 "></div>
          <div class="col245 ">
            <div class="mb15">
              <label>Image 2</label>
            </div>
            <div class="row">
               <input id="testimonial_image2_file_upload" name="testimonial_image2_file_upload" type="file" class="uploadimagebtn f-right mt5 mr5"/>
			  <input type="hidden" name="testimonial_image2" id="testimonial_image2">
            </div>
            <div class="row20"></div>
            <div class="picbg224"><img src="images/no-image-224x136.png" width="224" height="136" id="testimonial_img2"></div>
          </div>
                <div><input type="submit" name="testimonialImageSubmit" value="" class="add-btn f-right mt20 mr5" ></div>
              </div>
            </div>
          </form>	</div>
		    
		  
		  
        </div>
        <div class="gray-grd gray-bdr graybox mt20 nopad">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="gray-corner bottomLeft"></div>
          <div class="gray-corner bottomRight"></div>
          <div class="col280 shadow-separator">
            <div class="gray-grd gray-bdr"> 
              <div class="shadow-separator p10 pl30 ">
                <h3 class="small">your testimonials</h3><h2 class="title">with images</h2>
              </div>
            </div>
            <div class="col222 p24">
              <div class="f-right ">
                <?php /*?><div class="see-example-btn"></div><?php */?>
              </div>
              <div class="row20"></div>
              <?php /*$getImages=$S->getAllTextTestimonialsImages('2');
			  	foreach($getImages as $data){
				if($data['imagees']<>'') {?>
              <div class="picbg-222x176"><img src="uploads/<?php echo $data['imagees']?>" width="205" height="158"></div><br>
			  <?php } }*/?> 
            </div>
          </div>
          <div class="col560">
            <div class="p27">
              <div class="tst"> 
			   <?php $getData=$S->getAllTextTestimonials('2');
			   if($getData){
				foreach($getData as $data){?>
					<div class="lg-textarea-70 w100p pr mt30" style="height:auto !important">
					<?php echo $data['tcontent']?><br><br>
					<?php echo $data['name']?><br>
					<?php echo $data['location']?><br>
					
					<?php if($data['image_1']<>'') echo "<img src='uploads/$data[image_1]' width='50' height='50'>&nbsp;&nbsp;"?>
					<?php if($data['image_2']<>'') echo "<img src='uploads/$data[image_2]' width='50' height='50'>"?><br>
					<div class="edit-btn" onClick= "return editTextTestimonial(<?php echo $data['id']?>)"></div>
					<div><a class="del-btn" href="advanced-sales-page-testimonials.php?act=del&id=<?php echo $data['id']?>" onclick = "if (! confirm('Are you sure you want to delete this Testimonial?')) return false;"> </a></div>
					</div> 
				<?php }
				}else{
					echo "Image testimonials not available";
				}?>          
               
                </div>
              </div>
            </div>
          </div>
        </div>
               
        <div class="prevbtn mt20 ml20 f-left" onClick="javascript:window.location='advanced-sales-page-content.php'"></div>
		<div><input type="button" name="content_submit" value="" class="savebtn mt20 mr20 f-right"  onClick="javascript:window.location='<?php echo $_SESSION['redurl']?>'"></div>
         
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
  <div id="editTextTestimonialpopup" style="min-width:560px !important; background:#fff !important; width: auto; min-height: 116.633px; height: auto; display:none">
<form method="post" onSubmit="return testmonialTextFormValid(this)">
              <div class="tst">
                <div class="f-left w49p">
                  <label>Name</label>
                  <input class="lg-input w100p" name="testimonial_name_edit" id="testimonial_name_edit">
                </div>
                <div class="f-left ml20">
                  <label>Location ( City, State/Province )</label>
                  <input class="lg-input w100p" name="testimonial_location_edit" id="testimonial_location_edit">
                </div>
                <label>Testimonials</label>
                <textarea class="editable lg-textarea-70 w100p" name="testimonial_content_edit" id="testimonial_content_edit"></textarea>
				<input type="hidden" name="tid" id="tid">
                <div><input type="submit" name="testimonialTextSubmitedit" value="" class="add-btn f-right" ></div>
              </div>
			  </form>
</div>
</body>
</html>
