<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Upload Foto Profil</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?php echo base_url();?>public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/vendors/css/vendor.bundle.addons.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/croppie.css">
    
	<!-- endinject -->
	<style> .auth.theme-one .auto-form-wrapper{
		background: #ffffff;
    padding: 10px 10px 10px;
    border-radius: 4px;
    box-shadow: 0 -25px 37.7px 11.3px rgba(6, 173, 103, 0.07);}
	.content-wrapper{padding: 1rem 1.1rem;}
	</style>
	<link rel="shortcut icon" href="<?php echo base_url();?>public/images/favicon.png" />
</head>

<body>
	<div class="container-scroller">
		<div class="page-body-wrapper full-page-wrapper auth-page">
			<div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
				<div class="row w-100">
					<div class="col-lg-6 col-md-8 col-sm-12 mx-auto p-sm-0" style="padding:5px">
						<h2 class="text-center mb-4">Upload Foto Profil</h2>
						<div class="auto-form-wrapper">
						<div class="row w-100">
								<div class="col mx-auto">
									<div class="wrapper w-100">
										<div class="d-flex justify-content-between">
											<h5 class="mb-2">Progress Registrasi</h5>
											<p class="mb-2 text-primary">95%</p>
										</div>
										<div class="progress">
											<div class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
												role="progressbar" style="width: 95%" aria-valuenow="95"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div><br>
							<center>
								<form id="form" class="forms-sample"
									action="<?php echo base_url() . 'register/fotoprofil' ?>" method="post">
									<div class="col-5 text-center mt-xl-2  d-flex justify-content-center mx-auto">
										<label for="fotonya" id="buttoncrop"
											class="font-weight-medium btn text-white btn-block"
											style="border-radius:4rem; padding:0.5rem" hidden>Pilih<i class="menu-icon mdi mdi-panorama"></i></label>
										<input id="fotonya" type="file" name="fotonya" accept="image/*" hidden>
									</div>
									<div id="crop-container" style="max-height: 500px" hidden="true"></div>
									<input type="hidden" id="imagebase64" name="imagebase64">
									<div class="row  d-flex justify-content-center mx-auto" class="sendbutton">
										
										<button type="button" id="kirim"
											class="btn btn-success mr-2 btn-primary sendbutton"
											hidden="true">Submit</button>
									</div>
								</form>
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
  <script src="<?php echo base_url(); ?>/public/js/croppie.min.js"></script>
    
	<script>
		$(document).ready(function () {
            //JS Crop foto
            var $uploadCrop;
            $('#buttonupload').attr("hidden", false);
            $('#buttoncrop').attr("hidden", false);

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        });
                        $('#crop-container').addClass('ready');
                        $('#kirim').attr("hidden", false);

                        $('#crop-container').attr("hidden", false);

                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            var huha = $('.auto-form-wrapper').width();
			if (huha>320){
				huha=320;
			} else {huha=huha}
			$parentWidth = $(".getWidth").css("width", $(".getWidth").parent().width());
            $uploadCrop = $('#crop-container').croppie({
                viewport: {
                    width: huha,
                    height: huha,
                    type: 'circle'
                },
                mouseWheelZoom: 'ctrl',
                boundary: {
                    width: $parentWidth,
                    height: 450
                }
            });

            $('#fotonya').on('change', function () {
                readFile(this);
            });
            $('#kirim').on('click', function (ev) {
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport',
                    quality: 1
                }).then(function (resp) {
                    $('#imagebase64').val(resp);
                    $('#form').submit();
                });
            });
		});

	</script>
	<!-- endinject -->
</body>

</html>
