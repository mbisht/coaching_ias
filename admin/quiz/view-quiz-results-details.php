<?php 
if(isset($_GET['id'])){
$edit_requested_id=$_GET['id'];
}else{
    header("Location: view-quiz-results");
}

include("include/header.php");
?>
<div class="site-content">
<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
		<h4>Quiz Results Details</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="view-quiz-results">View Quiz Results</a></li>
			<li class="breadcrumb-item active">View Quiz Results Details</li>
		</ol>
		<div class="box box-block bg-white content quiz">
		<?php
		$count=1;
        $stmt = $reg_user->runQuery("SELECT *, qr.id as RestID, us.id as UsrID FROM quiz_result_submission qr LEFT JOIN user us ON us.id=qr.user_id WHERE qr.id='$edit_requested_id' ORDER BY qr.date_added DESC");
        $stmt->execute();
        for($i=0; $stmt1 = $stmt->fetchObject(); $i++){ ?>
			<h2 class="ng-binding"><?php echo $stmt1->full_name ."(".$stmt1->UsrID.")";?> Quiz Results</h2>
			<div class="col-xs-12 top-buffer ">
                    <h2 class="result-msg">Total Questions: <span><?php echo $stmt1->total_questions;?></span></h2>
                    <h2 class="result-msg">User Answered Questions: <span><?php echo $stmt1->answered_questions;?></span></h2>
                    <h2 class="result-msg">Correct Answered: <span><?php echo $stmt1->corrected_answers;?></span></h2>
                    <h2 class="result-msg">Wrong Answered: <span><?php echo $stmt1->wrong_answers;?></span></h2>
                    <h2 class="result-msg">User Percentage: <span><?php echo $stmt1->percentage;?></span></h2>
                    <h2 class="result-msg">User Marks: <span><?php echo $stmt1->marks;?></span></h2>
                    <h2 class="result-msg">For Every wrong Answer: <span>-(2/3) or -(0.67)</span></h2>
               </div>
               <br />
			<?php
			$question_id = json_decode($stmt1->question_id);
			$selected_answers = json_decode($stmt1->selected_answers);
			$count = 1;
			foreach($question_id as $key=>$value){
			$stmt_result = $reg_user->runQuery("SELECT * FROM quiz_questions WHERE id='$value'");
			$stmt_result->execute();
            $stmt_result_row = $stmt_result->fetchObject();
            
            $selected_questions = false;
            if(in_array($count,json_decode($stmt1->selected_questions))){
                $selected_questions = true;
                $pos_arr = array_search($count, json_decode($stmt1->selected_questions));
            }
            ?>
            <br />
			<div class="all-results ng-scope ">
               <h3 class="title">Question <?php echo $count; ?>: <?php if($selected_questions){ echo "<span class='selected'>User Answered</span>"; }else{echo "<span class='not-selected'>User Not Answered</span>"; } ?></h3>
               <div class="well well-sm">
                   <div class="row">
                       <div class="col-xs-12">
                           <h4 class="ng-binding"><?php echo $count.". ".$stmt_result_row->question_title; ?></h4>
                           <div class="row ng-scope">
                               <div class="col-sm-6 ng-scope">
                                   <h4 class="answer <?php if($stmt_result_row->correct_answer == '1'){ echo 'bg-success'; }elseif($selected_questions && $selected_answers[$pos_arr] == '1'){echo 'bg-danger';}?>">
                                       <div class="ng-binding">1. <?php echo $stmt_result_row->option1; ?></div>
                                       <?php
                                       if($stmt_result_row->correct_answer == '1'){?>
                                       <p class="pull-right Correct-Answer">Correct Answer</p>
                                       <?php }elseif($selected_questions && $selected_answers[$pos_arr] == '1'){?>
                                       <p class="pull-right Your-Answer">User Answer</p>
                                       <?php }?>
                                   </h4>
                               </div>
                               <div class="col-sm-6 ng-scope">
                                   <h4 class="answer <?php if($stmt_result_row->correct_answer == '2'){ echo 'bg-success'; }elseif($selected_questions && $selected_answers[$pos_arr] == '2'){echo 'bg-danger';}?>">
                                       <div class="ng-binding">2. <?php echo $stmt_result_row->option2; ?></div>
                                       <?php
                                       if($stmt_result_row->correct_answer == '2'){?>
                                       <p class="pull-right Correct-Answer">Correct Answer</p>
                                       <?php }elseif($selected_questions && $selected_answers[$pos_arr] == '2'){?>
                                       <p class="pull-right Your-Answer">User Answer</p>
                                       <?php }?>
                                   </h4>
                               </div>
                               <div class="col-sm-6 ng-scope">
                                   <h4 class="answer <?php if($stmt_result_row->correct_answer == '3'){ echo 'bg-success'; }elseif($selected_questions && $selected_answers[$pos_arr] == '3'){echo 'bg-danger';}?>">
                                       <div class="ng-binding">3. <?php echo $stmt_result_row->option3; ?></div>
                                       <?php
                                       if($stmt_result_row->correct_answer == '3'){?>
                                       <p class="pull-right Correct-Answer">Correct Answer</p>
                                       <?php }elseif($selected_questions && $selected_answers[$pos_arr] == '3'){?>
                                       <p class="pull-right Your-Answer">User Answer</p>
                                       <?php }?>
                                   </h4>
                               </div>
                               <div class="col-sm-6 ng-scope">
                                   <h4 class="answer <?php if($stmt_result_row->correct_answer == '4'){ echo 'bg-success'; }elseif($selected_questions && $selected_answers[$pos_arr] == '4'){echo 'bg-danger';}?>" >
                                       <div class="ng-binding">4. <?php echo $stmt_result_row->option4; ?></div>
                                       <?php
                                       if($stmt_result_row->correct_answer == '4'){?>
                                       <p class="pull-right Correct-Answer">Correct Answer</p>
                                       <?php }elseif($selected_questions && $selected_answers[$pos_arr] == '4'){?>
                                       <p class="pull-right Your-Answer">User Answer</p>
                                       <?php }?>
                                   </h4>
                               </div>
                           </div>
                           </div>
                       </div><!-- row -->
                   </div>
               </div>
               <?php $count++; } } ?>
						
							
						
		</div>
	</div>
</div>
		<script type="text/javascript" src="vendor/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="vendor/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="vendor/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="vendor/waves/waves.min.js"></script>
		<script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="vendor/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
		<script type="text/javascript" src="vendor/autoNumeric/autoNumeric-min.js"></script>
		<script type="text/javascript" src="vendor/dropify/dist/js/dropify.min.js"></script>
		<script type="text/javascript" src="vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<script type="text/javascript" src="vendor/clockpicker/dist/jquery-clockpicker.min.js"></script>
		<script type="text/javascript" src="vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/forms-masks.js"></script>
		<script type="text/javascript" src="js/forms-upload.js"></script>
		<script type="text/javascript" src="js/forms-pickers.js"></script>
		</body>
		</html>