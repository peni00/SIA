<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
	$id = $_POST['id'];

	$conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("DELETE FROM inventory WHERE id=?");
	$stmt->bind_param("i", $id);
	if($stmt->execute()){
		$_SESSION['status'] = 'Supply deleted successfully';
		$_SESSION['status_code'] = 'success';
	} else{
		$_SESSION['error'] = $stmt->error;
	}

	$stmt->close();
	$conn->close();
}
else{
	$_SESSION['status'] = 'Select Supply to delete first';
	$_SESSION['status_code'] = 'error';
}

header('location: stock_in.php');
exit();
?>
