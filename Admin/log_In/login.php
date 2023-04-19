<?php
require ('../connection.php');

if(isset($_POST['form'])){
    $adminID = $_POST['adminID'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE adminID = '$adminID'";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) < 1){
        $_SESSION['error'] = 'Cannot find account with the User ID';
    }
    else{
        $row = mysqli_fetch_assoc($query);
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

header('location: homepage.php');
?>
