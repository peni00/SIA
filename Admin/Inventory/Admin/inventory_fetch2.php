<?php
include 'includes/session.php';

$options = array(); // Array to store options

$mysqli = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM products";
$result = $mysqli->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $options[] = array('id' => $row['id'], 'name' => $row['name']);
    }
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($options);
?>
