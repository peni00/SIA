<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Staffs</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product1.css'>
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
                <a href="http://localhost/SIA/Admin/GYM/GYM/services.php">
                    <li>SERVICES</li>
                </a>
                <a href="#" style="color:#349EFF">
                    <li>STAFFS</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Appointment.php">
                    <li>APPOINTMENTS</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archives-Services.php">
                    <li>ARCHIVES</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Feedback.php">
                    <li>FEEDBACK</li>
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
                <h3 style="color:#0C0C0C">Home / <a href="#" style="color:#349EFF">Appointment</a></h3>
                <div class="search-bar">
                    <input type="text" placeholder="Search.." name="search">
                    <button><img src="images/search.png"></button>
                </div>
            </div>

            <!--container-->
            <div class="table-container">
                <button type="button" class="unbtn">DELETE</button>
                <table>
                    <thead>
                        <tr>
                            <th width="100"></th>
                            <th width="120">STAFF ID</th>
                            <th width="120">NAME</th>
                            <th width="120">POSITION</th>
                            <th width="120">SERVICE CATEGORY</th>
                            <th width="120">IMAGE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox">&nbsp;&nbsp;&nbsp;<button class="deleteBtn"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal2" for="click">EDIT
                                </button></td>
                            <td>20-2327</td>
                            <td>Sample</td>
                            <td>Sample</td>
                            <td>Training</td>
                            <td><img src="" alt="thisIsAnImage"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!--Add-product-->
            <div class="Add-product" aria-hidden="true">
                <input type="checkbox" id="click">
                <label class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1" for="click">
                    <img src="images/add.png">
                </label>
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                    aria-hidden="true" style="transform: translateX(-100%);">
                    <div class="modal-dialog">
                        <div class="modal-content"
                            style="background-color: black; color: white; border-radius: 10px; width: 490px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">STAFF DETAILS</h5></br></br></br>
                            </div>
                            <form id="staff-details-form">
                                <div class="modal-body" style="height: 200px;">
                                    <div class="prod-info">
                                        <label class="upload-photo5">
                                            <input type="file" name="myImage" accept="image/*">
                                        </label>
                                        <label for="staff-id-input">Staff ID: </label>
                                        <input type="text" id="staff-id-input" class="txt" required><br>
                                        <label for="staff-name-input">Name: </label>
                                        <input type="text" id="staff-name-input" class="txt" required><br>
                                        <label for="staff-position-input">Position: </label>
                                        <input type="text" id="staff-position-input" class="txt" required><br>
                                        <label for="staff-service-category-input">Service Category: </label>
                                        <input type="text" id="staff-service-category-input" class="txt" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="add-btn1">Confirm</button>
                                    <button type="button" class="close-btn7" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!--Delete-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="delete-modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p><b>you sure you want to delete this product?</b></p>
                            </div>
                            <div class="delete-confirmation">
                                <button type="button" class="dlt-confirm">Confirm</button>
                                <button type="button" class="close-btn" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="edit-modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h1>STAFF DETAILS</h1>
                                <div class="prod-info">
                                    <label class="upload-photo1">
                                        <p><img src="Image/photo.png"></p><input type="file" name="myImage"
                                            accept="image/*">
                                    </label></br>
                                    <label>Staff ID: </label>
                                    <input type="text" class="txt"><br />
                                    <label>Name: </label>
                                    <input type="text" class="txt"><br />
                                    <label>Position: </label>
                                    <input type="text" class="txt"><br />
                                    <label>Service Category: </label>
                                    <input type="text" class="txt">
                                </div>
                                <div class="edit-confirmation1">
                                    <button type="button" class="close-btn6" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="edit-confirm3">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
                integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
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
            <script>
            // Get the modal
            var modal = document.getElementById("exampleModal1");

            // Get the buttons
            var confirmBtn = document.getElementsByClassName("add-btn1")[0];
            var cancelBtn = document.getElementsByClassName("close-btn7")[0];

            // Add event listeners to the buttons
            confirmBtn.addEventListener("click", function() {
                // Functionality to confirm changes
                // For example, submit form data or make an AJAX request
                // Here, we just log a message to the console
                console.log("Changes confirmed!");
                // Close the modal
                modal.style.display = "none";
            });

            cancelBtn.addEventListener("click", function() {
                // Functionality to cancel changes
                // Here, we just log a message to the console
                console.log("Changes cancelled!");
                // Close the modal
                modal.style.display = "none";
            });
            </script>
</body>

</html>