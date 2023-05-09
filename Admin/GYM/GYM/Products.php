<?php

include 'connection.php';

$message = '';

if (isset($_POST['add_product'])) {
    $p_categ = $_POST['p_categ'];
    $p_name = $_POST['p_name'];
    $p_desc = $_POST['p_desc'];
    $p_slug = $_POST['p_slug'];
    $p_price = $_POST['p_price'];
    $p_img = $_FILES['p_img'];
    $p_img_content = file_get_contents($p_img['tmp_name']);
    $p_img_encoded = base64_encode($p_img_content);

    $mysql_query = mysqli_prepare($conn, "INSERT INTO products(category_id,name, description, slug, price, photo) 
    VALUES(?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($mysql_query, "ssssss", $p_categ, $p_name, $p_desc, $p_slug, $p_price, $p_img_encoded);
    mysqli_stmt_execute($mysql_query);

    if (mysqli_affected_rows($conn) > 0) {
        $message = "Product added successfully";
    } else {
        $message = "Error adding product";
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
                    $p_img_src = "data:image/jpeg;base64," . $row['photo'];
                    echo "<img src='" . $p_img_src . "' class='product-img'>";
                    // Rest of the code
                    echo "<label><b>Category ID:</b> " . $row['category_id'] . "</label><br />";
                    echo "<label><b>Product Name:</b> " . $row['name'] . "</label><br />";
                    echo "<label><b>Description:</b> " . $row['description'] . "</label><br />";
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
            <?php if (!empty($message)) { ?>
                <p>
                    <?php echo $message; ?>
                </p>
            <?php } ?>
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
            $insert_query = mysqli_prepare($conn, "INSERT INTO prodarchive SELECT * FROM products WHERE id = ?");
            mysqli_stmt_bind_param($insert_query, "i", $id);
            mysqli_stmt_execute($insert_query);

            $delete_query = mysqli_prepare($conn, "DELETE FROM products WHERE id = ?");
            mysqli_stmt_bind_param($delete_query, "i", $id);
            mysqli_stmt_execute($delete_query);

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

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <form method="POST">
                <div class="modal-dialog">
                    <div class="edit-modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h1>PRODUCT DETAILS</h1>
                                <div class="prod-info">
                                    <label>Category ID: </label>
                                    <input type="number" class="txt" name="category_id" required><br />
                                    <label>Product Name: </label>
                                    <input type="text" class="txt" name="product_name" required><br />
                                    <label>Description: </label>
                                    <input type="text" class="txt" name="description" required><br />
                                    <label>Price: </label>
                                    <input type="number" class="txt" name="price" required>
                                    <label class="upload-photo">
                                        <img id="preview-image"></img>
                                        <input type="file" id="image-input" accept="image/*"
                                            onchange="previewImage(event)" name="product_image" required>
                                    </label>
                                    <input type="hidden" id="base64-image" name="base64Image" value="">
                                    <input type="hidden" id="txtid" name="txtid" value="">
                                </div>
                                <div class="edit-confirmation1">
                                    <button type="submit" class="edit-confirm1" name="confirm">Confirm</button>
                                    <button type="button" class="close-btn1" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!-- PHP code for updating the product -->
        <?php
        // check if the form is submitted
        if (isset($_POST['confirm'])) {
            // retrieve the form data
            $p_categ = $_POST['category_id'];
            $p_name = $_POST['product_name'];
            $p_desc = $_POST['description'];
            $p_price = $_POST['price'];
            $p_img_src = $_POST['base64Image'];
            $p_id = $_POST['txtid'];

            // update the product in the database
            $sql = "UPDATE `products` SET `category_id`='$p_categ', `name`='$p_name', `description`='$p_desc', `price`='$p_price', `photo`='$p_img_src' WHERE `id`='$p_id'";
            $query2 = mysqli_query($conn, $sql);

            if (!$query2) {
                die("Error: " . mysqli_error($conn));
            }

        }
        ?>

        <!-- JavaScript code to set the product ID in the edit modal -->
        <script>
            // function to set the value of the hidden input field
            function setProductId(id) {
                document.getElementsByName('txtid')[0].value = id;
            }
            // add a click event listener to the edit button
            document.querySelectorAll('.edit-btn').forEach(editBtn => {
                editBtn.addEventListener('click', () => {
                    document.getElementsByName('txtid')[0].value = editBtn.getAttribute('data-id');
                });
            });

        </script>


        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function () {
                    var output = document.getElementById('preview-image');
                    output.src = reader.result;

                    // Convert the uploaded image to a base64-encoded string
                    var base64Image = reader.result.replace(/^data:image\/(png|jpeg|jpg);base64,/, '');

                    // Set the value of the hidden input field to the base64-encoded string
                    document.getElementById('base64-image').value = base64Image;
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