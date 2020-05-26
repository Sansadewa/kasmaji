
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
  <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      //Trigger Seachbox
      $('#searchbutton').click(function(){
        $('#searchbox').animate({
                width: "toggle"
        });
        $('#searchbox').focus();
      });

      
// Setup - add a text input to each footer cell
$('#sebuah-tabel tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" style="border:none; border-bottom: 2px solid #259b87" placeholder="Search  '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#sebuah-tabel').DataTable({
      "dom": '<hr>lfrtBip',
          // "scrollX": true,

          buttons: [
            <?php if($this->session->userdata('role')==99){?>
                {extend:'copy',className:'btn btn-outline-info btn-sm'},
                // {extend:'print',className:'btn btn-outline-info btn-sm'},
                {extend:'excel',className:'btn btn-outline-info btn-sm'}
                <?php }?>

              ],
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
    $('#sebuah-tabel tfoot tr').appendTo('#sebuah-tabel thead');

    // Setup - add a text input to each footer cell
$('#sebuah-tabela tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" style="border:none; border-bottom: 2px solid #259b87" placeholder="Search  '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#sebuah-tabela').DataTable({
      "dom": '<hr>lfrtBip',
          // "scrollX": true,

          buttons: [
            <?php if($this->session->userdata('role')==99){?>
                {extend:'copy',className:'btn btn-outline-info btn-sm'},
                // {extend:'print',className:'btn btn-outline-info btn-sm'},
                {extend:'excel',className:'btn btn-outline-info btn-sm'}
                <?php }?>

              ],
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
    $('#sebuah-tabela tfoot tr').appendTo('#sebuah-tabela thead');

    });
</script>
  <!-- End custom js for this page-->
</body>

</html>