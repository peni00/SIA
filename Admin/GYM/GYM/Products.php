<?php

include 'connection.php';

if (isset($_POST['add_product'])) {
    $p_categ = $_POST['p_categ'];
    $p_name = $_POST['p_name'];
    $p_desc = $_POST['p_desc'];
    $p_slug = $_POST['p_slug'];
    $p_price = $_POST['p_price'];
    //$p_stock = $_POST['p_stock'];
    $p_img = $_FILES['p_img'];
    $p_img_tmp_name = $_FILES['p_img']['tmp_name'];
    $p_img_folder = 'images/uploaded/' . $p_img['name'];

    $mysql_query = mysqli_prepare($conn, "INSERT INTO products(category_id,name, description, slug, price, photo) 
    VALUES(?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($mysql_query, "ssssss", $p_categ, $p_name, $p_desc, $p_slug, $p_price, $p_img_folder);
    mysqli_stmt_execute($mysql_query);

    if (mysqli_affected_rows($conn) > 0) {
        move_uploaded_file($p_img_tmp_name, $p_img_folder);
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Products</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product2.css'>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
</head>

<body>
    <div class="main">
        <div class="sidebar">
            <header>
                <img src="images/logo.png" style="width:60px; clip-path: circle()">
                <h1>RFG ELITE</h1>
            </header>
            <ul>
                <a href="#" style="color:#349EFF">
                    <li>LIST OF PRODUCT</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/transaction.php">
                    <li>TRANSACTIONS</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archive-Product.php">
                    <li>ARCHIVE</li>
                </a>

            </ul>
            <div class="admin">
                <img src="images/image10.png" class="user" style="width: 40px">
                <button style="font-weight: 700">Admin Rod
                    <img src="images/dropd.png" style="width:25px">
                </button>
            </div>
        </div>
        <!--sidebar-->

        <div class="container">
            <a href="http://localhost/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                    src="images/back-btn-gray.png" style="width: 30px"> </a>
            <h3>Home / <a href="#" style="color:#349EFF">E-commerce</a></h3>
            <div class="search-bar">
                <input type="text" placeholder="Search.." name="search">
                <button><img src="images/search.png"></button>
            </div>
        </div>

        <!--container-->

        <div class="products">
            <div class="prod1">
                <?php
                // Retrieve data from database then it will show in container
                $query = mysqli_query($conn, "SELECT * FROM products");

                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<div class='product'>";
                    echo "<img src='" . $row['photo'] . "' class='product-img'>";
                    echo "<label><b>Category ID:</b> " . $row['category_id'] . "</label><br />";
                    echo "<label><b>Product Name:</b> " . $row['name'] . "</label><br />";
                    echo "<label><b>Description:</b> " . $row['description'] . "</label><br />";
                    //echo "<label><b>Stocks:</b>" . $row['stock'] . "</label><br /><br />";
                    echo "<label><b>Price:</b> ₱ " . $row['price'] . "</label><br /><br />";
                    echo "<button type='button' class='delete-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-prod-id='" . $row['id'] . "'><img src='images/delete.png'></button>";
                    echo "<button type='button' class='edit-btn' data-bs-toggle='modal' data-bs-target='#exampleModal1' data-id='" . $row['id'] . "'><img src='images/edit.png'></button>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>




        <!--Add-product-->

        <div class="Add-product">
            <input type="checkbox" id="click">
            <label for="click" class="add"><img src="images/add.png"></label>

            <div class="prod-content">
                <form action="" method="post" class="add_product" enctype="multipart/form-data">
                    <h1>ADD PRODUCT</h1>
                    <div class="prod-info">
                        <label>Category ID: </label>
                        <input type="text" name="p_categ" class="txt" required><br />
                        <label>Product Name: </label>
                        <input type="text" name="p_name" class="txt" required><br />
                        <label>Description: </label>
                        <input type="text" name="p_desc" class="txt" required><br />
                        <label>Slug: </label>
                        <input type="text" name="p_slug" class="txt" required><br />
                        <label>Price: </label>
                        <input type="number" name="p_price" class="txt" required><br />
                        <!--<label>Stocks: </label>
                        <input type="number" name="p_stock" class="txt" required>-->
                        <label class="upload-photo">
                            <p><img src="images/photo.png"></p>
                            <input type="file" name="p_img" accept="image/*" required>
                        </label>
                        <div class="buttons">
                            <input type="submit" class="dlt-confirm" value="Add" name="add_product">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
        <!-- Delete -->

        <!-- Modal for confirmation -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="delete-modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-body">
                                <p><b>Are you sure you want to delete this product?</b></p>
                                <input type="hidden" name="id" id="modal-prod-id" value="">
                            </div>
                            <div class="delete-confirmation">
                                <button type="submit" class="dlt-confirm" name="confirm_delete">Confirm</button>
                                <button type="button" class="close-btn" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php

        // Function to delete a post
        function delete_post($id, $conn)
        {
            $mysql_query = mysqli_prepare($conn, "DELETE FROM products WHERE id = ?");
            mysqli_stmt_bind_param($mysql_query, "i", $id);
            mysqli_stmt_execute($mysql_query);

            if (mysqli_affected_rows($conn) > 0) {
                return true; // product was deleted successfully
            } else {
                return false; // product was not deleted
            }
        }

        // Check if the user confirmed the deletion
        if (isset($_POST['confirm_delete'])) {
            $id = $_POST['id'];
            $result = delete_post($id, $conn);
            if ($result) {
                echo "Product deleted successfully";
            } else {
                echo "Product could not be deleted";
            }
        }

        ?>

        <!-- Script to update modal product ID when delete button is clicked -->
        <script>
            var deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(function (deleteButton) {
                deleteButton.addEventListener('click', function () {
                    var prodId = deleteButton.getAttribute('data-prod-id');
                    document.getElementById('modal-prod-id').value = prodId;
                });
            });
        </script>

        <!-- Edit -->

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="edit-modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h1>PRODUCT DETAILS</h1>
                            <div class="prod-info">
                                <label>Product Name: </label>
                                <input type="text" class="txt"><br />
                                <label>Category: </label>
                                <input type="text" class="txt"><br />
                                <label>Price: </label>
                                <input type="text" class="txt"><br />
                                <label>No. of Stocks: </label>
                                <input type="text" class="txt">
                                <label class="upload-photo">
                                    <img id="preview-image"></img>
                                    <input type="file" id="image-input" accept="image/*" onchange="previewImage(event)">
                                </label>
                            </div>
                            <div class="edit-confirmation1">
                                <button type="button" class="edit-confirm1">Confirm</button>
                                <button type="button" class="close-btn1" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function () {
                    var output = document.getElementById('preview-image');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
            </script>
</body>

</html>