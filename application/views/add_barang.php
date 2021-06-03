<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Barang</button>
          <?php endif; ?>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="px-4">
            <!-- alert -->
            <?php if ($this->session->flashdata('message')) : ?>
              <div class="alert alert-success col-md-auto alert-dismissible fade show text-white mt-4" role="alert">
                <span class="alert-icon"><i class="fas fa-smile"></i></span>
                <span class="alert-text"><strong>Success!</strong> <?= $this->session->flashdata('message'); ?>!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php elseif ($this->session->flashdata('message_wrong')) : ?>
              <div class="alert alert-danger col-md-auto alert-dismissible fade show text-white mt-4" role="alert">
                <span class="alert-icon"><i class="fas fa-frown"></i></span>
                <span class="alert-text"><strong>Sorry!</strong> <?= $this->session->flashdata('message_wrong'); ?>!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <?php $this->session->unset_userdata('message'); ?>
            <!-- alert -->
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-secondary text-s">Nama Barang</th>
                  <th class="align-middle text-center text-secondary text-s ps-2">Kode Barang</th>
                  <th class="align-middle text-center text-secondary text-s">Jumlah Barang</th>
                  <th class="align-middle text-center text-secondary text-s">Kategori</th>
                  <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
                    <th class="align-middle text-center text-secondary text-s" colspan="3">Action</th>
                  <?php else : ?>
                    <th class="align-middle text-center text-secondary text-s">Action</th>
                  <?php endif; ?>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($barang as $b) : ?>
                  <tr>
                    <td class="text-xs font-weight-bold">
                      <h7 class="mx-3 mb-0 text-sm "><?= $b['barang']; ?></h7>
                    </td>
                    <td class="align-middle text-center text-xs font-weight-bold"><?= $b['barang_id']; ?></td>
                    <td class="align-middle text-center text-sm"><?= $b['stock']; ?></span></td>
                    <td class="align-middle text-center text-sm"><?= $b['category']; ?></span></td>

                    <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
                      <td class="align-middle text-center"><button class="badge badge-sm btn bg-gradient-warning" id="editBarangBtn" data-toggle="modal" data-target="#editModal" data-id="<?= $b['barang_id']; ?>" data-edit_item_name="<?= $b['barang']; ?>" data-edit_brand="<?= $b['merk_id']; ?>" data-edit_category="<?= $b['category_id']; ?>" data-edit_total="<?= $b['stock']; ?>" data-edit_price="<?= $b['harga']; ?>"><i class="fa fa-pen top-0" title="Edit"></i></button></td>
                    <?php endif; ?>

                    <td class="align-middle text-center"><button class="badge badge-sm btn bg-gradient-info" data-toggle="modal" data-target="#detailBarang<?= $b['barang_id']; ?>"><i class="fa fa-search top-0" title="Detail"></i></button></td>

                    <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
                      <td class="align-middle text-center"><button class="badge bagde-sm btn bg-gradient-danger" id="removeBarangBtn" data-toggle="modal" data-target="#deleteModal" data-id="<?= $b['barang_id']; ?>"><i class="fa fa-trash top-0" title="Delete"></i></button></td>
                    <?php endif; ?>
                    <td></td>
                  </tr>


                  <!-- Items Detail -->
                  <div class="modal fade" tabindex="-1" aria-labelledby="detailBarangLabel" role="dialog" id="detailBarang<?= $b['barang_id']; ?>">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Items Detail</h5>
                          <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
                        </div>

                        <div class="modal-body">
                          <div class="col-md-12">
                            <div class="row p-4">
                              <div class="col-md-4">
                                <img src="<?php echo base_url(); ?>asset/pict/barang/<?= $b['pict']; ?>" alt="..." class="w-100 position-relative z-index-2 border-radius-lg shadow-sm">
                              </div>
                              <div class="col-md-8">
                                <h6 class="font-weight-bolder"><?= $b['barang_id']; ?></h6>
                                <h5 class="font-weight-bolder text-info text-gradient"><?= $b['barang']; ?></h5>
                                <h6><?= $b['merk']; ?> <span class="font-weight-normal">| <?= $b['category']; ?></span></h6>
                                <h6>Rp <?= $b['harga']; ?></h6>
                                <h6 class="font-weight-normal">Stock : <?= $b['stock']; ?></h6>
                                <img src="<?php echo base_url(); ?>asset\pict\qrcode\qrcode_contoh.png" alt="..." class="w-15 position-relative z-index-2 border-radius-lg shadow-sm">
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                  <div class="row mt-5">
                                    <div class="col-md-6">
                                      <h6>Date Created</h6>
                                      <h6 class="font-weight-normal">Selasa, 2 Juni 2021</h6>
                                    </div>
                                    <div class="col-md-6">
                                      <h6>Date Modified</h6>
                                      <h6 class="font-weight-normal">Selasa, 2 Juni 2021</h6>
                                    </div>
                                  </div> <!-- /row mt-5-->
                                <?php endif; ?>
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>

                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                  <?php endforeach; ?>
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
          <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
          <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
        </div>

        <div class="modal-body">
          <?= form_open_multipart('Barang/addBarang'); ?>

          <div class="form-group input-group-sm">
            <label for="barang_id">Item Code</label>
            <input type="text" name="barang_id" class="form-control" value="<?= generateKodeBarang(); ?>" readonly>
          </div>

          <div class="form-group input-group-sm">
            <label for="name">Item names</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name ..." required>
          </div>

          <div class="form-group input-group-sm">
            <label for="total">Stock</label>
            <input type="number" min="0" class="form-control" name="total" id="total" placeholder="Enter jumlah ..." required autocomplete="off">
          </div>
          <div class="form-group input-group-sm">
            <label for="caregory">Category</label>
            <select class="form-control" id="category" name="category">
              <?php foreach ($category as $c) : ?>
                <option value="<?= $c['category_id']; ?>"><?= $c['category']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group input-group-sm">
            <label for="brand">Brand</label>
            <select class="form-control" id="brand" name="brand">
              <?php foreach ($merk as $m) : ?>
                <option value="<?= $m['merk_id']; ?>"><?= $m['merk']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group input-group-sm">
            <label for="price">Price</label>
            <input type="number" min="0" class="form-control" name="price" id="price" placeholder="Enter kategori ..." required>
          </div>
          <div class="form-group">
            <label for="picture">Upload picture</label>
            <input type="file" class="form-control" name="picture" id="picture" required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-round bg-gradient-primary">Submit</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Items Detail</h5>
          <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
        </div>

        <?php echo form_open_multipart('Barang/editBarang', 'id = "updateForm"'); ?>

        <div class="modal-body">
          <div id="messages"></div>

          <div class="form-group input-group-sm">
            <label for="code">Item code</label>
            <input type="text" class="form-control" name="barang_id" id="barang_id" readonly>
          </div>
          <div class="form-group input-group-sm">
            <label for="edit_item_name">Item names</label>
            <input type="text" class="form-control" id="edit_item_name" name="edit_item_name" placeholder="Enter nama barang" autocomplete="off">
          </div>
          <div class="form-group input-group-sm">
            <label for="edit_total">Stock</label>
            <input type="number" min="0" class="form-control" name="edit_total" id="edit_total" placeholder="Enter jumlah ..." required>
          </div>
          <div class="form-group input-group-sm">
            <label for="edit_category">Category</label>
            <select class="form-control" id="edit_category" name="edit_category">
              <?php foreach ($category as $c) : ?>
                <option value="<?= $c['category_id']; ?>"><?= $c['category']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group input-group-sm">
            <label for="edit_brand">Brand</label>
            <select class="form-control" id="edit_brand" name="edit_brand">
              <?php foreach ($merk as $m) : ?>
                <option value="<?= $m['merk_id']; ?>"><?= $m['merk']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group input-group-sm">
            <label for="edit_price">Price</label>
            <input type="number" min="0" class="form-control" id="edit_price" name="edit_price" placeholder="Enter nama barang" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_picture">Edit Picture</label>
            <input type="file" class="form-control" name="edit_picture" id="edit_picture" />
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-round bg-gradient-primary">Save Changes</button>
        </div>

        <?php echo form_close(); ?>

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

        <form role="form" action="<?php echo base_url('Barang/removeBarang'); ?>" method="post" id="removeForm">
          <div class="modal-body">
            <input type="hidden" name="barang_id" id="barang_id">
            <p>Do you really want to remove this item?</p>
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
    $(document).on("click", "#editBarangBtn", function() {
      let barang_id = $(this).data('id');
      let edit_item_name = $(this).data('edit_item_name');
      let edit_brand = $(this).data('edit_brand');
      let edit_category = $(this).data('edit_category');
      let edit_price = $(this).data('edit_price');
      let edit_total = $(this).data('edit_total');

      $(".modal-body #barang_id").val(barang_id);
      $(".modal-body #edit_item_name").val(edit_item_name);
      $(".modal-body #edit_brand").val(edit_brand);
      $(".modal-body #edit_category").val(edit_category);
      $(".modal-body #edit_price").val(edit_price);
      $(".modal-body #edit_total").val(edit_total);
    });

    $(document).on("click", "#removeBarangBtn", function() {
      let barang_id = $(this).data('id');
      $(".modal-body #barang_id").val(barang_id);
    });
  </script>