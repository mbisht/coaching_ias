<?php
$activepage="account";
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
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
    		<div class="account-details table-style">
    		   <table class="table jsgrid table-striped table-bordered dataTable table-responsive">
								<thead>
								    <tr><th colspan="7">Optional Test Result</th></tr>
									<tr>
										<th>Sno.</th>
										<th>Question</th>
										<th>Subjects</th>
										<th>Result File</th>
										<th>Corrected File</th>
										<th>Submitted on</th>
										<th>Updated On</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$count=1;
								if(is_array($getOptionalDetails)){
                                foreach($getOptionalDetails as $value){
                                ?><tr>
								<td><?php echo $count;?></td>
								<td><?php echo $value['title'];?></td>
								<td><?php echo $value['subject'];?></td>
									<td><a href="<?php echo base_url(); ?>assets/files/optional/<?php echo $value['ResultFile'];?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a></td>
									<td><?php if(!empty($value['corrected_file'])){ ?><a href="<?php echo base_url(); ?>assets/files/optional/<?php echo $value['corrected_file'];?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a> <?php } ?></td>
									<td><?php echo $value['DateAdded'];?></td>
									<td><?php echo $value['ModifiedDate'];?></td>
								</tr><?php $count++; } }else{ } ?>
								</tbody>
				</table>
    		</div>
    		</div>
		</div>
	</section>
	<?php $this->load->view('common/footer'); ?>
   </body>
</html>