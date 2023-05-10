<?php include ('includes/session.php');?>

<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/menubar.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <?php
                            $i = 1;
                            $conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

                            if($conn->connect_error){
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $result = $conn->query("SELECT * FROM products order by name asc");

                            $total_stock_in = 0;
                            $total_stock_out = 0;

                            while ($row = $result->fetch_assoc()) {
                                $sup_arr[$row['id']] = $row['name'];
                                $supply_id = $row['id'];
                                $inn_stmt = $conn->prepare("SELECT sum(qty) as inn FROM inventory where stock_type = 1 and supply_id = ?");
                                $inn_stmt->bind_param('i', $supply_id);
                                $inn_stmt->execute();
                                $inn_result = $inn_stmt->get_result();
                                $inn = $inn_result->fetch_assoc()['inn'] ?? 0;

                                $out_stmt = $conn->prepare("SELECT sum(qty) as `out` FROM inventory where stock_type = 2 and supply_id = ?");
                                $out_stmt->bind_param('i', $supply_id);
                                $out_stmt->execute();
                                $out_result = $out_stmt->get_result();
                                $out = $out_result->fetch_assoc()['out'] ?? 0;

                                $total_stock_in += $inn;
                                $total_stock_out += $out;
                            }
                        ?>
                            <!-- Stock In (Total) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Stock In (Total)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_stock_in; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-truck-loading fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Stock Out (Total) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Stock Out (Total)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_stock_out; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-people-carry fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
                                    $conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

                                    if (!$conn) {
                                        $_SESSION['error'] = 'Connection failed: ' . mysqli_connect_error();
                                        header('location: dashboard.php');
                                        exit();
                                    }

                                    try {
                                        $stmt = $conn->prepare("SELECT COUNT(*) AS total_users FROM account");
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $total_users = $result->fetch_assoc()['total_users'];
                                    } catch (Exception $e) {
                                        $_SESSION['error'] = $e->getMessage();
                                        header('location: dashboard.php');
                                        exit();
                                    }

                                    mysqli_close($conn);
                                ?>
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                       Users (Total)</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_users; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            try {
                                $conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $stmt = mysqli_prepare($conn, "SELECT COUNT(*) AS total_products FROM products");

                                mysqli_stmt_execute($stmt);

                                $result = mysqli_stmt_get_result($stmt);

                                $row = mysqli_fetch_assoc($result);

                                $total_products = $row['total_products'];

                                mysqli_stmt_close($stmt);

                                mysqli_close($conn);

                            } catch (PDOException $e) {
                                $_SESSION['error'] = $e->getMessage();
                                header('location: dashboard.php');
                                exit();
                            }
                            ?>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Products (Total)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_products; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-box fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                    <!-- Content Row -->


                    </div>
    </div>
    <!-- End of Page Wrapper -->
    </div>
    </div>
<?php
 include('includes/scripts.php');
 include('includes/footer.php')
 ?>

