<!-- End Navbar -->
<div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('asset/bootstrap/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?php echo base_url();?>asset/bootstrap/img/bruce-mars.jpg" alt="..." class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                Alec Thompson
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                CEO / Co-Founder
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
    </div>

    
<!-- Konten Profile Information -->
<!-- Konten edit profile -->
<div class="tab-content " id="pills-tabContent">
    <div id="edit-profile" class="tab-pane fade in active">
    <!-- .... -->
   
    <div class="container-fluid py-4">
      <div class="col-12 col-xl-6 ">
          <form action="" method="post">
              <div class="card">
              <div class="card-header pb-0 p-3">
              <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Edit Profile</h6>
                </div>
              <div class="form-group">
                <label for="picture">Upload picture</label>
                <input type="file" class="form-control" name="gambar" id="gambar" name="foto[]" required/>
              </div>
              <div class="form-group ">
                <label for="name">Description</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama ..." required>
              </div>

              <div class="form-group">
                <label for="name">Full Name</label>
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
                <label for="location">Location</label>
                <input type="location" class="form-control" name="location" id="email" placeholder="Masukkan lokasi ..." required>
              </div>
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
                <label for="uname">Username</label>
                <input type="text" class="form-control" name="uname" id="uname" placeholder="Masukkan username ..." required>
              </div>

              <div class="form-group">
                <label for="pass">Password</label>
                <input type="pass" class="form-control" name="pass" id="email" placeholder="Masukkan password ..." required>
              </div>

              <div class="form-group">
                <label for="new">New Password</label>
                <input type="new" class="form-control" name="new" id="email" placeholder="Masukkan password baru ..." required>
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