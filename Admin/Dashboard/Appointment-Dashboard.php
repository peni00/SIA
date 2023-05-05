<?php 
require ('../connection.php');

$sql = "SELECT DATE_FORMAT(start_datetime, '%M') AS month, COUNT(*) AS total FROM appointmenttbl GROUP BY MONTH(start_datetime)";
$result = $conn->query($sql);

// Define the $month and $total arrays
$month = array();
$total = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
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
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='Dashboard1.css'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <script>
    let data1 = <?php echo json_encode($data1) ?>;
    </script>
    <script>
    let data2 = <?php echo json_encode($data2) ?>;
    </script>

</head>

<body>
    <div class="main">
        <div class="sidebar">
            <header>
                <img src="images/logo.png" style="width:60px; clip-path: circle()">
                <h1>RFG ELITE</h1>
            </header>

            <div class="admin">
                <img src="images/image10.png" class="user" style="width: 40px ">
                <button style="font-weight: 700">Admin Rod <div class="dropdown">
                        <img src="images/dropd.png" alt="dropdown icon" class="dropdown-icon">
                        <div class="dropdown-content">
                            <a class="dropdown-item"
                                href="http://localhost/SIA/Admin/log_In/Profile1.php">View&nbsp;&nbsp;Profile</a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure to logout?');"
                                href="http://localhost/SIA/Admin/log_In/logout.php">Logout</a>
                        </div>
                    </div>
                </button>
            </div>
            <!--sidebar-->

            <div class="container">
                <a href="http://localhost/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                        src="images/back-btn-gray.png" style="width: 30px"> </a>
                <h3 style="color:#0C0C0C">Home / <a href="#" style="color:#349EFF">Dashboard</a></h3>
                <div class="ARCHIVE">
                    <a href="#"><button class="serbtn">APPOINTMENT</button></a>
                    <a href="http://localhost/SIA/Admin/Dashboard/E-commerce-Dashboard.php"><Button
                            class="stabtn">E-COMMERCE</Button></a>
                    <a href="http://localhost/SIA/Admin/Dashboard/Inventory-Dashboard.php"><Button
                            class="appbtn">INVENTORY</Button></a>
                </div>
            </div>
            <!--container-->
            <div class="box-container"></div>
            <div class="box-container-2"></div>
            <div class="box-container-3"></div>
            <div class="box-container-4"></div>
            <div class="charts">
                <div class="chart">
                    <h2>APPOINTMENTS</h2>
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="chart1">
                    <canvas id="doughnut-chart"></canvas>
                    <h3>MEMBERS</h3>
                </div>
            </div>
            <div class="member">
                <p>NO. OF MEMBERS</p>
            </div>
            <div class="no">
                <h3>Gym</h3>
                <h3>Kyokushin</h3>
                <h3>Dance Studio</h3>
            </div>
            <div class="no1">
                <h4>250</h4>
                <h4>75</h4>
                <h4>200</h4>
            </div>
            <div class="trainee">
                <p>NO. OF TRAINERS</p>
            </div>
            <div class="num">
                <h3>Gym</h3>
                <h3>Kyokushin</h3>
                <h3>Dance Studio</h3>
            </div>
            <div class="num1">
                <h4>10</h4>
                <h4>3</h4>
                <h4>5</h4>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
            <script src="chart1.js"></script>
            <script src="chart2.js"></script>
            <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
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
</body>

</html>