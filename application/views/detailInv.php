<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-12 my-2 text-right">
      <a class="btn bg-gradient-default mb-0 text-dark text-sm" href="<?php echo base_url('Invoice/print/') . $invoice[0]['invoice_no'] ?>"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</a>
    </div>
  </div>
  <div class="card">
    <div class="card-header pb-0">
      <div class="row">
        <div class="col">
          <h6 class="text-s font-weight-bolder"><span class="font-weight-normal pe-1">Invoice ID.</span> <?= $invoice[0]['invoice_no']; ?></h6>
          <h6 class="text-sm"><span class="font-weight-normal pe-1">Invoice Date</span> <?= $invoice[0]['invoice_date']; ?></h6>
        </div>
        <div class="col">
          <h6 class="text-sm"><span class="font-weight-normal pe-1">Receive Date</span> <?= $invoice[0]['received_at']; ?></h6>
          <h6 class="text-sm"><span class="font-weight-normal pe-1">Receive by</span> <?= $invoice[0]['received_by']; ?></h6>
        </div>
      </div>
    </div>

    <div class="card-body p-4">
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
        <div class="row">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <td class="align-middle text-center text-xs font-weight-bold">Item</th>
                  <?php if ($invoice[0]['req_category'] == "In") : ?>
                <td class="align-middle text-center text-xs font-weight-bold">Supplier</th>
                <?php endif; ?>
                <td class="align-middle text-center text-xs font-weight-bold">Qty</th>
                  <?php if ($invoice[0]['req_category'] == "In") : ?>
                <td class="align-middle text-center text-xs font-weight-bold">Unit Price</th>
                <td class="align-middle text-center text-xs font-weight-bold">Amount</th>
                <?php endif; ?>
                <td class="align-middle text-center text-xs font-weight-bold">QR Code</th>
              </thead>
              <tbody>
                <?php $total_item = 0;
                $total_price = 0; ?>
                <?php foreach ($invoice as $inv) : ?>
                  <tr>
                    <td class="align-middle text-center text-xs"><?= $inv['barang']; ?></td>
                    <?php if ($inv['req_category'] == "In") : ?>
                      <td class="align-middle text-center text-xs"><?= $inv['supplier']; ?></td>
                    <?php endif; ?>
                    <td class="align-middle text-center text-xs"><?= $inv['qty']; ?></td>
                    <?php if ($inv['req_category'] == "In") : ?>
                      <td class="align-middle text-center text-xs">Rp <?= $inv['harga_satuan']; ?></td>
                      <td class="align-middle text-center text-xs">Rp <?= $inv['harga_satuan'] * $inv['qty']; ?></td>
                    <?php endif; ?>
                    <td class="align-middle text-center text-xs"><img src="<?= base_url('asset/pict/qrcode/') . $inv['qrcode_barang']; ?>"></td>
                  </tr>
                  <?php if ($inv['req_category'] == "In") : ?>
                    <?php $total_item += $inv['qty'];
                    $total_price += $inv['harga_satuan'] * $inv['qty'] ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
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
        <div class="row">
          <div class="col-md-12 mt-5 text-right">
            <h6>Accepted By</h6>
          </div>
          <div class="col-md-12 ms-6 text-right">
            <img src="<?= base_url('asset/signature/') . $invoice[0]['sign-img']; ?>" alt="" width="20%">
          </div>
        </div>

        <button type="button" onclick="goBack()" class="btn btn-secondary btn-sm mt-3">Back</button>

      </form>
    </div>
  </div>
</div>