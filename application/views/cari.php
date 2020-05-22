<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="mb-0">Hasil Pencarian "<?php echo $this->session->userdata('searchkey');?>"</h3><hr class="mt-0">
    <?php foreach($data->result() as $row){ ?>

      <div class="row">
        <div class=" d-flex col-lg-2 col-md-2 col-sm-3 col-xs-3 justify-content-center">
            <img class="img-fluid rounded-circle row" src="<?php echo base_url();?>public/images/user.svg" alt="Profile image"></img><br>
        </div>
        <div class="col-lg-9 col-sm-9 col-md-9 ml-lg-4 align-self-center">
              <div class="row ">
                <div class="form-group col-md-6 col-sm-12 mb-1">
                  <a class="text-blue" href="<?php echo base_url()."search/akun/".$row->username;?>" style="cursor:pointer;"><input style="cursor:pointer;" class="form-control-plaintext p-0 text-blue" id="nim" value="<?php echo $row->nama ?>" readonly></a>
                </div>
              </div>

              <div class="row ">
                <div class="form-group col-sm-12">
                    <label for="nama" style="line-height: 5px; margin-bottom:0; font-size: 13px;"><?php echo $row->kelas ?>, <?php echo $row->email ?></label>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-12 mb-1">
                  <label for='date' style="line-height: 5px; margin-bottom:0; font-size: 13px;">Tanggal Lahir: <?php echo $row->tgl_lahir ?></label> 
                </div>
              </div>
        </div>
        </div>



        <hr>
        <?php } ?>
        <?php echo $pagination; ?>
        </div> 
        
      </div>
    </div>
  </div>
</div>


