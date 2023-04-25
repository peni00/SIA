<?php
$conn = mysqli_connect("sbit3f-gym.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");


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
    <title>Services</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product1.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='transaction.css'>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
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
                <a href="#" style="color:#349EFF">
                    <li>SERVICES</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Staffs.php">
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
    </div>

    <!--sidebar-->

    <div class="container">
        <a href="http://localhost/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                src="images/back-btn-gray.png" style="width: 30px"> </a>
        <h3>Home / <a href="#" style="color:#349EFF">Appointment</a></h3>
        <form method="post">
            <div class="search-bar">
                <input type="text" placeholder="Search.." name="txtsearch">
                <button type="submit" name="search"><img src="images/search.png"></button>

        </form>
    </div>
    </div>
    <form method="POST">
        <div class="table-container">

            <button type="submit" class="unbtn" name="delete" value="Delete"
                onclick="return confirm('are you sure want to delete!')">DELETE</button>
            <table>

                <thead>

                    <tr>
                        <th width="160"></th>
                        <th>SERVICE ID</th>
                        <th>SERVICES</th>
                        <th>DETAILS</th>
                    </tr>

                </thead>

                <tbody>
                    <?php


            if(isset($_POST['search'])){
                $searchbar=$_POST['txtsearch'];
                $query="SELECT * FROM servicetypetbl Where CONCAT(serviceID,serviceType,serviceDescription) LIKE '%$searchbar%'";
                $query_runs=mysqli_query($conn, $query);
                if(mysqli_num_rows($query_runs)>0){
                    while($row=mysqli_fetch_array($query_runs)){
                        echo "<tr>";
                    echo "<td><input type='checkbox' name='check[]' value='" . $row['serviceID'] . "'>&nbsp;&nbsp;&nbsp;";
                    echo "<button type='button' class='deleteBtn' data-bs-toggle='modal' data-bs-target='#exampleModal2' id='" . $row['serviceID'] . "' name='editBtn' value='" . $row['serviceID'] . "'>EDIT</button></td>";
                    echo "<td>" . $row['serviceID'] . "</td>";
                    echo "<td>" . $row['serviceType'] . "</td>";
                    echo "<td>" . $row['serviceDescription'] . "</td>";
                    echo "</tr>";
                    }
                }else{
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                }
            }

            // Query data from database
            $sql = "SELECT * FROM servicetypetbl";
            $result = mysqli_query($conn, $sql);


            // Display data in HTML table
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $serviceid = $row['serviceID'];
                    $servicetype1 = $row['serviceType'];
                    $servicedescription1 = $row['serviceDescription'];
                
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='check[]' value='" . $row['serviceID'] . "'>&nbsp;&nbsp;&nbsp;";
                    echo "<button type='button' class='deleteBtn' data-bs-toggle='modal' data-bs-target='#exampleModal2' id='" . $row['serviceID'] . "' name='editBtn' value='" . $row['serviceID'] . "'>EDIT</button></td>";
                    echo "<td>" . $row['serviceID'] . "</td>";
                    echo "<td>" . $row['serviceType'] . "</td>";
                    echo "<td>" . $row['serviceDescription'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
           
            ?>
                </tbody>

            </table>
            <!-- DELETE -->

            <?php
        if(isset($_POST['delete']))
{
    $all_id = $_POST['check'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM servicetypetbl WHERE serviceID IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo "Multiple Data Deleted Successfully";
        header('Location: http://localhost/SIA/Admin/GYM/GYM/Services.php');
        exit();
    }
    else
    {
        echo "Multiple Data Not Deleted";
       
       
    }
}
       ?>



    </form>

    </div>

    <!-- Add this script at the end of your code -->
    <script>
    // Get all the Edit buttons
    var editBtns = document.getElementsByName('editBtn');

    // Add click event listener to each Edit button
    for (var i = 0; i < editBtns.length; i++) {
        editBtns[i].addEventListener('click', function() {
            // Get the row associated with the clicked Edit button
            var row = this.parentNode.parentNode;

            // Get the values of serviceType and serviceDescription from the row
            var serviceID = row.cells[1].textContent;
            var serviceType = row.cells[2].textContent;
            var serviceDescription = row.cells[3].textContent;

            // Assign the values to the textboxes in the modal
            document.getElementsByName('txtid')[0].value = serviceID;
            document.getElementsByName('txtservice1')[0].value = serviceType;
            document.getElementsByName('txtdetails1')[0].value = serviceDescription;
        });
    }
    </script>



    <!--Add-product-->
    <form method="POST">
        <div class="Add-product">
            <input type="checkbox" id="click">
            <label for="click" type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                for="click">
                <img src="images/add.png">
            </label>
            <div class="prod-content" style="transform: translate(-70%, -20%); height: 250px;">
                <h1>DETAILS</h1>
                <div class=" prod-info">

                    <label>Service: </label>
                    <input type="text" class="txt" name="txtservice"><br />
                    <label>Details: </label>
                    <input type="text" class="txt" name="txtdetails"><br /><br />
                    <div class="buttons">
                    <button type="submit" class="edit-confirm1" name="submit">Add</button>
                        <button type="button" class="close-btn1" data-bs-dismiss="modal">Cancel</button>
                       
                    </div>
                </div>
            </div>
        </div>
        <?php
                   
                  // Add a new service
            if (isset($_POST['submit'])) {
                $txtservice = $_POST['txtservice'];
                $txtdetails = $_POST['txtdetails'];
  
                $sql = "INSERT INTO servicetypetbl (serviceType, serviceDescription) VALUES ('$txtservice', '$txtdetails')";
                
                    if (mysqli_query($conn, $sql)) {
                        
                        header('Location: http://localhost/SIA/Admin/GYM/GYM/Services.php');
                        
                        exit();
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
    ?>


        <!-- Edit -->
        <form method="POST">
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="edit-modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h1>DETAILS</h1>
                                <div class="prod-info">

                                    <input type="hidden" class="txt" name="txtid"><br />
                                    <label>Service: </label>
                                    <input type="text" class="txt" name="txtservice1"><br />
                                    <label>Details: </label>
                                    <input type="text" class="txt" name="txtdetails1"><br />

                                </div>
                                <div class="edit-confirmation1">
                                    <button type="button" class="close-btn1"
                                        data-bs-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;<button
                                        type="submit" class="edit-confirm1" name="confirm"
                                        value="Update Data">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
              
           
              
                
                  // edit a new service
            if (isset($_POST['confirm'])) {
                $serviceid=$_POST['txtid'];
                $txtservice = $_POST['txtservice1'];
                $txtdetails = $_POST['txtdetails1'];
  
                $sql = "UPDATE `servicetypetbl` SET `serviceID`='$serviceid',`serviceType`='$txtservice',`serviceDescription`='$txtdetails' WHERE `serviceID`='$serviceid'";
                $query2=mysqli_query($conn, $sql);
                    if ($query2) {
                        
                        header('Location: http://localhost/SIA/Admin/GYM/GYM/Services.php');
                        exit();
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
                mysqli_close($conn);
    ?>

        </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>

</body>

</html>