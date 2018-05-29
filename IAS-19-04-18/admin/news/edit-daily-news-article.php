<?php
if(isset($_GET['id'])){
$edit_requested_id=$_GET['id'];
}else{
    header("Location: view-daily-news");
}

if(isset($_POST['cus_add_new_user'])){
    try{
		$news_date = trim($_POST['news_date']);
		$news_title = addslashes(htmlspecialchars(trim($_POST['news_title'])));
		$file_url = addslashes(trim($_POST['file_url']));
		
		if(empty($news_date) || empty($news_title)){
		    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>Please Fill all the Fileds!</div>";
		}else{
		    
		    if($_FILES["result_file"]["size"]>10){
		    $target_dir = "../assets/files/article/";
            $target_file = $target_dir . basename($_FILES["result_file"]["name"]);
            $uploadOk = 1;
            $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($FileType == 'pdf'){
                    $file_name = time().".".$FileType;
                    $target_file_new = $target_dir . $file_name;
                    if (move_uploaded_file($_FILES["result_file"]["tmp_name"], $target_file_new)){
                        
                        $stmt = $reg_user->runQuery("UPDATE daily_article SET date='$news_date',title='$news_title',file_links='$file_name',file_url='$file_url' WHERE id='$edit_requested_id'");
                        $stmt->execute();
                        
                		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Daily News Article!</strong> Updated Successfully.</div>";
                		header("Location: edit-daily-news-article?id=".$edit_requested_id);
                		exit();
                    } else {
                        $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Sorry, there was an error uploading your file.</div>";
                    }
                    
                }else {
                    $_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button> Selected file is not a PDF file.</div>";
                }
		    }else{
		    
		    $stmt = $reg_user->runQuery("UPDATE daily_article SET date='$news_date',title='$news_title',file_url='$file_url' WHERE id='$edit_requested_id'");
            $stmt->execute();
            
    		$_SESSION['add_user_error_msg'] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Daily News Article!</strong> Updated Successfully.</div>";
    		header("Location: edit-daily-news-article?id=".$edit_requested_id);
    		exit();
		    }
		}
		}catch(PDOException $ex){
			$_SESSION['add_user_error_msg'] = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button>".$ex->getMessage()."</div>";
		}
}
include 'include/header.php';
$edit_requested_query = $reg_user->runQuery("SELECT * FROM daily_article WHERE id='$edit_requested_id'");
$edit_requested_query->execute();
$edit_requested_details = $edit_requested_query->fetch(PDO::FETCH_ASSOC);
?>
<div class="site-content">
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>Edit Daily News Article</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="view-article-daily-news">View Daily News Article</a></li>
							<li class="breadcrumb-item active"><a href="#">Edit Daily News Article</a></li>
						</ol>
						<div class="box box-block bg-white">
						    <div class="error-div"><?php if(isset($_SESSION['add_user_error_msg'])){ echo $_SESSION['add_user_error_msg']; unset($_SESSION['add_user_error_msg']); } ?></div>
							<form class="form-horizontal" method="post" name="edit_ad" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
									    <label><b>Date*</b></label>
										<input type="text" id="news_date" placeholder="Date" name="news_date" value="<?php echo $edit_requested_details['date']; ?>" class="form-control" required>
									</div>
									
									<div class="form-group">
									    <label><b>Title*</b></label>
										<input type="text" id="news_title" placeholder="Title" name="news_title" value="<?php echo $edit_requested_details['title']; ?>" class="form-control" required>
                                	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label><b>To change Article File (pdf file only)*</b></label>
										<input placeholder="Article File" class="form-control" accept="application/pdf" type="file" id="result_file" name="result_file" value="<?php if(isset($_POST['result_file'])){ echo $_POST['result_file']; } ?>" >
									</div>
									<p>(OR)</p>
                                	<div class="form-group">
									    <label><b>File URL*</b></label>
										<input placeholder="File URL" class="form-control" type="text" id="file_url" name="file_url" value="<?php echo $edit_requested_details['file_url']; ?>" >
									</div>
								</div>
								<div class="col-md-12">
									<div class="pull-left">
									<input type="submit" class="btn btn-primary" value="Update Daily News Article" name="cus_add_new_user">
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
		$('#news_date').datepicker({format: 'yyyy-mm-dd'});
        </script>
</body>
</html>