<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-12 my-2 text-right">
      <a class="btn bg-gradient-default mb-0 text-dark text-sm" href="<?php echo base_url('Invoice/print') ?>"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</a>
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

    <div class="card-body p-3">

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
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
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