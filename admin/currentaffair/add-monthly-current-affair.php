<?php
if(isset($_POST['SubmitButton'])){
    try{
		$title = htmlentities(trim($_POST['title']));
		$month = htmlentities(trim($_POST['monthly_month']));
		$year = htmlentities(trim($_POST['monthly_year']));
		
		if(empty($title) || empty($month) || empty($year) || $_FILES["result_file"]["size"]<1){
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
                        
                        $stmt = $reg_user->runQuery("INSERT INTO monthly_current_affairs(title,month,year,file_url) 
            		    VALUES('$title','$month','$year','$file_name')");
                        $stmt->execute();
                        
                		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>New Monthly Current Affairs!</strong> Added Successfully.</div>";
                		header("Location: add-monthly-current-affair");
                		exit();
                		exit();
                    } else {
                        $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Sorry, there was an error uploading your file.</div>";
                    }
                    
                }else {
                    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Selected file is not a image file.</div>";
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
						<h4>Create New Monthly Current Affairs</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-monthly-current-affair">Monthly Current Affairs List</a></li>
							<li class="breadcrumb-item active"><a href="#">Add Monthly Current Affairs</a></li>
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
								<?php $month= date("m"); $year= date("Y");?>
								<div class="form-group">
								    <label for="exampleInputEmail1"><b>Month</b></label>
                                <select class="form-control" id="monthly_month" name="monthly_month" required>
                                <option <?php if($month == 1){ echo "selected";} ?> value="1">Jan</option>
                                <option <?php if($month == 2){ echo "selected";} ?> value="2">Feb</option>
                                <option <?php if($month == 3){ echo "selected";} ?> value="3">Mar</option>
                                <option <?php if($month == 4){ echo "selected";} ?> value="4">Apr</option>
                                <option <?php if($month == 5){ echo "selected";} ?> value="5">May</option>
                                <option <?php if($month == 6){ echo "selected";} ?> value="6">Jun</option>
                                <option <?php if($month == 7){ echo "selected";} ?> value="7">Jul</option>
                                <option <?php if($month == 8){ echo "selected";} ?> value="8">Aug</option>
                                <option <?php if($month == 9){ echo "selected";} ?> value="9">Sep</option>
                                <option <?php if($month == 10){ echo "selected";} ?> value="10">Oct</option>
                                <option <?php if($month == 11){ echo "selected";} ?> value="11">Nov</option>
                                <option <?php if($month == 12){ echo "selected";} ?> value="12">Dec</option>
                            </select>
                        </div>
						<div class="form-group">
						    <label><b>Year</b></label>
                            <select class="form-control" id="monthly_year" name="monthly_year" required>
                                <?php 
                                for($i=2010;$i<=2050;$i++){
                                $option ="<option ";
                                if($year == $i){ $option .= " selected";}
                                    $option .= " value='$i'>$i</option>";
                                echo $option;
                                }
                                ?>
                            </select>
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
		</body>
		</html>