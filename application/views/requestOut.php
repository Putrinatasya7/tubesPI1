<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <a href=" <?php echo base_url('Request/addReqOut') ?>" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Request</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="align-middle text-center text-secondary text-s ps-2">No.Request</th>
                      <th class="align-middle text-center text-secondary text-s ps-2">Nama</th>
                      <th class="align-middle text-center text-secondary text-s ps-2">Tanggal Request</th>
                      <th class="align-middle text-center text-secondary text-s">Status</th>
                      <th class="align-middle text-center text-secondary text-s" colspan="3">Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td class="align-middle text-center text-xs font-weight-bold">001</td>
                      <td class="align-middle text-center text-xs font-weight-bold">lala</td>
                      <td class="align-middle text-center text-xs font-weight-bold">1 juli 2020</td>
                      <td class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-success">In</span></td>
                      <td class="align-middle text-center"><button class="badge badge-sm btn bg-gradient-warning" data-toggle="modal" data-target="#editModal"><i class="fa fa-pen top-0" title="Edit"></i></button></td>
                      <td class="align-middle text-center"><button class="badge badge-sm btn bg-gradient-info" data-toggle="modal" data-target="#detailRequest"><i class="fa fa-search top-0" title="Detail"></i></button></td>
                      <td class="align-middle text-center" ><button class="badge bagde-sm btn bg-gradient-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash top-0" title="Delete"></i></button></td>
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

  <!-- Detail Modal -->
  <div class="modal fade" tabindex="-1" aria-labelledby="detailrequest" role="dialog" id="detailRequest">
    <div class="modal-dialog modal-xl"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Request Detail</h5>
          <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
        </div>
  
        <form role="form" action="<?php echo base_url('Request/addReqIn') ?>" method="post" id="updateForm">
  
          <div class="modal-body">
          <div class="col-md-12">
          <div class="row">
          <div class="col-md-2">
  
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Delete Modal -->
  <div class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Remove Request</h5>
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


 
        

  
