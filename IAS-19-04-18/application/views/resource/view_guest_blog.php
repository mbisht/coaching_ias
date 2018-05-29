<?php
$activepage="about-civil-services";
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content guest_blog">
		<div class="aboutus-section">
        <div class="container">
		<div class="section-title mt-10 mb-10">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">GUEST <span class="text-theme-color-2 font-weight-400">BLOG</span></h2>
           </div>
          </div>
        </div>
        
        <div class="main-content">
            
            <?php
            foreach($guest_blog_data as $key=>$value){ ?>
            <article>
                <div class="entry-body">
                    <h2 class="entry-title"><a href="guest-blog/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></h2>
                    <div class="entry-author"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $value['full_name']; ?></div>
							<div class="entry-meta">
							    <div class="calender-icon fa fa-calendar-o" aria-hidden="true">
							    <span class="posted-on"><time class="entry-date published updated"><?php echo date("F d, Y", strtotime($value['date_added'])); ?></time</span>
							    </div>
							</div>
							<div class="entry-content">
							    <?php echo $value['description']; ?>
							</div>
				</div>
            </article>
            <?php } ?>
        </div>
    </div>
</div>
	</section>
	  <?php $this->load->view('common/footer'); ?>
	<script>
  $( function() {
	  $( "#accordion" ).accordion({heightStyle: 'content',
        autoHeight: true});
    //$( "#accordion" ).accordion();
	//heightStyle: "content";
  } );
  </script>
</body>
</html>