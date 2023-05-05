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

<?php
     if(isset($_POST['delete']))
{
    $all_id = $_POST['check'];
    $extract_id = implode(',' , $all_id);

    // Perform the insert operation
     $insert_query =  "INSERT INTO staff_tblarchive (staffID, staffName, serviceID, imageName, staffImage)
    SELECT staffID, staffName, serviceID, imageName, staffImage
    FROM staff_tbl
    WHERE staffID IN($extract_id)";
					 
    $insert_query_run = mysqli_query($conn, $insert_query);	
	// Perform the delete operation
    $query = "DELETE FROM staff_tbl WHERE staff_tbl.staffID IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    // Check if both operations were successful
    if($query_run && $insert_query_run)
    {
        echo "Multiple Data Deleted and Archived Successfully";
        header('Location: Staffs.php');
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
	 mysqli_close($conn);
}
?>
<?php

if(isset($_POST['update'])) {
    // Get other form data
    $sid = $_POST['sid'];
    $newsname = $_POST['newsname'];
    $serviceCategory = $_POST['serviceCategory'];
    $imageName = null;
    $imageData = null;
    $imageType = null;

    // Check if connection was successful
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if new image data is provided
    if (!empty($_FILES["newmyImage"]["name"])) {
        // Get image data
        $imageName = $_FILES["newmyImage"]["name"];
        $imageData = file_get_contents($_FILES["newmyImage"]["tmp_name"]);
        $imageType = $_FILES["newmyImage"]["type"];

        // Check if the uploaded file is an image
        if(substr($imageType, 0, 5) != "image") {
            echo "Only images are allowed.";
            exit;
        }
    }

    // Prepare statement
    if(!empty($imageName)) {
        $stmt = mysqli_prepare($conn, "UPDATE staff_tbl SET staffName=?, serviceID=?, imageName=?, staffImage=? WHERE staffID=?");
        mysqli_stmt_bind_param($stmt, "sissi", $newsname, $serviceCategory, $imageName, $imageData, $sid);
    } else {
        $stmt = mysqli_prepare($conn, "UPDATE staff_tbl SET staffName=?, serviceID=? WHERE staffID=?");
        mysqli_stmt_bind_param($stmt, "ssi", $newsname, $serviceCategory, $sid);
    }

    // Execute statement
    if(mysqli_stmt_execute($stmt)) {
      
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
	
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Staffs</title>
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
                <a href="services.php">
                    <li>SERVICES</li>
                </a>
                <a href="#" style="color:#349EFF">
                    <li>STAFFS</li>
                </a>
                <a href="Appointment.php">
                    <li>APPOINTMENTS</li>
                </a>
                <a href="Archives-Services.php">
                    <li>ARCHIVES</li>
                </a>
                <a href="Feedback.php">
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
            <form method="POST">
            <div class="container">
                <a href="http://localhost/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                        src="images/back-btn-gray.png" style="width: 30px"> </a>
                <h3 style="color:#0C0C0C">Home / <a href="#" style="color:#349EFF">Appointment</a></h3>
                <div class="search-bar">
                    <input type="text" placeholder="Search.." name="txtsearch" autocomplete="off">
                    <button type="submit" name="search"><img src="images/search.png"></button>
                </div>
            </div>
            </form>

            <?php
            if(isset($_POST['search'])){
            $searchbar=$_POST['txtsearch'];
			

             $sql = "SELECT * FROM `staff_tbl` where `serviceID`='$searchbar'";
            $result=mysqli_query($conn,$sql);
            if($result){
                if($num=mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
            
            }
            }else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert(" no found !!!! ")';  
            echo '</script>';
            }

            }
            
            ?>
            
            <!--container-->
            <form method="POST">
            <div class="table-container">
              <button type="submit" class="unbtn" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete the selected records?')">DELETE</button>
            </form>
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
            if(isset($_POST['search'])){
                $searchbar=$_POST['txtsearch'];
				
        $sql = "SELECT staff_tbl.staffID, staff_tbl.staffName, servicetypetbl.serviceType, staff_tbl.staffImage
        FROM staff_tbl
        JOIN servicetypetbl ON staff_tbl.serviceID = servicetypetbl.serviceID
        WHERE staff_tbl.staffID LIKE '%$searchbar%' 
        OR staff_tbl.staffName LIKE '%$searchbar%' 
        OR servicetypetbl.serviceType LIKE '%$searchbar%' 
        ORDER BY staff_tbl.staffID ASC";
		
		
$result = mysqli_query($conn, $sql);

// Display data in HTML table
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) 
	{
        echo "<tr>";
        echo "<td><input type='checkbox' name='check[]' value='" . $row['staffID'] . "'>&nbsp;&nbsp;&nbsp;";
       echo "<button type='button' class='deleteBtn' data-bs-toggle='modal' data-bs-target='#exampleModal2' data-id='" . $row['staffID'] . "' name='editBtn' value='" . $row['staffID'] . "' onclick=\"populateFields('" . $row['staffID'] . "',  '" . $row['staffName'] . "',   '" . $row['serviceType'] . "',   '" . base64_encode($row['staffImage']) . "')\">EDIT</button>";

        echo "<td>" . $row['staffID'] . "</td>";
        echo "<td>" . $row['staffName'] . "</td>";
        echo "<td>" . $row['serviceType'] . "</td>";
        $simage = base64_encode($row['staffImage']); // convert image data to base64 string
        echo "<td style='text-align: center;'><img src='data:image/jpeg;base64," . $simage . "' width='120'></td>"; // display image using base64
        echo "</tr>";
		}
		} else {
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                }

            }else{
          
        // Query data from database
$sql = "SELECT staff_tbl.staffID, staff_tbl.staffName,  servicetypetbl.serviceType, staff_tbl.staffImage
        FROM staff_tbl
        JOIN servicetypetbl ON staff_tbl.serviceID = servicetypetbl.serviceID
        ORDER BY staff_tbl.staffID ASC";

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
		echo "<button type='button' class='deleteBtn' data-bs-toggle='modal' data-bs-target='#exampleModal2' data-id='" . $row['staffID'] . "' name='editBtn' value='" . $row['staffID'] . "' onclick=\"populateFields('" . $row['staffID'] . "',  '" . $row['staffName'] . "',   '" . $row['serviceType'] . "',   '" . base64_encode($row['staffImage']) . "')\">EDIT</button>";
        echo "<td>" . $row['staffID'] . "</td>";
        echo "<td>" . $row['staffName'] . "</td>";
        echo "<td>" . $row['serviceType'] . "</td>";
        echo "<td style='text-align: center;'><img src='data:image/jpeg;base64," . $simage . "' width='120'></td>"; // display image using base64
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}
            }
