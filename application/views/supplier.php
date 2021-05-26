<main class="main-content mt-1 border-radius-lg">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Supplier</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Manage Supplier</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here...">
          </div>
        </div>
        </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Supplier</button>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-secondary text-s">Supplier Name</th>
                    <th class="align-middle text-center text-secondary text-s ps-2">Contact</th>
                    <th class="align-middle text-center text-secondary text-s">Status</th>
                    <th class="align-middle text-center text-secondary text-s" colspan="2">Action</th>
                    <th></th>
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
                      <td class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-success"><?= $s['status']; ?></span></td>

                      <td class="align-middle text-center"><button class="badge badge-sm btn bg-gradient-info" data-toggle="modal" data-target="#editModal" id="editbutton" data-id="<?= $s['supplier_id']; ?>" data-supplier="<?= $s['supplier']; ?>" data-contact="<?= $s['contact']; ?>" data-status="<?= $s['status']; ?>">Edit</button></td>
                      <td class="align-middle text-center"><button class="badge bagde-sm btn bg-gradient-danger" data-toggle="modal" data-target="#deleteModal" id="deletebutton" data-id="<?= $s['supplier_id']; ?>">Delete</button></td>
                      <td></td>
                      <!-- <td><a href="<?= base_url(); ?>admin/update/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-info">Edit</span></a></td>
                      <td><a href="<?= base_url(); ?>admin/delete/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-danger" onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Delete</span></a></td> -->
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

</main>

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