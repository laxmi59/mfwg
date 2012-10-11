<?php
$cart_page='current_page_item';
include_once("classes/class.system.php");
include_once("classes/class.js.php");
include_once('includes/checksession.php');

$obj=new System();
$obj->dbconn();
$page=(isset($_GET['page']))?$_GET['page']:0;
$data=$obj->get_my_shoppingcarts($page,RESULTS_PER_PAGE);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data1=$_POST;
	$res=$obj->ManageShopingCartItme($data1);
	if($res[0]==1)
	{
		echo "<script>location.replace('my-shopping-cart.php')</script>";
		exit;
	}
}
if(isset($_REQUEST['act']) && isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$res=$obj->deleteItem($id);
	if($res[0]==1){
		echo "<script>location.replace('my-shopping-cart.php')</script>";
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
         
          <div class="graybox"><div class="f-left"><!--<a href="#" class="additem-btn"></a>--><a href="#AddItem_form" title="Add Item" class="additem-btn" id="additem-btn"></a></div> <div class="f-right mt5"> <a href="#" original-title="Edit" class="icon-edit"></a><span>Edit</span> <a href="#"  original-title="Delete" class="icon-delete"></a><span>Delete</span> <a href="#"  original-title="View Purchases" class="icon-cart"></a><span>View Purchases</span> <a href="#" original-title="View Link"  class="icon-link"></a><span>View Link</span></div></div>
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Payment<br>
      Type</th>
    <th># of <br>
      Payments</th>
    <th>Amount</th>
    <th>Action</th>
  </tr>
<?php
if(is_array($data) && $data['total']>0)
{
	$i=0;
	foreach($data['title'] as $each_title)
	{
?>
  
  <tr>
    <td><?php echo $each_title?></td>
    <td><?php echo $data['description'][$i];?></td>
    <td class="center"><?php if($data['billing_type'][$i] == 1) echo "One Time"; else echo "Recurring";?></td>
    <td class="center"><?php if($data['billing_type'][$i] == 2) echo $data['no_of_payments'][$i]; else if($data['billing_type'][$i] == 1) echo "--";?></td>
    <td class="center"><?php echo "$".$data['amount'][$i];?></td>
    <td class="center"><a href="javascript:void(0)" id="edititem-btn_<?php echo $data['sid'][$i];?>" onClick="return getEditPopup('<?php echo $data['sid'][$i];?>')" original-title="Edit" class="icon-edit"></a> 
	<a href="my-shopping-cart.php?act=del&id=<?php echo $data['sid'][$i];?>" onclick = "if (! confirm('Are you sure you want to delete this Item?')) return false;" original-title="Delete" class="icon-delete"></a> <a href="view-purchases.php?sid=<?php echo $data['sid'][$i];?>" original-title="View Purchases" class="icon-cart"></a> 
	<a  href="javascript:void(0)" id="viewitem-btn_<?php echo $data['sid'][$i];?>" onClick="return viewLinkPopup('<?php echo $data['sid'][$i];?>')"  original-title="View Link" class="icon-link"></a>  </td>
  </tr>
<?php  $i++; }  ?>
<?php
	  /*
	if($page>0)
	{
		echo '<a href="?page='.($page-1).'" class="prev"> </a>';
	}
	for($m=1;$m<=ceil($data['total']/RESULTS_PER_PAGE) ;$m++)
	{
		if($page==$m-1)
		{
		echo $m;
		}
		else
		{
		echo '<a href="?page='.($m-1).'">'.$m.'</a>';
		}
	}
	if($page+1!=ceil($data['total']/RESULTS_PER_PAGE))
	{
		echo '<a href="?page='.($page+1).'" class="next">';
	}
	*/
} else { ?>
<?php 
		echo "<tr><td colspan=6 align=\"center\"><strong>None Added</strong></td></tr>";
}
?>
<div class="pn">
</div>

  <tr>
    <td colspan="6" class="foot">&nbsp; </td>
  </tr>
          </table>


<div id="AddItem_formdiv" style="display:none">
	<form id="AddItem_form" method="post" action="" onSubmit="return addItemShoppingCart(this)">
	
<div class="additem">
<h1><span>add item</span> to cart</h1>
<ul>
<li><label>Title</label> <input id="title" name="title" class="input" value=""> </li>
<li><label>Description</label> <input id="description" name="description" class="input" value=""> </li>
<li><label>Billing Type</label>  
<select name="billing_type" id="billing_type" onChange="return billingstatvalidation()">
<option value="">select</option>
<option value="1">One time</option>
<option value="2">Recuring</option>
</select> </li>
<li><label># of Payments</label> <input name="no_of_payments" id="no_of_payments" class="input" value=""> </li>
<li><label>Amount</label> <input name="amount" class="input" id="amount" value=""> </li>
<li> <input type="submit" class="btn-save" name="insertItem" value="save"> </li>
</ul>
</div>
  </form></div>
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
