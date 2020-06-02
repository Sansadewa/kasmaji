<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row ">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="">Pekerjaan Kamu</h4>
						<p class="card-description">
						</p>
						<?php $report=$this->session->flashdata('result');
            			if(!empty($report)){ ?>
						<div class="alert alert-warning">
							<?php echo $report; ?>
						</div>
						<?php } ?>
						<hr class="mb-0">
						<div class="row text-right">
							<hr class="mb-0">
							<div>
								<a class="text-right" data-toggle="modal" data-target="#ModalPekerjaanForm"
									style="color:#259b87;cursor: pointer;">Edit Data Pekerjaan ></a>
							</div>
						</div>
						<div class="row mt-1 justify-content-center">
							<div class="col-lg-12 col-sm-12 col-md-12 ml-lg-4">
								<form class="forms-sample" action="<?php echo base_url().'input/profil' ?>" method="post">
									<?php foreach ($pekerjaan->result() as $row) { ?>
									<br>
									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for="nim" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jenis
												Kegiatan</label>
											<input class="form-control" id="" value="<?php echo $row->jenis; ?>" readonly>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="nama" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Status
												Pekerjaan</label>
											<input class="form-control" id="thmasuk" value="<?php echo strtoupper($row->status);?>" readonly>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="nama" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Nama
												Instansi/Tempat Kerja</label>
											<input class="form-control" id="thkeluar" value="<?php echo strtoupper($row->tempat_kerja);?>"
												readonly>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Bidang
												Pekerjaan</label>
											<input class="form-control" value="<?php echo $row->bidang;?>" readonly>
										</div>
										<div class="form-group col-md-6">
											<label for='date'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jabatan</label>
											<input class="form-control" value="<?php echo $row->jabatan;?>" readonly>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-12">
											<label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Deskripsi
												Pekerjaan</label>
											<textarea class="form-control asn" placeholder="Deskripsi Pekerjaan" row="6"
												Value="" readonly><?php echo $row->deskripsi_kerja;?></textarea>

										</div>
										<hr>
									</div>
                  </form> <?php } //endof foreach?> 
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12  grid-margin">
		<div class="row ">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="">Pekerjaan Teman-Teman</h4>
						<hr>
						<p class="card-description">
						</p>
						<div class="table-responsive sebuah-tabelWrapper">
							<table id="sebuah-tabel" class="table table-striped" style="width:100%" width="100%">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Jenis Kegiatan</th>
										<?php if($this->session->userdata('role')==99){echo"<th>Status Pekerjaan</th>";}?>
										<th>Tempat Kerja</th>
										<th>Bidang Pekerjaan</th>
										<th>Jabatan</th>
										<th>Deskripsi Pekerjaan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tbl_pekerjaan->result() as $row2) { if($row2->username=="ADMIN123465789"){continue;}
                    ?>
									<tr>
										<td><?php echo $row2->nama; ?></td>
										<td><?php echo $row2->jenis; ?></td>
										<?php if($this->session->userdata('role')==99){echo"<td>".$row2->status."</td>";} ?>
										<td><?php echo $row2->tempat_kerja; ?></td>
										<td><?php echo $row2->bidang; ?></td>
										<td><?php echo $row2->jabatan; ?></td>
										<td><?php echo $row2->deskripsi_kerja; ?></td>
									</tr>
									<?php } ?>
								</tbody>
							<tfoot>
							<tr>
										<th>Nama</th>
										<th>Jenis Kegiatan</th>
										<?php if($this->session->userdata('role')==99){echo"<th>Status Pekerjaan</th>";}?>
										<th>Tempat Kerja</th>
										<th>Bidang Pekerjaan</th>
										<th>Jabatan</th>
										<th>Deskripsi Pekerjaan</th>
									</tr>
							</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal HTML Markup -->
