
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lupa Akun</title>
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
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Lupa Password : Password Baru</h2>
            <div class="auto-form-wrapper">
              <p>Masukkan password baru kamu. <b>Jangan dilupain dong, sakit tau dilupain tuh.</b></p>
              <form action="<?php echo base_url().'lupa/second' ?>" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <input class="form-control" placeholder="Pass" name="Pass" pattern=".{8,}" title="Pendek Amat." reqiured>
                    <input class="form-control" placeholder="Ketik lagi" name="Pass2" reqiured>
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div>
                <a class="text-danger"><?php
                  $report = $this->session->flashdata('report');
                  if(!empty($report)){
                    echo $report;
                  }
                  ?></a>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Kirim!</button>
                </div>
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
  <!-- endinject -->
</body>

</html>