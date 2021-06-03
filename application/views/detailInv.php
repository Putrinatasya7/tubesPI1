<div class="container-fluid py-4">
    <div class="col-md-12 my-2 text-right">
        <a class="btn bg-gradient-default mb-0 text-dark text-sm" href="<?php echo base_url('Invoice/print') ?>"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</a>
    </div>
      <div class="card">
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
        </div>

        <div class="card-body p-3">

          <form action="" method="post">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
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
            </div>
            <div class="col-md-12 mt-5 px-4 text-right">
               <h6>Accepted By</h6>
            </div>
            <button type="button" onclick="goBack()" class="btn btn-secondary btn-sm mt-3">Back</button>
          </form>
        </div>
      </div>
    </div>


    </main>