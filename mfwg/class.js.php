<?php 
$path_parts = pathinfo($_SERVER['PHP_SELF']);
$dirname =$path_parts['dirname'];
$pname= $path_parts['basename'];
?>
<!-- for validations -->
<script type="text/javascript" src="js/valid.js"></script>
<!-- JQuery -->
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<!-- JQuery Ajax -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<!-- JQuery Uploadify -->
<script type="text/javascript" src="includes/uploadify/jquery.uploadify-3.1.js"></script>
<!-- JQuery color Picker -->
<script type="text/javascript" src="includes/color-picker/jquery.ps-color-picker.js"></script>
<!-- JQuery popup -->
<link href="includes/popup/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="includes/popup/jquery-ui.js"></script>
<!-- Fancy Jquery POPUP -->
<?php /*?><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script><?php */?>
<script type="text/javascript" src="includes/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="includes/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<style type="text/css">
.opacitypopup{position:relative; z-index:101;}
.opacitypopup .main{position:absolute; width:100%; background:url("images/transparent.png") repeat left top  !important;}
.ui-dialog .ui-dialog-titlebar-close {display:block !important;}
</style>
<!-- load the Aloha Editor core and some plugins -->
<script src="includes/aloha-editor/aloha/lib/aloha.js" data-aloha-plugins="common/format, common/list, common/link, common/highlighteditables"></script>
<!-- load the Aloha Editor CSS styles -->
<link href="includes/aloha-editor/aloha/css/aloha.css" rel="stylesheet" type="text/css" />
<!-- make all elements with class="editable" editable with Aloha Editor -->
<script type="text/javascript">
	 Aloha.ready( function() {
			var $ = Aloha.jQuery;
			$('.editable').aloha();
	 });
</script>
<?php
switch($pname){
	case "sales-page-design.php" :?>
	<script type="text/javascript">
	$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	//alert(divh);
    $("#popmasksettingmain").css("height",divh+"px");
// Profile file upload
	$('#profile_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#profile_image").val(file.name);
			$("#profile_img").attr("src","uploads/"+file.name);
		} 
	});
// profile popup
	$("#profile_number_opt").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#profile_number_optpopup").dialog({ width: 600});		
	});	
// Logo Files Upload
	$('#logo_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#logo_custom").val(file.name)
			$("#logo_img").attr("src","uploads/"+file.name);
		} 
	});
// Custom select
	$("input:radio[name=logo_optons]").click(function() {
    	$logo_opton_select = $('input:radio[name=logo_optons]:checked').val();
		if($logo_opton_select == '2'){
			$("#logo_title").val("");
			$("#logo_title").attr("disabled",true);
			$("#premade_title").attr("disabled",true);
			$("#prmade_title_color").val("");
			$("#logo_opt_title").attr("disabled","disabled");
			//sub title
			$("#logo_subtitle").val("");
			$("#logo_subtitle").attr("disabled",true);
			$("#premade_subtitle").attr("disabled",true);
			$("#prmade_subtitle_color").val("");
			$("#logo_opt_subtitle").attr("disabled","disabled");
			//custome
			$("#logo_file_upload").attr("disabled",false);	
		}else if($logo_opton_select == '1'){
			$("#logo_title").attr("disabled",false);
			$("#premade_title").attr("disabled",false);
			$("#logo_opt_title").attr("disabled",false);
			//sub title
			$("#logo_subtitle").attr("disabled",false);
			$("#premade_subtitle").attr("disabled",false);
			$("#logo_opt_subtitle").attr("disabled",false);
			
			//custome
			$("#logo_file_upload").attr("disabled",true);			
		}
		
	});

