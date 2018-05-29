<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
?>
<section class="content contact-us">
	<div class="container">
		<h2 class="text-uppercase text-theme-colored title line-bottom line-height-1 mt-0">Contact <span class="text-theme-color-2 font-weight-400">Us</span></h2>
<div class="col-sm-8 col-xs-12 contact-left">
<div class="form">
    
<div class="alert alert-danger" style="<?php if(validation_errors()){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(validation_errors()){echo validation_errors();} ?></div>
<div class="alert alert-success" style="<?php if(isset($message)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(isset($message)){ echo $message;} ?></div>
<div class="alert alert-success" style="<?php if($this->session->flashdata('message')){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?></div>

    <form id="home_contact_form" name="contact_form" method="post" action="<?php echo base_url(); ?>contact-submission" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input name="contact_name" class="form-control name required" type="text" placeholder="Full Name" value="<?php if(set_value('contact_name')) {echo set_value('contact_name'); } ?>" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input name="contact_email" class="form-control required email" type="email" placeholder="Email ID" value="<?php if(set_value('contact_email')) {echo set_value('contact_email'); } ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input name="contact_phone" class="form-control required" maxlength="10" type="text" placeholder="Mobile" value="<?php if(set_value('contact_phone')) {echo set_value('contact_phone'); } ?>" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                        <select name="contact_subject" id="contact_subject" class="form-control required" aria-required="true" required>
                          <option value="">Choose Subject</option>
                          <option <?php if(set_value('contact_subject') && set_value('contact_subject') == "Foundation Course") {echo "selected='selected'";} ?> value="Foundation Course">Foundation Course</option>
                          <option <?php if(set_value('contact_subject') && set_value('contact_subject') == "Prelims Cum Mains Course") {echo "selected='selected'";} ?> value="Prelims Cum Mains Course">Prelims Cum Mains Course</option>
                          <option <?php if(set_value('contact_subject') && set_value('contact_subject') == "Mains Course") {echo "selected='selected'";} ?> value="Mains Course">Mains Course</option>
                          <option <?php if(set_value('contact_subject') && set_value('contact_subject') == "Optional Course") {echo "selected='selected'";} ?> value="Optional Course">Optional Course</option>
                          <option <?php if(set_value('contact_subject') && set_value('contact_subject') == "Others") {echo "selected='selected'";} ?> value="Others">Others</option>
                        </select>
                    </div>
                  </div>
                </div>
                    <div class="form-group">
                  <textarea name="contact_message" class="form-control required" rows="5" placeholder="Enter Message" required><?php if(set_value('contact_message')) {echo set_value('contact_message'); } ?></textarea>
                </div>
                    <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="" />
                  <button type="submit" class="btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait...">Send your message</button>
                  <button type="reset" class="btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
                </div>
    </form>
              <!-- Contact Form Validation-->
                <script type="text/javascript">
                                $("#home_contact_form").validate({
                                  submitHandler: function(form) {
                                    var form_btn = $(form).find('button[type="submit"]');
                                    var form_result_div = '#form-result';
                                    $(form_result_div).remove();
                                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                                    var form_btn_old_msg = form_btn.html();
                                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                                    $(form).ajaxSubmit({
                                      dataType:  'json',
                                      success: function(data) {
                                        if( data.status == 'true' ) {
                                          $(form).find('.form-control').val('');
                                        }
                                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                                        $(form_result_div).html(data.message).fadeIn('slow');
                                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                                      }
                                    });
                                  }
                                });
                </script>
</div>
</div>
<div class="col-sm-4 col-xs-12 contact-right">
    <div class="address">
                        <h4 class="mt-0 mb-10 line-bottom pb-0">Address</h4>  
                        <p><b>Shiksha IAS Academy</b></p>
                        <p>#218,First Floor, 9th Main Road,</p>
                        <p>Sector 6, HSR Layout,</p>
                        <p>Bengaluru, Karnataka 560102</p>
    </div>
    <div class="phone">
                <h4 class="mt-10 mb-10 line-bottom pb-0">Phone</h4>
                <ul class="list-unstyled">
                    <li>+(91) 9986102277</li>
                    <li>+(91) 9986103377</li>
                    </ul>
                    <h4 class="mt-10 mb-10 line-bottom pb-0">Email</h4>
                    <p><a href="mailto:info@iasshiksha.com">info@iasshiksha.com</a></p>
                    <p><a href="mailto:shikshaiasacademy@gmail.com">shikshaiasacademy@gmail.com</a></p>
    </div>
</div>
</div>
</section>
	  <?php include("common/footer.php"); ?>
   </body>
</html>