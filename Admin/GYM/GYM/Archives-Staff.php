<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Archive</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='transaction.css'>

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

                <a href="http://localhost/SIA/Admin/GYM/GYM/Appointment.php">
                    <li>APPOINTMENTS</li>
                </a>
                </a>
                <a href="#" style="color:#349EFF">
                    <li>ARCHIVES</li>
                </a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Feedback.php">
                    <li>FEEDBACK</li>
                </a>
            </ul>
            <div class="admin">
                <img src="images/image10.png" class="user" style="width: 40px">
                <button style="font-weight: 700">Admin Rod
                    <img src=" images/dropd.png" style="width:25px">
                </button>
            </div>
        </div>
        <!--sidebar-->

        <div class="container">
            <a href="http://localhost/SIA/Admin/log_In/homepage.php" type="button" class="back-btn"><img
                    src="images/back-btn-gray.png" style="width: 30px"> </a>
            <h3>Home / <a href="#" style="color:#349EFF">Appointment</a></h3>
            <div class="ARCHIVE">
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archives-Services.php"><button
                        class="serbtn1">SERVICE</button></a>
                <a href="#"><Button class="stabtn1">STAFF</Button></a>
                <a href="http://localhost/SIA/Admin/GYM/GYM/Archives-Appointment.php"><Button
                        class="appbtn">APPOINTMENT</Button></a>
            </div>
        </div>
        <!--container-->

        <div class="sortby">

            <button for="sort">SORT BY</button>
            <select class="sort">
                <option value="option0"></option>
                <option value="option1">Name</option>
                <option value="option2">Position</option>
                <option value="option3">Service Category</option>
            </select>

        </div>
        <div class="table-container">

            <button type="button" class="unbtn">UNARCHIVE</button>

            <table>
                <thead>
                    <tr>
                        <th width="200"></th>
                        <th>STAFF ID</th>
                        <th>NAME</th>
                        <th>POSITION</th>
                        <th>SERVICE CATEGORY</th>
                        <th>IMAGE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>SAMPLE</td>
                        <td>SAMPLE</td>
                        <td>SAMPLE</td>
                        <td>SAMPLE</td>
                        <td><img src="" alt="thisIsAnImage"></td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>

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