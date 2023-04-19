<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Appointments</title>
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
                <a href="http://localhost/SIA/Admin/GYM/GYM/Staffs.php">
                    <li>STAFFS</li>
                </a>

                <a href="#" style="color:#349EFF">
                    <li>APPOINTMENTS</li>
                </a>
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

            </div>
            <!--container-->

            <div class="sortby">

                <button for="sort">SORT BY</button>
                <select class="sort">
                    <option value="option0"></option>
                    <option value="option1">Date and Time</option>
                    <option value="option2">Membership</option>
                    <option value="option3">Appointment Status</option>
                </select>

            </div>
            <div class="table-container">

                <button type="button" class="unbtn">DELETE</button>

                <table>
                    <thead>
                        <tr>
                            <th>
                            </th>
                            <th>APPOINTMENT ID</th>
                            <th>CLIENT NAME</th>
                            <th>STAFF NAME</th>
                            <th>MEMBERSHIP STATUS</th>
                            <th>SERVICE</th>
                            <th>DATE AND TIME</th>
                            <th>APPOINTMENT STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>SAMPLE</td>
                            <td>SAMPLE</td>
                            <td>SAMPLE</td>
                            <td>SAMPLE</td>
                            <td>SAMPLE</td>
                            <td>SAMPLE</td>
                            <td>SAMPLE</td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>

            <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
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
</body>

</html>