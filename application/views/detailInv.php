<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-12 my-2 text-right">
      <a class="btn bg-gradient-default mb-0 text-dark text-sm" href="<?php echo base_url('Invoice/print/') . $invoice[0]['invoice_no'] ?>"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</a>
    </div>
    <!-- alert -->
    <?php if ($this->session->flashdata('message')) : ?>
      <div class="col-md-12">
        <div class="alert alert-success col-md-8 alert-dismissible fade show text-white" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text"><strong>Success!</strong> <?= $this->session->flashdata('message'); ?>!</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    <?php endif; ?>
    <?php $this->session->unset_userdata('message'); ?>
    <!-- alert -->
  </div>
  <div class="card">
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
                <td class="align-middle text-center text-xs font-weight-bold w-10">QR Code</th>
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
                      <td class="align-middle text-center text-xs">Rp <?= number_format($inv['harga_satuan'], 0, '.', '.'); ?></td>
                      <td class="align-middle text-center text-xs">Rp <?= number_format($inv['harga_satuan'] * $inv['qty'], 0, '.', '.'); ?></td>
                    <?php endif; ?>
                    <td class="align-middle text-center text-xs w-10"><img src="<?= base_url('asset/pict/qrcode/') . $inv['qrcode_barang']; ?>" width="70%"></td>
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
        <div class="row mt-4">
          <div class="col-md-6">
            <img src="<?= base_url('asset/pict/qrcode_invoice/') . $invoice[0]['invoice_qrcode']; ?>" alt="QR Code" width="25%">
          </div>
          <div class="col-md-6 text-right">
            <div class="col-md-12 text-right">
              <h6>Accepted By</h6>
            </div>
            <div class="col-md-12 ms-6 text-right">
              <img src="<?= base_url('asset/signature/') . $invoice[0]['sign-img']; ?>" alt="" width="45%">
            </div>
            <div class="col-md-12 text-right">
              <p><?= $invoice[0]['responder_name']; ?></p>
            </div>
          </div>
        </div>

        <button type="button" onclick="goBack()" class="btn btn-secondary btn-sm mt-3">Back</button>
        <?php if ($invoice[0]['req_category'] == "In" && $invoice[0]['status_inv_in'] == "waiting for delivery") : ?>
          <button type="button" class="btn btn-success btn-sm mt-3 ms-4" data-target="#receivedModal" data-toggle="modal" id="receivedbutton" data-id="<?= $invoice[0]['invoice_no']; ?>" data-requestno="<?= $invoice[0]['request_no']; ?>">Received</button>
        <?php endif; ?>

      </form>
    </div>
  </div>
</div>

<!-- RECEIVE MODAL -->
<div class="modal fade" tabindex="-1" aria-labelledby="receivedModaLabel" role="dialog" id="receivedModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Receive Invoice Items</h5>
        <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
      </div>

      <form role="form" action="<?php echo base_url('Invoice/receivedItem') ?>" method="post" id="receivedItemForm">
        <div class="modal-body text-center px-5">
          <input type="hidden" name="invoice_no" id="invoice_no">
          <input type="hidden" name="request_no" id="request_no">
          <h1 class="text-warning" style="font-size: 70px;"><i class="fa fa-exclamation-triangle"></i></h1>
          <h5 class="font-weight-bolder">Are you sure all of this invoice item have been received?</h5>
          <p class="mt-4 text-justify">Before click <strong>Sure</strong>, make sure you understand the terms and conditions that occurs!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Sure</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  $(document).on("click", "#receivedbutton", function() {
    let invoice_no = $(this).data('id');
    $(".modal-body #invoice_no").val(invoice_no);
    let request_no = $(this).data('requestno');
    $(".modal-body #request_no").val(request_no);
  });
</script>