<?php
$cart_page='current_page_item';
include_once("classes/class.system.php");
include_once("classes/class.js.php");
include_once('includes/checksession.php');
$obj=new System();
$obj->dbconn();

if($_GET['action']=='delete')
{
$id=$_GET['id'];
$result=$obj->deletepurcahse($id);
header('location: ?sid='.$_SESSION['cart_id']);
exit;
}
else
{
$id=(isset($_GET['sid']))?$_GET['sid']:0;
$data=$obj->get_purcahses($id);
$_SESSION['cart_id']=$id;

}?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fitness Website Gurus</title>
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<!--[if lt IE 9]>
<script src="js/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="stylesheet" href="css/tipsy.css" type="text/css" />   
<script type="text/javascript" src="js/jquery.tipsy.js"></script> 
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php include('includes/header.php'); ?>
 <div class="site-image" id="site-image"> 
<div class="hfeed" id="page">
  <div id="main">
   
      <div id="primary" class="my-shopping-cart pd30">
        <h1><span>my  shopping </span> cart</h1>
        <div class="content">  
         
            <h2><span>view</span> purchases</h2> 
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
  <tr>
    <th>Ref #</th>
    <th>Date / Time</th>
    <th>Item Title</th>
    <th>Billing<br>
      Type</th>
    <th>Amount</th>
    <th>Billing <br>
      Name</th>
    <th>Action</th>
  </tr>
 <?php
 if($data)
 {
 foreach($data as $k=>$v)
 {
 ?>
  <tr>
    <td><?php echo $v['ref_no']; ?></td>
    <td class="center"><?php echo $v['date']; ?></td>
    <td><?php echo $v['title']; ?> </td>
    <td class="center"><?php echo $v['b_type']; ?>  </td>
    <td class="center">$<?php echo $v['amount']; ?> </td>
    <td class="center"><?php echo $v['name']; ?> </td>
    <td class="center"><a href="#AddItem_form"  onclick= "return getviewPopup(<?php echo $k;?>)" original-title="View" class="icon-edit"> </a><span>View</span> 
	<a href="#<?php echo $k;?>"  original-title="Cancel" onclick= "return cancel_popup(<?php echo $k;?>)" class="icon-delete"></a><span>Cancel</span>  
	 </td>
  </tr> 
 <?php 
 }
 }
 else
 {?>

  <tr>
    <td colspan="7" class="foot" align='center'>No Data Found</td>
  </tr>
<?php } ?>
  <tr>
    <td colspan="7" class="foot">&nbsp; </td>
  </tr>  
  </table>

    <!-- #content -->
  </div></div><div class="clr" > </div>
  <div class="pkgpage-shadow"></div>
  <div class="clr" > </div>
  <!-- #primary -->
</div>
<!-- #main -->
</div>
</div>
<!-- site-image -->
<script type='text/javascript'>
  $(function() {
$('.icon-edit').tipsy({gravity: 'n'});
$('.icon-delete').tipsy({gravity: 'n'});
$('.icon-cart').tipsy({gravity: 'n'});
$('.icon-link').tipsy({gravity: 'n'}); 
  });
</script>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
<?php include('includes/footer.php'); ?>
</body>
</html>
