<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Supplier</button>
            <?php endif; ?>
            <!-- alert -->
            <?php if ($this->session->flashdata('message')) : ?>
              <div class="alert alert-success col-md-6 alert-dismissible fade show text-white" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Success!</strong> <?= $this->session->flashdata('message'); ?>!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <?php $this->session->unset_userdata('message'); ?>
            <!-- alert -->
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-secondary text-s">Supplier Name</th>
                    <th class="align-middle text-center text-secondary text-s ps-2">Contact</th>
                    <th class="align-middle text-center text-secondary text-s">Status</th>
                    <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
                      <th class="align-middle text-center text-secondary text-s" colspan="2">Action</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                  <!-- baru ditambah -->
                  <?php foreach ($supplier as $s) : ?>
                    <tr>
                      <td class="text-xs font-weight-bold">
                        <h7 class="mx-3 mb-0 text-sm "><?= $s['supplier']; ?></h7>
                      </td>
                      <td class="align-middle text-center text-xs font-weight-bold"><?= $s['contact']; ?></td>
                      <td class="align-middle text-center text-sm">
                        <?php if ($s['status'] == 'Active'):  ?>
                        <span class="badge badge-sm bg-gradient-success"><?= $s['status']; ?></span>
                        <?php else : ?>
                          <span class="badge badge-sm bg-gradient-secondary"><?= $s['status']; ?></span>
                        <?php endif; ?>
                      </td>
                      <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
                        <td class="align-middle text-center"><button class="badge badge-sm btn bg-gradient-info" data-toggle="modal" data-target="#editModal" id="editbutton" data-id="<?= $s['supplier_id']; ?>" data-supplier="<?= $s['supplier']; ?>" data-contact="<?= $s['contact']; ?>" data-status="<?= $s['status']; ?>">Edit</button></td>
                        <td class="align-middle text-center"><button class="badge bagde-sm btn bg-gradient-danger" data-toggle="modal" data-target="#deleteModal" id="deletebutton" data-id="<?= $s['supplier_id']; ?>">Delete</button></td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
                  <!-- baru ditambah -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <!-- Add Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
          </div>

          <div class="modal-body">
            <form action="<?= base_url(); ?>Supplier/addSupplier/" method="post">

              <div class="form-group">
                <label for="name">Supplier Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name ..." required>
              </div>

              <div class="form-group">
                <label for="email">Contact</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email ..." required>
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

    <!-- Edit Modal -->
    <div class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Supplier</h5>
          </div>

          <form role="form" action="<?php echo base_url('Supplier/editSupplier') ?>" method="post" id="updateForm">

            <div class="modal-body">
              <div id="messages"></div>

              <input type="hidden" class="form-control" id="supplier_id" name="supplier_id">
              <div class="form-group">
                <label for="edit_brand_name">Supplier Name</label>
                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Enter inventory name" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="email">Contact</label>
                <input type="email" class="form-control" name="contact" id="contact" placeholder="Enter email ..." required>
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

    <!-- Detele Modal -->
    <div class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" role="dialog" id="deleteModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Remove Supplier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>

          <form role="form" action="<?php echo base_url('Supplier/remove') ?>" method="post" id="removeForm">
            <div class="modal-body">
              <input type="hidden" name="supplier_id" id="supplier_id">
              <p>Do you really want to remove?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>


        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script>
      // untuk menampilkan data pada form edit
      $(document).on("click", "#editbutton", function() {
        let supplier_id = $(this).data('id');
        let supplier = $(this).data('supplier');
        let contact = $(this).data('contact');
        let status = $(this).data('status');

        $(".modal-body #supplier_id").val(supplier_id);
        $(".modal-body #supplier").val(supplier);
        $(".modal-body #contact").val(contact);
        $(".modal-body #status").val(status);

      });

      $(document).on("click", "#deletebutton", function() {
        let supplier_id = $(this).data('id');
        $(".modal-body #supplier_id").val(supplier_id);
      });
    </script>