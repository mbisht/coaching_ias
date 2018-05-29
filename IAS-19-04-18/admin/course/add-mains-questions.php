<?php
if(isset($_POST['cus_add_new_user'])){
    try{
		$question_title = htmlentities(trim($_POST['question_title']));
		$subjects = trim($_POST['subjects']);
		$file_url = trim($_POST['file_url']);
		
		if(empty($question_title) || empty($subjects) || $_FILES["result_file"]["size"]<1){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
		    
		    $target_dir = "../assets/files/mains/";
            $target_file = $target_dir . basename($_FILES["result_file"]["name"]);
            $uploadOk = 1;
            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($FileType == 'pdf'){
                    $file_name = time().".".$FileType;
                    $target_file_new = $target_dir . $file_name;
                    if (move_uploaded_file($_FILES["result_file"]["tmp_name"], $target_file_new)){
                        
                        $stmt = $reg_user->runQuery("INSERT INTO online_test_mains(title,subject,file_url) 
            		    VALUES('$question_title','$subjects','$file_name')");
                        $stmt->execute();
                        $new_user_id = $reg_user->lasdID();
                        
                		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>New Mains Test!</strong> Added Successfully.</div>";
                		header("Location: add-mains-questions");
                		exit();
                    } else {
                        $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Sorry, there was an error uploading your file.</div>";
                    }
                    
                }else {
                    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Selected file is not a pdf file.</div>";
                }
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
						<h4>Add New Mains Test</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-mains-questions">View Mains Test</a></li>
							<li class="breadcrumb-item active"><a href="#">Add New Mains Test</a></li>
						</ol>
						<div class="box box-block bg-white">
						    
						    <div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form class="form-horizontal" method="post" name="edit_ad" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
									    <label><b>Title*</b></label>
										<input type="text" id="question_title" placeholder="Title" name="question_title" value="<?php if(isset($_POST['question_title'])){ echo $_POST['question_title']; } ?>" class="form-control" required>
									</div>
									<div class="form-group">
									<label for="exampleInputFile"><b>File* (pdf)</b></label>
									<input type="file" class="form-control-file" name="result_file" id="result_file" accept="application/pdf" required="required"/>
								</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
									    <label><b>Subjects*</b></label>
										<select name="subjects" class="form-control" required>
										 <option <?php if(isset($_POST['subjects']) && $_POST['subjects'] == "General Studies-I"){ echo "selected"; }else{ echo ""; } ?> value="General Studies-I">General Studies-I</option>
										 <option <?php if(isset($_POST['subjects']) && $_POST['subjects'] == "General Studies-II"){ echo "selected"; }else{ echo ""; } ?> value="General Studies-I">General Studies-II</option>
										 <option <?php if(isset($_POST['subjects']) && $_POST['subjects'] == "General Studies-III"){ echo "selected"; }else{ echo ""; } ?> value="General Studies-I">General Studies-III</option>
										 <option <?php if(isset($_POST['subjects']) && $_POST['subjects'] == "General Studies-IV"){ echo "selected"; }else{ echo ""; } ?> value="General Studies-I">General Studies-IV</option>
										 <option <?php if(isset($_POST['subjects']) && $_POST['subjects'] == "Essay"){ echo "selected"; }else{ echo ""; } ?> value="Essay">Essay</option>
                                		</select>
                                	</div>
								</div>
								
								<div class="col-md-12">
									<div class="pull-left">
									<input type="submit" class="btn btn-primary" value="Add Mains Test" name="cus_add_new_user">
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