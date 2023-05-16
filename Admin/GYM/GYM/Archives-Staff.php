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
    <link rel='stylesheet' type='text/css' media='screen' href='css/product3.css'>
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
                <a href="#" style="color:#349EFF">
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
                <a href="#"><Button class="stabtn1">STAFF</Button></a>
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Archives-Appointment.php"><Button
                        class="appbtn">APPOINTMENT</Button></a>
            </div>
        </div>
               <!--container-->

          <div class="sortby">
  <form method="POST">
   <button type="submit" >SORT BY</button>
    <select class="sort" name="sort">
      <option value="option0"></option>
      <option value="option1">Name</option>
      <option value="option3">Service Category</option>
    </select>
    
  </form>
</div>



</div>
<div class="table-container">
<form method="POST">
<button type="submit" class="unbtn" name="delete" value="Delete" onclick="return confirm('ARE YOU SURE YOU WANT TO UNARCHIVED THIS ITEM/S!')">UNARCHIVED</button>
<button type="submit" class="unbtn1" name="delete1" value="Delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS ITEM/S!')">DELETE</button>
<table>
    <thead>
                        <tr>
                            <th width="100"></th>
                            <th width="120">STAFF ID</th>
                            <th width="120">NAME</th>    
                            <th width="120">SERVICE CATEGORY</th>
                            <th width="120" style="text-align:center;" >IMAGE</th>
                        </tr>
                    </thead>
      <tbody>
      
        <?php
		
		
// Get the value of the selected option in the dropdown
$sortOption = isset($_POST['sort']) ? $_POST['sort'] : '';

// Set the default sort order if no option is selected
if (empty($sortOption)) {
    $sortOption = 'staff_tblarchive.staffID ASC';
}

// Modify the $sql query to order by the appropriate column depending on the selected option
if ($sortOption == 'option1') {
    $sortOption = 'staff_tblarchive.staffName ASC';
} elseif ($sortOption == 'option3') {
    $sortOption = 'servicetypetbl.serviceType ASC';
} else {
    $sortOption = 'staffID ASC';
}

   // Query data from database
$sql = "SELECT staff_tblarchive.staffID, staff_tblarchive.staffName,  servicetypetbl.serviceType, staff_tblarchive.staffImage
        FROM staff_tblarchive
        JOIN servicetypetbl ON staff_tblarchive.serviceID = servicetypetbl.serviceID
        ORDER BY $sortOption";

$result = mysqli_query($conn, $sql);
// Display data in HTML table
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sid = $row['staffID'];
        $sname = $row['staffName'];
        $service = $row['serviceType'];
        $simage = base64_encode($row['staffImage']);

        echo "<tr>";
        echo "<td><input type='checkbox' name='check[]' value='" . $row['staffID'] . "'>&nbsp;&nbsp;&nbsp;";
        echo "<td>" . $row['staffID'] . "</td>";
        echo "<td>" . $row['staffName'] . "</td>";
        echo "<td>" . $row['serviceType'] . "</td>";
        echo "<td style='text-align: center;'><img src='data:image/jpeg;base64," . $simage . "' width='120'></td>"; // display image using base64
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}
               
?>


                </tbody>
            </table>
        </form>
        <?php
      
        if(isset($_POST['delete']))
   {
       $all_id = $_POST['check'];
       $extract_id = implode(',' , $all_id);
   
       // Perform the insert operation
       $insert_query =  "INSERT INTO staff_tbl (staffID, staffName, serviceID, imageName, staffImage)
       SELECT staffID,staffName, serviceID, imageName, staffImage
       FROM staff_tblarchive
       WHERE staffID IN($extract_id)";
                        
       $insert_query_run = mysqli_query($conn, $insert_query);	
       // Perform the delete operation
       $query = "DELETE FROM staff_tblarchive WHERE staff_tblarchive.staffID IN($extract_id) ";
       $query_run = mysqli_query($conn, $query);
   
       // Check if both operations were successful
       if($query_run && $insert_query_run)
       {
           echo "Multiple Data Deleted and Archived Successfully";
           header('Location: Archives-Staff.php');
           exit();
       }
       else if(!$insert_query_run)
       {
           echo "Multiple Data Deleted, but Archive Failed: " . mysqli_error($conn);
       }
       else
       {
           echo "Multiple Data Not Deleted or Archived";
       }
   }
 
        if(isset($_POST['delete1']))
{
    $all_id = $_POST['check'];
    $extract_id = implode(',' , $all_id);


	// Perform the delete operation
    $query = "DELETE FROM staff_tblarchive WHERE staff_tblarchive.staffID IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    // Check if both operations were successful
    if($query_run )
    {
        echo "Multiple Data Deleted and Archived Successfully";
        header('Location: Archives-Staff.php');
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
