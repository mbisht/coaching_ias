<?php 
if(isset($_GET['id'])){
$edit_requested_id=$_GET['id'];
}else{
    header("Location: view-monthly-current-affair");
}

if(isset($_POST['cus_update_user'])){
    try{
		$title = htmlentities(trim($_POST['title']));
		$month = htmlentities(trim($_POST['monthly_month']));
		$year = htmlentities(trim($_POST['monthly_year']));
		    
		if(empty($title) || empty($month) || empty($year)){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
		    
		    if($_FILES["result_file"]["size"]>10){
		    $target_dir = "../assets/files/currentaffair/";
            $target_file = $target_dir . basename($_FILES["result_file"]["name"]);
            $uploadOk = 1;
            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($FileType == 'pdf' || $FileType == 'doc' || $FileType == 'docx'){
                    $file_name = time().".".$FileType;
                    $target_file_new = $target_dir . $file_name;
                    if (move_uploaded_file($_FILES["result_file"]["tmp_name"], $target_file_new)){
                        
                    $stmt = $reg_user->runQuery("UPDATE monthly_current_affairs SET title='$title',month='$month',year='$year',file_url='$file_name' WHERE id='$edit_requested_id'");
                    $stmt->execute();
            		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Monthly Current Affairs!</strong> Updated Successfully.</div>";
            		header("Location: edit-monthly-current-affair-list?id=".$edit_requested_id);
            		exit();
                    } else {
                        $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Sorry, there was an error uploading your file.</div>";
                    }
                    
                }else {
                    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Selected file is not a PDF file.</div>";
                }
		    }else{
		    $stmt = $reg_user->runQuery("UPDATE monthly_current_affairs SET title='$title',month='$month',year='$year' WHERE id='$edit_requested_id'");
            $stmt->execute();
    		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Monthly Current Affairs!</strong> Updated Successfully.</div>";
    		header("Location: edit-monthly-current-affair-list?id=".$UserID);
    		exit();
		    }
		}
		
		}catch(PDOException $ex){
			$_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>".$ex->getMessage()."</div>";
		}
}

include 'include/header.php';
$stmt_user = $reg_user->runQuery("SELECT * FROM monthly_current_affairs WHERE id='$edit_requested_id'");
$stmt_user->execute();
$row_user = $stmt_user->fetch(PDO::FETCH_ASSOC);
?>
<div class="site-content">
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>Update Monthly Current Affairs Details</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-monthly-current-affair">Monthly Current Affairs List</a></li>
							<li class="breadcrumb-item active"><a href="#">Edit Monthly Current Affairs</a></li>
						</ol>
						<div class="box box-block bg-white">
						<div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>

							<form class="form-horizontal" method="post" name="edit_ad" enctype="multipart/form-data">
								<div class="row">
							    <div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputEmail1"><b>Title</b></label>
									<input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $row_user['title']; ?>" required="required"/>
									<small id="emailHelp" class="form-text text-muted">We'll never share your blogs headline with anyone else.</small>
								</div>
								<?php $month= date("m"); $year= date("Y");?>
								<div class="form-group">
								    <label for="exampleInputEmail1"><b>Month</b></label>
                                <select class="form-control" id="monthly_month" name="monthly_month" required>
                                <option <?php if($row_user['month'] == 1){ echo "selected";} ?> value="1">Jan</option>
                                <option <?php if($row_user['month'] == 2){ echo "selected";} ?> value="2">Feb</option>
                                <option <?php if($row_user['month'] == 3){ echo "selected";} ?> value="3">Mar</option>
                                <option <?php if($row_user['month'] == 4){ echo "selected";} ?> value="4">Apr</option>
                                <option <?php if($row_user['month'] == 5){ echo "selected";} ?> value="5">May</option>
                                <option <?php if($row_user['month'] == 6){ echo "selected";} ?> value="6">Jun</option>
                                <option <?php if($row_user['month'] == 7){ echo "selected";} ?> value="7">Jul</option>
                                <option <?php if($row_user['month'] == 8){ echo "selected";} ?> value="8">Aug</option>
                                <option <?php if($row_user['month'] == 9){ echo "selected";} ?> value="9">Sep</option>
                                <option <?php if($row_user['month'] == 10){ echo "selected";} ?> value="10">Oct</option>
                                <option <?php if($row_user['month'] == 11){ echo "selected";} ?> value="11">Nov</option>
                                <option <?php if($row_user['month'] == 12){ echo "selected";} ?> value="12">Dec</option>
                            </select>
                        </div>
						<div class="form-group">
						    <label><b>Year</b></label>
                            <select class="form-control" id="monthly_year" name="monthly_year" required>
                                <?php 
                                for($i=2010;$i<=2050;$i++){
                                $option ="<option ";
                                if($row_user['year'] == $i){ $option .= " selected";}
                                    $option .= " value='$i'>$i</option>";
                                echo $option;
                                }
                                ?>
                            </select>
                        </div>
								<div class="form-group">
									<label for="exampleInputFile"><b>To change File (only pdf, doc and docx files)</b></label>
									<input type="file" class="form-control-file" name="result_file" id="result_file" accept=".doc,.docx,.pdf,application/pdf" />
									<small id="fileHelp" class="form-text text-muted">Here admin can upload the blogs picture.</small>
								</div>
								</div>
								<div class="col-md-12">
									<div class="pull-left">
									<input type="submit" class="btn btn-primary" value="Update Monthly Current Affairs" name="cus_update_user">
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