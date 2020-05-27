
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
          <div class="col-lg-8 mx-auto">
            <h2 class="text-center mb-4">Registrasi 3: Data Pekerjaan </h2>
            <div class="auto-form-wrapper">
            <div class="row w-100">
								<div class="col mx-auto">
									<div class="wrapper w-100">
										<div class="d-flex justify-content-between">
											<h5 class="mb-2">Progress Registrasi</h5>
											<p class="mb-2 text-primary">80%</p>
										</div>
										<div class="progress">
											<div class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
												role="progressbar" style="width: 80%" aria-valuenow="80"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div><br>
              <a class="text-kasmaji" style="color: #259b87;"><i>*: Data tidak dipublikasikan</i></a>

              <form action="<?php echo base_url().'register/prockerja' ?>" method="post">
              <fieldset id="huha">
                <div class="form-group row" style="margin-bottom:0;">
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Jenis Kegiatan*</label>
                        <div class=" col-sm-9">
                            <div class="row" style="margin-bottom:0.3em;">
                                <div class="form-radio col-sm-6">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kegiatan" id="bekerja" value="Bekerja" required> Bekerja
                                    <i class="input-helper"></i></label>
                                </div>
                                <div class="form-radio col-sm-6">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kegiatan" id="magang" value="Magang"> Magang
                                    <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div id="PNS">
                    <div class="form-group row" style="margin-bottom:0.3em;">
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Status Pekerjaan</label>
                        <div class=" col-sm-9">
                            <div class="row" style="margin-bottom:0.3em;">
                                <div class="form-radio col-sm-6">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input asn" name="status_pekerjaan" id="pemerintahan" value="Pemerintahan" required> Pegawai Pemerintahan
                                    <i class="input-helper"></i></label>
                                </div>
                                <div class="form-radio col-sm-6">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input asn" name="status_pekerjaan" id="swasta" value="Swasta"> Pegawai Swasta
                                    <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" >
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Instansi/Tempat Kerja</label>
                        <div class=" col-sm-9">
                        <input class="form-control asn" placeholder="Instansi/Tempat Kerja" name="tempat_kerja" >
                        </div>
                    </div>
                    <div class="form-group row" >
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Bidang Pekerjaan</label>
                        <div class=" col-sm-9">
                        <select class="form-control asn" name="bidang" >
                        <?php 
                                        $buat_select= array(
                                            "Akuntansi/ keuangan",
                                            "Administrasi dan koordinasi",
                                            "Arsitektur dan konstruksi",
                                            "Teknik",
                                            "Olahraga",
                                            "Customer service",
                                            "Pendidikan dan pelatihan",
                                            "Kesehatan",
                                            "Pariwisata",
                                            "Hotel atau restoran",
                                            "Personalia",
                                            "IT dan software",
                                            "Legal",
                                            "Manajemen dan konsultasi",
                                            "Manufaktur dan produksi",
                                            "Media dan kreatif (visual designer, UI/UX researcher, UI/UX designer)",
                                            "Pelayanan publik",
                                            "Safety dan security",
                                            "Sales dan marketing",
                                            "Ilmu pengetahuan (pekerjaan di lab, data analyst, data scientist, peneliti)
                                            Supply chain",
                                            "Writing dan content (digital content writer, digital journalist, social media officer,
                                            communication specialist, copywriter, dll)",
                                            "Perikanan",
                                            "Pertanian/perkebunan",
                                            "PNS",
                                            "Perdagangan",
                                            "Jasa"
                                        );
                                        foreach($buat_select as $lala){
                                            echo "<option value='".$lala."'>".$lala."</option>";
                                        }
                                        ?>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row" id="lainnya" hidden>
                    <label class="col-form-label col-sm-3 text-danger" style="line-height=0;vertical-align: middle">Jika memilih lainnya, sebutkan</label>
                        <div class=" col-sm-9">
                        <input class="form-control asn" placeholder="...." name="lainnya" >
                        </div>
                    </div>

                    <div class="form-group row" >
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Posisi/Jabatan Struktural</label>
                        <div class=" col-sm-9">
                        <input class="form-control asn" placeholder="Posisi/Jabatan Struktural" name="jabatan" >
                        </div>
                    </div>
                    <div class="form-group row" >
                    <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Deskripsi Pekerjaan</label>
                        <div class=" col-sm-9">
                        <textarea class="form-control sdn" placeholder="Deskripsi Pekerjaan" name="deskripsi_pekerjaan" row="6"></textarea>
                        </div>
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
      $(document).ready(function () {
                //buat tombol back
			$("#back").click(function(){
				$.ajax({url: "<?php echo base_url(); ?>register/back", success: function(result){
					window.history.back();
				}});
            });

        //Untuk pengguna tombol back
      var guli = $('[name="bidang"]').val();
      if (guli == 'Lainnya'){
                $("#lainnya").attr("hidden", false);
                $('[name="lainnya"]').attr("required", true);
            } else {
                $("#lainnya").attr("hidden", true);
                $('[name="lainnya"]').attr("required", false);

            }

      $('[name="bidang"]').change(function(){
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