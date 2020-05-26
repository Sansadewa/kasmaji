
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
            <h2 class="text-center mb-4">Registrasi 2: Data Pendidikan </h2>
            <div class="auto-form-wrapper">
            <a class="text-kasmaji" style="color: #259b87;"><i>*: Data tidak dipublikasikan</i></a>

              <form action="<?php echo base_url().'register/procpend' ?>" method="post">

              <div class="form-group row" style="margin-bottom:0;">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Pendidikan yg sedang/telah selesai ditempuh setelah lulus SMA*</label>
                    <div class=" col-sm-9">
                        <div class="row" style="margin-bottom:0.3em;">
                            <div class="form-radio col-sm-3">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pendidikan" id="d1" value="D1" required> D1
                                <i class="input-helper"></i></label>
                            </div>
                            <div class="form-radio col-sm-3">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pendidikan" id="d2" value="D2"> D2
                                <i class="input-helper"></i></label>
                            </div>
                            <div class="form-radio col-sm-3">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pendidikan" id="d3" value="D3"> D3
                                <i class="input-helper"></i></label>
                            </div>
                            <div class="form-radio col-sm-3">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pendidikan" id="d4" value="D4"> D4/S1
                                <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <label for="tahun_masuk" style="margin-bottom:0.5em;">Tahun Masuk</label>
                                <input class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" id="tahun_masuk" reqiured>
                            </div>

                            <div class="form-group  col-md-6">
                                <label for="tahun_keluar" style="margin-bottom:0.5em;">Tahun Keluar</label>
                                <input class="form-control" placeholder="Tahun Keluar" name="tahun_keluar" reqiured>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row" >
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Instansi Pendidikan</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="Instansi Pendidikan" name="instansi" reqiured>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom:0;">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Jurusan</label>
                    <div class=" col-sm-9">
                      <input class="form-control" placeholder="Jurusan" name="jurusan" reqiured>
                    </div>
                </div>
                <hr>
                <fieldset id="huha">
                <div class="form-group row" style="margin-bottom:0.36em;" id="huha">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Sedang studi pascasarjana (S2/Profesi)?*</label>
                  <div class=" col-sm-9">
                  <div class="row">
                      <div class="form-radio col-sm-6">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="pascasarjana" id="yes" value="1" required> Ya
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-radio col-6">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="pascasarjana" id="no" value="0" > Tidak
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                    </div>
                </div>
                </fieldset>
                
                <div class="form-group row" id="instansi_lanjut_div" hidden>
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Instansi Pendidikan (S2/Profesi)</label>
                    <div class=" col-sm-9">
                      <input class="form-control asn" placeholder="Instansi (S2/Profesi)" Value="" name="instansi_lanjut">
                    </div>
                </div>

                <div class="form-group row" id="jurusan_lanjut_div" hidden>
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Jurusan (S2/Profesi)</label>
                    <div class=" col-sm-9">
                      <input class="form-control asn" placeholder="Jurusan (S2/Profesi)" Value="" name="jurusan_lanjut">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Program Beasiswa</label>
                    <div class=" col-sm-9">
                      <input class="form-control asn" placeholder="Program Beasiswa" Value="" name="beasiswa">
                    </div>
                </div>
                <hr>
                <a class="text-danger"><?php
                  $informasi = $this->session->flashdata('informasi');
                  if(!empty($informasi)){
                    echo $informasi;
                  }
                  ?></a>
                <center>
                <br>
                <div class="form-group d-flex justify-content-between">
                <a id="back" class="btn ml-0 text-white btn-lg btn-primary">< Kembali</a>
                  <button type='submit' class="btn btn-lg mr-0 text-white ">Lanjut!</button>
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

      window.addEventListener('pageshow', function(event) {
      var gulu = $('#huha input[type="radio"]').val();
      if (gulu == '1') {
          $("#instansi_lanjut_div").attr("hidden",false);
          $(".asn").attr("required",true);

          $("#jurusan_lanjut_div").attr("hidden",false);
      }
      else if (gulu == '0') {
          $("#instansi_lanjut_div").attr("hidden",true);
          $(".asn").attr("required",false);
          $("#jurusan_lanjut_div").attr("hidden",true);
      }
      });
      $(document).ready(function () {

        //buat tombol back
			$("#back").click(function(){
				$.ajax({url: "<?php echo base_url(); ?>register/back", success: function(result){
					window.history.back();
				}});
			});

      

      $('#huha input[type="radio"]').change(function() {

            if (this.value == '1') {
                $("#instansi_lanjut_div").attr("hidden",false);
                $(".asn").attr("required",true);

                $("#jurusan_lanjut_div").attr("hidden",false);
            }
            else if (this.value == '0') {
                $("#instansi_lanjut_div").attr("hidden",true);
                $(".asn").attr("required",false);
                $("#jurusan_lanjut_div").attr("hidden",true);
            }
      });
    });

  </script>
  <!-- endinject -->
</body>

</html>