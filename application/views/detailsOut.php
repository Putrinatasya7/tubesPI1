<style type="text/css">
		#errors:empty{display: none;}
		input[type="checkbox"]:not(old), input[type="radio"]:not(old){ opacity:10;}
		img{    margin: 17px;}
	</style>
<div class="container-fluid py-4">
  <div class="card px-4 pt-3 pb-4">
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
    <div class="card-footer pb-0 p-3 justify-content-between">
      <div class="row">
        <div class="col-md-6">
          <button type="button" onclick="goBack()" class="btn btn-secondary btn-sm mt-4">Back</button>
        </div>
        <div class="col-md-6">
          <?php if ($request_out[0]['status'] == "Waiting" && $this->session->userdata('role_id') == 2) : ?>
            <button type="button" class="btn btn-success btn-sm mt-4 float-end" id="approvebutton" data-id="<?= $request_out[0]['request_no']; ?>">Approve</button>
            <button type="button" class="btn btn-danger btn-sm mt-4 me-4 float-end" data-toggle="modal" data-target="#rejectModal" id="rejectbutton" data-id="<?= $request_out[0]['request_no']; ?>">Reject</button>
          <?php endif; ?>
        </div>
      </div>
    </div> <!-- /card-footer -->
  </div>
</div>

<!-- Error  displays here  -->
<div class="positions-topfix">
  <div class="alert alert-danger text-white" id="errors"></div>
</div>

<!-- SIGNATURE MODAL -->
<div class="modal fade" id="sign-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="signature-pad">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> Add Signature</h4>
      </div>
      <div class="modal-body">
        <canvas width="570" height="318"></canvas>
        <input type="hidden" name="request_no" id="request_no">
        <input type="hidden" name="status" id="status" value="Accepted">

      </div>
      <div class="modal-footer clearfix">
        <button type="button" id="save2" class="btn themecl1" data-action="save"><i class="fa fa-check"></i> Save</button>
        <button type="button" data-action="clear" class="btn themecl2"><i class="fa fa-trash-o"></i> Clear</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- REJECT MODAL -->
<div class="modal fade" tabindex="-1" aria-labelledby="rejectModalLabel" role="dialog" id="rejectModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reject Request</h5>
        <a type="button" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times top-0"></i></span></a>
      </div>

      <form role="form" action="<?php echo base_url('Request/respondRequest') ?>" method="post" id="rejectForm">
        <div class="modal-body">
          <input type="hidden" name="request_no" id="request_no">
          <input type="hidden" name="status" id="status" value="Rejected">
          <p>Do you really want to reject this request?</p>
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
  $(document).on("click", "#approvebutton", function() {
    let request_no = $(this).data('id');
    $(".modal-body #request_no").val(request_no);
  });

  $(document).on("click", "#rejectbutton", function() {
    let request_no = $(this).data('id');
    $(".modal-body #request_no").val(request_no);
  });
</script>

<script>
  $(document).ready(function() {

    $('ul li').each(function(i) {
      $(this).addClass('jag' + i + '');
      if (i % 2 == 0) {
        $(this).addClass("noRightMargin");
      }


    });


    $("#approvebutton").on("click", function() {

      if ($("#name1").val() == "") {

        $('#errors').html('Enter The Name');
        $("#name1").css("border-color", "red");
        $("#name1").focus();
        $("#name1").keyup(function() {

          $(this).css("border-color", "black");

        });
        return false;
      } else {


        $('#sign-modal').modal('show');

        var snames = $(this).closest("ul").find("input[id='name1']").val();
        var scount = $(this).closest("ul").find("input[id='appendcount1']").val();

        $("#signname").val(snames);
        $("#scount").val(scount);

      }
    });
  });
</script>

<script>
  var wrapper = document.getElementById("signature-pad"),
    clearButton = wrapper.querySelector("[data-action=clear]"),
    saveButton = wrapper.querySelector("[data-action=save]"),
    canvas = wrapper.querySelector("canvas"),
    signaturePad;


  function resizeCanvas() {
    var ratio = window.devicePixelRatio || 1;
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
  }



  /*clear the signature pad */
  signaturePad = new SignaturePad(canvas);
  clearButton.addEventListener("click", function(event) {
    signaturePad.clear();
  });



  /*validate */
  saveButton.addEventListener("click", function(event) {
    if (signaturePad.isEmpty()) {

      $("#errors").addClass('shake');
      $("#errors").show();
      $("#errors").delay(4000).hide(200, function() {
        $("#errors").hide();
      });
      $('#errors').html('Please provide signature first');
    } else {

      $('#error').html('');

      $('#sign-modal').modal('hide');

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Request/respondRequest",
        data: {
          'image': signaturePad.toDataURL(),
          'request_no':$('#request_no').val(),
          'status':$('#status').val(),
        },
        success: function(datas1) {
          signaturePad.clear();
          window.location.href = "<?php echo base_url('Request/addOut')?>";
        }
      });

      
    }
  });
</script>