<?php
$activepage="account";
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
$user_details=$this->session->userdata['logged_in'];
?>
<section class="content account">
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
    		<h3 class="mt-0 mb-10 line-height-1">Add New Guest Blog</h3>
    		
    		<div class="alert alert-danger" style="<?php if(validation_errors() || isset($error)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(validation_errors()){echo validation_errors();}elseif(isset($error)){echo $error;} ?></div>
    <div class="alert alert-success" style="<?php if(isset($message)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(isset($message)){echo $message;} ?></div>
    <div class="alert alert-success" style="<?php if($this->session->flashdata('message')){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?></div>
    		
    		<form method="post" action="<?php echo base_url(); ?>add-blog-submit" name="view_admission_modal_form1" id="view_admission_modal_form1" class="View_login_form" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group mb-20 mt-20">
                    <label>Title*</label>
                    <input placeholder="Title" type="text" id="blog_title" name="blog_title" class="form-control" value="<?php if(set_value('blog_title')) {echo set_value('blog_title'); } ?>">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-20">
                        <label>Description*</label>
                        <textarea name="blog_description" rows="6" id="blog_description" placeholder="Description" class="form-control"><?php if(set_value('blog_description')) {echo set_value('blog_description'); } ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-20 mt-10">
                      <button type="submit" name="admission_submit_btn1" id="admission_submit_btn1" class="btn btn-colored btn-theme-color-2 text-white">Add Guest Blog</button>
                    </div>
                  </div>
                </form>
    		</div>
		</div>
	</section>
	  <?php include("common/footer.php"); ?>
	  <script src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js"></script>
	  <script src="<?php echo base_url(); ?>assets/js/tinymce/jquery.tinymce.min.js"></script>
	  <script>
	  tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>	  
   </body>
</html>