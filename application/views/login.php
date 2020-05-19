<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Kasmaji</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php base_url();?>public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php base_url();?>public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php base_url();?>public/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php base_url();?>public/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php base_url();?>public/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4 text-white">Login Kasmaji</h2>
            <div class="auto-form-wrapper">
              <form action="<?php echo base_url().'login/identify' ?>" method="post">
                <div class="form-group">
                  <label class="label">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" pattern=".{13,15}" title="Username berisikan XXX karakter" required>
                </div>

                <div class="form-group">
                  <label class="label">Password</label>

                    <input type="password" class="form-control" placeholder="*********" name="pass" required>
                </div>
                <a class="text-danger" <?php
                  $informasi = $this->session->flashdata('informasi');
                  if(!empty($informasi)){
                    echo ">".$informasi."\r\n";
                  } else {
                    echo "hidden>";
                  }
                  ?><br></a>
                <div class="form-group">
                  <button class="btn submit-btn btn-block text-white">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                </div>
                
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Lupa password?</span>
                  <a href="<?php echo base_url();?>lupa" class="text-black text-small">klik disini!</a>
                </div>
                
              </form>
            </div>
            <p class="footer-text text-center">copyright © 2020 GSA. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php base_url();?>public/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php base_url();?>public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php base_url();?>public/js/off-canvas.js"></script>
  <script src="<?php base_url();?>public/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>