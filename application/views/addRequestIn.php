<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header pb-0">
      <div class="row">
        <div class="col">
          <h5>Request No. </h5>
          <h6>Request By. </h6>
        </div>
        <div class="col">
          <h6>Date</h6>
          <h6>To. </h6>
        </div>
      </div>
    </div>

    <div class="card-body p-3">
      <button type="button" class="btn btn-icon btn-outline-info btn-tooltip btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add more item" data-container="body" data-animation="true">
        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
      </button>
      <button type="button" class="btn btn-icon btn-outline-danger btn-tooltip btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove selected item" data-container="body" data-animation="true">
        <span class="btn-inner--icon"><i class="fa fa-times"></i></span>
      </button>

      <form action="" method="post">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-secondary opacity-7"></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supplier</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="align-middle text-center w-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1">
                  </div>
                </td>
                <td class="align-middle text-center form-group input-group-sm">
                  <select class="form-control" id="barang" name="barang[]">
                    <option>Pilih Barang</option>
                  </select>
                </td>
                <td class="align-middle text-center form-group input-group-sm">
                  <select class="form-control" id="supplier" name="supplier[]">
                    <option>Pilih Supplier</option>
                  </select>
                </td>
                <td class="form-group input-group-sm form-group input-group-sm w-6">
                  <input type="number" class="form-control" id="qty" name="qty[]">
                </td>
                <td class="form-group input-group-sm form-group input-group-sm w-20">
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">IDR</span>
                    <input type="text" class="form-control" id="price" name="price[]" disabled>
                  </div>
                </td>
                <td class="form-group input-group-sm form-group input-group-sm w-20">
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">IDR</span>
                    <input type="text" class="form-control" id="totprice" name="totprice[]" disabled>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row mt-4">
          <div class="col-md-3">
            <div class="input-group input-group-sm">
              <span class="input-group-text">Total Item</span>
              <input type="text" aria-label="First name" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-5">
            <div class="input-group input-group-sm">
              <span class="input-group-text">Subtotal</span>
              <span class="input-group-text">IDR</span>
              <input type="text" aria-label="First name" class="form-control" disabled>
            </div>
          </div>
        </div>

        <button type="button" onclick="goBack()" class="btn btn-secondary btn-sm mt-4">Back</button>
        <button type="submit" class="btn btn-primary btn-sm mt-4">Submit</button>
      </form>
    </div>
  </div>
</div>


</main>