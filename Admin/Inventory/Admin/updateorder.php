<?php
	require "includes/mail.php";

	$con = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f") or die(mysqli_error($con));

    session_start();

	$Order_ID = $_GET['id'];

	$order_query = mysqli_query($con, "SELECT account.*, transaction.*, products.*
									   FROM transaction
									   INNER JOIN account ON account.Account_ID = transaction.Account_ID
									   INNER JOIN products ON products.id = transaction.Product_ID
									   WHERE transaction.Order_ID = '$Order_ID'");

	if(mysqli_num_rows($order_query) >= 0)
	{
	while($order_item = mysqli_fetch_assoc($order_query))
	{
	$product_name[] = $order_item['name'];
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

    $product_price = $order_item['Price'] * $order_item['Qty'];
	$price_total += $product_price;

	if ($Status == "To Pack"){
    $update_query="Update transaction SET Status = 'Ready to Ship' WHERE Order_ID ='$Order_ID'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));



	global $con;
	$email = $Email_Add;
	$email = addslashes($email);
    $total_product = implode(',',$product_name);

	//send email here

	send_mail($email,'Order Status' ,"<h3>Your Order Identification # " .$Order_ID. " is Ready to Ship</h3><div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
         </div>
         <div class='customer-details'>
		    <span class='total'> total :  ₱".$price_total." </span>
            <p>(*pay when product arrives*)</p>
         </div>
         </div>
      </div>, Pls wait for your order to arrived, Thank you.");



    header('location: ../Admin/order.php');
	}else if ($Status == "Ready to Ship"){
	$update_query="Update transaction SET Status = 'Out for Delivery' WHERE Order_ID ='$Order_ID'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));



	global $con;
	$email = $Email_Add;
	$email = addslashes($email);
	//send email here

	send_mail($email,'Order Status' ,"<h3>Your Order Identification # " .$Order_ID. "  is Out for Delivery</h3><div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
         </div>
         <div class='customer-details'>
		    <span class='total'> total :  ₱".$price_total." </span>
            <p>(*pay when product arrives*)</p>
         </div>
         </div>
      </div>, Pls wait for your order to arrived, Thank you.");

    header('location: ../Admin/order.php');
	}else if ($Status == "Out for Delivery"){
	$update_query="Update transaction SET Status = 'Delivered' WHERE Order_ID ='$Order_ID'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));



	global $con;
	$email = $Email_Add;
	$email = addslashes($email);

	//send email here

	send_mail($email,'Order Status' ,"<h3>Your Order Identification # " .$Order_ID. " is Delivered</h3><div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
         </div>
         <div class='customer-details'>
		    <span class='total'> total :  ₱".$price_total." </span>
            <p>(*pay when product arrives*)</p>
         </div>
         </div>
      </div>, Pls wait for your order to arrived, Thank you.");

    header('location: ../Admin/order.php');
	}else{

	$update_query="INSERT INTO `sales`(`Account_ID`, `Order_ID`, `Product_ID`, `Date`, `Payment_Method`, `Qty`, `Total`, `Price`)
	VALUES ('$Account_ID','$Order_ID','$Product_ID','$Date','$Payment_Method','$Qty','$Total','$Price')";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));


	// $update_query="delete from transaction WHERE Order_ID ='$Order_ID'";
    // $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));
    header('location: ../Admin/order.php');
	}
	};
	};
?>