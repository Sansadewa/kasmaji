
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
            <h2 class="text-center mb-4">Lupa Password : Input KODE</h2>
            <div class="auto-form-wrapper">
              <p>Kode Unik telah dikirmkan ke <b>email kamu </b> untuk keperluan lupa password.</p>
              <form action="<?php echo base_url().'lupa/second' ?>" method="post">
                  <div class="form-group">
                    <input class="form-control" placeholder="Username" name="username" pattern=".{12,15}" title="Username minimal 12 karakter" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="KODE" name="kode" required>
                  </div>
                  <div class="form-group">
                  	<input class="form-control" placeholder="Password Baru" name="Pass" pattern=".{8,}" type="password" title="Terlalu Pendek" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Ketik Ulang Password Baru" name="Pass2"  type="password" required>
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