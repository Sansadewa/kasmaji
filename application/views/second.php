
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
            <h2 class="text-center mb-4">Registrasi 2: Data Dasar </h2>
            <div class="auto-form-wrapper">
              <form action="<?php echo base_url().'register/procbase' ?>" method="post">
                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Username</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="<?php echo($this->session->userdata('username')); ?>" name="username" reqiured disabled>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Nama</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="<?php echo($this->session->userdata('nama')); ?>" name="nama" reqiured disabled>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Nomor HP</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="+62 XXXX-XXXX-XXXX" name="nomorhp" reqiured>
                    </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Nomor WhatsApp</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="+62 XXXX-XXXX-XXXX" name="nomorwa"  reqiured>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun LinkedIn</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="" name="linkedin" >
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun Facebook</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="" name="facebook" >
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun Instagram</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="" name="ig" >
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun twitter</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="" name="twitter">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Provinsi</label>
                    <div class=" col-sm-9">
                      <select class="form-control" name="prov" id="prov" required>
                      <?php 
                        $buat_select= array(
                          "ACEH",
                          "SUMATERA UTARA",
                          "SUMATERA BARAT",
                          "RIAU",
                          "JAMBI",
                          "SUMATERA SELATAN",
                          "BENGKULU",
                          "LAMPUNG",
                          "KEPULAUAN BANGKA BELITUNG",
                          "KEPULAUAN RIAU",
                          "DKI JAKARTA",
                          "JAWA BARAT",
                          "JAWA TENGAH",
                          "DI YOGYAKARTA",
                          "JAWA TIMUR",
                          "BANTEN",
                          "BALI",
                         "NUSA TENGGARA BARAT",
                          "NUSA TENGGARA TIMUR",
                          "KALIMANTAN BARAT",
                          "KALIMANTAN TENGAH",
                          "KALIMANTAN SELATAN",
                          "KALIMANTAN TIMUR",
                          "KALIMANTAN UTARA",
                          "SULAWESI UTARA",
                          "SULAWESI TENGAH",
                          "SULAWESI SELATAN",
                          "SULAWESI TENGGARA",
                          'GORONTALO',
                          "SULAWESI BARAT",
                          "MALUKU",
                          "MALUKU UTARA",
                          "PAPUA BARAT",
                          "PAPUA" ,
                        );
                        foreach($buat_select as $lala){
                            $selected='';
                            echo "<option value='".$lala."'".$selected.">".$lala."</option>";
                        }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Kabupaten / Kota</label>
                    <div class=" col-sm-9">
                      <select class="form-control" id="kabkot" name="kabkot" id="kabkot" required>
                        <option>-</option>
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Alamat Lengkap</label>
                    <div class=" col-sm-9">
                      <textarea class="form-control" placeholder="" name="alamat_lengkap" rows="4" required></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Melanjutkan Pendidikan Setelah SMA?</label>
                    <div class=" col-sm-9">
                    <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="lanjut_belajar" id="iyalanjut" value="1" required> Ya
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="lanjut_belajar" id="tidaklanjut" value="0"> Tidak
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Kegiatan Saat Ini</label>
                    <div class=" col-sm-9">
                    <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="kegiatan" id="bekerja" value="1" required> Bekerja/Magang/Koas
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="kegiatan" id="usaha" value="2"> Memiliki Usaha
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="kegiatan" id="keduanya" value="3"> Keduanya
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="kegiatan" id="gakerja" value="4"> Belum Bekerja &amp; Tidak Memiliki Usaha 
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                </div>

                <a class="text-danger"><?php
                  $informasi = $this->session->flashdata('informasi');
                  if(!empty($informasi)){
                    echo $informasi;
                  }
                  ?></a>
                <div class="form-group">
                  <button class="btn text-white submit-btn btn-block">Next!</button>
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