?>
			
			
                            
                        </tr>

                    </tbody>
                </table>
           
                

            </div>
			

      <div class="Add-product" aria-hidden="true">
    <input type="checkbox" id="click">
    <label class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1" for="click" >
        <img src="images/add.png">
    </label>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
        aria-hidden="true" style="transform: translateX(-100%);">
        <div class="modal-dialog">
            <div class="modal-content"
                style="background-color: black; color: white; border-radius: 10px; width: 550px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">STAFF DETAILS</h5>
                </div>
				<br><br>

                <form id="staff-details-form" method="POST"  enctype="multipart/form-data">
                    <div class="modal-body" style="height: 200px;">
                        <div class="prod-info">   
					<label class="upload-photo5">
					<img id="mypreview"  alt="Preview Image" >
				
				<input type="file" name="myImage" accept="image/*" onchange="previewImage1(event)" >
				</label>
                          
                            <label for="staff-name-input">Name: </label>
                            <input type="text" id="staff-name-input" class="txt" required name="sname" autocomplete="off"><br>
                            <label for="staff-service-category-input">Service Category: </label>
                            <select name="serviceCategory" class="txt">
                                <?php
                                    // Query data from database
                                    $sql = "SELECT * FROM servicetypetbl";
                                    $result = mysqli_query($conn, $sql);
                                    // Display data in dropdown
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='".$row['serviceID']."'>".$row['serviceType']."</option>";
                                            
                                        }
                                    } else {
                                        echo "<option value=''>No service type found</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
					 
                        <div class="buttons">
                    <button type="button" class="close-btn1" data-bs-dismiss="modal" onclick="resetForm()">CANCEL</button>
                    <button type="submit" class="edit-confirm1" name="submit">CONFIRM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
if(isset($_POST['submit'])) {
    // Get image data
    $imageName = $_FILES["myImage"]["name"];
    $imageData = file_get_contents($_FILES["myImage"]["tmp_name"]);
    $imageType = $_FILES["myImage"]["type"];

    // Check if the uploaded file is an image
    if(substr($imageType, 0, 5) == "image") {
        // Get other form data
        $sname = $_POST['sname'];
        $serviceCategory = $_POST['serviceCategory'];

        // Check if connection was successful
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare statement
        $stmt = mysqli_prepare($conn, "INSERT INTO staff_tbl (staffName, serviceID, imageName, staffImage) VALUES (?, ?, ?, ?)");

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "siss", $sname, $serviceCategory, $imageName, $imageData);

        // Execute statement
        if(mysqli_stmt_execute($stmt)) {
            echo "Data added successfully.";
			header('Location: Staffs.php');
        exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close database connection
        mysqli_close($conn);
    } else {
        echo "Only images are allowed.";
    }
}


?>

    



          
			


			<!-- Edit -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="edit-modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h1>STAFF DETAILS</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="prod-info">
                            <label class="upload-photo1">
							<img id="staffImagePreview"  alt="Preview Image" style="width: 150px; height: 150px;">
							<input type="file" name="newmyImage" accept="image/*" onchange="previewImage(event)">
							</label></br>
                            <input type="hidden" name="sid" id="sid">
                            <label>Name: </label>
                            <input type="text" class="txt" name="newsname" id="newsname" autocomplete="off"><br />
                            <label>Service Category: </label>
                 <select name="serviceCategory" class="txt">
   <?php
    $sql1 = "SELECT * FROM servicetypetbl";
    $result1 = mysqli_query($conn, $sql1);
    
    $sql2 = "SELECT serviceID FROM staff_tbl WHERE staffID = $sid";
    $result2 = mysqli_query($conn, $sql2);
    $serviceID = mysqli_fetch_assoc($result2)['serviceID'];
    
    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $selected = ($row['serviceID'] == $serviceID) ? 'selected' : '';
            echo "<option value='".$row['serviceID']."' $selected>".$row['serviceType']."</option>";
        }
    } else {
        echo "<option value=''>No service type found</option>";
    }
