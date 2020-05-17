<!DOCTYPE html>
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
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Registrasi 1 : Data Login <h2>
            <div class="auto-form-wrapper">
              <form action="<?php echo base_url().'register/procpass' ?>" method="post">
              <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Nama</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="<?php echo($this->session->userdata('nama')); ?>" name="username" value="" reqiured disabled>
                    </div>
              </div>
              <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" reqiured>
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" name="pa" pattern=".{8,}" title="Password minimal 8 karakter" reqiured>
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password"name="pb" pattern=".{8,}" title="Password minimal 8 karakter" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                      </span>
                    </div>
                  </div>
                </div><a class="text-danger"><?php
                  $informasi = $this->session->flashdata('informasi');
                  if(!empty($informasi)){
                    echo $informasi;
                  }
                  ?></a>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Lanjut gan!</button>
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