<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];

		$conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}

		$stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

        if(!empty($filename)){
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $new_filename = $slug.'.'.$ext;
            $image_data = file_get_contents($_FILES['photo']['tmp_name']);
            $base64_string = base64_encode($image_data);
        }
        else{
            $new_filename = '';
            $base64_string = '';
        }
		try{
			$stmt = $conn->prepare("UPDATE products SET photo=? WHERE id=?");
			$stmt->bind_param('si', $base64_string, $id);
			$stmt->execute();

			$_SESSION['status'] = 'Product photo updated successfully';
			$_SESSION['status_code'] = 'success';
		}
		catch(mysqli_sql_exception $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$conn->close();
	}
	else{
		$_SESSION['error'] = 'Select product to update photo first';
	}

	header('location: products.php');
?>
