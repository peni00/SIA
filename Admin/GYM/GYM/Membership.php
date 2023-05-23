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
    <link rel='stylesheet' type='text/css' media='screen' href='css/product4.css'>

    <link rel="icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <style>
        .ui-datepicker {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
        }

        .ui-datepicker-header {
            background-color: #f0f0f0;
            border-bottom: 1px solid #ccc;
            padding: 5px;
            text-align: center;
        }

        .ui-datepicker-title {
            font-weight: bold;
            margin: 0;
        }

        .ui-datepicker-prev,
        .ui-datepicker-next {
            cursor: pointer;
            font-weight: bold;
        }

        .ui-datepicker-calendar {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .ui-datepicker-calendar th,
        .ui-datepicker-calendar td {
            text-align: center;
            padding: 5px;
        }

        .ui-datepicker-calendar .ui-state-default {
            cursor: pointer;
            display: inline-block;
            padding: 5px;
            width: 100%;
            text-align: center;
            background-color: #e0e0e0;
            border-radius: 2px;
        }

        .ui-datepicker-calendar .ui-state-hover {
            background-color: #c0c0c0;
        }

        .ui-datepicker-calendar .ui-state-active {
            background-color: #a0a0a0;
            color: white;
        }
		
		    .badge {
     
  padding: 10px 10px;
  border-radius: 100%;
  background: red;
  color: white;
    }

    </style>

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
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Services.php">
                    <li>SERVICES</li>
                </a>
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Staffs.php">
                    <li>STAFFS</li>
                </a>

                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Appointment.php" >
                    <li>APPOINTMENTS</li>
                </a>
				
				
				<a href="#" style="color:#349EFF">
                    <li>MEMBERSHIP</li>
                </a>
				
				
                </a>
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Archives-Services.php">
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

        </div>
        <!--container-->
        <form method="POST">
        <div class="sortby">

            <button type="submit">SORT BY</button>
            <select class="sort" name="sort">
                <option value="option0">MEMBER ID</option>
                <option value="option1">NON-MEMBER</option>
                <option value="option3">MEMBER</option>
                <option value="option4">JOIN DATE</option>
            </select>

        </div>
        <div class="table-container">

        <button type="submit" class="unbtn" name="delete" value="Delete" onclick="return confirm('ARE YOU SURE YOU WANT TO Delete THIS ITEM/S!')">Delete</button>
 

            <table>
                <thead>
                     <tr>
										<th class="table-light text-uppercase"></th>
										<th class="table-light text-uppercase"></th>
                                        <th class="table-light text-uppercase" style="text-align: center;">MEMBER ID</th>
                                        <th class="table-light text-uppercase" style="text-align: center;">STATUS</th>
                                       <th class="table-light text-uppercase" style="text-align: center;">EMAIL</th>
                                        <th class="table-light text-uppercase" style="text-align: center;">SERVICE</th>
                                        <th class="table-light text-uppercase" style="text-align: center;">JOIN DATE</th>
                                        <th class="table-light text-uppercase" style="text-align: center;">END DATE</th>
                                        <th class="table-light text-uppercase"></th>
                                    </tr>
                </thead>
                <tbody>

<?php

$sortOption = isset($_POST['sort']) ? $_POST['sort'] : '';

// Set the default sort order if no option is selected
if (empty($sortOption)) {
   $sortOption = 'membertbl.memberID ASC';
}

// Modify the $sql query and $sortOption depending on the selected option
if ($sortOption == 'option1') {
	$sortOption = 'membertbl.memberID ASC';
	  $sql = "SELECT membertbl.memberID, account.Account_ID ,account.Status,account.Email_Add,servicetypetbl.serviceType, membertbl.joinDate,membertbl.Expiration 
		 FROM membertbl 
		 INNER JOIN account ON account.Account_ID = membertbl.Account_ID  
		 INNER JOIN servicetypetbl ON servicetypetbl.serviceID = membertbl.serviceID
		 WHERE account.Status = 'NON-MEMBER'
		 ORDER BY $sortOption";
} elseif ($sortOption == 'option3') {
      $sortOption = 'membertbl.memberID ASC';
	 $sql = "SELECT membertbl.memberID, account.Account_ID ,account.Status,account.Email_Add,servicetypetbl.serviceType, membertbl.joinDate,membertbl.Expiration 
		 FROM membertbl 
		 INNER JOIN account ON account.Account_ID = membertbl.Account_ID  
		 INNER JOIN servicetypetbl ON servicetypetbl.serviceID = membertbl.serviceID
		 WHERE account.Status = 'MEMBER'
		 ORDER BY $sortOption";
} elseif ($sortOption == 'option4') {
		$sortOption = 'membertbl.joinDate ASC';
		 $sql = "SELECT membertbl.memberID, account.Account_ID ,account.Status,account.Email_Add,servicetypetbl.serviceType, membertbl.joinDate,membertbl.Expiration 
		 FROM membertbl 
		 INNER JOIN account ON account.Account_ID = membertbl.Account_ID  
		 INNER JOIN servicetypetbl ON servicetypetbl.serviceID = membertbl.serviceID
		 ORDER BY $sortOption";
} 
 else {
		$sortOption = 'membertbl.memberID ASC';
		 $sql = "SELECT membertbl.memberID, account.Account_ID ,account.Status,account.Email_Add,servicetypetbl.serviceType, membertbl.joinDate,membertbl.Expiration 
		 FROM membertbl 
		 INNER JOIN account ON account.Account_ID = membertbl.Account_ID  
		 INNER JOIN servicetypetbl ON servicetypetbl.serviceID = membertbl.serviceID
		 ORDER BY $sortOption";
}
            $result = mysqli_query($conn, $sql);
			$currentDate = date("Y-m-d");
            // Display data in HTML table
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
					$aid = $row['Account_ID'];
                     $id = $row['memberID'];
                     $status = $row['Status'];
                     $email = $row['Email_Add'];
                     $service = $row['serviceType'];
                     $joindate = $row['joinDate'];
                     $enddate = $row['Expiration'];
					 
	
if ($currentDate > $enddate) {
    // Nullify the values of $enddate and $joindate
    $enddate = null;
    $joindate = null;
    $status = "NON-MEMBER";

    // Update the status in the account table
    $updateSql = "UPDATE account SET Status = '$status' WHERE Account_ID = $aid";
    mysqli_query($conn, $updateSql);

    // Update the joinDate and Expiration in the membertbl table
    $updateSql2 = "UPDATE membertbl SET joinDate = " . ($joindate == null ? "NULL" : "'$joindate'") . ", Expiration = " . ($enddate == null ? "NULL" : "'$enddate'") . " WHERE memberID = $id";
    mysqli_query($conn, $updateSql2);
}

                
                     echo "<tr>";
            echo "<td></td>";
            echo "<td><input type='checkbox' name='check[]' value='" . $row['memberID'] . "'> &nbsp;&nbsp;&nbsp;";
			echo '<button type="button" id="editButton" name="editBtn" class="deleteBtn" data-bs-toggle="modal" data-bs-target="#exampleModal2">EDIT</button>';
            echo "<td style='text-align: center;'>" . $row['memberID'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['Status'] . "</td>";
			echo "<td style='text-align: center;'>" . $row['Email_Add'] . "</td>";
			echo "<td style='text-align: center;'>" . $row['serviceType'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['joinDate'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['Expiration'] . "</td>";

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
                            <input type="hidden" class="txt" name="txtid" id="txtid" ><br />
                            <label>Status: </label>
                            <select class="txt" name="txtstatus" id="txtstatus">
									<option value="NON-MEMBER">NON-MEMBER</option>
                                    <option value="MEMBER">MEMBER</option>
                            </select> <br />
							<label>Email:</label>
                            <input type="text" class="txt" name="txtemail" id="txtemail" size="50" readonly><br />
							<label>Service:</label>
                            <input type="text" class="txt" name="txtservice" id="txtservice" readonly><br />
                            <label>Join Date: </label>
                            <input type="text" class="txt" name="txtjoin" id="txtjoin" readonly><br />
                            <label>End Date: </label>
                            <input type="text" class="txt" name="txtend" id="txtend" required autocomplete="off"><br/>
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
		</form>
		<?php
		if(isset($_POST['confirm'])){
  $id = $_POST['txtid'];
  $selectedtype = $_POST['txtstatus'];
  $joindate = mysqli_real_escape_string($conn, $_POST['txtjoin']);
  $enddate = mysqli_real_escape_string($conn, $_POST['txtend']);

  $sql = "UPDATE membertbl JOIN account ON membertbl.Account_ID = account.Account_ID SET membertbl.joinDate = ".($joindate == "" ? "NULL" : "'$joindate'").", membertbl.Expiration = ".($enddate == "" ? "NULL" : "'$enddate'").", account.Status = '$selectedtype' WHERE memberID = $id";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("location: Membership.php");
  } else {
    echo "Error updating data: " . mysqli_error($conn);
  }
}
		?>
		
		<?php
     if(isset($_POST['delete']))
{
    $all_id = $_POST['check'];
    $extract_id = implode(',' , $all_id);

    // Perform the insert operation
    $insert_query = "INSERT INTO membertblarchive (memberID, serviceID, account_ID, joinDate, Expiration, Message, notification)
                     SELECT memberID, serviceID, account_ID, joinDate, Expiration, Message, notification
                     FROM membertbl
                     WHERE memberID IN($extract_id)";
					 
    $insert_query_run = mysqli_query($conn, $insert_query);
	
	// Perform the delete operation
    $query = "DELETE FROM membertbl WHERE memberID IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    // Check if both operations were successful
    if($query_run && $insert_query_run)
    {
        echo "Multiple Data Deleted and Archived Successfully";
        header('Location: Membership.php');
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
<script>
    // Get all the Edit buttons
    var editBtns = document.getElementsByName('editBtn');

    // Add click event listener to each Edit button
    Array.from(editBtns).forEach(function(editBtn) {
        editBtn.addEventListener('click', function() {
            // Get the row associated with the clicked Edit button
            var row = this.parentNode.parentNode;

            // Get the values from the row
            var id = row.cells[2].textContent;
            var status = row.cells[3].textContent;
            var email = row.cells[4].textContent;
            var service = row.cells[5].textContent;
            var joinDate = row.cells[6].textContent;
            var endDate = row.cells[7].textContent;

            // Assign the values to the textboxes in the modal
            document.getElementById('txtid').value = id;
            document.getElementById('txtemail').value = email;
            document.getElementById('txtservice').value = service;
            document.getElementById('txtend').value = endDate;

            var dropdown = document.getElementById('txtstatus');
            var optionValues = dropdown.options;
            for (var i = 0; i < optionValues.length; i++) {
                if (optionValues[i].value === status) {
                    dropdown.selectedIndex = i;
                    break;
                }
            }

            // Check if the join date is empty
            if (joinDate.trim() === '') {
                // Get the current date
                var currentDate = new Date();

                // Get the day, month, and year from the current date
                var day = currentDate.getDate();
                var month = currentDate.getMonth() + 1; // Months are zero-based
                var year = currentDate.getFullYear();

                // Format the date as "YYYY-MM-DD"
                joinDate = year + '-' + month + '-' + day;
            }

            // Set the value of the "Join Date" textbox
            document.getElementById('txtjoin').value = joinDate;
			
			
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $("#txtend").datepicker({
            dateFormat: "yy-mm-dd" // Customize the date format as per your requirements
        });
    });
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
