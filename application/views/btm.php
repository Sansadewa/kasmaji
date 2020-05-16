<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Data Untuk Buku Tahunan</h4>
            <p class="card-description">
             <i class="text-danger">Note : Data yang lain akan diambil dari Profil SIPAJU.</i>
            </p>
            <?php $report=$this->session->flashdata('result');
            if(!empty($report)){ ?>
              <div class="alert alert-success">
              <?php echo $report; ?>
              </div>
            <?php } ?>
            <form class="forms-sample" action="<?php echo base_url().'input/btm' ?>" method="post"> <?php foreach ($btm->result() as $row) { ?>

              <div class="form-group">
                <div class="form-group">
                <label for="namapanggilan">Nama Panggilan</label>
                <input class="form-control" id="namapanggilan" name="namapanggilan" placeholder="Kamu biasanya dipanggil apa?" value="<?php echo $row->namapanggilan;?>" required>
              </div>
                <label for="emailpersonal">Email Personal</label>
                <input type="email" class="form-control" id="emailpersonal" name="emailpersonal" placeholder="Bukan email STIS ya :)" value="<?php echo $row->email_personal;?>">
              </div>
              <div class="form-group">
                <label for="himada">Himada</label>
                <input class="form-control" id="himada" name="himada" placeholder="Himadamu apa?" value="<?php echo $row->himada;?>" required>
              </div>
              <div class="form-row" style="padding-bottom: 16px">
                <div class="col">
                  <label for="kabkot" style="line-height: 10px; font-size: 13px;">Kabupaten/Kota</label>
                  <input class="form-control" id="kabkot" name="kabkot" value="<?php echo $row->kabkot;?>" placeholder="Kabkot" readonly>
                </div>
                <div class="col">
                  <label for="line" style="line-height: 10px; font-size: 13px">Provinsi</label>
                  <input class="form-control" id="provinsi" value="<?php echo $row->provinsi;?>" name="provinsi" placeholder="provinsi" readonly>
                </div>
              </div>
               <?php }?>
              <button type="submit" class="btn btn-success mr-2">Save</button>
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>