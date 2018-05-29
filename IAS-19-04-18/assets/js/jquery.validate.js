//VALIDATION
//Name Validation
var val_error=0;
var val_err_txt = new Array();
$(document).ready(function(e) {
    var email = $("#inquiry_name");
    $('#send_inquiry_to_client').click(function(ev) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt.push("Please Enter Your Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z\s]+$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            val_err_txt.push("Please Enter Valid Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        }
    } 
});
// E-Mail Validation
$(document).ready(function(e) {
    var email = $("#inquiry_email");
    $('#send_inquiry_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt.push("Please Enter Your Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-zA-Z0-9]{2,4}$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            val_err_txt.push("Please Enter Valid Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        }
    }
});
//Phone
$(document).ready(function(e){
    var email = $("#inquiry_phone");
    $('#send_inquiry_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt.push("Please Enter Phone Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^((\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });		
            return true;
        }
        else {
			email.focus();
			val_err_txt.push("Please Enter Valid Phone Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        }
    } 
});
//Service
$(document).ready(function(e) {
var email = $("#inquiry_service");
    $('#send_inquiry_to_client').click(function(e) {
       if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() === "") {
            val_err_txt.push("Please Select anyone Service");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }
  
    }
});
//City
$(document).ready(function(e) {
var email = $("#inquiry_city");
    $('#send_inquiry_to_client').click(function(e) {
       if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() === "") {
            val_err_txt.push("Please Select Anyone City");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }
  
    }
});
//PINCODE
$(document).ready(function(e){
    var email = $("#inquiry_pincode");
    $('#send_inquiry_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt.push("Please Enter Pincode");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^\d{6}$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });		
            return true;
        }
        else {
			email.focus();
            val_err_txt.push("Please Enter Valid Pincode");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        }
    } 
});
//Address
$(document).ready(function(e) { 
    var email = $("#inquiry_address");
    $('#send_inquiry_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt.push("Please enter your Address");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }        
    } 
});

//Message
$(document).ready(function(e) { 
    var email = $("#inquiry_message");
    $('#send_inquiry_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt.push("Please enter your Query");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }        
    } 
});

//FInal
$(document).ready(function(e) { 
    var email = $("#inquiry_message");
    var emailInfo = $("#send_inquiry_error");
    $('#send_inquiry_to_client').click(function(e) {
        
        if(val_error){
        	emailInfo.html(val_err_txt.join("<br/>"));
        	val_err_txt = [];
        	val_error=0;
        	emailInfo.removeClass('alert-success').addClass('alert-danger');
        	emailInfo.addClass("error");
        	emailInfo.css({
                    "display": "block"
                });
        	return false;
        } else {
            newConnection();
        	emailInfo.removeClass("error");
        	emailInfo.css({
                    "display": "none"
                });
        	return false;
        }
        
    });
});

function newConnection(){
    var send_inquiry_error = $("#send_inquiry_error");
    $.ajax({url: "/new-connection-submission",
    type: "POST",
    data: $("#View_inquiry_popup_form").serialize(),
    success: function(result){
        //var obj = JSON.parse(result);
        if(result.code && result.code===200){
        send_inquiry_error.removeClass('alert-danger').addClass('alert-success');
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
        }else{
        send_inquiry_error.removeClass('alert-success').addClass('alert-danger');
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
        }
    },
    error: function(xhr){
            send_inquiry_error.css({"display": "block"});
            send_inquiry_error.html("An error occured: " + xhr.status + " " + xhr.statusText);
        }
        
    });
}
 
