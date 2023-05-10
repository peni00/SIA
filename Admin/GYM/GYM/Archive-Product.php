<!DOCTYPE html>
<?php

include 'connection.php';
?>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Archive</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product3.css'>
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
                <a href="http://localhost/SIA/Admin/GYM/GYM/Products.php#">
                    <li>LIST OF PRODUCT</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/transaction.php">
                    <li>TRANSACTIONS</li>
                </a>
                <a href="#" style="color:#349EFF">
                    <li>ARCHIVE</li>
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
            <h3 style="color:#0C0C0C">Home / <a href="#" style="color:#349EFF">E-commerce</a></h3>
            <div class="ARCHIVE">
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archive-Product.php"><button
                        class="stabtn1">PRODUCTS</button></a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archive-Transaction.php"><Button
                        class="appbtn">TRANSACTIONS</Button></a>
            </div>
        </div>

        <!--container-->

        <div class="sortby">
            <button for="sort">SORT BY</button>
            <select class="sort" onchange="sortProducts()">
                <option value="option0"></option>
                <option value="category">Category ID</option>
            </select>
        </div>

        <script>
            function sortProducts() {
                var sortValue = document.querySelector('.sort').value;
                if (sortValue) {
                    window.location.href = '?sort=' + sortValue;
                }
            }
        </script>

        <?php
        if (isset($_GET['sort']) && $_GET['sort'] == 'category') {
            $query = "SELECT * FROM products ORDER BY category_id DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // display product details here
                }
            } else {
                echo "No products found";
            }
        }
        ?>


        <div class="table-container">
            <form method="POST" action="">
                <button type="submit" name="unarchive" class="unbtn">UNARCHIVE</button>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Category ID</th>
                            <th>PRODUCT NAME</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>PRODUCT IMAGE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM prodarchive");

                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='ids[]' value='" . $row['id'] . "'></td>";
                            echo "<td>" . $row['category_id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['category_id'] . "</td>";
                            echo "<td>₱ " . $row['price'] . "</td>";
                            $p_img_src = "data:image/jpeg;base64," . $row['photo'];
                            echo "<td><img src='" . $p_img_src . "' class='product-img'></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>

        <?php
        function delete_post($id, $conn)
        {
            $insert_query = mysqli_prepare($conn, "INSERT INTO products SELECT * FROM prodarchive WHERE id = ?");
            mysqli_stmt_bind_param($insert_query, "i", $id);
            mysqli_stmt_execute($insert_query);

            $delete_query = mysqli_prepare($conn, "DELETE FROM prodarchive WHERE id = ?");
            mysqli_stmt_bind_param($delete_query, "i", $id);
            mysqli_stmt_execute($delete_query);

            if (mysqli_affected_rows($conn) > 0) {
                return true; // product was deleted successfully
            } else {
                return false; // product was not deleted
            }
        }

        if (isset($_POST['unarchive'])) {
            if (!isset($_POST['ids']) || !is_array($_POST['ids']) || count($_POST['ids']) == 0) {
                $notification = "Error: No product selected for unarchiving";
            } else {
                $ids = $_POST['ids'];

                foreach ($ids as $id) {
                    delete_post($id, $conn);
                }

                $notification = "Products unarchived successfully";
                header("Refresh:0");
            }
        }

        // Output notification if it exists
        if (isset($notification)) {
            echo "<script>alert('$notification');</script>";
        }

        ?>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
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