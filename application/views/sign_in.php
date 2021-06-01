<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('asset/bootstrap/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo base_url('asset/bootstrap/img/favicon.png') ?>">
  <title>
    Inventory System
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?php echo base_url('asset/bootstrap/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('asset/bootstrap/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo base_url('asset/bootstrap/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo base_url('asset/bootstrap/css/soft-ui-dashboard.css?v=1.0.2') ?>" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-white">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <section>
    <div class="page-header section-height-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                <p class="mb-0">Enter your username and password to sign in</p>
              </div>
              <div class="card-body">

                <?php if ($this->session->flashdata('message_wrong')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-text text-white text-sm"><?= $this->session->flashdata('message_wrong'); ?></span>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php $this->session->unset_userdata('message_wrong'); ?>
                <?php endif; ?>

                <form role="form text-left" action="" method="POST">
                  <label>Username</label>
                  <div class="mb-3">
                    <input type="text" name="uname" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="uname-addon" value="<?= set_value("uname") ?>">
                    <?= form_error('uname', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-10">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('asset/bootstrap/img/curved-images/curved6.jpg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--   Core JS Files   -->
  <script src="<?= base_url(); ?>/asset/bootstrap/js/core/popper.min.js"></script>
  <script src="<?= base_url(); ?>/asset/bootstrap/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>/asset/bootstrap/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="<?= base_url(); ?>/asset/bootstrap/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
</body>

</html>
