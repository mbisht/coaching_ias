<?php
$user = new USER();
$question_set = $_GET['id'];
$stmt = $user->runQuery("SELECT * FROM online_test_prelims_question_set WHERE id='$question_set'");
$stmt->execute();
for($i=0; $stmt1 = $stmt->fetchObject(); $i++){
$result = $stmt1->status;

if($result == 1){
$update=$user->runQuery("UPDATE online_test_prelims_question_set SET status='2' WHERE id='$question_set'");
$update->execute();
header("Location: view-prelims-questions");
exit;
}

if($result == 2){
$update=$user->runQuery("UPDATE online_test_prelims_question_set SET status='1' WHERE id='$question_set'");
$update->execute();
header("Location: view-prelims-questions");
exit;
}
}

header("Location: view-prelims-questions");
exit;
?>