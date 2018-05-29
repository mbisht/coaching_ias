<?php
if (!isset($_GET['id'])) {
	header('location: view-prelims-questions');
}else{
    $question_set_id = $_GET['id'];
}



if(isset($_GET['delete_id'])){
	$stmt = $reg_user->runQuery("DELETE FROM online_test_questions_prelims WHERE id=".$_GET['delete_id']);
	$stmt->execute(array(":id"=>$id));
	header("Location: view-prelims-questions-details?id=".$question_set_id);
}

if(isset($_GET['delete_selected_question'])){
    $question_id = explode(",", $_GET['delete_selected_question']);
    $delete_selected_question = $_GET['delete_selected_question'];
    
    
    if(is_array($question_id)){
    $stmt = $reg_user->runQuery("DELETE FROM online_test_questions_prelims WHERE id IN ($delete_selected_question)");
	$stmt->execute();
	header("Location: view-prelims-questions-details?id=".$question_set_id);
    }else{
	header("Location: view-prelims-questions-details?id=".$question_set_id);
    }
    
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
						<h4>Prelims Questions List</h4>
						<ol class="breadcrumb no-bg mb-1">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">View Prelims Questions</li>
						</ol>
						
						<button class="btn btn-primary" onclick="Delete_Selected_Question()">Delete</button>
						
						<div class="box box-block bg-white" id="Delete_Selected_Question">
							<h5 class="mb-1">Exporting Prelims Questions Data</h5>
							<table class="table jsgrid table-striped table-bordered dataTable table-responsive" id="table-2">
								<thead>
									<tr>
									    <th>EDIT</th>
									    <th>Select</th>
										<th>Sno.</th>
										<th>Question Set No.</th>
										<th>Subject</th>
										<th>Question Title</th>
										<th>Option1</th>
										<th>Option2</th>
										<th>Option3</th>
										<th>Option4</th>
										<th>Correct Answer</th>
										<th>Answer Description</th>
										<th>Date Added</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$count=1;
                                        $stmt = $reg_user->runQuery("SELECT *, otq.id as QID FROM online_test_questions_prelims otq INNER JOIN online_test_subjects ots ON ots.id=otq.subject_id WHERE otq.question_type='$question_set_id' ORDER BY otq.question_type,otq.date_added DESC");
                                        $stmt->execute();
                                        for($i=0; $stmt1 = $stmt->fetchObject(); $i++){
                                        ?><tr>	
                                        <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 60px;">
                                            <a href="edit-prelims-question?id=<?php echo $stmt1->QID;?>"><button class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></button></a>
                                            <a href="javascript:delete_id(<?php echo $stmt1->QID;?>)"><button type="submit" class="jsgrid-button jsgrid-delete-button" href="" title="Delete" name="delete-ad"></button></a>
    									</td>
    									<td><input type="checkbox" name="question_id[]" value="<?php echo $stmt1->QID;?>" class="question_id" ></td>
    									<td><?php echo $count;?></td>
    									<td><?php echo $stmt1->question_type;?></td>
    									<td><?php echo $stmt1->title;?></td>
    										<td><?php echo htmlspecialchars($stmt1->question_title);?></td>
    										<td><?php echo htmlspecialchars($stmt1->option1);?></td>
    										<td><?php echo htmlspecialchars($stmt1->option2);?></td>
    										<td><?php echo htmlspecialchars($stmt1->option3);?></td>
    										<td><?php echo htmlspecialchars($stmt1->option4);?></td>
    										<td><?php echo $stmt1->correct_answer;?></td>
    										<td><?php echo htmlspecialchars($stmt1->answer_description);?></td>
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
		    if(confirm('Move this Question to TRASH?')){
		        window.location.href='view-prelims-questions-details?id=<?php echo $question_set_id; ?>&delete_id='+id;
		    }
		}
		function Delete_Selected_Question(){
		    var question_id = [];
		    var values = $("#Delete_Selected_Question input[name='question_id[]']:checked")
              .map(function(){question_id.push($(this).val());}).get();
		    var result = question_id.join();
		    if(confirm('Move this Question to TRASH?')){
		        window.location.href='view-prelims-questions-details?id=<?php echo $question_set_id; ?>&delete_selected_question='+result;
		    }
		}
		</script>
		</body>
		</html>