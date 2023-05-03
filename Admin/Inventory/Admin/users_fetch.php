<?php
	include 'includes/session.php';

	$output = '';

	$conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT * FROM account");
	$stmt->execute();
	$result = $stmt->get_result();

	while($row = $result->fetch_assoc()) {
		$output .= "
			<option value='".$row['Account_ID']."' class='append_items'>".$row['Name']."</option>
		";
	}


	$conn->close();

	echo json_encode($output);
?>
