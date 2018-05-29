<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content optional mt-0 mb-0">
	<div class="container pt-10 pb-5">
		
	<div class="os-inner optional">
		<div class="section-title mt-0 mb-0">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mt-0 text-uppercase font-24 line-bottom line-height-1 mb-15">Permission <span class="text-theme-color-2 font-weight-400">Denied</span></h2>
              <?php if(isset($alert)){ ?>
                  <h2 class="mt-0 text-uppercase font-20 line-height-1"><span class="text-theme-color-2 font-weight-400"><?php echo $alert; ?></span></h2>
             <?php
             }else{ ?>
              <h2 class="mt-0 text-uppercase font-20 line-height-1"><span class="text-theme-color-2 font-weight-400">You don't have permission to access this page. 
              Please login or request a enquiry to Admin</span></h2>
              <?php } ?>
           </div>
          </div>
        </div>
  </div>
	</section>
	  <?php $this->load->view('common/footer'); ?>
   </body>
</html>