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

            <div class="prod-content" style="transform: translateX(-90%);">
                <h1>ADD PRODUCT</h1>
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
                        <p><img src="images/photo.png"></p>
                        <input type="file" name="myImage" accept="image/*">
                    </label>
                    <div class="buttons">
                        <button type="button" class="dlt-confirm">Add</button>
                        <button type="button" class="close-btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Delete -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="delete-modal-dialog">>
                    <div class="modal-content">
                        <div class="modal-body">
                            <p><b>Are you sure you want to delete this product?</b></p>
                        </div>
                        <div class="delete-confirmation">
                            <button type="button" class="dlt-confirm">Confirm</button>
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
            reader.onload = function() {
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