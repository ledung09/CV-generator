<?php 
include_once './connect.php';
$user_id = $_POST['user_id'];
$cv_id = $_POST['cv_id'];
$stmt = $conn->prepare("DELETE FROM cv_management WHERE user_id = ? AND cv_id = ?");
$stmt->bind_param("ii", $user_id, $cv_id);  // Assuming user_id and cv_id are integers, change the "ii" if they are different types
$stmt->execute();
$stmt->close();
?>