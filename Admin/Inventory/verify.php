<?php
include 'includes/session.php';
$mysqli = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

if($mysqli->connect_error){
	die("Connection failed: " . $mysqli->connect_error);
}

if(isset($_POST['login'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	try{

		$stmt = $mysqli->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = ?");
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($row['numrows'] > 0){
			if($row['status']){
				if(password_verify($password, $row['password'])){
					if($row['type']){
						$_SESSION['admin'] = $row['id'];
					}
					else{
						$_SESSION['user'] = $row['id'];
					}
				}
				else{
					$_SESSION['status'] = 'Incorrect Password';
					$_SESSION['status_code'] = 'error';
				}
			}
		}
		else{
			$_SESSION['status'] = 'Email not found';
			$_SESSION['status_code'] = 'error';
		}
	}
	catch(Exception $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$stmt->close();
}

$mysqli->close();

header('location: login.php');

?>
