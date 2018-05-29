<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
?>
<section class="content about gallery">
		<div class="aboutus-section">
        <div class="container">
        <div class="section-title mb-10">
          <div class="row">
            <div class="col-md-12">
              <h1 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Latest <span class="text-theme-color-2 font-weight-400">GALLERIES</span></h1>
           </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
              <?php
            $count = 1;
              foreach($gallery_details_data as $key=>$value){?>
            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft mb-30" data-wow-duration="1s" data-wow-delay="0.3s">
              <article class="post clearfix mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <a class="example-image-link" href="<?php echo base_url(); ?>assets/files/gallery/<?php echo $value['image']; ?>" data-lightbox="example-set" data-title="">
                    <img src="<?php echo base_url(); ?>assets/files/gallery/<?php echo $value['image']; ?>" alt="" class="example-image img-responsive img-fullwidth"> 
                    <!--<div class="overlay">--><?php //echo $value['title']; ?><!--</div>-->
                    </a>
                  </div>
                </div>
              </article>
            </div>
            <?php $count++; } ?>
          </div>
        </div>
      </div>
    </div>
	</section>
	  <?php include("common/footer.php"); ?>
   </body>
</html>