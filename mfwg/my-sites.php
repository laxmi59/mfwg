<?php
$mysite_page='current_page_item';
include_once("classes/class.system.php");
//include_once("classes/class.js.php");
include_once('includes/checksession.php');

$obj=new System();
$obj->dbconn();
$data=$obj->getUserSites($_SESSION['userid']);
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
<?php $pack = $obj->getPackage();
  $refr=base64_encode("my-sites.php");
  switch($pack){
  	case "1":
		$redirectUrl="sales-page-design.php?redfr=".$refr;
	break;
	case "2":
		$redirectUrl="template-selection.php?redfr=".$refr;
	break;
	case "3":
		$redirectUrl="template-selection.php?redfr=".$refr;
	break;
  }?>
 <div class="site-image" id="site-image"> 
<div class="hfeed" id="page">
  <div id="main">
    <form method="post" enctype="multipart/form-data">
      <div id="primary" class="my-sites pd30">
        <h1> my  sites </h1>
        <div class="content">  
         
          <p>Want to make changes to your site? Feeling like a new template? You're in the right place. The My Site page is where you can conveniently edit and view your site whenever you feel like doing so, and with our user-friendly layout it's a breeze to select alternative options.</p>
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
  <tr>
    <th width="29">#</th>
    <th width="580">Domain Name</th>
    <th width="190">Action</th>
  </tr>
  <?php
  if($data)
	{	$i=1;
		foreach($data as $k=>$v)
		{?>
  <tr>
    <td><?php echo $i?></td>
    <td><a href="http://<?php echo $v;?>" target="_blank"><?php echo $v;?></a></td>
 <td><a href="http://<?php echo $v;?>" class="icon-goto" original-title="Go To" target="_blank"></a><span>Go To</span> 
 <a href="<?php echo $redirectUrl?>" original-title="Edit" class="icon-edit"></a><span>Edit</span> </td> 
  </tr>
  <?php 
			$i++;
  }
  }
  else
  {?>
  <tr>
    <td colspan="3" align='center' class="foot">No Sites Found.</td>
    </tr>
  <?php
  }?>
  
  <tr>
    <td colspan="3" class="foot">Notes : Click "<b>Go To</b>"  to open the selected site. Click "<b>Edit</b>"  to make changes to the selected site's templates.</td>
    </tr>
          </table>

        </div>
        
         
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
$('.icon-goto').tipsy({gravity: 'n'});
$('.icon-edit').tipsy({gravity: 'n'});
$('.icon-delete').tipsy({gravity: 'n'});
$('.icon-cart').tipsy({gravity: 'n'});
$('.icon-link').tipsy({gravity: 'n'}); 
  });
</script>
<?php include('includes/footer.php'); ?>
</body>
</html>