?>
</select>
                        </div>
                        <br>
                        <div class="buttons">
                            <button type="button" class="close-btn1" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="edit-confirm1" name="update" value="Update Data" style="margin-left: 10px;">CONFIRM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
                integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
                integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
                integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
                crossorigin="anonymous">
            </script>
            <script>
            // Get the modal
            var modal = document.getElementById("exampleModal1");

            // Get the buttons
            var confirmBtn = document.getElementsByClassName("add-btn1")[0];
            var cancelBtn = document.getElementsByClassName("close-btn7")[0];

            // Add event listeners to the buttons
            confirmBtn.addEventListener("click", function() {
                // Functionality to confirm changes
                // For example, submit form data or make an AJAX request
                // Here, we just log a message to the console
                console.log("Changes confirmed!");
                // Close the modal
                modal.style.display = "none";
            });

            cancelBtn.addEventListener("click", function() 
			{
                // Functionality to cancel changes
                // Here, we just log a message to the console
                console.log("Changes cancelled!");
                // Close the modal
                modal.style.display = "none";
            });
            </script>
			<script>
function resetForm() {
    document.getElementById("staff-details-form").reset();
}
</script>
			
			
<script>
function populateFields(sid, sname, service, simage) {
  // Set the values of the form fields
  document.getElementById('sid').value = sid;
  document.getElementById('newsname').value = sname;
  document.getElementById('staffImagePreview').src = 'data:image/jpeg;base64,' + simage;

  // Find the option with the matching value and set it as selected
  var serviceSelect = document.getElementById('newservice');
  for (var i = 0; i < serviceSelect.options.length; i++) {
    if (serviceSelect.options[i].value == service) {
      serviceSelect.selectedIndex = i;
      break;
    }
  }
}
</script>
<script>
function previewImage1(event) {
  var reader = new FileReader();
  reader.onload = function() {
    var output = document.getElementById('mypreview');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>

<script>
function previewImage(event) {
  var reader = new FileReader();
  reader.onload = function() {
    var output = document.getElementById('staffImagePreview');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>


	
</body>

</html>
