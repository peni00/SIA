<?php
require('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, "INSERT INTO admin (adminID, password, fullname, category, photo, created_on, status, contactnum, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssssss", $adminID, $password, $fullname, $category, $photo, $created_on, $status, $contactnum, $email);

    // Set parameters
    $adminID = trim($_POST['adminID']);
    $password = trim($_POST['password']); // Hash password for security
    $fullname = trim($_POST['fullname']);
    $category = trim($_POST['category']);
    $created_on = date('Y-m-d');
    $status = 'Active';
    $contactnum = trim($_POST['contactnum']);
    $email = trim($_POST['email']);

    // Check if an image file was uploaded
    if (isset($_FILES['myImage']) && $_FILES['myImage']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['myImage']['tmp_name'];
        $photo = base64_encode(file_get_contents($tmpName));

        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            // Display success message
            echo "<script type='text/javascript'>alert('Register Successfully!');
                    window.location='homepage.php';
                </script>";
            exit;
        } else {
            // Display error message
            $error = 'Error: ' . mysqli_error($conn);
        }
    } else {
        // Display error message if no image file was uploaded
        $error = 'Please select an image file.';
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
		<form method="POST" action="" enctype="multipart/form-data">
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
			<img id="mypreview" alt="Preview Image" style="width: 100px; height: 100px;"> </br></br>
			<input type="file" name="myImage" accept="image/*" onchange="previewImage1(event)" > </br></br>

			<label for="contactnum">Contact Number</label>
			<input type="text" name="contactnum" required>

			<label for="email">Email</label>
			<input type="email" name="email" required>

			<input type="submit" value="Add Account">
		</form>
	</div>
	
	<script>
		function previewImage1(event) {
			var reader = new FileReader();
			reader.onload = function(){
				var output = document.getElementById('mypreview');
				output.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		}
	</script>
</body>
</html>
