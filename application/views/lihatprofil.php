<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body"> <?php $orangnya=$person->row();?>
						<h3 class="mb-0">Profil <?php  echo $orangnya->nama;?></h3>
						<?php $report = $this->session->flashdata('result');
                            if (!empty($report)) { ?>
						<div class="alert alert-success">
							<?php echo $report; ?>
						</div>
						<?php } ?>
						<hr class="my-0 mb-4">
						<div class="d-flex row mt-1 justify-content-center">
							<div class=" col-lg-2 col-md-2 col-sm-12 col-xs-12 mt-md-1 mt-lg-1 justify-content-center">
								<img class="mx-auto d-flex justify-content-center img-fluid rounded-circle"
									src="<?php echo base_url() . "lihatfoto/".$username; ?>"
									style="border: 3px solid #259b87; padding: 3px;" alt="Profile image">
							</div>
							<div class="col-lg-9 col-sm-12 col-md-9 ml-lg-4">
								<form class="forms-sample" action="<?php echo base_url() . 'input/profil' ?>"
									method="post">

									<br>
									<div class="row">
										<div class="form-group col-md-6">
											<label for="nim"
												style="line-height: 5px; margin-bottom:0; font-size: 13px;">Username</label>
											<input class="form-control-plaintext" id="nim"
												value="<?php echo $username ?>" readonly>
										</div>
										<div class="form-group col-md-6">
											<label for="nama"
												style="line-height: 5px; margin-bottom:0; font-size: 13px;">Nama
												Lengkap</label>
											<input class="form-control-plaintext" id="nama"
												value="<?php echo strtoupper($orangnya->nama) ?>" readonly>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label for='email' style="line-height: 5px; margin-bottom:0;">Email</label>
											<input type="text" class="form-control-plaintext"
												value="<?php echo $orangnya->email; ?>" readonly>
										</div>
										<?php if($this->session->userdata('role')==99){?>
										<div class="form-group col-md-6">
											<label for='date' style="line-height: 5px; margin-bottom:0;">Tanggal
												Lahir</label>
											<input type="date" class="form-control-plaintext"
												value="<?php echo $orangnya->tgl_lahir; ?>" readonly>
										</div>
										<?php }?>
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
<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row ">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<h3 class="col-12" style="margin-bottom: 0"> Profil Detil </h3>
						</div>
						<hr class="my-0">

						<div class="row mt-3">
							<div class="col-12">
								<form>
									<?php if($this->session->userdata('role')==99){?>
									<h4 style="margin-bottom: 1rem">Kontak</h4>
									<div class="form-group row ">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Nomor
											HP</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->nomor_hp; ?>"
												readonly>
										</div>
									</div>

									<div class="form-group row ">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Nomor
											WhatsApp</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->nomor_wa; ?>"
												readonly>
										</div>
									</div>
									<?php }?>
									<br>
									<h4 style="margin-bottom: 1rem">Sosial Media</h4>

									<div class="form-group row ">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Akun
											LinkedIn</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->linkedin; ?>"
												readonly>
										</div>
									</div>

									<div class="form-group row ">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Akun
											Facebook</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->facebook; ?>"
												readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Akun
											Instagram</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->ig; ?>" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Akun
											twitter</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->twitter; ?>"
												readonly>
										</div>
									</div>
									<br>
									<?php if($this->session->userdata('role')==99){?>
									<h4 style="margin-bottom: 1rem">Alamat Rumah</h4>
									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Provinsi</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->prov; ?>" readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Kabupaten /
											Kota</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->kabkot; ?>"
												readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Alamat
											Lengkap</label>
										<div class=" col-sm-9">
											<textarea class="form-control" value="" rows="4"
												readonly><?php echo $orangnya->alamat_lengkap; ?></textarea>
										</div>
									</div>
									<?php }?>
									<br>
									<h4 style="margin-bottom: 1rem">Alamat Domisili</h4>
									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Provinsi</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->prov_dom; ?>"
												readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Kabupaten /
											Kota</label>
										<div class=" col-sm-9">
											<input class="form-control" value="<?php echo $orangnya->kabkot_dom; ?>"
												readonly>
										</div>
									</div>
									<?php if($this->session->userdata('role')==99){?>
									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Alamat
											Lengkap</label>
										<div class=" col-sm-9">
											<textarea class="form-control" value="" rows="4"
												readonly><?php echo $orangnya->alamat_lengkap_dom; ?></textarea>
										</div>
									</div>

									<br>
									<h4 style="margin-bottom: 1rem">Kegiatan</h4>
									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Melanjutkan
											Pendidikan Setelah SMA?</label>
										<div class=" col-sm-9">
											<input class="form-control" value='<?php  if($orangnya->lanjut_belajar == 1) { echo 'Ya\'';} else {echo'\' hidden';} ?> readonly>
											<input class="form-control" value=' <?php  if($orangnya->lanjut_belajar == 0) { echo 'Tidak\'';} else {echo'\' hidden';} ?>
												readonly>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3"
											style="line-height=0;vertical-align: middle">Kegiatan Saat
											Ini</label>
										<div class=" col-sm-9">
											<input class="form-control" value='<?php  if($orangnya->kegiatan == 1) { echo 'Bekerja/Magang/Koas\'';} else {echo'\' hidden';} ?> readonly>
											<input class="form-control" value=' <?php  if($orangnya->kegiatan == 2) { echo 'Memiliki Usaha\'';} else {echo'\' hidden';} ?>
												readonly>
											<input class="form-control" value='<?php  if($orangnya->kegiatan == 3) { echo 'Keduanya\'';} else {echo'\' hidden';} ?> readonly>
											<input class="form-control" value=' <?php  if($orangnya->kegiatan == 4) { echo 'Belum Bekerja &amp; Tidak Memiliki Usaha\'';} else {echo'\' hidden';} ?>
												readonly>
										</div>
									</div>
									<?php }?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row ">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<h3 class="col-12" style="margin-bottom: 0"> Pendidikan </h3>
						</div>
						<hr class="my-0">

						<div class="row mt-1 justify-content-center">
							<div class="col-lg-12 col-sm-12 col-md-12 ml-lg-4">
								<form class="forms-sample">

									<br>
									<?php if($this->session->userdata('role')==99){?>

									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for="nim"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Pendidikan
												yg
												sedang/telah selesai ditempuh setelah lulus SMA</label>
											<input class="form-control" id=""
												value="<?php echo $orangnya->sedang_or_selesai; ?>" readonly>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="nama"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Tahun
												Masuk</label>
											<input class="form-control" id="thmasuk"
												value="<?php echo strtoupper($orangnya->th_masuk);?>" readonly>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="nama"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Tahun
												Keluar</label>
											<input class="form-control" id="thkeluar"
												value="<?php echo strtoupper($orangnya->th_keluar);?>" readonly>
										</div>
									</div>
									<?php }?>
									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Instansi
												Pendidikan</label>
											<input class="form-control" value="<?php echo $orangnya->instansi;?>"
												readonly>
										</div>
										<div class="form-group col-md-6">
											<label for='date'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jurusan</label>
											<input class="form-control" value="<?php echo $orangnya->jurusan;?>"
												readonly>
										</div>
									</div>
									<?php if($this->session->userdata('role')==99){?>
									<div class="form-group row">
									<div class="col-12">
									<label for='pascasarjana' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Lanjut S2?</label>
											<input class="form-control" value="<?php echo ($orangnya->pascasarjana=='0'? "Tidak":($orangnya->pascasarjana=='1'?"Ya":" "));?>" readonly>
									</div>
									</div>
									<?php }?>
									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Instansi
												S2</label>
											<input class="form-control asn" placeholder="Instansi (S2/Profesi)"
												Value="<?php echo $orangnya->instansi_lanjut;?>" name="instansi_lanjut"
												readonly>

										</div>

										<div class="form-group col-md-6 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jurusan
												S2</label>
											<input class="form-control asn" placeholder="Jurusan (S2/Profesi)"
												Value="<?php echo $orangnya->jurusan_lanjut;?>" name="jurusan_lanjut"
												readonly>

										</div>
										<hr>
									</div>
									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Beasiswa</label>
											<input class="form-control asn" placeholder="Jurusan (S2/Profesi)"
												Value="<?php echo $orangnya->beasiswa;?>" name="jurusan_lanjut"
												readonly>

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

