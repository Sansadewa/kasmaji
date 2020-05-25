
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
  <!-- <script src="<?php echo base_url();?>public/scripts/jquery.dataTables.min.js"></script> -->
  <script src="<?php echo base_url();?>public/scripts/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url();?>public/scripts/buttons.flash.min.js"></script>
  <script src="<?php echo base_url();?>public/scripts/jszip.min.js"></script>
  <script src="<?php echo base_url();?>public/scripts/buttons.html5.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      //Trigger Seachbox
      $('#searchbutton').click(function(){
        $('#searchbox').animate({
                width: "toggle"
        });
        $('#searchbox').focus();
      });

      // Tfoot Search
// Setup - add a text input to each footer cell
$('#sebuah-tabel thead tr').clone(true).appendTo( '#sebuah-tabel thead' );
    $('#sebuah-tabel thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" style="border:none; border-bottom: 2px solid #259b87" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $('#sebuah-tabela thead tr').clone(true).appendTo( '#sebuah-tabela thead' );
    $('#sebuah-tabela thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" style="border:none; border-bottom: 2px solid #259b87" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#sebuah-tabel').DataTable( {
      "language": {
      "emptyTable": "Tidak ada data"
      },
        orderCellsTop: true,
        fixedHeader: true,
        "dom": '<hr>lfrtBip',
          "scrollX": true,
          buttons: [{extend:'copy',className:'btn btn-outline-info btn-sm'},
                // {extend:'print',className:'btn btn-outline-info btn-sm'},
                {extend:'excel',className:'btn btn-outline-info btn-sm'}],
    } );

    var table = $('#sebuah-tabela').DataTable( {
      "language": {
      "emptyTable": "Kamu belum melakukan Sharing apapun"
      },
        orderCellsTop: true,
        fixedHeader: true,
        "dom": '<hr>lfrtBip',
          "scrollX": true,
          buttons: [{extend:'copy',className:'btn btn-outline-info btn-sm'},
                // {extend:'print',className:'btn btn-outline-info btn-sm'},
                {extend:'excel',className:'btn btn-outline-info btn-sm'}],
    } );
      
      // $('.dataTables_length').addClass('bs-select');
      // $('#sebuah-tabelbtm').DataTable({"scrollX": true,  "order": [[ 3, "asc" ], [0,"asc"]]});
    });
</script>
  <!-- End custom js for this page-->
</body>

</html>