//CONTACT FORM
var val_error_con=0;
var val_err_txt_con = new Array();
$(document).ready(function(e) {
    var email = $("#contact_us_name");
    $('#send_contact_us_to_client').click(function(ev) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt_con.push("Please Enter Your Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_con++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z\s]+$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            val_err_txt_con.push("Please Enter Valid Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_con++;
            return false;
        }
    } 
});
// E-Mail Validation
$(document).ready(function(e) {
    var email = $("#contact_us_email");
    $('#send_contact_us_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt_con.push("Please Enter Your Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_con++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-zA-Z0-9]{2,4}$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            val_err_txt_con.push("Please Enter Valid Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_con++;
            return false;
        }
    }
});
//Phone
$(document).ready(function(e){
    var email = $("#contact_us_phone");
    $('#send_contact_us_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt_con.push("Please Enter Phone Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_con++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^((\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });		
            return true;
        }
        else {
			email.focus();
			val_err_txt_con.push("Please Enter Valid Phone Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_con++;
            return false;
        }
    } 
});
//City
$(document).ready(function(e) {
var email = $("#contact_us_city");
    $('#send_contact_us_to_client').click(function(e) {
       if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() === "") {
            val_err_txt_con.push("Please Select Anyone City");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_con++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }
  
    }
});

//Message
$(document).ready(function(e) { 
    var email = $("#contact_us_message");
    $('#send_contact_us_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt_con.push("Please enter your Query");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_con++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }        
    } 
});

//FInal
$(document).ready(function(e) {
    var emailInfo = $("#send_contact_us_error");
    $('#send_contact_us_to_client').click(function(e) {
        
        if(val_error_con){
        	emailInfo.html(val_err_txt_con.join("<br/>"));
        	val_err_txt_con = [];
        	val_error_con=0;
        	emailInfo.removeClass('alert-success').addClass('alert-danger');
        	emailInfo.css({
                    "display": "block"
                });
        	return false;
        } else {
            newContact();
        	emailInfo.css({
                    "display": "none"
                });
        	return false;
        }
        
    });
});


