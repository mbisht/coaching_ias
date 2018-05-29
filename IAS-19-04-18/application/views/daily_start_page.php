<?php
$activepage="daily-quiz";
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
?>
<section class="content quiz" id="start_quiz_content" style="display:none;">
		<div class="container">
            <div ng-controller="listCtrl as list" ng-hide="list.quizMetrics.quizActive || list.quizMetrics.resultsActive">
    		<h1>START YOUR DAILY QUIZ</h1>
    		<div class="col-xs-12 col-sm-12">
            <div class="timer-display">
            </div>
            <h3>You have selected quiz for the Date: <?php echo $_REQUEST['date']; ?></h3>
                    		 <p>The following quiz will have 10 MCQs . This quiz is intended to introduce you to concepts and certain important facts relevant to UPSC IAS civil services preliminary exam. It is not a test of your knowledge. If you score less, please do not mind. Read again sources provided and try to remember better. 
                    		 Discuss the concepts and facts they try to test from you and suggest improvements. Thank you.</p>
                    		 <br>
                    		 <p>Follow these instructions:</p>
                    		 <ul>
                    		     <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Click on – 'Start Quiz' button</li>
                    		     <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Solve Questions</li>
                    		     <li><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Click on 'Finish Quiz' button</li>
                    		 </ul>
                    		    <br>
                    		<button class="btn btn-primary" ng-click="list.activateQuiz()"><b>Start Quiz</b></button>
                    		</div>
            </div>
		
		<!-- Attach the quizCtrl to the view and ng-show when the quizActive flag is set -->
        <div ng-controller="quizCtrl as quiz" ng-show="quiz.quizMetrics.quizActive" >
        <div class="col-xs-12 col-sm-3 pull-right">

                <div class="col-xs-12">
                    <h2>Reviews:</h2>
                    <div class="btn-toolbar">
                        <!-- ng-repeat to loop throuh all questions and display the button markup for each -->
		                <!-- ng-class conditionally displaying bootstrap classes when a question has been answered or not -->
		                <!-- ng-click to call method setActiveQuestion to move to selected question -->
		                <!-- the $index argument is an angular variable that contains the index of the current ng-repeat iteration -->
                        <button class="btn"
                            ng-repeat="question in quiz.dataService.quizQuestions"
                            ng-class="{'btn-info': question.selected !== null, 'btn-danger': question.selected === null}" 
                            ng-click="quiz.setActiveQuestion($index)">
	                        <!-- display glyphicons -->
	                        <!-- ng-class to style glypicons -->
	                        <span class="title"> {{ $index + 1 }} </span>
                            <span class="glyphicon"
                                ng-class="{'glyphicon-ok': question.selected !== null, 'glyphicon-remove': question.selected === null}"></span>
                        </button>
                    </div>
                </div>
                <div class="col-xs-12">
                        <h4>Note:</h4>
                        <div class="col-sm-4">
                            <button class="btn btn-info">
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                            <p>Answered</p>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            <p>Unanswered</p>
                        </div>
                </div><!-- progress area -->
        </div>
        
        <div class="col-xs-12 col-sm-9 pull-left">
            <div class="row">
                <div class="alert alert-danger"
                    ng-show="quiz.error">
                    Error! You have not answered all of the questions!
                    <button class="close" ng-click="quiz.error = false">&times</button>
                </div>
                <div class="timer" id="QuizTimer">Time: <span>00:00:00</span></div>
                <h3>Question {{quiz.activeQuestion+1}}:</h3>
                <div class="well well-sm" ng-hide="quiz.finalise">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- angular {{}} notation for expressions to be evaluated -->
		                    <!-- adds 1 to activeQuestion as it is zero index. Then displays the question -->
		                    <!-- will be in the form of "3. this is the third question" -->
		                    <!-- where the 3. is the incremented activeQuestion -->
                            <h4 ng-bind-html="quiz.activeQuestion + 1 + '. ' + quiz.dataService.quizQuestions[quiz.activeQuestion].text">{{quiz.activeQuestion+1 + ". " + quiz.dataService.quizQuestions[quiz.activeQuestion].text}}</h4>
                            <!-- ng-if will only render the below markup when true. Unlike ng-show or ng-hide which -->
		                    <!-- simply doesnt show the markup, but it is still rendered in the source. -->
		                    <!-- ng-if will not even render the markup -->
		                    <!-- this is done in the below two sections to aviod a url being displayed as a question -->
		                    <!-- or text being entered as an image url and causing issues -->
                            <div class="row"
                                ng-if="quiz.dataService.quizQuestions[quiz.activeQuestion].type === 'text'">
                                <div class="col-sm-6" ng-repeat="answer in quiz.dataService.quizQuestions[quiz.activeQuestion].possibilities">
                                    <h4 class="answer"
                                        ng-class="{'bg-info': $index === quiz.dataService.quizQuestions[quiz.activeQuestion].selected}"
                                        ng-click="quiz.selectAnswer($index)">
                                        <p ng-bind-html="answer.answer">{{answer.answer}}</p>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ng-click will call the questionAnswered method on the controller -->
                    <button class="btn btn-warning" ng-click="quiz.setActiveQuestion(quiz.activeQuestion-1)">Prev</button>
                    <button class="btn btn-warning" ng-click="quiz.setActiveQuestion(quiz.activeQuestion+1)">Next</button>
                    <button class="btn btn-primary" ng-click="quiz.submitQuiz()">Submit Quiz</button>
                </div>

				<!-- this section is the prompt to be show when the user finishes the quiz to ensure they want to continue -->
		        <!-- it only shows when the finalise flag is true -->
		        <!-- clicking yes will call the finaliseAnswers method which will send the user to the results page -->
		        <!-- clicking no will remove the finalise flag and this put the user back into the quiz interface -->
                <div class="well well-sm" ng-show="quiz.finalise">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Are you sure you want to submit your answers?</h3>
                            <button class="btn btn-success" ng-click="quiz.finaliseAnswers()">Yes</button>
                            <button class="btn btn-danger" ng-click="quiz.finalise = false">No</button>
                        </div>
                    </div>
                </div>

                
            </div><!-- question row -->
        </div>
            
            
        </div><!-- quiz controller -->

		<!-- letting angular know which controller to use for this view and when to show the view using ng-show -->
        <div ng-controller="resultsCtrl as results" ng-show="results.quizMetrics.resultsActive">
           <div class="row">
               <div class="col-xs-8">
                   <h2>Results:</h2>
                   <div class="btn-toolbar">
                    	<!-- ng-repeat used again to loop through the possible answers to thequestions which are stored on -->
		                <!-- the controller. The controller got that data from the quiz factory in js/factory/quiz.js -->

		                <!-- ng-class is another angular directive. This directive will add a class to the element based  -->
		                <!-- on the conditional it is provided. In this case it will add btn-sucess class if question.correct -->
		                <!-- is true and will add btn-danger class if question.correct is false -->

		                <!-- ng-click is again used to trigger a method on the controller called setActiveQuestion -->
		                <!-- the method is passed the $index as an argument. $index is built into angular and holds -->
		                <!-- the current index of the ng-repeat loop -->
                       <button class="btn"
                           ng-repeat="question in results.dataService.quizQuestions"
                           ng-class="{'btn-success': question.correct, 'btn-danger': !question.correct}">
                            <!-- display glyphicons -->
                        	<!-- ng-class is utilsed again to style the glyphicons conditionally -->
                        	<span class="title">{{$index+1}}</span>
                            <span class="glyphicon"
                                ng-class="{'glyphicon-ok': question.correct, 'glyphicon-remove': !question.correct}"></span>
                       </button>
                   </div>
               </div>
               <div class="col-xs-4">
                   <div class="row">
                       <h4>Note:</h4>
                       <div class="col-sm-4">
                           <button class="btn btn-success">
                               <span class="glyphicon glyphicon-ok"></span>
                           </button>
                           <p>Correct</p>
                       </div>
                       <div class="col-sm-4">
                           <button class="btn btn-danger">
                               <span class="glyphicon glyphicon-remove"></span>
                           </button>
                           <p>Incorrect</p>
                       </div>
                   </div>
               </div>
           </div><!-- row -->

			<!-- display the score and percentage to the user -->
           <div class="row">
               <div class="col-xs-12 top-buffer">
               		<!-- the score is displayed using simple angular expressions -->
                    <!-- the percentage is calculated using a method which is then filtered using the number filter -->
                    <h2 class="result-msg">Total Questions: <span>{{results.dataService.quizQuestions.length}}</span></h2>
                    <h2 class="result-msg">You Answered Questions: <span>{{results.getquestionAnswered()}}</span></h2>
                    <h2 class="result-msg">Correct Answered: <span>{{results.quizMetrics.numCorrect}}</span></h2>
                    <h2 class="result-msg">Wrong Answered: <span>{{results.getwrongAnswered()}}</span></h2>
                    <h2 class="result-msg">Not Answered: <span>{{results.getUnanswered()}}</span></h2>
            		<!-- which ensures only 2 decimal places will be shown -->
                    <h2 class="result-msg">Your Percentage: <span>{{results.calculatePerc() | number:2}}%</span></h2>
               </div>
           </div>
           
           <div class="row">
               <div class="all-results" ng-repeat="question in results.dataService.quizQuestions" ng-init="parentIndex = $index">
               <h3>Questions {{$index+1}}: <span class="user-selected alert alert-success" ng-show="results.dataService.quizQuestions[$index].selected !=='' && results.dataService.quizQuestions[$index].selected !== null && results.dataService.quizQuestions[$index].selected !== undefined">Answered</span></h3>
               <div class="well well-sm">
                   <div class="row">
                       <div class="col-xs-12">
		                    <!-- the below may look strange. -->
		                    <!-- the angular expression will add 1 to the active question, because it is 0 index -->
		                    <!-- it then displays it with a . after it followed by the question. -->
		                    <!-- something like this "3. This is the third question:" -->
                           <h4 ng-bind-html="$index + 1 +'. '+question.text">{{$index+1 +". "+question.text}}</h4>
                           <div class="row"
                               ng-if="question.type === 'text'">
                               <!-- ng-repeat being utilised again -->
                               <div class="col-sm-6" ng-repeat="answer in question.possibilities">
                                   <h4 class="answer"
                                       ng-class="{'bg-success':$index === results.quizMetrics.correctAnswers[parentIndex], 'bg-danger': $index !== results.quizMetrics.correctAnswers[parentIndex] && $index === results.dataService.quizQuestions[parentIndex].selected}">
                                       <div ng-bind-html="answer.answer">{{answer.answer}}</div>
                                       <!-- more usage of the ng-show directive to selectively show the elements on condition -->
                                       <p class="pull-right Your-Answer"
                                            ng-show="$index !== results.quizMetrics.correctAnswers[parentIndex] && $index === results.dataService.quizQuestions[parentIndex].selected">Your Answer</p>
                                       <p class="pull-right Correct-Answer"
                                            ng-show="$index === results.quizMetrics.correctAnswers[parentIndex]">Correct Answer</p>
                                   </h4>
                               </div>
                           </div>
                           <div class="description">
                               <h3>Description:</h3>
                               <p ng-bind-html="results.dataService.quizQuestionsDescription[parentIndex]">{{results.dataService.quizQuestionsDescription[parentIndex]}}</p>
                           </div>
                           </div>
                       </div><!-- row -->
                   </div>
               </div><!-- well -->
				<!-- ng-click calling the reset method on the controller -->
               <a href="<?php echo base_url(); ?>daily-quiz" class="btn btn-primary btn-lg">Go Back To Quiz</a>
           </div>
        </div>
    </div>
