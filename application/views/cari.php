<style>
  button a{
    color:white;
  }
</style>
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="mb-0">Hasil Pencarian "<?php echo $this->session->userdata('searchkey');?>"</h3><hr class="mt-0">
    <?php foreach($data->result() as $row){ if($row->username=="ADMIN123456789"){continue;}?>

      <div class="row">
        <div class=" d-flex col-lg-2 col-md-2 col-sm-3 col-xs-3 justify-content-center my-auto">
            <img style=" object-fit: contain; border: 3px solid #259b87;
              padding: 3px;" class="img-fluid rounded-circle" src="<?php echo base_url()."lihatfoto/".$row->username;?>" alt="Profile image"></img><br>
        </div>
        <div class="col-lg-9 col-sm-9 col-md-9 ml-lg-4 my-auto">
              <div class="row">
                <div class="form-group col-md-6 col-sm-12 mb-1">
                  <a href="<?php echo base_url()."lihatprofil/".$row->username;?>" style="cursor:pointer; color:#259b87" class=" p-0 text-kasmaji"><?php echo $row->nama ?></a>
                </div>
              </div>

              <div class="row ">
                <div class="form-group col-sm-12">
                    <label for="nama" style="line-height: 5px; margin-bottom:0; font-size: 13px;">Kelas: <?php echo $row->kelas ?></label>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-12 mb-1">
                  <label for='date' style="line-height: 5px; margin-bottom:0; font-size: 13px;">Email: <?php echo $row->email ?></label> 
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


