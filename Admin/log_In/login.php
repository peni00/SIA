<?php
	session_start();
	include 'conn.php';

	if(isset($_POST['form'])){
		$adminID = $_POST['adminID'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE adminID = '$adminID'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the User ID';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['admin'] = $row['id'];
				$_SESSION['category'] = $row['category'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: log_index.php');

?>