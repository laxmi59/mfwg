<?php
include_once("/home/mfwg/classes/class.system.php");
$S = new System();
$S->dbconn();

if($_POST['action']=='checkDomain'){
	$username="rama";
	$password="ritwik";
	$domain =$_POST['dname'];
	$contents = file_get_contents("http://www.whoisxmlapi.com/whoisserver/WhoisService?domainName=".$domain."&cmd=GET_DN_AVAILABILITY&username=$username&password=$password&outputFormat=JSON");
	// echo $contents;
	$res=json_decode($contents);
	if($res){
		$domainInfo = $res->DomainInfo;
		if($domainInfo){
			//echo "Domain name: " . print_r($domainInfo->domainName,1) ."<br/>";
			//echo "Domain Availability: " .print_r($domainInfo->domainAvailability,1) ."<br/>";
			//print_r($domainInfo);
			if($domainInfo->domainAvailability == 'UNAVAILABLE'){
				echo "no";
			}else{
				echo "yes";
			}			
		}
	}		 
}
if($_POST['action'] =='addTestimonialContent'){
	$data=$_POST;
	$res=$S->saveTestimonialText($data);
	print_r($res);
	
}
if($_POST['action'] =='getTestimonialContent'){
	$id=$_POST['id'];
	$res=$S->getTestimonial($id);
	//print_r($res);
	echo '{"name":'.json_encode($res->name).', "location":'. json_encode($res->location) .', "content":'. json_encode($res->testimonial) .'}';exit;
	
}
if($_POST['action'] =='editItem'){
	$id=$_POST['id'];
	$res=$S->get_my_shoppingcartbyid($id);
	//print_r($res);
	//echo '{"sid":'.json_encode($res->id).', "title":'. json_encode($res->title) .', "description":'. json_encode($res->description) .'}';exit;
	if($res->billing_type == '1'){
		$sel1="selected";
		$sel2="";
		$disb="disabled";
	}elseif($res->billing_type == '2'){
		$sel1="";
		$sel2 ="selected";
		$disb="";
	}else{
		$sel1="";
		$sel2="";
		$disb="";
	}
	if($res->no_of_payments==0){
		$pval='';
	}else{
		$pval=$res->no_of_payments;
	}
	echo '<div id="AddItem_formdiv">
	<form id="AddItem_form" method="post" action="" onSubmit="return addItemShoppingCart(this)">
	<input type="hidden" name="sid" id="sid" value="'.$res->id.'">
<div class="additem">
<h1><span>Edit item</span> in cart</h1>
<ul>
<li><label>Title</label> <input id="title" name="title" class="input" value="'.$res->title.'"> </li>
<li><label>Description</label> <input id="description" name="description" class="input" value="'.$res->description.'"> </li>
<li><label>Billing Type</label>  
<select name="billing_type" id="billing_type1" onChange="return billingstatvalidationedit()">
<option value="">select</option>
<option value="1" '.$sel1.' >One time</option>
<option value="2" '.$sel2.'>Recuring</option>
</select> </li>
<li><label># of Payments</label> <input name="no_of_payments" id="no_of_payments1" class="input" value="'.$pval.'" '.$disb.'> </li>
<li><label>Amount</label> <input name="amount" id="amount" class="input" value="'.$res->amount.'"> </li>
<li> <input type="submit" class="btn-save" name="insertItem" value="save"> </li>
</ul>
</div>
  </form></div>';
	
}

