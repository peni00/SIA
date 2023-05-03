<?php
include 'includes/conn.php';
session_start();

if(isset($_SESSION['admin'])){
	header('location: Admin/Index.php');
}

if(isset($_SESSION['user'])){
	$mysqli = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");
	if($mysqli->connect_error){
		die("Connection failed: " . $mysqli->connect_error);
	}

	try{
		$stmt = $mysqli->prepare("SELECT * FROM users WHERE id=?");
		$stmt->bind_param('i', $_SESSION['user']);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
	}
	catch(Exception $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$stmt->close();
	$mysqli->close();
}

?>