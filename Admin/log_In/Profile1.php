<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="Profile1.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    <section
        class="Anton Antonio C1C1C1 D9D9D9 EFF Ellipse FFFFFF Lato Rectangle absolute admin align-items background border border-box border-radius box box-shadow box-sizing calc50 center color copyright display enter-email flex font-family font-size font-style font-weight height identical left line-height normal password position px px2 rfg rgba0 rgba70 show-pass sign-in solid text-align to top u-clearfix width u-section-1"
        id="sec-65a1">
        <div class="u-container-style u-custom-color-4 u-group u-shape-rectangle u-group-1">
            <div class="u-container-layout u-container-layout-1">
                <p class="u-text u-text-custom-color-1 u-text-default u-text-1"> RFG ELITE</p>
                <div class="u-border-2 u-border-white u-image u-image-circle u-image-contain u-image-1" alt=""
                    data-image-width="362" data-image-height="362"></div>

                <span class=" u-icon u-icon-1">
                    <div class="dropdown">
                        <button class="icon-button">
                            <div class="icon"></div>
                        </button>
                        <div class="dropdown-content">

                            <a class="list-item" href="Profile1.php">View&nbsp;Profile</a>
                            <br><br><br>
                            <a class="list-item" onclick="return confirm('Are you sure to logout?');" href="logout.php">
                                Logout</a>

                        </div>
                    </div>
                    <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style="">
                    </svg>
                </span>

                <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-2"
                    src="images/notif.png" data-image-width="512" data-image-height="512">
            </div>
        </div>

        <div class="pcon"></div>
        <div class="pcon1"></div>
        <form class="edit">
            <div class="image-preview"></div>
            <div class="adID">ADMIN ID:</div>
            <div class="adIDe">#001</div>
            <div class="fname">Name:</div>
            <div class="fullname">Rodney&nbsp;&nbsp;&nbsp;Castillo</div>
            <!--php echo $edit['fullname'];-->
            <div class="pos">Position:</div>
            <div class="category">Administrator</div>
            <!--php echo $edit['category']; -->
            <div class="stat">Status:</div>
            <div class="status">Active</div>
            <!--php echo $edit['status']; -->
            <div class="con">Contact&nbsp;Number:</div>
            <div class="contactnum">0912 345 6789</div>
            <!--php echo $edit['contactnum']; -->
            <div class="em">Email&nbsp;Address:</div>
            <div class="email">castillorod@gmail.com</div>
            <!--php echo $edit['email']; -->
            <div class="pas">Password:</div> <input type="password" class="passwrd" id="a-2056" value="pass"></input>
            <!--php echo $edit['password']; -->
            <div class="checkbox"><input type="checkbox" onclick="Toggle()">Show Password</input></div>
            <a href="editProfile1.php" type="submit" class="subbtn">EDIT</a>
        </form>

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
        </script>

</body>

</html>