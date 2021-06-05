  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add User</button>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-secondary text-s">Username</th>
                    <th class="align-middle text-center text-secondary text-s ps-2">Email</th>
                    <th class="align-middle text-center text-secondary text-s">Nama</th>
                    <th class="align-middle text-center text-secondary text-s">Role</th>
                    <th class="align-middle text-center text-secondary text-s" colspan="2">Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- perubahan baru untuk menampilkan user dari db -->
                  <?php foreach ($users as $user) : ?>
                    <tr>
                      <td class="text-sm">
                        <h7 class="mx-3 mb-0"><?= $user['uname']; ?></h7>
                      </td>
                      <td class="align-middle text-center text-sm"><?= $user['email']; ?></td>
                      <td class="align-middle text-center text-sm"><?= $user['name']; ?></td>
                      <td class="align-middle text-center text-sm"><?= $user['role']; ?></td>

                      <td class="align-middle text-center"><button class="badge badge-sm btn bg-gradient-info" data-toggle="modal" data-target="#editModal" id="editbutton" data-uid="<?= $user['uid']; ?>" data-uname="<?= $user['uname']; ?>" data-email="<?= $user['email']; ?>" data-name="<?= $user['name']; ?>" data-password="<?= $user['password']; ?>" data-roleid="<?= $user['role_id']; ?>"><i class="fa fa-pen top-0" title="Edit"></i></button>
                        <button class="badge bagde-sm btn bg-gradient-warning" data-toggle="modal" data-target="#editPasswordModal" id="editPassword" data-uid="<?= $user['uid']; ?>"><i class="fa fa-lock top-0" title="Change Password"></i></button>
                        <button class="badge bagde-sm btn bg-gradient-danger" data-toggle="modal" data-target="#deleteModal" id="deletebutton" data-uid="<?= $user['uid']; ?>"><i class="fa fa-trash top-0" title="Delete"></i></button>
                      </td>
                      <td></td>
                      <!-- <td><a href="<?= base_url(); ?>admin/update/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-info">Edit</span></a></td>
                      <td><a href="<?= base_url(); ?>admin/delete/<?= $object->id; ?>"><span class="badge badge-sm bg-gradient-danger" onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Delete</span></a></td> -->
                    </tr>
                  <?php endforeach; ?>
                  <!-- perubahan baru untuk menampilkan user dari db -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          </div>

          <div class="modal-body">
            <form action="<?= base_url(); ?>User/addUser" method="post">

              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                  <option value="">Pilih Role</option>
                  <?php foreach ($role as $r) : ?>
                    <option value="<?= $r['role_id']; ?>"><?= $r['role']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama ..." required>
              </div>

              <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" class="form-control" name="uname" id="uname" placeholder="Masukkan username ..." required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email ..." required>
              </div>

              <div class="form-group">
                <label for="email">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password ..." required>
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

          <form role="form" action="<?php echo base_url() ?>User/editUser" method="post" id="updateForm">

            <div class="modal-body">
              <div id="messages"></div>

              <input type="hidden" class="form-control" id="uid" name="uid">
              <div class="form-group">
                <label for="role_id">Role</label>
                <select class="form-control" id="role_id" name="role_id">
                  <option value="">Pilih Role</option>
                  <?php foreach ($role as $r) : ?>
                    <option value="<?= $r['role_id']; ?>"><?= $r['role']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>

              <div class="form-group">
                <label for="uname">username</label>
                <input type="text" class="form-control" name="uname" id="uname" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
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

    <!-- Change Password Modal -->
    <div class="modal fade" tabindex="-1" aria-labelledby="editPasswordLabel" role="dialog" id="editPasswordModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Change User Password</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
          </div>

          <form role="form" action="<?php echo base_url() ?>User/editPassword" method="post" id="removeForm">
            <div class="modal-body">
              <input type="hidden" id="uid" name="uid">

              <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" name="new_password" id="new_password" required>
              </div>

              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
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
            <h5 class="modal-title">Hapus User</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
          </div>

          <form role="form" action="<?php echo base_url() ?>User/removeUser" method="post" id="removeForm">
            <div class="modal-body">
              <input type="hidden" id="uid" name="uid">
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
        let uid = $(this).data('uid');
        let name = $(this).data('name');
        let uname = $(this).data('uname');
        let email = $(this).data('email');
        let password = $(this).data('password');
        let role_id = $(this).data('roleid');

        $(".modal-body #uid").val(uid);
        $(".modal-body #name").val(name);
        $(".modal-body #uname").val(uname);
        $(".modal-body #email").val(email);
        $(".modal-body #password").val(password);
        $(".modal-body #role_id").val(role_id);

      });

      $(document).on("click", "#deletebutton", function() {
        let uid = $(this).data('uid');
        $(".modal-body #uid").val(uid);
      });

      $(document).on("click", "#editPassword", function() {
        let uid = $(this).data('uid');
        $(".modal-body #uid").val(uid);
      });
    </script>