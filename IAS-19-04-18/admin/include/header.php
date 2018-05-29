<?php
$logged_in_stmt = $reg_user->runQuery("SELECT * FROM tbl_admin_customers WHERE id = '".$_SESSION['userSession']."' ");
$logged_in_stmt->execute();
$logged_in_result = $logged_in_stmt->fetchObject();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="keywords" content="" />
<meta name="author" content="">
<meta name="robots" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://use.fontawesome.com/ef3000c315.js"></script>
<style>.raisetick {position: fixed;right: 100px;top: 0px;z-index: 9999;width: 120px;}.raisetick img {width: 120px;}div#infor { position: fixed;right: 0;background: #fff;top: 60px;}</style>
<?php include 'style.php'; ?>
</head>
<body class="fixed-sidebar fixed-header skin-default content-appear">
		<div class="wrapper"> 
			<!-- Preloader -->
			<div class="preloader"></div>
			<!-- Sidebar -->
			<div class="site-overlay"></div>
			<div class="site-sidebar">
				<div class="custom-scroll custom-scroll-light">
					<ul class="sidebar-menu">
					
						<li class="menu-title">Main</li>
						<li class="with-sub">
							<a href="<?php echo DIR_SYSTEM; ?>" class="waves-effect waves-light">
								<span class="s-icon"><i class="ti-themify-favicon"></i></span>
								<span class="s-text"><?php echo ucwords($logged_in_result->cusFname); echo "(".$_SESSION['userSession'].")"; ?></span>
							</a>
						</li>
						<li class="menu-title">Account</li>
						<li class="with-sub">
							<a class="waves-effect waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fa fa-user"></i></span>
								<span class="s-text">User Details</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>user-list">User List</a></li>
							</ul>
						</li>
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-world"></i></span>
								<span class="s-text">Quiz</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-quiz-questions">View Quiz Questions</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>add-quiz-questions">Add Quiz Questions</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-quiz-results">View Quiz Results</a></li>
							</ul>
						</li>
						
						<li class="menu-title">Course</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-folder"></i></span>
								<span class="s-text">Course Page Details</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-course-details">View Course Page Details</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>add-course-details">Add Course Page Details</a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
								<span class="s-text">Online Test Prelims</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-prelims-questions">View Prelims Questions</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>add-prelims-questions">Add Prelims Questions</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-prelims-results">View Prelims Results</a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
								<span class="s-text">Online Test Mains</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-mains-questions">View Mains Tests</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>add-mains-questions">Add Mains Tests</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-mains-results">View Mains Test Results</a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
								<span class="s-text">Online Test Optionals</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-optionals-questions">View Optionals Tests</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>add-optionals-questions">Add Optionals Tests</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-optionals-results">View Optionals Test Results</a></li>
							</ul>
						</li>
						<li class="menu-title">Daily News</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fas fa-book fa"></i></span>
								<span class="s-text">Daily News Analysis</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-daily-news">View Daily News Analysis</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>add-daily-news">Add Daily News Analysis</a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fas fa-book fa"></i></span>
								<span class="s-text">Daily News Articles</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-article-daily-news">View Daily News Article</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>add-article-daily-news">Add Daily News Article</a></li>
							</ul>
						</li>
						
						<li class="menu-title">Details</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-medall"></i></span>
								<span class="s-text">Faculty</span></a>
							<ul>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-faculty">Add new Faculty </a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-faculty">View Faculty list</a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-youtube"></i></span>
								<span class="s-text">SISA Videos</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-sisavideos">View SISA Videos list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-sisavideos">Add new SISA Videos </a></li>
							</ul>
						</li>
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-marker"></i></span>
								<span class="s-text">Weekly Current Affairs</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-weekly-current-affair">View Weekly Current Affairs list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-weekly-current-affair">Add Weekly Current Affairs</a></li>
							</ul>
						</li>
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-marker-alt"></i></span>
								<span class="s-text">Monthly Current Affairs</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-monthly-current-affair">View Monthly Current Affairs list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-monthly-current-affair">Add Monthly Current Affairs</a></li>
							</ul>
						</li>
						
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-marker-alt"></i></span>
								<span class="s-text">Daily Current Affairs</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-daily-current-affair">View Daily Current Affairs list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-daily-current-affair">Add Daily Current Affairs</a></li>
							</ul>
						</li>
						
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fas fa-book fa"></i></span>
								<span class="s-text">Materials Study Resources</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-study-material">View Materials list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-study-material">Add new Materilals </a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-bookmark-alt"></i></span>
								<span class="s-text">Materials UPSC BOX</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-upsc-box-material">View UPSC BOX</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-upsc-box-material">Add New UPSC BOX </a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-cup"></i></span>
								<span class="s-text">Achievers</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-achivers">View Achievers list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-achivers">Add Achivers</a></li>
							</ul>
						</li>
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-briefcase"></i></span>
								<span class="s-text">Home Page Details</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-directors-message">Directors Message</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-thumbnail-notification-video">View Home Page Videos</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-thumbnail-notification-video">Add Home Page Videos</a></li>
							</ul>
						</li>
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-gallery"></i></span>
								<span class="s-text">Gallery</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-gallery">View Gallery list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-gallery">Add Gallery</a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-announcement"></i></span>
								<span class="s-text">Moving Slider Notification</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-slider-marquee">View Slider Notification</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-slider-marquee">Add Slider Notification</a></li>
							</ul>
						</li>
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-comment-alt"></i></span>
								<span class="s-text">Website Notification</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-notification-slider">View Notification list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-notification-slider">Add Notification</a></li>
							</ul>
						</li>
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fa fa-mobile fa-mobile-alt"></i></span>
								<span class="s-text">Mobile App Notification</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-mobile-notification">View Mobile Notification list</a></li>
								<li><a href="<?php echo DIR_SYSTEM; ?>add-mobile-notification">Add Mobile Notification</a></li>
							</ul>
						</li>
						
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-widget"></i></span>
								<span class="s-text">Guest Blog</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-guestblog">View GuestBlog list</a></li>
							</ul>
						</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-clip"></i></span>
								<span class="s-text">CAREER</span>
							</a>
							<ul>
							   <li><a href="<?php echo DIR_SYSTEM; ?>view-career-list">Career Page list</a></li>
							</ul>
						</li>
						
						<li class="menu-title">Admin Accounts</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fa fa-user-o"></i></span>
								<span class="s-text">Admin Details</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-admin-list">View Admin List</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>add-new-admin">Add New Admin A/C</a></li>
							</ul>
						</li>
						<li class="menu-title">Complaints and Request</li>
						<li class="with-sub">
							<a class="waves-effect  waves-light">
							    <span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-pencil-alt"></i></span>
								<span class="s-text">Request and Complaints</span>
							</a>
							<ul>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-new-admission">View New Admission Requests</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-user-enquiry-request">View Enquiry Requests</a></li>
							    <li><a href="<?php echo DIR_SYSTEM; ?>view-subscribe-list">View Subscribe List</a></li>
							</ul>
						</li>
						
						<li>
							<a href="<?php echo DIR_SYSTEM; ?>logout" class="waves-effect  waves-light">
							<span class="s-icon"><i class="ti-lock"></i></span>
							<span class="s-text">Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="site-header">
				<nav class="navbar navbar-light">
					<div class="navbar-left">
						<a class="navbar-brand" href="/">
							<div class="logo"><img src="images/logo.png" /></div>
						</a>
						<div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
							<span class="hamburger"></span>
						</div>
						<div class="toggle-button-second dark float-xs-right hidden-md-up">
							<i class="ti-arrow-left"></i>
						</div>
						<div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
							<span class="more"></span>
						</div>
					</div>
					<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
						<div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
							<span class="hamburger"></span>
						</div>
						<div class="toggle-button-second light float-xs-right hidden-sm-down">
							<i class="ti-arrow-left"></i>
						</div>
						<ul class="nav navbar-nav float-md-right">
							
							<li class="nav-item dropdown hidden-sm-down">
								<?php
                                $stmt = $reg_user->runQuery("SELECT * FROM tbl_admin_customers WHERE id = '".$_SESSION['userSession']."' ");
                                $stmt->execute();
                                for($i=0; $stmt1 = $stmt->fetchObject(); $i++)
                                { ?>
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<span class="avatar box-32 name">
									<?php echo $stmt1->name[0]; ?>
									</span>
								</a><?php } ?>
								<div class="dropdown-menu dropdown-menu-right animated fadeInUp">
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="logout"><i class="ti-power-off mr-0-5"></i> Sign out</a>
								</div>
							</li>
							
						</ul>
						<ul class="nav navbar-nav">
							<li class="nav-item hidden-sm-down">
								<a class="nav-link toggle-fullscreen" href="#">
									<i class="ti-fullscreen"></i>
								</a>
							</li>
							<li class="nav-item dropdown hidden-sm-down">
								<a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
									<i class="ti-layout-grid3"></i>
								</a>
								<div class="dropdown-apps dropdown-menu animated fadeInUp">
									<div class="a-grid">
										<div class="row row-sm">
											<div class="col-xs-4">
												<div class="a-item">
													<a href="#">
														<div class="ai-icon"><img class="img-fluid" src="img/brands/dropbox.png" alt=""></div>
														<div class="ai-title">Dropbox</div>
													</a>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="a-item">
													<a href="#">
														<div class="ai-icon"><img class="img-fluid" src="img/brands/github.png" alt=""></div>
														<div class="ai-title">Github</div>
													</a>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="a-item">
													<a href="#">
														<div class="ai-icon"><img class="img-fluid" src="img/brands/wordpress.png" alt=""></div>
														<div class="ai-title">Wordpress</div>
													</a>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="a-item">
													<a href="#">
														<div class="ai-icon"><img class="img-fluid" src="img/brands/gmail.png" alt=""></div>
														<div class="ai-title">Gmail</div>
													</a>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="a-item">
													<a href="#">
														<div class="ai-icon"><img class="img-fluid" src="img/brands/drive.png" alt=""></div>
														<div class="ai-title">Drive</div>
													</a>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="a-item">
													<a href="#">
														<div class="ai-icon"><img class="img-fluid" src="img/brands/dribbble.png" alt=""></div>
														<div class="ai-title">Dribbble</div>
													</a>
												</div>
											</div>
										</div>
									</div>
									<a class="dropdown-more" href="#">
										<strong>View all apps</strong>
									</a>
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</div>