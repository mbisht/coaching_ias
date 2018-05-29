<?php
if(isset($this->session->userdata['logged_in'])){
   $user_details=$this->session->userdata['logged_in'];
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="iasShiksha">
<head>
<title><?php if(isset($meta_title)){echo $meta_title; }else{ echo "Best IAS Coaching Institute, Top IAS, UPSC Coaching Centres Bangalore"; }?></title>
<meta name="description" content="<?php if(isset($meta_description)){echo $meta_description; }else{ echo "Start preparing for IAS exam while joining Shiksha IAS Academy, the Best IAS coaching centre in Bangalore. We are the Top IAS coaching centre in Bangalore known for offering advanced course materials leading to sure shot success."; } ?>" />
<meta name="keywords" content="<?php if(isset($meta_keywords)){echo $meta_keywords; }else{ echo "Best IAS coaching institute in Bangalore, Best IAS coaching centre in Bangalore, Top IAS coaching centre in Bangalore, IAS coaching centres in Bangalore, UPSC coaching centres in Bangalore"; } ?>" />

<meta name="author" content="Shiksha IAS Academy" />
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<base href="<?php echo base_url(); ?>" />

<!-- Favicon and Touch Icons -->
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="shortcut icon" type="image/jpeg">
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="apple-touch-icon">
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="apple-touch-icon" sizes="72x72">
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="apple-touch-icon" sizes="114x114">
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="apple-touch-icon" sizes="144x144">

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/css-plugin-collections.css" rel="stylesheet"/>
<link id="menuzord-menu-skins" href="<?php echo base_url(); ?>assets/css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/css/preloader.css" rel="stylesheet" type="text/css">

<link href="<?php echo base_url(); ?>assets/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
<link  href="<?php echo base_url(); ?>assets/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="<?php echo base_url(); ?>assets/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="<?php echo base_url(); ?>assets/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/style-main.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">

<!-- Latest Galleries -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/lightbox.min.css">
<script src="<?php echo base_url(); ?>assets/dist/js/lightbox-plus-jquery.min.js"></script>

<!-- external javascripts -->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?php echo base_url(); ?>assets/js/jquery-plugin-collection.js" type="text/javascript"></script>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/angular-sanitize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/angular-app.js" type="text/javascript"></script>
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <header id="header" class="header">
    <div class="header-top bg-theme-color-2 sm-text-center p-0">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
              <ul class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                <li><a href="https://www.facebook.com/shikshaiasacademy/" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="https://twitter.com/ias_shiksha" target="_blank"><i class="fa fa-twitter text-white"></i></a></li>
                 <li><a href="https://www.linkedin.com/in/shiksha-ias-academy-65685413a/" target="_blank"><i class="fa fa-linkedin text-white"></i></a></li>
                <li><a href="https://plus.google.com/u/0/110626666177221330589" target="_blank"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="https://www.instagram.com/shikshaiasacademy/" target="_blank"><i class="fa fa-instagram text-white"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
              <div class="subscription_section">
                  <form method="post" enctype="multipart/form-data" id="subscription_form" name="subscription_form">
                      <div class="form-group1">
                      <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                      <input type="text" name="subscription_email" placeholder="Email ID" id="subscription_email" class="input" required />
                      <input type="submit" name="submit" value="Subscribe" id="subscription_submission_btn" class="submit" >
                      </div>
                      <span class="alert subs-error" id="subscription_status_msg" style="display:none;"></span>
                  </form>
              </div>
          </div>
          <div class="col-md-4">
            <div class="widget no-border m-0">
              <ul class="list-inline font-13 sm-text-center mt-5">
                <li>
                  <a class="text-white" href="<?php echo base_url(); ?>download" >Download App</a>
                </li>
                <li class="text-white">|</li>
                <li><a href="<?php echo base_url(); ?>careers" class="text-white">Career</a></li>
                <li class="text-white">|</li>
                <li class="with-submenu">
                <?php
                  if(isset($this->session->userdata['logged_in'])){ ?>
                  <a class="text-white" href="<?php echo base_url(); ?>my-account" onclick="return false" ng-click="toggleSubmenu()">
                     <?php echo $user_details['Name']; ?>
                  </a>
                  <ul class="submenu">
    		        <li><a href="<?php echo base_url(); ?>my-account">Account</a></li>
    		        <li><a href="<?php echo base_url(); ?>add-guest-blog">Add Blog</a></li>
    		        <li><a href="<?php echo base_url(); ?>view-prelims-test-result" >Prelims Test Result</a></li>
    		        <li><a href="<?php echo base_url(); ?>view-mains-test-result" >Mains Test Result</a></li>
    		        <li><a href="<?php echo base_url(); ?>view-optional-test-result" >Optional Test Result</a></li>
    		        <li><a href="<?php echo base_url(); ?>change-password">Change Password</a></li>
    		        <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
    		    </ul>
    		    
                <?php }else{ ?>
                <a class="text-white" href="<?php echo base_url(); ?>login" data-toggle="modal" data-target="#view_login_popup">Login</a>
                <?php } ?>
                </li>
                <?php
                  if(!isset($this->session->userdata['logged_in'])){ ?>
                <li class="text-white">|</li>
                <li><a class="text-white" href="#" data-toggle="modal" data-target="#view_signup_popup">Signup</a></li>
                 <?php } ?>
              </ul>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="widget no-border m-0">
              <a class="menuzord-brand pull-left flip xs-pull-center" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-wide.png" alt="iasshiksha-logo" title="iasshiksha-logo"></a>
            </div>
          </div>
          <div class="col-xs-6 col-sm-3 col-md-3">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li><i class="fa fa-phone-square text-theme-colored font-36 mt-5 sm-display-block"></i></li>
                <li>
                  <span class="font-12 text-gray text-uppercase">Call us today!</span>
                  <h5 class="font-14 m-0"> +(91) 9986102277</h5>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xs-6 col-sm-3 col-md-3">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li><i class="fa fa-clock-o text-theme-colored font-36 mt-5 sm-display-block"></i></li>
                <li>
                  <span class="font-12 text-gray text-uppercase">We are open!</span>
                  <h5 class="font-13 text-black m-0"> Mon-Sun 7:00-21:00</h5>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="col-xs-6 col-sm-3 col-md-3">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-0 mb-0 m-0">
              <ul class="pull-right flip hidden-xs">
              <li>
                <a href="<?php echo base_url(); ?>admission" class="top-button btn btn-colored btn-flat bg-theme-color-2 text-white font-14 font-14 mt-15 p-15 pr-15 pl-15"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Admission</b></a>
              </li>
            </ul>
            </div>
          </div>
          
          
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px">
        <div class="container">
          <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
            <ul class="menuzord-menu">
              <li class="<?php if($activepage == 'home'){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="<?php if($activepage == 'about-us'){ echo "active"; } ?>" ><a href="<?php echo base_url(); ?>about-us">About Us</a></li>
              <li class="<?php if($activepage == 'courses'){ echo "active"; } ?>"><a>Courses</a>
              <ul class="dropdown">
                  <li><a href="<?php echo base_url(); ?>foundation">Courses</a>
                  <ul class="dropdown">
                  <li><a href="<?php echo base_url(); ?>foundation">Foundation Course</a></li>
                  <li><a href="<?php echo base_url(); ?>prelims">Prelims Cum Main Course</a></li>
                  <li><a href="<?php echo base_url(); ?>mains-course">Mains Course</a></li>
				  <li><a href="<?php echo base_url(); ?>optional-course">Optional Course</a></li>
				  <li><a href="<?php echo base_url(); ?>fee-payment">Fee Payment</a></li>
				</ul>
                  </li>
                  <li><a>About Civil Services</a>
                  <ul class="dropdown">
                  <li><a href="<?php echo base_url(); ?>about-cs-exam">About CS Exam</a></li>
                  <li><a href="<?php echo base_url(); ?>civil-services">Services</a></li>
                  <li><a href="<?php echo base_url(); ?>civil-services-eligibility-criteria">Eligibility Criteria</a></li>
                  <li><a href="<?php echo base_url(); ?>civil-services-syllabus">Syllabus</a></li>
				  <li><a href="<?php echo base_url(); ?>upsc-notification">UPSC Notification</a></li>
			      </ul>
                  </li>
			</ul>
              </li>
            <li class="<?php if($activepage == 'online-test'){ echo "active"; } ?>"><a>Online Test</a>
				  <ul class="dropdown">
                  <li><a href="<?php echo base_url(); ?>online-test-prelims">Prelims</a></li>
                  <li><a href="<?php echo base_url(); ?>online-test-mains">Mains</a></li>
                  <li><a href="<?php echo base_url(); ?>online-test-optional">Optional</a></li>
			      </ul>
			</li>
			<li class="<?php if($activepage == 'faculty'){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>faculty">Faculty</a></li>
            <li class="<?php if($activepage == 'current-affair'){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>current-affair">Current Affair</a>
              <ul class="dropdown">
                  <li><a href="<?php echo base_url(); ?>daily-currentaffair">Daily Current Affair</a></li>
                  <li><a href="<?php echo base_url(); ?>weekly-currentaffair">Weekly Current Affair</a></li>
                  <li><a href="<?php echo base_url(); ?>monthly-currentaffair">Monthly Current Affair</a></li>
			</ul>
              </li>
              <li class="<?php if($activepage == 'daily-news'){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>daily-news">Daily News</a>
              <ul class="dropdown">
                      <li><a href="<?php echo base_url(); ?>daily-news">News Analysis</a></li>
                      <li><a href="<?php echo base_url(); ?>news-article">News Articles</a></li>
                      </ul>
              </li>
              <li class="<?php if($activepage == 'daily-quiz'){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>daily-quiz">Daily Quiz</a></li>
              <li class="<?php if($activepage == 'material'){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>material">Material</a>
                      <ul class="dropdown">
                      <li><a href="<?php echo base_url(); ?>siasa-videos">SIASA Videos</a></li>
                      <li><a href="<?php echo base_url(); ?>study-resources">Study Resources</a></li>
                      <li><a href="<?php echo base_url(); ?>upsc-box">UPSC Box</a></li>
    			      </ul>
                </li>
              <li class="<?php if($activepage == 'blog'){ echo "active"; } ?>"><a>Blog</a>
                      <ul class="dropdown">
                      <li class="<?php if($activepage == 'siasa-blog'){ echo "active"; } ?>"><a href="https://iasshiksha.blog/" target="_blank">SIASA Blog</a></li>
                      <li class="<?php if($activepage == 'guest-blog'){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>guest-blog">Guest Blog</a></li>
    			      </ul>
                </li>
              <li class="<?php if($activepage == 'contact-us'){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>contact-us">Contact Us</a></li>
            </ul>
            <div id="top-search-bar" class="collapse">
              <div class="container">
                <form role="search" action="#" class="search_form_top" method="get">
                  <input type="text" placeholder="Type text and press Enter..." name="s" class="form-control" autocomplete="off">
                  <span class="search-close"><i class="fa fa-search"></i></span>
                </form>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>