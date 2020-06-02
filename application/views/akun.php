  <!-- crop foto -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/croppie.css">

  <div class="row">
  	<div class="col-md-12 grid-margin">
  		<div class="row">
  			<div class="col-12">
  				<div class="card">
  					<div class="card-body">
  						<h4 class="">Profil Kamu</h4>
  						<p class="card-description">
  						</p>
  						<?php $report = $this->session->flashdata('result');
              if (!empty($report)) { ?>
  						<div class="alert alert-warning">
  							<?php echo $report; ?>
  						</div>
  						<?php } ?>
  						<hr class="mb-0">
  						<div class="row text-right">
  							<hr class="mb-0">
  							<div>
  								<a class="text-right" data-toggle="modal" data-target="#ModalLoginForm"
  									style="color:#259b87;cursor: pointer;">Edit Data Dasar ></a>
  							</div>
  						</div>
  						<div class="d-flex row mt-1 justify-content-center">
  							<div class=" col-lg-2 col-md-2 col-sm-12 col-xs-12 mt-md-1 mt-lg-1 justify-content-center">
  								<img class="mx-auto d-flex justify-content-center img-fluid rounded-circle"
  									src="<?php echo base_url() . "lihatfoto/" . $this->session->userdata('username'); ?>" style="border: 3px solid #259b87;
              padding: 3px;" alt="Profile image">
  								<div class="d-flex justify-content-center"><button id="buttonupload" class="btn text-white col-8 mt-2"
  										data-toggle="modal" data-target="#ModalFotoForm" style="border-radius:20px" hidden><i class="menu-icon mdi mdi-panorama"></i> Ganti</button></div>
  							</div>
  							<div class="col-lg-9 col-sm-12 col-md-9 ml-lg-4">
  								<form class="forms-sample" action="<?php echo base_url() . 'input/profil' ?>" method="post">
  									<?php foreach ($profile->result() as $row) { ?>
  									<br>
  									<div class="row">
  										<div class="form-group col-md-6">
  											<label for="nim" style="line-height: 5px; margin-bottom:0; font-size: 13px;">Username</label>
  											<input class="form-control-plaintext" id="nim"
  												value="<?php echo $this->session->userdata('username') ?>" readonly>
  										</div>
  										<div class="form-group col-md-6">
  											<label for="nama" style="line-height: 5px; margin-bottom:0; font-size: 13px;">Nama
  												Lengkap</label>
  											<input class="form-control-plaintext" id="nama"
  												value="<?php echo strtoupper($this->session->userdata('nama')) ?>" readonly>
  										</div>
  									</div>

  									<div class="row">
  										<div class="form-group col-md-6">
  											<label for='email' style="line-height: 5px; margin-bottom:0;">Email</label>
  											<input type="text" class="form-control-plaintext"
  												value="<?php echo $this->session->userdata('email'); ?>" readonly>
  										</div>
  										<div class="form-group col-md-6">
  											<label for='date' style="line-height: 5px; margin-bottom:0;">Tanggal Lahir</label>
  											<input type="date" class="form-control-plaintext"
  												value="<?php echo $this->session->userdata('tgl_lahir'); ?>" readonly>
  										</div>
  									</div>
  							</div>
  						</div>
  						</form> <?php } ?>
  						<br><br>
  						<div class="row">
  							<h3 class="col-12" style="margin-bottom: 0"> Profil </h3>
  						</div>
  						<hr class="mb-0">
  						<div class="row text-right">
  							<hr class="mb-0">
  							<div>
  								<a class="text-right" data-toggle="modal" data-target="#ModalProfilForm"
  									style="color:#259b87;cursor: pointer;">Edit Data Profil ></a>
  							</div>
  						</div>
  						<div class="row mt-3">
  							<div class="col-12">
  								<form> <?php foreach ($profile->result() as $row) { ?>
  									<h4 style="margin-bottom: 1rem">Kontak</h4>

  									<div class="form-group row ">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Nomor
  											HP</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->nomor_hp; ?>" readonly>
  										</div>
  									</div>

  									<div class="form-group row ">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Nomor
  											WhatsApp</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->nomor_wa; ?>" readonly>
  										</div>
  									</div>

  									<br>
  									<h4 style="margin-bottom: 1rem">Sosial Media</h4>

  									<div class="form-group row ">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun
  											LinkedIn</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->linkedin; ?>" readonly>
  										</div>
  									</div>

  									<div class="form-group row ">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun
  											Facebook</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->facebook; ?>" readonly>
  										</div>
  									</div>

  									<div class="form-group row">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun
  											Instagram</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->ig; ?>" readonly>
  										</div>
  									</div>

  									<div class="form-group row">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun
  											twitter</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->twitter; ?>" readonly>
  										</div>
  									</div>
  									<br>
  									<h4 style="margin-bottom: 1rem">Alamat Rumah</h4>
  									<div class="form-group row">
  										<label class="col-form-label col-sm-3"
  											style="line-height=0;vertical-align: middle">Provinsi</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->prov; ?>" readonly>
  										</div>
  									</div>

  									<div class="form-group row">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Kabupaten /
  											Kota</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->kabkot; ?>" readonly>
  										</div>
  									</div>

  									<div class="form-group row">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Alamat
  											Lengkap</label>
  										<div class=" col-sm-9">
  											<textarea class="form-control" value="" rows="4"
  												readonly><?php echo $row->alamat_lengkap; ?></textarea>
  										</div>
  									</div>

  									<br>
  									<h4 style="margin-bottom: 1rem">Alamat Domisili</h4>
  									<div class="form-group row">
  										<label class="col-form-label col-sm-3"
  											style="line-height=0;vertical-align: middle">Provinsi</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->prov_dom; ?>" readonly>
  										</div>
  									</div>

  									<div class="form-group row">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Kabupaten /
  											Kota</label>
  										<div class=" col-sm-9">
  											<input class="form-control" value="<?php echo $row->kabkot_dom; ?>" readonly>
  										</div>
  									</div>

  									<div class="form-group row">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Alamat
  											Lengkap</label>
  										<div class=" col-sm-9">
  											<textarea class="form-control" value="" rows="4"
  												readonly><?php echo $row->alamat_lengkap_dom; ?></textarea>
  										</div>
  									</div>
  									<br>
  									<h4 style="margin-bottom: 1rem">Kegiatan</h4>
  									<div class="form-group row">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Melanjutkan
  											Pendidikan Setelah SMA?</label>
  										<div class=" col-sm-9">
  											<div <?php if ($row->lanjut_belajar != 1) {
                                echo "hidden";
                              } ?>>
  												Ya
  											</div>
  											<div <?php if ($row->lanjut_belajar != 0) {
                                echo "hidden";
                              } ?>>

  												Tidak

  											</div>
  										</div>
  									</div>

  									<div class="form-group row">
  										<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Kegiatan Saat
  											Ini</label>
  										<div class=" col-sm-9">
  											<div <?php if ($row->kegiatan != 1) {
                                echo "hidden";
                              } ?>>

  												Bekerja/Magang

  											</div>
  											<div <?php if ($row->kegiatan != 2) {
                                echo "hidden";
                              } ?>>

  												Memiliki Usaha

  											</div>
  											<div <?php if ($row->kegiatan != 3) {
                                echo "hidden";
                              } ?>>

  												Keduanya

  											</div>
  											<div <?php if ($row->kegiatan != 4) {
                                echo "hidden";
                              } ?>>

  												Belum Bekerja &amp; Tidak Memiliki Usaha

  											</div>
  										</div>
  									</div>
  								</form> <?php } ?>
  							</div>
  						</div>

  						<!-- Modal HTML Markup -->
  						<div id="ModalFotoForm" class="modal fade" role="dialog">
  							<div class="modal-dialog">
  								<div class="modal-content">
  									<div class="modal-header">
  										<h4 class="modal-title text-xs-center">Potong Foto</h4>
  									</div>
  									<div class="modal-body">
  										<form id="form" class="forms-sample" action="<?php echo base_url() . 'input/fotoprofil' ?>"
  											method="post">
  											<div class="col-5 text-center mt-xl-2  d-flex justify-content-center mx-auto">
  												<label for="fotonya" id="buttoncrop" class="font-weight-medium btn text-white btn-block"
  													style="border-radius:4rem; padding:0.5rem" hidden><i class="menu-icon mdi mdi-panorama"></i>Pilih</label>
  												<input id="fotonya" type="file" name="fotonya" accept="image/*" hidden>
  											</div>
  											<div id="crop-container" hidden="true"></div>
  											<input type="hidden" id="imagebase64" name="imagebase64">
  											<div class="row  d-flex justify-content-center mx-auto" class="sendbutton">
  												<button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
  												&nbsp;&nbsp;&nbsp;
  												<button type="button" id="kirim" class="btn btn-success mr-2 btn-primary sendbutton"
  													hidden="true">Submit</button>
  											</div>
  										</form>
  									</div> <!--  endofmodalbody -->
  								</div><!-- /.modal-content -->
  							</div><!-- /.modal-dialog -->
  						</div><!-- /.modal -->


  						<!-- Modal HTML Markup -->
  						<div id="ModalLoginForm" class="modal fade" role="dialog">
  							<div class="modal-dialog">
  								<div class="modal-content">
  									<div class="modal-header">
  										<h4 class="modal-title text-xs-center">Edit Data Dasar</h4>
  									</div>
  									<div class="modal-body">
  										<form class="forms-sample" action="<?php echo base_url() . 'input/profilbase' ?>" method="post">
  											<div class="form-group">
  												<label for="nim" style="line-height: 10px; font-size: 13px;">Username</label>
  												<input class="form-control" id="username"
  													value="<?php echo $this->session->userdata('username') ?>" disabled>
  											</div>
  											<div class="form-group">
  												<label for="nama" style="line-height: 10px; font-size: 13px;">Nama Lengkap</label>
  												<input class="form-control" id="nama" name="nama"
  													value="<?php echo strtoupper($this->session->userdata('nama')) ?>">
  											</div>
  											<div class="form-group">
  												<label for="nama" style="line-height: 10px; font-size: 13px;">Email</label>
  												<input class="form-control" id="email" name="email"
  													value="<?php echo $this->session->userdata('email'); ?>" required>
  											</div>
  											<div class="form-group">
  												<label for="date">Tanggal Lahir <i>(Format menyesuaikan)</i></label>
  												<input type='date' id="date" name="tgl_lahir" class="form-control"
  													value="<?php echo $this->session->userdata('tgl_lahir'); ?>" />
  											</div>

  											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  											<button type="submit" class="btn btn-success mr-2 btn-primary">Submit</button>
  										</form>
  									</div> <!--  endofmodalbody -->
  								</div><!-- /.modal-content -->
  							</div><!-- /.modal-dialog -->
  						</div><!-- /.modal -->

  						<!-- Modal HTML Markup -->
  						<div id="ModalProfilForm" class="modal fade" role="dialog">
  							<div class="modal-dialog">
  								<div class="modal-content">
  									<div class="modal-header">
  										<h4 class="modal-title text-xs-center">Edit Data Profil</h4>
  									</div>
  									<div class="modal-body">
  										<form class="forms-sample" action="<?php echo base_url() . 'input/profil' ?>" method="post">
  											<?php foreach ($profile->result() as $row) { ?>
  											<div class="form-group">
  												<label for="nim" style="line-height: 10px; font-size: 13px;">Username</label>
  												<input class="form-control" id="username"
  													value="<?php echo $this->session->userdata('username') ?>" disabled>
  											</div>
  											<div class="form-group">
  												<label for="nama" style="line-height: 10px; font-size: 13px;">Nama Lengkap</label>
  												<input class="form-control" id="nama"
  													value="<?php echo strtoupper($this->session->userdata('nama')) ?>">
											  </div>
											  <br>
  											<h3 style="margin-bottom: 0">Kontak</h3>
												<hr>
  											<div class="form-group">
  												<label for="nama" style="line-height: 10px; font-size: 13px;">Nomor HP</label>
  												<input class="form-control" name="nomor_hp" id="nomor_hp"
  													value="<?php echo $row->nomor_hp; ?>" required>
  											</div>
  											<div class="form-group">
  												<label for="date">Nomor Whatsapp</label>
  												<input name="nomor_wa" class="form-control" value="<?php echo $row->nomor_wa; ?>" />
											  </div>
											  <br>
  											<h3 style="margin-bottom: 0">Media Sosial</h3>
												<hr>
											  
  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun
  													LinkedIn</label>
  												<div class=" col-sm-9">
  													<input class="form-control" placeholder="" name="linkedin"
  														value="<?php echo $row->linkedin; ?>">
  												</div>
  											</div>

  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun
  													Facebook</label>
  												<div class=" col-sm-9">
  													<input class="form-control" placeholder="" name="facebook"
  														value="<?php echo $row->facebook; ?>">
  												</div>
  											</div>

  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun
  													Instagram</label>
  												<div class=" col-sm-9">
  													<input class="form-control" placeholder="" name="ig" value="<?php echo $row->ig; ?>">
  												</div>
  											</div>

  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Akun
  													twitter</label>
  												<div class=" col-sm-9">
  													<input class="form-control" placeholder="" name="twitter"
  														value="<?php echo $row->twitter; ?>">
  												</div>
  											</div>
											  <br>
  											<h3 style="margin-bottom: 0">Alamat Rumah</h3>

  											<hr>
  											<div class="form-group row">
  												<label class="col-form-label col-sm-3"
  													style="line-height=0;vertical-align: middle">Provinsi</label>
  												<div class=" col-sm-9">
  													<select class="form-control" name="prov" id="prov" required>
  														<?php
                                $buat_select = array(
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
                                  "PAPUA",
                                );
                                foreach ($buat_select as $lala) {
                                  if ($lala == $row->prov) {
                                    $selected = 'selected';
                                  } else $selected = '';
                                  echo "<option value='" . $lala . "'" . $selected . ">" . $lala . "</option>";
                                }

                                $kabkot = $row->kabkot;
                              ?>
  													</select>
  												</div>
  											</div>

  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Kabupaten
  													/ Kota</label>
  												<div class=" col-sm-9">
  													<select class="form-control" name="kabkot" id="kabkot" required>
  														<option>-</option>
  														<!-- SELECTED BELOM DIBIKIN -->
  													</select>
  												</div>
  											</div>

  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Alamat
  													Lengkap</label>
  												<div class=" col-sm-9">
  													<textarea class="form-control" placeholder="" name="alamat_lengkap" rows="4"
  														required><?php echo $row->alamat_lengkap; ?></textarea>
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
                                $buat_select = array(
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
                                  "PAPUA",
                                );
                                foreach ($buat_select as $lala) {
                                  if ($lala == $row->prov_dom) {
                                    $selected = 'selected';
                                  } else $selected = '';
                                  echo "<option value='" . $lala . "'" . $selected . ">" . $lala . "</option>";
                                }
                                $kabkota = $row->kabkot_dom;
                              ?>
  													</select>
  												</div>
  											</div>
  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Kabupaten
  													/ Kota</label>
  												<div class=" col-sm-9">
  													<select class="form-control" id="kabkot_dom" name="kabkot_dom" required>
  														<option>-</option>
  													</select>
  												</div>
  											</div>
  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Alamat
  													Lengkap</label>
  												<div class=" col-sm-9">
  													<textarea class="form-control" placeholder="" name="alamat_lengkap_dom" rows="4"
  														required><?php echo $row->alamat_lengkap_dom; ?></textarea>
  												</div>
  											</div>

											  <br>
  											<h3 style="margin-bottom: 0">Kegiatan</h3>
												<hr>
  											
  											<div class="form-group row">
  												<label class="col-form-label col-sm-3"
  													style="line-height=0;vertical-align: middle">Melanjutkan Pendidikan Setelah SMA?</label>
  												<div class=" col-sm-9">
  													<div class="form-radio">
  														<label class="form-check-label">
  															<input type="radio" class="form-check-input" name="lanjut_belajar" id="iyalanjut"
  																value="1" required <?php if ($row->lanjut_belajar == 1) echo "checked"; ?>> Ya
  															<i class="input-helper"></i></label>
  													</div>
  													<div class="form-radio">
  														<label class="form-check-label">
  															<input type="radio" class="form-check-input" name="lanjut_belajar" id="tidaklanjut"
  																value="0" <?php if ($row->lanjut_belajar == 0) echo "checked"; ?>> Tidak
  															<i class="input-helper"></i></label>
  													</div>
  												</div>
  											</div>
											  
  											<div class="form-group row">
  												<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Kegiatan
  													Saat Ini</label>
  												<div class=" col-sm-9">
  													<div class="form-radio">
  														<label class="form-check-label">
  															<input type="radio" class="form-check-input" name="kegiatan" id="bekerja" value="1"
  																required <?php if ($row->kegiatan == 1) echo "checked"; ?>> Bekerja/Magang
  															<i class="input-helper"></i></label>
  													</div>
  													<div class="form-radio">
  														<label class="form-check-label">
  															<input type="radio" class="form-check-input" name="kegiatan" id="usaha" value="2"
  																<?php if ($row->kegiatan == 2) echo "checked"; ?>> Memiliki Usaha
  															<i class="input-helper"></i></label>
  													</div>
  													<div class="form-radio">
  														<label class="form-check-label">
  															<input type="radio" class="form-check-input" name="kegiatan" id="keduanya" value="3"
  																<?php if ($row->kegiatan == 3) echo "checked"; ?>>Bekerja &amp; Memiliki
  															Usaha
  															<i class="input-helper"></i></label>
  													</div>
  													<div class="form-radio">
  														<label class="form-check-label">
  															<input type="radio" class="form-check-input" name="kegiatan" id="gakerja" value="4"
  																<?php if ($row->kegiatan == 4) echo "checked"; ?>> Belum Bekerja &amp; Tidak Memiliki
  															Usaha
  															<i class="input-helper"></i></label>
  													</div>
  												</div>
  											</div>
  											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  											<button type="submit" class="btn btn-success mr-2 btn-primary">Submit</button>
  										</form> <?php } ?>
  									</div> <!--  endofmodalbody -->
  								</div><!-- /.modal-content -->
  							</div><!-- /.modal-dialog -->
  						</div><!-- /.modal -->

  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

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

  		var huha = $('.forms-sample').width();
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




  		// Buat awal, gapake on changed
  		var provinsi = $("#prov").val();
  		$.ajax({
  			type: "POST",
  			url: "<?php echo base_url(); ?>akun/kabkot",
  			data: {
  				"prov": provinsi,
  				"sess_kab": '<?php echo $kabkot; ?>'
  			},
  			success: function (res) {
  				$("#kabkot").html(res);
  			}
  		});
  		var provinsia = $("#prov_dom").val();
  		$.ajax({
  			type: "POST",
  			url: "<?php echo base_url(); ?>akun/kabkot",
  			data: {
  				"prov": provinsia,
  				"sess_kab": '<?php echo $kabkota; ?>'
  			},
  			success: function (res) {
  				$("#kabkot_dom").html(res);
  			}
  		});


  		$('[name="prov"]').change(function () {

  			$.ajax({
  				type: "POST",
  				url: "<?php echo base_url(); ?>akun/kabkot",
  				data: {
  					"prov": this.value,
  					"sess_kab": '<?php echo $kabkot; ?>'
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
