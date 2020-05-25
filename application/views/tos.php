
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KASMAJI - Terms &amp; Conditions </title>
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
            <h2 class="text-center mb-4">Terms &amp; Conditions </h2>
            <div class="auto-form-wrapper">
            <center>
                  <ul class="left" style="text-align: left; line-height:1.5">
                      <li style="line-height:1.5">
                        Kami mohon kepada teman-teman untuk mengisikan data dengan lengkap, sebisa mungkin hindari penggunaan singkatan-singkatan dalam menyebutkan nama, institusi ataupun lembaga jika memungkinkan demi mempermudah proses klasifikasi data di kemudian hari.
                      </li><br>
                      <li  style="line-height:1.5">
                      Kami mohon untuk mengisikan semua form yang ada. Bilamana pertanyaan tidak bisa terjawab, harap menuliskan tanda “-“ di isian form tersebut.
                      </li><br>
                      <li style="line-height:1.5">
                      Kami mohon untuk mengisi isian form sebenar-benarnya sesuai dengan kondisi dan keadaan riil teman-teman. Hasil rekapitulasi form ini nantinya akan dimasukkan ke dalam database Kasmaji kecuali data-data pribadi yang akan disebutkan dalam poin selanjutnya.
                    </li><br>
                    <li style="line-height:1.5">
                    Data-data yang bersifat sangat pribadi tidak akan dipublikasikan untuk umum dan akan dijamin kerahasiaannya oleh Tim Admin Database Kasmaji 2015. <br><br>
                    Data pribadi yang tidak ditampilkan untuk umum diantaranya: <br>
                    <ol>
                        <li>
                        TANGGAL LAHIR
                        </li>
                        <li>
                        NOMOR HP
                        </li>
                        <li>
                        NOMOR WA
                        </li>
                        <li>
                        ALAMAT RUMAH
                        </li>
                        <li>
                        ALAMAT DOMISILI (KECUALI KOTA/KABUPATEN DAN PROVINSI.
 DATA KOTA/KABUPATEN AKAN DITAMPILKAN)
                        </li>
                    </ol>
                    </li><br>
                    <li style="line-height:1.5">
                    Data pribadi seperti yang disebutkan diatas hanya akan disimpan oleh admin Website Databse Kasmaji 2015. Dalam pemanfaatan data pribadi tersebut  akan digunakan dengan sebaik-baiknya untuk kepentingan bersama dan juga atas persetujuan pengisi data. 
                    </li><br>
                    <li style="line-height:1.5">
                    Keamanan dan kerahasiaan data akan dijamin oleh admin Website Databse Kasmaji 2015. Aduan/pertanyaan/saran terkait kemanan dan kerahasiaan data bisa diajukan kepada admin Website Database Kasmaji 2015 (088290026071).
                    </li><br><br>
              <div class="form-group d-flex align-self-center justify-content-center">
                  <a class="btn text-white d-flex btn-success  btn-lg justify-content-center" href="<?php echo base_url(); ?>register/agreetos">Setuju</a>
                </div>
            </center>
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