<?php
if(isset($_POST['SubmitButton'])){
    try{
		$title = htmlentities(trim($_POST['title']));
		$from_date = htmlentities(trim($_POST['from_date']));
		$to_date = htmlentities(trim($_POST['to_date']));
		
		if(empty($title) || empty($from_date) || empty($to_date) || $_FILES["result_file"]["size"]<1){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
		    
		    $target_dir = "../assets/files/currentaffair/";
            $target_file = $target_dir . basename($_FILES["result_file"]["name"]);
            $uploadOk = 1;
            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
                if($FileType == 'pdf' || $FileType == 'doc' || $FileType == 'docx'){
                    $file_name = time().".".$FileType;
                    $target_file_new = $target_dir . $file_name;
                    if (move_uploaded_file($_FILES["result_file"]["tmp_name"], $target_file_new)){
                        
                        $stmt = $reg_user->runQuery("INSERT INTO weekly_current_affairs(title,from_date,to_date,file_url) 
            		    VALUES('$title','$from_date','$to_date','$file_name')");
                        $stmt->execute();
                        
                		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>New Weekly Current Affairs!</strong> Added Successfully.</div>";
                		header("Location: add-weekly-current-affair");
                		exit();
                		exit();
                    } else {
                        $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Sorry, there was an error uploading your file.</div>";
                    }
                    
                }else {
                    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Selected file is not a PDF or DOC.</div>";
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
						<h4>Create New Weekly Current Affairs</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-weekly-current-affair">Weekly Current Affairs List</a></li>
							<li class="breadcrumb-item active"><a href="#">Add Weekly Current Affairs</a></li>
						</ol>
						<div class="box box-block bg-white">
						    
						    <div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form name="news upload" id="news" action="" method="POST" enctype="multipart/form-data">
							    <div class="row">
							    <div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputEmail1"><b>Title</b></label>
									<input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php if(isset($_POST['title'])){ echo $_POST['title']; } ?>" required="required"/>
									<small id="emailHelp" class="form-text text-muted">We'll never share your blogs headline with anyone else.</small>
								</div>
						<div class="form-group">
							<label for="exampleInputEmail1"><b>From Date</b></label>
                            <input type="text" class="form-control datepicker" name="from_date" id="from_date" placeholder="From Date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>" required="required"/>
                        </div>
						<div class="form-group">
						    <label><b>To Date</b></label>
                            <input type="text" class="form-control datepicker" name="to_date" id="to_date" placeholder="To Date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>" required="required"/>
                        </div>
								<div class="form-group">
									<label for="exampleInputFile"><b>File (only pdf, doc and docx files)</b></label>
									<input type="file" class="form-control-file" name="result_file" id="result_file" accept=".doc,.docx,.pdf,application/pdf" required="required"/>
									<small id="fileHelp" class="form-text text-muted">Here admin can upload the blogs picture.</small>
								</div>
								</div>
								
								</div>
								<button type="submit"  name="SubmitButton" class="btn btn-primary">Submit</button> &nbsp;
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
	<script type="text/javascript">
		$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
        </script>
		</body>
		</html>