function newContact(){
    var send_inquiry_error = $("#send_contact_us_error");
    $.ajax({url: "/contact-home-submission",
    type: "POST",
    data: $("#View_contact_us_popup_form").serialize(),
    success: function(result){
        //var obj = JSON.parse(result);
        if(result.code && result.code==200){
        send_inquiry_error.removeClass('alert-danger').addClass('alert-success');
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
        }else{
        send_inquiry_error.removeClass('alert-success').addClass('alert-danger');
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
        }
    },
    error: function(xhr){
        send_inquiry_error.css({"display": "block"});
            send_inquiry_error.html("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}

//LOGIN FORM
var val_error_log=0;
var val_err_txt_log = new Array();
//USER NAME
$(document).ready(function(e) {
    var email = $("#user_name");
    $('#login_to_client').click(function(ev) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt_log.push("Please Enter User Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_log++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
 
    }
});
//Password Validation
$(document).ready(function(e) {
    var email = $("#user_password");
    $('#login_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_err_txt_log.push("Please Enter Password");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error_log++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
    }
});

//FInal
$(document).ready(function(e) {
    var emailInfo = $("#send_login_error");
    $('#login_to_client').click(function(e) {
        
        if(val_error_log){
        	emailInfo.html(val_err_txt_log.join("<br/>"));
        	val_err_txt_log = [];
        	val_error_log=0;
        	emailInfo.removeClass('alert-success').addClass('alert-danger');
        	emailInfo.css({
                    "display": "block"
                });
        	return false;
        } else {
            newLogin();
        	emailInfo.css({
                    "display": "none"
                });
        	return false;
        }
        
    });
});

function newLogin(){
    var send_inquiry_error = $("#send_login_error");
    $.ajax({url: "/login-submission",
    type: "POST",
    data: $("#View_login_popup_form").serialize(),
    success: function(result){
        //var obj = JSON.parse(result);
        if(result.code && result.code==200){
        send_inquiry_error.removeClass('alert-danger').addClass('alert-success');
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
        setTimeout(function(){ location.reload(); }, 2000);
        }else{
        send_inquiry_error.removeClass('alert-success').addClass('alert-danger');
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
        }
    },
    error: function(xhr){
        send_inquiry_error.css({"display": "block"});
            send_inquiry_error.html("An error occured: " + xhr.status + " " + xhr.statusText);
        }
        
    });
}

//SIGNUP SUBMISSION
var sign_val_error_log=0;
var sign_val_err_txt_log = new Array();
//USER NAME
$(document).ready(function(e) {
    var email = $("#signup_user_name");
    $('#signup_to_client').click(function(ev) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            sign_val_err_txt_log.push("Please Enter User Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                sign_val_error_log++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
 
    }
});
//EMAIL Validation
$(document).ready(function(e) {
    var email = $("#signup_user_email");
    $('#signup_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            sign_val_err_txt_log.push("Please Enter the Email ID");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                sign_val_error_log++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
    }
});
//Password Validation
$(document).ready(function(e) {
    var email = $("#signup_user_password");
    $('#signup_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            sign_val_err_txt_log.push("Please Enter the Password");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                sign_val_error_log++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
    }
});
//Mobile Validation
$(document).ready(function(e) {
    var email = $("#signup_user_mobile");
    $('#signup_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            sign_val_err_txt_log.push("Please Enter the Mobile Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                sign_val_error_log++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
    }
});
//Mobile Validation
$(document).ready(function(e) {
    var email = $("#signup_user_city");
    $('#signup_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            sign_val_err_txt_log.push("Please Enter the City");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                sign_val_error_log++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
    }
});
//Course Validation
$(document).ready(function(e) {
    var email = $("#signup_user_course");
    $('#signup_to_client').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            sign_val_err_txt_log.push("Please select the Course");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                sign_val_error_log++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
    }
});
//FInal
$(document).ready(function(e) {
    var emailInfo = $("#send_signup_error");
    $('#signup_to_client').click(function(e) {
        
        if(sign_val_error_log){
        	emailInfo.html(sign_val_err_txt_log.join("<br/>"));
        	sign_val_err_txt_log = [];
        	sign_val_error_log=0;
        	emailInfo.removeClass('alert-success').addClass('alert-danger');
        	emailInfo.css({
                    "display": "block"
                });
        	return false;
        } else {
            sign_submit();
        	emailInfo.css({
                    "display": "none"
                });
        	return false;
        }
        
    });
});

function sign_submit(){
    var send_inquiry_error = $("#send_signup_error");
    $.ajax({url: "/signup-submission",
    type: "POST",
    data: $("#View_signup_popup_form").serialize(),
    success: function(result){
        //var obj = JSON.parse(result);
        if(result.code && result.code==200){
        send_inquiry_error.removeClass('alert-danger').addClass('alert-success');
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
        //setTimeout(function(){ window.location = "/my-account"; }, 2000);
        }else{
        send_inquiry_error.removeClass('alert-success').addClass('alert-danger');
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
        }
    },
    error: function(xhr){
        send_inquiry_error.css({"display": "block"});
            send_inquiry_error.html("An error occured1: " + xhr.status + " " + xhr.statusText);
        }
        
    });
}


//REQUEST ENQUIRY
//Name Validation
var val_enquiry_error=0;
var val_enquiry_err_txt = new Array();
$(document).ready(function(e) {
    var email = $("#enquiry_name");
    $('#enquiry_submit_btn').click(function(ev) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_enquiry_err_txt.push("Please Enter the Your Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_enquiry_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z\s]+$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            val_enquiry_err_txt.push("Please Enter the Valid Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        }
    } 
});
// E-Mail Validation
$(document).ready(function(e) {
    var email = $("#enquiry_email");
    $('#enquiry_submit_btn').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_enquiry_err_txt.push("Please Enter the Your Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_enquiry_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-zA-Z0-9]{2,4}$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            val_enquiry_err_txt.push("Please Enter the Valid Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_enquiry_error++;
            return false;
        }
    }
});
//Phone
$(document).ready(function(e){
    var email = $("#enquiry_phone");
    $('#enquiry_submit_btn').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() == "") {
            val_enquiry_err_txt.push("Please Enter the Phone Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_enquiry_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^((\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });		
            return true;
        }
        else {
			email.focus();
			val_enquiry_err_txt.push("Please Enter the Valid Phone Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_enquiry_error++;
            return false;
        }
    } 
});
//Subject
$(document).ready(function(e) {
var email = $("#enquiry_subject");
    $('#enquiry_submit_btn').click(function(e) {
       if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() === "") {
            val_enquiry_err_txt.push("Please Select a any Subject");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_enquiry_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }
  
    }
});
//City
$(document).ready(function(e) {
var email = $("#enquiry_city");
    $('#enquiry_submit_btn').click(function(e) {
       if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() === "") {
            val_enquiry_err_txt.push("Please Enter the Your City");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_enquiry_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }
  
    }
});
//Message
$(document).ready(function(e) { 
    var email = $("#enquiry_message");
    $('#enquiry_submit_btn').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_enquiry_err_txt.push("Please Enter the Message");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_enquiry_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }        
    } 
});

//FInal
$(document).ready(function(e) {
    var emailInfo = $("#send_enquiry_error");
    $('#enquiry_submit_btn').click(function(e) {
        
        if(val_enquiry_error){
        	emailInfo.html(val_enquiry_err_txt.join("<br/>"));
        	val_enquiry_err_txt = [];
        	val_enquiry_error=0;
        	emailInfo.removeClass('alert-success').addClass('alert-danger');
        	emailInfo.addClass("error");
        	emailInfo.css({
                    "display": "block"
                });
        	return false;
        } else {
            newEnquirySubmit();
        	emailInfo.removeClass("error");
        	emailInfo.css({
                    "display": "none"
                });
        	return false;
        }
        
    });
});

function newEnquirySubmit(){
    var send_inquiry_error = $("#send_enquiry_error");
    $.ajax({url: "/new-enquiry-submission",
    type: "POST",
    data: $("#view_Send_enquiry_form").serialize(),
    success: function(result){
        //var obj = JSON.parse(result);
        if(result.code && result.code == 200){
        send_inquiry_error.removeClass('alert-danger').addClass('alert-success');
        }else{
        send_inquiry_error.removeClass('alert-success').addClass('alert-danger');
        }
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
    },
    error: function(xhr){
            send_inquiry_error.css({"display": "block"});
            send_inquiry_error.html("An error occured: " + xhr.status + " " + xhr.statusText);
        }
        
    });
}

//NEW ADMISSION ENQUIRY FORM
//Name Validation
var val_admission_error=0;
var val_admission_err_txt = new Array();
$(document).ready(function(e) {
    var email = $("#admission_name");
    $('#admission_submit_btn').click(function(ev) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_admission_err_txt.push("Please Enter the Your Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z\s]+$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            val_admission_err_txt.push("Please Enter the Valid Name");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_error++;
            return false;
        }
    } 
});
// E-Mail Validation
$(document).ready(function(e) {
    var email = $("#admission_email");
    $('#admission_submit_btn').click(function(e) {
        if (validateEmail()) {
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_admission_err_txt.push("Please Enter the Your Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-zA-Z0-9]{2,4}$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            val_admission_err_txt.push("Please Enter the Valid Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
            return false;
        }
    }
});
//Phone
$(document).ready(function(e){
    var email = $("#admission_phone");
    $('#admission_submit_btn').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() == "") {
            val_admission_err_txt.push("Please Enter the Phone Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^((\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(a)) {
			email.css({
                    "border": "",
                    "background": ""
                });		
            return true;
        }
        else {
			email.focus();
			val_admission_err_txt.push("Please Enter the Valid Phone Number");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
            return false;
        }
    } 
});
//Subject
$(document).ready(function(e) {
var email = $("#admission_dob");
    $('#admission_submit_btn').click(function(e) {
       if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() === "") {
            val_admission_err_txt.push("Please Select a DOB");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }
  
    }
});
//City
$(document).ready(function(e) {
var email = $("#admission_city");
    $('#admission_submit_btn').click(function(e) {
       if (validateEmail()) {
            return true;
        } else {
            return false;
        } 
    });
    function validateEmail() {
        if (email.val() === "") {
            val_admission_err_txt.push("Please Enter the Your City");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
            return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }
  
    }
});
//GENDER
$(document).ready(function(e) { 
    var email = $("#admission_gender");
    $('#admission_submit_btn').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_admission_err_txt.push("Please Select the Gender");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }        
    } 
});

//GENDER
$(document).ready(function(e) { 
    var email = $("#admission_user_course");
    $('#admission_submit_btn').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_admission_err_txt.push("Please Select the Course");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }        
    } 
});

