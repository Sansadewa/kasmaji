<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="">Pendidikan Kamu</h4>
						<p class="card-description">
						</p>
						<?php $report=$this->session->flashdata('result');
            if(!empty($report)){ ?>
						<div class="alert alert-success">
							<?php echo $report; ?>
						</div>
						<?php } ?>
						<hr class="mb-0">
						<div class="row text-right">
							<hr class="mb-0">
							<div>
								<a class="text-right" data-toggle="modal" data-target="#ModalPendidikanForm"
									style="color:#259b87;cursor: pointer;">Edit Data Pendidikan ></a>
							</div>
						</div>
						<div class="row mt-1 justify-content-center">
							<div class="col-lg-12 col-sm-12 col-md-12 ml-lg-4">
								<form class="forms-sample" action="<?php echo base_url().'input/pendidikan' ?>" method="post">
									<?php foreach ($pendidikan->result() as $row) { ?>
									<br>
									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for="nim" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Pendidikan yg
												sedang/telah selesai ditempuh setelah lulus SMA</label>
											<input class="form-control" id="" value="<?php echo $row->sedang_or_selesai; ?>" readonly>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="nama" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Tahun
												Masuk</label>
											<input class="form-control" id="thmasuk" value="<?php echo strtoupper($row->th_masuk);?>"
												readonly>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="nama" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Tahun
												Keluar</label>
											<input class="form-control" id="thkeluar" value="<?php echo strtoupper($row->th_keluar);?>"
												readonly>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-4 col-sm-12">
											<label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Instansi
												Pendidikan</label>
											<input class="form-control" value="<?php echo $row->instansi;?>" readonly>
										</div>
										<div class="form-group col-md-4">
											<label for='date'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jurusan</label>
											<input class="form-control" value="<?php echo $row->jurusan;?>" readonly>
										</div>
										<div class="form-group col-md-4">
											<label for='date'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Sedang menempuh jenjang pendidikan profesi</label>
											<input class="form-control" value="<?php echo $row->didikprofesi;?>" readonly>
										</div>
									</div>
									
									<?php if($row->didikprofesi=='Ya'){?>
									<div class="row">
									<div class="form-group col-md-12 col-sm-12">
											<label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Rencana setelah mendapat surat tanda registrasi profesi.</label>
											<textarea class="form-control asn" placeholder="Rencana
												Setelah Mendapatkan Surat Izin Praktek" row="12" style="height: 100"
												Value="" readonly><?php echo $row->rencana;?></textarea>

										</div>
									</div>
									<?php } ?>

									
									<div class="row">
									<div class="form-group col-md-6 col-sm-12">
									<label for='pascasarjana'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Sedang menempuh jenjang pendidikan pascasarjana (S2)?</label>
											<input class="form-control" value="<?php echo ($row->pascasarjana=='0'? "Tidak":($row->pascasarjana=='1'?"Ya":" "));?>" readonly>
									</div>
										<div class="form-group col-md-6 col-sm-12">
											<label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Instansi Pendidikan Pascasarjana
												(S2)</label>
											<input class="form-control asn" placeholder="Instansi (S2/Profesi)"
												Value="<?php echo $row->instansi_lanjut;?>" name="instansi_lanjut" readonly>
										</div>

										
										<hr>
									</div>
									<div class="row">
									<div class="form-group col-md-6 col-sm-12">
											<label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jurusan Pendidikan Pascasarjana
												(S2)</label>
											<input class="form-control asn" placeholder="Jurusan (S2/Profesi)"
												Value="<?php echo $row->jurusan_lanjut;?>" name="jurusan_lanjut" readonly>

										</div>
										<div class="form-group col-md-6 col-sm-12">
											<label for='email'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Beasiswa</label>
											<input class="form-control asn" placeholder="Jurusan (S2/Profesi)"
												Value="<?php echo $row->beasiswa;?>" name="jurusan_lanjut" readonly>

										</div>
									</div>
								</form> <?php } ?>

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
						<h4 class="">Pendidikan Teman-Teman</h4>
						<hr>
						<p class="card-description">
						</p>
						<div class="table-responsive sebuah-tabelWrapper">
							<table id="sebuah-tabel" class="table table-striped" cellspacing="0" style="width:100%"
								width="100%">
								<thead>
									<tr>
										<th>Nama</th>
										<?php if($this->session->userdata('role')==99){echo"<th>Pendidikan Setelah SMA</th>";}?>
										<?php if($this->session->userdata('role')==99){echo"<th>Tahun Masuk</th>";}?>
										<?php if($this->session->userdata('role')==99){echo"<th>Tahun Keluar</th>";}?>
										<th>Instansi Pendidikan</th>
										<th>Jurusan</th>
										<th>Sedang menempuh jenjang pendidikan profesi</th>
										<th>Rencana	Setelah Mendapatkan Surat Izin Praktek</th>
										<?php if($this->session->userdata('role')==99){echo"<th>Sedang studi pascasarjana (S2/Profesi)?</th>";}?>
										<th>Instansi S2/Profesi</th>
										<th>Jurusan S2/Profesi</th>
										<th>Program Beasiswa</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tbl_pendidikan->result() as $row2) { ?>
									<tr>
										<td><?php echo $row2->nama; ?></td>
										<?php if($this->session->userdata('role')==99){echo"<td>".$row2->sedang_or_selesai."</td>";}?>
										<?php if($this->session->userdata('role')==99){echo"<td>".$row2->th_masuk."</td>";} ?>
										<?php if($this->session->userdata('role')==99){echo"<td>".$row2->th_keluar."</td>";} ?>
										<td><?php echo $row2->instansi; ?></td>
										<td><?php echo $row2->jurusan; ?></td>
										<td><?php echo $row2->didikprofesi; ?></td>
										<td><?php echo wordwrap($row2->rencana, 40, "\n <br>", true); ?></td>
										<?php if($this->session->userdata('role')==99){echo"<td>".($row2->pascasarjana=='0'? "Tidak":($row2->pascasarjana=='1'?"Ya":" "))."</td>";} ?>
										<td><?php echo $row2->instansi_lanjut; ?></td>
										<td><?php echo $row2->jurusan_lanjut; ?></td>
										<td><?php echo $row2->beasiswa; ?></td>
									</tr>
									<?php } ?>
								</tbody>
								<tfoot><tr>
										<th>Nama</th>
										<?php if($this->session->userdata('role')==99){echo"<th>Pendidikan Setelah SMA</th>";}?>
										<?php if($this->session->userdata('role')==99){echo"<th>Tahun Masuk</th>";}?>
										<?php if($this->session->userdata('role')==99){echo"<th>Tahun Keluar</th>";}?>
										<th>Instansi Pendidikan</th>
										<th>Jurusan</th>
										<th>Sedang menempuh jenjang pendidikan profesi</th>
										<th>Rencana	Setelah Mendapatkan Surat Izin Praktek</th>
										<?php if($this->session->userdata('role')==99){echo"<th>Lanjut S2</th>";}?>
										<th>Instansi S2/Profesi</th>
										<th>Jurusan S2/Profesi</th>
										<th>Program Beasiswa</th>
									</tr></tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal HTML Markup -->
