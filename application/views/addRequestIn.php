<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header pb-0">
      <div class="row">
        <div class="col">
          <?php $request_no = generateRequestNo('In'); ?>
          <h5>Request No. <?= $request_no; ?></h5>
          <h6>Request By. <?= $this->session->userdata('name'); ?></h6>
        </div>
        <div class="col">
          <h6>Date: <?php echo date("l, d F Y"); ?></h6>
          <h6>To. </h6>
        </div>
      </div>
    </div>

    <div class="card-body p-3">
      <button type="button" class="btn btn-icon btn-outline-info btn-tooltip btn-sm btnaddformin" data-bs-toggle="tooltip" data-bs-placement="top" title="Add more item" data-container="body" data-animation="true">
        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
      </button>

      <?= form_open('Request/submitRequestIn', ['class' => 'formRequestIn']); ?>
      <div class="table-responsive">
        <table class="table align-items-center mb-0">
          <!-- <thead> -->
          <tr>
            <th class="text-secondary opacity-7 w-1"></th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supplier</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total price</th>
          </tr>
          <!-- </thead> -->
          <input type="hidden" name="request_no" id="request_no" value="<?= $request_no; ?>">
          <!-- <tbody class="addFormin"> -->
          <tr>
            <td class="align-middle text-center">

            </td>
            <td class="align-middle text-center form-group input-group-sm">
              <select class="form-control barang" data-item_price_id="1" id="barang" name="barang[]" required>
                <option value="">Pilih Barang</option>
                <?php foreach ($barang as $b) : ?>
                  <option value="<?= $b['barang_id']; ?>" data-row_barang="" data-price="<?= $b['harga']; ?>"><?= $b['barang']; ?></option>
                <?php endforeach; ?>
              </select>
            </td>
            <td class="align-middle text-center form-group input-group-sm">
              <select class="form-control" id="supplier" name="supplier[]" required>
                <option value="">Pilih Supplier</option>
                <?php foreach ($supplier as $s) : ?>
                  <option value="<?= $s['supplier_id']; ?>"><?= $s['supplier']; ?></option>
                <?php endforeach; ?>
              </select>
            </td>
            <td class="form-group input-group-sm form-group input-group-sm w-20">
              <div class="input-group input-group-sm">
                <span class="input-group-text">IDR</span>
                <input type="number" class="form-control px-2 price" id="price1" name="price[]" readonly>
              </div>
            </td>
            <td class="form-group input-group-sm form-group input-group-sm w-6">
              <input type="number" class="form-control qty" id="qty" name="qty[]" required min="1">
            </td>
            <td class="form-group input-group-sm form-group input-group-sm w-20">
              <div class="input-group input-group-sm">
                <span class="input-group-text">IDR</span>
                <input type="number" class="form-control px-2" id="totprice" name="totprice[]" disabled>
              </div>
            </td>
          </tr>
          <!-- </tbody> -->
        </table>
      </div>

      <div class="row mt-4">
        <div class="col-md-2">
          <div class="input-group input-group-sm">
            <span class="input-group-text">Total Item</span>
            <input type="number" id="total_item" aria-label="Total Item" class="form-control px-2" disabled>
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group input-group-sm">
            <span class="input-group-text">Subtotal</span>
            <span class="input-group-text">IDR</span>
            <input type="number" aria-label="Subtotal" class="form-control px-2" disabled>
          </div>
        </div>
      </div>

      <button type="button" onclick="goBack()" class="btn btn-secondary btn-sm mt-4">Back</button>
      <button type="submit" class="btn btn-primary btn-sm mt-4">Submit</button>
      <?= form_close() ?>
    </div>
  </div>
</div>


<script>
  $(document).on('click', '.btnremoveformin', function(e) {
    e.preventDefault();

    $(this).parents('tr').remove();
  });

  // $('.barang').on('change', function() {
  //   $('.price')
  //     .val(
  //       $(this).find(':selected').data('price')
  //     );
  // });

  // fungsi-fungsi
  $(function() {

    $('.qty').on("change.add", total_item);
    // $('.barang').on('change', getPrice);

    //initial calculation
    total_item();
    // getPrice();

    //button for adding new form
    var count = 1;
    $('.btnaddformin').click(function() {
      $('.qty').off("change.add");
      // $('.barang').off("change");
      addForm();
      $('.qty').on("change.add", total_item);
      // $('.barang').on("change", getPrice);
      total_item();
      // getPrice()
    });

    /* function getPrice() {
      $('.barang').each(function() {
        $('.price').val($(this).find(':selected').data('price'));
      });
    } */

    function total_item() {
      var sum = 0;

      $('.qty').each(function() {
        var qty = $(this).val();

        if (qty != 0) {
          sum += parseInt(qty);
        }
      });

      $('#total_item').val(sum);
    }

    function addForm() {
      count++;
      $(`<tr>` +
        `<td class="align-middle text-center">
            <button type="button" class="btn btn-icon btn-outline-danger btn-sm btnremoveformin">
              <span class="btn-inner--icon"><i class="fa fa-times"></i></span>
            </button>
          </td>` +
        `<td class="align-middle text-center form-group input-group-sm">
            <select class="form-control barang" data-item_price_id="` + count + `" id="barang" name="barang[]" required>
              <option value="">Pilih Barang</option>
              <?php foreach ($barang as $b) : ?>
                <option value="<?= $b['barang_id']; ?>" data-price="<?= $b['harga']; ?>"><?= $b['barang']; ?></option>
              <?php endforeach; ?>
            </select>
          </td>` +
        `<td class="align-middle text-center form-group input-group-sm">
            <select class="form-control" id="supplier" name="supplier[]" required>
              <option value="">Pilih Supplier</option>
              <?php foreach ($supplier as $s) : ?>
                <option value="<?= $s['supplier_id']; ?>"><?= $s['supplier']; ?></option>
              <?php endforeach; ?>
            </select>
          </td>` +
        `<td class="form-group input-group-sm form-group input-group-sm w-20">
            <div class="input-group input-group-sm">
              <span class="input-group-text">IDR</span>
              <input type="number" class="form-control price px-2" id="price` + count + `" name="price[]" readonly>
            </div>
          </td>` +
        `<td class="form-group input-group-sm form-group input-group-sm w-6">
            <input type="number" class="form-control qty" id="qty" name="qty[]" required min="1">
          </td>` +
        `<td class="form-group input-group-sm form-group input-group-sm w-20">
            <div class="input-group input-group-sm">
              <span class="input-group-text">IDR</span>
              <input type="number" class="form-control px-2" id="totprice" name="totprice[]" disabled>
            </div>
          </td>` +
        `</tr>`).insertAfter("tr:last-child");
    }

  });

  $(document).ready(function() {
    $(document).on('change', '.barang', function() {
      var barang_id = $(this).val();
      var item_price_id = $(this).data('item_price_id');
      var price = $(this).find(':selected').data('price');

      $('#price' + item_price_id).val(price);
      /* $.ajax({
        url:"<?= base_url('Request/getItemPrice') ?>",
        method: "POST",
        data:{barang_id:barang_id},
        success:function(data)
        {
          $('#price').html(data);
        }
      }); */
    });
  });
</script>