<?php
include_once("classes/class.system.php");
include_once("classes/class.js.php");
$S = new System();
$S->dbconn();
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data=$_POST;
	$res=$S->basicSiteData($data);
	if($res[0]==1)
	{
		$tempid=$S->getTemplate();
		if($tempid=='1'){
			Header("Location: sales-page-design.php");
			exit;
		}elseif($tempid=='2'){
			Header("Location: advanced-sales-page-design.php");
			exit;
		}else{
			Header("Location: blog-page-design.php");
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
<div class="site-image">
  <div class="hfeed" id="page">
    <div id="main">
      <div id="primary" class="pd30">
	  <form method="post" onSubmit="return basicSiteValidations(this)">
        <div class="blue-grd blue-bdr tab">
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          Basic Site Information <br>
		  Domain option, use your own existing domain - auto email with setup instructions
		  </div>
        <div class="blue-grd blue-bdr msgbox mt20">
          <div class="tooltip-arrow"></div>
          <div class="blue-corner topLeft"></div>
          <div class="blue-corner topRight"></div>
          <div class="blue-corner bottomLeft"></div>
          <div class="blue-corner bottomRight"></div>
          This page allows you to setup your website. Here you can customize the domain name, site title, tagline, meta keywords and meta description </div>
        <div class="gray-grd gray-bdr graybox mt20">
          <div class="gray-corner topLeft"></div>
          <div class="gray-corner topRight"></div>
          <div class="gray-corner bottomLeft"></div>
          <div class="gray-corner bottomRight"></div>
          <h2 class="title">domain</h2>
          <h3 class="small  mb35">name</h3>
          <div class="col50 pr20">
            <input class="lg-input w230" type="text" name="domain_name" id="domain_name" onBlur="getDomainStatus()">
            <input type="button"  class="check-btn ml35 mt5- f-right" onClick="return getDomainStatus()">
			<div id="domainResult"></div>
			<input type="hidden" name="domainResult_status" id="domainResult_status">
          </div>
          <div class="col50 "> Click here to see if the domain name you have selected is available (e.g. domainname.com).</div>
          <div class="hline"></div>
          <h2 class="title mb45">site title</h2>
          <div class="col50 pr20">
            <input class="lg-input w100p" type="text" name="site_title" id="site_title">
          </div>
          <div class="col50"> A title tag is the main text that describes an online document. Optimal format: Primary Keyword - Secondary Keyword | Brand Name or Brand Name | Primary Keyword and Secondary Keyword. Search engines will display a maximum of 70 characters in the search results.</div>
          <div class="hline"></div>
          <h2 class="title mb45">tagline</h2>
          <div class="col50 pr20">
            <textarea class="lg-textarea-65 w100p" name="tagline" id="tagline"></textarea>
          </div>
          <div class="col50"> A website's tagline must explain what the company does and what makes it unique among competitors (e.g. Elite fitness training at affordable prices).</div>
          <div class="hline"></div>
          <h2 class="title">meta</h2>
          <h3 class="small  mb35">keywords</h3>
          <div class="col50 pr20">
            <textarea class="lg-textarea-65 w100p" name="meta_keywords" id="meta_keywords"></textarea>
          </div>
          <div class="col50 "> Meta keywords are ideal if simply for the sake of organization. Scan your title/page body and make a list of the most important terms you see. Pick the terms that most accurately describe the content of the page.</div>
          <div class="hline"></div>
          <h2 class="title">meta</h2>
          <h3 class="small  mb35">description</h3>
          <div class="col50 pr20">
            <textarea class="lg-textarea-65 w100p" name="meta_descriptions" id="meta_descriptions"></textarea>
          </div>
          <div class="col50 "> The Meta Description provides a clear explanation of your page. Make sure that your description is thorough and summarizes your page effectively. Your meta description should be between 150-160 characters.</div>
        </div>
        <div align="center" ><input type="submit" value="" name="next" class="next-btn mt20"></div>
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
</div>
<!-- site-image --> 
  <?php include('includes/footer.php'); ?>
</body>
</html>
