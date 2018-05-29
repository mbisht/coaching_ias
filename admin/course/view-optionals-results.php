<?php 
ob_start();
if (!isset($_SESSION['userSession'])) {
	header('location:login');
}

include("include/header.php");
?>
<link rel="stylesheet" href="<?php echo DIR_SYSTEM; ?>vendor/jsgrid/dist/jsgrid-theme.min.css">
<link rel="stylesheet" href="<?php echo DIR_SYSTEM; ?>vendor/DataTables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo DIR_SYSTEM; ?>vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo DIR_SYSTEM; ?>vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo DIR_SYSTEM; ?>vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">

<div class="site-content">
				<!-- Content -->
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>Optional Test Result List</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">View Optional Test Result</li>
						</ol>
						<div class="box box-block bg-white">
							<h5 class="mb-1">Exporting Optional Test Result Data</h5>
							<table class="table jsgrid table-striped table-bordered dataTable table-responsive" id="table-2">
								<thead>
									<tr>
										<th>Sno.</th>
										<th>User(ID)</th>
										<th>Question</th>
										<th>Subjects</th>
										<th>Result File</th>
										<th>Corrected File</th>
										<th>Upload Corrected File</th>
										<th>Date Added</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$count=1;
                                $stmt = $reg_user->runQuery("SELECT *, om.id as QID,om.file_url as ResultFile,us.id as USER FROM online_test_optional_submission om INNER JOIN user us ON us.id=om.user_id LEFT JOIN online_test_optional ot ON ot.id=om.question_id ORDER BY om.date_added DESC");
                                $stmt->execute();
                                for($i=0; $stmt1 = $stmt->fetchObject(); $i++){
                                ?><tr>
								<td><?php echo $count;?></td>
								<td><?php echo $stmt1->full_name."(".$stmt1->full_name.")";?></td>
								<td><?php echo $stmt1->title;?></td>
								<td><?php echo $stmt1->subject;?></td>
									<td><a href="../assets/files/optional/<?php echo $stmt1->ResultFile;?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a></td>
									<td><?php if(!empty($stmt1->corrected_file)){ ?><a href="../assets/files/optional/<?php echo $stmt1->corrected_file;?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a> <?php } ?></td>
									<td><a class="btn btn-primary" href="upload-optional-corrected-file?id=<?php echo $stmt1->QID;?>" >Upload</a></td>
									<td><?php echo $stmt1->date_added;?></td>
								</tr><?php $count++; } ?>
								</tbody>
							</table>
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
		<script type="text/javascript" src="vendor/DataTables/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/JSZip/jszip.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/pdfmake/build/pdfmake.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/pdfmake/build/vfs_fonts.js"></script>
		<script type="text/javascript" src="vendor/DataTables/Buttons/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/Buttons/js/buttons.print.min.js"></script>
		<script type="text/javascript" src="vendor/DataTables/Buttons/js/buttons.colVis.min.js"></script>
		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/tables-datatable.js"></script>
		</body>
		</html>