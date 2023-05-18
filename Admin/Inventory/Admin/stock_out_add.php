<?php
ob_start();

include 'includes/session.php';

if (isset($_POST['add'])) {
    $supply = $_POST['supply'];
    $customers = $_POST['customers'];
    $quantity = $_POST['quantity'];
    $stock_type = $_POST['stock_type'];
    $pro_price = isset($_POST['pro_price']) ? $_POST['pro_price'] : array();
    $date = $_POST['date'];
    $uname = $_POST['name'];
    $order_id = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(9/strlen($x)) )),1,9);
    $method = "Cash";
    $deliver = "Delivered";
    $street = $_POST['street'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $zip_code = $_POST['zip'];
    $total_price = $_POST['total_price'];


    try {
        $conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com", "admin", "sbit3fruben", "sbit3f");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Loop through the supplies
        for ($i = 0; $i < count($supply); $i++) {
            $supply_id = $supply[$i];

            $inn_stmt = $conn->prepare("SELECT SUM(qty) AS inn FROM inventory WHERE stock_type = 1 AND supply_id = ?");
            $inn_stmt->bind_param('i', $supply_id);
            $inn_stmt->execute();
            $inn_result = $inn_stmt->get_result();
            $inn = $inn_result->fetch_assoc()['inn'] ?? 0;

            $out_stmt = $conn->prepare("SELECT SUM(qty) AS `out` FROM inventory WHERE stock_type = 2 AND supply_id = ?");
            $out_stmt->bind_param('i', $supply_id);
            $out_stmt->execute();
            $out_result = $out_stmt->get_result();
            $out = $out_result->fetch_assoc()['out'] ?? 0;

            $available = $inn - $out;

            if ($quantity[$i] > $available) {
                $_SESSION['status'] = 'Out of Available Stock';
                $_SESSION['status_code'] = 'warning';
                mysqli_close($conn);
                header('location: stock_out.php');
                exit();
            }

            try {
                $stmt = $conn->prepare("INSERT INTO inventory (supply_id, customer_id, qty, stock_type, amount, date_created) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param('iiidss', $supply_id, $customers, $quantity[$i], $stock_type, $pro_price[$i], $date);
                $stmt->execute();

                $detail_query = $conn->prepare("INSERT INTO transaction (Product_ID, `Account_ID`, `Order_ID`, `Name`, Date, Payment_Method, `Status`, `Total`, `Qty`, `Price`, `Street`, `Barangay`, `City`, `Zip_Code`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $detail_query->bind_param('iisssssssssssi', $supply_id, $customers, $order_id, $uname, $date, $method, $deliver, $total_price, $quantity[$i], $pro_price[$i], $street, $barangay, $city, $zip_code);
                $detail_query->execute();

                $_SESSION['status'] = 'Supply Stock Out successfully';
                $_SESSION['status_code'] = 'success';
            } catch (mysqli_sql_exception $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }

        mysqli_close($conn);
        header('location: stock_out.php');
        exit();
    } catch (mysqli_sql_exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header('location: stock_out.php');
        exit();
    }
} else {
    $_SESSION['error'] = 'Fill up Manage Stock Out Supply form first';
    header('location: stock_out.php');
    exit();
}

ob_end_flush(); // Flush buffered output
?>