// pre-made title color
	$("#premade_title").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#premade_title").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#prmade_title_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#prmade_title_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// pre-made title Popup
	$("#logo_opt_title").click(function(){
		/*if($("#logo_title").val() != ""){
			$("#popmasksettingmain").css("display", "block");
			$("#logo_optpopup_title").html($("#logo_title").val());
			$("#logo_optpopup_title").css("color", $("#prmade_title_color").val());
			$("#logo_optpopup_title").css("background-color", "white");
			$("#logo_optpopup_title").dialog();
		}else{
			alert("Logo Title should not be Empty");
		}		*/
		$("#popmasksettingmain").css("display", "block");
		$("#logo_optpopup_title").dialog({ width: 600});
	});	
		
// pre-made sub title
	$("#premade_subtitle").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#premade_subtitle").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#prmade_subtitle_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#prmade_subtitle_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// pre-made subtitle Popup  
	$("#logo_opt_subtitle").click(function(){
		/*if($("#logo_subtitle").val() != ""){
			$("#popmasksettingmain").css("display", "block");
			$("#logo_optpopup_subtitle").html($("#logo_subtitle").val());
			$("#logo_optpopup_subtitle").css("color", $("#prmade_subtitle_color").val());
			$("#logo_optpopup_subtitle").css("background-color", "white");
			$("#logo_optpopup_subtitle").dialog();
		}else{
			alert("Logo SubTitle should not be Empty");
		}*/
		$("#popmasksettingmain").css("display", "block");
		$("#logo_optpopup_subtitle").dialog({ width: 600});
	});
// custom image Popup
  	$("#custom_opt_logo").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#custom_optpopup_logo").dialog({ width: 600});
	});
	
// phone number color
	$("#phone_color_buttton").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#phone_color_buttton").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#phone_color_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#phone_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// phone number Popup
	$("#phone_number_opt").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup").dialog({ width: 600});		
	});	
	$("#phone_number_opt2").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup2").dialog({ width: 600});		
	});	
	$("#phone_number_opt3").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup3").dialog({ width: 600});		
	});	
	
//popup for color options
  	$("#color_opt_red").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_red").dialog({ width: 600});
	});
	
	$("#color_opt_blue").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_blue").dialog({ width: 600});
	});
	$("#color_opt_purple").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_purple").dialog({ width: 600});
	});	
	$("#color_opt_black").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_black").dialog({ width: 600});
	});
//popup for header options
  	$("#header_opt_men").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_men").dialog({ width: 600});
	});
	
	$("#header_opt_women").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_women").dialog({ width: 600});
	});
	$("#header_opt_men-women").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_men-women").dialog({ width: 600});
	});	
	
});
</script>
	<?php
	break;
	case "sales-page-content.php" :?>
	<script type="text/javascript">
	$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	//alert(divh);
    $("#popmasksettingmain").css("height",divh+"px");
//popup sales-page-content.php
  	$("#editor_opt_headline").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		/*$("#editor_optpopup_headline").html($("#editor_headline-aloha").html());
		$("#editor_optpopup_headline").css("background","#fff");
		$("#editor_optpopup_headline").dialog();*/
		$("#editor_optpopup_headline").dialog({ width: 600});
	});
	
	$("#editor_opt_subheadline").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		/*$("#editor_optpopup_subheadline").html($("#editor_subheadline-aloha").html());
		$("#editor_optpopup_subheadline").css("background","#fff");
		$("#editor_optpopup_subheadline").dialog();*/
		$("#editor_optpopup_subheadline").dialog({ width: 600});
	});
	$("#editor_opt_about").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		/*$("#editor_optpopup_about").html($("#editor_about-aloha").html());
		$("#editor_optpopup_about").css("background","#fff");
		$("#editor_optpopup_about").dialog();*/
		$("#editor_optpopup_about").dialog({ width: 600});
	});	
	$("#editor_opt_body").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		/*$("#editor_optpopup_body").html($("#editor_body-aloha").html());
		$("#editor_optpopup_body").css("background","#fff");
		$("#editor_optpopup_body").dialog();*/
		$("#editor_optpopup_body").dialog({ width: 600});
	});	
