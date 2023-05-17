<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Manage Stock Out Supply</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="stock_out_add.php" enctype="multipart/form-data">

              <input type="number" class="form-control" value="2" id="stock_type" name="stock_type" hidden>

              <label for="date" class="col-sm-12 control-label mt-3">Stock Out Date</label>
                <div class="col-sm-12">
                <input type="date" class="form-control" id="date" name="date" required>
                </div>

                    <div class="form-group">

                    <label for="customers" class="col-sm-12 control-label mt-3">Customers</label>

                    <div class="col-sm-12">
                    <select class="form-control" id="customers" name="customers" required>
                      <option value="" selected>- Select -</option>
                    </select>
                    </div>

                    <label for="name" class="col-sm-12 control-label mt-3">Name</label>
                    <div class="col-sm-12">
                    <input type="text" min="1" class="form-control" id="name" name="name" required>
                    </div>

                    <label for="street" class="col-sm-12 control-label mt-3">Street</label>
                    <div class="col-sm-12">
                    <input type="text" min="1" class="form-control" id="street" name="street" required>
                    </div>

                    <label for="barangay" class="col-sm-12 control-label mt-3">Barangay</label>
                    <div class="col-sm-12">
                    <input type="text" min="1" class="form-control" id="barangay" name="barangay" required>
                    </div>

                    <label for="city" class="col-sm-12 control-label mt-3">City</label>
                    <div class="col-sm-12">
                    <input type="text" min="1" class="form-control" id="city" name="city" required>
                    </div>

                    <label for="zip" class="col-sm-12 control-label mt-3">Zip Code</label>
                    <div class="col-sm-12">
                    <input type="number" min="1" class="form-control" id="zip" name="zip" required>
                    </div>


                    <label for="supply" class="col-sm-12 control-label mt-3">Product Supply</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="supply" name="supply[]" required>
                            <option value="" selected>- Select -</option>
                        </select>
                    </div>

                    <label for="pro_price" class="col-sm-12 control-label mt-3">Selling Price</label>

                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="pro_price" name="pro_price[]" readonly>
                    </div>

                    <label for="quantity" class="col-sm-12 control-label mt-3">Stock Out Quantity</label>
                    <div class="col-sm-12">
                    <input type="number" min="1" class="form-control" id="quantity" name="quantity[]" required>
                    </div>

                    <label for="total_stock" class="col-sm-12 control-label mt-3">Available Stocks</label>

                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="total_stock" name="total_stock" disabled>
                    </div>

                    <label for="total_stock" class="col-sm-12 control-label mt-3">Total Amount</label>

                    <div class="col-sm-12">
                    <input type="number" class="form-control" id="total_price" name="total_price" readonly>
                    </div>

        <!--             <span id="append-div"></span>
                    <div class="form-group mt-3">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button class="btn btn-primary btn-xs btn-flat" id="append"><i class="fa fa-plus"></i> Stock Out Field</button>
                    </div>
                </div> -->

                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>
