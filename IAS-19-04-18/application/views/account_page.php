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
    		<h3>Hi <?php echo $user_details['Name']; ?>!</h3>
    		<div class="account-details table-style">
    		   <table>
    		       <thead>
    		       <tr><th colspan="2">Personal Details</th></tr>
    		       </thead>
    		       <tbody>
    		       <tr><th>User ID:</th><td><?php echo $Account_details[0]['userid']; ?></td></tr>
    		       <tr><th>Full Name:</th><td><?php echo $Account_details[0]['full_name']; ?></td></tr>
    		       <tr><th>Email:</th><td><?php echo $Account_details[0]['email']; ?></td></tr>
    		       <tr><th>Phone Number:</th><td><?php echo $Account_details[0]['phone']; ?></td></tr>
    		       </tbody>
    		   </table>
    		</div>
    		<div class="account-details table-style">
    		   <table>
    		       <thead>
    		       <tr><th colspan="2">Contact Details</th></tr>
    		       </thead>
    		       <tbody>
    		       <tr><th>Address:</th><td><?php echo $Account_details[0]['address']; ?></td></tr>
    		       <tr><th>City:</th><td><?php echo $Account_details[0]['city']; ?></td></tr>
    		       </tbody>
    		   </table>
    		</div>
    		</div>
		</div>
	</section>
	 <?php $this->load->view('common/footer'); ?>
   </body>
</html>