// Home page image1
	$('#home_image1_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#home_image1").val(file.name);
			$("#homeimage1prev").attr("src","uploads/"+file.name);
		} 
	});
// Home page image2
	$('#home_image2_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#home_image2").val(file.name);
			$("#homeimage2prev").attr("src","uploads/"+file.name);
		} 
	});
// Home page image3
	$('#home_image3_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#home_image3").val(file.name);
			$("#homeimage3prev").attr("src","uploads/"+file.name);
		} 
	});
});
</script>
	<?php
	break;
	case "sales-page-testimonials.php" :?>
	<script type="text/javascript">
$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	//alert(divh);
	$("#popmasksettingmain").css("height",divh+"px");
	
//text_testimonials popups
	$("#text_testimonial_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#text_testimonial_optpopup").dialog({ width: 450});
	});	
	$("#img_testimonial_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#img_testimonial_optpopup").dialog({ width: 450});
	});		
	
	$('#testimonial_image1_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#testimonial_image1").val(file.name);
			$("#testimonial_img1").attr("src","uploads/"+file.name);
		} 
	});
	$('#testimonial_image2_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#testimonial_image2").val(file.name);
			$("#testimonial_img2").attr("src","uploads/"+file.name);
		} 
	});	
});
function editTextTestimonial(id){
	jQuery.ajax({type: "POST",url: "includes/ajax/ajax.php",data: 'action=getTestimonialContent&id='+ id,
		success: function(res1){
			//alert(res1);		
			var res = eval('(' + res1 + ')');
			//alert(res.name);
			$("#popmasksettingmain").css("display", "block");
			$("#testimonial_name_edit").val(res.name);
			$("#testimonial_location_edit").val(res.location);
			$("#testimonial_content_edit-aloha").html(res.content);
			$("#testimonial_content_edit-aloha").css("width","95%");
			$("#tid").val(id);
			$("#editTextTestimonialpopup").dialog({
    			autoOpen: true,
   				height: 300,
				width: 570,
				modal: false,
				draggable: false,
				resizable: false,
			});		
		}
	});
}</script>
	<?php
	break;
	case "template-selection.php" :?>
	<script type="text/javascript">
$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	$("#popmasksettingmain").css("height",divh+"px");
//popup sales-page-template
  	/*$("#salesPageview").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#salesPageviewPopup").dialog({ width: 600});
	});*/
	
	$("a#salesPageview").fancybox({
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'					
	});	
//popup advance-sales-page-template
  	$("#advSalesPageview").click(function(){
	//alert("hi");
  		$("#popmasksettingmain").css("display", "block");
		$("#advSalesPageviewPopup").dialog({ width: 600});
	});
//popup blog-page-template
  	$("#blogPageview").click(function(){
	//alert("hi");
  		$("#popmasksettingmain").css("display", "block");
		$("#blogPageviewPopup").dialog({ width: 600});
	});
	
});
	</script>
	<?php
	break;
	case "advanced-sales-page-design.php" :?>
	<script type="text/javascript">
	$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	//alert(divh);
    $("#popmasksettingmain").css("height",divh+"px");
// Profile file upload
	$('#profile_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			$("#profile_image").val(file.name);
			$("#profile_img").attr("src","uploads/"+file.name);
		} 
	});
// profile popup
	$("#profile_number_opt").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#profile_number_optpopup").dialog({ width: 600});		
	});	
// Logo Files Upload
	$('#logo_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#logo_custom").val(file.name)
			$("#logo_img").attr("src","uploads/"+file.name);
		} 
	});
