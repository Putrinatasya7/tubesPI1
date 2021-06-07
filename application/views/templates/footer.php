<footer class="footer pt-3">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <!-- <div class="copyright text-center text-sm text-muted text-lg-left">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://blog.creative-tim.com" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div> -->
        </div>
      </div>
  </footer>
  </div>
  </main>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>asset/bootstrap/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/bootstrap/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/bootstrap/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>asset/bootstrap/js/plugins/chartjs.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/bootstrap/js/plugins/Chart.extension.js"></script> -->

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>asset/bootstrap/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
    <!-- coba -->
    
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/popper.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="<?php echo base_url(); ?>/asset/bootstrap/css/select2.min.js"></script>
  <script type="text/javascript">
    $(".selection-1").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });

    $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect2')
    });
  </script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>/assets/css/main.js"></script>
  </body>

  </html>