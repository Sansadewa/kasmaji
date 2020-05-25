<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row ">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="">Share Hal Baru</h4>
						<p class="card-description">
						</p>
						<?php $report=$this->session->flashdata('result');
            if(!empty($report)){ ?>
						<div class="alert alert-warning">
							<?php echo $report; ?>
						</div>
						<?php } ?>
						<hr class="mb-0">
						<div class="row mt-1 justify-content-center">
							<div class="col-lg-12 col-sm-12 col-md-12 ml-lg-4">
								<form class="forms-sample" enctype='multipart/form-data' action="<?php echo base_url().'input/sharing' ?>"
									method="post">
									<br>
									<div class="row">
										<div class="form-group col-md-6 col-sm-12">
											<label for="nim"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Judul
												Sharing</label>
											<input class="form-control" name="judul">
										</div>
										<div class="form-group col-md-6 col-sm-12">
											<label for="nama"
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jenis
												Sharing</label>
											<select class="form-control" id="combobox_sharing" name="jenis_sharing">
												<option value="Beasiswa">Beasiswa</option>
												<option value="Lowongan Kerja">Lowongan Kerja</option>
											</select>
										</div>

									</div>

									<div class="row">
										<div class="form-group col-md-12 col-sm-12">
											<label for='des'
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Deskripsi
												Sharing</label>
											<textarea class="form-control asn" row="5" name="deskripsi_sharing"
												placeholder="Deskripsikan Sedetil-detilnya"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-5 col-sm-12">
											<label
												style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Upload
												Gambar (opsional)</label>
											<input type="file" class="form-control-file" id="uploadgambarsharing"
												name="uploadgambarsharing" accept="image/*" hidden >
											<div class="input-group">
												<div class="input-group-prepend">
													<a class="btn text-white" style="background-color: #18b4a0" id="fakeSelect">Pilih File</a>
												</div>
												<input class="form-control" value="nama file"
													style="border-right: 1px solid #e5e5e5" id="nmfile" disabled> 
											</div>
                                        </div>
                                        <div class="col-md-5 col-sm-12 align-middle d-flex align-items-center">
                                        <a class="text-danger align-middle d-flex align-items-center" sty><i>Ukuran maksimum file: 5MB</i></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <button class="btn text-white" type="submit">Share!</button>
                                    </div>
                                    </div>


							</div>
						</div>
						</form>
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
						<h4 class="">Sharing Kamu</h4>
						<hr>
						<p class="card-description">
						</p>
						<div class="table-responsive sebuah-tabelWrapper">
							<table id="sebuah-tabela" class="table table-striped" style="width:100%" width="100%">
								<thead>
									<tr>
                                        <th>Judul</th>
                                        <th>Jenis</th>
										<th>Deskripsi</th>
										<th>Tanggal Unggah</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($sharing->result() as $row2) {   ?>
									<tr>
                                        <td><?php echo $row2->judul; ?></td>
										<td><?php echo $row2->jenis_sharing; ?></td>
										<td><?php echo $row2->deskripsi_sharing; ?></td>
										<td><?php echo $row2->tgl_unggah; ?></td>
										<td>
                                        <button type="button" class="btn btn-primary kon text-white"
												data='<?php $h= (is_null($row2->gambar) ? ' \' title=\'Gambar tidak ada\' disabled=\'true\'' : $row2->gambar); echo $h; ?>'>Lihat
												Gambar</button>
											<a class="btn btn-danger text-white"
												href="<?php echo base_url().'akun/hapussharing/'.$row2->kodesharing; ?>">Hapus
												Sharing</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>

							</table>
						</div>
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
						<h4 class="">Kumpulan Sharing Kasmaji</h4>
                        <hr>
                        <p class="card-description">
						</p>
						<div class="table-responsive sebuah-tabelWrapper">
							<table id="sebuah-tabel" class="table table-striped" style="width:100%" width="100%">
								<thead>
									<tr>
                                        <th>Judul</th>
                                        <th>Jenis</th>
										<th>Deskripsi</th>
										<th>Pengunggah</th>
										<th>Gambar</th>
										<th>Tanggal Unggah</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($tbl_sharing->result() as $row2) {   ?>
									<tr>
                                        <td><?php echo $row2->judul; ?></td>
										<td><?php echo $row2->jenis_sharing; ?></td>
                                        <td><?php echo $row2->deskripsi_sharing; ?></td>
										<td><a href="<?php echo base_url().'lihatprofil/'.$row2->username; ?>"><?php echo $row2->nama; ?></a></td>
										<td><button type="button" class="btn btn-primary kon text-white"
												data='<?php $h= (is_null($row2->gambar) ? ' \' title=\'Gambar tidak ada\' disabled=\'true\'' : $row2->gambar); echo $h; ?>'>Lihat
												Gambar</button></td>
										<td><?php echo $row2->tgl_unggah; ?></td>

									</tr>
									<?php } ?>
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal HTML Markup -->
<div class="modal fade" role="dialog" id="gambarModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-xs-center">Gambar</h4>
			</div>
			<div class="modal-body">
                <img id="gambarsharing" class="img-fluid"><br>
                <div class="row  d-flex justify-content-center">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>

			</div> <!--  endofmodalbody -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(document).ready(function () {
        $('#fakeSelect').click(function(){
            $('#uploadgambarsharing').trigger('click');
        });

        $('#uploadgambarsharing').change(function(e){
            var nmfile = e.target.files[0].name;
            $('#nmfile').attr('value', nmfile);
        });

        //Buat munculin gambar
		$('.kon').click(function () {
			$('#gambarModal').modal('show');
			var kon = '<?php echo base_url();?>lihatsharing/' + $(this).attr('data');
			$('#gambarsharing').attr('src', kon);
		});


	});

</script>
