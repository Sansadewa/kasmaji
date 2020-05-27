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
		.input-group-text {
			font-size: 0.8rem;
		}

	</style>
</head>

<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
			<div class="content-wrapper mt-5 pt-5 d-flex align-items-center auth register-bg-1 theme-one">
				<div class="row w-100">
					<div class="col-lg-6 mx-auto">
						<h2 class="text-center mb-4">Registrasi 2: Data Dasar </h2>
						<div class="auto-form-wrapper">
							<div class="row w-100">
								<div class="col mx-auto">
									<div class="wrapper w-100">
										<div class="d-flex justify-content-between">
											<h5 class="mb-2">Progress Registrasi</h5>
											<p class="mb-2 text-primary">40%</p>
										</div>
										<div class="progress">
											<div class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
												role="progressbar" style="width: 40%" aria-valuenow="40"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div><br>
							<a class="text-kasmaji" style="color: #259b87;"><i>*: Data tidak dipublikasikan</i></a>
							<form action="<?php echo base_url().'register/procbase' ?>" method="post">
								<h3 style="margin-bottom: 0">Kontak</h3>
								<hr>
								<div class="form-group row">

								</div>
								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Username</label>
									<div class=" col-sm-9">
										<input class="form-control"
											placeholder="<?php echo($this->session->userdata('username')); ?>"
											name="username" required disabled>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Nama</label>
									<div class=" col-sm-9">
										<input class="form-control"
											placeholder="<?php echo($this->session->userdata('nama')); ?>" name="nama"
											required disabled>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Nomor HP*</label>
									<div class=" col-sm-9">

										
											
											<input class="form-control" placeholder="08XXX-XXXX-XXXX" name="nomorhp"
												style="border-right: 1px solid #e5e5e5" required>
										
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Nomor
										WhatsApp*</label>
									<div class=" col-sm-9">
										
											<input class="form-control" placeholder="08XXX-XXXX-XXXX"
												style="border-right: 1px solid #e5e5e5" name="nomorwa" required>
										
									</div>
								</div>
								<br>
								<h3 style="margin-bottom: 0">Sosial Media</h3>
								<hr>
								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Akun
										LinkedIn</label>
									<div class=" col-sm-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">linkedin.com/in/</span>
											</div>
											<input class="form-control" placeholder=""
												style="border-right: 1px solid #e5e5e5" name="linkedin">
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Akun
										Facebook</label>
									<div class=" col-sm-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">facebook.com/</span>
											</div>
											<input class="form-control" placeholder=""
												style="border-right: 1px solid #e5e5e5" name="facebook">
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Akun
										Instagram</label>
									<div class=" col-sm-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">instagram.com/</span>
											</div>
											<input class="form-control" placeholder=""
												style="border-right: 1px solid #e5e5e5" name="ig">
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Akun
										twitter</label>
									<div class=" col-sm-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">twitter.com/</span>
											</div>
											<input class="form-control" placeholder=""
												style="border-right: 1px solid #e5e5e5" name="twitter">
										</div>
									</div>
								</div>

								<br>
								<h3 style="margin-bottom: 0">Alamat Rumah*</h3>
								<hr>
								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Provinsi</label>
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
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Kabupaten /
										Kota</label>
									<div class=" col-sm-9">
										<select class="form-control" id="kabkot" name="kabkot" id="kabkot" required>
											<option>-</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Alamat
										Lengkap</label>
									<div class=" col-sm-9">
										<textarea class="form-control" placeholder="" name="alamat_lengkap" rows="4"
											required></textarea>
									</div>
								</div>

								<br>
								<h3 style="margin-bottom: 0">Alamat Domisili</h3>
								<hr>
								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Provinsi</label>
									<div class=" col-sm-9">
										<select class="form-control" name="prov_dom" id="prov_dom" required>
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
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Kabupaten /
										Kota</label>
									<div class=" col-sm-9">
										<select class="form-control" id="kabkot_dom" name="kabkot_dom" required>
											<option>-</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Alamat
										Lengkap*</label>
									<div class=" col-sm-9">
										<textarea class="form-control" placeholder="" name="alamat_lengkap_dom" rows="4"
											required></textarea>
									</div>
								</div>

								<br>
								<h3 style="margin-bottom: 0">keterangan Kegiatan</h3>
								<hr>

								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Melanjutkan
										Pendidikan Setelah SMA?*</label>
									<div class=" col-sm-9">
										<div class="form-radio">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="lanjut_belajar"
													id="iyalanjut" value="1" required> Ya
												<i class="input-helper"></i></label>
										</div>
										<div class="form-radio">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="lanjut_belajar"
													id="tidaklanjut" value="0">
												Tidak
												<i class="input-helper"></i></label>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-sm-3"
										style="line-height=0;vertical-align: middle">Kegiatan Saat
										Ini*</label>
									<div class=" col-sm-9">
										<div class="form-radio">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="kegiatan"
													id="bekerja" value="1" required>
												Bekerja/Magang
												<i class="input-helper"></i></label>
										</div>
										<div class="form-radio">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="kegiatan" id="usaha"
													value="2"> Memiliki
												Usaha
												<i class="input-helper"></i></label>
										</div>
										<div class="form-radio">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="kegiatan"
													id="keduanya" value="3"> Bekerja/Magang
												&amp; Memiliki
												Usaha
												<i class="input-helper"></i></label>
										</div>
										<div class="form-radio">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="kegiatan"
													id="gakerja" value="4"> Belum
												Bekerja &amp; Tidak Memiliki Usaha
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
								<br>
								<div class="form-group d-flex justify-content-between">
									<a id="back" class="btn ml-0 text-white btn-lg btn-primary">
										< Kembali</a> <button type='submit' class="btn btn-lg mr-0 text-white ">
											Lanjut!</button>
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
	<script>
		window.onpageshow = function (e) {
			$('#prov_dom').trigger("change");
			$('#prov').trigger("change");
		}


		$(document).ready(function () {

			//buat tombol back
			$("#back").click(function () {
				$.ajax({
					url: "<?php echo base_url(); ?>register/back",
					success: function (result) {
						window.history.back();
					}
				});
			});


			var provinsi = $("#prov").val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>register/kabkot",
				data: {
					"prov": provinsi,

				},
				success: function (res) {
					$("#kabkot").html(res);
				}
			});
			var provinsia = $("#prov_dom").val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>register/kabkot",
				data: {
					"prov": provinsia,

				},
				success: function (res) {
					$("#kabkot_dom").html(res);
				}
			});


			$('[name="prov"]').change(function () {

				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>register/kabkot",
					data: {
						"prov": this.value
					},
					success: function (res) {
						$("#kabkot").html(res);
					}
				});
			});

			$('[name="prov_dom"]').change(function () {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>register/kabkot",
					data: {
						"prov": this.value
					},
					success: function (res) {
						$("#kabkot_dom").html(res);
					}
				});
			});

		});

	</script>
	<!-- endinject -->
</body>

</html>
