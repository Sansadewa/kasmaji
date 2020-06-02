  <!-- crop foto -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/croppie.css">

  <div class="row">
  	<div class="col-md-12 grid-margin">
  		<div class="row">
  			<div class="col-12">
  				<div class="card">
  					<div class="card-body">
  						<h4 class="">Ganti Password</h4>
  						<p class="card-description">
  						</p>
  						<?php $report = $this->session->flashdata('result');
              if (!empty($report)) { ?>
  						<div class="alert alert-info">
  							<?php echo $report; ?>
  						</div>
  						<?php } ?>
  						<hr class="mb-0">
  						<div class="row text-right">
  							<hr class="mb-0">
  						</div>
  						<div class="d-flex row mt-1 justify-content-start">
  							<div class="col-lg-11 col-sm-12 col-md-11 ml-lg-4">
  								<form class="forms-sample" action="<?php echo base_url() . 'input/gantipass' ?>" method="post">
  									<br>
  									<div class="row">
  										<div class="form-group col-12">
  											<label for="pass" style="line-height: 5px; font-size: 13px;">Password lama</label>
                                              <input type="password" class="form-control" placeholder="Password Lama" name="passlama" pattern=".{8,}" title="Password minimal 8 karakter" required>
  										</div>
                                      </div>
                                      <div class="row">
  										<div class="form-group col-12">
  											<label for="pass" style="line-height: 5px; font-size: 13px;">Masukkan password baru</label>
                                              <input type="password" class="form-control" placeholder="Password Lama" name="passbaru1" pattern=".{8,}" title="Password minimal 8 karakter" required>
  										</div>
                                      </div>
                                      <div class="row">
  										<div class="form-group col-12">
  											<label for="pass" style="line-height: 5px; font-size: 13px;">Ketik kembali password baru</label>
                                              <input type="password" class="form-control" placeholder="Password Lama" name="passbaru2" pattern=".{8,}" title="Password minimal 8 karakter" required>
  										</div>
                                      </div>
                                      <div class="row">
  										<div class="form-group col-12">
                                              <button class="btn text-white" type="submit">Ganti Password</button>
  										</div>
  									</div>
  						        </form>
  						    </div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>