<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row ">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<h3 class="col-12" style="margin-bottom: 0"> Pekerjaan </h3>
						</div>
						<hr class="my-0">

						<div class="row mt-1 justify-content-center">
							<div class="col-lg-12 col-sm-12 col-md-12 ml-lg-4">
								<form class="forms-sample">
									<br>
									<div class="row">
										<div class="form-group <?php ($this->session->userdata('role')==99? "col-md-6" : "col-md-12")?> col-sm-12">
											<label for="nim"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jenis
												Kegiatan</label>
											<input class="form-control" id="" value="<?php echo $orangnya->jenis; ?>"
												readonly>
										</div>
										<?php if($orangnya->jenis!='koas'){?>
										<?php if($this->session->userdata('role')==99){?>
										<div class="form-group col-md-6 col-sm-12">
											<label for="nama"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Status
												Pekerjaan</label>
											<input class="form-control" id="thmasuk"
												value="<?php echo strtoupper($orangnya->status);?>" readonly>
										</div>
										<?php }?>
									</div>

									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for="nama"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Nama
												Instansi/Tempat Kerja</label>
											<input class="form-control" id="thkeluar"
												value="<?php echo strtoupper($orangnya->tempat_kerja);?>" readonly>
										</div>
										<div class="form-group col-md-6 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Bidang
												Pekerjaan</label>
											<input class="form-control" value="<?php echo $orangnya->bidang;?>"
												readonly>
										</div>
										
									</div>
									<div class="row">
									<div class="form-group col-md-6">
											<label for='date'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jabatan</label>
											<input class="form-control" value="<?php echo $orangnya->jabatan;?>"
												readonly>
										</div>
										<div class="form-group col-md-6 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Deskripsi
												Pekerjaan</label>
											<input class="form-control asn" placeholder="Deskripsi Pekerjaan"
												Value="<?php echo $orangnya->deskripsi_kerja;?>" readonly>

										</div>
										<?php } else { ?>
										<div class="form-group col-md-12 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Rencana
												Setelah Mendapatkan Surat Izin Praktek</label>
											<textarea class="form-control asn" placeholder="" row="12"
												Value="" readonly><?php echo $orangnya->rencana;?></textarea>
										<?php } ?>
										</div>
										<hr>
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


