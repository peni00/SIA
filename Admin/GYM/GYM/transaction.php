<?php

include 'connection.php';

?>

<!DOCTYPE html>
<html>

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
            <div class="products">
                <div class="table-container">


                    <!-- DELETE MODAL-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="delete-modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p><b>Are you sure you want to delete the selected transaction/s?</b></p>
                                    </div>
                                    <div class="delete-confirmation">
                                        <button type="button" class="dlt-confirm2">Confirm</button>
                                        <button type="button" class="close-btn" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>TRANSACTION ID</th>
                                <th>CUSTOMER NAME</th>
                                <th>PRODUCT ID</th>
                                <th>PRODUCT NAME</th>
                                <th>CATERGORY</th>
                                <th>QUANTITY</th>
                                <th>PRICE</th>
                                <th>TOTAL</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql="SELECT * FROM transaction LEFT JOIN account ON transaction.Account_ID = account.Account_ID LEFT JOIN products ON transaction.Product_ID = products.id LEFT JOIN category ON products.Category_ID = category.Category_ID";
                            $result = mysqli_query($conn, $sql);

                                // Display data in HTML table
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?= $row['Transaction_ID'] ?></td>
                                    <td><?= $row['Name'] ?></td>
                                    <td><?= $row['Product_ID'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['Ctgry_Name'] ?></td>
                                    <td><?= $row['Qty'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?= $row['Price'] ?></td>
                                </tr>
                            <?php
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