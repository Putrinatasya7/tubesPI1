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
              <!-- alert -->
              <?php if ($this->session->flashdata('message_category')) : ?>
                <div class="alert alert-success col-md-auto alert-dismissible fade show text-white" role="alert">
                  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                  <span class="alert-text"><strong>Success!</strong> <?= $this->session->flashdata('message_category'); ?>!</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <?php $this->session->unset_userdata('message_category'); ?>
              <!-- alert -->
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-secondary text-sm">Category Name</th>
                      <th class="align-middle text-center text-secondary text-sm">Status</th>
                      <th class="align-middle text-center text-secondary text-sm">Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($category as $c) : ?>
                      <tr>
                        <td class="text-xs font-weight-bold">
                          <h7 class="mx-3 mb-0 text-m "><?= $c['category']; ?></h7>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <?php if ($c['status'] == 'Active') :  ?>
                            <span class="badge badge-sm bg-gradient-success"><?= $c['status']; ?></span>
                          <?php else : ?>
                            <span class="badge badge-sm bg-gradient-secondary"><?= $c['status']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td class="align-middle text-center"><button class="badge badge-m btn bg-gradient-warning" data-toggle="modal" data-target="#editCategory" id="editCategorybutton" data-id="<?= $c['category_id']; ?>" data-category="<?= $c['category']; ?>" data-catstatus="<?= $c['status']; ?>"><i class="fa fa-pen top-0" title="Edit"></i></button></td>
                        <!-- <td class="align-middle text-center"><button class="badge bagde-m btn bg-gradient-danger" data-toggle="modal" data-target="#delCategory" id="delCategorybutton" data-id="<?= $c['category_id']; ?>"><i class="fa fa-trash top-0" title="Delete"></i></button></td> -->
                        <td></td>
                        <!-- <td><a href="<?= base_url(); ?>admin/update/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-info">Edit</span></a></td>
                      <td><a href="<?= base_url(); ?>admin/delete/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-danger" onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Delete</span></a></td> -->
                      </tr>
                    <?php endforeach; ?>
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
              <!-- alert -->
              <?php if ($this->session->flashdata('message_brand')) : ?>
                <div class="alert alert-success col-md-auto alert-dismissible fade show text-white" role="alert">
                  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                  <span class="alert-text"><strong>Success!</strong> <?= $this->session->flashdata('message_brand'); ?>!</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <?php $this->session->unset_userdata('message_brand'); ?>
              <!-- alert -->
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-secondary text-sm">Brand Name</th>
                      <th class="align-middle text-center text-secondary text-sm">Status</th>
                      <th class="align-middle text-center text-secondary text-sm">Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($brand as $b) : ?>
                      <tr>
                        <td class="text-xs font-weight-bold">
                          <h7 class="mx-3 mb-0 text-m "><?= $b['merk']; ?></h7>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <?php if ($b['status'] == 'Active') :  ?>
                            <span class="badge badge-sm bg-gradient-success"><?= $b['status']; ?></span>
                          <?php else : ?>
                            <span class="badge badge-sm bg-gradient-secondary"><?= $b['status']; ?></span>
                          <?php endif; ?>
                        </td>

                        <td class="align-middle text-center"><button class="badge badge-m btn bg-gradient-warning" data-toggle="modal" data-target="#editBrand" id="editBrandbutton" data-id="<?= $b['merk_id']; ?>" data-merk="<?= $b['merk']; ?>" data-brandstatus="<?= $b['status']; ?>"><i class="fa fa-pen top-0" title="Edit"></i></button></td>
                        <!-- <td class="align-middle text-center"><button class="badge bagde-m btn bg-gradient-danger" data-toggle="modal" data-target="#delBrand" id="delBrandbutton" data-id="<?= $b['merk_id']; ?>"><i class="fa fa-trash top-0" title="Delete"></i></button></td> -->
                        <td></td>
                        <!-- <td><a href="<?= base_url(); ?>admin/update/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-info">Edit</span></a></td>
                      <td><a href="<?= base_url(); ?>admin/delete/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-danger" onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Delete</span></a></td> -->
                      </tr>
                    <?php endforeach; ?>
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
            <form action="<?= base_url(); ?>Elements/addCategory/" method="post">

              <div class="form-group">
                <label for="name_category">Category Name</label>
                <input type="text" class="form-control" name="name_category" id="name_category" placeholder="Enter name ..." required>
              </div>
              <div class="form-group">
                <label for="status_category">Status</label>
                <select class="form-control" id="status_category" name="status_category">
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
            <form action="<?= base_url(); ?>Elements/addBrand/" method="post">

              <div class="form-group">
                <label for="name_brand">Brand Name</label>
                <input type="text" class="form-control" name="name_brand" id="name_brand" placeholder="Enter name ..." required>
              </div>
              <div class="form-group">
                <label for="status_brand">Status</label>
                <select class="form-control" id="status_brand" name="status_brand">
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

          <form role="form" action="<?php echo base_url('Elements/editCategory') ?>" method="post" id="updateForm">

            <div class="modal-body">
              <div id="messages"></div>

              <input type="hidden" class="form-control" id="category_id" name="category_id">
              <div class="form-group">
                <label for="category">Category Name</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter inventory name" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="status_category">Status</label>
                <select class="form-control" id="status_category" name="status_category">
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

          <form role="form" action="<?php echo base_url('Elements/editBrand') ?>" method="post" id="updateForm">

            <div class="modal-body">
              <div id="messages"></div>

              <input type="hidden" class="form-control" id="merk_id" name="merk_id">
              <div class="form-group">
                <label for="edit_brand_name">Brand Name</label>
                <input type="text" class="form-control" id="merk" name="merk" placeholder="Enter inventory name" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="status_brand">Status</label>
                <select class="form-control" id="status_brand" name="status_brand">
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
    <!-- <div class="modal fade" tabindex="-1" aria-labelledby="delBrandLabel" role="dialog" id="delBrand">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Remove Brand</h5>
            <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
          </div>

          <form role="form" action="<?php echo base_url('Elements/removeBrand') ?>" method="post" id="removeForm">
            <div class="modal-body">
              <input type="hidden" name="merk_id" id="merk_id">
              <p>Do you really want to remove this brand?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form> -->


    <!-- </div>/.modal-content -->
    <!-- </div>/.modal-dialog -->
    <!-- </div>/.modal -->

    <!-- Detele Category -->
    <!-- <div class="modal fade" tabindex="-1" aria-labelledby="delCategoryLabel" role="dialog" id="delCategory">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Remove Category</h5>
            <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
          </div>

          <form role="form" action="<?php echo base_url('Elements/removeCategory') ?>" method="post" id="removeForm">
            <div class="modal-body">
              <input type="hidden" name="category_id" id="category_id">
              <p>Do you really want to remove this category?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form> -->


    <!-- </div>/.modal-content -->
    <!-- </div>/.modal-dialog -->
    <!-- </div>/.modal -->


    <script>
      // untuk menampilkan data pada form edit
      $(document).on("click", "#editBrandbutton", function() {
        let merk_id = $(this).data('id');
        let merk = $(this).data('merk');
        let brandstatus = $(this).data('brandstatus');

        $(".modal-body #merk_id").val(merk_id);
        $(".modal-body #merk").val(merk);
        $(".modal-body #status_brand").val(brandstatus);
      });

      $(document).on("click", "#editCategorybutton", function() {
        let category_id = $(this).data('id');
        let category = $(this).data('category');
        let catstatus = $(this).data('catstatus');

        $(".modal-body #category_id").val(category_id);
        $(".modal-body #category").val(category);
        $(".modal-body #status_category").val(catstatus);
      });

      // $(document).on("click", "#delBrandbutton", function() {
      //   let merk_id = $(this).data('id');
      //   $(".modal-body #merk_id").val(merk_id);
      // });

      // $(document).on("click", "#delCategorybutton", function() {
      //   let category_id = $(this).data('id');
      //   $(".modal-body #category_id").val(category_id);
      // });
    </script>