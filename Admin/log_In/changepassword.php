<?php
require('../connection.php');

$adminID = $_GET['adminID'];

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['newPassword'];
    // Additional validation and security measures can be implemented here

    // Update the database
    $sql = "UPDATE admin SET password = '$newPassword', failed_attempts = 0 WHERE adminID = '$adminID'";

    if ($conn->query($sql) === TRUE) {
         echo '<script>';
        echo 'alert("Password updated successfully!");';
        echo 'window.location.href = "log_index.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error updating password: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h2>Change Password</h2>
    <form id="passwordForm"  method="POST">
       
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required><br><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" required><br>
        <p id="passwordMatchError" style="color: red; display: none;">Passwords do not match</p><br>

        <label>Show Password:</label>
        <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()"><br><br>

        <input type="submit" value="Change Password">
    </form>

    <script>
        function togglePasswordVisibility() {
            var newPasswordInput = document.getElementById("newPassword");
            var confirmPasswordInput = document.getElementById("confirmPassword");
            var showPasswordCheckbox = document.getElementById("showPassword");

            if (showPasswordCheckbox.checked) {
                newPasswordInput.type = "text";
                confirmPasswordInput.type = "text";
            } else {
                newPasswordInput.type = "password";
                confirmPasswordInput.type = "password";
            }
        }

        function changePassword(event) {
            event.preventDefault();

            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var passwordMatchError = document.getElementById("passwordMatchError");

            // Perform validation here
            if (newPassword !== confirmPassword) {
                passwordMatchError.style.display = "block";
                return;
            }

            passwordMatchError.style.display = "none";

            // Perform password change logic here

            alert("Password successfully changed!");
            document.getElementById("passwordForm").reset();
        }
    </script>
</body>
</html>
