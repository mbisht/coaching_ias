<?php
$user = new USER();
$user_id = $_GET['id'];
$stmt = $user->runQuery("SELECT * FROM guest_blog WHERE id='$user_id'");
$stmt->execute();
for($i=0; $stmt1 = $stmt->fetchObject(); $i++)
{
$result = $stmt1->status;

if($result == 1){
$update=$user->runQuery("UPDATE guest_blog SET status='2' WHERE id='$user_id'");
$update->execute();
header("Location: view-guestblog");
}

if($result == 2){
$update=$user->runQuery("UPDATE guest_blog SET status='1' WHERE id='$user_id'");
$update->execute();
header("Location: view-guestblog");
}
}
?>