<div id="ModalPendidikanForm" class="modal fade" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-xs-center">Edit Data Pendidikan</h4>
			</div>
			<div class="modal-body"> <?php if($profile->row()->lanjut_belajar==1) {?>
				<form action="<?php echo base_url().'input/pendidikan' ?>" method="post">
					<?php foreach ($pendidikan->result() as $row) { ?>
					<div class="form-group row" style="margin-bottom:0;">
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Pendidikan yg
							sedang/telah selesai ditempuh setelah lulus SMA</label>
						<div class=" col-sm-9">
							<div class="row" style="margin-bottom:0.3em;">
								<div class="form-radio col-sm-3">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="pendidikan" id="d1" value="D1" required
											<?php if($row->sedang_or_selesai=='D1'){echo "checked";} ?>> D1
										<i class="input-helper"></i></label>
								</div>
								<div class="form-radio col-sm-3">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="pendidikan" id="d2" value="D2"
											<?php if($row->sedang_or_selesai=='D2'){echo "checked";} ?>> D2
										<i class="input-helper"></i></label>
								</div>
								<div class="form-radio col-sm-3">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="pendidikan" id="d3" value="D3"
											<?php if($row->sedang_or_selesai=='D3'){echo "checked";} ?>> D3
										<i class="input-helper"></i></label>
								</div>
								<div class="form-radio col-sm-3">
									<label class="form-check-label">
										<input type="radio" class="form-check-input" name="pendidikan" id="d4" value="D4/S1"
											<?php if($row->sedang_or_selesai=='D4/S1'){echo "checked";} ?>> D4/S1
										<i class="input-helper"></i></label>
								</div>
							</div>
							<div class="row">
								<div class="form-group  col-md-6">
									<label for="tahun_masuk" style="margin-bottom:0.5em;">Tahun Masuk</label>
									<input class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" id="tahun_masuk"
										value="<?php echo $row->th_masuk; ?>" reqiured>
								</div>

								<div class="form-group  col-md-6">
									<label for="tahun_keluar" style="margin-bottom:0.5em;">Tahun Keluar</label>
									<input class="form-control" placeholder="Tahun Keluar" name="tahun_keluar"
										value="<?php echo $row->th_keluar; ?>" reqiured>
								</div>
								<hr>
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Instansi
							Pendidikan</label>
						<div class=" col-sm-9">
							<input class="form-control" placeholder="Instansi Pendidikan" name="instansi"
								value="<?php echo $row->instansi; ?>" reqiured>
						</div>
					</div>
					<div class="form-group row" style="margin-bottom:0;">
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Jurusan</label>
						<div class=" col-sm-9">
							<input class="form-control" placeholder="Jurusan" name="jurusan" value="<?php echo $row->jurusan; ?>"
								reqiured>
						</div>
					</div>

					<hr>
					<fieldset id="didikprofesi">
                <div class="form-group row" style="margin-bottom:0.36em;" id="huha">
                  <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Sedang menempuh jenjang pendidikan profesi(Koas, Akuntan, Notaris, Apoteker, dll)?</label>
                  <div class=" col-sm-9">
                  <div class="row">
                     
                      <div class="form-radio col-6">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="didikprofesi" value="Tidak" <?php if($row->didikprofesi=='Tidak'){echo "checked";} ?>> Tidak
                        <i class="input-helper"></i></label>
                      </div>
                      <div class="form-radio col-sm-6">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="didikprofesi" value="Ya" required <?php if($row->didikprofesi=='Ya'){echo "checked";} ?>> Ya
                        <i class="input-helper"></i></label>
                      </div>
                    </div>
                    </div>
                </div>
                </fieldset>
                <div id="PNSwasta" <?php if($row->didikprofesi=='Ya'){echo "";}else{echo "hidden";} ?>>
                  <div class="form-group row" >
                      <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Rencana setelah mendapat surat tanda registrasi profesi.(Untuk koas, setelah internship dan mendapat surat ijin praktik)<br><br>(Tuliskan selengkap mungkin bagaimana anda ingin orang lain mendapatkan informasi tentang  rencana karir anda di dunia medis)</label>
                          <div class=" col-sm-9">
                          <textarea class="form-control ass" placeholder="Contoh: Spesialis, Profesi, S2, dll" row="12" name="rencana" minlength="100" style="height: 100%"><?php echo $row->rencana; ?></textarea>
                          </div>
                  </div>
                  <div class="row">
                      <p class="col-md-3 col-sm-12">Contoh Jawaban:</p>
                                          <p class="col-md-9 col-sm-12">"Rencana mengambil studi lanjut setingkat S2-S3 dengan peminatan medical education, jika ada kesempatan selanjutnya, mengambil spesialis anak sub kardiologi & vaskuler. Kemudian menjadi salah satu staff pengajar di universitas. 
  <br>Rencana ingin membuat gerakan sosial mencegah anak gizi kurang di kalangan penduduk di daerah 3T."</p>
                  </div>
                </div>
					<hr>
					
					<fieldset id="huha">
						<div class="form-group row" style="margin-bottom:0.36em;" id="huha">
							<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Sedang menempuh jenjang pendidikan pascasarjana (S2)?</label>

							<div class=" col-sm-9">
								<div class="row">
									<div class="form-radio col-sm-6">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="pascasarjana" id="yes" value="1" required
												<?php if($row->pascasarjana==1){echo "checked";} ?>> Ya
											<i class="input-helper"></i></label>
									</div>
									<div class="form-radio col-6">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="pascasarjana" id="no" value="0"
												<?php if($row->pascasarjana==0){echo "checked";} ?>> Tidak
											<i class="input-helper"></i></label>
									</div>
								</div>
							</div>
						</div>
					</fieldset>

					<div class="form-group row" id="instansi_lanjut_div" <?php if($row->pascasarjana==0){echo "hidden";} ?>>
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Instansi Pendidikan Pascasarjana
							(S2)</label>
						<div class=" col-sm-9">
							<input class="form-control asn" placeholder="Instansi (S2/Profesi)"
								value="<?php echo $row->instansi_lanjut; ?>" name="instansi_lanjut">
						</div>
					</div>

					<div class="form-group row" id="jurusan_lanjut_div" <?php if($row->pascasarjana==0){echo "hidden";} ?>>
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Jurusan Pendidikan Pascasarjana
							(S2)</label>
						<div class=" col-sm-9">
							<input class="form-control asn" placeholder="Jurusan (S2/Profesi)"
								value="<?php echo $row->jurusan_lanjut; ?>" name="jurusan_lanjut">
						</div>
					</div>

					<hr>
					<div class="form-group row">
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Program Beasiswa</label>
						<div class=" col-sm-9">
							<input class="form-control asn" placeholder="Program Beasiswa" value="<?php echo $row->beasiswa; ?>"
								name="beasiswa">
						</div>
					</div>
					<hr>
					<a class="text-danger"><?php
                            $informasi = $this->session->flashdata('informasi');
                            if(!empty($informasi)){
                            echo $informasi;
                            }
                            ?></a>

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success mr-2 btn-primary">Submit</button>
				</form> <?php }?>
						<?php } else { echo '<div class="alert-warning">Ubah dulu bagian Melanjutkan Pendidikan pada bagian profil untuk mengedit entrian ini.</div>';}?>
			</div> <!--  endofmodalbody -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	<script>
		$(document).ready(function () {

			$('#huha input[type="radio"]').change(function () {

				if (this.value == '1') {
					$("#instansi_lanjut_div").attr("hidden", false);
					$(".asn").attr("required", true);

					$("#jurusan_lanjut_div").attr("hidden", false);
				} else if (this.value == '0') {
					$("#instansi_lanjut_div").attr("hidden", true);
					$(".asn").attr("required", false);
					$("#jurusan_lanjut_div").attr("hidden", true);
				}
			});
			$('#didikprofesi input[type="radio"]').change(function() {
        if (this.value == 'Ya') {
          $(".ass").attr("required",true);
          $("#PNSwasta").attr("hidden",false);
        }
        else if (this.value == 'Tidak') {
          $(".ass").attr("required",false);
          $("#PNSwasta").attr("hidden",true);
        }
        });

		});

	</script>
</div><!-- /.modal -->
