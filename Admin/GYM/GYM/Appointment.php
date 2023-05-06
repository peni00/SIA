<?php

$conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");


if (mysqli_connect_errno()) 
{
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
    <title>Appointments</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='transaction.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product3.css'>

    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <script>
 if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
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
                <img src="images/image10.png" class="user" style="width: 40px ">
                <button style="font-weight: 700">Admin Rod <div class="dropdown">
                        <img src="images/dropd.png" alt="dropdown icon" class="dropdown-icon">
                        <div class="dropdown-content">
                            <a class="dropdown-item"
                                href="http://localhost/SIA/SIA/Admin/log_In/Profile1.php">View&nbsp;&nbsp;Profile</a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure to logout?');"
                                href="http://localhost/SIA/Admin/log_In/logout.php">Logout</a>
                        </div>
                    </div>
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
        <form method="POST">
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


            <table>
                <thead>
                    <tr>
                        <th>
                        </th>
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
    $sortOption = 'appointmenttbl.id ASC';
}

// Modify the $sql query and $sortOption depending on the selected option
if ($sortOption == 'option1') {
    $sortOption = 'appointmenttbl.start_datetime ASC';
	$sql = "SELECT appointmenttbl.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttbl.start_datetime, appointmenttbl.status
        FROM appointmenttbl
        JOIN account ON appointmenttbl.email = account.Email_Add
        JOIN staff_tbl ON appointmenttbl.staffID = staff_tbl.staffID 
        JOIN servicetypetbl ON appointmenttbl.serviceID = servicetypetbl.serviceID
        ORDER BY $sortOption";
} elseif ($sortOption == 'option3') {
       $sortOption = 'appointmenttbl.start_datetime ASC';
	$sql = "SELECT appointmenttbl.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttbl.start_datetime, appointmenttbl.status
        FROM appointmenttbl
        JOIN account ON appointmenttbl.email = account.Email_Add
        JOIN staff_tbl ON appointmenttbl.staffID = staff_tbl.staffID 
        JOIN servicetypetbl ON appointmenttbl.serviceID = servicetypetbl.serviceID
            WHERE appointmenttbl.status = 'PENDING'
            ORDER BY $sortOption";
} elseif ($sortOption == 'option4') {
    $sortOption = 'appointmenttbl.start_datetime ASC';
	$sql = "SELECT appointmenttbl.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttbl.start_datetime, appointmenttbl.status
        FROM appointmenttbl
        JOIN account ON appointmenttbl.email = account.Email_Add
        JOIN staff_tbl ON appointmenttbl.staffID = staff_tbl.staffID 
        JOIN servicetypetbl ON appointmenttbl.serviceID = servicetypetbl.serviceID
            WHERE appointmenttbl.status = 'APPROVED'
            ORDER BY $sortOption";
} elseif ($sortOption == 'option5') {
    $sortOption = 'appointmenttbl.start_datetime ASC';
	$sql = "SELECT appointmenttbl.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttbl.start_datetime, appointmenttbl.status
        FROM appointmenttbl
        JOIN account ON appointmenttbl.email = account.Email_Add
        JOIN staff_tbl ON appointmenttbl.staffID = staff_tbl.staffID 
        JOIN servicetypetbl ON appointmenttbl.serviceID = servicetypetbl.serviceID
            WHERE appointmenttbl.status = 'CANCELED'
            ORDER BY $sortOption";
} else {
      $sortOption = 'appointmenttbl.id ASC';
	$sql = "SELECT appointmenttbl.id, account.Name, staff_tbl.staffName, servicetypetbl.serviceType, appointmenttbl.start_datetime, appointmenttbl.status
        FROM appointmenttbl
        JOIN account ON appointmenttbl.email = account.Email_Add
        JOIN staff_tbl ON appointmenttbl.staffID = staff_tbl.staffID 
        JOIN servicetypetbl ON appointmenttbl.serviceID = servicetypetbl.serviceID
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

            echo "<button type='button' name='editBtn' class='deleteBtn' data-bs-toggle='modal' data-bs-target='#exampleModal2'>EDIT</button></td>";
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
            </table>
        </form>

      

        <form method="POST">
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="edit-modal-dialog">
            <div class="modal-content"
                style="background-color: black; color: white; border-radius: 16px; width: 500px;">
                    <div class="modal-body">
                        <h1>DETAILS</h1>
                        <div class="prod-info">

                            <input type="hidden" class="txt" name="txtid" ><br />
                            <label>Client Name: </label>
                            <input type="text" class="txt" name="txtcname" readonly><br />
                            <label>Staff Name: </label>
                            <input type="text" class="txt" name="txtsname" readonly><br />
                            <label>Services: </label>
                            <input type="text" class="txt" name="txtservices" readonly><br/>
                            <label>Date and Time: </label>
                            <input type="text" class="txt" name="txtdt"><br />
                            <label>Status: </label>
                            <select class="txt" name="txtstatus">
                                    <option value="PENDING">PENDING</option>
                                    <option value="APPROVED">APPROVED</option>
                                    <option value="CANCELED">CANCELED</option>
                            </select>
             
                        </div>
                        <div class="edit-confirmation1">
                            <button type="button" class="close-btn1"
                                data-bs-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                class="edit-confirm1" name="confirm" value="Update Data" >Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
		<?php
	if(isset($_POST['delete'])) {
    $all_id = $_POST['check'];
    if(!empty($all_id)) {
        $extract_id = implode(',' , $all_id);

        // Perform the insert operation
        $insert_query =  "INSERT INTO appointmenttblarchive (id, email, serviceID,staffID,start_datetime,end_datetime,status,datesubmitted)
        SELECT id,email, serviceID, staffID,start_datetime,end_datetime,status,datesubmitted
        FROM appointmenttbl
        WHERE id IN($extract_id)";

        $insert_query_run = mysqli_query($conn, $insert_query);

        // Check if insert operation was successful
        if($insert_query_run)
        {
            // Perform the delete operation
            $query = "DELETE FROM appointmenttbl WHERE id IN($extract_id) ";
            $query_run = mysqli_query($conn, $query);

            // Check if delete operation was successful
            if($query_run)
            {
                echo "Multiple Data Deleted and Archived Successfully";
                header('Location: Appointment.php');
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
		mysqli_close($conn);
}

		?>
		

		<?php
// Check if the confirm button was clicked
if(isset($_POST['confirm'])) {
    // Get the values from the form
    $id = $_POST['txtid'];
    $dt = $_POST['txtdt'];
    $status = $_POST['txtstatus'];

    // Prepare the SQL statement
    $sql = "UPDATE appointmenttbl SET start_datetime='$dt', status='$status' WHERE id='$id'";

    // Execute the SQL statement
    if(mysqli_query($conn, $sql)) {
        // If the update was successful, redirect to the appointment page
        header('Location: Appointment.php');
        exit();
    } else {
        // If the update failed, display an error message
        echo "Error updating record: " . mysqli_error($conn);
    }
		mysqli_close($conn);
}
?>
		
		
		

		
		 <script>
   // Get all the Edit buttons
var editBtns = document.getElementsByName('editBtn');

// Add click event listener to each Edit button
for (var i = 0; i < editBtns.length; i++) {
    editBtns[i].addEventListener('click', function() {
        // Get the row associated with the clicked Edit button
        var row = this.parentNode.parentNode;

        // Get the values of serviceType and serviceDescription from the row
        var id = row.cells[2].textContent;
        var name= row.cells[3].textContent;
        var staffName = row.cells[4].textContent;
        var serviceType = row.cells[5].textContent;
        var start_datetime = row.cells[6].textContent;
        var status  = row.cells[7].textContent;

        // Assign the values to the textboxes in the modal
        document.getElementsByName('txtid')[0].value = id;
        document.getElementsByName('txtcname')[0].value = name;
        document.getElementsByName('txtsname')[0].value = staffName;
        document.getElementsByName('txtservices')[0].value = serviceType;
        document.getElementsByName('txtdt')[0].value = start_datetime;
        document.getElementsByName('txtstatus')[0].value = status;
		
		// Auto-select the corresponding option in the status dropdown
var statusDropdown = document.getElementsByName('txtstatus')[0];
if (status == 'PENDING') {
    statusDropdown.querySelector('option[value="option1"]').selected = true;
} else if (status == 'APPROVED') {
    statusDropdown.querySelector('option[value="option2"]').selected = true;
} else if (status == 'CANCELED') {
    statusDropdown.querySelector('option[value="option3"]').selected = true;
}
    });
}

</script>


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
