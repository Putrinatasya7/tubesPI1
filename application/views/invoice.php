
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-secondary text-s">No</th>
                       <th class="align-middle text-center text-secondary text-s ps-2">Created Date</th>
                       <th class="align-middle text-center text-secondary text-s ps-2">Total</th>
                      <th class="align-middle text-center text-secondary text-s">Status</th>
                      <th class="align-middle text-center text-secondary text-s" colspan="2">Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- baru ditambah -->
                    <tr>
                      <td class="text-xs font-weight-bold"><h7 class="mx-3 mb-0 text-sm ">111</h7></td>
                      <td class="align-middle text-center text-xs font-weight-bold">1-juni-2021</td>
                      <td class="align-middle text-center text-xs font-weight-bold">Rp 5.000.000</td>
                      <td class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-success">Active</span>
                      
                      <td class="align-middle text-center"><a href="<?php echo base_url('Invoice/detailInv') ?>" class="badge badge-sm btn bg-gradient-info"><i class="fa fa-search top-0" title="Detail"></i></a>
                      <td class="align-middle text-center" ><button class="badge bagde-sm btn bg-gradient-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash top-0" title="Detail"></i></button>
                      <!-- <td><a href="<?= base_url(); ?>admin/update/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-info">Edit</span></a></td>
                      <td><a href="<?= base_url(); ?>admin/delete/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-danger" onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Delete</span></a></td> -->
                   
                </td>
            </td>
        </td>
    </tr>
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
              <div class="modal-dialog"  role="document">
                <div class="modal-content">
  
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Invoice</h5>
                <button type="button" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
  
            <div class="modal-body">
                <form action="<?= base_url(); ?>admin/insert" method="post">
  
            <div class="form-group">
              <label for="name">No invoice</label>
              <input type="text" class="form-control" name="id" id="id" placeholder="Enter no ..." required>
            </div>
  
            
            <div class="form-group">
              <label for="email">Created name</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email ..." required>
            </div>
            <div class="form-group">
              <label for="email">Created date</label>
              <input type="email" class="form-control" name="date" id="email" placeholder="Enter date ..." required>
            </div>
            
            <div class="form-group">
              <label for="active">Status</label>
              <select class="form-control" id="active" name="active">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
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
          <h5 class="modal-title">Edit Invoice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
  
        <form role="form" action="<?php echo base_url('Controller_Warehouse/update') ?>" method="post" id="updateForm">
  
          <div class="modal-body">
            <div id="messages"></div>
  
            <div class="form-group">
              <label for="name">No invoice</label>
              <input type="text" class="form-control" name="id" id="id" placeholder="Enter no ..." required>
            </div>
  
            
            <div class="form-group">
              <label for="email">Created name</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email ..." required>
            </div>
            <div class="form-group">
              <label for="email">Created date</label>
              <input type="email" class="form-control" name="date" id="email" placeholder="Enter date ..." required>
            </div>

            <div class="form-group">
              <label for="edit_active">Status</label>
              <select class="form-control" id="edit_active" name="edit_active">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
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
          <h5 class="modal-title">Remove Invoice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
  
        <form role="form" action="<?php echo base_url('Controller_Warehouse/remove') ?>" method="post" id="removeForm">
          <div class="modal-body">
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

  