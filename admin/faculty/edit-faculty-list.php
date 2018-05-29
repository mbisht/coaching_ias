<?php 
if(isset($_GET['id'])){
$edit_requested_id=$_GET['id'];
}else{
    header("Location: view-faculty");
}

if(isset($_POST['cus_update_user'])){
    try{
		$name = htmlentities(trim($_POST['name']));
		$experience = htmlentities(trim($_POST['experience']));
		$qualification = htmlentities(trim($_POST['qualification']));
		$expertise = htmlentities(trim($_POST['expertise']));
		$role = htmlentities(trim($_POST['role']));
		    
		if(empty($name) || empty($experience) || empty($qualification) || empty($role)){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
		    
		    if($_FILES["result_file"]["size"]>10){
		    $target_dir = "../assets/files/faculty/";
            $target_file = $target_dir . basename($_FILES["result_file"]["name"]);
            $uploadOk = 1;
            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($FileType == 'jpg' || $FileType == 'jpeg' || $FileType == 'png' || $FileType == 'gif'){
                    $file_name = time().".".$FileType;
                    $target_file_new = $target_dir . $file_name;
                    if (move_uploaded_file($_FILES["result_file"]["tmp_name"], $target_file_new)){
                        
                    $stmt = $reg_user->runQuery("UPDATE faulty_details SET name='$name',qualification='$qualification',experience='$experience',expertise='$expertise',role='$role',image='$file_name' WHERE id='$edit_requested_id'");
                    $stmt->execute();
            		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Faculty Details!</strong> Updated Successfully.</div>";
            		header("Location: edit-faculty-list?id=".$edit_requested_id);
            		exit();
                    } else {
                        $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Sorry, there was an error uploading your file.</div>";
                    }
                    
                }else {
                    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Selected file is not a PDF file.</div>";
                }
		    }else{
		    $stmt = $reg_user->runQuery("UPDATE faulty_details SET name='$name',qualification='$qualification',experience='$experience',expertise='$expertise',role='$role' WHERE id='$edit_requested_id'");
            $stmt->execute();
    		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Faculty Details!</strong> Updated Successfully.</div>";
    		header("Location: edit-faculty-list?id=".$edit_requested_id);
    		exit();
		    }
		}
		
		}catch(PDOException $ex){
			$_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>".$ex->getMessage()."</div>";
		}
}

include 'include/header.php';
$stmt_user = $reg_user->runQuery("SELECT * FROM faulty_details WHERE id='$edit_requested_id'");
$stmt_user->execute();
$row_user = $stmt_user->fetch(PDO::FETCH_ASSOC);
?>
<div class="site-content">
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>Update Faculty List Details</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="user-list">User List</a></li>
							<li class="breadcrumb-item active"><a href="#">Edit User</a></li>
						</ol>
						<div class="box box-block bg-white">
						<div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form class="form-horizontal" method="post" name="edit_ad" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
									
									<div class="form-group">
										<label><b>Name*</b></label>
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo $row_user['name']; ?>" required>
										</div>
									</div>
								
									<div class="form-group">
									    <label><b>Experience*</b></label>
										<input type="text" placeholder="experience" name="experience" class="form-control" value="<?php echo $row_user['experience']; ?>" required>
									</div>
		
									<div class="form-group">
									    <label><b>Qualification*</b></label>
									    <textarea name="qualification" rows="4" class="form-control" placeholder="Qualification" required><?php echo $row_user['qualification']; ?></textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label><b>Expertise</b></label>
										<input type="text" placeholder="Expertise" name="expertise" class="form-control" value="<?php echo $row_user['expertise']; ?>" >
									</div>
									<div class="form-group">
									    <label><b>Role*</b></label>
										<input type="text" placeholder="Role" name="role" class="form-control" value="<?php echo $row_user['role']; ?>" required>
									</div>
								<div class="form-group">
									    <label><b>To change Image (size: 330 X 225 px)*:</b></label>
										<input placeholder="Image" class="form-control" accept="image/*" aria-describedby="fileHelp" type="file" id="result_file" name="result_file" value="<?php if(isset($_POST['result_file'])){ echo $_POST['result_file']; } ?>" >
									</div>
								</div>
								<div class="col-md-12">
									<div class="pull-left">
									<input type="submit" class="btn btn-primary" value="Update Faculty" name="cus_update_user">
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
        </body>
		</html>