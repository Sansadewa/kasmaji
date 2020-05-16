
<head>
	<title>Daftar Sipaju</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/loginutil.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/login.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action="<?php echo base_url().'register/topik' ?>" method="post" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Aktivasi Step 2 : Update Topik Skripsi
					</span>

					<label for="dosbing">Dosen Pembimbing</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100"  id="dosbing" name="dosbing" value="">
						<span class="focus-input100"></span>
					</div>
					
					<label for="topik">Topik Skripsi</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<textarea class="input100"  name="topik" row="7" style="padding-top:14px;"></textarea>
						<span class="focus-input100"></span>
					</div>
					<?php if ($this->session->userdata('kelas')[1]=='K'): ?>
					<label for="kelompoktema">Kelompok Tema</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100"  name="kelompok_tema" value="">
						<span class="focus-input100"></span>
					</div>

					<label for="platform">Platform</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100"  name="platform" value="">
						<span class="focus-input100"></span>
					</div>

					<?php else: ?>
					<label for="Metode">Metode</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100"  name="metode" value="">
						<span class="focus-input100"></span>
					</div>

					<label for="y">Variabel Y</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100"  name="y" value="">
						<span class="focus-input100"></span>
					</div>

					<label for="lokus">Lokus Penelitian</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100"  name="lokus" value="">
						<span class="focus-input100"></span>
					</div>

					<label for="periode">Periode Sumber Data</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100"  name="periode" value="">
						<span class="focus-input100"></span>
					</div>

					<label for="sumberdata">Sumber Data</label>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100"  name="sumberdata" value="">
						<span class="focus-input100"></span>
					</div>
					<?php endif; ?>
					



					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div>
							<a class="text-danger"><?php
				          $report = $this->session->flashdata('report');
				          if(!empty($report)){
				            echo $report;
				          }
				          ?></a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Selanjutnya
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		(function ($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);
	</script>
</body>
