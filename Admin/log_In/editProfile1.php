<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>RFG ELITE | Edit Profile</title>
    <link rel="stylesheet" href="editprofile2.css" media="screen">
    <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
</head>

<body class="u-body u-xl-mode" data-lang="en">
    <section class="Anton Antonio C1C1C1 D9D9D9 EFF Ellipse FFFFFF Lato Rectangle absolute admin align-items background border border-box border-radius box box-shadow box-sizing calc50 center color copyright display enter-email flex font-family font-size font-style font-weight height identical left line-height normal password position px px2 rfg rgba0 rgba70 show-pass sign-in solid text-align to top u-clearfix width u-section-1" id="sec-65a1">
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
                        <li><a class="list-item" href="addUser.php">Add&nbsp;New&nbsp;User</a></li>
                        <li><a class="list-item" onclick="return confirm('Are you sure to logout?');" href="logout.php">
                                Logout</a></li>
                    </ul>
                </div>
            </div>

        </nav>

        <div class="pcon"></div>
        <div class="pcon1"></div>

        <div class="container">
            <div class="container-box">
                <form class="edit ">

                    <div class="right-side">

                        <div class="admin-header">
                            <h3>ADMIN INFORMATION</h3>
                        </div>
                        <div class="admininfo">
                            <div class="userid-box">
                                <h1 class="adID">ADMIN ID:</h1>
                                <h2 class="adIDe">#001</h2>

                            </div>
                            <div class="name">
                                <h3 class="fname">Name: </h3>
                                <input type="text" value="Rodney Castillo"></input>
                            </div>
                            <div class="position">
                                <!--php echo $edit['fullname'];-->
                                <h3 class="pos">Position:</h3>
                                <input type="text" value="Administrator"></input>
                            </div>
                            <div class="status">
                                <!--php echo $edit['category']; -->
                                <h3 class="stat">Status:</h3>
                                <input type="text" value="Active"></input>
                            </div>
                            <!--php echo $edit['status']; -->
                            <div class="contact">
                                <h3 class="con">Contact&nbsp;Number: </h3>
                                <input type="text" value="0912 345 6789"></input>
                            </div>
                            <!--php echo $edit['contactnum']; -->
                            <div class="address">
                                <h3 class="em">Email&nbsp;Address: </h3>
                                <input type="text" value="castillorod@gmail.com"></input>
                            </div>
                            <!--php echo $edit['email']; -->
                            <div class="password">
                                <h3 class="pas">Password: </h3> <input type="password" id="a-2056" value="pass"></input>
                                <div class="checkbox"><input type="checkbox" onclick="Toggle()"><span>Show Password</span></input></div>
                            </div>
                        </div>
                        <!--php echo $edit['password']; -->


                    </div>
                    <div class="left-side">
                        <div class="admin-profile">
                            <h3>ADMIN PROFILE</h3>
                        </div>
                        <div class="adminprof">


                            <image id="preview-image"> </image>

                            <input class="file-upload" type="file" id="image-input" accept="image/*" onchange="previewImage(event)">

                            <button>
                                <a href="editProfile1.php" type="submit" class="savebtn">SAVE CHANGES</a>
                            </button>
                        </div>

                    </div>
                </form>
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
        <script>
            // Change the type of input to password or text
            function Toggle() {
                var temp = document.getElementById("a-2056");
                if (temp.type === "password") {
                    temp.type = "text";
                } else {
                    temp.type = "password";
                }
            }

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