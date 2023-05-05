<?php
    include 'includes/session.php';
    include 'includes/slugify.php';

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $slug = slugify($name);
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];

		$conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE equipments SET name=?, slug=?, category_id=?, quantity=?, description=? WHERE id=?");
        $stmt->bind_param("sssisi", $name, $slug, $category, $quantity, $description, $id);
        if($stmt->execute()){
            $_SESSION['status'] = 'Equipment updated successfully';
            $_SESSION['status_code'] = 'success';
        }
        else{
            $_SESSION['error'] = $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    else{
        $_SESSION['status'] = 'Fill up edit equipment form first';
        $_SESSION['status_code'] = 'error';
    }

    header('location: equipments.php');
?>
