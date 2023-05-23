<?php
session_start();
require('../connection.php');
?>
<?php
if(isset($_POST['delete']))
{
    $all_id = $_POST['check'];
    $extract_id = implode(',' , $all_id);


	// Perform the delete operation
    $query = "DELETE FROM admin WHERE id IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    // Check if both operations were successful
    if($query_run )
    {
        echo "Data Deleted Successfully";
        header('Location: manageAcc.php');
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

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>RFG ELITE | Manage Accounts</title>
    <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="manageAccs.css" media="screen">

</head>

<body class="u-body u-xl-mode" data-lang="en">

    <section class="Anton Antonio C1C1C1 D9D9D9 EFF Ellipse FFFFFF Lato Rectangle absolute admin align-items background border border-box border-radius box box-shadow box-sizing calc50 center color copyright display enter-email flex font-family font-size font-style font-weight height identical left line-height normal password position px px2 rfg rgba0 rgba70 show-pass sign-in solid text-align to top u-clearfix width u-section-1" id="sec-d0e7">
        <nav>
            <div class="left-nav">
                <img class="logo-img" src="images/logo-modified.png" alt="" data-image-width="362" data-image-height="362">
                <p> RFG ELITE</p>
            </div>
            <div class="right-icon">
              
                <span class="icon" id="user-icon">
                    <i class="fa-solid fa-user" style="color: #000000;"></i>
                </span>
                <div class="dropdown-menu" id="user-dropdown">
                    <ul>
                        <li><a class="list-item" href="Profile1.php">View &nbsp;Profile</a></li>
                        <li><a class="list-item" href="addAcc.php">Add &nbsp;Account</a></li>
                        <li><a class="list-item" href="manageAcc.php">Manage &nbsp;Users</a></li>
                        <li><a class="list-item" onclick="return confirm('Are you sure to logout?');" href="logout.php">
                                Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <form method="POST">
            <div class="table-container">
                <button type="submit" class="unbtn" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')">DELETE</button>
                <table>
   
        <thead>
        
            <tr>
                <th width="220"></th>
                <th>ADMIN ID</th>
                <th>NAME</th>
                <th>POSITION</th>
                <th>STATUS</th>
                <th>CONTACT NUMBER</th>
                <th>EMAIL</th>
                <th>IMAGE</th>

            </tr>

        </thead>

        <tbody>
        <?php
            require('../connection.php');

            // Perform a database query to fetch the admin records
            $query = "SELECT * FROM admin WHERE category = 'Administrator'";
            $result = mysqli_query($conn, $query);

            // Check if the query was successful
            if ($result) {
                // Loop through the rows and generate table rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
					echo "<td><input type='checkbox' name='check[]' value='" . $row['id'] . "'> &nbsp;&nbsp;&nbsp;";
                    echo "<button class='delete-btn'><a  href='manageAccedit.php?editid=" . $row['id'] . "'>EDIT</a></button></td>";
                    echo "<td>" . $row['adminID'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['contactnum'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";

                    // Display the image
                    echo "<td><img src='data:image/jpeg;base64," . $row['photo'] . "' alt='Admin Photo' width='100'></td>";

                    echo "</tr>";
                }
            }

            ?>

               
        </tbody> 
        
    </table>
    
</form>


            <script>
        var icon = document.getElementById("user-icon");
        var dropdown = document.getElementById("user-dropdown");

        icon.addEventListener("click", function(event) {
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        });

        document.addEventListener("click", function(event) {
            if (!icon.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.style.display = "none";
            }
        });
    </script>
</body>

</html>
