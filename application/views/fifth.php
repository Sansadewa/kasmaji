
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registrasi Akun</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>public/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-6 mx-auto">
            <h2 class="text-center mb-4">Registrasi 4: Data Usaha </h2>
            <div class="auto-form-wrapper">
              <form action="<?php echo base_url().'register/procusaha' ?>" method="post">

              <div class="form-group row" >
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Nama Usaha</label>
                    <div class=" col-sm-9">
                        <input class="form-control ass" placeholder="Contoh: CV. Putra Perkasa" name="nama_usaha">
                    </div>
                </div>

                <div class="form-group row" >
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Bidang Usaha</label>
                    <div class=" col-sm-9">
                        <select class="form-control asn" name="bidang_usaha" >
                            <option value="">HHH</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row" id="lainnya" hidden>
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Keterangan Bidang Usaha</label>
                    <div class=" col-sm-9">
                        <input class="form-control asn" placeholder="...." name="lainnya" >
                    </div>
                </div>

                <div class="form-group row" >
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Alamat Usaha</label>
                    <div class=" col-sm-9">
                        <textarea class="form-control ass" placeholder="Jalan/Kota/Provinsi" row="4" name="alamat_usaha"></textarea>
                    </div>
                </div>

                <div class="form-group row" >
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Deskripsi Usaha</label>
                    <div class=" col-sm-9">
                        <textarea class="form-control ass" placeholder="Bekerja Pada Bidang .." row="4" name="deskripsi_usaha"></textarea>
                    </div>
                </div>

                <br>
                <a class="text-danger"><?php
                  $informasi = $this->session->flashdata('informasi');
                  if(!empty($informasi)){
                    echo $informasi;
                  }
                  ?></a>
                <center>
                <div class="form-group center">
                  <button class="btn text-white submit-btn btn-block">Next!</button>
                </div>
                </center>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>public/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>public/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>public/js/misc.js"></script>
  <script>
      $(document).ready(function () {
      $('[name="bidang_usaha"]').change(function(){
            if (this.value == 'Lainnya'){
                $("#lainnya").attr("hidden", false);
                $('[name="lainnya"]').attr("required", true);
            } else {
                $("#lainnya").attr("hidden", true);
                $('[name="lainnya"]').attr("required", false);

            }
      });
    });
</script>
  <!-- endinject -->
</body>

</html>