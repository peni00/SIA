<?php
require('../connection.php');

$sql = "SELECT DATE_FORMAT(start_datetime, '%M') AS month, COUNT(*) AS total FROM appointmenttbl GROUP BY MONTH(start_datetime)";
$result = $conn->query($sql);

// Define the $month and $total arrays
$month = array();
$total = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $month[] = $row['month'];
        $total[] = $row['total'];
    }
}

// Construct the $data array
$data1 = array(
    'labels' => $month,
    'datasets' => array(
        array(
            'label' => 'Total Appointments',
            'data' => $total,
            'fill' => false,
            'borderColor' => 'rgb(75, 192, 192)',
            'lineTension' => 0.1
        )
    )
);

$query = "SELECT COUNT(*) AS total, Message FROM membertbl GROUP BY Message";
$result = mysqli_query($conn, $query);

$labels = array();
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['Message'];
    $data[] = $row['total'];
}

$data2 = array(
    'labels' => $month,
    'datasets' => array(
        array(
            'label' => 'Members',
            'data' => $total,
            'fill' => false,
            'borderColor' => 'rgb(75, 192, 192)',
            'lineTension' => 0.1
        )
    )
);

// Close the database connection
$conn->close();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>RFG ELITE | Appointment Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel='stylesheet' type='text/css' media='screen' href='css/Appointment1.css'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <script>
        let data1 = <?php echo json_encode($data1) ?>;
    </script>
    <script>
        let data2 = <?php echo json_encode($data2) ?>;
    </script>

</head>

<body>

   <div class="sidebar open">
        <div class="side-header">
            <img src="images/logo.png" style="width:60px; clip-path: circle()">
            <h2>RFG ELITE</h2>
        </div>
        <div class="box-logout">
            <div class="user-name">
                <span class="icon" id="user-icon">
                    <i class="fa-solid fa-user" style="color: #000000;"></i>
                </span>
                <?php include 'admin_info.php'; ?>
            </div>
            <div class="dropdown-container">
                <img src="images/dropd.png" alt="dropdown icon" class="dropdown-icon">
                <div class="dropdown-menu">
                    <ul>
                        <li><a href="http://localhost/SIA/Admin/log_In/Profile1.php">View&nbsp;&nbsp;Profile</a></li>
                        <li><a onclick="return confirm('Are you sure to logout?');" href="http://localhost/SIA/Admin/log_In/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>

        </div>




    </div>

    <div class="main-content">

        <div class="location-name">
            <div class="disp-name">
                <a href="http://localhost/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img src="images/back-btn-gray.png" style="width: 30px">
                </a>

                <h3 style="color:#0C0C0C">Home / <a href="#" style="color:#349EFF">Dashboard</a></h3>
            </div>
            <div class="hamburger-bar">
                <i class="fa-solid fa-bars toggle-sidebar" style="color: #ffff"></i>
            </div>
        </div>
        <div class="button-selection">
            <div class="app-btn">
                <a href="#"><button class="serbtn">APPOINTMENT</button></a>
            </div>
            <a href="http://localhost/SIA/Admin/Dashboard/E-commerce-Dashboard.php"><Button class="stabtn">E-COMMERCE</Button></a>
            <a href="http://localhost/SIA/Admin/Dashboard/Inventory-Dashboard.php"><Button class="appbtn">INVENTORY</Button></a>
        </div>
        <div>
            <div class="data-chartdag">
                <div class="box-container"></div>

                <div class="charts">
                    <div class="chart">
                        <h3>APPOINTMENTS</h3>
                        <canvas id="lineChart"></canvas>
                    </div>

                </div>
      
                <form method="post">
                <div class="grid-container">
                    <div class="left-column">
                        <div class="left-column-1-1">

                            <div class="member">
                                <p>NO. OF MEMBERS</p>
                            </div>
                            <div class="box-gym">
                                <div class="data-gym">
                                    <h3>Gym</h3>
                                    
                                    <?php
                                   
                                    $conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");
                                    
                                    
                                    if (mysqli_connect_errno()) {
                                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                      exit();
                                    }
                                    
                                    $sql = "SELECT COUNT(*) AS totalservice FROM servicetypetbl WHERE serviceType='GYM'";
                        $result = $conn->query($sql);
                        // Check if the query was successful
                        if ($result) {
                            // Fetch the count value
                            $row = $result->fetch_assoc();
                            $count = $row['totalservice'];
                            // Display the count in a text box
                            echo '<label for="txtGym">' . $count . '</label>';
                        } else {
                            echo 'Error executing the count query.';
                        }
                        ?>

                                </div>
                                <div class="data-gym">
                                    <h3>Kyokushin</h3>
                                    <?php
                                   
                                    $conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");
                                    
                                    
                                    if (mysqli_connect_errno()) {
                                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                      exit();
                                    }
                                    
                                    $sql = "SELECT COUNT(*) AS totalservice FROM servicetypetbl WHERE serviceType='Kyokushin'";
                        $result = $conn->query($sql);
                        // Check if the query was successful
                        if ($result) {
                            // Fetch the count value
                            $row = $result->fetch_assoc();
                            $count = $row['totalservice'];
                            // Display the count in a text box
                            echo '<label for="txtkyokushin">' . $count . '</label>';
                        } else {
                            echo 'Error executing the count query.';
                        }
                        ?>
                                </div>
                                <div class="data-gym">
                                    <h3>Dance Studio</h3>
                                    <?php
                                   
                                    $conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");
                                    
                                    
                                    if (mysqli_connect_errno()) {
                                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                      exit();
                                    }
                                    
                                    $sql = "SELECT COUNT(*) AS totalservice FROM servicetypetbl WHERE serviceType='Dance Studio'";
                        $result = $conn->query($sql);
                        // Check if the query was successful
                        if ($result) {
                            // Fetch the count value
                            $row = $result->fetch_assoc();
                            $count = $row['totalservice'];
                            // Display the count in a text box
                            echo '<label for="txtdance">' . $count . '</label>';
                        } else {
                            echo 'Error executing the count query.';
                        }
                        ?>
                                </div>

                               
                                    


                                
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="right-column">
                        <div class="membership">
                            <div class="member">
                                <p>MEMBERSHIP</p>
                            </div>
                            <canvas id="doughnut-chart"></canvas>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
        <script src="chart1.js"></script>
        <script src="chart2.js"></script>
        <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
        </script>
        <script>
            // Get the sidebar and button elements
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.toggle-sidebar');

            // Add an event listener to the button to toggle the visibility of the sidebar
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('open');
            });
        </script>
</body>

</html>