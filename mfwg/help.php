<?php
$help_page='current_page_item';
include_once("classes/class.system.php");
include_once("classes/class.js.php");
include_once('includes/checksession.php');

$obj=new System();
$obj->dbconn();
$data=$obj->get_help();
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
          <div class="content"> <img src="images/help-img.png" width="105" height="90" align="left" class="mr20">
            <p>&quot;Here you can find out how to use various elements of the members site. If you are having trouble using the site, click on the topic you need help with to see a detailed explanation of that topic.&quot;<Br><Br></p>
          </div>
<?php
if($data)
{
$i=0;
foreach($help_cat as $k=>$v)
{
if(count($data[$k])>0)
{
?>

          <h2><span><?php echo $v; ?></span> </h2>
          <div class="content">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt7">
<?php foreach($data[$k]['title'] as $help_id=>$each_title)
{ ?>
              <tr>
                <th width="100%"><a href='help1.php?helpid=<?php echo $help_id;?>'><?php echo $each_title; ?></a></th>
              </tr>
		  <?php
}
		  }
		  ?>
           </table>
  


<?php } } ?>
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
