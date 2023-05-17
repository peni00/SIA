<?php
$conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>


<?php ob_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Archive</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product4.css'>
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
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Services.php">
                    <li>SERVICES</li>
                </a>
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Staffs.php">
                    <li>STAFFS</li>
                </a>

                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Appointment.php">
                    <li>APPOINTMENTS</li>
                </a>
                </a>
                <a href="" style="color:#349EFF">
                    <li>ARCHIVES</li>
                </a>
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Feedback.php">
                    <li>FEEDBACK</li>
                </a>
            </ul>
            <div class="admin">
                <img src="images/image10.png" class="user" style="width: 40px ">
                <button style="font-weight: 700"> <?php include 'admin_info.php'; ?><div class="dropdown">
                        <img src="images/dropd.png" alt="dropdown icon" class="dropdown-icon">
                        <div class="dropdown-content">
                            <a class="dropdown-item"
                                href="http://18.136.105.108:81/SIA/SIA/Admin/log_In/Profile1.php">View&nbsp;&nbsp;Profile</a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure to logout?');"
                                href="http://18.136.105.108:81/SIA/Admin/log_In/logout.php">Logout</a>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <!--sidebar-->

        <div class="container">
            <a href="http://18.136.105.108:81/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                    src="images/back-btn-gray.png" style="width: 30px"> </a>
            <h3>Home / <a href="#" style="color:#349EFF">Appointment</a></h3>
            <div class="ARCHIVE">
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Archives-Services.php"><button
                        class="serbtn1">SERVICE</button></a>
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Archives-Staff.php"><Button
                        class="stabtn">STAFF</Button></a>
                <a href="#"><Button class="appbtn1">APPOINTMENT</Button></a>
            </div>
        </div>
        <!--container-->
        <form method="post">
        <div class="sortby">
            <button type="submit">SORT BY</button>
            <select class="sort" name="sort">
                <option value="option0"></option>
                <option value="option1">Date and Time</option>
                <option value="option3">PENDING Status</option>
                <option value="option4">APPROVED Status</option>
                <option value="option5">CANCELED Status</option>
            </select>

        </div>
        <div class="table-container">
        <button type="submit" class="unbtn" name="delete" value="Delete" onclick="return confirm('ARE YOU SURE YOU WANT TO UNARCHIVED THIS ITEM/S!')">UNARCHIVED</button>
        <button type="submit" class="unbtn1" name="delete1" value="Delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS ITEM/S!')">DELETE</button>
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;">            </th>
                        <th style="text-align: center;">            </th>
                        <th style="text-align: center;">APPOINTMENT ID</th>
                        <th style="text-align: center;">CLIENT NAME</th>
                        <th style="text-align: center;">STAFF NAME</th>
                        <th style="text-align: center;">SERVICE</th>
                        <th style="text-align: center;">DATE AND TIME</th>
                        <th style="text-align: center;">APPOINTMENT STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
          

                     $sortOption = isset($_POST['sort']) ? $_POST['sort'] : '';
                     
                     // Set the default sort order if no option is selected
                     if (empty($sortOption)) {
                         $sortOption = 'appointment_tblarchive.id ASC';
                     }
                     
                     // Modify the $sql query and $sortOption depending on the selected option
                     if ($sortOption == 'option1') {
							 $sortOption = 'appointmenttblarchive.start_datetime ASC';
							 $sql = "SELECT appointmenttblarchive.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttblarchive.start_datetime, appointmenttblarchive.status
                             FROM appointmenttblarchive
                             JOIN account ON appointmenttblarchive.email = account.Email_Add
                             JOIN staff_tbl ON appointmenttblarchive.staffID = staff_tbl.staffID 
                             JOIN servicetypetbl ON appointmenttblarchive.serviceID = servicetypetbl.serviceID
                             ORDER BY $sortOption";
                     } elseif ($sortOption == 'option3') {
                             $sortOption = 'appointmenttblarchive.start_datetime ASC';
							 $sql = "SELECT appointmenttblarchive.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttblarchive.start_datetime, appointmenttblarchive.status
                             FROM appointmenttblarchive
                             JOIN account ON appointmenttblarchive.email = account.Email_Add
                             JOIN staff_tbl ON appointmenttblarchive.staffID = staff_tbl.staffID 
                             JOIN servicetypetbl ON appointmenttblarchive.serviceID = servicetypetbl.serviceID
                                 WHERE appointmenttblarchive.status = 'PENDING'
                                 ORDER BY $sortOption";
                     } elseif ($sortOption == 'option4') {
                             $sortOption = 'appointmenttblarchive.start_datetime ASC';
							 $sql = "SELECT appointmenttblarchive.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttblarchive.start_datetime, appointmenttblarchive.status
                             FROM appointmenttblarchive
                             JOIN account ON appointmenttblarchive.email = account.Email_Add
                             JOIN staff_tbl ON appointmenttblarchive.staffID = staff_tbl.staffID 
                             JOIN servicetypetbl ON appointmenttblarchive.serviceID = servicetypetbl.serviceID
                                 WHERE appointmenttblarchive.status = 'APPROVED'
                                 ORDER BY $sortOption";
                     } elseif ($sortOption == 'option5') {
                             $sortOption = 'appointmenttblarchive.start_datetime ASC';
							 $sql = "SELECT appointmenttblarchive.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttblarchive.start_datetime, appointmenttblarchive.status
                             FROM appointmenttblarchive
                             JOIN account ON appointmenttblarchive.email = account.Email_Add
                             JOIN staff_tbl ON appointmenttblarchive.staffID = staff_tbl.staffID 
                             JOIN servicetypetbl ON appointmenttblarchive.serviceID = servicetypetbl.serviceID
                             WHERE appointmenttblarchive.status = 'CANCELED'
                             ORDER BY $sortOption";
                     } else {
                             $sortOption = 'appointmenttblarchive.id ASC';
							 $sql = "SELECT appointmenttblarchive.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttblarchive.start_datetime, appointmenttblarchive.status
                             FROM appointmenttblarchive
                             JOIN account ON appointmenttblarchive.email = account.Email_Add
                             JOIN staff_tbl ON appointmenttblarchive.staffID = staff_tbl.staffID 
                             JOIN servicetypetbl ON appointmenttblarchive.serviceID = servicetypetbl.serviceID
                             ORDER BY $sortOption";
                     }
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
                    echo "<td></td>";
                    echo "<td><input type='checkbox' name='check[]' value='" . $row['id'] . "'> &nbsp;&nbsp;&nbsp;";
                    echo "<td style='text-align: center;'>" . $row['id'] . "</td>";
                    echo "<td style='text-align: center;'>" . $row['Name'] . "</td>";
                    echo "<td style='text-align: center;'>" . $row['staffName'] . "</td>";
                    echo "<td style='text-align: center;'>" . $row['serviceType'] . "</td>";
                    echo "<td style='text-align: center;'>" . $row['start_datetime'] . "</td>";
                    echo "<td style='text-align: center;'>"  . $row['status'] . "</td>";
                    echo "</tr>";
                    }
                    } else {
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                    }
 
                    ?>
                    
                </tbody>
                <?php
	if(isset($_POST['delete'])) {
    $all_id = $_POST['check'];
    if(!empty($all_id)) {
        $extract_id = implode(',' , $all_id);

        // Perform the insert operation
        $insert_query =  "INSERT INTO appointmenttbl (id, email, serviceID,staffID,start_datetime,end_datetime,status,datesubmitted)
        SELECT id,email, serviceID, staffID,start_datetime,end_datetime,status,datesubmitted
        FROM appointmenttblarchive
        WHERE id IN($extract_id)";

        $insert_query_run = mysqli_query($conn, $insert_query);

        // Check if insert operation was successful
        if($insert_query_run)
        {
            // Perform the delete operation
            $query = "DELETE FROM appointmenttblarchive WHERE id IN($extract_id) ";
            $query_run = mysqli_query($conn, $query);

            // Check if delete operation was successful
            if($query_run)
            {
                echo "Multiple Data Deleted and Archived Successfully";
                header('Location: Archives-Appointment.php');
                exit();
            }
            else
            {
                echo "Delete operation failed: " . mysqli_error($conn);
            }
        }
        else
        {
            echo "Insert operation failed: " . mysqli_error($conn);
        }
    } else {
        echo "No data selected to delete";
    }
}

if(isset($_POST['delete1']))
{
    $all_id = $_POST['check'];
    $extract_id = implode(',' , $all_id);


	// Perform the delete operation
    $query = "DELETE FROM appointmenttblarchive WHERE appointmenttblarchive.id IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    // Check if both operations were successful
    if($query_run )
    {
        echo "Multiple Data Deleted and Archived Successfully";
        header('Location: Archives-Appointment.php');
        exit();
    }
    else if(!$query_run)
    {
        echo "Multiple Data Deleted, but Archive Failed: " . mysqli_error($conn);
    }
    else
    {
        echo "Multiple Data Not Deleted or Archived";
    }
	mysqli_close($conn);
}

		?>
            </table>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
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
