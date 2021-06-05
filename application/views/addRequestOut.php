    <div class="container-fluid py-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col">
              <?php $request_no = generateRequestNo('Out'); ?>
              <h5>Request No. <?= $request_no; ?></h5>
              <h6>Request By. <?= $this->session->userdata('name'); ?></h6>
            </div>
            <div class="col">
              <h6>Date: <?= date("l, d F Y"); ?></h6>
              <h6>To. </h6>
            </div>
          </div>
        </div>

        <div class="card-body p-3">
          <button type="button" class="btn btn-icon btn-outline-info btn-tooltip btn-sm btnaddform" data-bs-toggle="tooltip" data-bs-placement="top" title="Add more item" data-container="body" data-animation="true">
            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
          </button>


          <!-- <form action="Request/submitRequestOut" method="post" class="formrequestout"> -->
          <?= form_open('Request/submitRequestOut', ['class' => 'formrequestout']); ?>
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <th class="text-secondary opacity-7 w-5"></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-75">Item</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
              </thead>
              <input type="hidden" name="request_no" id="request_no" value="<?= $request_no; ?>">
              <tbody class="addform">
                <tr>
                  <td class="align-middle text-center">
                  </td>
                  <td class="align-middle text-center form-group input-group-sm">
                    <select class="form-control" name="item[]" required>
                      <option value="">Choose Item</option>
                      <?php foreach ($barang as $b) : ?>
                        <option value="<?= $b['barang_id']; ?>"><?= $b['barang']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td class="align-middle text-center form-group input-group-sm">
                    <input type="number" class="form-control" name="qty[]" min="1" required>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row mt-3">
            <div class="col-md">
              <div class="form-group">
                <label for="reason">Purpose</label>
                <textarea class="form-control" name="reason" id="reason" rows="3" required></textarea>
              </div>
            </div>
          </div>

          <button type="button" onclick="goBack()" class="btn btn-secondary btn-sm mt-3">Back</button>
          <button type="submit" class="btn btn-primary btn-sm mt-3 btnsubmitrequest">Submit</button>
          <!-- </form> -->
          <?= form_close(); ?>
        </div>
      </div>
    </div>


    <script>
      $(document).ready(function(e) {
        /**
         * INI BUAT NAMBAHIN FORM BARU TIAP DIKLIK TAMBAH
         */
        $('.btnaddform').click(function(e) {
          e.preventDefault();

          $('.addform').append(`
          <tr>
          <td class="align-middle text-center">
          <button type="button" class="btn btn-icon btn-outline-danger btn-sm btnremoveform">
          <span class="btn-inner--icon"><i class="fa fa-times"></i></span>
          </button>
          </td>
          <td class="align-middle text-center form-group input-group-sm">
          <select class="form-control" name="item[]">
          <option>Pilih Barang</option>
          <?php foreach ($barang as $b) : ?>
            <option value="<?= $b['barang_id']; ?>"><?= $b['barang']; ?></option>
            <?php endforeach; ?>
            </select>
            </td>
            <td class="align-middle text-center form-group input-group-sm">
            <input type="number" class="form-control" name="qty[]">
            </td>
            </tr>
            `);
        });
      });

      /**
       * INI BUAT HAPUS BARIS FORM BARU TIAP DIKLIK HAPUS
       */
      $(document).on('click', '.btnremoveform', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
      })
    </script>