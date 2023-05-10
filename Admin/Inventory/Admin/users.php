<?php include ('includes/session.php');?>

<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/menubar.php');
?>
    <!-- Main content -->
    <div class="content-wrapper m-3">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h4 class="m-2 font-weight-bold text-primary">Users&nbsp;</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Photo</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                            $conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

                                            if($conn->connect_error){
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            try{
                                                $stmt = $conn->prepare("SELECT * FROM account");
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                while($row = $result->fetch_assoc()){
                                                    $image = (!empty($row['Account_Image'])) ? '../images/'.$row['Account_Image'] : '../images/profile.jpg';'';
                                                    echo "
                                                    <tr>
                                                        <td>
                                                        <img src='".$image."' height='30px' width='30px'>
                                                        </td>
                                                        <td>".$row['Email_Add']."</td>
                                                        <td>".$row['Name']."</td>
                                                        <td>".$row['Contact_Num']."</td>
                                                        <td>".$row['Street']." ".$row['Barangay']." ".$row['Street']." ".$row['City']." ".$row['Zip_Code']."</td>
                                                    </tr>
                                                    ";
                                                }
                                            }
                                            catch(Exception $e){
                                                echo "There is some problem in connection: " . $e->getMessage();
                                            }

                                            $stmt->close();
                                            $conn->close();
                                            ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            </div>
            </div>

<?php
 include('includes/scripts.php');
 include('includes/footer.php')
 ?>


</body>
</html>