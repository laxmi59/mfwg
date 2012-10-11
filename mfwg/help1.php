<?php
$help_page='current_page_item';
include_once("classes/class.system.php");
include_once("classes/class.js.php");
include_once('includes/checksession.php');

$obj=new System();
$obj->dbconn();
$helpid=$_GET['helpid'];
$data=$obj->gethelp($helpid);
//print_r($data); exit;
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
        <div id="primary" class="help-center pd30">
          <h1><span>Help</span> Center </h1>
<?php
if($data)
{
?>
          <div class="f-left"> <h3>HELP &gt; <?php echo $help_cat[$data['cat_id']]; ?> &gt; <?php echo $data['title'];?> </h3></div>
          <div class="f-right"><a href="help.php" class="btn-goback"></a></div>
          <div class="content clr">
           <img src="images/help-img.png" width="105" height="90" align="left" class="mr20"> <div class="ml130 mr130">
		   <p><?php echo $data['description'];?></p>

		   </div>
          </div>
<?php   } ?>
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
$('.icon-open').tipsy({gravity: 'n'}); 
$('.icon-download').tipsy({gravity: 'n'}); 
  });
</script>
<?php include('includes/footer.php'); ?>
</body>
</html>
