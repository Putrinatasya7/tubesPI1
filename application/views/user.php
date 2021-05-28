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
                  <?php foreach($users as $user): ?>
                  <tr>
                    <td class="text-sm"><h7 class="mx-3 mb-0"><?= $user['uname']; ?></h7></td>
                    <td class="align-middle text-center text-sm"><?= $user['email']; ?></td>
                    <td class="align-middle text-center text-sm"><?= $user['name']; ?></td>
                    <td class="align-middle text-center text-sm"><?= $user['role']; ?></td>

                    <td class="align-middle text-center"><button class="badge badge-sm btn bg-gradient-info" data-toggle="modal" data-target="#editModal">Edit</button></td>
                    <td class="align-middle text-center"><button class="badge bagde-sm btn bg-gradient-danger" data-toggle="modal" data-target="#deleteModal">Delete</button></td>
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

          <form role="form" action="<?php echo base_url('Controller_Warehouse/update') ?>" method="post" id="updateForm">

            <div class="modal-body">
              <div id="messages"></div>

              <div class="form-group">
                <label for="active">Role</label>
                <select class="form-control" id="active" name="active">
                  <option value="1">Pilih Role</option>
                </select>
              </div>

              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>

              <div class="form-group">
                <label for="name">username</label>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>

              <div class="form-group">
                <label for="email">Password</label>
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

    <!-- Detele Modal -->
    <div class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" role="dialog" id="deleteModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Hapus User</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
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


    <footer class="footer pt-3">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
        </div>
      </div>
    </footer>
  </div>
</main>
<div class="fixed-plugin">
  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
    <i class="fa fa-cog py-2"> </i>
  </a>
  <div class="card shadow-lg ">
    <div class="card-header pb-0 pt-3 ">
      <div class="float-start">
        <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
        <p>See our dashboard options.</p>
      </div>
      <div class="float-end mt-4">
        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="card-body pt-sm-3 pt-0">
      <!-- Sidebar Backgrounds -->
      <div>
        <h6 class="mb-0">Sidebar Colors</h6>
      </div>
      <a href="javascript:void(0)" class="switch-trigger background-color">
        <div class="badge-colors my-2 text-start">
          <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
        </div>
      </a>
      <!-- Sidenav Type -->
      <div class="mt-3">
        <h6 class="mb-0">Sidenav Type</h6>
        <p class="text-sm">Choose between 2 different sidenav types.</p>
      </div>
      <div class="d-flex">
        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
        <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
      </div>
      <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
      <!-- Navbar Fixed -->
      <div class="mt-3">
        <h6 class="mb-0">Navbar Fixed</h6>
      </div>
      <div class="form-check form-switch ps-0">
        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
      </div>
      <hr class="horizontal dark my-sm-4">
      <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free download</a>
      <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
      <div class="w-100 text-center">
        <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
        <h6 class="mt-3">Thank you for sharing!</h6>
        <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
        </a>
      </div>
    </div>
  </div>
</div>


<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>asset/bootstrap/js/soft-ui-dashboard.min.js?v=1.0.2"></script>



<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/select2.min.js"></script>
<script type="text/javascript">
  $(".selection-1").select2({
    minimumResultsForSearch: 20,
    dropdownParent: $('#dropDownSelect1')
  });

  $(".selection-2").select2({
    minimumResultsForSearch: 20,
    dropdownParent: $('#dropDownSelect2')
  });
</script>
<!--===============================================================================================-->
<script src="../assets/css/main.js"></script>


</body>

</html>