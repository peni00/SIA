<?php
	require('../../connection.php');
	session_start();

	if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '') {
		header('location: index.php');
		exit();
	}

	$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
	$stmt->bind_param('s', $_SESSION['admin']);
	$stmt->execute();
	$result = $stmt->get_result();
	$admin = $result->fetch_assoc();

	$stmt->close();
	$conn->close();

?>