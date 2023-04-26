<?php
$conn = mysqli_connect("sbit3f-gym.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Archive</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product2.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='transaction1.css'>

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

                <a href="http://localhost/SIA/Admin/GYM/GYM/Appointment.php">
                    <li>APPOINTMENTS</li>
                </a>
                </a>
                <a href="#" style="color:#349EFF">
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
            <div class="ARCHIVE">
                <a href="#"><button class="serbtn">SERVICE</button></a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archives-Staff.php"><Button
                        class="stabtn">STAFF</Button></a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archives-Appointment.php"><Button
                        class="appbtn">APPOINTMENT</Button></a>
            </div>
        </div>
       <!--container-->

<div class="table-container">

<form method="POST">
   <button type="submit" class="unbtn" name="delete" value="Delete" onclick="return confirm('ARE YOU SURE YOU WANT TO UNARCHIVED THIS ITEM/S!')">UNARCHIVED</button>

    <table>
        <thead>
            <tr>
                <th width="200"></th>
                <th>SERVICE ID</th>
                <th>SERVICES</th>
                <th>DETAILS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to retrieve data from servicetypetbl
            $sql = "SELECT * FROM servicetypetblarchive";

            // Execute the query and get the result set
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo "<td><input type='checkbox' name='check[]' value='" . $row['serviceID'] . "'>&nbsp;&nbsp;&nbsp;";
                echo '<td>' . $row['serviceID'] . '</td>';
                echo '<td>' . $row['serviceType'] . '</td>';
                echo '<td>' . $row['serviceDescription'] . '</td>';
                echo '</tr>';
            }
            ?>

        </tbody>
    </table>
	</form>
	
	 <!-- DELETE -->

    <?php
     if(isset($_POST['delete']))
{
    $all_id = $_POST['check'];
    $extract_id = implode(',' , $all_id);

    // Perform the insert operation
    $insert_query = "INSERT INTO servicetypetbl (serviceID, serviceType, serviceDescription)
                     SELECT serviceID, serviceType, serviceDescription
                     FROM servicetypetblarchive
                     WHERE serviceID IN($extract_id)";
					 
    $insert_query_run = mysqli_query($conn, $insert_query);
	
	// Perform the delete operation
    $query = "DELETE FROM servicetypetblarchive WHERE serviceID IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    // Check if both operations were successful
    if($query_run && $insert_query_run)
    {
        echo "Multiple Data Deleted and Archived Successfully";
        header('Location: http://localhost/SIA/Admin/GYM/GYM/Archives-Services.php');
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
