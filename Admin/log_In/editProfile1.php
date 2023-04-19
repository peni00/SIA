<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>editProfile</title>
    <link rel="stylesheet" href="editprofile.css" media="screen">
    <link rel="stylesheet" href="editprofile1.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    <section
        class="Anton Antonio C1C1C1 D9D9D9 EFF Ellipse FFFFFF Lato Rectangle absolute admin align-items background border border-box border-radius box box-shadow box-sizing calc50 center color copyright display enter-email flex font-family font-size font-style font-weight height identical left line-height normal password position px px2 rfg rgba0 rgba70 show-pass sign-in solid text-align to top u-clearfix width u-section-1"
        id="sec-064e">
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
                            <a class="list-item" href="Profile1.php">View &nbsp;Profile</a>
                            <br><br><br>
                            <a class="list-item" onclick="return confirm('Are you sure to logout?');"
                                href="logout.php">Logout</a>
                        </div>
                    </div>
                </span>
                <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-2"
                    src="images/notif.png" alt="" data-image-width="512" data-image-height="512">
            </div>
        </div>
        <div class="blckcontainer"></div>
        <div class="admn">ADMIN ID:</div>
        <div class="admnID">#001</div>
        <div class="nam">Name:</div>
        <div class="nmin">
            <input type="text" value="Rodney Castillo"></input>
        </div>
        <div class="ps">Position:</div>
        <div class="psin">
            <input type="text" value="Administrator"></input>
        </div>
        <div class="st">Status:</div>
        <div class="stin">
            <input type="text" value="Active"></input>
        </div>
        <div class="cn">Contact Number:</div>
        <div class="cnin">
            <input type="text" value="0912 345 6789"></input>
        </div>
        <div class="em">Email Address:</div>
        <div class="emin">
            <input type="text" value="castillorod@gmail.com"></input>
        </div>
        <div class="pas">Password:</div>
        <div class="pasin">
            <input type="password" id="a-2056" value="pass"></input>
        </div>
        <div class="checkbox"><input type="checkbox" onclick="Toggle()">Show Password</input></div>
        <input class=" u-border-none u-btn u-btn-round u-button-style u-custom-font u-font-lato u-grey-70
                u-hover-palette-1-dark-1 u-radius-6 u-btn-1" type="file" id="image-input" accept="image/*"
            onchange="previewImage(event)"
            style=" position: absolute; width: 300px; height: 30px; left: 930px; top: 650px; background: #5B5B5B; border-radius: 5px;">
        <div>
            <image id="preview-image"></image>
        </div>
        <a href="editProfile1.php" type="submit" class="savebtn">SAVE CHANGES</a>
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
        </script>
</body>

</html>