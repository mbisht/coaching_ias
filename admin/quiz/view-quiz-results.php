<?php 
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
						<h4>Quiz Results List</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">View Quiz Results</li>
						</ol>
						<div class="box box-block bg-white">
							<h5 class="mb-1">Exporting Quiz Results Data</h5>
							<table class="table jsgrid table-striped table-bordered dataTable table-responsive" id="table-2">
								<thead>
									<tr>
									    <th>View</th>
										<th>Sno.</th>
										<th>User Name (ID)</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Quiz Date</th>
										<th>Total Questions</th>
										<th>Answered Questions</th>
										<th>Corrected Answers</th>
										<th>Wrong Answers</th>
										<th>Percentage</th>
										<th>Marks</th>
										<th>Date Added</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$count=1;
                                        $stmt = $reg_user->runQuery("SELECT *, qr.id as RestID, us.id as UsrID,qr.email as UsrEmail,qr.mobile as UsrMobile FROM quiz_result_submission qr LEFT JOIN user us ON us.id=qr.user_id ORDER BY qr.date_added DESC");
                                        $stmt->execute();
                                        for($i=0; $stmt1 = $stmt->fetchObject(); $i++){
                                        ?><tr>	
                                        <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 60px;">
                                        <a href="view-quiz-results-details?id=<?php echo $stmt1->RestID;?>" class="btn btn-primary"><span title="View Results">View</span></a>
    									</td>
    									<td><?php echo $count;?></td>
    									<?php if($stmt1->user_id == '1'){?>
    									<td><?php echo $stmt1->name." (Guest)"; ?></td>
    									<td><?php echo $stmt1->UsrEmail; ?></td>
    									<td><?php echo $stmt1->mobile; ?></td>
    									<?php }else{?>
    									<td><?php echo $stmt1->full_name;?></td>
    									<td><?php echo $stmt1->email;?></td>
    									<td><?php echo $stmt1->phone;?></td>
    									<?php } ?>
    										<td><?php echo $stmt1->quiz_date;?></td>
    										<td><?php echo $stmt1->total_questions;?></td>
    										<td><?php echo $stmt1->answered_questions;?></td>
    										<td><?php echo $stmt1->corrected_answers;?></td>
    										<td><?php echo $stmt1->wrong_answers;?></td>
    										<td><?php echo $stmt1->percentage;?></td>
    										<td><?php echo $stmt1->marks;?></td>
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
		<script type="text/javascript">
		function delete_id(id){
		    if(confirm('Are you sure you want to Delete this Results?')){
		        window.location.href='view-quiz-results?delete_id='+id;
		    }
		}
		</script>
		</body>
		</html>