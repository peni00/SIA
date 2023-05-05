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
                        <h4 class="m-2 font-weight-bold text-primary">Category&nbsp;<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width:100%" id="example3">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                          $conn = new mysqli("sbit3f-gym-2.ctwnycxphco9.ap-southeast-1.rds.amazonaws.com","admin","sbit3fruben","sbit3f");

                                          if($conn->connect_error){
                                              die("Connection failed: " . $conn->connect_error);
                                          }

                                          try{
                                              $stmt = $conn->prepare("SELECT * FROM category");
                                              $stmt->execute();
                                              $result = $stmt->get_result();
                                              while($row = $result->fetch_assoc()){
                                                  echo "
                                                  <tr>
                                                      <td>".$row['Ctgry_Name']."</td>
                                                      <td>
                                                          <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['Category_ID']."'><i class='fa fa-edit'></i> Edit</button>
                                                          <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['Category_ID']."'><i class='fa fa-trash'></i> Delete</button>
                                                      </td>
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

<?php include 'includes/category_modal.php'; ?>
<?php
 include('includes/scripts.php');
 include('includes/footer.php')
 ?>


<script>

$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.Category_ID);
      $('#edit_name').val(response.Ctgry_Name);
      $('.catname').html(response.Ctgry_Name);
    }
  });
}



</script>

</body>
</html>