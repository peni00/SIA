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
								<th class="text-center">Date</th>
								<th class="text-center">Address</th>
								<th class="text-center">Payment Method</th>
								<th class="text-center">Status</th>
								<th class="text-center">Action</th>
							</thead>
							<tbody>
                            <?php
								$i = 1;
                                $conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

                                if($conn->connect_error){
                                    die("Connection failed: " . $conn->connect_error);
                                }



								 $query = "SELECT transaction.* , account .Fname, account .Lname
								 FROM transaction transaction
								 INNER JOIN account account  ON account .Account_ID = transaction.Account_ID
								 GROUP BY Order_ID
								 ORDER BY Date DESC";

								 $result = $conn->query($query);

								 if ($result->num_rows > 0)
								 {
								 while($row = $result->fetch_assoc())
								 {

									$fullname = $row["Fname"] . ", " . $row["Lname"];

									 $orderstatus = $row['Status'];

									 $address = $row["Street"] . ", " . $row["Barangay"] . ", " . $row["City"]. ", " .$row["Zip_Code"]."<br>";

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
                                        <td class="text-center"><a  href="order_details.php?id=<?php echo $row['Order_ID'] ?>"><?php echo $row['Order_ID'] ?></a></td>
                                        <td class="text-center"><?php echo $fullname ?></td>
                                        <td class="text-center"><?php echo $row['Date'] ?></td>
										<td class="text-center"><?php echo $address ?></td>
										<td class="text-center"><?php echo $row['Payment_Method'] ?></td>
										<td class="text-center"> <span class="badge <?php echo $badge_class ?>"><?php echo $row['Status'] ?></span></td>
										<td class="text-center"><a class="btn btn-primary btn-sm btn-flat" href="updateorder.php?id=<?php echo $row['Order_ID'];?>">Update</a></td>
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