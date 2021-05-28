
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
            <div class="row">
              <div class="col-md-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group input-group-sm">
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Pilih Barang</option>
                  </select>
                </div>
              </div>

              <div class="col-md">
                <div class="form-group input-group-sm">
                  <input type="text" class="form-control" disabled />
                </div>
              </div>

              <div class="col-md-1">
                <div class="form-group input-group-sm">
                  <input type="number" class="form-control" id="exampleFormControlInput1">
                </div>
              </div>

              <div class="col-md">
                <div class="form-group">
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">IDR</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                  </div>
                </div>
              </div>

              <div class="col-md">
                <div class="form-group">
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">IDR</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-2">
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

            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>


  </main>