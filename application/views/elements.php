
  
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">

        <!-- Category -->
        <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Category</h6>
              <p></p>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Category</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-secondary text-sm">Element Name</th>
                      <th class="align-middle text-center text-secondary text-sm">Status</th>
                      <th class="align-middle text-center text-secondary text-sm" colspan="2">Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-xs font-weight-bold"><h7 class="mx-3 mb-0 text-m ">Category</h7></td>
                      <td class="align-middle text-center text-sm"><span class="badge badge-m bg-gradient-success">status</span></td>
                      
                      <td class="align-middle text-center"><button class="badge badge-m btn bg-gradient-warning" data-toggle="modal" data-target="#editCategory"><i class="fa fa-pen top-0" title="Edit"></i></button></td>
                      <td class="align-middle text-center" ><button class="badge bagde-m btn bg-gradient-danger" data-toggle="modal" data-target="#delCategory"><i class="fa fa-trash top-0" title="Delete"></i></button></td>
                      <td></td>
                      <!-- <td><a href="<?= base_url(); ?>admin/update/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-info">Edit</span></a></td>
                      <td><a href="<?= base_url(); ?>admin/delete/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-danger" onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Delete</span></a></td> -->
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
        <!-- End category -->

        <!-- Brand -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Brand</h6>
              <p></p>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBrand"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Brand</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-secondary text-sm">Brand Name</th>
                      <th class="align-middle text-center text-secondary text-sm">Status</th>
                      <th class="align-middle text-center text-secondary text-sm" colspan="2">Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-xs font-weight-bold"><h7 class="mx-3 mb-0 text-m ">Category</h7></td>
                      <td class="align-middle text-center text-sm"><span class="badge badge-m bg-gradient-success">status</span></td>
                      
                      <td class="align-middle text-center"><button class="badge badge-m btn bg-gradient-warning" data-toggle="modal" data-target="#editBrand"><i class="fa fa-pen top-0" title="Edit"></i></button></td>
                      <td class="align-middle text-center" ><button class="badge bagde-m btn bg-gradient-danger" data-toggle="modal" data-target="#delBrand"><i class="fa fa-trash top-0" title="Delete"></i></button></td>
                      <td></td>
                      <!-- <td><a href="<?= base_url(); ?>admin/update/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-info">Edit</span></a></td>
                      <td><a href="<?= base_url(); ?>admin/delete/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-danger" onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Delete</span></a></td> -->
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
        <!-- End brand -->
        
        </div>
      </div>

      <!-- Modal -->
    <!-- Add Category -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
            <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
          </div>

          <div class="modal-body">
            <form action="<?= base_url(); ?>Supplier/addSupplier/" method="post">

              <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name ..." required>
              </div>
              <div class="form-group">
                <label for="active">Status</label>
                <select class="form-control" id="active" name="active">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-round bg-gradient-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Add Brand -->
    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="addBrandLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
            <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
          </div>

          <div class="modal-body">
            <form action="<?= base_url(); ?>Supplier/addSupplier/" method="post">

              <div class="form-group">
                <label for="name">Brand Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name ..." required>
              </div>
              <div class="form-group">
                <label for="active">Status</label>
                <select class="form-control" id="active" name="active">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-round bg-gradient-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit Category -->
    <div class="modal fade" tabindex="-1" aria-labelledby="editCategoryLabel" role="dialog" id="editCategory">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Category</h5>
            <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
          </div>

          <form role="form" action="<?php echo base_url('Supplier/editSupplier') ?>" method="post" id="updateForm">

            <div class="modal-body">
              <div id="messages"></div>

              <input type="hidden" class="form-control" id="supplier_id" name="supplier_id">
              <div class="form-group">
                <label for="edit_brand_name">Category Name</label>
                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Enter inventory name" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-round bg-gradient-primary">Save changes</button>
            </div>

          </form>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Edit Brand -->
    <div class="modal fade" tabindex="-1" aria-labelledby="editBrandLabel" role="dialog" id="editBrand">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Brand</h5>
            <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
          </div>

          <form role="form" action="<?php echo base_url('Supplier/editSupplier') ?>" method="post" id="updateForm">

            <div class="modal-body">
              <div id="messages"></div>

              <input type="hidden" class="form-control" id="supplier_id" name="supplier_id">
              <div class="form-group">
                <label for="edit_brand_name">Brand Name</label>
                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Enter inventory name" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-round bg-gradient-primary">Save changes</button>
            </div>

          </form>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Detele Brand -->
    <div class="modal fade" tabindex="-1" aria-labelledby="delBrandLabel" role="dialog" id="delBrand">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Remove Brand</h5>
            <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
          </div>

          <form role="form" action="<?php echo base_url('Supplier/remove') ?>" method="post" id="removeForm">
            <div class="modal-body">
              <input type="hidden" name="supplier_id" id="supplier_id">
              <p>Do you really want to remove this brand?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>


        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Detele Category -->
    <div class="modal fade" tabindex="-1" aria-labelledby="delCategoryLabel" role="dialog" id="delCategory">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Remove Category</h5>
            <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
          </div>

          <form role="form" action="<?php echo base_url('Supplier/remove') ?>" method="post" id="removeForm">
            <div class="modal-body">
              <input type="hidden" name="supplier_id" id="supplier_id">
              <p>Do you really want to remove this category?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>


        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

      
  </main>
