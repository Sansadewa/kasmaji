<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row ">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="">Usaha Kamu</h4>
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
								<a class="text-right" data-toggle="modal" data-target="#ModalUsahaForm"
									style="color:#259b87;cursor: pointer;">Edit Data Usaha ></a>
							</div>
						</div>
						<div class="row mt-1 justify-content-center">
							<div class="col-lg-12 col-sm-12 col-md-12 ml-lg-4">
								<form class="forms-sample" action="<?php echo base_url().'input/profil' ?>" method="post">
									<?php foreach ($usaha->result() as $row) { ?>
									<br>
									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for="nim" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Nama
												Usaha</label>
											<input class="form-control" id="" value="<?php echo $row->nama_usaha; ?>" readonly>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="nama" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Bidang
												Usaha</label>
											<input class="form-control" id="thmasuk" value="<?php echo strtoupper($row->bidang_usaha);?>"
												readonly>
										</div>
										<div class="form-group col-md-3 col-sm-12">
											<label for="nama" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Alamat
												Usaha</label>
											<input class="form-control" id="thkeluar" value="<?php echo strtoupper($row->alamat_usaha);?>"
												readonly>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12 col-sm-12">
											<label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Deskripsi
												Usaha</label>
											<input class="form-control asn" placeholder="Instansi (S2/Profesi)"
												Value="<?php echo $row->deskripsi_usaha;?>" readonly>

										</div>
										<hr>
									</div>

							</div>
						</div>
						</form> <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row">
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
										<th>Nama Usaha</th>
										<th>Bidang Usaha</th>
										<th>Alamat Usaha</th>
										<th>Deskripsi Usaha</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tbl_usaha->result() as $row2) { if($row2->username=="ADMIN123465789"){continue;}
                    ?>
									<tr>
										<td><?php echo $row2->nama; ?></td>
										<td><?php echo $row2->nama_usaha; ?></td>
										<td><?php echo $row2->bidang_usaha; ?></td>
										<td><?php echo $row2->alamat_usaha; ?></td>
										<td><?php echo $row2->deskripsi_usaha; ?></td>
									</tr>
									<?php } ?>
								</tbody>
<tfoot><tr>
										<th>Nama</th>
										<th>Nama Usaha</th>
										<th>Bidang Usaha</th>
										<th>Alamat Usaha</th>
										<th>Deskripsi Usaha</th>
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
<div id="ModalUsahaForm" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-xs-center">Edit Data Usaha</h4>
			</div>
			<div class="modal-body">
			<?php if($profile->row()->kegiatan==2 || $profile->row()->kegiatan==3) {?>

				<form action="<?php echo base_url().'input/usaha' ?>" method="post">
					<?php foreach ($usaha->result() as $row) { ?>

					<div class="form-group row">
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Nama Usaha</label>
						<div class=" col-sm-9">
							<input class="form-control ass" placeholder="Contoh: CV. Putra Perkasa" name="nama_usaha"
								value="<?php echo $row->nama_usaha; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Bidang Usaha</label>
						<div class=" col-sm-9">
							<select class="form-control asn" name="bidang_usaha">
								<?php 
                                        $buat_select= array(
                                            "Perdagangan (pakaian, makanan, produk kesehatan, produk kecantikan, alat olahraga, dll)
                                            Seni atau desain",
                                            "Pabrikasi / manufaktur (Tekstil dan garmen, Otomotif, Elektronik, Makanan dan
                                            minuman, Kerajinan, dll)",
                                            "Tour dan travel",
                                            "Pendidikan",
                                            "Agrikultur",
                                            "Perikanan",
                                            "Konstruksi",
                                            "Jasa (laundry, salon, bengkel, cuci kendaraan, pengantaran, keuangan)",
                                        );
                                        foreach($buat_select as $lala){
                                            if($lala==$row->bidang_usaha){
                                                $selected='selected';
                                            } else $selected='';
                                            echo "<option value='".$lala."'".$selected.">".$lala."</option>";
                                        }
                                        ?>
								<option value="Lainnya" <?php if($row->bidang_usaha[0]=="("){echo "selected";} ?>>Lainnya</option>
							</select>
						</div>
					</div>
					<div class="form-group row" id="lainnya" <?php if($row->bidang_usaha[0]!="("){echo "hidden";} ?>>
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Keterangan Bidang
							Usaha</label>
						<div class=" col-sm-9">
							<input class="form-control asn" placeholder="...." name="lainnya">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Alamat Usaha</label>
						<div class=" col-sm-9">
							<textarea class="form-control ass" placeholder="Jalan/Kota/Provinsi" row="4"
								name="alamat_usaha"><?php echo wordwrap($row->alamat_usaha,15,"<br>\n"); ?></textarea>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Deskripsi Usaha</label>
						<div class=" col-sm-9">
							<textarea class="form-control ass" placeholder="Bekerja Pada Bidang .." row="4"
								name="deskripsi_usaha"><?php echo wordwrap($row->deskripsi_usaha,15,"<br>\n"); ?></textarea>
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
  </div><!-- /.modal -->
	<script>
		$(document).ready(function () {

			$('#huha input[type="radio"]').change(function () {

				if (this.value == 'Koas') {
					$("#PNS").attr("hidden", true);
					$(".ass").attr("required", true);
					$(".asn").attr("required", false);
					$("#PNSwasta").attr("hidden", false);
				} else {
					$("#PNS").attr("hidden", false);
					$(".asn").attr("required", true);
					$(".ass").attr("required", false);
					$("#PNSwasta").attr("hidden", true);
				}
			});

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

