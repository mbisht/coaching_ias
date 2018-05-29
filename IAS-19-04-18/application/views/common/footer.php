  <!-- Footer -->
  <footer id="footer" class="footer divider layer-overlay overlay-dark-8" style="background-image: url(<?php echo base_url(); ?>assets/images/bg/bg9.jpg);">
    <div class="container">
      <!--<div class="row border-bottom"> -->
        <div class="col-sm-6 col-md-3">
          <div class="widget dark text-white">
            <img class="mt-5 mb-20" alt="" src="<?php echo base_url(); ?>assets/images/logo-wide.png">
            <p>#218, First Floor, 9th Main Road,<br>Sector 6, HSR Layout,<br>Bengaluru, Karnataka 560102</p>
            <p>Landmark:Beside Lawrence High School</p>
            <ul class="list-inline mt-5">
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i> <a class="text-white" href="mailto:info@iasshiksha.com" target="_blank">info@iasshiksha.com</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i> <a class="text-white" href="mailto:shikshaiasacademy@gmail.com" target="_blank">shikshaiasacademy@gmail.com</a> </li>
            </ul>
          </div>
        </div>
<div class="col-sm-12 col-md-6">
              <!-- Google Map HTML Codes -->
              <div class="map-canvas" id="map_canvas"></div>
              
              
<script type="text/javascript">
var iconBase = '<?php echo base_url(); ?>images/map-marker.png';
 var marker_from, marker_to;
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
          center: {lat: 12.9140829, lng: 77.6352288},
          zoom: 16,
          streetViewControl: false,
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
          draggable: true,
          map: map
        });
        
        var marker = new google.maps.Marker({
          position: {lat: 12.9140829, lng: 77.6352288},
          map: map
        });

        directionsDisplay.setMap(map); 
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZMjItDFU6xVLcPr9XscjG50XjADCXLQ0&libraries=places&callback=initMap" async defer></script>
              
</div>
        <div class="col-sm-6 col-md-3">
            <div class="widget dark">
            <h4 class="widget-title text-uppercase">Call Us Now</h4>
            <div class="text-white">
              +(91) 9986102277<br>
              +(91) 9986103377
            </div>

            <h4 class="widget-title line-bottom-theme-colored-2 mt-10 text-uppercase">Opening Hours</h4>
            <div class="opening-hours">
              <ul class="list-border">
                <li class="clearfix text-white"> <span> Mon - Fri :  </span>
                  <div class="value pull-right text-white"> 7.00 am - 8.00 pm </div>
                </li>
                <li class="clearfix text-white"> <span> Sat - Sun :</span>
                  <div class="value pull-right text-white"> 9.00 am - 6.00 pm </div>
                </li>
              </ul>
            </div>
            <h4 class="widget-title mt-10 text-uppercase">Connect With Us</h4>
            <ul class="styled-icons icon-bordered icon-sm">
              <li><a href="https://www.facebook.com/shikshaiasacademy/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/ias_shiksha" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/in/shiksha-ias-academy-65685413a/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="https://plus.google.com/u/0/110626666177221330589" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://www.instagram.com/shikshaiasacademy/" target="_blank"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-11 text-black-777 m-0">Copyright ©2018 Shiksha IAS Academy. All Rights Reserved</p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
                  <li>
                  <a href="<?php echo base_url(); ?>gallery" >Gallery</a>
                </li>
                <li>|</li>
                <li>
                  <a href="<?php echo base_url(); ?>download" >Download App</a>
                </li>
                <li>|</li>
                <li>
                  <a href="<?php echo base_url(); ?>careers">Career</a>
                </li>
                <li>|</li>
                <li>
                  <a href="https://iasshiksha.blog/" target="_blank">SIASA Blog</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>

<section class="side-btn" id="side-button">
<div id="sideNavi">
        <div class="side-navi-item item1">
			<div class="blink_one">
				<a data-toggle="modal" data-target="#view_Send_enquiry">Enquiry</a>
			</div>
		</div>
        <div class="side-navi-item item2" >
			<div class="blink_second" >
				<a>Notification</a>
			</div>
		</div>
        <div class="side-navi-data">
            <div class="side-navi-tab">
                <div>
                    <?php
				       foreach($alert_notification_data as $key=>$value){?>
				  <marquee width="100%"><h4><strong>***</strong><b><u><a target="_blank" href="<?php echo $value['file_url']; ?>"><?php echo $value['title']; ?>!</a></u></b><strong>**</strong></h4></marquee>
				  <?php } ?>
				  <div class="item-main">
						<h5><p><b>New Updated Alert</b></p></h5>
				   <ul class="no-style pull-left">
				       <?php
				       foreach($notification_data as $key=>$value){?>
							<h6><li><span class="fa fa-check"></span><u><a target="_blank" href="<?php echo $value['file_url']; ?>"><?php echo $value['title']; ?>!</a></u></li></h6>
							<?php } ?>
						</ul>
				   </div>
				</div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$("#side-button .side-navi-item.item2").click(function() {
  $("#side-button").toggleClass("open");
});
</script>

