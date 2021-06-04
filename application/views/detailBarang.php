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

</head>
<div class="container">
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h5>Detail Barang</h5>
    </div>
        <div class="card-body px-0 pt-0 pb-2">
        <div class="col-md-12">
        <div class="row p-4">
            <div class="col-md-4">
            <img src="<?php echo base_url(); ?>asset/pict/barang/<?= $barang['pict']; ?>" alt="..." class="w-100 position-relative z-index-2 border-radius-lg shadow-sm">
            </div>
            <div class="col-md-8">
            <h6 class="font-weight-bolder"><?= $barang['barang_id']; ?></h6>
            <h5 class="font-weight-bolder text-info text-gradient"><?= $barang['barang']; ?></h5>
            <h6><?= $barang['merk']; ?> <span class="font-weight-normal">| <?= $barang['category']; ?></span></h6>
            <h6>Rp <?= $barang['harga']; ?></h6>
            <h6 class="font-weight-normal">Stock : <?= $barang['stock']; ?></h6>
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
            </div>
        </div>
        </div>
            
        </div>
      </div>
    </div>
  </div>
    </div>


    </main>