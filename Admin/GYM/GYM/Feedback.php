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
    <title>Feedback</title>
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
                <a href="services.php">
                    <li>SERVICES</li>
                </a>
                <a href="Staffs.php">
                    <li>STAFFS</li>
                </a>

                <a href="Appointment.php">
                    <li>APPOINTMENTS</li>
                </a>
                </a>
                <a href="Archives-Services.php">
                    <li>ARCHIVES</li>
                </a>
                <a href="#" style="color:#349EFF">
                    <li>FEEDBACK</li>
                </a>
            </ul>
            <div class="admin">
                <img src="images/image10.png" class="user" style="width: 40px ">
                <button style="font-weight: 700"> <?php include 'admin_info.php'; ?><div class="dropdown">
                        <img src="images/dropd.png" alt="dropdown icon" class="dropdown-icon">
                        <div class="dropdown-content">
                            <a class="dropdown-item"
                                href="http://18.136.105.108/SIA/SIA/Admin/log_In/Profile1.php">View&nbsp;&nbsp;Profile</a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure to logout?');"
                                href="http://18.136.105.108/SIA/Admin/log_In/logout.php">Logout</a>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <!--sidebar-->

        <div class="container">
            <a href="http://18.136.105.108/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                    src="images/back-btn-gray.png" style="width: 30px"> </a>
            <h3>Home / <a href="#" style="color:#349EFF">Appointment</a></h3>

        </div>
        <!--container-->
        <form method="POST">
        <div class="table-container">

        <button type="submit" class="unbtn" name="delete" value="Delete" onclick="return confirm('are you sure want to delete!')">DELETE</button>

            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;">            </th>
                        <th style="text-align: center;">            </th>
                        <th style="text-align: center;">            </th>
                        <th style="text-align: center;">REVIEW ID</th>
                        <th style="text-align: center;">            </th>
                        <th style="text-align: center;">ACCOUNT ID</th>
                        <th style="text-align: center;">            </th>
                        <th style="text-align: center;">COMMENTS</th>
                        <th style="text-align: center;">            </th>
                        <th style="text-align: center;">DATE SUBMITTED</th>                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $sql="SELECT *FROM reviewtbl";
                    $result = mysqli_query($conn, $sql);

    // Display data in HTML table
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $reviewsID = $row['reviewsID'];
        $accountID = $row['Account_ID'];
        $comments = $row['Comments'];
        $ds = $row['dateSubmitted'];
       
    
         echo "<tr>";
echo "<td></td>";
echo "<td><input type='checkbox' name='check[]' value='" . $row['reviewsID'] . "'> &nbsp;&nbsp;&nbsp;";
echo "<td></td>";
echo "<td style='text-align: center;'>" . $row['reviewsID'] . "</td>";
echo "<td></td>";
echo "<td style='text-align: center;'>" . $row['Account_ID'] . "</td>";
echo "<td></td>";
echo "<td style='text-align: center;'>" . $row['Comments'] . "</td>";
echo "<td></td>";
echo "<td style='text-align: center;'>" . $row['dateSubmitted'] . "</td>";
echo "</tr>";

       
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}
?>
                    </tr>
                    </tr>
                </tbody>

            <!-- DELETE -->

 <?php
     if(isset($_POST['delete']))
{
    $all_id = $_POST['check'];
    $extract_id = implode(',' , $all_id);
  				 
	// Perform the delete operation
    $query = "DELETE FROM reviewtbl WHERE reviewsID IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    // Check if both operations were successful
    if($query_run)
    {
        echo "Multiple Data Deleted and Archived Successfully";
        header('Location: Feedback.php');
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
}


       ?>  


            </table>
        </div>
</form>

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
