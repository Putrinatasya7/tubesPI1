<div class="container-fluid py-4">
  <div class="card p-4">
    <div class="card-header pb-0">
      <div class="row">
        <div class="col">
          <h5>Request No. <?= $request_out[0]['request_no']; ?></h5>
          <h6>Request By. <?= $request_out[0]['creator_name']; ?></h6>
        </div>
        <div class="col">
          <h6>Date: <span class="px-2"><?= date("l, d F Y", strtotime($request_out[0]['created_at'])); ?></span></h6>
          <h6>To. </h6>
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-md-6">
          <?php if ($request_out[0]['status'] == "Waiting") {
            $bg = "bg-gradient-warning";
          } elseif ($request_out[0]['status'] == "Accepted") {
            $bg = "bg-gradient-success";
          } else {
            $bg = "bg-gradient-danger";
          } ?>
          <span class="badge badge-sm <?= $bg; ?>"><?= $request_out[0]['status']; ?></span>
        </div>
      </div>
    </div>
    <div class="card-body pb-2 p-3">
      <div class="row">
        <div class="col">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-secondary text-s">Item</th>
                <th class="align-middle text-center text-secondary text-s">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($request_out as $ro) : ?>
                <tr>
                  <td class="text-xs font-weight-bold"><?= $ro['barang']; ?></td>
                  <td class="align-middle text-center text-xs font-weight-bold"><?= $ro['qty']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md">
          <div class="form-group form-group-sm">
            <label for="exampleFormControlTextarea1">Alasan Pengambilan</label>
            <textbox class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $request_out[0]['alasan_keluar']; ?></textbox>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer pb-0 p-3">

      <!-- <div class="card card-plain"> -->
      <!-- <div class="card-header pb-0 p-3"> -->
      <!-- <div class="row"> -->
      <!-- <div class="row mt-2"> -->
      <!-- </div> -->
      <!-- <div class="card-footer pb-2 p-3"> -->
      <!-- </div> -->
      <!-- </div> -->
      <!-- </div> -->
      <!-- </div> -->
      <button type="button" onclick="goBack()" class="btn btn-secondary btn-sm mt-4">Back</button>
    </div> <!-- /card-footer -->
  </div>
</div>