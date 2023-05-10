<?php
	require "includes/mail.php";

	$con = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f") or die(mysqli_error($con));

    session_start();

	$Order_ID=$_GET['id'];


	$order_query = mysqli_query($con, "SELECT  account.*, transaction.* FROM transaction INNER JOIN account ON account.Account_ID = transaction.Account_ID WHERE Order_ID ='$Order_ID'");
	if(mysqli_num_rows($order_query) >= 0)
	{
	while($order_item = mysqli_fetch_assoc($order_query))
	{
	$Email_Add = $order_item['Email_Add'];
	$Account_ID = $order_item['Account_ID'];
	$Order_ID = $order_item['Order_ID'];
	$Product_ID = $order_item['Product_ID'];
	$Date = $order_item['Date'];
	$Payment_Method = $order_item['Payment_Method'];
	$Qty = $order_item['Qty'];
	$Total = $order_item['Total'];
	$Price = $order_item['Price'];
	$Status = $order_item['Status'];


	if ($Status == "To Pack"){
    $update_query="Update transaction SET Status = 'Ready to Ship' WHERE Order_ID ='$Order_ID'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));



	global $con;
	$email = $Email_Add;
	$email = addslashes($email);
	//send email here
	send_mail($email,'Order Status',"Your Order is Ready to Ship");


    header('location: ../Admin/order.php');
	}else if ($Status == "Ready to Ship"){
	$update_query="Update transaction SET Status = 'Out for Delivery' WHERE Order_ID ='$Order_ID'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));



	global $con;
	$email = $Email_Add;
	$email = addslashes($email);
	//send email here
	send_mail($email,'Order Status',"Your Order is Out for Delivery");


    header('location: ../Admin/order.php');
	}else if ($Status == "Out for Delivery"){
	$update_query="Update transaction SET Status = 'Delivered' WHERE Order_ID ='$Order_ID'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));



	global $con;
	$email = $Email_Add;
	$email = addslashes($email);
	//send email here
	send_mail($email,'Order Status',"Your Order is Delivered");


    header('location: ../Admin/order.php');
	}else{

	$update_query="INSERT INTO `sales`(`Account_ID`, `Order_ID`, `Product_ID`, `Date`, `Payment_Method`, `Qty`, `Total`, `Price`)
	VALUES ('$Account_ID','$Order_ID','$Product_ID','$Date','$Payment_Method','$Qty','$Total','$Price')";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));



	global $con;
	$email = $Email_Add;
	$email = addslashes($email);
	//send email here
	send_mail($email,'Order Status',"Your Order is Delivered");



	// $update_query="delete from transaction WHERE Order_ID ='$Order_ID'";
    // $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));
    header('location: ../Admin/order.php');
	}
	};
	};
?>