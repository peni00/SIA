<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		$conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}

		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM category WHERE Ctgry_Name=?");
		$stmt->bind_param('s', $name);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		if($row['numrows'] > 0){
			$_SESSION['status'] = 'Category already exists';
			$_SESSION['status_code'] = 'error';
		}
		else{
			try{
				$stmt = $conn->prepare("UPDATE category SET Ctgry_Name=? WHERE Category_ID=?");
				$stmt->bind_param('si', $name, $id);
				$stmt->execute();
				$_SESSION['status'] = 'Category updated successfully';
				$_SESSION['status_code'] = 'success';
			}
			catch(mysqli_sql_exception $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$stmt->close();
		$conn->close();
	}
	else{
		$_SESSION['status'] = 'Fill up edit category form first';
		$_SESSION['status_code'] = 'warning';
	}

	header('location: category.php');
?>
