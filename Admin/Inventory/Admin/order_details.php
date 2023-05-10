<?php include ('includes/session.php');?>
<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/menubar.php');
?>

<div class="container-fluid mb-5">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4><b>Order Name</b></h4>
					</div>
					<div class="card-body">
						<table class="table table-bordered" id="example2">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Order ID</th>
								<th class="text-center">Customer Name</th>
								<th class="text-center">Contact Number</th>
								<th class="text-center">Product Name</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Price</th>
								<th class="text-center">Total</th>
								
								
							</thead>
							<tbody>
                            <?php
								$id = $_GET['id'];
								$i = 1;
                                $conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

                                if($conn->connect_error){
                                    die("Connection failed: " . $conn->connect_error);
                                }

								 $query = "SELECT products.*, account.*, transaction.* FROM products INNER JOIN transaction ON products.id = transaction.Product_ID 
								 INNER JOIN account ON account.Account_ID = transaction.Account_ID
								 where Order_ID = '$id'  order by Date desc;";

							

								 $result = $conn->query($query);

								 if ($result->num_rows > 0)
								 {
								 while($row = $result->fetch_assoc())
								 {
									
									 
									 $orderstatus = $row['Status'];
									 $address = $row["Street"] . ", " . $row["Barangay"] . ", " . $row["City"]. ", " .$row["Zip_Code"]."<br>";
									
									 $customer_name = $row['Fname'] . ", " . $row['Lname'];
									 
									 if($orderstatus ==  "Delivered"){
                                        $badge_class = 'badge-success';
                                    } elseif($orderstatus ==  "To Pack"){
                                        $badge_class = 'badge-info';
                                    } elseif($orderstatus ==  "To Delivered"){
                                        $badge_class = 'badge-secondary';
                                    } elseif($orderstatus ==  "Order Received"){
                                        $badge_class = 'badge-secondary';
									}
									
                                    ?>
                                    <tr>

                                        <td class="text-center"><?php echo $i++ ?></</td>
                                        <td class="text-center"><a  href="order.php"><?php echo $row['Order_ID'] ?></a></td>
                                        <td class="text-center"><?php echo $customer_name ?></td>
                                        <td class="text-center"><?php echo $row['Contact_Num'] ?></td>
										<td class="text-center"><?php echo $row['name'] ?></td>
										<td class="text-center"><?php echo $row['Qty'] ?></td>
										<td class="text-center"><?php echo $row['Price'] ?></td>
										<td class="text-center"><?php echo $row['Total'];?></td>
                                    </tr>
                                    <?php
                                	 }
								 }

                                $conn->close();
                                ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>

<?php include 'includes/inventory_modal.php'; ?>
<?php include 'includes/inventory_modal2.php'; ?>
<?php
 include('includes/scripts.php');
 include('includes/footer.php');
 ?>
</body>
</html>