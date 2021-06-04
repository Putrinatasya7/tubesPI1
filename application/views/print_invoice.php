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
<div class="container-fluid py-4">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col">
              <h6 class="text-sm">Invoice ID. </h6>
              <h6 class="text-sm">Invoice Date </h6>
            </div>
            <div class="col">
              <h6 class="text-sm">Receive Date</h6>
              <h6 class="text-sm">Receive by </h6>
            </div>
          </div>

          <form action="" method="post">
            <div class="table-responsive">
              <table class="table align-items-center mb-0 mt-2">
                <thead>
                  <td class="align-middle text-center text-xs font-weight-bold">Item</th>
                  <td class="align-middle text-center text-xs font-weight-bold">Supplier</th>
                  <td class="align-middle text-center text-xs font-weight-bold">Qty</th>
                  <td class="align-middle text-center text-xs font-weight-bold">Unit Price</th>
                  <td class="align-middle text-center text-xs font-weight-bold">Amount</th>
                  <td class="align-middle text-center text-xs font-weight-bold">Shipper</th>
                  <td class="align-middle text-center text-xs font-weight-bold">Shipping Date</th>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle text-center text-xs">Name</td>
                    <td class="align-middle text-center text-xs">Supplier name</td>
                    <td class="align-middle text-center text-xs">100</td>
                    <td class="align-middle text-center text-xs">Rp 120.000</td>
                    <td class="align-middle text-center text-xs">Rp 12.000.000</td>
                    <td class="align-middle text-center text-xs">Shipper_name</td>
                    <td class="align-middle text-center text-xs">Date</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td class="align-middle text-center text-xs">Name</td>
                    <td class="align-middle text-center text-xs">Supplier name</td>
                    <td class="align-middle text-center text-xs">100</td>
                    <td class="align-middle text-center text-xs">Rp 120.000</td>
                    <td class="align-middle text-center text-xs">Rp 12.000.000</td>
                    <td class="align-middle text-center text-xs">Shipper_name</td>
                    <td class="align-middle text-center text-xs">Date</td>
                  </tr>
                </tbody>
              </table>
              <script type="text/javascript">
              window.print();
            </script>
            <div class="col-md-12 mt-5 px-4 text-right">
               <h6>Accepted By</h6>
            </div>
          </form>
        </div>
      </div>
    </div>


    </main>