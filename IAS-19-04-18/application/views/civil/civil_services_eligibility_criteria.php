<?php
$activepage="about-civil-services";
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content about">
		<div class="aboutus-section">
        <div class="container">
            <div class="os-inner">
		<div class="section-title mt-30 mb-30">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">ELIGIBILITY <span class="text-theme-color-2 font-weight-400">CRITERIA</span></h2>
           </div>
          </div>
        </div>
		
		<div class="main">
			<div class="row">
				<div class="col-md-4">
					<ul class="nav nav-pills three">
						<li class="active"><a href="#tab-o-1" data-toggle="tab" aria-expanded="true"><span><i class="fa fa-info"></i></span> <h4>Nationality</h4></a></li>
						<li class=""><a href="#tab-o-2" data-toggle="tab" aria-expanded="false"><span><i class="fa fa-line-chart"></i></span> <h4>Education</h4></a></li>
						<li class=""><a href="#tab-o-3" data-toggle="tab" aria-expanded="false"><span><i class="fa fa-clock-o"></i></span> <h4>Age</h4></a></li>
					</ul>
				</div>
				
				<div class="col-md-8">
					<div class="tab-content home-page service-section">
					    <h3><strong>Eligibility For The Examination Is As Follows:</strong></h3>
						<div id="tab-o-1" class="row tab-pane fade active in">
							<div class="col-lg-12 col-md-12">
								<div class="item-title">
									<h4><b>Nationality</b></h4>
								</div>
								<div class="item-main">
									<p></p>
									<ul class="no-style pull-left">
										<li><span class="fa fa-check"></span> For the Indian Administrative Service and the Indian Police Service, the candidate must be a citizen of <b>India</b>.</li>
										<p>For other services, the candidate must be one of the following:</p>
										<li><span class="fa fa-check"></span> A citizen of India</li>
										<li><span class="fa fa-check"></span> A citizen of <b>Nepal</b> or a subject of <b>Bhutan</b></li>
										<li><span class="fa fa-check"></span> A person of Indian origin who has migrated from <b>Pakistan</b>, <b>Myanmar</b>, <b>Sri Lanka</b>, <b>Kenya</b>, <b>Uganda</b>, <b>Tanzania</b>, <b>Zambia</b>, <b>Malawi</b>, <b>Zaire</b>, <b>Ethiopia</b> or <b>Vietnam</b> with the intention of permanently settling in India</li>
									</ul>
								</div>
							</div>
						</div>
						
						<div id="tab-o-2" class="row tab-pane fade">
							<div class="col-lg-12 col-md-12">
								<div class="item-title">
									<h4><b>Education</b></h4>
								</div>
								<div class="item-main">
									<p></p>
									<h5><b>All candidates must have as a minimum one of the following educational qualifications:</b></h5>
									<ul class="no-style pull-left">
										<li><span class="fa fa-check"></span> A degree from a Central, State or a Deemed university</li>
										<li><span class="fa fa-check"></span> A degree received through correspondence or distance education</li>
										<li><span class="fa fa-check"></span> A degree from an open university</li>
										<li><span class="fa fa-check"></span> A qualification recognized by the Government of India as being equivalent to one of the above</li>
										<p>The following candidates are also eligible, but must submit proof of their eligibility from a competent authority at their institute/university at the time of the main examination, failing which they will not be allowed to attend the exam.</p>
										<li><span class="fa fa-check"></span> Candidates who have appeared in an examination, the passing of which would render them educationally qualified enough to satisfy one of the above points</li>
										<li><span class="fa fa-check"></span> Candidates who have passed the final exam of the <b>MBBS</b> degree but have not yet completed an internship.</li>
										<li><span class="fa fa-check"></span> Candidates who have passed the final exam of ICAI, ICSI and ICWAI.</li>
										<li><span class="fa fa-check"></span> A degree from a private university.</li>
										<li><span class="fa fa-check"></span> A degree from any foreign university recognized by the <b>Association of Indian Universities</b>.</li>
									</ul>
								</div>
							</div>
						</div>
						
						<div id="tab-o-3" class="row tab-pane fade">
							<div class="col-lg-12 col-md-12">
								<div class="item-title">
									<h4><b>Age</b></h4>
								</div>
								<div class="item-main">
									<h5><b></b></h5>
									<p>The candidate must have attained the age of 21 years and must not have attained the age of 32 years (for the General category candidate) on August 1 of the year of examination. Prescribed age limits vary with respect to caste reservations.</p>
									<ul class="no-style pull-left">
										<li><span class="fa fa-check"></span> For <b>Other Backward Castes</b> (OBC) the upper age limit is 35</li>
										<li><span class="fa fa-check"></span> For <b>Scheduled Castes</b> (SC) and <b>Scheduled Tribes</b> (ST), the limit is 37 years.</li>
										<li><span class="fa fa-check"></span> The upper age limit is relaxed for certain candidates who are backward with respect to other factors and physically handicapped (PH) people.</li>
									</ul>
								</div>
							
							</div>
						</div>
		
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