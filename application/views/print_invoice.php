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
    <div class="container-fluid py-4">
      <div class="card-header pb-0">
        <div class="row">
          <?php if ($invoice[0]['req_category'] == "In") : ?>
            <div class="col">
              <h6 class="text-s font-weight-bolder"><span class="font-weight-normal pe-1">Invoice ID.</span> <?= $invoice[0]['invoice_no']; ?></h6>
              <h6 class="text-sm"><span class="font-weight-normal pe-1">Invoice Date</span> <?= date('l, d F Y  g:i a', strtotime($invoice[0]['invoice_date'])); ?></h6>
            </div>
            <div class="col">
              <h6 class="text-sm"><span class="font-weight-normal pe-1">Receive Date</span> <?php if ($invoice[0]['status_inv_in'] == "received") {
                                                                                              echo date('l, d F Y  g:i a', strtotime($invoice[0]['received_at']));
                                                                                            } ?></h6>
              <h6 class="text-sm"><span class="font-weight-normal pe-1">Receive by</span> <?= $invoice[0]['receiver_name']; ?></h6>
            </div>
          <?php else : ?>
            <div class="col">
              <h6 class="text-s font-weight-bolder"><span class="font-weight-normal pe-1">Invoice ID.</span> <?= $invoice[0]['invoice_no']; ?></h6>
            </div>
            <div class="col">
              <h6 class="text-sm"><span class="font-weight-normal pe-1">Invoice Date</span> <?= date('l, d F Y  g:i a', strtotime($invoice[0]['invoice_date'])); ?></h6>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($invoice[0]['req_category'] == "In") : ?>
          <div class="row mt-1">
            <div class="col-md-6">
              <?php if ($invoice[0]['status_inv_in'] == "waiting for delivery") {
                $bg = "bg-gradient-warning";
              } elseif ($invoice[0]['status_inv_in'] == "received") {
                $bg = "bg-gradient-success";
              } ?>
              <span class="badge badge-sm <?= $bg; ?>"><?= $invoice[0]['status_inv_in']; ?></span>
            </div>
          </div>
        <?php endif; ?>

        <form action="" method="post">
          <!-- <div class="table-responsive"> -->
          <table class="table align-items-center mb-0 mt-2">
            <thead>
              <th class="align-middle text-center text-xs font-weight-bold">Item</th>
              <?php if ($invoice[0]['req_category'] == "In") : ?>
                <th class="align-middle text-center text-xs font-weight-bold">Supplier</th>
              <?php endif; ?>
              <th class="align-middle text-center text-xs font-weight-bold">Qty</th>
              <?php if ($invoice[0]['req_category'] == "In") : ?>
                <th class="align-middle text-center text-xs font-weight-bold">Unit Price</th>
                <th class="align-middle text-center text-xs font-weight-bold">Amount</th>
              <?php endif; ?>
              <th class="align-middle text-center text-xs font-weight-bold w-10">QR Code</th>
            </thead>
            <tbody>
              <?php $total_item = 0;
              $total_price = 0; ?>
              <?php foreach ($invoice as $inv) : ?>
                <tr>
                  <td class="align-middle text-center text-xs"><?= $inv['barang']; ?></td>
                  <?php if ($inv['req_category'] == "In") : ?>
                    <td class="align-middle text-center text-xs"><?= $inv['supplier']; ?></td>
                  <?php endif ?>
                  <td class="align-middle text-center text-xs"><?= $inv['qty']; ?></td>
                  <?php if ($inv['req_category'] == "In") : ?>
                    <td class="align-middle text-center text-xs">Rp <?= number_format($inv['harga_satuan'], 0, ',', '.'); ?></td>
                    <td class="align-middle text-center text-xs">Rp <?= number_format($inv['harga_satuan'] * $inv['qty'], 0, ',', '.'); ?></td>
                  <?php endif ?>
                  <td class="align-middle text-center text-xs"><img src="<?= base_url('asset/pict/qrcode/') . $inv['qrcode_barang']; ?>" width="70%"></td>
                  <?php if ($inv['req_category'] == "In") : ?>
                    <?php $total_item += $inv['qty'];
                    $total_price += $inv['harga_satuan'] * $inv['qty'] ?>
                  <?php endif ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- </div> -->
          <?php if ($invoice[0]['req_category'] == "In") : ?>
            <div class="row mt-5">
              <div class="col-md-3">
                <div class="input-group input-group-sm">
                  <span class="input-group-text">Total Item</span>
                  <input type="text" aria-label="First name" class="form-control" value="<?= $total_item; ?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="input-group input-group-sm">
                  <span class="input-group-text">Subtotal</span>
                  <span class="input-group-text">IDR</span>
                  <input type="text" aria-label="First name" class="form-control" value="<?= number_format($total_price, 0, '.', '.'); ?>">
                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="row mt-5">
              <div class="col-md">
                <div class="form-group form-group-sm">
                  <label for="exampleFormControlTextarea1">Alasan Pengambilan</label>
                  <textbox class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $invoice[0]['alasan_keluar']; ?></textbox>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <script type="text/javascript">
            window.print();
          </script>
          <div class="col-md-12 mt-5 px-4 text-right">
            <h6>Accepted By</h6>
          </div>
          <div class="col-md-12 ms-6 text-right">
            <img src="<?= base_url('asset/signature/') . $invoice[0]['sign-img']; ?>" alt="" width="20%">
          </div>
          <div class="col-md-12 text-right">
            <p><?= $invoice[0]['responder_name']; ?></p>
          </div>
        </form>
      </div>
    </div>


  </main>
</body>

</html>