<?php 
if(isset($_GET['id'])){
$edit_requested_id=$_GET['id'];
}else{
    header("Location: view-upsc-box-material");
}

if(isset($_POST['cus_update_user'])){
       try{
		$title = htmlentities(trim($_POST['title']));
		$subject = htmlentities(trim($_POST['subject_year']));
		$file_url = addslashes(trim($_POST['file_url']));
		
		if(empty($title) || empty($subject) || empty($file_url)){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
    			    $stmt = $reg_user->runQuery("UPDATE upsc_materials SET title='$title',subject='$subject',file_url='$file_url' WHERE id='$edit_requested_id'");
                    $stmt->execute();
            		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>UPSC BOX Details!</strong> Updated Successfully.</div>";
            		header("Location: edit-upsc-box-material?id=".$edit_requested_id);
            		exit();
		}
		
		}catch(PDOException $ex){
			$_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>".$ex->getMessage()."</div>";
		}
}

include 'include/header.php';
$stmt_user = $reg_user->runQuery("SELECT * FROM upsc_materials WHERE id='$edit_requested_id'");
$stmt_user->execute();
$row_user = $stmt_user->fetch(PDO::FETCH_ASSOC);
?>
<div class="site-content">
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>Update UPSC BOX Details</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-upsc-box-material">View UPSC BOX List</a></li>
							<li class="breadcrumb-item active"><a href="#">Edit UPSC BOX</a></li>
						</ol>
						<div class="box box-block bg-white">
						<div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form class="form-horizontal" method="post" name="edit_ad" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
									
									<div class="form-group">
										<label><b>UPSC BOX Material Title*</b></label>
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Material Title" name="title" value="<?php echo $row_user['title']; ?>" required>
										</div>
									</div>
								
									<div class="form-group">
									<label for="exampleInputPassword1">Subject/Year</label>
									<select class="form-control" id="subject_year" name="subject_year" required>
									<?php
									for($i=2010;$i<=2050;$i++){
                                        $option ="<option ";
                                        if($row_user['subject'] == $i){$option .= " selected"; }
                                            $option .= " value='$i'>$i</option>";
                                        echo $option;
                                        }
                                      ?>
                                    </select>
								</div>
		
									<div class="form-group">
									    <label><b>File URL*</b></label>
									    <input type="text" class="form-control" placeholder="file url" name="file_url" value="<?php echo $row_user['file_url']; ?>" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="pull-left">
									<input type="submit" class="btn btn-primary" value="Update User" name="cus_update_user">
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