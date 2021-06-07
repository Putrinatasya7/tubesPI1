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

<body>
  <main>
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
                    <h6>Rp <?= number_format($barang['harga'], 0, '.', '.'); ?></h6>
                    <h6 class="font-weight-normal">Stock : <?= $barang['stock']; ?></h6>
                    <div class="row mt-4">
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
              <?php if ($invoicein != null) : ?>
                <div class="col-md-12">
                  <div class="row p-4">
                    <div class="col-md-12">
                    </div>
                    <h6>In History</h6>
                    <div class="table-responsive px-4">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invocie No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Invoice Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Staff In Charge</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
                            <th class="text-secondary opacity-7 w-10">QR Code</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($invoicein as $ii) : ?>
                            <tr>
                              <td class="align-middle">
                                <h6 class="text-sm"><?= $ii['invoice_no']; ?></h6>
                              </td>
                              <td class="align-middle">
                                <p class="text-xs font-weight-bold mb-0"><?= $ii['invoice_date']; ?></p>
                              </td>
                              <td class="align-middle">
                                <p class="text-xs font-weight-bold mb-0"><?= $ii['staff_in_charge_name']; ?></p>
                              </td>
                              <td class="align-middle text-center text-xs">
                                <p class="text-xs"><?= $ii['qty']; ?></p>
                              </td>
                              <?php $grandtotal = $ii['qty'] * $ii['harga_satuan']; ?>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">Rp <?= number_format($grandtotal, 0, '.', '.'); ?></span>
                              </td>
                              <td class="align-middle w-10"><img src="<?= base_url('asset/pict/qrcode_invoice/') . $ii['invoice_qrcode']; ?>" alt="QR Code" width="70%"></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($invoiceout != null) : ?>
                <div class="col-md-12">
                  <div class="row p-4">
                    <div class="col-md-12">
                    </div>
                    <h6>Out History</h6>
                    <div class="table-responsive px-4">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invocie No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Invoice Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Staff In Charge</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Purpose</th>
                            <th class="text-secondary opacity-7 w-10">QR Code</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($invoiceout as $io) : ?>
                            <tr>
                              <td class="align-middle">
                                <h6 class="text-sm"><?= $io['invoice_no']; ?></h6>
                              </td>
                              <td class="align-middle">
                                <p class="text-xs font-weight-bold mb-0"><?= $io['invoice_date']; ?></p>
                              </td>
                              <td class="align-middle">
                                <p class="text-xs font-weight-bold mb-0"><?= $io['staff_in_charge_name']; ?></p>
                              </td>
                              <td class="align-middle">
                                <p class="text-xs mb-0"><?= $io['alasan_keluar']; ?></p>
                              </td>
                              <td class="align-middle w-10"><img src="<?= base_url('asset/pict/qrcode_invoice/') . $io['invoice_qrcode']; ?>" alt="QR Code" width="70%"></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>


  </main>
</body>

</html>