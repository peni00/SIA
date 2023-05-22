<?php

require('../connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

session_start();

if (isset($_POST['form'])) {
    $adminID = $_POST['adminID'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE adminID = '$adminID'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) < 1) {
        $_SESSION['error'] = '</br><span style="color: red; font-size: 14px;">Cannot find an account with the User ID</span>';

        header('location: log_index.php');
        return;
    } else {
        $row = mysqli_fetch_assoc($query);

        // Check if the adminID has exceeded the maximum number of failed login attempts
        if ($row['failed_attempts'] >= 2) {
          $_SESSION['error'] = '</br><span style="color: red; font-size: 14px;">
								The maximum number of login attempts for this adminID has been exceeded. We have sent you an email containing instructions to change your password. Please follow the instructions in the email and you will be able to login again immediately.</span>';
		  
		       

			// Send email notification to the admin
            $adminEmail = $row['email'];
			$fullname = $row['fullname'];
			$adminID = $row['adminID'];
            sendEmailNotification($adminEmail, $fullname, $adminID);
			
			// Notify the user that an email has been sent



            header('location: log_index.php');
            return;

        }

        if ($password === $row['password']) {
            $_SESSION['admin'] = $row['id'];
            $_SESSION['category'] = $row['category'];

            // Reset the failed login attempts for the adminID upon successful login
            $sql_reset_attempts = "UPDATE admin SET failed_attempts = 0 WHERE adminID = '$adminID'";
            mysqli_query($conn, $sql_reset_attempts);
        } else {
            // Increment the failed login attempts for the adminID
            $failed_attempts = $row['failed_attempts'] + 1;
            $sql_update_attempts = "UPDATE admin SET failed_attempts = $failed_attempts WHERE adminID = '$adminID'";
            mysqli_query($conn, $sql_update_attempts);

            $_SESSION['error'] = '</br><span style="color: red; font-size: 14px;">Incorrect password</span>';;
		
            header('location: log_index.php');
            return;
        }
    }
} else {
    $_SESSION['error'] = '</br><span style="color: red; font-size: 14px;">Input admin credentials first</span>';

    header('location: log_index.php');
    return;
}

header('location: homepage.php');
function sendEmailNotification($adminEmail , $fullname, $adminID)
{

    // Instantiate PHPMailer
    $mail = new PHPMailer;
    $mail->isSMTP();
    // Configure SMTP settings
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;
    $mail->Username = 'rfgelitegym54@gmail.com'; // SMTP username
    $mail->Password = 'tqkympzfevuagrvd'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Set sender and recipient
    $mail->setFrom('rfgelitegym54@gmail.com');
    $mail->addAddress($adminEmail); // Add admin's email as recipient

    // Set email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Login Attempts Exceeded';
	$mail->Body = "Dear $fullname,<br><br>We regret to inform you that our system has detected multiple unsuccessful login attempts associated with your account, surpassing the maximum allowed limit. To ensure the security of your account and enable immediate access, we kindly request that you reset your password. To proceed with the password reset immediately, please click on the following link:  <a href='http://18.136.105.108:81/SIA/Admin/log_In/changepassword.php?adminID=$adminID'>Change Password</a><br><br>Regards,<br>Your Application";

	// Send the email
if (!$mail->send()) {
    echo '<script>alert("Email could not be sent: ' . $mail->ErrorInfo . '");</script>';
} else {
    echo '<script>alert("Email sent successfully.");</script>';
}
}
?>
