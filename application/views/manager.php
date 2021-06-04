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

    <!-- today's acc req -->
    <div class="container-fluid py-4">
      <div class="col-12 mt-4">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Today's Request</h6>
          </div>
          <!-- req in -->
          <div class="row">
            <div class="col-md-6 mt-4">
              <div class="card card-plain h-100 mb-4">
                <div class="card-body pt-4 p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Request In</h6>
                  <ul class="list-group">
                    <?php if ($todayRequestIn == null) : ?>
                      <!-- di sini tolong tambahkan pemberitahuan jika request out untuk hari ini masih belum ada atau tidak ada untuk saat ini -->
                    <?php else : ?>
                      <?php foreach ($todayRequestIn as $tri) : ?>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                          <div class="d-flex align-items-center">
                            <a href="<?= base_url('Request/detailsIn/' . $tri['request_no']); ?>">
                              <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-right"></i></button>
                            </a>
                            <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm"><?= $tri['request_no']; ?></h6>
                              <span class="text-xs"><?= date("d F Y, g:i A", strtotime($tri['created_at'])); ?></span>
                            </div>
                          </div>
                        </li>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>

            <!-- req out -->
            <div class="col-md-6 mt-4">
              <div class="card card-plain h-100 mb-4">
                <div class="card-body pt-4 p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Request Out</h6>
                  <ul class="list-group">
                    <?php if ($todayRequestOut == null) : ?>
                      <!-- di sini tolong tambahkan pemberitahuan jika request out untuk hari ini masih belum ada atau tidak ada untuk saat ini -->
                    <?php else : ?>
                      <?php foreach ($todayRequestOut as $tro) : ?>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                          <div class="d-flex align-items-center">
                            <a href="<?= base_url('Request/detailsOut/' . $tro['request_no']); ?>">
                              <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm"><?= $tro['request_no']; ?></h6>
                              <span class="text-xs"><?= date("d F Y, g:i A", strtotime($tro['created_at'])); ?></span>
                            </div>
                          </div>
                        </li>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end today's acc req -->