// Custom select
	$("input:radio[name=logo_optons]").click(function() {
    	$logo_opton_select = $('input:radio[name=logo_optons]:checked').val();
		if($logo_opton_select == '2'){
			$("#logo_title").val("");
			$("#logo_title").attr("disabled",true);
			$("#premade_title").attr("disabled",true);
			$("#prmade_title_color").val("");
			$("#logo_opt_title").attr("disabled","disabled");
			//sub title
			$("#logo_subtitle").val("");
			$("#logo_subtitle").attr("disabled",true);
			$("#premade_subtitle").attr("disabled",true);
			$("#prmade_subtitle_color").val("");
			$("#logo_opt_subtitle").attr("disabled","disabled");
			//custome
			$("#logo_file_upload").attr("disabled",false);	
		}else if($logo_opton_select == '1'){
			$("#logo_title").attr("disabled",false);
			$("#premade_title").attr("disabled",false);
			$("#logo_opt_title").attr("disabled",false);
			//sub title
			$("#logo_subtitle").attr("disabled",false);
			$("#premade_subtitle").attr("disabled",false);
			$("#logo_opt_subtitle").attr("disabled",false);
			
			//custome
			$("#logo_file_upload").attr("disabled",true);			
		}
		
	});

// pre-made title color
	$("#premade_title").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#premade_title").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#prmade_title_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#prmade_title_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// pre-made title Popup
	$("#logo_opt_title").click(function(){
		/*if($("#logo_title").val() != ""){
			$("#popmasksettingmain").css("display", "block");
			$("#logo_optpopup_title").html($("#logo_title").val());
			$("#logo_optpopup_title").css("color", $("#prmade_title_color").val());
			$("#logo_optpopup_title").css("background-color", "white");
			$("#logo_optpopup_title").dialog();
		}else{
			alert("Logo Title should not be Empty");
		}		*/
		$("#popmasksettingmain").css("display", "block");
		$("#logo_optpopup_title").dialog({ width: 600});
	});	
		
// pre-made sub title
	$("#premade_subtitle").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#premade_subtitle").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#prmade_subtitle_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#prmade_subtitle_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// pre-made subtitle Popup  
	$("#logo_opt_subtitle").click(function(){
		/*if($("#logo_subtitle").val() != ""){
			$("#popmasksettingmain").css("display", "block");
			$("#logo_optpopup_subtitle").html($("#logo_subtitle").val());
			$("#logo_optpopup_subtitle").css("color", $("#prmade_subtitle_color").val());
			$("#logo_optpopup_subtitle").css("background-color", "white");
			$("#logo_optpopup_subtitle").dialog();
		}else{
			alert("Logo SubTitle should not be Empty");
		}*/
		$("#popmasksettingmain").css("display", "block");
		$("#logo_optpopup_subtitle").dialog({ width: 600});
	});
// custom image Popup
  	$("#custom_opt_logo").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#custom_optpopup_logo").dialog({ width: 600});
	});	
// phone number color
	$("#phone_color_buttton").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#phone_color_buttton").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#phone_color_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#phone_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// phone number Popup
	$("#phone_number_opt").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup").dialog({ width: 600});		
	});	
	$("#phone_number_opt2").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup2").dialog({ width: 600});		
	});	
	$("#phone_number_opt3").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup3").dialog({ width: 600});		
	});	

	
//popup for color options
  	$("#color_opt_red").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_red").dialog({ width: 600});
	});
	
	$("#color_opt_blue").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_blue").dialog({ width: 600});
	});
	$("#color_opt_purple").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_purple").dialog({ width: 600});
	});	
	$("#color_opt_black").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_black").dialog({ width: 600});
	});
//popup for header options
  	$("#header_opt_men").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_men").dialog({ width: 600});
	});
	
	$("#header_opt_women").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_women").dialog({ width: 600});
	});
	$("#header_opt_men-women").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_men-women").dialog({ width: 600});
	});	
	
});
</script>
	<?php
	break;
	case "advanced-sales-page-content.php" :?>
	<script type="text/javascript">
	$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	//alert(divh);
    $("#popmasksettingmain").css("height",divh+"px");
