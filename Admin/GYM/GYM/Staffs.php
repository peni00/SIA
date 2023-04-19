<?php

$conn = mysqli_connect("sbit3f-gym.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");


if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


?>




<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Staffs</title>
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
                <a href="#" style="color:#349EFF">
                    <li>STAFFS</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Appointment.php">
                    <li>APPOINTMENTS</li>
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
            <div class="search-bar">
                <input type="text" placeholder="Search.." name="search">
                <button><img src="images/search.png"></button>
            </div>
        </div>




        <!--container-->
        <div class="table-container">
            <button type="button" class="unbtn">DELETE</button>
            <table>
                <thead>
                    <tr>
                        <th width="100"></th>
                        <th width="120">STAFF ID</th>
                        <th width="120">NAME</th>
                        <th width="120">POSITION</th>
                        <th width="120">SERVICE CATEGORY</th>
                        <th width="120" style="text-align: center;">IMAGE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                             <?php
            // Query data from database
            $sql = "SELECT stafftbl.staffID, stafftbl.staffName, stafftbl.staffPosition, servicetypetbl.serviceType, stafftbl.staffImage
					FROM appointment_tbl
					JOIN stafftbl ON appointment_tbl.staffID = stafftbl.staffID
					JOIN servicetypetbl ON appointment_tbl.serviceID = servicetypetbl.serviceID;


";
            $result = mysqli_query($conn, $sql);

            // Display data in HTML table
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $sid = $row['staffID'];
                    $sname = $row['staffName'];
                    $spos = $row['staffPosition'];
					$service = $row['serviceType'];
					$simage = $row['staffImage'];
				
                
                    echo "<tr>";
            echo "<td><input type='checkbox'>&nbsp;&nbsp;&nbsp;<button class='deleteBtn' data-bs-toggle='modal' data-bs-target='#exampleModal2' for='click'>EDIT</button></td>";
            echo "<td>" . $row['staffID'] . "</td>";
            echo "<td>" . $row['staffName'] . "</td>";
            echo "<td>" . $row['staffPosition'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['serviceType'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['staffImage'] . "</td>";
            echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
           
            ?>
                    </tr>

                </tbody>
            </table>
        </div>

        <!--Add-product-->

        <div class="Add-product">
            <input type="checkbox" id="click">
            <label for="click" type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                for="click">
                <img src="images/add.png">
            </label>
            <div class="prod-content">
                <h1>STAFF DETAILS</h1>
                <div class="prod-info">
                    <label class="upload-photo">
                        <p><img src="Image/photo.png"></p><input type="file" name="myImage" accept="image/*">
                    </label></br>
                    <label>Staff ID: </label>
                    <input type="text" class="txt"><br />
                    <label>Name: </label>
                    <input type="text" class="txt"><br />
                    <label>Position: </label>
                    <input type="text" class="txt"><br />
                    <label>Service Category: </label>
                    <input type="text" class="txt">
                </div>
                <div class="buttons">
                    <button type="button" class="close-btn1" data-bs-dismiss="modal">CANCEL</button>
                    <button type="button" class="add-btn">CONFIRM</button>
                </div>
            </div>
        </div>
    </div>

    <!--Delete-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="delete-modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p><b>you sure you want to delete this product?</b></p>
                    </div>
                    <div class="delete-confirmation">
                        <button type="button" class="dlt-confirm">Confirm</button>
                        <button type="button" class="close-btn" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="edit-modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1>STAFF DETAILS</h1>
                        <div class="prod-info">
                            <label class="upload-photo">
                                <p><img src="Image/photo.png"></p><input type="file" name="myImage" accept="image/*">
                            </label></br>
                            <label>Staff ID: </label>
                            <input type="text" class="txt"><br />
                            <label>Name: </label>
                            <input type="text" class="txt"><br />
                            <label>Position: </label>
                            <input type="text" class="txt"><br />
                            <label>Service Category: </label>
                            <input type="text" class="txt">
                        </div>
                        <div class="edit-confirmation1">
                            <button type="button" class="edit-confirm1">SAVE CHANGES</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>
