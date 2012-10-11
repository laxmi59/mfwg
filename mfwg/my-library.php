<?php
$library_page='current_page_item';
include_once("classes/class.system.php");
//include_once("classes/class.js.php");
include_once('includes/checksession.php');

$obj=new System();
$obj->dbconn();
$data=$obj->get_lib();
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
<script type='text/javascript' src='js/jquery-1.4.2.min.js'></script>  
<link rel="stylesheet" href="css/tipsy.css" type="text/css" />   
<script type="text/javascript" src="js/jquery.tipsy.js"></script> 
</head>
<body>
<?php include('includes/header.php'); ?>
 <div class="site-image" id="site-image"> 
<div class="hfeed" id="page">
  <div id="main">
    <form method="post" enctype="multipart/form-data">
      <div id="primary" class="my-library pd30">
        <h1>My   library        </h1>
        <div class="content">  
          
          <p>&quot;Voracious readers look no further, the Fitness Website Gurus have you covered. In the My Library page you will find a serious collection of ebooks to peruse. They contain invaluable tips on fitness marketing and are written by experts in the field. The ebooks available to you reflect your package choice (i.e. the Bronze package corresponds to basic-level material, Silver to intermediate, and Gold to advanced). You have the option to either open ebooks within your browser or download them and open them in the pdf reader of your choice.&quot;</p>
        
        </div>
 <?php

if($data)
{
$i=0;
foreach($lib_cat as $k=>$v)
{
		if(count($data[$k])>0)
	  {
?>
<h2><span><?php echo ucfirst($v); ?></span>    Library      </h2>
<div class="content">    
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt7"> 
<tr>
<th width="363">Title</th>
<th width="256">Category</th>
<th width="213">Action</th>
</tr>
<?php

			foreach($data[$k]['title'] as $lib_id=>$each_title)
			{

				#if($data[$k]['doc_type'][$lib_id]==1)
				#{
				#	$link='/Uploads/'.$data[$k]['file_name'][$lib_id];
				#}
				#else
				#{
					$my_library_content='my-library_content.php?id='.$lib_id;
					if(file_exists('uploads/'.$data[$k]['file_name'][$lib_id]))
						$download_link='download.php?id='.$lib_id;
					else
						$download_link='#';


				#}
	
?>
			<tr>
			<td><?php echo $each_title; ?></td>
			<td>Fitness Marketing</td>
			<td> <a href="<?php echo $my_library_content; ?>" class="icon-open" original-title="Open" target="_blank"></a><span>Open</span> 
 <a href="<?php echo $download_link; ?>" original-title="Download" class="icon-download" target="_blank"></a><span>Download</span> </td> 
			</tr>
			<?php } ?>
<tr>
<td colspan="3" class="foot">Notes : Click "<strong>Open</strong>" to open the selected ebook. Click "<strong>Download</strong>" to download the selected ebook. </td>
</tr>

</table> 
</div>
<?php } ?>

<?php } } ?>
 
         
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
<script type='text/javascript'>
  $(function() {
$('.icon-open').tipsy({gravity: 'n'}); 
$('.icon-download').tipsy({gravity: 'n'}); 
  });
</script>
<?php include('includes/footer.php'); ?>
</body>
</html>