//popup sales-page-content.php
  	$("#editor_opt_about").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		/*$("#editor_optpopup_about").html($("#editor_about-aloha").html());
		$("#editor_optpopup_about").css("background","#fff");
		$("#editor_optpopup_about").dialog();*/
		$("#editor_optpopup_about").dialog({ width: 600});
	});	
	$("#editor_opt_body").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		/*$("#editor_optpopup_body").html($("#editor_body-aloha").html());
		$("#editor_optpopup_body").css("background","#fff");
		$("#editor_optpopup_body").dialog();*/
		$("#editor_optpopup_body").dialog({ width: 600});
	});	
// Home page image1
	$('#home_image1_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#home_image1").val(file.name);
			$("#homeimage1prev").attr("src","uploads/"+file.name);
		} 
	});
// Home page image2
	$('#home_image2_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#home_image2").val(file.name);
			$("#homeimage2prev").attr("src","uploads/"+file.name);
		} 
	});
// Home page image3
	$('#home_image3_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#home_image3").val(file.name);
			$("#homeimage3prev").attr("src","uploads/"+file.name);
		} 
	});
});
</script>
	<?php
	break;
	case "advanced-sales-page-testimonials.php" :?>
	<script type="text/javascript">
$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	//alert(divh);
	$("#popmasksettingmain").css("height",divh+"px");
	
//text_testimonials popups
	$("#text_testimonial_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#text_testimonial_optpopup").dialog({ width: 450});
	});	
	$("#img_testimonial_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#img_testimonial_optpopup").dialog({ width: 450});
	});	
	
	$('#testimonial_image1_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#testimonial_image1").val(file.name);
			$("#testimonial_img1").attr("src","uploads/"+file.name);
		} 
	});
	$('#testimonial_image2_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#testimonial_image2").val(file.name);
			$("#testimonial_img2").attr("src","uploads/"+file.name);
		} 
	});	
});
function editTextTestimonial(id){
	jQuery.ajax({type: "POST",url: "includes/ajax/ajax.php",data: 'action=getTestimonialContent&id='+ id,
		success: function(res1){
			//alert(res1);		
			var res = eval('(' + res1 + ')');
			//alert(res.name);
			$("#popmasksettingmain").css("display", "block");
			$("#testimonial_name_edit").val(res.name);
			$("#testimonial_location_edit").val(res.location);
			$("#testimonial_content_edit-aloha").html(res.content);
			$("#testimonial_content_edit-aloha").css("width","95%");
			$("#tid").val(id);
			$("#editTextTestimonialpopup").dialog({
    			autoOpen: true,
   				height: 300,
				width: 570,
				modal: false,
				draggable: false,
				resizable: false,
			});		
		}
	});
}</script>
	<?php
	break;	
	case "blog-page-design.php" :?>
	<script type="text/javascript">
$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	$("#popmasksettingmain").css("height",divh+"px");
	
//popup for color options
  	$("#color_opt_red").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_red").dialog({ width: 600});
	});
	
	$("#color_opt_blue").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_blue").dialog({ width: 600});
	});
	$("#color_opt_purple").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_purple").dialog({ width: 600});
	});	
	$("#color_opt_black").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#color_optpopup_black").dialog({ width: 600});
	});
//popup for header options
  	$("#header_opt_men").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_men").dialog({ width: 600});
	});
	
	$("#header_opt_women").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_women").dialog({ width: 600});
	});
	$("#header_opt_men-women").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#header_optpopup_men-women").dialog({ width: 600});
	});	
	// Logo Files Upload
	$('#logo_file_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/choose-file-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#logo_custom").val(file.name)
			$("#logo_img").attr("src","uploads/"+file.name);
		} 
	});
