<?php
require_once('common/header.php');
$user_details=$this->session->userdata['logged_in'];
?>
<section class="content account complaints">
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
    		<h3>View Request Status</h3>
    		<div class="complaints-list">
    		   <?php
    		   foreach($get_post_complaint as $key=>$value){ ?>
    		   <div class="account-details table-style col-xs-12 col-sm-6 col-md-4">
    		   <table>
    		       <thead>
    		           <tr><th colspan="2">Requested on <?php echo $value['created_at']; ?> </th></tr>
    		           </thead>
    		       <tbody>
    		       <tr><th>Name:</th><td><?php echo $value['name']; ?></td></tr>
    		       <tr><th>Email:</th><td><?php echo $value['email']; ?></td></tr>
    		       <tr><th>Mobile:</th><td><?php echo $value['phone']; ?></td></tr>
    		       <tr><th>Nature Of Complaint:</th><td><?php echo $value['nature_of_complaint']; ?></td></tr>
    		       <tr><th>Technician:</th><td><?php echo $value['technician']; ?></td></tr>
    		       <tr><th>Description:</th><td><?php echo $value['description']; ?></td></tr>
    		       <tr><th>Status:</th><td><?php echo $value['complaint_status']; ?></td></tr>
    		       <tr><th>Comments:</th><td><?php echo $value['comments']; ?></td></tr>
    		       </tbody>
    		   </table>
    		   </div>
    		   <?php } ?>
    		   
    		   </div>
    		   
    		</div>
		</div>
	</section>
	  <?php include("common/footer.php"); ?>
   </body>
</html>