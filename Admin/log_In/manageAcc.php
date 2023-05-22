<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>RFG ELITE | Manage Accounts</title>
    <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="manageAcc.css" media="screen">

</head>

<body class="u-body u-xl-mode" data-lang="en">

    <section class="Anton Antonio C1C1C1 D9D9D9 EFF Ellipse FFFFFF Lato Rectangle absolute admin align-items background border border-box border-radius box box-shadow box-sizing calc50 center color copyright display enter-email flex font-family font-size font-style font-weight height identical left line-height normal password position px px2 rfg rgba0 rgba70 show-pass sign-in solid text-align to top u-clearfix width u-section-1" id="sec-d0e7">
        <nav>
            <div class="left-nav">
                <img class="logo-img" src="images/logo-modified.png" alt="" data-image-width="362" data-image-height="362">
                <p> RFG ELITE</p>
            </div>
            <div class="right-icon">
              
                <span class="icon" id="user-icon">
                    <i class="fa-solid fa-user" style="color: #000000;"></i>
                </span>
                <div class="dropdown-menu" id="user-dropdown">
                    <ul>
                        <li><a class="list-item" href="Profile1.php">View &nbsp;Profile</a></li>
                        <li><a class="list-item" href="addAcc.php">Add &nbsp;Account</a></li>
                        <li><a class="list-item" href="manageAcc.php">Manage &nbsp;Users</a></li>
                        <li><a class="list-item" onclick="return confirm('Are you sure to logout?');" href="logout.php">
                                Logout</a></li>
                    </ul>
                </div>
            </div>
            </nav>

            <form method="POST">
<div class="table-container">

<button type="submit" class="unbtn" name="delete" value="Delete" onclick="return confirm('are you sure want to delete?')">DELETE</button>
    <table>
   
        <thead>
        
            <tr>
                <th width="250"></th>
                <th>ADMIN ID</th>
                <th>NAME</th>
                <th>POSITION</th>
                <th>STATUS</th>
                <th>CONTACT NUMBER</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>IMAGE</th>

            </tr>

        </thead>

        <tbody>
        <tr>
                    <td><input type="checkbox">&nbsp;&nbsp;&nbsp;<button class="deleteBtn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2" for="click">EDIT
                        </button></td>
                    <td>20-2327</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                </tr>
                <tr>
                    <td><input type="checkbox">&nbsp;&nbsp;&nbsp;<button class="deleteBtn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2" for="click">EDIT
                        </button></td>
                    <td>20-2327</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                </tr>
                <tr>
                    <td><input type="checkbox">&nbsp;&nbsp;&nbsp;<button class="deleteBtn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2" for="click">EDIT
                        </button></td>
                    <td>20-2327</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                    <td>Sample</td>
                </tr>
        </tbody> 
        
    </table>
    
</form>

            <script>
        var icon = document.getElementById("user-icon");
        var dropdown = document.getElementById("user-dropdown");

        icon.addEventListener("click", function(event) {
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        });

        document.addEventListener("click", function(event) {
            if (!icon.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.style.display = "none";
            }
        });
    </script>
</body>

</html>