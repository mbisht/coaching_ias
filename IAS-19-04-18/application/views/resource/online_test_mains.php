<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content online-test">
		<div class="container">
            <div>
                <h1 class="mt-0 text-uppercase font-28 line-bottom line-height-1">ONLINE TEST <span class="text-theme-color-2 font-weight-400">Mains</span></h1>
                    <div class="col-xs-12 news-container">
                        <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">View Online Tests</a></li>
                        <li><a data-toggle="tab" href="#menu1">Submit Test</a></li>
                        </ul>
                        
                        <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                    		        <?php
                    		        if(isset($online_test_mains_data['subjects']) && is_array($online_test_mains_data['subjects'])){
                    		        foreach($online_test_mains_data['subjects'] as $key_sub=>$value_sub){ ?>
                    		        <div class="col-md-4 col-sm-6 col-xs-12">
                    		            <h3><?php echo $value_sub; ?></h3>
                    		            <ul class="list file-list">
                    		                <?php
                    		                foreach($online_test_mains_data[$value_sub] as $key=>$value){ ?>
                    		                <li><?php echo "<a href='".base_url()."assets/files/mains/".$value['file_url']."' title='$value[title]' target='_blank'>".$value['title']."</a>"; ?></li>
                    		                <?php } ?>
                    		            </ul>
                    		        </div>
                    		       <?php }}else{ echo "No data availbale"; } ?>
                    	</div>
      <div id="menu1" class="tab-pane fade">
      <h3>Submit Online Test</h3>
      
          <div class="alert alert-danger" style="<?php if(validation_errors() || isset($error)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(validation_errors()){echo validation_errors();}elseif(isset($error)){echo $error;} ?></div>
    <div class="alert alert-success" style="<?php if(isset($message)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(isset($message)){echo $message;} ?></div>
    <div class="alert alert-success" style="<?php if($this->session->flashdata('message')){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?></div>

      <form method="post" action="<?php echo base_url(); ?>online-test-mains-submit" name="onlineTestSubmit" id="onlineTestSubmit" enctype="multipart/form-data">
          <input type="hidden" id="user_id" name="user_id" value="1">
          <div class="col-sm-6">
                    <div class="form-group mb-20">
                        <label>Question*</label>
                        <select name="question_id" class="form-control" required>
                            <option value="">Select: Question</option>
                            <?php
                    		  foreach($online_test_mains_data['subjects'] as $key_sub=>$value_sub){
                    		  foreach($online_test_mains_data[$value_sub] as $key=>$value){ ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
            </div>
            <div class="col-sm-6">
                    <div class="form-group mb-20">
                        <label>Result File (<small>PDF File only</small>)*</label>
                      <input placeholder="Result File" class="form-control" accept="application/pdf" type="file" id="result_file" name="result_file" required>
                    </div>
            </div>
            <div class="col-sm-12">
                    <div class="form-group mb-20">
                      <input placeholder="user_id" class="form-control submit" type="submit" id="user_id" name="user_id">
                    </div>
            </div>
      </form>
    </div>
    </div>
</div>
</div>
</div>
</section>
<?php $this->load->view('common/footer'); ?>
</body>
</html>