</section>

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
	
	  <?php include("common/footer.php"); ?>
    <script src="<?php echo base_url(); ?>assets/js/controllers/list.js?<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/controllers/quiz.js?<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/controllers/results.js?<?php echo time(); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/factories/quizMetrics.js?<?php echo time(); ?>"></script>
    <script>
        (function(){
                angular.module("iasShiksha").factory("DataService", DataService);
                var correctAnswers = [];
                var quizQuestions = [];
                var quizQuestionsDescription = [];
                var userQuizResult = [];
                var quizQuestionsID = [];
                var quizDate = '';
                var usertimetakken=1;
                var userlogged=false;
                var quiz_user_details_name = '<?php if(isset($this->session->userdata['quiz_user_details'])){ echo $this->session->userdata['quiz_user_details']['name'];}
                else{ echo ""; } ?>';
                var quiz_user_details_email = '<?php if(isset($this->session->userdata['quiz_user_details'])){ echo $this->session->userdata['quiz_user_details']['email'];}
                else{ echo ""; } ?>';
                var quiz_user_details_mobile = '<?php if(isset($this->session->userdata['quiz_user_details'])){ echo $this->session->userdata['quiz_user_details']['mobile'];}
                else{ echo ""; } ?>';
                
                userlogged = <?php if(isset($this->session->userdata['logged_in'])){ echo "true";}else if(isset($this->session->userdata['quiz_user_details'])){ echo "true"; }else{echo "false"; } ?>;
                var userlogged_id='';
                userlogged_id = "<?php if(isset($this->session->userdata['logged_in'])){ echo $this->session->userdata['logged_in']['id'];}else{echo '1'; } ?>";
                userQuizResult['userlogged_id'] = userlogged_id;
                <?php
                foreach($today_quiz_data as $key=>$value){ ?>
                var arrQue ={type:"text",
                    text:"<?php echo preg_replace('/\s+/', ' ',$value['question_title']); ?>",
                possibilities:[{answer:"1. <?php echo preg_replace('/\s+/', ' ',$value['option1']); ?>"},
                {answer:"2. <?php echo preg_replace('/\s+/', ' ',$value['option2']); ?>"},
                {answer:"3. <?php echo preg_replace('/\s+/', ' ',$value['option3']); ?>"},
                {answer:"4. <?php echo preg_replace('/\s+/', ' ',$value['option4']); ?>"}],
                selected: null,correct: null};
                    quizQuestions.push(arrQue);
                    correctAnswers.push(<?php echo $value['correct_answer'] - 1; ?>);
                    quizQuestionsDescription.push("<?php echo preg_replace('/\s+/', ' ',$value['answer_description']); ?>");
                    quizQuestionsID.push(<?php echo $value['id']; ?>);
                    quizDate = '<?php echo $value['date']; ?>';
                <?php } ?>
                
                userQuizResult['question_id'] = quizQuestionsID;
                userQuizResult['correctAnswers'] = correctAnswers;
                userQuizResult['quizDate']= quizDate;
                
                function DataService($http,$filter){
                    var dataObj = {
                        quizQuestions: quizQuestions,
                        correctAnswers: correctAnswers,
                        quizQuestionsDescription: quizQuestionsDescription,
                        userlogged: userlogged,
                        userlogged_id: userlogged_id,
                        usertimetakken: usertimetakken,
                        userQuizResult: userQuizResult,
                        ajaxcall: ajaxcall
                    };
                    
                    function ajaxcall(){
                        console.log(userQuizResult);
                        $http({
                            method: 'POST',
                            url: "<?php echo base_url(); ?>submit_quiz",
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                            data: { userlogged_id: userQuizResult['userlogged_id'],TotalQuestion: userQuizResult['TotalQuestion'],calculatePerc: userQuizResult['calculatePerc'],
                            numCorrect: userQuizResult['numCorrect'],questionAnswered: userQuizResult['questionAnswered'],marks: userQuizResult['marks'],
                            wrongAnswered: userQuizResult['wrongAnswered'],Selected_Questions: userQuizResult['Selected_Questions'],question_id: userQuizResult['question_id'],
                            Selected_Answers: userQuizResult['Selected_Answers'],correctAnswers: userQuizResult['correctAnswers'],quizDate: userQuizResult['quizDate'],
                            name:quiz_user_details_name,email:quiz_user_details_email,mobile:quiz_user_details_mobile
                            }
                        })
                        .success(function (data, status, headers, config){
                            console.log(data);
                            })
                        .error(function (data, status, headers, config) { console.log(data); });
                        return true;
                    }
                    
                    return dataObj;
                }
            })();
    </script>
    <script >
