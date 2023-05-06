<?php 
require ('../connection.php');

$sql = "SELECT Date, SUM(Total) AS TotalAmount FROM sales GROUP BY Date";
$result = mysqli_query($conn, $sql);

// Create arrays for chart data
$labels = array();
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['Date'];
    $data[] = $row['TotalAmount'];
}
$data1 = array(
    'labels' => $labels,
    'datasets' => array(
        array(
            'label' => 'Total Sales',
            'data' => $data,
            'fill' => false,
            'borderColor' => 'rgb(75, 192, 192)',
            'lineTension' => 0.1
        )
    )
);
// Close connection
mysqli_close($conn);

// Encode arrays to JSON format
$labels_json = json_encode($labels);
$data_json = json_encode($data);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/inventory-dashboard.css'>
    <script>
    let data1 = <?php echo json_encode($data1) ?>;
    </script>

    <link rel="icon" type="image/x-icon" href="images/logo.png">
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
                    <a href="http://localhost/SIA/Admin/Dashboard/Appointment-Dashboard.php"><button
                            class="serbtn1">APPOINTMENT</button></a>
                    <a href="#"><Button class="stabtn1">E-COMMERCE</Button></a>
                    <a href="http://localhost/SIA/Admin/Dashboard/Inventory-Dashboard.php"><Button
                            class="appbtn">INVENTORY</Button></a>
                </div>
            </div>
            <!--container-->

            <div class="box-container"></div>
            <div class="box-container-com"></div>
            <div class="box-container-4"></div>
            <div class="charts">
                <div class="chart">
                    <h3>SALES PER MONTH</h3>
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="chart1">
                    <canvas id="graph-chart"></canvas>
                    <h2>AVAILABLE&nbsp;&nbsp;PRODUCTS</h2>
                </div>
            </div>
            <div class="incm">
                <p>INCOME</p>
            </div>
            <div class="in">
                <h3>Daily</h3>
                <h3>Weekly</h3>
                <h3>Monthly</h3>
                <h3>Annual</h3>
            </div>
            <div class="prc">
                <h4>0,000.00</h4>
                <h4>0,000.00</h4>
                <h4>0,000.00</h4>
                <h4>0,000.00</h4>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
            <script src="chart1.js"></script>
            <script src="chart3.js"></script>
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


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
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