<div id="ModalPekerjaanForm" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-xs-center">Edit Data Pekerjaan</h4>
			</div>
			<div class="modal-body">
			<?php if($profile->row()->kegiatan==1 || $profile->row()->kegiatan==3) {?>
				<form action="<?php echo base_url().'input/pekerjaan' ?>" method="post">
					<?php foreach ($pekerjaan->result() as $row) { ?>
					<fieldset id="huha">
						<div class="form-group row" style="margin-bottom:0;">
							<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Jenis Kegiatan</label>
							<div class=" col-sm-9">
								<div class="row" style="margin-bottom:0.3em;">
									<div class="form-radio col-sm-6">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="kegiatan" id="bekerja" value="Bekerja" required
												<?php if($row->jenis=='Bekerja'){echo "checked";} ?>> Bekerja
											<i class="input-helper"></i></label>
									</div>
									<div class="form-radio col-sm-6">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="kegiatan" id="magang" value="Magang"
												<?php if($row->jenis=='Magang'){echo "checked";} ?>> Magang
											<i class="input-helper"></i></label>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<hr>

					<div id="PNS">
						<div class="form-group row" style="margin-bottom:0.3em;">
							<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Status
								Pekerjaan</label>
							<div class=" col-sm-9">
								<div class="row" style="margin-bottom:0.3em;">
									<div class="form-radio col-sm-6">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="status_pekerjaan" id="pemerintahan"
												value="Pemerintahan" required <?php if($row->status=='Pemerintahan'){echo "checked";} ?>>
											Pegawai Pemerintahan
											<i class="input-helper"></i></label>
									</div>
									<div class="form-radio col-sm-6">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="status_pekerjaan" id="swasta" value="Swasta"
												<?php if($row->status=='Swasta'){echo "checked";} ?>> Pegawai Swasta
											<i class="input-helper"></i></label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Instansi/Tempat
								Kerja</label>
							<div class=" col-sm-9">
								<input class="form-control asn" placeholder="Instansi/Tempat Kerja" name="tempat_kerja"
									value="<?php echo $row->tempat_kerja; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Bidang
								Pekerjaan</label>
							<div class=" col-sm-9">
								<select class="form-control asn" name="bidang">

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
                                            if($lala==$row->bidang){
                                                $selected='selected';
                                            } else $selected='';
                                            echo "<option value='".$lala."'".$selected.">".$lala."</option>";
                                        }
                                        ?>


									<option value="Lainnya" <?php if($row->bidang[0]=="("){echo "selected";} ?>>Lainnya</option>
								</select>
							</div>
						</div>
						<div class="form-group row" id="lainnya" <?php if($row->bidang[0]!="("){echo "hidden";} ?>>
							<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Keterangan Bidang
								Pekerjaan</label>
							<div class=" col-sm-9">
								<input class="form-control asn" placeholder="...." name="lainnya"
									value="<?php if($row->bidang[0]=="("){echo "$row->bidang";}?>">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Posisi/Jabatan
								Struktural</label>
							<div class=" col-sm-9">
								<input class="form-control asn" placeholder="Posisi/Jabatan Struktural" name="jabatan"
									value="<?php echo $row->jabatan; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Deskripsi
								Pekerjaan</label>
							<div class=" col-sm-9">
								<textarea class="form-control sdn" placeholder="Deskripsi Pekerjaan" name="deskripsi_pekerjaan"
									row="4"><?php echo $row->deskripsi_kerja; ?></textarea>
							</div>
						</div>
					</div>

					<a class="text-danger"><?php
                            $informasi = $this->session->flashdata('informasi');
                            if(!empty($informasi)){
                            echo $informasi;
                            }
                            ?></a>

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success mr-2 btn-primary">Submit</button>
				</form> <?php } ?>
				<?php } else { echo '<div class="alert-warning">Ubah dulu bagian Kegiatan pada bagian profil untuk mengedit entrian ini.</div>';}?>
			</div> <!--  endofmodalbody -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	<script>
		$(document).ready(function () {


			$('[name="bidang"]').change(function () {
				if (this.value == 'Lainnya') {
					$("#lainnya").attr("hidden", false);
					$('[name="lainnya"]').attr("required", true);
				} else {
					$("#lainnya").attr("hidden", true);
					$('[name="lainnya"]').attr("required", false);

				}
			});


		});

	</script>
</div><!-- /.modal -->
