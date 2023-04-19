<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Services</title>
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
                <a href="#" style="color:#349EFF">
                    <li>SERVICES</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Staffs.php">
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
                <table>
                    <thead>
                        <tr>
                            <th width="160"></th>
                            <th>SERVICE ID</th>
                            <th>SERVICES</th>
                            <th>DETAILS</th>
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
                        </tr>

                    </tbody>
                </table>
            </div>

            <!--Add-product-->

            <div class="Add-product">
                <input type="checkbox" id="click">
                <label for="click" type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                    for="click">
                    <img src="images/add.png">
                </label>
                <div class="prod-content">
                    <h1>DETAILS</h1>
                    <div class="prod-info">
                        <label>Service ID: </label>#001 <br />
                        <label>Service: </label>
                        <input type="text" class="txt"><br />
                        <label>Details: </label>
                        <input type="text" class="txt"><br />
                        <div class="buttons">
                            <button type="button" class="close-btn1" data-bs-dismiss="modal">CANCEL</button>
                            <button type="button" class="edit-confirm1">ADD</button>
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
                                <h1>DETAILS</h1>
                                <div class="prod-info">
                                    <label>Service ID : </label>
                                    <label>#001</label><br />
                                    <label>Service: </label>
                                    <input type="text" class="txt"><br />
                                    <label>Details: </label>
                                    <input type="text" class="txt"><br />
                                </div>
                                <div class="edit-confirmation1">
                                    <button type="button" class="close-btn1"
                                        data-bs-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;<button
                                        type="button" class="edit-confirm1">Confirm</button>
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
</body>

</html>