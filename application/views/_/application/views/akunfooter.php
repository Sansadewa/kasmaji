

        </div>

        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->

        <footer class="footer">

          <div class="container-fluid clearfix">

            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018

            </span>

            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Dari KOMINFO-TI, untuk kamu

              <i class="mdi mdi-heart text-danger"></i>

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
      $('#sebuah-tabel1').DataTable({"scrollX": true});

      $('.dataTables_length').addClass('bs-select');

      $('#sebuah-tabelbtm').DataTable({"scrollX": true,  "order": [[ 3, "asc" ], [0,"asc"]]});

      $('#sebuah-tabela tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

      var jojo=$('#sebuah-tabela').DataTable({
        "scrollY":        "400px",
        "scrollCollapse": true,
        "scrollX": true,
        dom: 'flrtip',
        "autoWidth": true,
        "oLanguage": {
           "sSearch": "Global Search :"
        }
        ,"columnDefs": [
          { "width": "5px", "targets": [1,3,4] }
        ]
      });

      jojo.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
      } );
      //jojo.columns.adjust().responsive.recalc();
      $('#maaf').modal('show');
    });

</script>

  <!-- End custom js for this page-->

</body>



</html>