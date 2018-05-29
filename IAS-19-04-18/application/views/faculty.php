<?php
$activepage="faculty";
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
?>
<section class="content about faculty">
		<div class="aboutus-section">
        <div class="container">
        <div class="section-title mb-30">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mt-0 text-uppercase line-bottom font-28 line-height-1">FACULTY <span class="text-theme-color-2 font-weight-400">DETAILS</span></h2>  <!-- here i replaced the News to Blogs  according to ankita-->
           </div>
          </div>
        </div>
        <div class="section-content">
        <div class="container">
        <?php
        foreach($faculty_data as $key => $value){ ?>
		<div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft animated animated" data-wow-duration="1s" data-wow-delay="0.3s" 
		style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s;">
              <article class="post clearfix mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo base_url(); ?>assets/files/faculty/<?php echo $value['image']; ?>" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content pt-20 pb-20 pl-10 pr-10 bg-white">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-10 pb-5 pl-10">
                      <ul>
						<li class="font-13 text-white font-weight-600 border-bottom"><?php echo $value['experience']; ?></li>
						<li class="font-12 text-white text-uppercase">Experience</li>
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5 line-height-1"><a href="#"><?php echo $value['name']; ?></a></h4>
                        <p class="font-12 mt-5 role line-height-2"><b><?php echo $value['role']; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <p class="mt-15 line-height-1"><b><?php if( $value['qualification']){ echo  $value['qualification'];}else{echo "<br/>";} ?></b></p>
				  <p class="mt-10 line-height-1"><b><?php if($value['expertise']){ echo $value['expertise'];}else{echo "<br/>";} ?></b></p>
                  <div class="clearfix"></div>
                </div>
                <br>
              </article>
              </div>
              <? } ?>
			            
          </div>
        </div>
      </div>
    </div>
	</section>
	  <?php include("common/footer.php"); ?>
   </body>
</html>