<?php
$activepage="material";
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content about">
		<div class="aboutus-section">
        <div class="container">
            <div class="os-inner">
		<div class="section-title mt-5 mb-5">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">UPSC <span class="text-theme-color-2 font-weight-400">BOX</span></h2>
           </div>
          </div>
        </div>
		
		<div class="main">
			<div class="row">
				<div class="col-md-4">
					<ul class="nav nav-pills four">
					    <?php
					    $count=1;
					    foreach($upsc_material_data['subjects'] as $value){?>
						<li class="<?php if($count == 1){ echo 'active';} ?>"><a href="#tab-o-<?php echo $count; ?>" data-toggle="tab" aria-expanded="true"><span><i class="fa fa-pencil-square-o"></i></span> <h4><?php echo $value; ?></h4></a></li>
						<?php $count++; } ?>
					</ul>
				</div>
				<div class="col-md-8">
					<div class="tab-content home-page service-section">
					    <?php
					    $count=1;
					    foreach($upsc_material_data['subjects'] as $value){?>
						<div id="tab-o-<?php echo $count; ?>" class="row tab-pane fade <?php if($count == 1){ echo 'active in';} ?>">
							<div class="col-lg-12 col-md-12">
								<div class="item-title">
									<h4><b><?php echo $value; ?> Materials</b></h4>
								</div>
								<div class="item-main">
									<ul class="links">
									    <?php
									    foreach($upsc_material_data[$value] as $material){?>
                                        <li><span class="fa fa-check"></span> <a href="<?php echo $material['file_url']; ?>" target="_blank"><?php echo $material['title']; ?></a></li>
                                      <?php } ?>
                                      </ul>
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