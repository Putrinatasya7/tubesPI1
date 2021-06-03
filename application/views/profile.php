<!-- End Navbar -->
<div class="container-fluid">
  <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('asset/bootstrap/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>
  </div>
  <div class="card card-body blur shadow-blur mx-4 mt-n6">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="<?php echo base_url('asset/pict/user/' . $user['pict']); ?>" alt="..." class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            <?= ucfirst($user['name']); ?>
          </h5>
          <p class="mb-1 font-weight-bold text-sm">
            <?= ($user['uname']); ?> / <?= $user['role']; ?>
          </p>
          <p class="mb-0 font-weight-bold text-sm">
            <?= ($user['email']); ?>
          </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
        <div class="nav-wrapper position-relative end-0">
          <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
            <li class="nav-item active">
              <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit_profile" aria-selected="true">
                Edit Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change_password" aria-selected="false">
                Change Password
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
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



<!-- Konten Profile Information -->
<!-- Konten edit profile -->
<div class="tab-content " id="pills-tabContent">
  <div id="edit-profile" class="tab-pane fade in active">
    <!-- .... -->

    <div class="container-fluid py-4">
      <div class="col-12 col-xl-6 ">
        <?php echo form_open_multipart(); ?>
        <div class="card">
          <div class="card-header pb-0 p-3">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Edit Profile</h6>
            </div>

            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama ..." value="<?= $user['name']; ?>" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email ..." value="<?= $user['email']; ?>" required>
            </div>

            <div class="form-group">
              <label for="picture">Upload picture</label>
              <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="picture" id="picture" />
            </div>

          </div>
          <div class="card-footer pb-0 p-3">
            <input type="submit" name="editProfile" class="btn btn-round bg-gradient-primary" value="Save Change">
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <!-- ..... -->
  </div>

  <!-- Konten change password -->
  <div id="change-password" class="tab-pane fade">
    <!-- ..... -->

    <div class="container-fluid py-4">
      <div class="col-12 col-xl-6 ">
        <form action="" method="post">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Change Password</h6>
              </div>
              <div class="form-group">
                <label for="curr_pass">Current Password</label>
                <input type="password" class="form-control" name="curr_pass" id="curr_pass" placeholder="Enter current password ..." required minlength="8">
              </div>

              <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password ..." required>
              </div>

              <div class="form-group">
                <label for="confirm_pass">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="Confirm password ..." required>
              </div>
              <div class="card-footer pb-0 p-3">
                <button type="submit" class="btn btn-round bg-gradient-primary">Save Change</button>
              </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ..... -->
</div>
</div>
<!-- .... -->
</div>

</main>