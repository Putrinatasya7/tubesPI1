    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Request In</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $requestIn; ?>
                      <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Request Out</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $requestOut; ?>
                      <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Items</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $totalItem; ?>
                      <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Supplier</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $totalSupplier; ?>
                      <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-box-2 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">User</p>
                        <h5 class="font-weight-bolder mb-0">
                          <?= $totalUser; ?>
                          <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- For Stock Notification -->
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12 mt-4">
              <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-1">Stock Reminder</h6>
                  <p class="text-sm"></p>
                </div>
                <div class="card-body p-3">
                  <?php if ($minimum_stock != null) : ?>
                    <div class="row">
                      <?php foreach ($minimum_stock as $ms) : ?>
                        <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">

                          <div class="d-flex align-items-center justify-content-between">
                            <h6>
                              <?= $ms['barang']; ?>
                            </h6>
                            <?php if ($ms['stock'] <= 10) {
                              $bg = "bg-gradient-danger";
                            } else {
                              $bg = "bg-gradient-warning";
                            } ?>
                          </div>
                          <div class="d-flex align-items-center justify-content-between">
                            <h5>
                              <span class="badge <?= $bg; ?>"><?= $ms['stock']; ?></span>
                            </h5>
                            <a href="<?php echo base_url('Request/addReqIn') ?>"><button type="button" class="btn btn-outline-primary btn-sm mb-0">Add Stock</button></a>
                          </div>
                          <p></p>

                        </div>
                      <?php endforeach; ?>
                    </div> <!-- /.row-->
                    <?php else: ?>
                    <h6 class="text-center font-weight-normal mb-4">No stock minimum avaliable right now.</h6>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>