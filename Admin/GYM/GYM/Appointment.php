<?php

$conn = mysqli_connect("sbit3f-gym.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");


if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


?>
<?php
ob_start()
?>







<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Appointments</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='transaction.css'>

    <link rel="icon" type="image/x-icon" href="images/logo.png">
</head>

<body>
    <div class="main">
        <div class="sidebar">
            <header>
                <img src="images/logo.png" style="width:60px; clip-path: circle()">
                <h1>RFG ELITE</h1>
            </header>
            <ul class="sname">
                <a href="http://localhost/SIA/Admin/GYM/GYM/services.php">
                    <li>SERVICES</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Staffs.php">
                    <li>STAFFS</li>
                </a>

                <a href="#" style="color:#349EFF">
                    <li>APPOINTMENTS</li>
                </a>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archives-Services.php">
                    <li>ARCHIVES</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Feedback.php">
                    <li>FEEDBACK</li>
                </a>
            </ul>
            <div class="admin">
                <img src="images/image10.png" class="user" style="width: 40px">
                <button style="font-weight: 700">Admin Rod
                    <img src=" images/dropd.png" style="width:25px">
                </button>
            </div>
        </div>
        <!--sidebar-->

        <div class="container">
            <a href="http://localhost/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                    src="images/back-btn-gray.png" style="width: 30px"> </a>
            <h3>Home / <a href="#" style="color:#349EFF">Appointment</a></h3>

        </div>
        <!--container-->

        <div class="sortby">

            <button for="sort">SORT BY</button>
            <select class="sort">
                <option value="option0"></option>
                <option value="option1">Date and Time</option>
                <option value="option2">Membership</option>
                <option value="option3">Appointment Status</option>
            </select>

        </div>
        <div class="table-container">

            <button type="button" class="unbtn">UNARCHIVE</button>

            <table>
                <thead>
                    <tr>
                        <th>
                        </th>
						
                        <th>APPOINTMENT ID</th>
                        <th>CLIENT NAME</th>
                        <th>STAFF NAME</th>
                       
                        <th>SERVICE</th>
                        <th>DATE AND TIME</th>
                        <th>APPOINTMENT STATUS</th>
                    </tr>
                </thead>
                <tbody>
				
				     <?php
            // Query data from database
            $sql = "select
					appointment_tbl.id, account.Name, stafftbl.staffName, servicetypetbl.serviceType, appointment_tbl.start_datetime, appointment_tbl.status
					FROM appointment_tbl
					JOIN account
					ON appointment_tbl.email = account.Email_Add
					JOIN stafftbl
					ON appointment_tbl.staffID = stafftbl.staffID 
					JOIN servicetypetbl
					ON appointment_tbl.serviceID = servicetypetbl.serviceID

";
            $result = mysqli_query($conn, $sql);

            // Display data in HTML table
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $appointmentid = $row['id'];
                    $cname = $row['Name'];
                    $sname = $row['staffName'];
					$service = $row['serviceType'];
					$dnt = $row['start_datetime'];
					$sname = $row['status'];
                
                    echo "<tr>";
				echo "<td style='text-align: center;'></td>";

        			          echo "<td>" . $row['id'] . "</td>";
             			       echo "<td >" . $row['Name'] . "</td>";
			    		echo "<td>" . $row['staffName'] . "</td>";
					echo "<td >" . $row['serviceType'] . "</td>";
					echo "<td>" . $row['start_datetime'] . "</td>";
					echo "<td >" . $row['status'] . "</td>";
                  			  echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
           
            ?>
                   
                </tbody>
            </table>
        </div>

        <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>
</body>

</html>
