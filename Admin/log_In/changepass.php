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
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>RFG ELITE | Change Password</title>
    <link rel="stylesheet" href="changepass.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    <section class="Anton Antonio C1C1C1 D9D9D9 EFF Ellipse FFFFFF Lato Rectangle absolute admin align-items background border border-box border-radius box box-shadow box-sizing calc50 center color copyright display enter-email flex font-family font-size font-style font-weight height identical left line-height normal password position px px2 rfg rgba0 rgba70 show-pass sign-in solid text-align to top u-clearfix u-custom-color-4 width u-section-1" id="sec-5ff7">

        <div class="background-img">
            <img class="u-expanded-height u-image u-image-contain u-image-1" src="images/gym2.png" data-image-width="672" data-image-height="371">
        </div>
        
        <div class="parent-box">
            <div class="box-form ">
                <div class="box-form-head">
                    <img class="logo-img" src="images/logo-modified.png" alt="" data-image-width="362" data-image-height="362">
                    <h1>RFG​ ELITE</h1>
                    <p>CHANGE PASSWORD</p>
                </div>
                <form id="passwordForm"  method="POST" style=" padding: 50px;" name="form">

                    <div for="newPassword" class="u-form-group u-form-name u-label-none ">
                        <input  type="password" placeholder="New Password" id="newPassword" name="adminID" class="u-input u-input-rectangle u-text-black" required>
                    </div>
                    <div for="confirmPassword" class="u-form-group u-form-name u-label-none">
                        <input  type="password" placeholder="Confirm Password" id="confirmPassword" name="password" class="u-input u-input-rectangle u-text-black" required>
                    </div>
                    <p id="passwordMatchError" style="color: red; display: none;">Passwords do not match</p><br>
                    <div class="u-form-checkbox u-form-group u-label-none">
                        <label class="label-showpass u-custom-font u-field-label u-font-lato u-text-body-alt-color" >
                            <input type="checkbox"  onchange="togglePasswordVisibility()"  id="showPassword" class=" u-border-2 u-border-white border-radius-10 u
                                u-field-input u-hover-grey-40">&nbsp;&nbsp;Show Password</label>
                    </div>

                    <button class="button-sign u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-3
                            u-custom-font u-font-lato u-radius-3 u-btn-1" type="submit" name="form"  value="Change Password">CHANGE PASSWORD</button>
                        <?php if (isset($_SESSION['error'])) { ?>
                            <h6> <?= $_SESSION['error'] ?>  </h6> 
                        <?php }?>
                </form>
            </div>



            <div class="footer">
                <p> © Copyright 2023, RFG Elite - Rod’s
                    Fitness Gym<br>All Rights Reserved.
                </p>
            </div>
        </div>
    </section>
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