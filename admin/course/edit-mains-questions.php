<?php
if(isset($_GET['id'])){
$edit_requested_id=$_GET['id'];
}else{
    header("Location: view-mains-questions");
}

if(isset($_POST['cus_add_new_user'])){
    try{
		$question_title = htmlentities(trim($_POST['question_title']));
		$subjects = trim($_POST['subjects']);
		
		if(empty($question_title) || empty($subjects)){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
		    if($_FILES["result_file"]["size"]>10){
		    $target_dir = "../assets/files/mains/";
            $target_file = $target_dir . basename($_FILES["result_file"]["name"]);
            $uploadOk = 1;
            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($FileType == 'pdf'){
                    $file_name = time().".".$FileType;
                    $target_file_new = $target_dir . $file_name;
                    if (move_uploaded_file($_FILES["result_file"]["tmp_name"], $target_file_new)){
                        
                    $stmt = $reg_user->runQuery("UPDATE online_test_mains SET title='$question_title',subject='$subjects',file_url='$file_name' WHERE id='$edit_requested_id'");
                    $stmt->execute();
                    
            		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Mains Test!</strong> Updated Successfully.</div>";
            		header("Location: edit-mains-question?id=".$edit_requested_id);
            		exit();
                    } else {
                        $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Sorry, there was an error uploading your file.</div>";
                    }
                    
                }else {
                    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Selected file is not a PDF file.</div>";
                }
		    }else{
		    $stmt = $reg_user->runQuery("UPDATE online_test_mains SET title='$question_title',subject='$subjects' WHERE id='$edit_requested_id'");
            $stmt->execute();
            
    		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Mains Test!</strong> Updated Successfully.</div>";
    		header("Location: edit-mains-question?id=".$edit_requested_id);
    		exit();
		    }
		}
		}catch(PDOException $ex){
			$_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>".$ex->getMessage()."</div>";
		}
}
include 'include/header.php';
$edit_requested_query = $reg_user->runQuery("SELECT * FROM online_test_mains WHERE id='$edit_requested_id'");
$edit_requested_query->execute();
$edit_requested_details = $edit_requested_query->fetch(PDO::FETCH_ASSOC);
?>
<div class="site-content">
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>Edit Mains Test</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-mains-questions">View Mains Test</a></li>
							<li class="breadcrumb-item active"><a href="#">Edit Mains Test</a></li>
						</ol>
						<div class="box box-block bg-white">
						    
						    <div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form class="form-horizontal" method="post" name="edit_ad" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
									    <label><b>Title*</b></label>
										<input type="text" id="question_title" placeholder="Title" name="question_title" value="<?php echo $edit_requested_details['title']; ?>" class="form-control" required>
									</div>
									<div class="form-group">
									<label for="exampleInputFile"><b>File (pdf)(Optional)</b></label>
									<input type="file" class="form-control-file" name="result_file" id="result_file" accept="application/pdf" />
								    </div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
									    <label><b>Subjects*</b></label>
                                	    <select name="subjects" class="form-control" required>
										 <option <?php if($edit_requested_details['subject'] == "General Studies-I"){ echo "selected"; }else{ echo ""; } ?> value="General Studies-I">General Studies-I</option>
										 <option <?php if($edit_requested_details['subject'] == "General Studies-II"){ echo "selected"; }else{ echo ""; } ?> value="General Studies-I">General Studies-II</option>
										 <option <?php if($edit_requested_details['subject'] == "General Studies-III"){ echo "selected"; }else{ echo ""; } ?> value="General Studies-I">General Studies-III</option>
										 <option <?php if($edit_requested_details['subject'] == "General Studies-IV"){ echo "selected"; }else{ echo ""; } ?> value="General Studies-I">General Studies-IV</option>
										 <option <?php if($edit_requested_details['subject'] == "Essay"){ echo "selected"; }else{ echo ""; } ?> value="Essay">Essay</option>
                                		</select>
                                	</div>
								</div>
								
								<div class="col-md-12">
									<div class="pull-left">
									<input type="submit" class="btn btn-primary" value="Update Mains Test" name="cus_add_new_user">
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