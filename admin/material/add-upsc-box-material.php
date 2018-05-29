<?php
if(isset($_POST['cus_add_new_user'])){
    try{
		$title = htmlentities(trim($_POST['title']));
		$subject = htmlentities(trim($_POST['subject_year']));
		$file_url = addslashes(trim($_POST['file_url']));
		
		if(empty($title) || empty($subject) || empty($file_url)){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
		    $stmt = $reg_user->runQuery("INSERT INTO upsc_materials(title,subject,file_url) VALUES('$title','$subject','$file_url')");
            $stmt->execute();
            $new_user_id = $reg_user->lasdID();
    		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>New UPSC BOX!</strong> Added Successfully.</div>";
    		header("Location: add-upsc-box-material");
    		exit();
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
						<h4>Create New UPSC BOX</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-upsc-box-material">View UPSC BOX List</a></li>
							<li class="breadcrumb-item active"><a href="#">Add UPSC BOX</a></li>
						</ol>
						<div class="box box-block bg-white">
						    <div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form name="news upload" id="news" action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="exampleInputEmail1">UPSC BOX Material Title</label>
									<input type="text" class="form-control" name="title" id="name" aria-describedby="emailHelp" value="<?php if(isset($_POST['title'])){ echo $_POST['title']; } ?>" placeholder="Enter the material name" required="required"/>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Subject/Year</label>
									<select class="form-control" id="subject_year" name="subject_year" required>
									<?php
									$year= date("Y");
									for($i=2010;$i<=2050;$i++){
                                        $option ="<option ";
                                        if(isset($_POST['subject_year']) && $_POST['subject_year'] == $i){$option .= " selected"; }elseif($year == $i){ $option .= " selected";}
                                            $option .= " value='$i'>$i</option>";
                                        echo $option;
                                        }
                                      ?>
                                    </select>
								</div>
								
								<div class="form-group">
									<label for="exampleInputPassword1">File URL</label>
									<input type="text" class="form-control" name="file_url" id="file_url" placeholder="Enter the online file url" value="<?php if(isset($_POST['file_url'])){ echo $_POST['file_url']; } ?>" required="required"/>
								</div>
								<button type="submit" name="cus_add_new_user" class="btn btn-primary">Submit</button> &nbsp;
								<button type="reset" class="btn btn-danger">Reset</button>
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
		</body>
		</html>