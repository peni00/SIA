<?php

include 'connection.php';

?>

<!DOCTYPE html>
<html>
<?php
$conn = mysqli_connect("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

?>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Transactions</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product4.css'>
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
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Products.php#">
                    <li>LIST OF PRODUCT</li>
                </a>
                <a href=" #" style="color:#349EFF">
                    <li>TRANSACTIONS</li>
                </a>
                <a href="http://18.136.105.108:81/SIA/Admin/GYM/GYM/Archive-Product.php">
                    <li>ARCHIVE</li>
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
                <h3 style="color:#0C0C0C">Home / <a href="#" style="color:#349EFF">E-commerce</a></h3>
                <div class="search-bar">
                    <input type="text" placeholder="Search.." name="search">
                    <button><img src="images/search.png"></button>
                </div>
            </div>
            <!--container-->
            <div class="products">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>         </th>
                                <th>         </th>
                              
                                <th style="text-align: center;">TRANSACTION ID</th>
                                <th style="text-align: center;">CUSTOMER NAME</th>
                                <th style="text-align: center;">PRODUCT ID</th>
                                <th style="text-align: center;">PRODUCT NAME</th>
                                <th>CATERGORY</th>
                                <th>QUANTITY</th>
                                <th style="text-align: center;">PRICE</th>
                                <th>TOTAL</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT t.Transaction_ID, t.Name, t.Product_ID, p.name, p.category_id, t.Qty, t.Price, t.Total
                            FROM transaction t
                            JOIN products p ON p.id = t.Product_ID";

                            $result = mysqli_query($conn, $sql);

                            // Display data in HTML table
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['Transaction_ID'];
                                    $name = $row['Name'];
                                    $pid = $row['Product_ID'];
                                    $pname = $row['name'];
                                    $category = $row['category_id'];
                                    $qty = $row['Qty'];
                                    $price = $row['Price'];
                                    $total = $row['Total'];

                                    echo "<tr>";
                                    echo "<td></td>";
                                    echo "<td><input type='checkbox' name='check[]' value='" . $row['Transaction_ID'] . "'> &nbsp;&nbsp;&nbsp;";
                                
                                    echo "<td style='text-align: center;'>" . $row['Transaction_ID'] . "</td>";
                                    echo "<td style='text-align: center;'>" . $row['Name'] . "</td>";
                                    echo "<td style='text-align: center;'>" . $row['Product_ID'] . "</td>";
                                    echo "<td style='text-align: center;'>" . $row['name'] . "</td>";
                                    echo "<td style='text-align: center;'>" . $row['category_id'] . "</td>";
                                    echo "<td style='text-align: center;'>" . $row['Qty'] . "</td>";
                                    echo "<td style='text-align: center;'>" . $row['Price'] . "</td>";
                                    echo "<td style='text-align: center;'>" . $row['Total'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No data found</td></tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
                integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
                crossorigin="anonymous">
            </script>

</body>

</html>