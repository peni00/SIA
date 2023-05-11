<?php
session_start(); // start the session
require('../../connection.php');

if(isset($_SESSION['admin'])) { // check if the admin is logged in
  $adminID = $_SESSION['admin']; // get the admin's ID from the session variable
  
  
  // create a query to retrieve the category and fullname of the admin with the given ID
  $query = "SELECT category, fullname FROM admin WHERE id = '$adminID'";
  
  // execute the query
  $result = mysqli_query($conn, $query);
  
  
  // check if the query was successful
  if($result && mysqli_num_rows($result) > 0) {
    // get the row containing the admin's data
    $row = mysqli_fetch_assoc($result);
    
    // display the category and fullname
    echo $row['category'] . ' ' . $row['fullname'];
  }
}

?>
