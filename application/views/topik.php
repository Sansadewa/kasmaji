<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Data Topik Skripsi</h4>
            <p class="card-description">
            </p>
            <?php $report=$this->session->flashdata('result');
            if(!empty($report)){ ?>
              <div class="alert alert-success">
              <?php echo $report; ?>
              </div>
            <?php } ?>
            <form class="forms-sample" action="<?php echo base_url().'input/topik' ?>" method="post"> <?php foreach ($topik->result() as $row) { ?>
              <div class="form-group">
                <label for="dosbing">Dosen Pembimbing</label>
                <input class="form-control" id="dosbing" name="dosbing" placeholder="Dosbing kamu..." value="<?php echo $row->dosbing?>" required>
              </div>
              <div class="form-group">
                <label for="topik">Topik Skripsi</label>
                <textarea class="form-control" id="topik" name="topik" placeholder="Topik Skripsimu..." rows="4" required><?php echo $row->topik?></textarea>  
              </div>
              <?php if ($this->session->userdata('kelas')[1]=='K'): ?>
              <div class="form-group">
                <label for="kelompoktema">Kelompok Tema</label>
                <input class="form-control" id="kelompoktema" name="kelompok_tema" placeholder="Kelompok Tema kamu. Iya, kamu." value="<?php echo $row->kelompok_tema?>" required>
              </div>
              <div class="form-group">
                <label for="Platform">Platform</label>
                <input class="form-control" id="platform" name="platform" placeholder="Platform kamu, beb." value="<?php echo $row->platform?>" required>
              </div>
              <?php else: ?>
              <div class="form-group">
                <label for="metode">Metode</label>
                <input class="form-control" id="metode" name="metode" placeholder="Metode yang kamu pakai" value="<?php echo $row->metode?>" required>
              </div>
              <div class="form-group">
                <label for="metode">Variabel Y</label>
                <input class="form-control" id="y" name="y" placeholder="Variabel Y yang kamu gunakan" value="<?php echo $row->y?>" required>
              </div>
              <div class="form-group">
                <label for="metode">Lokus</label>
                <input class="form-control" id="lokus" name="lokus" placeholder="Lokus penelitian kamu" value="<?php echo $row->lokus?>" required>
              </div>
              <div class="form-group">
                <label for="metode">Periode Sumber Data</label>
                <input class="form-control" id="periode" name="periode" placeholder="Periode Sumber Data" value="<?php echo $row->periode?>" required>
              </div>
            <div class="form-group">
                <label for="metode">Sumber Data</label>
                <input class="form-control" id="sumberdata" name="sumberdata" placeholder="Sumber Data yang digunakan" value="<?php echo $row->sumberdata?>" required>
              </div>
              <?php endif ?>
              <button type="submit" class="btn btn-primary mr-2">Save</button>
            </form> <?php } ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>