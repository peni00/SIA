<?php
    include 'includes/session.php';
    include 'includes/slugify.php';

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $slug = slugify($name);
        $category = $_POST['category'];
        $price = $_POST['price'];
        $remarks = $_POST['remarks'];
        $description = $_POST['description'];

		$conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE prodarchive SET name=?, slug=?, category_id=?, price=?, remarks=?, description=? WHERE id=?");
        $stmt->bind_param("sssissi", $name, $slug, $category, $price, $remarks, $description, $id);
        if($stmt->execute()){
            $_SESSION['status'] = 'Product updated successfully';
            $_SESSION['status_code'] = 'success';
        }
        else{
            $_SESSION['error'] = $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    else{
        $_SESSION['status'] = 'Fill up edit Product form first';
        $_SESSION['status_code'] = 'error';
    }

    header('location: archive_products.php');
?>
