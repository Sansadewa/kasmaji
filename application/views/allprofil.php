
<div class="row">
	<div class="col-md-12 grid-margin">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="">Profil Teman-teman</h4>
						<hr>
						<p class="card-description">
						</p>
						<div class="table-responsive sebuah-tabelWrapper">
							<table id="sebuah-tabel" class="table table-striped" style="width:100%" width="100%">
								<thead>
									<tr>
										<th>username</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Tanggal lahir</th>
										<th>Nomor HP</th>
										<th>Nomor WA</th>
										<th>Linkedin</th>
										<th>Facebook</th>
										<th>Instagram</th>
										<th>Twitter</th>
										<th>Provinsi Asal</th>
										<th>Kabupaten/Kota Asal</th>
                                        <th>Alamat lengkap Asal</th>
                                        <th>Provinsi Domisili</th>
										<th>Kabupaten/Kota Domisili</th>
										<th>Alamat lengkap Domisili</th>
										<th>Melanjutkan Pendidikan setelah SMA?</th>
										<th>kegiatan</th>
										
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tbl_profil->result() as $row2) { 
                    ?>
									<tr>
										<td><?php echo $row2->username ?></td>
										<td><?php echo $row2->nama; ?></td>
										<td><?php echo $row2->kelas; ?></td>
										<td><?php echo $row2->tgl_lahir; ?></td>
										<td><?php echo $row2->nomor_hp; ?></td>
										<td><?php echo $row2->nomor_wa; ?></td>
										<td><?php echo $row2->linkedin; ?></td>
										<td><?php echo $row2->facebook; ?></td>
										<td><?php echo $row2->ig; ?></td>
										<td><?php echo $row2->twitter; ?></td>
										<td><?php echo $row2->prov; ?></td>
										<td><?php echo $row2->kabkot; ?></td>
										<td><?php echo $row2->alamat_lengkap; ?></td>
										<td><?php echo $row2->prov_dom; ?></td>
										<td><?php echo $row2->kabkot_dom; ?></td>
										<td><?php echo $row2->alamat_lengkap_dom; ?></td>
										<td><?php if($row2->lanjut_belajar == 1) { echo 'Ya';} elseif($row2->lanjut_belajar == '0') {echo 'Tidak';} ?></td>
										<td><?php if($row2->kegiatan == 1) { echo 'Bekerja/Magang';} elseif($row2->kegiatan == 2) {echo 'memilik Usaha';}elseif($row2->kegiatan == 3) {echo 'Bekerja/magang dan Memiliki Usaha';}elseif($row2->kegiatan == 4) {echo 'Tidak Bekerja/magang dan Tidak Memiliki Usaha';} ?></td>
									</tr>
									<?php } ?>
								</tbody>
<tfoot><tr>
                                        <th>username</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Tanggal lahir</th>
										<th>Nomor HP</th>
										<th>Nomor WA</th>
										<th>Linkedin</th>
										<th>Facebook</th>
										<th>Instagram</th>
										<th>Twitter</th>
										<th>Provinsi Asal</th>
										<th>Kabupaten/Kota Asal</th>
                                        <th>Alamat lengkap Asal</th>
                                        <th>Provinsi Domisili</th>
										<th>Kabupaten/Kota Domisili</th>
										<th>Alamat lengkap Domisili</th>
										<th>Melanjutkan Pendidikan setelah SMA?</th>
										<th>kegiatan</th>
									</tr></tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	

