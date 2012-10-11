<?php
$cal_page='current_page_item';
include_once("classes/class.system.php");
include_once("classes/class.js.php");
include_once('includes/checksession.php');
$obj=new System();
$obj->dbconn();
$data=$obj->get_events();
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$res=$obj->addevent($_POST,$_POST['id']);
	if($res>0)
	{
		echo "<script>location.replace('my-calendar.php')</script>";
		exit;
	}
}
extract($_GET);
if($action=='delete')
{
$obj->delete_event($id);
		echo "<script>location.replace('my-calendar.php')</script>";
		exit;
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
        <h1><span> my  calendar </span> </h1>
        <div class="content">
          <div class="graybox">
            <div class="f-left">
              <!--<a href="#" class="additem-btn"></a>-->
              <a href="#AddItem_form" title="Add Item" class="additem-btn" id="additem-btn"></a></div>
            <div class="f-right mt5"> <a href="#" original-title="Edit" class="icon-edit"></a><span>Edit</span> <a href="#"  original-title="Delete" class="icon-delete"></a><span>Delete</span> </div>
          </div>
          <div class="note"> Click the "Add Item" button to add an item to your schedule. Once an item has been added, click the "Edit" or "Delete" icons to edit or delete the item from your schedule.</div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th>Time</th>
              <?php
	
	
	foreach($days as $k=>$v)
		{
		echo '<th>'.$v.'</th>';
		
		}
	
	?>
            </tr>
            <?php 
	   $start = strtotime('12:00 AM');
    $end   = strtotime('11:59 PM');
	  for($i = $start;$i<=$end;$i+=1800){ ?>
            <tr>
              <td class="b">&nbsp;<?php echo date('g:i A', $i); ?></td>
              <?php
		
		for($m=0; $m< 7; $m++)
		{
		?>
              <td class="center <?php  if( $data && (count($data['start_time'][$i][$m])>0 || count($data['end_time'][$i][$m])>0) ) { ?>g<?php } ?>">&nbsp;<?php
	   if($data && count($data['start_time'][$i][$m])>0)
	   {
	  	foreach($data['start_time'][$i][$m] as $k=>$v)
		{
			
	   ?>
                <a href="#" original-title="Edit" alt="Edit" onclick="javascript:edit_event(<?php echo $k; ?>);" class="icon-edit-sm"></a><a href="#" original-title="Delete" class="icon-delete-sm" onClick="javascript:delete_event(<?php echo $k; ?>);" alt="Delete"></a><?php echo $v; ?>
                <?php
	   }
	    }

?></td>
              <?php } ?>
            </tr>
            <?php } ?>
            <tr>
              <td colspan="8" class="foot">&nbsp;</td>
            </tr>
          </table>
          <div id="AddItem_formdiv" style="display:none">
            <form id="AddItem_form" method="post" action="">
              <input type='hidden' id='id' name='id' value='0' />
              <div class="additem">
                <h1><span>Add NEW </span>time SEtting</h1>
                <ul>
                  <li>
                    <label>Title</label>
                    <input id="title" name="title" id='title' class="input" value="">
                  </li>
                  <li>
                    <label>Day of Week</label>
                    <select name="day" id="day" >
                      <?php

foreach($days as $k=>$v)
{

//if($k>=date('w'))
{
?>
                      <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                      <?php
}
}
?>
                    </select>
                  </li>
                  <li>
                    <label>Start Time</label>
                    <select name="start_time" id="start_time" >
                      <?php
 $start = strtotime('12:00 AM');
    $end   = strtotime('11:59 PM');
	  for($i = $start;$i<=$end;$i+=1800){ ?>
                      <option value="<?=$i?>"><?php echo date('g:i A', $i); ?></option>
                      <?php
	  }
	  ?>
                    </select>
                  </li>
                  <li>
                    <label>Stop Time</label>
                    <select name="end_time" id="end_time" >
                      <?php
 $start = strtotime('12:00 AM');
    $end   = strtotime('11:59 PM');
	  for($i = $start;$i<=$end;$i+=1800){ ?>
                      <option value="<?=$i?>"><?php echo date('g:i A', $i); ?></option>
                      <?php
	  }
	  ?>
                    </select>
                  </li>
                  <li>
                    <input type="button" onclick="return validate_events();" class="btn-add" name="insertItem" value="save">
                  </li>
                </ul>
              </div>
            </form>
          </div>
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
$('.icon-edit-sm').tipsy({gravity: 'n'});
$('.icon-delete-sm').tipsy({gravity: 'n'});

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
