
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020
            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">.
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url();?>/public/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>/public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>/public/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>/public/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>/public/js/dashboard.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#sebuah-tabel').DataTable({"scrollX": true});
      $('.dataTables_length').addClass('bs-select');
      $('#sebuah-tabelbtm').DataTable({"scrollX": true,  "order": [[ 3, "asc" ], [0,"asc"]]});
    });
</script>
  <!-- End custom js for this page-->
</body>

</html>