// Custom select
	$("input:radio[name=logo_optons]").click(function() {
    	$logo_opton_select = $('input:radio[name=logo_optons]:checked').val();
		if($logo_opton_select == '2'){
			$("#logo_title").val("");
			$("#logo_title").attr("disabled",true);
			$("#premade_title").attr("disabled",true);
			$("#prmade_title_color").val("");
			$("#logo_opt_title").attr("disabled","disabled");
			//sub title
			$("#logo_subtitle").val("");
			$("#logo_subtitle").attr("disabled",true);
			$("#premade_subtitle").attr("disabled",true);
			$("#prmade_subtitle_color").val("");
			$("#logo_opt_subtitle").attr("disabled","disabled");
			//custome
			$("#logo_file_upload").attr("disabled",false);	
		}else if($logo_opton_select == '1'){
			$("#logo_title").attr("disabled",false);
			$("#premade_title").attr("disabled",false);
			$("#logo_opt_title").attr("disabled",false);
			//sub title
			$("#logo_subtitle").attr("disabled",false);
			$("#premade_subtitle").attr("disabled",false);
			$("#logo_opt_subtitle").attr("disabled",false);
			
			//custome
			$("#logo_file_upload").attr("disabled",true);			
		}
		
	});

// pre-made title color
	$("#premade_title").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#premade_title").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#prmade_title_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#prmade_title_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// pre-made title Popup
	$("#logo_opt_title").click(function(){
		/*if($("#logo_title").val() != ""){
			$("#popmasksettingmain").css("display", "block");
			$("#logo_optpopup_title").html($("#logo_title").val());
			$("#logo_optpopup_title").css("color", $("#prmade_title_color").val());
			$("#logo_optpopup_title").css("background-color", "white");
			$("#logo_optpopup_title").dialog();
		}else{
			alert("Logo Title should not be Empty");
		}	*/
	$("#popmasksettingmain").css("display", "block");
		$("#logo_optpopup_title").dialog({width:600});		
	});	
		
// pre-made sub title
	$("#premade_subtitle").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#premade_subtitle").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#prmade_subtitle_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#prmade_subtitle_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// pre-made subtitle Popup  
	$("#logo_opt_subtitle").click(function(){
		/*if($("#logo_subtitle").val() != ""){
			$("#popmasksettingmain").css("display", "block");
			$("#logo_optpopup_subtitle").html($("#logo_subtitle").val());
			$("#logo_optpopup_subtitle").css("color", $("#prmade_subtitle_color").val());
			$("#logo_optpopup_subtitle").css("background-color", "white");
			$("#logo_optpopup_subtitle").dialog();
		}else{
			alert("Logo SubTitle should not be Empty");
		}*/
			$("#popmasksettingmain").css("display", "block");
		$("#logo_optpopup_subtitle").dialog({width:600});
	
	});
// phone number color
	$("#phone_color_buttton").CanvasColorPicker({
		onColorChange: function(RGB,HSB){
			$("#phone_color_buttton").css("background-color","");
		},
		onOK: function(rgb,hsb){
			$("#phone_color_demo").css("background-color","RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			$("#phone_color").val("RGB(" + rgb.r + "," + rgb.g  + "," + rgb.b + ")");
			return true;
		}
	}); 
// phone number Popup
	$("#phone_number_opt").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup").dialog({ width: 600});		
	});	
	$("#phone_number_opt2").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup2").dialog({ width: 600});		
	});	
	$("#phone_number_opt3").click(function(){
		$("#popmasksettingmain").css("display", "block");
		$("#phone_number_optpopup3").dialog({ width: 600});		
	});	
	
});
	</script>
	<?php
	break;
	case "blog-page-first-post.php";
	?>
	<script type="text/javascript">
$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	$("#popmasksettingmain").css("height",divh+"px");
	
//popup for Post title
  	$("#post_title_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#post_titlepopup_opt").html($("#post_title").val());
		$("#post_titlepopup_opt").css("background","#fff");
		$("#post_titlepopup_opt").dialog({ width: 300});
	});
//popup for post body
  	$("#post_body_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#post_bodypopup_opt").html($("#post_body-aloha").html());
		$("#post_bodypopup_opt").css("background","#fff");
		$("#post_bodypopup_opt").dialog({ width: 300});
	});	
