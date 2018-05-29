<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content foundation">
		<div class="container">
	
	<div class="os-inner">
		<div class="section-title mt-0 mb-0">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Foundation <span class="text-theme-color-2 font-weight-400">Course</span></h2>
           </div>
          </div>
        </div>
		
		<div class="main">
			<div class="row">
				<div class="col-md-4">
					<ul class="nav nav-pills four">
					    <?php
					    $count=1;
					    foreach($foundation_data as $value){?>
						<li class="<?php if($count == 1){ echo 'active';} ?>"><a href="#tab-o-<?php echo $count; ?>" data-toggle="tab" aria-expanded="true"><span><i class="fa fa-pencil-square-o"></i></span> <h4><?php echo $value['title']; ?></h4></a></li>
						<?php $count++; } ?>
					</ul>
				</div>
				<div class="col-md-8">
					<div class="tab-content home-page service-section">
					    <?php
					    $count=1;
					    foreach($foundation_data as $value){?>
						<div id="tab-o-<?php echo $count; ?>" class="row tab-pane fade <?php if($count == 1){ echo 'active in';} ?>">
							<div class="col-lg-12 col-md-12">
								<div class="item-title">
									<h4><b><?php echo $value['title']; ?></b></h4>
								</div>
								<div class="item-main">
									<?php echo $value['contents']; ?>
								</div>
							</div>
						</div>
						<?php $count++;} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
  </div>
	</section>
	  <?php $this->load->view('common/footer'); ?>
   </body>
</html>