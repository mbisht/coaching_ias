<?php
$activepage="account";
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
$user_details=$this->session->userdata['logged_in'];
?>
<section class="content account change-password">
		<div class="container">
    		<div class="account-left col-xs-12 col-sm-3 col-md-2">
    		    <ul>
    		        <li class="active"><a href="<?php echo base_url(); ?>my-account" class="btn btn-primary">Account</a></li>
    		        <li><a href="<?php echo base_url(); ?>add-guest-blog" class="btn btn-primary">Add Blog</a></li>
    		        <li><a href="<?php echo base_url(); ?>view-prelims-test-result" class="btn btn-primary">Prelims Test Result</a></li>
    		        <li><a href="<?php echo base_url(); ?>view-mains-test-result" class="btn btn-primary">Mains Test Result</a></li>
    		        <li><a href="<?php echo base_url(); ?>view-optional-test-result" class="btn btn-primary">Optional Test Result</a></li>
    		        <li><a href="<?php echo base_url(); ?>change-password" class="btn btn-primary">Change Password</a></li>
    		    </ul>
    		</div>
    		<div class="account-right col-xs-12 col-sm-9 col-md-10">
    		<h3>Change Password</h3>
    		<div class="account-details">
    		    
    		        <div class="form">
                    <div class="alert alert-danger" id="login_send_login_error" style="<?php if(validation_errors()){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(validation_errors()){echo validation_errors();} ?></div>
                    <div class="alert alert-success" style="<?php if(isset($message)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(isset($message)){ echo $message;} ?></div>
                    <div class="alert alert-success" style="<?php if($this->session->flashdata('message')){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?></div>
                    <form method="POST" enctype="multipart/form-data" action="/change-password-submission" >
                    <div id="contact_View_inquiry_popup_msg_container">
                    <div class="form-group">
                    <span>Name:</span>
                    <span class="title"><?php echo $Account_details[0]['full_name']; ?></span>
                    </div>
                    <div class="form-group">
                    <span>Old Password*:</span>
                    <input type="password" name="old_user_password" id="old_user_password" value="<?php if(set_value('old_user_password')) {echo set_value('old_user_password'); } ?>" class="input" placeholder="Old Password" required="required">
                    </div>
                    
                    <div class="form-group">
                    <span>New Password*:</span>
                    <input type="password" name="new_user_password" id="new_user_password" value="<?php if(set_value('new_user_password')) {echo set_value('new_user_password'); } ?>" class="input" placeholder="New Password" required="required">
                    </div>
                    
                    <div class="form-group">
                    <span>Confirm Password*:</span>
                    <input type="password" name="confirm_user_password" id="confirm_user_password" value="<?php if(set_value('confirm_user_password')) {echo set_value('confirm_user_password'); } ?>" class="input" placeholder="Confirm Password" required="required">
                    </div>
                    <div class="form-group">
                    <input type="submit" name="login_to_client_change_password" class="submit" value="Change Password" id="login_to_client_change_password">
                    </div>
                    </div>
                    </form>
                    </div>
    		</div>
    		</div>
		</div>
	</section>
	  <?php include("common/footer.php"); ?>
   </body>
</html>