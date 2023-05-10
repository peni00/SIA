<?php 
require ('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Prepare and bind parameters
	$stmt = mysqli_prepare($conn, "INSERT INTO admin (adminID, password, fullname, category, photo, created_on, status, contactnum, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($stmt, "sssssssss", $adminID, $password, $fullname, $category, $photo, $created_on, $status, $contactnum, $email);

	// Set parameters and execute statement
	$adminID = trim($_POST['adminID']);
	$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Hash password for security
	$fullname = trim($_POST['fullname']);
	$category = trim($_POST['category']);
	$photo = trim($_POST['photo']);
	$created_on = date('Y-m-d');
	$status = 'Active';
	$contactnum = trim($_POST['contactnum']);
	$email = trim($_POST['email']);

	if (empty($adminID) || empty($password) || empty($fullname) || empty($category) || empty($photo) || empty($contactnum) || empty($email)) {
		// Display error message if any field is empty
		$error = 'Please fill in all fields.';
	} else {
		if (mysqli_stmt_execute($stmt)) {
			//Display success message 
			echo "<script type='text/javascript'>alert('Register Sucessfully!');
			window.location='homepage.php';
			</script>";		

		} else {
			// Display error message
			$error = 'Error: ' . mysqli_error($conn);
		}
	}

	// Close statement
	mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Account</title>
	<link rel="stylesheet" type="text/css" href="addaccount.css">
</head>
<body>
	<div class="container">
		<h1>Add Account</h1>
		<form method="POST" action="">
			<?php if (isset($error)): ?>
			<p class="error"><?php echo $error ?></p>
			<?php endif; ?>
			<label for="adminID">Admin ID</label>
			<input type="text" name="adminID" required>

			<label for="password">Password</label>
			<input type="password" name="password" required>

			<label for="fullname">Full Name</label>
			<input type="text" name="fullname" required>

			<label for="category">Category</label>
			<input type="text" name="category" required>

			<label for="photo">Photo</label>
			<input type="text" name="photo" required>

			<label for="contactnum">Contact Number</label>
			<input type="text" name="contactnum" required>

			<label for="email">Email</label>
			<input type="email" name="email" required>

			<input type="submit" value="Add Account">
		</form>
	</div>
</body>
</html>
