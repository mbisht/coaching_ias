<?php
if(isset($_POST['cus_add_new_user'])){
    try{
		$question_set = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['question_set']))));
		$subjects = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['subjects']))));
		$question_title = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['question_title']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option1 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option1']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$correct_answer = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['correct_answer']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$answer_description = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['answer_description']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		
		if(empty($question_set) || empty($subjects) || empty($question_title) || empty($option1) || empty($option2) || empty($correct_answer) || empty($answer_description)){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
		    
		    $question_title_2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['question_title_2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option1_2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option1_2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option2_2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option2_2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option3_2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option3_2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option4_2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option4_2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$correct_answer_2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['correct_answer_2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$answer_description_2 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['answer_description_2']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		
		if(!empty($question_title_2) && (empty($option1_2) || empty($option2_2) || empty($correct_answer_2) || empty($answer_description_2))){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds in Question 2!</div>";
		}else{
		    
		    $question_title_3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['question_title_3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option1_3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option1_3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option2_3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option2_3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option3_3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option3_3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option4_3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option4_3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$correct_answer_3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['correct_answer_3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$answer_description_3 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['answer_description_3']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		
		if(!empty($question_title_3) && (empty($option1_3) || empty($option2_3) || empty($correct_answer_3) || empty($answer_description_3))){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds in Question 3!</div>";
		}else{
		    
		$question_title_4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['question_title_4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option1_4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option1_4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option2_4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option2_4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option3_4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option3_4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option4_4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option4_4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$correct_answer_4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['correct_answer_4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$answer_description_4 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['answer_description_4']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		
		if(!empty($question_title_4) && (empty($option1_4) || empty($option2_4) || empty($correct_answer_4) || empty($answer_description_4))){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds in Question 4!</div>";
		}else{
		
		$question_title_5 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['question_title_5']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option1_5 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option1_5']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option2_5 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option2_5']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option3_5 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option3_5']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$option4_5 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['option4_5']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$correct_answer_5 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['correct_answer_5']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		$answer_description_5 = preg_replace('/\s+/', ' ',nl2br(htmlentities(trim($_POST['answer_description_5']),ENT_QUOTES|ENT_HTML401|ENT_SUBSTITUTE|ENT_HTML5,"UTF-8",FALSE)));
		
		if(!empty($question_title_5) && (empty($option1_5) || empty($option2_5) || empty($correct_answer_5) || empty($answer_description_5))){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds in Question 5!</div>";
		}else{
            
            $_SESSION['test_set_no'] = $question_set;
            $_SESSION['subjects'] = $subjects;
            
            $stmt_check = $reg_user->runQuery("SELECT * FROM online_test_prelims_question_set WHERE question_set='$question_set'");
            $stmt_check->execute();
            if($stmt_check->rowCount() == 0){
                $stmt = $reg_user->runQuery("INSERT INTO online_test_prelims_question_set(question_set,subject_id,status) 
		        VALUES('$question_set','$subjects','1')");
                $stmt->execute();
            }
            
		    $stmt = $reg_user->runQuery("INSERT INTO online_test_questions_prelims(question_type,subject_id,question_title,option1,option2,option3,option4,correct_answer,answer_description) 
		    VALUES('$question_set','$subjects','$question_title','$option1','$option2','$option3','$option4','$correct_answer','$answer_description')");
            $stmt->execute();
            $new_user_id = $reg_user->lasdID();
            
            if(!empty($question_title_2)){
            $_SESSION['quiz_date'] = $date;
		    $stmt = $reg_user->runQuery("INSERT INTO online_test_questions_prelims(question_type,subject_id,question_title,option1,option2,option3,option4,correct_answer,answer_description) 
		    VALUES('$question_set','$subjects','$question_title_2','$option1_2','$option2_2','$option3_2','$option4_2','$correct_answer_2','$answer_description_2')");
            $stmt->execute();
            }
            
            if(!empty($question_title_3)){
            $_SESSION['quiz_date'] = $date;
		    $stmt = $reg_user->runQuery("INSERT INTO online_test_questions_prelims(question_type,subject_id,question_title,option1,option2,option3,option4,correct_answer,answer_description) 
		    VALUES('$question_set','$subjects','$question_title_3','$option1_3','$option2_3','$option3_3','$option4_3','$correct_answer_3','$answer_description_3')");
            $stmt->execute();
            }
            
            if(!empty($question_title_4)){
            $_SESSION['quiz_date'] = $date;
		    $stmt = $reg_user->runQuery("INSERT INTO online_test_questions_prelims(question_type,subject_id,question_title,option1,option2,option3,option4,correct_answer,answer_description) 
		    VALUES('$question_set','$subjects','$question_title_4','$option1_4','$option2_4','$option3_4','$option4_4','$correct_answer_4','$answer_description_4')");
            $stmt->execute();
            }
            
            if(!empty($question_title_5)){
            $_SESSION['quiz_date'] = $date;
		    $stmt = $reg_user->runQuery("INSERT INTO online_test_questions_prelims(question_type,subject_id,question_title,option1,option2,option3,option4,correct_answer,answer_description) 
		    VALUES('$question_set','$subjects','$question_title_5','$option1_5','$option2_5','$option3_5','$option4_5','$correct_answer_5','$answer_description_5')");
            $stmt->execute();
            }
            
    		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>New Prelims Question!</strong> Added Successfully.</div>";
    		header("Location: add-prelims-questions");
    		exit();
		} } } }
		}
		}catch(PDOException $ex){
			$_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>".$ex->getMessage()."</div>";
		}
}
include 'include/header.php';
?>
<div class="site-content">
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>Add New Prelims Questions</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-prelims-questions">View Prelims Questions</a></li>
							<li class="breadcrumb-item active"><a href="#">Add New Prelims Questions</a></li>
						</ol>
						<div class="box box-block bg-white">
						    
						    <div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form class="form-horizontal" method="post" name="edit_ad" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
									    <label><b>Question Set Number*</b></label>
										<input type="number" id="question_set" placeholder="Question Set Number" name="question_set" value="<?php if(isset($_POST['question_set'])){ echo $_POST['question_set']; }else if(isset($_SESSION['test_set_no'])){ echo $_SESSION['test_set_no'];} ?>" class="form-control" required>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
									    <label><b>Subjects*</b></label>
										<select name="subjects" class="form-control" required>
										<?php
                                				$stmt = $reg_user->runQuery("SELECT * FROM online_test_subjects ORDER BY title ASC");
                                				$stmt->execute();
                                				for($i=0; $stmt1 = $stmt->fetchObject(); $i++){ ?>
                                				<option <?php if(isset($_POST['subjects']) && $_POST['subjects'] == $stmt1->id){ echo "selected"; }else if(isset($_SESSION['subjects']) && $_SESSION['subjects'] == $stmt1->id ){ echo "selected"; } ?> value="<?php echo $stmt1->id; ?>"><?php echo $stmt1->title; ?></option>
                                	    <?php } ?>
                                			</select>
                                	</div>
                                	</div>
                                	</div>
									
									<div class="row">
									    <div class="col-md-12">
									    <h4>Question 1*</h4>
									    </div>
									<div class="col-md-6">
									<div class="form-group">
										<label><b>Question Title*</b></label>
										<div class="input-group">
										    <textarea name="question_title" rows="4" class="form-control" placeholder="Question Title" required><?php if(isset($_POST['question_title'])){ echo $_POST['question_title']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 1*</b></label>
										<div class="input-group">
										    <textarea name="option1" rows="4" class="form-control" placeholder="Option 1" required><?php if(isset($_POST['option1'])){ echo $_POST['option1']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 3</b></label>
										<div class="input-group">
										    <textarea name="option3" rows="4" class="form-control" placeholder="Option 3" required><?php if(isset($_POST['option3'])){ echo $_POST['option3']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Correct Answer*</b></label>
										<input type="number" placeholder="Correct Answer" name="correct_answer" class="form-control" value="<?php if(isset($_POST['correct_answer'])){ echo $_POST['correct_answer']; } ?>" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label><b>Answer Description*</b></label>
									    <textarea name="answer_description" rows="4" class="form-control" placeholder="Answer Description" required><?php if(isset($_POST['answer_description'])){ echo $_POST['answer_description']; } ?></textarea>
									</div>
									<div class="form-group">
									    <label><b>Option 2*</b></label>
									    <textarea name="option2" rows="4" class="form-control" placeholder="Option 2" required><?php if(isset($_POST['option2'])){ echo $_POST['option2']; } ?></textarea>
									</div>
									<div class="form-group">
									    <label><b>Option 4</b></label>
									    <textarea name="option4" rows="4" class="form-control" placeholder="Option 4" required><?php if(isset($_POST['option4'])){ echo $_POST['option4']; } ?></textarea>
									</div>
									</div>
								</div>
								<br>
								<div class="row">
									    <div class="col-md-12">
									    <h4>Question 2</h4>
									    </div>
									<div class="col-md-6">
									<div class="form-group">
										<label><b>Question Title</b></label>
										<div class="input-group">
										    <textarea name="question_title_2" rows="4" class="form-control" placeholder="Question Title" ><?php if(isset($_POST['question_title_2'])){ echo $_POST['question_title_2']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 1</b></label>
										<div class="input-group">
										    <textarea name="option1_2" rows="4" class="form-control" placeholder="Option 1" ><?php if(isset($_POST['option1_2'])){ echo $_POST['option1_2']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 3</b></label>
										<div class="input-group">
										    <textarea name="option3_2" rows="4" class="form-control" placeholder="Option 3" ><?php if(isset($_POST['option3_2'])){ echo $_POST['option3_2']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Correct Answer</b></label>
										<input type="number" placeholder="Correct Answer" name="correct_answer_2" class="form-control" value="<?php if(isset($_POST['correct_answer_2'])){ echo $_POST['correct_answer_2']; } ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label><b>Answer Description</b></label>
									    <textarea name="answer_description_2" rows="4" class="form-control" placeholder="Answer Description"><?php if(isset($_POST['answer_description_2'])){ echo $_POST['answer_description_2']; } ?></textarea>
									</div>
									<div class="form-group">
									    <label><b>Option 2</b></label>
									    <textarea name="option2_2" rows="4" class="form-control" placeholder="Option 2"><?php if(isset($_POST['option2_2'])){ echo $_POST['option2_2']; } ?></textarea>
									</div>
									<div class="form-group">
									    <label><b>Option 4</b></label>
									    <textarea name="option4_2" rows="4" class="form-control" placeholder="Option 4"><?php if(isset($_POST['option4_2'])){ echo $_POST['option4_2']; } ?></textarea>
									</div>
								</div>
						</div>
						
						<br>
						<div class="row">
									    <div class="col-md-12">
									    <h4>Question 3</h4>
									    </div>
									<div class="col-md-6">
									<div class="form-group">
										<label><b>Question Title</b></label>
										<div class="input-group">
										    <textarea name="question_title_3" rows="4" class="form-control" placeholder="Question Title" ><?php if(isset($_POST['question_title_3'])){ echo $_POST['question_title_3']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 1</b></label>
										<div class="input-group">
										    <textarea name="option1_3" rows="4" class="form-control" placeholder="Option 1" ><?php if(isset($_POST['option1_3'])){ echo $_POST['option1_3']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 3</b></label>
										<div class="input-group">
										    <textarea name="option3_3" rows="4" class="form-control" placeholder="Option 3" ><?php if(isset($_POST['option3_3'])){ echo $_POST['option3_3']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Correct Answer</b></label>
										<input type="number" placeholder="Correct Answer" name="correct_answer_3" class="form-control" value="<?php if(isset($_POST['correct_answer_3'])){ echo $_POST['correct_answer_3']; } ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label><b>Answer Description</b></label>
									    <textarea name="answer_description_3" rows="4" class="form-control" placeholder="Answer Description"><?php if(isset($_POST['answer_description_3'])){ echo $_POST['answer_description_3']; } ?></textarea>
									</div>
									<div class="form-group">
									    <label><b>Option 2</b></label>
									    <textarea name="option2_3" rows="4" class="form-control" placeholder="Option 2"><?php if(isset($_POST['option2_3'])){ echo $_POST['option2_3']; } ?></textarea>
									</div>
									<div class="form-group">
									    <label><b>Option 4</b></label>
									    <textarea name="option4_3" rows="4" class="form-control" placeholder="Option 4"><?php if(isset($_POST['option4_3'])){ echo $_POST['option4_3']; } ?></textarea>
									</div>
								</div>
						</div>
						<br>
								<div class="row">
									    <div class="col-md-12">
									    <h4>Question 4</h4>
									    </div>
									<div class="col-md-6">
									<div class="form-group">
										<label><b>Question Title</b></label>
										<div class="input-group">
										    <textarea name="question_title_4" rows="4" class="form-control" placeholder="Question Title" ><?php if(isset($_POST['question_title_4'])){ echo $_POST['question_title_4']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 1</b></label>
										<div class="input-group">
										    <textarea name="option1_4" rows="4" class="form-control" placeholder="Option 1" ><?php if(isset($_POST['option1_4'])){ echo $_POST['option1_4']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 3</b></label>
										<div class="input-group">
										    <textarea name="option3_4" rows="4" class="form-control" placeholder="Option 3" ><?php if(isset($_POST['option3_4'])){ echo $_POST['option3_4']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Correct Answer</b></label>
										<input type="number" placeholder="Correct Answer" name="correct_answer_4" class="form-control" value="<?php if(isset($_POST['correct_answer_4'])){ echo $_POST['correct_answer_4']; } ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label><b>Answer Description</b></label>
									    <textarea name="answer_description_4" rows="4" class="form-control" placeholder="Answer Description"><?php if(isset($_POST['answer_description_4'])){ echo $_POST['answer_description_4']; } ?></textarea>
									</div>
									<div class="form-group">
									    <label><b>Option 2</b></label>
									    <textarea name="option2_4" rows="4" class="form-control" placeholder="Option 2"><?php if(isset($_POST['option2_4'])){ echo $_POST['option2_4']; } ?></textarea>
									</div>
									
									<div class="form-group">
									    <label><b>Option 4</b></label>
									    <textarea name="option4_4" rows="4" class="form-control" placeholder="Option 4"><?php if(isset($_POST['option4_4'])){ echo $_POST['option4_4']; } ?></textarea>
									</div>
								</div>
						</div>
						
						<br>
						<div class="row">
									    <div class="col-md-12">
									    <h4>Question 5</h4>
									    </div>
									<div class="col-md-6">
									<div class="form-group">
										<label><b>Question Title</b></label>
										<div class="input-group">
										    <textarea name="question_title_5" rows="4" class="form-control" placeholder="Question Title" ><?php if(isset($_POST['question_title_5'])){ echo $_POST['question_title_5']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 1</b></label>
										<div class="input-group">
										    <textarea name="option1_5" rows="4" class="form-control" placeholder="Option 1" ><?php if(isset($_POST['option1_5'])){ echo $_POST['option1_5']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Option 3</b></label>
										<div class="input-group">
										    <textarea name="option3_5" rows="4" class="form-control" placeholder="Option 3" ><?php if(isset($_POST['option3_5'])){ echo $_POST['option3_5']; } ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label><b>Correct Answer</b></label>
										<input type="number" placeholder="Correct Answer" name="correct_answer_5" class="form-control" value="<?php if(isset($_POST['correct_answer_5'])){ echo $_POST['correct_answer_5']; } ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label><b>Answer Description</b></label>
									    <textarea name="answer_description_5" rows="4" class="form-control" placeholder="Answer Description"><?php if(isset($_POST['answer_description_5'])){ echo $_POST['answer_description_5']; } ?></textarea>
									</div>

									<div class="form-group">
									    <label><b>Option 2</b></label>
									    <textarea name="option2_5" rows="4" class="form-control" placeholder="Option 2"><?php if(isset($_POST['option2_5'])){ echo $_POST['option2_5']; } ?></textarea>
									</div>
									
									<div class="form-group">
									    <label><b>Option 4</b></label>
									    <textarea name="option4_5" rows="4" class="form-control" placeholder="Option 4"><?php if(isset($_POST['option4_5'])){ echo $_POST['option4_5']; } ?></textarea>
									</div>
								</div>
						</div>
								
							<div class="row">
								<div class="col-md-12">
									<div class="pull-left">
									<input type="submit" class="btn btn-primary" value="Add Prelims Question(s)" name="cus_add_new_user">
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