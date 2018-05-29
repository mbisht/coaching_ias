<?php
require_once('common/header.php');
?>
<section class="content contact-us login-page">
<div class="container">
<h2 class="text-uppercase text-theme-colored title line-bottom line-height-1 mt-0">Login </h2>
<div class="col-xs-12 contact-left">
<div class="form">
<div class="alert alert-danger" id="login_send_login_error" style="<?php if(validation_errors()){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(validation_errors()){echo validation_errors();} ?></div>
<div class="alert alert-success" style="<?php if(isset($message)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(isset($message)){ echo $message;} ?></div>
<div class="alert alert-success" style="<?php if($this->session->flashdata('message')){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?></div>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>login-page-submission" >
<div id="contact_View_inquiry_popup_msg_container">
<div class="form-group">
<span>User Name*</span>
<input type="text" name="user_name" id="login_user_name" value="<?php if(set_value('user_name')) {echo set_value('user_name'); } ?>" class="input form-control" placeholder="User Name" required="required">
</div>
<div class="form-group">
<span>Password*</span>
<input type="password" name="user_password" id="login_user_password" value="<?php if(set_value('user_password')) {echo set_value('user_password'); } ?>" class="input form-control" placeholder="Password" required="required">
</div>
<div class="form-group">
<input type="submit" name="login_to_client" class="submit btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px" value="Login" id="login_to_client_login">
</div>
</div>

<div class="forgot_password"><a href="/forgot_password" title="Forgot password?">Forgot password?</a></div>
</form>
</div>
</div>
</div>
</section>
<?php include("common/footer.php"); ?>
   </body>
</html>