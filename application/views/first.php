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
  <style>
  label {
    vertical-align: middle !important
  }
    </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper mt-5 pt-5 d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
            <h2 class="text-center mb-4">Registrasi 1 : Data Login <h2>
            <div class="auto-form-wrapper">
            <div class="row w-100">
								<div class="col mx-auto">
									<div class="wrapper w-100">
										<div class="d-flex justify-content-between">
											<h5 class="mb-2">Progress Registrasi</h5>
											<p class="mb-2 text-primary">20%</p>
										</div>
										<div class="progress">
											<div class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
												role="progressbar" style="width: 20%" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div><br>
              <form action="<?php echo base_url().'register/procpass' ?>" method="post">
              <div class="form-group">
                    <label for="nama" style="margin-bottom:0">Nama</label>
                    <input class="form-control" value="<?php echo($this->session->userdata('nama')); ?>" name="nama" id="nama" style="margin-top:0" required disabled>
              </div>

                <div class="form-group">
                  <label for="email" style="margin-bottom:0">Email</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Lahir <i>(Format menyesuaikan)</i></label>
                    <input type='date' id="date" name="tgl_lahir" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="pa" style="margin-bottom:0">Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="pa" pattern=".{8,}" title="Password minimal 8 karakter" required>
                </div>
                <div class="form-group">
                  <label for="pb" style="margin-bottom:0">Re-type Password</label>
                  
                  <input type="password" class="form-control" placeholder="Confirm Password"name="pb" pattern=".{8,}" title="Password minimal 8 karakter" required>
                </div><a class="text-danger"><?php
                  $informasi = $this->session->flashdata('informasi');
                  if(!empty($informasi)){
                    echo $informasi;
                  }
                  ?></a>
                <div class="form-group">
                  <button class="btn submit-btn text-white btn-block">Lanjut Lur!</button>
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