var timer =0, timerInterval;
    function startTimer(duration) {
    display = $('#QuizTimer span');
    timer = duration;
    var minutes, seconds,hours;
    timerInterval = setInterval(function () {
        
        if(timer < 7200){
        if (++timer < 0) {
            timer = duration;
        }
        }else{
            //angular.element(document.getElementById('quizCtrl')).scope().QuizController();
            //angular.injector(['ng', 'iasShiksha']).invoke(function (quizMetrics){});
        }
        
        seconds = Math.floor((timer) % 60);
  		minutes = Math.floor((timer / 60) % 60);
      	hours = Math.floor((timer / (60 * 60)) % 24);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        hours = hours < 10 ? "0" + hours : hours;
        display.text(hours + ":" + minutes + ":" + seconds);
    }, 1000);
}
function GetTimer() {
    return timer;
}
function ClearIntervalTimer() {
   clearInterval(timerInterval)
}
jQuery(function ($) {
    var fiveMinutes = 0;
    //startTimer(fiveMinutes);
});

var userlogged = <?php if(isset($this->session->userdata['logged_in'])){ echo "true";}else if(isset($this->session->userdata['quiz_user_details'])){ echo "true"; }else{echo "false"; } ?>;
function checkUserDetails(){
        if(userlogged || userlogged == 'true'){
                return true;
        }else{
            $('#view_start_details').modal('show');
            return false;
        }
}
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
                                location.reload();
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
<script >
$(document).ready(function() {
$("#start_quiz_content").fadeIn();
});
</script>
   </body>
</html>