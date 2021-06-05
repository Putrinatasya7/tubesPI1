<!-- HEADER -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('asset/bootstrap/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo base_url('asset/bootstrap/img/icon.png') ?>">
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
  <!-- for Modal -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

  <script type="text/javascript" src="<?php echo base_url();?>assets/js/signature-pad.js"></script> 

</head>

<!-- Sidebar -->

<body class="g-sidenav-show   bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <!-- <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i> -->
      <a class="navbar-brand m-0" href="<?php echo base_url('Auth') ?>">
        <img src="<?php echo base_url(); ?>asset/bootstrap/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-1 font-weight-bold">Inventory System</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">

    <!-- dari sini adalah pengambilan menunya dari database -->
    <!-- QUERY MENU -->
    <?php
    $menu = $this->db->like('role_access',$this->session->userdata('role_id'))->get('menu')->result_array();
    ?>

    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <!-- ini permulaan tampilan permulaan menu yang di loop sesuai banyak menu yang ada -->
        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>
          <li class="nav-item">
            <?php if($m['collapse'] == 'y'): ?>     <!--collapse ini untuk mengecek dropdown menu karena pada menu kami ada dropdownnya kalau menu kalian gak ada dropdown ini gak usah dibuat lewatkan aja langsung cek ke baris 87 else untuk menu yang bukan dropdown-->
              <?php if($m['menu'] == $title): ?>    <!-- ini kondisi untuk ngecek apakah sebuah menu itu sedang aktif atau tidak -->
                <a class="nav-link active" data-bs-toggle="collapse" href="<?= $m['url']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">    <!--kalau aktif maka dia dikasih class active kayak gini-->
                  <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center me-2 border-radius-md">
                    <!-- <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> -->
                    <i class="<?= $m['icon']; ?>"></i>
                  </div>
              
              <?php else: ?>
                <a class="nav-link " data-bs-toggle="collapse" href="<?= $m['url']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">    <!-- dan ini kalau menunya gak aktif-->
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="<?= $m['icon']; ?> text-dark"></i>
                  </div>
              <?php endif; ?>   <!--akhir dari pengecekan menu dropdown yang aktif dan tidak aktif-->

                <span class="nav-link-text ms-1"><?= $m['menu']; ?></span>
              </a>
              <!-- ini query untuk ngambil submenu dari menu dropdown yang ada -->
              <?php
                $menuid = $m['menuid'];
                $submenu = $this->db->get_where('sub_menu',['menuid'=>$menuid])->result_array();
              ?>
              <div class="collapse" id="collapseExample">   <!-- ini buat nampilin menunya -->
                <!-- <div class="col-xl-6 col-sm-6 mb-xl-5 mb-0"> -->
                <div class="card-body">
                  <?php foreach($submenu as $sm): ?>
                    <a class="btn btn-default btn-sm" href="<?php echo base_url().$sm['url'] ?>"><?= $sm['submenu']; ?></a>
                  <?php endforeach; ?>
                </div>
                <!-- </div> -->
              </div>
            
            <?php else: ?>    <!-- ini else untuk menu yang bukan dropdown jadi dia menu biasa aja gitu gak ada anaknya -->
              <?php if ($m['menu'] == $title) : ?>    <!-- ini kondisi untuk ngecek apakah sebuah menu itu sedang aktif atau tidak -->
                <a class="nav-link active" href="<?php echo base_url().$m['url']; ?>">    <!--kalau aktif maka dia dikasih class active kayak gini-->
                  <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center me-2 border-radius-md">
                    <!-- <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> -->
                    <i class="<?= $m['icon']; ?>"></i>
                  </div>

              <?php else : ?>
                <a class="nav-link  " href="<?php echo base_url().$m['url']; ?>">   <!-- dan ini kalau menunya gak aktif-->
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center text-dark">
                    <i class="<?= $m['icon']; ?> text-dark"></i>
                  </div>
              <?php endif; ?>   <!-- akhir dari pengecekan apakah sebuah menu sedang aktif atau tidak -->
                  <span class="nav-link-text ms-1"><?= $m['menu']; ?></span>
                </a>
            <?php endif; ?>     <!-- akhir dari pengecekan dropdown menu -->
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </aside>
  <!-- END SIDEBAR -->

  <!-- CONTENT -->
  <main class="main-content mt-1 border-radius-lg">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $title; ?></li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><?= $subtitle; ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <!-- <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div> -->
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user cursor-pointer"></i>&nbsp;&nbsp;<span class="d-sm-inline d-none"><?= $this->session->userdata('name'); ?></span>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?php echo base_url('Profile') ?>">
                    <div class="d-flex py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1"><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</h6>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item border-radius-md" href="<?php echo base_url('Signin/logout') ?>">
                    <div class="d-flex py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</h6>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->