<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row ">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<h3 class="col-12" style="margin-bottom: 0"> Usaha </h3>
						</div>
						<hr class="my-0">

						<div class="row mt-1 justify-content-center">
							<div class="col-lg-12 col-sm-12 col-md-12 ml-lg-4">
								<form>
									<br>
									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for="nim"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Nama
												Usaha</label>
											<input class="form-control" id="" placeholder="-"
												value="<?php echo $orangnya->nama_usaha; ?>" readonly>
										</div>
										<div class="form-group col-md-6 col-sm-12">
											<label for="nama"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Bidang
												Usaha</label>
											<input class="form-control" id="thmasuk" placeholder="-"
												value="<?php echo strtoupper($orangnya->bidang_usaha);?>" readonly>
										</div>
									</div>
									
									<div class="row">
									<div class="form-group col-md-12 col-sm-12">
											<label for="nama"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Alamat
												Usaha</label>
											<textarea class="form-control" id="thkeluar" placeholder="-"
												value="" readonly><?php echo $orangnya->alamat_usaha;?></textarea>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-12 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Deskripsi
												Usaha</label>
											<textarea class="form-control asn" placeholder="-"
												Value="" readonly><?php echo $orangnya->deskripsi_usaha;?></textarea>
										</div>
										<hr>
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