// post image1 Files Upload
	$('#post_image1_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#post_image1").val(file.name)
			$("#post_image1_show").attr("src","uploads/"+file.name);
		} 
	});
// post image2 Files Upload
	$('#post_image2_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#post_image2").val(file.name)
			$("#post_image2_show").attr("src","uploads/"+file.name);
		} 
	});
// post image3 Files Upload
	$('#post_image3_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#post_image3").val(file.name)
			$("#post_image3_show").attr("src","uploads/"+file.name);
		} 
	});
	
});
</script>
<?php
	break;
	case "blog-default-page.php";?>
	<script type="text/javascript">
$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	$("#popmasksettingmain").css("height",divh+"px");
	
//popup for about title
  	$("#about_page_title_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#about_page_titlepopup_opt").html($("#about_page_title").val());
		$("#about_page_titlepopup_opt").css("background","#fff");
		$("#about_page_titlepopup_opt").dialog({ width: 300});
	});
//popup for about body
  	$("#about_page_content_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#about_page_contentpopup_opt").html($("#about_page_content-aloha").html());
		$("#about_page_contentpopup_opt").css("background","#fff");
		$("#about_page_contentpopup_opt").dialog({ width: 300});
	});	
// about image1 Files Upload
	$('#about_page_image_1_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#about_page_image_1").val(file.name)
			$("#about_page_image_1_show").attr("src","uploads/"+file.name);
		} 
	});
// about image2 Files Upload
	$('#about_page_image_2_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#about_page_image_2").val(file.name)
			$("#about_page_image_2_show").attr("src","uploads/"+file.name);
		} 
	});
// about image3 Files Upload
	$('#about_page_image_3_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#about_page_image_3").val(file.name)
			$("#about_page_image_3_show").attr("src","uploads/"+file.name);
		} 
	});
//popup for Contact title
  	$("#contact_page_title_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#contact_page_titlepopup_opt").html($("#contact_page_title").val());
		$("#contact_page_titlepopup_opt").css("background","#fff");
		$("#contact_page_titlepopup_opt").dialog({ width: 300});
	});
//popup for Contact body
  	$("#contact_page_content_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#contact_page_contentpopup_opt").html($("#contact_page_content-aloha").html());
		$("#contact_page_contentpopup_opt").css("background","#fff");
		$("#contact_page_contentpopup_opt").dialog({ width: 300});
	});	
// Contact image1 Files Upload
	$('#contact_page_image_1_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#contact_page_image_1").val(file.name)
			$("#contact_page_image_1_show").attr("src","uploads/"+file.name);
		} 
	});
// Contact image2 Files Upload
	$('#contact_page_image_2_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#contact_page_image_2").val(file.name)
			$("#contact_page_image_2_show").attr("src","uploads/"+file.name);
		} 
	});
// Contact image3 Files Upload
	$('#contact_page_image_3_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#contact_page_image_3").val(file.name)
			$("#contact_page_image_3_show").attr("src","uploads/"+file.name);
		} 
	});
	
});
</script>
	<?php
	break;
	case "blog-custom-page.php";?>
	<script type="text/javascript">
$(document).ready(function() {
	// offset height
	var divh = $("#site-image").height();
	divh = divh+480;
	$("#popmasksettingmain").css("height",divh+"px");
	
//popup for custom page1 title
  	$("#custom_page_1_title_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#custom_page_1_titlepopup_opt").html($("#custom_page_1_title").val());
		$("#custom_page_1_titlepopup_opt").css("background","#fff");
		$("#custom_page_1_titlepopup_opt").dialog({ width: 300});
	});
//popup for custom page1 body
  	$("#custom_page_1_content_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#custom_page_1_contentpopup_opt").html($("#custom_page_1_content-aloha").html());
		$("#custom_page_1_contentpopup_opt").css("background","#fff");
		$("#custom_page_1_contentpopup_opt").dialog({ width: 300});
	});	