//QUALIFICATION
$(document).ready(function(e) { 
    var email = $("#admission_qualification");
    $('#admission_submit_btn').click(function(e) {
        if (validateEmail()) {
            return true;
        } else {
            return false;			
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            val_admission_err_txt.push("Please Select the Highest Qualification");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
                val_admission_error++;
			return false;
        } else {
			email.css({
                    "border": "",
                    "background": ""
                });
			return true;
        }        
    } 
});

//FInal
$(document).ready(function(e) {
    var emailInfo = $("#send_admission_error");
    $('#admission_submit_btn').click(function(e) {
        
        if(val_admission_error){
        	emailInfo.html(val_admission_err_txt.join("<br/>"));
        	val_admission_err_txt = [];
        	val_admission_error=0;
        	emailInfo.removeClass('alert-success').addClass('alert-danger');
        	emailInfo.addClass("error");
        	emailInfo.css({
                    "display": "block"
                });
        	return false;
        } else {
            newAdmissionSubmit();
        	emailInfo.removeClass("error");
        	emailInfo.css({
                    "display": "none"
                });
        	return false;
        }
        
    });
});

function newAdmissionSubmit(){
    var send_inquiry_error = $("#send_admission_error");
    $.ajax({url: "/new-admission-submission",
    type: "POST",
    data: $("#view_admission_modal_form").serialize(),
    success: function(result){
        //var obj = JSON.parse(result);
        if(result.code && result.code == 200){
        send_inquiry_error.removeClass('alert-danger').addClass('alert-success');
        }else{
        send_inquiry_error.removeClass('alert-success').addClass('alert-danger');
        }
        
        send_inquiry_error.css({"display": "block"});
        send_inquiry_error.html(result.message);
    },
    error: function(xhr){
            send_inquiry_error.css({"display": "block"});
            send_inquiry_error.html("An error occured: " + xhr.status + " " + xhr.statusText);
        }
        
    });
}


//Subscription
$(document).ready(function(e) {
    var email = $("#subscription_email");
    var emailInfo = $("#subscription_status_msg");
    $('#subscription_submission_btn').click(function(e) {
        if(validateEmail()) {
            
                        $.ajax({url: "/new-subscription-submission",
                            type: "POST",
                            data: $("#subscription_form").serialize(),
                            success: function(result){
                                if(result.message){
                                //var obj = JSON.parse(result);
                                emailInfo.css({"display": "block"});
                                emailInfo.html(result.message);
                                }else{
                                emailInfo.css({"display": "block"});
                                emailInfo.html("Some error occured");
                                }
                                $('#subscription_status_msg').delay(5000).fadeOut(400);
                            },
                            error: function(xhr){
                                emailInfo.css({"display": "block"});
                                emailInfo.html("An error occured: " + xhr.status + " " + xhr.statusText);
                                $('#subscription_status_msg').delay(5000).fadeOut(400);
                                }
                            });
            return true;
        }
		else {
            return false;
        } 
    });	
    function validateEmail() {
        if (email.val() == "") {
            emailInfo.css({"display": "block"});
            emailInfo.html("Please Enter the Your Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
			return false;
        } else {
            emailInfo.css({"display": "none"});
			email.css({
                    "border": "",
                    "background": ""
                });
        }
        var a = email.val(); 
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-zA-Z0-9]{2,4}$/;
        if (filter.test(a)) {
            emailInfo.css({"display": "none"});
			email.css({
                    "border": "",
                    "background": ""
                });
            return true;
        }
        else {
            email.focus();
            emailInfo.css({"display": "block"});
            emailInfo.html("Please Enter the Valid Email");
			email.css({
                    "border": "1px solid #da0000",
                    "background": "#FFCECE"
                });
            return false;
        }
    }
});