<?php
$activepage="daily-quiz";
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
?>
<section class="content quiz">
		<div class="container">
            <div>
                    		<h1>DAILY QUIZ</h1>
                    		<div class="col-xs-12 col-sm-3">
                    		    <h3>GET QUIZ BY DATE</h3>
                    		    <div id="quiz_datepicker"></div>
                            </div>
                    		<div class="col-xs-12 col-sm-9">
                    		 <p>You can select any date and click 'Start Quiz' button to start quiz.</p>
                    		 <br>
                    		 <p>Follow these instructions:</p>
                    		 <ul>
                    		     <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Click on – 'Start Quiz' button</li>
                    		     <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Solve Questions</li>
                    		     <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Click on 'Submit Quiz' button</li>
                    		 </ul>
                    		    <br>
                    		<form method="get" action="<?php echo base_url(); ?>start-quiz" enctype="multipart/form-data">
                    		<input type="hidden" name="date" id="QuizDateSelected" value="<?php echo date("Y-m-d") ?>" required>
                    		<button class="btn btn-primary" id="DateSelected_start_quiz"><b>Get Quiz</b></button>
                    		</form>
                    		</div>
        		
            </div>
    </div>
</section>
<?php include("common/footer.php"); ?>

<section id="view_start_details" class="modal fade view_enquiry_popup" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><h3 class="title-pattern mt-0"><span class="text-Blue">User <span class="text-theme-color-2">Details</span></span></h3></h4>
      </div>
      <div class="modal-body">
		    <form method="post" name="quiz_details_form" id="quiz_details_form" class="View_login_form" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group mb-20 mt-20">
                      <input placeholder="Full Name" type="text" id="quiz_name" name="quiz_name" class="form-control" aria-required="true" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <input placeholder="Email" type="text" id="quiz_email" name="quiz_email" class="form-control" aria-required="true" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <input placeholder="Mobile" type="text" id="quiz_phone" name="quiz_phone" maxlength="10" class="form-control" aria-required="true" required>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group mb-20 mt-10">
                      <input name="form_botcheck" class="form-control" type="hidden" value="">
                      <button type="submit" name="btn2" id="quiz_details_submit_btn" class="btn btn-colored btn-theme-color-2 text-white btn-lg btn-block" data-loading-text="Please wait...">Submit Details</button>
                    </div>
                  </div>
                  <br/>
                  <div class="alert alert-danger error" id="send_quiz_start_error" style="display: none;"></div>
                </form>
            </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</section>
    <script>
    var today_date_quiz='0000-00-00';
    var userlogged = <?php if(isset($this->session->userdata['logged_in'])){ echo "true";}else{echo "false"; } ?>;
    $(function(){
        var today_date;
        var availableDates = [];
        <?php
        foreach($quiz_dates_data as $key=>$value){ ?>
            var dates= '<?php echo $value['date']; ?>';
            availableDates.push(dates);
            <?php } ?>
        
        function availableFunction(date) {
            month = '' + (date.getMonth() + 1),
            day = '' + date.getDate(),
            year = date.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
            availday = year + "-" + month + "-" + day;
 
            if (jQuery.inArray(availday, availableDates) > -1) {
                return [true,"eventday",""];
            } else {
                return [false,"other",""];
            }
        }
        
            $("#quiz_datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText, inst) {
                var date = $(this).val();
                //quizByDate(date);
                today_date_quiz=date;
                $("#QuizDateSelected").val(date);
                console.log(date);
                return false;
            },
            beforeShowDay: availableFunction
        });
        
    });
    
    $("#DateSelected_start_quiz").click(function(){
        if(userlogged || userlogged == 'true'){
        var date = $("#QuizDateSelected").val();
        if(date === '' || date == '0' || date == '0000-00-00'){
            alert("Please Select Date");
            return false;
            }else{
                location.href = "<?php echo base_url(); ?>start-quiz?date="+date;
                return false;
            }
        }else{
            $('#view_start_details').modal('show');
            return false;
        }
    });
//Quiz_Details FORM
$(document).ready(function(e) {
    var emailInfo = $("#send_quiz_start_error");
    $('#quiz_details_submit_btn').click(function(e) {
                        $.ajax({url: "/quiz-user-details",
                            type: "POST",
                            data: $("#quiz_details_form").serialize(),
                            success: function(result){
                                if(result.message){
                                //var obj = JSON.parse(result);
                                emailInfo.css({"display": "block"});
                                emailInfo.html(result.message);
                                userlogged = true;
                                $('#view_start_details').modal('hide');
                                var date = $("#QuizDateSelected").val();
                                location.href = "<?php echo base_url(); ?>start-quiz?date="+date;
                                }else{
                                emailInfo.css({"display": "block"});
                                emailInfo.html("Some error occured");
                                }
                                $('#send_quiz_start_error').delay(5000).fadeOut(400);
                            },
                            error: function(xhr){
                                emailInfo.css({"display": "block"});
                                emailInfo.html("An error occured: " + xhr.status + " " + xhr.statusText);
                                $('#send_quiz_start_error').delay(5000).fadeOut(400);
                                }
                            });
            return true;
    });
});
    </script>
   </body>
</html>