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
   
      <div id="primary" class="my-calendar pd30">
        <h1><span>   my  calendar </span> </h1>
        <div class="content">  
         
          <div class="graybox"><div class="f-left"><!--<a href="#" class="additem-btn"></a>--><a href="#AddItem_form" title="Add Item" class="additem-btn" id="additem-btn"></a></div> <div class="f-right mt5"> <a href="#" original-title="Edit" class="icon-edit"></a><span>Edit</span> <a href="#"  original-title="Delete" class="icon-delete"></a><span>Delete</span>      </div></div>
         <div class="note"> Click Add Item button to add an item. Select the item(s) and click Edit or Delete button to edit or delete item(s) from your schedule.</div>
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
  <tr>
    <th>Time</th>
    <th>Monday</th>
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
    <th>Saturday</th>
    <th>Sunday</th>
  </tr>
  <tr>
    <td class="b"> 00:00 AM</td> 
    <td class="g"> <a href="#" original-title="Edit" class="icon-edit-sm"></a><a href="#" original-title="Delete" class="icon-delete-sm"></a>Basic Fitness...</td>
    <td class="center">&nbsp;</td>
    <td class="center g"> <a href="#" original-title="Edit" class="icon-edit-sm"></a><a href="#" original-title="Delete" class="icon-delete-sm"></a>Core Fitness...</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
 
  
  <tr>
    <td>00:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>01:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>01:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td class="b">02:00 AM</td>
    <td class="y"><a href="#" original-title="Edit" class="icon-edit-sm"></a><a href="#" original-title="Delete" class="icon-delete-sm"></a>Basic Fitness<br>
Session</td>
    <td class="center">&nbsp;</td>
    <td class="center y"><a href="#" original-title="Edit" class="icon-edit-sm"></a><a href="#" original-title="Delete" class="icon-delete-sm"></a>Core Fitness<br>
      Session</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>02:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>03:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>03:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td class="b">04:00 AM</td>
    <td class="g"><a href="#" original-title="Edit" class="icon-edit-sm"></a><a href="#" original-title="Delete" class="icon-delete-sm"></a>Basic Fitness<br>
      Session</td>
    <td class="center">&nbsp;</td>
    <td class="center g"><a href="#" original-title="Edit" class="icon-edit-sm"></a><a href="#" original-title="Delete" class="icon-delete-sm"></a>Core Fitness<br>
      Session</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>04:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>05:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>05:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>06:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>06:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>07:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>07:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>08:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>08:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>09:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>09:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>010:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>010:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>011:00 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>011:30 AM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>012:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>01:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>01:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>02:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>02:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>03:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>03:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>04:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>04:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>05:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>05:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>06:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>06:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>07:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>07:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>08:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>08:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>09:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>09:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>010:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>010:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>011:00 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td>011:30 PM</td>
    <td>&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center">&nbsp;</td>
    <td class="center"></td>
  </tr>
  <tr>
    <td colspan="8" class="foot">&nbsp; </td>
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
