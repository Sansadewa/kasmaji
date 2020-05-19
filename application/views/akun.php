<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Profil Mahasiswa</h2>
            <p class="card-description">
            </p>
            <?php $report=$this->session->flashdata('result');
            if(!empty($report)){ ?>
              <div class="alert alert-success">
              <?php echo $report; ?>
              </div>
            <?php } ?>
          <div class="row">
              <div class=" col-lg-2 col-md-3 col-sm-12 col-xs-12">
                <img class="img-xl rounded-circle" src="<?php echo base_url();?>public/images/user.svg" alt="Profile image">
            </div>
            <div class="col-lg-10 col-sm-12 col-md-9">
              <form class="forms-sample" action="<?php echo base_url().'input/profil' ?>" method="post"> <?php foreach ($profile->result() as $row) { ?>
                  <br>
                  <div class="form-group">
                    <label for="nim" style="line-height: 10px; font-size: 13px;">NIM</label>
                    <input class="form-control-plaintext" id="nim" value="<?php echo $this->session->userdata('username')?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama" style="line-height: 10px; font-size: 13px;">Nama Lengkap</label>
                    <input class="form-control-plaintext" id="nama" value="<?php echo strtoupper($this->session->userdata('nama'))?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for='date'>Tanggal Lahir</label> 
                    <input type="date" name="date" class="form-control-plaintext" value="<?php echo $row->tgl_lahir;?>" readonly>
                    </div>
                <div class="form-group">
                  <label for="alamat">Alamat Mahasiswa</label>
                  <textarea class="form-control-plaintext" id="alamat" rows="4" readonly><?php echo $row->alamat; ?></textarea>
                </div>
            </div>
          </div>
          <hr>
          <br>
          <div class="row">
            <div class="col-12">
                <div class="form-row" style="padding-bottom: 16px">
                  <div class="col">
                    <label for="ayah" style="line-height: 10px; font-size: 13px;">Nama Ayah</label>
                    <input class="form-control-plaintext" id="ayah" value="<?php echo $row->ayah;?>" readonly>
                  </div>
                  <div class="col">
                    <label for="wali" style="line-height: 10px; font-size: 13px;">Nama Wali</label>
                    <input class="form-control-plaintext" id="wali" value="<?php echo $row->wali;?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="telp_ortu">Nomor Telepon Orang Tua / Wali</label>
                  <input class="form-control-plaintext" id="telp_ortu" value="<?php echo $row->no_telp_ortu;?>" readonly>
                </div>
                <hr>
                <div class="form-group">
                  <label for="alamat_ortu">Alamat Rumah</label>
                  <textarea class="form-control-plaintext" id="alamat_ortu" rows="3" readonly><?php echo $row->alamat_ortu;?></textarea>
                </div>
                <div class="form-row" style="padding-bottom: 16px">
                  <div class="col">
                    <label for="desa" style="line-height: 10px; font-size: 13px;">Desa / Kelurahan</label>
                    <input class="form-control-plaintext" id="desa" value="<?php echo $row->desa;?>" readonly>
                  </div>
                  <div class="col">
                    <label for="kodepos" style="line-height: 10px; font-size: 13px;">kodepos</label>
                    <input class="form-control-plaintext" id="kodepos" value="<?php echo $row->kodepos;?>" readonly>
                  </div>
                </div>
                <div class="form-row" style="padding-bottom: 16px">
                  <div class="col">
                    <label for="kecamatan" style="line-height: 10px; font-size: 13px;">Kecamatan</label>
                    <input class="form-control-plaintext" id="kecamatan" value="<?php echo $row->kecamatan;?>" readonly>
                  </div>
                  <div class="col">
                    <label for="kabkot" style="line-height: 10px; font-size: 13px;">Kabupaten /Kota</label>
                    <input class="form-control-plaintext" id="kabkot" value="<?php echo $row->kabkot;?>" readonly>
                  </div>
                </div>
                  <div class="form-group">
                    <label for="provinsi" style="line-height: 10px; font-size: 13px;">Provinsi</label>
                    <input class="form-control-plaintext" id="provinsi" value="<?php echo $row->provinsi;?>" readonly>
                  </div>
                    <hr>
                <div class="form-row">
                  <div class="form-group col-lg-5 col-xs-12">
                    <label for="teman_dekat">Teman Dekat</label>
                    <textarea class="form-control-plaintext" id="teman_dekat" readonly> <?php echo $row->teman_dekat;?> </textarea>
                  </div>
                  <div class="form-group col-lg-5 col-xs-12">
                    <label for="no_telp_teman">No Telp Teman Dekat</label>
                    <textarea class="form-control-plaintext" id="no_telp_teman" readonly> <?php echo $row->no_telp_teman;?> </textarea>
                  </div>
              </form> <?php } ?>
            </div>
          </div>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLoginForm">
                Edit
            </button>
            <!-- Modal HTML Markup -->
            <div id="ModalLoginForm" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-xs-center">Edit Data Profil</h4>
                        </div>
                        <div class="modal-body">
                           <form class="forms-sample" action="<?php echo base_url().'input/profil' ?>" method="post"> <?php foreach ($profile->result() as $row) { ?>
                <div class="form-group">
                  <label for="nim" style="line-height: 10px; font-size: 13px;">NIM</label>
                  <input class="form-control" id="nim" value="<?php echo $this->session->userdata('nim')?>" disabled>
                </div>
                <div class="form-group">
                  <label for="nama" style="line-height: 10px; font-size: 13px;">Nama Lengkap</label>
                  <input class="form-control" id="nama" value="<?php echo strtoupper($this->session->userdata('nama'))?>" disabled>
                </div>

                  <div class="form-group">
                    <label for="date">Tanggal Lahir <i>(Format menyesuaikan)</i></label>
                    <input type='date' id="date" name="date" class="form-control" />
                </div>

              <div class="form-group">
                <label for="alamat">Alamat Mahasiswa</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="6" required><?php echo $row->alamat; ?></textarea>
              </div>
              <div class="form-row" style="padding-bottom: 16px">
                <div class="col">
                  <label for="ayah" style="line-height: 10px; font-size: 13px;">Nama Ayah</label>
                  <input class="form-control" id="ayah" name="ayah" value="<?php echo $row->ayah;?>" required>
                </div>
                <div class="col">
                  <label for="wali" style="line-height: 10px; font-size: 13px;">Nama Wali</label>
                  <input class="form-control" id="wali" name="wali" value="<?php echo $row->wali;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="telp_ortu">Nomor Telepon Orang Tua / Wali</label>
                <input class="form-control" id="telp_ortu" name="no_telp_ortu" value="<?php echo $row->no_telp_ortu;?>" required>
              </div>
              <div class="form-group">
                <label for="alamat_ortu">Alamat Rumah</label>
                <textarea class="form-control" id="alamat_ortu" name="alamat_ortu" rows="6" required><?php echo $row->alamat_ortu;?></textarea>
              </div>
              <div class="form-row" style="padding-bottom: 16px">
                <div class="col">
                  <label for="desa" name="desa" style="line-height: 10px; font-size: 13px;">Desa / Kelurahan</label>
                  <input class="form-control" id="desa" name="desa" value="<?php echo $row->desa;?>" required>
                </div>
                <div class="col">
                  <label for="kodepos" style="line-height: 10px; font-size: 13px;">kodepos</label>
                  <input class="form-control" id="kodepos" name="kodepos" value="<?php echo $row->kodepos;?>" required>
                </div>
              </div>
              <div class="form-row" style="padding-bottom: 16px">
                <div class="col">
                  <label for="kecamatan" style="line-height: 10px; font-size: 13px;">Kecamatan</label>
                  <input class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $row->kecamatan;?>" required>
                </div>
                <div class="col">
                  <label for="kabkot" style="line-height: 10px; font-size: 13px;">Kabupaten /Kota</label>
                  <input class="form-control" id="kabkot" name="kabkot" value="<?php echo $row->kabkot;?>" required>
                </div>
              </div>
                <div class="form-group">
                  <label for="provinsi" style="line-height: 10px; font-size: 13px;">Provinsi</label>
                  <input class="form-control" id="provinsi" name="provinsi" value="<?php echo $row->provinsi;?>" required>
                </div>
              
              <div class="form-group">
                <label for="teman_dekat">Teman Dekat</label>
                <textarea class="form-control" id="teman_dekat" name="teman_dekat" required> <?php echo $row->teman_dekat;?> </textarea>
              </div>
              <div class="form-group">
                <label for="no_telp_teman">No Telp Teman Dekat</label>
                <textarea class="form-control" id="no_telp_teman" name="no_telp_teman" required> <?php echo $row->no_telp_teman;?> </textarea>
              </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success mr-2 btn-primary">Submit</button>
            </form> <?php } ?>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