<section id="view_login_popup" class="modal view_new_connection_popup view_login_popup" role="dialog" aria-labelledby="view_login_popup" aria-hidden="true">
<div class="modal-body">
<div class="map-heading"><h4 class="title"><i class="fa fa-key" aria-hidden="true"></i> Login</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="form-body">
<div class="form-container View_inquiry_popup_form_container" id="view_login_popup_body">
<form method="post" name="View_login_form" id="View_login_popup_form" class="View_login_form" action="<?php echo base_url(); ?>login-submission" enctype="multipart/form-data">
<div id="View_login_popup_msg_container">
<div class="form-group">
<span>User Name*</span>
<input type="text" name="user_name" id="user_name" class="input" placeholder="User Name" required="required">
</div>
<div class="form-group">
<span>Password*</span>
<input type="password" name="user_password" id="user_password" class="input" placeholder="Password" required="required">
</div>
<div class="form-group">
<input type="submit" name="send_contact_us_to_client" class="submit" value="Login" id="login_to_client">
</div>
<div class="alert alert-danger error" id="send_login_error" style="display: none;"></div>

<div class="forgot_password"><a href="<?php echo base_url(); ?>forgot_password" title="Forgot password?">Forgot password?</a></div>
</div>
</form>
</div>

</div>
</div>
</section>


<section id="view_signup_popup" class="modal view_new_connection_popup view_login_popup" role="dialog" aria-labelledby="view_signup_popup" aria-hidden="true">
<div class="modal-body">
<div class="map-heading"><h4 class="title"><i class="fa fa-user-o" aria-hidden="true"></i> Signup Form</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="form-body">
<div class="form-container View_inquiry_popup_form_container" id="view_signup_popup_body">
<form method="post" name="View_signup_form" id="View_signup_popup_form" class="View_login_form" action="<?php echo base_url(); ?>signup-submission" enctype="multipart/form-data">
<div id="View_signup_popup_msg_container">
<div class="form-group">
<span>Full Name*</span>
<input type="text" name="user_name" id="signup_user_name" class="input" placeholder="Full Name" required="required">
</div>
<div class="form-group">
<span>Email ID*</span>
<input type="text" name="user_email" id="signup_user_email" class="input" placeholder="Email ID" required="required">
</div>
<div class="form-group">
<span>Password*</span>
<input type="password" name="user_password" id="signup_user_password" class="input" placeholder="Password" required="required">
</div>
<div class="form-group">
<span>Mobile*</span>
<input type="text" name="user_mobile" id="signup_user_mobile" class="input" placeholder="Mobile" required="required">
</div>
<div class="form-group">
<span>City*</span>
<input type="text" name="user_city" id="signup_user_city" class="input" placeholder="City" required="required">
</div>
<div class="form-group">
<span>Address</span>
<textarea name="user_address" id="signup_user_address" class="input" placeholder="Address"></textarea>
</div>
<div class="form-group">
<span>Course Category*</span>
<select name="user_course" id="signup_user_course" class="input" required="true">
                           <option value="">Select Course*</option>
                           <option value="Prelims">Prelims</option>
                           <option value="Prelims cum Mains">Prelims cum Mains</option>
                           <option value="Foundation Course">Foundation Course</option>
                           <option value="Mains">Mains</option>
                           <option value="Optional subject">Optional subject</option>
                           <option value="Interview Guidance">Interview Guidance</option>
                           <option value="Study Materials">Study Materials</option>
                           <option value="Essay">Essay</option>
                           <option value="Integrated Course with Graduation">Integrated Course with Graduation</option>
                        </select>
</div>
<div class="form-group">
<input type="submit" name="send_contact_us_to_client" class="submit" value="Signup" id="signup_to_client">
</div>
<div class="alert alert-danger error" id="send_signup_error" style="display: none;"></div>
</div>
</form>
</div>
</div>
</div>
</section>

<section id="view_Send_enquiry" class="modal fade view_enquiry_popup" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><h3 class="title-pattern mt-0"><span class="text-Blue">Request <span class="text-theme-color-2">Enquiries</span></span></h3></h4>
      </div>
      <div class="modal-body">
		    <form method="post" name="view_Send_enquiry_form" id="view_Send_enquiry_form" class="View_login_form" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group mb-20 mt-20">
                      <input placeholder="Full Name" type="text" id="enquiry_name" name="enquiry_name" class="form-control" aria-required="true" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <input placeholder="Email" type="text" id="enquiry_email" name="enquiry_email" class="form-control" aria-required="true" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <input placeholder="Mobile" type="text" id="enquiry_phone" name="enquiry_phone" maxlength="10" class="form-control" aria-required="true" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <div class="styled-select">
                        <select name="enquiry_subject" id="enquiry_subject" class="form-control" aria-required="true" required>
                          <option value="">Choose Subject</option>
                          <option value="Foundation Course">Foundation Course</option>
                          <option value="Prelims Cum Mains Course">Prelims Cum Mains Course</option>
                          <option value="Mains Course">Mains Course</option>
                          <option value="Optional Course">Optional Course</option>
                          <option value="Others">Others</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <input name="enquiry_city" id="enquiry_city" class="form-control required" type="text" placeholder="City" aria-required="true" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea placeholder="Enter Message" rows="3" min="" class="form-control required" name="enquiry_message" id="enquiry_message" aria-required="true" required></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-20 mt-10">
                      <input name="form_botcheck" class="form-control" type="hidden" value="">
                      <button type="submit" name="btn2" id="enquiry_submit_btn" class="btn btn-colored btn-theme-color-2 text-white btn-lg btn-block" data-loading-text="Please wait...">Submit Request</button>
                    </div>
                  </div>
                  <div class="alert alert-danger error" id="send_enquiry_error" style="display: none;"></div>
                </form>
            </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</section>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>

<script type="text/javascript">function add_chatinline(){var hccid=53681147;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>