<?php

@include 'connection.php';

if(isset($_POST['add_product'])){
    $p_categ = $_POST['p_categ'];
    $p_name = $_POST['p_name'];
    $p_desc = $_POST['p_desc'];
    $p_slug = $_POST['p_slug'];
    $p_price = $_POST['p_price'];
    $p_img = $_FILES['p_img'];
    $p_img_tmp_name = $_FILES['p_img']['tmp_name'];
    $p_img_folder = 'images/uploaded/'.$p_img['name'];

    $insert_query = mysqli_prepare($conn, "INSERT INTO products(category_id,name, description, slug, price, photo) 
    VALUES(?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($insert_query, "ssssss", $p_categ , $p_name, $p_desc, $p_slug, $p_price, $p_img_folder);
    mysqli_stmt_execute($insert_query);

    if(mysqli_affected_rows($conn) > 0){
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
    <link rel='stylesheet' type='text/css' media='screen' href='css/product1.css'>
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
                <img src="images/image10.png" class="user" style="width: 40px ">
                <button style="font-weight: 700">Admin Rod <div class="dropdown">
                        <img src="images/dropd.png" alt="dropdown icon" class="dropdown-icon">
                        <div class="dropdown-content">
                            <a class="dropdown-item"
                                href="http://localhost/SIA/Admin/log_In/Profile1.php">View&nbsp;&nbsp;Profile</a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure to logout?');"
                                href="logout.php">Logout</a>
                        </div>
                    </div>
                </button>
            </div>
            <!--sidebar-->

            <div class="container">
                <a href="http://localhost/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                        src="images/back-btn-gray.png" style="width: 30px"> </a>
                <h3 style="color:#0C0C0C">Home / <a href="#" style="color:#349EFF">E-commerce</a></h3>
                <div class="search-bar">
                    <input type="text" placeholder="Search.." name="search">
                    <button><img src="images/search.png"></button>
                </div>
            </div>
            <!--container-->



            <div class="products">
                <div class="prod1">
                    <img src="images/prod1.jpg" class="product-img">
                    <label><b>Product ID:</b> 2303129*******</label><br />
                    <label><b>Product Name:</b> BEEF Protein Isolate</label><br />
                    <label><b>Category:</b> Supplement</label><br />
                    <label><b>Price:</b> ₱1450.00</label>
                    <br /><br />
                    <label>Stocks: 14</label>
                    <button type="button" class="trash-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        for="click">
                        <img src="images/delete.png">
                    </button>
                    <button type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                        for="click">
                        <img src="images/edit.png">
                    </button>
                </div>
                <div class="prod1 prod2">
                    <img src="images/prod1.jpg" class="product-img">
                    <label><b>Product ID:</b> 2303130*******</label><br />
                    <label><b>Product Name:</b> BEEF Protein Isolate</label><br />
                    <label><b>Category:</b> Supplement</label><br />
                    <label><b>Price:</b> ₱1450.00</label>
                    <br /><br />
                    <label>Stocks: 14</label>
                    <button type="button" class="trash-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        for="click">
                        <img src="images/delete.png">
                    </button>
                    <button type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                        for="click">
                        <img src="images/edit.png">
                    </button>
                </div>
                <div class="prod1 prod3">
                    <img src="images/prod3.jpg" class="product-img">
                    <label><b>Product ID:</b> 2303131*******</label><br />
                    <label><b>Product Name:</b>Fitness Gym Equipment Set</label><br />
                    <label><b>Category:</b> GYM Equipement</label><br />
                    <label><b>Price:</b> ₱5699.00</label>
                    <br /><br />
                    <label>Stocks: 1</label>
                    <button type="button" class="trash-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        for="click">
                        <img src="images/delete.png">
                    </button>
                    <button type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                        for="click">
                        <img src="images/edit.png">
                    </button>
                </div>
            </div>

            <!--Add-product-->
            <div class="Add-product">
                <input type="checkbox" id="click">
                <label for="click" class="add"><img src="images/add.png"></label>
                <form action="" method="post" class="add_product" enctype="multipart/form-data">
                    <h3>Add new product</h3>
                    <label>Category Id:</label>
                    <input type="number" name="p_categ" class="box" required><br/>
                    <label>Product Name:</label>
                    <input type="text" name="p_name" class="box" required><br/>
                    <label>Description:</label>
                    <input type="text" name="p_desc" class="box" required><br/>
                    <label>Slug:</label>
                    <input type="text" name="p_slug" class="box" required><br/>
                    <label>Price:</label>
                    <input type="number" name="p_price" class="box" required><br/>
                    <input type="file" name="p_img" class="box" required><br/>
                    <input type="submit" value="Add" name="add_product" class="-btn">

                </form>
            </div>


            <!-- Delete -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="delete-modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p><b>Are you sure you want to delete this product?</b></p>
                            </div>
                            <div class="delete-confirmation">
                                <button type="button" class="dlt-confirm1">Confirm</button>
                                <button type="button" class="close-btn" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                        <input type="file" id="image-input" accept="image/*"
                                            onchange="previewImage(event)">
                                    </label>
                                </div>
                                <div class="edit-confirmation1">
                                    <button type="button" class="edit-confirm1">Confirm</button>
                                    <button type="button" class="close-btn3" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('preview-image');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
            </script>


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
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

</body>

</html>