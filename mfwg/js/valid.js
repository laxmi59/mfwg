// JavaScript Document
function trimfun(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function isNotEmpty(fname,txt){
	if(trimfun(fname.value)==""){
		alert(txt);
		fname.focus();
		return true;
	}else{
		return false;
	}
}
function isNotEmptyColor(fname,txt,res){
	if(trimfun(fname.value)==""){
		alert(txt);
		res.focus();
		return true;
	}else{
		return false;
	}
}
function isNotEmpty1(fname,txt,dname){
	if(trimfun(fname.value)==""){
		alert(txt);
		dname.focus();
		return true;
	}else{
		return false;
	}
}
function isNotEmptytextarea(fname,txt){
	var fcontent=fname.innerHTML;
	//alert(fcontent);
	if(trimfun(fcontent)=="" || trimfun(fcontent)=='<br class="aloha-cleanme">'){
		alert(txt);
		fname.focus();
		return true;
	}else{
		return false;
	}
}

function spaces(reg,txt)
{
	var user=reg.value;
	if(user.match(" "))
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
	else
	{
	 	return false;
	}
}
function spaces1(reg,reg1,txt)
{
	var user=reg.value;
	if(user.match(" "))
	{
		alert(txt);
		reg.value="";
		reg1.value="";
		reg.focus();
		return true;
	}
	else
	{
	 	return false;
	}
}
function isChosen(select,txt) 
{
    if (select.selectedIndex == 0) 
	{
        alert(txt);
		select.focus();
        return true;
    } 
        return false;
}
function pass(reg)
{
 var pass1=reg.value;
 if(pass1.length >= 6 && pass1.length <= 20)
 {
 	return false;
 }
 else
 {
    alert("pass word should be minimum six and maximum 20 letters");
	reg.value="";
	reg.focus();
	return true;
 }
 }
 function pass1(reg,txt)
{
 var pass1=reg.value;
 if(pass1.length >= 6 && pass1.length <= 20)
 {
 	return false;
 }
 else
 {
    alert(txt);
	reg.value="";
	reg.focus();
	return true;
 }
 }
function samepass(reg,reg1,txt)
 {
 	//var pass=reg.value;
	//var repass=reg1.value;
	if(reg.value==reg1.value)
	{
		return false;
	}
	else
	{
		//alert("aa");
		alert(txt);
		reg1.value="";
		reg1.focus();
		return true;
	}
 }


function userminmax(reg,txt)
{
	var user=reg.value;
	if(reg.value >0 && reg.value <32)
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function userminmaxph(reg,txt)
{
	var user=reg.value;
	if(reg.value==10)
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function isnumaric(reg,txt)
{
	var reg1=/^[0-9]+$/;
	if(reg.value.match(reg1))
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function isnumaricDecimal(reg,txt)
{
	var reg1=/^[1-9]\d*(\.\d+)?$/;
	if(reg.value.match(reg1))
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}


function ischar(reg,txt)
{
	var reg1=/^[a-zA-Z]+$/;
	if(reg.value.match(reg1))
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function email(reg)
{
	var e=reg.value;
	var e1=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
	if(e.match(e1))
	{
		return false;
	}
	else
	{
		alert("Enter valid Email");
		reg.value="";
		reg.focus();
		return true;
	}
}
function check(reg,txt)
{
	//alert ("cc");
	if(reg.value !=''){
		var reg1=/^[0-9]+$/;
		if(reg.value.match(reg1)){
			return false;
		}else{
			alert(txt);
			reg.value="";
			reg.focus();
			return true;
		}
	}
		
}
function checkresume(reg,reg1,txt)
{
	//alert("aa");
	if(reg.value=='' && reg1.value=='')
	{
		alert(txt);
		reg.focus();
		return true;
	}
	return false;
}
function isValidGender(radio,txt)
{

		for(i=0;i<radio.length;i++)
		{
			if (radio[i].checked)
            	return false;
		}
		alert(txt);
		radio[0].focus();
		return true;

}

function web(reg,txt)
{
	var e=reg.value;
	var e1=/^(http|https|www.):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(([0-9]{1,5})?\/.*)?$/
	var e2=/^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.|http:\/\/){1}[0-9A-Za-z\.\-]*\.[0-9A-Za-z\.\-]*$/
	if(e.match(e1)||e.match(e2))
	{
		return false;
	}
	else
	{
		alert(txt);
		reg.value="";
		reg.focus();
		return true;
	}
}
function validatecheck(chk,txt){
  if (chk.checked == 1)
   return false;
  else
    alert(txt)
    chk.focus();
	return true;
}
///////////////////////////////					Contact Information		///////////////////////////////
function basicSiteValidations(reg)
{
	if(isNotEmpty(reg.domain_name,"Domain name should not be empty")){return false}
	
	if(isNotEmpty1(reg.domainResult_status,"The domain name you have selected is unavailable",reg.domain_name)){return false}
	
	if(isNotEmpty(reg.site_title,"Site title should not be empty")){return false}
	
	if(isNotEmpty(reg.tagline,"Tagline should not be empty")){return false}
	
	if(isNotEmpty(reg.meta_keywords,"Meta keywords should not be empty")){return false}
	
	if(isNotEmpty(reg.meta_descriptions,"Meta descriptions should not be empty")){return false}
}
function salesPageDesignValidation(reg){

	if(isValidGender(reg.color_options,"Select color options. It should not be empty")){return false}
	
	if(isValidGender(reg.header_optons,"Select header options. It should not be empty")){return false}
	
	if(isValidGender(reg.logo_optons,"Logo options should not be empty")){return false}

	if(reg.logo_optons[0].checked == true)
	{
		if(isNotEmpty(reg.logo_title,"Please enter a logo title")){return false}
		if(isNotEmptyColor(reg.prmade_title_color,"Please select logo color",reg.premade_title)){return false}
	}
	if(reg.logo_subtitle.value != ''){
		if(isNotEmptyColor(reg.prmade_subtitle_color,"Please select sub title color",reg.premade_subtitle)){return false}
	}
	if(isNotEmptyColor(reg.phone_color,"Please select phone color",reg.phone_color_buttton)){return false}
	
	if(reg.video_url)
		if(isNotEmpty(reg.video_url,"Please provide a video link.")){return false}
}
function getDomainStatus(){
	var data=$("#domain_name").val();
	//alert(data);
	if(data != ""){
		jQuery.ajax({type: "POST",url: "includes/ajax/ajax.php",data: 'action=checkDomain&dname='+ data,
			success: function(res1){
				//alert(res1);			
				if(res1 == 'yes'){
					$("#domainResult").css("color", "green");
					$("#domainResult").html("The domain name is available");
					$("#domainResult_status").val("valid");
				}else{
					$("#domainResult").css("color", "red");
					$("#domainResult").html("The domain name you have selected is unavailable");
					$("#domainResult_status").val("");
				}
			}
		});
	}else{
		alert("Domain Name should not be empty");
	}
}

function salesPageContentValidation(reg){
 
	if(isNotEmptytextarea(document.getElementById("editor_headline-aloha"),"Please enter a headline")){return false}
	
	if(isNotEmptytextarea(document.getElementById("editor_subheadline-aloha"),"Please enter a subheadline")){return false}
	
	if(isNotEmptytextarea(document.getElementById("editor_about-aloha"),"Please enter \"About\" content.")){return false}
	
	if(isNotEmptytextarea(document.getElementById("editor_body-aloha"),"Please enter \"Body\" content")){return false}
	
} 
function AdvancedSalesPageContentValidation(reg){
 
	if(isNotEmptytextarea(document.getElementById("editor_about-aloha"),"Please enter \"About\" content.")){return false}
	
	if(isNotEmptytextarea(document.getElementById("editor_body-aloha"),"Please enter \"Body\" content")){return false}
	
} 
function testmonialTextFormValid(reg){
	
	if(isNotEmpty(reg.testimonial_name,"Name should not be empty")){return false}
	
	if(isNotEmpty(reg.testimonial_location,"Location should not be empty")){return false}
	/*if(reg.testimonial_name.value != "" && reg.testimonial_location.value != "" && reg.testimonial_content.value == "")
	{
		alert("Please enter a testimonial");
		reg.testimonial_content.focus();
	}*/
	
	if(isNotEmptytextarea(document.getElementById("testimonial_content-aloha"),"Testimonial should not be empty")){return false}	
	
}
function testmonialImageFormValid(reg){
	
	if(isNotEmpty(reg.testimonial_plus_name,"Name should not be empty")){return false}
	
	if(isNotEmpty(reg.testimonial_plus_location,"Location should not be empty")){return false}

	/*if(reg.testimonial_plus_name.value != "" && reg.testimonial_plus_location.value != "" && reg.testimonial_plus_content.value == "")
	{
		alert("Please enter a testimonial");
		reg.testimonial_plus_content.focus();
	}
	if(reg.testimonial_plus_name.value != "" && reg.testimonial_plus_location.value != "" && reg.testimonial_plus_content.value != "" && reg.testimonial_image1_file_upload.value == "")
	{
		alert("Please upload an image");
		reg.testimonial_image1_file_upload.focus();
	}*/
	//if(isNotEmptytextarea(reg.testimonial_plus_content,"Testimonial should not be empty")){return false}
	
	if(isNotEmptytextarea(document.getElementById("testimonial_plus_content-aloha"),"Testimonial should not be empty")){return false}	
	
	if(reg.testimonial_image1.value=='' && reg.testimonial_image2.value==""){
	
		if(isNotEmpty(reg.testimonial_image1,"Please upload an image")){return false}
	}
	
	//if(isNotEmpty(reg.testimonial_image2,"Please upload an image2")){return false}
}

function blogFirstPost_FormValid(reg){
	
	if(isNotEmpty(reg.post_title,"Please enter a post title.")){return false}
	
	if(isNotEmpty(reg.post_body,"Please enter a post body")){return false}
	if(isNotEmpty(reg.post_image1,"Please upload a post image")){return false}
	if(isNotEmpty(reg.post_meta_keywords,"Please enter meta keywords")){return false}
	if(isNotEmpty(reg.post_meta_description,"Please enter a meta description")){return false}

}

function blogDefault_Page_FormValid(reg){
	
	if(isNotEmpty(reg.about_page_title,"Please enter a page title for the About Page.")){return false}	
	if(isNotEmpty(reg.about_page_content,"Please enter page content for the About Page")){return false}
	if(isNotEmpty(reg.about_page_image_1,"Please upload an image for the About Page")){return false}
	if(isNotEmpty(reg.about_page_meta_keywords,"Please enter meta keywords for the About Page")){return false}
	if(isNotEmpty(reg.about_page_meta_description,"Please enter a meta description for the About Page")){return false}

	if(isNotEmpty(reg.contact_page_title,"Please enter a page title for the Contact Page.")){return false}	
	if(isNotEmpty(reg.contact_page_content,"Please enter page content for the Contact Page")){return false}
	if(isNotEmpty(reg.contact_page_image_1,"Please upload an image for the Contact Page")){return false}
	if(isNotEmpty(reg.contact_page_meta_keywords,"Please enter meta keywords for the Contact Page")){return false}
	if(isNotEmpty(reg.contact_page_meta_description,"Please enter a meta description for the Contact Page")){return false}

}
/*function addTestimonialContent(){
	var tname=$("#testimonial_name").val();
	var tlocation=$("#testimonial_location").val();
	var tcontent=$("#testimonial_content").val();
	//alert(data);
	jQuery.ajax({type: "POST",url: "includes/ajax/ajax.php",data: 'action=addTestimonialContent&tname='+ tname+'&tlocation='+ tlocation+'&tcontent='+ tcontent,
		success: function(res1){
			alert(res1);			
			if(res1 == 'yes'){
				$("#domainResult").css("color", "green");
				$("#domainResult").html("Domain Available");
			}else{
				$("#domainResult").css("color", "red");
				$("#domainResult").html("Domain Not Available");
			}
		}
	});	
}*/
function addItemShoppingCart(reg){
	
	if(isNotEmpty(reg.title,"Title should not be empty.")){return false}	
	
	if(isNotEmpty(reg.description,"Description should not be empty.")){return false}	
	
	if(isChosen(reg.billing_type,"Billing type should not be empty.")){return false}		
	
	if(reg.billing_type.selectedIndex == '2'){
		if(isNotEmpty(reg.no_of_payments,"No of payments should not be empty.")){return false}	
	}
	
	if(isNotEmpty(reg.amount,"Amount should not be empty.")){return false}	
	
	if(isnumaricDecimal(reg.amount,"Please enter a numerical value for \"Amount\".")){return false}	
	
	
}
function billingstatvalidation(){
	//alert(document.getElementById("billing_type").selectedIndex);
	if(document.getElementById("billing_type").selectedIndex == '2'){
		document.getElementById("no_of_payments").value='';
		document.getElementById("no_of_payments").disabled=false;
	}else if(document.getElementById("billing_type").selectedIndex == '1'){
		document.getElementById("no_of_payments").value='';
		document.getElementById("no_of_payments").disabled=true;
	}
}
function billingstatvalidationedit(){
	//alert(document.getElementById("billing_type1").selectedIndex);
	if(document.getElementById("billing_type1").selectedIndex == '2'){
		document.getElementById("no_of_payments1").disabled=false;		
	}else if(document.getElementById("billing_type1").selectedIndex == '1'){
		document.getElementById("no_of_payments1").value='';
		document.getElementById("no_of_payments1").disabled=true;
	}
}
function validateTemplateSelection(reg){
	if(isValidGender(reg.template_type,"Select Template. It should not be empty")){return false}
}