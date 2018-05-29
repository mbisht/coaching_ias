<?php
if(isset($_GET['id'])){
$edit_requested_id=$_GET['id'];
}else{
    header("Location: view-quiz-questions");
}

if(isset($_POST['cus_add_new_user'])){
		$date = trim($_POST['date']);
		$question_title = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['question_title']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option1 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option1']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$correct_answer = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['correct_answer']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$answer_description = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['answer_description']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		
		try{
		if(empty($date) || empty($question_title) || empty($option1) || empty($option2) || empty($correct_answer) || empty($answer_description)){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{

		    $stmt = $reg_user->runQuery("UPDATE quiz_questions SET date='$date',question_title='$question_title',option1='$option1',option2='$option2',option3='$option3',
		    option4='$option4',correct_answer='$correct_answer',answer_description='$answer_description' WHERE id='$edit_requested_id'");
            $stmt->execute();
            $new_user_id = $reg_user->lasdID();
            
    		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Quiz Question!</strong> Updated Successfully.</div>";
    		header("Location: edit-quiz-question?id=".$edit_requested_id);
    		exit();
		}
		}catch(PDOException $ex){
			$_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>".$ex->getMessage()."</div>";
		}
}
include 'include/header.php';
$edit_requested_query = $reg_user->runQuery("SELECT * FROM quiz_questions WHERE id='$edit_requested_id'");
$edit_requested_query->execute();
$edit_requested_details = $edit_requested_query->fetch(PDO::FETCH_ASSOC);
?>
<div class="site-content">
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>Edit Quiz Questions</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-quiz-questions">View Quiz Questions</a></li>
							<li class="breadcrumb-item active"><a href="#">Edit Quiz Questions</a></li>
						</ol>
						<div class="box box-block bg-white">
						    
						    <div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form class="form-horizontal" method="post" name="edit_ad" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
									    <label><b>Date*</b></label>
										<input type="text" id="Broadband-date-container" placeholder="Date" name="date" value="<?php echo $edit_requested_details['date']; ?>" class="form-control" required>
									</div>
									
									<div class="form-group">
										<label><b>Question Title*</b></label>
										<div class="input-group">
										    <textarea name="question_title" rows="4" class="form-control" placeholder="Question Title" required><?php echo str_replace(array("<br>","<br />","<br >","<br/>"),PHP_EOL,$edit_requested_details['question_title']); ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 1*</b></label>
										<div class="input-group">
										    <textarea name="option1" rows="4" class="form-control" placeholder="Option 1" required><?php echo str_replace(array("<br>","<br />","<br >","<br/>"),PHP_EOL,$edit_requested_details['option1']); ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 3*</b></label>
										<div class="input-group">
										    <textarea name="option3" rows="4" class="form-control" placeholder="Option 3" required><?php echo str_replace(array("<br>","<br />","<br >","<br/>"),PHP_EOL,$edit_requested_details['option3']); ?></textarea>
										</div>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label><b>Correct Answer*</b></label>
										<input type="number" placeholder="Correct Answer" name="correct_answer" class="form-control" value="<?php echo $edit_requested_details['correct_answer']; ?>" required>
									</div>
									<div class="form-group">
									    <label><b>Answer Description*</b></label>
									    <textarea name="answer_description" rows="4" class="form-control" placeholder="Answer Description" required><?php echo str_replace(array("<br>","<br />","<br >","<br/>"),PHP_EOL,$edit_requested_details['answer_description']); ?></textarea>
									</div>

									<div class="form-group">
									    <label><b>Option 2*</b></label>
									    <textarea name="option2" rows="4" class="form-control" placeholder="Option 2" required><?php echo str_replace(array("<br>","<br />","<br >","<br/>"),PHP_EOL,$edit_requested_details['option2']); ?></textarea>
									</div>
									
									<div class="form-group">
									    <label><b>Option 4*</b></label>
									    <textarea name="option4" rows="4" class="form-control" placeholder="Option 4" required><?php echo str_replace(array("<br>","<br />","<br >","<br/>"),PHP_EOL,$edit_requested_details['option4']); ?></textarea>
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="pull-left">
									<input type="submit" class="btn btn-primary" value="Update Quiz Question" name="cus_add_new_user">
									</div>
									</div>
						</div>
							</form>
							</div>
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
		<script type="text/javascript">
		$('#Broadband-date-container').datepicker({format: 'yyyy-mm-dd'});
        </script>
		</body>
		</html>