<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
?>
<section class="content careers">
<div class="container tab-content">
   <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Career <span class="text-theme-color-2 font-weight-400">Register Here</span></h2>
   <hr style="border:1px solid #202c45" >
   <p>Add a CV to your profile and fill your proper details.</p>
    
    <div class="alert alert-danger" style="<?php if(validation_errors() || isset($error)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(validation_errors()){echo validation_errors();}elseif(isset($error)){echo $error;} ?></div>
    <div class="alert alert-success" style="<?php if(isset($message)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(isset($message)){echo $message;} ?></div>
    <div class="alert alert-success" style="<?php if($this->session->flashdata('message')){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?></div>
   
   <form method="post" action="<?php echo base_url(); ?>career-submit" name="onlineTestSubmit" id="onlineTestSubmit" enctype="multipart/form-data">
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-3"> *Name:</div>
         <div class="col-md-5">
            <div class="form-group">
               <input id="name" name="name" type="text" placeholder="Enter the name" class="form-control" value="<?php if(set_value('name')) {echo set_value('name'); } ?>" required="required"> 
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
      <br/>
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-3"> *Email:</div>
         <div class="col-md-5">
            <div class="form-group">
               <input id="email" name="email" type="text" placeholder="Enter the email" class="form-control" value="<?php if(set_value('email')) {echo set_value('email'); } ?>" required="required"> 
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
      <br/>
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-3"> *Mobile Number:</div>
         <div class="col-md-5">
            <div class="form-group">
               <input id="mobile" name="mobile" type="text" maxlength="10" placeholder="Enter the Mobile no." value="<?php if(set_value('mobile')) {echo set_value('mobile'); } ?>" class="form-control" required="required"> 
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-3"> Job Type:</div>
         <div class="col-md-5" required="redquired">
            <div class="form-group">
               <input type="radio" name="employementtype" class="emptype" value="Fulltime" <?php if(set_value('employementtype') && set_value('employementtype') == "Fulltime") {echo "checked='true'"; } ?> > Full Time &nbsp;&nbsp;
               <input type="radio" name="employementtype" class="emptype" value="Parttime" <?php if(set_value('employementtype') && set_value('employementtype') == "Parttime") {echo "checked='true'"; } ?> > Part Time &nbsp;&nbsp;
               <input type="radio" name="employementtype" class="emptype" value="Contractual" <?php if(set_value('employementtype') && set_value('employementtype') == "Contractual") {echo "checked='true'"; } ?>> Contractual Job
               <i id="emperror" style="color:red;"></i>
            </div>
         </div>
         <div class="col-sm-3"></div>
      </div>
      <br/>
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-3"> Role:</div>
         <div class="col-md-5">
            <div class="form-group">
               <select name="role" id="role" class="form-control" required="required">
                  <option value="">select</option>
                  <option <?php if(set_value('role') && set_value('role') == "Ecology") {echo "selected='true'"; } ?> value="Ecology">Ecology</option>
                  <option <?php if(set_value('role') && set_value('role') == "Civil") {echo "selected='true'"; } ?> value="Civil">Civil</option>
                  <option <?php if(set_value('role') && set_value('role') == "Antology") {echo "selected='true'"; } ?> value="Antology">Antology</option>
                  <option <?php if(set_value('role') && set_value('role') == "IAS Subject") {echo "selected='true'"; } ?> value="IAS Subject">IAS Subject</option>
                  <option <?php if(set_value('role') && set_value('role') == "Others") {echo "selected='true'"; } ?> value="Others">Others</option>
               </select>
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
      <br/>
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-3"> *Upload Resume:</div>
         <div class="col-md-5">
            <div class="form-group">
               <input id="resume_file" name="resume_file" type="file" accept=".doc,.docx,.pdf,application/pdf" value="<?php if(set_value('resume_file')) {echo set_value('resume_file'); } ?>" class="form-control" required="redquired"> 
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
      <div class="row">
         <div class="col-md-1"></div>
         <div class="col-md-3"></div>
         <div class="col-md-5">
            <div class="form-group">
               <button type="submit" class="btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px" id="btn1">Submit Resume</button>
               <button type="reset" class="btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px">Cancel</button>  
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
   </form>
</div>
</section>
	  <?php include("common/footer.php"); ?>
   </body>
</html>