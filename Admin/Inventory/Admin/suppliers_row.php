<?php
    include 'includes/session.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT *, inventory.id AS inventid, suppliers.name AS suppname FROM inventory LEFT JOIN suppliers ON suppliers.id=inventory.suppliers_id WHERE inventory.id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        header('Content-Type: application/json');
        echo json_encode($row);
        exit;
    }
?>