// custom page1 image1 Files Upload
	$('#custom_page_1_image_1_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_1_image_1").val(file.name)
			$("#custom_page_1_image_1_show").attr("src","uploads/"+file.name);
		} 
	});
// custom page1 image2 Files Upload
	$('#custom_page_1_image_2_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_1_image_2").val(file.name)
			$("#custom_page_1_image_2_show").attr("src","uploads/"+file.name);
		} 
	});
// custom page1 image3 Files Upload
	$('#custom_page_1_image_3_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_1_image_3").val(file.name)
			$("#custom_page_1_image_3_show").attr("src","uploads/"+file.name);
		} 
	});
	
// custom page2
//popup for custom page2 title
  	$("#custom_page_2_title_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#custom_page_2_titlepopup_opt").html($("#custom_page_2_title").val());
		$("#custom_page_2_titlepopup_opt").css("background","#fff");
		$("#custom_page_2_titlepopup_opt").dialog({ width: 300});
	});
//popup for custom page1 body
  	$("#custom_page_2_content_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#custom_page_2_contentpopup_opt").html($("#custom_page_2_content-aloha").html());
		$("#custom_page_2_contentpopup_opt").css("background","#fff");
		$("#custom_page_2_contentpopup_opt").dialog({ width: 300});
	});	
// custom page1 image1 Files Upload
	$('#custom_page_2_image_1_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_2_image_1").val(file.name)
			$("#custom_page_2_image_1_show").attr("src","uploads/"+file.name);
		} 
	});
// custom page1 image2 Files Upload
	$('#custom_page_2_image_2_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_2_image_2").val(file.name)
			$("#custom_page_2_image_2_show").attr("src","uploads/"+file.name);
		} 
	});
// custom page1 image3 Files Upload
	$('#custom_page_2_image_3_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_2_image_3").val(file.name)
			$("#custom_page_2_image_3_show").attr("src","uploads/"+file.name);
		} 
	});	
// custom page3
//popup for custom page2 title
  	$("#custom_page_3_title_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#custom_page_3_titlepopup_opt").html($("#custom_page_3_title").val());
		$("#custom_page_3_titlepopup_opt").css("background","#fff");
		$("#custom_page_3_titlepopup_opt").dialog({ width: 300});
	});
//popup for custom page1 body
  	$("#custom_page_3_content_opt").click(function(){
  		$("#popmasksettingmain").css("display", "block");
		$("#custom_page_3_contentpopup_opt").html($("#custom_page_3_content-aloha").html());
		$("#custom_page_3_contentpopup_opt").css("background","#fff");
		$("#custom_page_3_contentpopup_opt").dialog({ width: 300});
	});	
// custom page1 image1 Files Upload
	$('#custom_page_3_image_1_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_3_image_1").val(file.name)
			$("#custom_page_3_image_1_show").attr("src","uploads/"+file.name);
		} 
	});
// custom page1 image2 Files Upload
	$('#custom_page_3_image_2_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_3_image_2").val(file.name)
			$("#custom_page_3_image_2_show").attr("src","uploads/"+file.name);
		} 
	});
// custom page1 image3 Files Upload
	$('#custom_page_3_image_3_upload').uploadify({
		'buttonClass' : 'uploadimagebtn',
		'swf'  : 'includes/uploadify/uploadify.swf',
		'uploader'    : 'includes/uploadify/uploadify.php',
		'buttonImage' : 'images/buttons/upload-image-btn.png',
		'onUploadComplete' : function(file) {
			//alert('The file ' + file.name + ' finished processing.');
			$("#custom_page_3_image_3").val(file.name)
			$("#custom_page_3_image_3_show").attr("src","uploads/"+file.name);
		} 
	});	
	
});
</script>
	<?php
	break;
	case "add-on.php";
	break;
}
?>