if($_POST['action'] =='viewLink'){
	$id=$_POST['id'];
	
	echo '<div id="AddItem_formdiv">
<div class="additem" style="height:250px">
<h1><span>View</span> Link</h1>
<ul>
<li><label>Link: </label> <a href="http://members.fitnesswebsitegurus.com/checkout.php?id='.$id.'"  style="font-size:12px; color: #0072BC; " target=_blank>http://members.fitnesswebsitegurus.com/checkout.php?id='.$id.'</a> </li>
</ul>
</div>
 </div>';
	
}
if($_POST['action'] =='purchaseView'){
	$id=$_POST['id'];
	$data=$S->purcahsesView($id);
	if($data)
	{
	$content= '<div id="AddItem_formdiv">
<div class="additem">
<h1><span>View</span> Puchase</h1>
<table width="100%" border="0" cellspacing="0" cellpadding="0"> 
  <tr>
    <th>Ref #</th>
    <th>Date Time</th>
    <th>Item Title</th>
    <th>Billing Type</th>
    <th>Amount</th>
    <th>Billing  Name</th>
    <th>Action</th>
  </tr>';
  foreach($data as $k=>$v)
 {

  $content.= "<tr><td>".$v['ref_no']."</td><td class='center'>".$v['date']."</td><td>".$v['title']."</td><td class='center'>".$v['b_type']."</td><td class='center'>".$v['amount']."</td><td class='center'>".$v['name']."</td><td class='center'><a href='#' onclick='return cancel_popup(".$id.");'  original-title='Cancel' class='icon-delete'></a><span>Cancel</span></td></tr>"; 

 }
 $content.= "</table></div>";

 }
	echo $content;
}

if($_POST['action'] =='DeletePurchase'){
	$id=$_POST['id'];
	//$data=$S->purcahsesView($id);
	
	echo '<div id="AddItem_formdiv">
<div class="additem" style="height:250px">
<h1><span>Cancel RECURRING PAYMENT</span> Link</h1>
<div>Are you sure you want to cancel this payment?</div>
<div><a href="view-purchases.php?action=delete&id='.$id.'"> Yes</a><a href="">NO</a></div>
</div>
 </div>';
 
	echo $content;
}

if($_POST['action']=='editEvent')
{
	$id=$_POST['id'];
	$data=$S->editevent($id);
	$event_title=$data['title'];
	$day_number=date('w',strtotime($data['start_time']));
	$start_time=strtotime(date('H:i',strtotime($data['start_time'])));
	$end_time=strtotime(date('H:i',strtotime($data['end_time'])));
	$content="<div id='AddItem_formdiv' style='display:'><form id='AddItem_form' method='post' action='' onSubmit='return edit_events();'><input type='hidden' name='id' value='".$id."' /><div class='additem'><h1><span>Edit time</span> SEttings</h1><ul><li><label>Title</label> <input id='title_edit' name='title'  class='input' value='".$event_title."'> </li><li><label>day of weeks</label><select name='day' id='day' >";
foreach($days as $k=>$v)
{
if($k>=date('w'))
{
if($k==$day_number)
$content.="<option value='".$k."' selected='selected'>".$v."</option>";
else
$content.="<option value='".$k."'>".$v."</option>";

}
}

$content.='</select>
</li>
<li><label>start time</label>  
<select name="start_time" id="start_time_edit" >';
 $start = strtotime('12:00 AM');
    $end   = strtotime('11:59 PM');
	  for($i = $start;$i<=$end;$i+=1800){ 
	  if($i==$start_time)  
		$content.=" <option value='".$i."' selected='selected'>".date('g:i A', $i)."</option>";
	  else
		$content.=" <option value='".$i."'>".date('g:i A', $i)."</option>";
	  
	  }
	  
$content.='</select> </li>
<li><label>stop time</label>  
<select name="end_time" id="end_time_edit" >';
 $start = strtotime('12:00 AM');
    $end   = strtotime('11:59 PM');
	  for($i = $start;$i<=$end;$i+=1800){ 
	 if($i==$end_time)  
		$content.=" <option value='".$i."' selected='selected'>".date('g:i A', $i)."</option>";
	  else
		$content.=" <option value='".$i."'>".date('g:i A', $i)."</option>";
	 
	  }
	  
$content.='</select> </li>
<li><input type="submit" class="btn-save" name="insertItem" value="save"> </li>
</ul>
</div>
  </form></div>';
echo $content;
exit;
}

if($_POST['action'] =='Deleteevent'){
	$id=$_POST['id'];
	//$data=$S->purcahsesView($id);
	
	echo '<div id="AddItem_formdiv">
<div class="additem" style="height:250px">
<h1><span>Delete</span> Event</h1>
<div>Are you sure you want to cancel this payment?</div>
<div><a href="my-calendar.php?action=delete&id='.$id.'"> Yes</a><a href="">NO</a></div>
</div>
 </div>';
 
	echo $content;
}
?>