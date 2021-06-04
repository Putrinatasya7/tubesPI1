<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <a href=" <?php echo base_url('Request/addReqOut') ?>" class="btn btn-success"><i class="fas fa-plus mb-1"></i>&nbsp;&nbsp;Add Request</a>
          <!-- alert -->
          <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success col-md-8 alert-dismissible fade show text-white" role="alert">
              <span class="alert-icon"><i class="ni ni-like-2"></i></span>
              <span class="alert-text"><strong>Success!</strong> <?= $this->session->flashdata('message'); ?>!</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <?php $this->session->unset_userdata('message'); ?>
          <!-- alert -->
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <?php if ($request_out == null) : ?>
            <!-- tambahkan di bagian ini pemberitahuan bahwa data request keluar masih belum ada -->
          <?php else : ?>
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="align-middle text-center text-secondary text-s ps-2">No.Request</th>
                    <th class="align-middle text-center text-secondary text-s ps-2">Nama</th>
                    <th class="align-middle text-center text-secondary text-s ps-2">Tanggal Request</th>
                    <th class="align-middle text-center text-secondary text-s">Status</th>
                    <th class="align-middle text-center text-secondary text-s w-10">Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($request_out as $ro) : ?>
                    <tr>
                      <td class="align-middle text-center text-xs font-weight-bold"><?= $ro['request_no']; ?></td>
                      <td class="align-middle text-center text-xs font-weight-bold"><?= $ro['creator_name']; ?></td>
                      <td class="align-middle text-center text-xs font-weight-bold"><?= date('l, d F Y  g:i a', strtotime($ro['created_at'])); ?></td>
                      <?php if ($ro['status'] == "Waiting") {
                        $bg = "bg-gradient-warning";
                      } elseif ($ro['status'] == "Accepted") {
                        $bg = "bg-gradient-success";
                      } else {
                        $bg = "bg-gradient-danger";
                      } ?>
                      <td class="align-middle text-center text-sm"><span class="badge badge-sm <?= $bg; ?>"><?= $ro['status']; ?></span></td>
                      <td class="align-middle text-center">
                        <?php if ($ro['status'] == "Waiting") : ?>
                          <?php if ($this->session->userdata('role_id') != 2) : ?>
                            <button class="badge badge-sm btn bg-gradient-warning" data-toggle="modal" data-target="#editModal"><i class="fa fa-pen top-0" title="Edit"></i></button>
                          <?php endif; ?>
                        <?php endif; ?>
                        <a href=" <?php echo base_url('Request/detailsOut/' . $ro['request_no']); ?>"><button class="badge badge-sm btn bg-gradient-info"> <i class="fa fa-search top-0" title="Detail"></i></button></a>
                        <?php if ($this->session->userdata('role_id') != 2) : ?>
                          <?php if ($ro['status'] == "Waiting") : ?>
                            <button class="badge badge-sm btn bg-gradient-danger" data-toggle="modal" data-target="#deleteModal" id="deletebutton" data-id="<?= $ro['request_no']; ?>"><i class="fa fa-trash top-0" title="Delete"></i></button>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                      <td></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <!-- Edit Modal -->
  <div class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Request</h5>
          <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>

        </div>

        <form role="form" action="<?php echo base_url('Controller_Warehouse/update') ?>" method="post" id="updateForm">

          <div class="modal-body">
            <div id="messages"></div>

            <div class="form-group">
              <label for="no">No.Request<No class="Request"></No></label>
              <input type="no" class="form-control" id="no" name="no" placeholder="Enter No.Request" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="text" id="email" placeholder="Enter Name ..." required>
            </div>
            <div class="form-group">
              <label for="nama">Tanggal Request</label>
              <input type="text" class="form-control" name="text" id="email" placeholder="Enter Request Date ..." required>
            </div>
            <div class="form-group">
              <label for="edit_active">Status</label>
              <select class="form-control" id="edit_active" name="edit_active">
                <option value="1">In</option>
                <option value="2">Out</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
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
          <h5 class="modal-title">Remove Item</h5>
          <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
        </div>

        <form role="form" action="<?php echo base_url('Request/removeRequestOut') ?>" method="post" id="removeForm">
          <div class="modal-body">
            <input type="hidden" name="request_no" id="request_no">
            <p>Do you really want to remove this request?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Items Detail -->
  <div class="modal fade" tabindex="-1" aria-labelledby="detailRequestLabel" role="dialog" id="detailRequest">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Request Detail</h5>
          <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
        </div>

        <form role="form" action="<?php echo base_url('Controller_Warehouse/update') ?>" method="post" id="updateForm">

          <div class="modal-body">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="edit_item_name">xx</label>
                    <input type="text" class="form-control" id="edit_item_name" name="edit_item_name" placeholder="Enter nama barang" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="code">xx</label>
                    <input type="text" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                    <label for="edit_total">xx</label>
                    <input type="text" class="form-control" name="edit_total" id="edit_total" placeholder="Enter total ..." required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category">xx</label>
                    <select class="form-control" id="active" name="active">
                      <option value="Active">xx 1</option>
                      <option value="Inactive">xx 2</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="edit_brand">xx</label>
                    <select class="form-control" id="active" name="active">
                      <option value="Active">xx 1</option>
                      <option value="Inactive">x 2</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="edit_price">xx</label>
                    <input type="text" class="form-control" id="edit_price" name="edit_price" placeholder="Harga barang" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <script>
    $(document).on("click", "#deletebutton", function() {
      let request_no = $(this).data('id');
      $(".modal-body #request_no").val(request_no);
    });
  </script>