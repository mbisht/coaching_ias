<?php
$activepage="account";
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
$user_details=$this->session->userdata['logged_in'];
?>
<section class="content account change-password complaint">
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
    		<h3>Send Request</h3>
    		<div class="account-details">
    		    
    		        <div class="form">
                    <div class="alert alert-danger" id="login_send_login_error" style="<?php if(validation_errors()){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(validation_errors()){echo validation_errors();} ?></div>
                    <div class="alert alert-success" style="<?php if(isset($message)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(isset($message)){ echo $message;} ?></div>
                    <div class="alert alert-success" style="<?php if($this->session->flashdata('message')){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?></div>
                    <form method="POST" enctype="multipart/form-data" action="/new-complaint-submission" >
                    
                    <input type="hidden" name="user_name" value="<?php if(set_value('user_name')) {echo set_value('user_name'); }else{ echo $Account_details[0]['full_name']; } ?>">
                    <input type="hidden" name="user_email" value="<?php if(set_value('new_email')) {echo set_value('new_email'); }else{ echo $Account_details[0]['email']; } ?>">
                    <input type="hidden" name="user_phone" value="<?php if(set_value('new_phone')) {echo set_value('new_phone'); }else{ echo $Account_details[0]['phone']; } ?>">
                    <input type="hidden" name="user_id" value="<?php if(set_value('user_id')) {echo set_value('user_id'); }else{ echo $Account_details[0]['customer_id']; } ?>">
                        
                    <div id="contact_View_inquiry_popup_msg_container">
                    <div class="form-group">
                    <span>Name:</span>
                    <span class="title"><?php echo $Account_details[0]['full_name']; ?></span>
                    </div>
                    <div class="form-group">
                    <span>Nature Of Request*:</span>
                        <select id="user_complaintNature" name="user_complaintNature" class="input select" required>
                          <option value="">Choose Nature type</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Payment Issue") {echo "selected='true'"; } ?> value="Payment Issue">Payment Issue</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Technical Issue") {echo "selected='true'"; } ?> value="Technical Issue">Technical Issue</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Account Issue") {echo "selected='true'"; } ?> value="Account Issue">Account Issue</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Sales Issue") {echo "selected='true'"; } ?> value="Sales Issue">Sales Issue</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Not able to use internet") {echo "selected='true'"; } ?> value="Not able to use internet">Not able to use internet</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Slow internet speed") {echo "selected='true'"; } ?> value="Slow internet speed">Slow internet speed</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Router configuration") {echo "selected='true'"; } ?> value="Router configuration">Router configuration</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Online Payment error") {echo "selected='true'"; } ?> value="Online Payment error">Online Payment error</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Shifting Request") {echo "selected='true'"; } ?> value="Shifting Request">Shifting Request</option>
                          <option <?php if(set_value('user_complaintNature') && set_value('user_complaintNature')=="Others") {echo "selected='true'"; } ?> value="Others">Others</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <span>Technician:</span>
                    <input type="text" name="user_technician" id="user_technician" value="<?php if(set_value('user_technician')) {echo set_value('user_technician'); } ?>" class="input" placeholder="Technician">
                    </div>
                    
                    <div class="form-group">
                    <span>Description*:</span>
                    <textarea name="user_description" id="user_description" required placeholder="Description" class="input textarea"><?php if(set_value('user_description')) {echo set_value('user_description'); } ?></textarea>
                    </div>
                    <div class="form-group">
                    <input type="submit" name="post_complaint_submit_btn" class="submit" value="Send Complaint" id="post_complaint_submit_btn">
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