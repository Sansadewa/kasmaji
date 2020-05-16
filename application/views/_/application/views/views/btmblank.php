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
            <form class="forms-sample" action="<?php echo base_url().'input/btm' ?>" method="post">

              <div class="form-group">
                <div class="form-group">
                <label for="namapanggilan">Nama Panggilan</label>
                <input class="form-control" id="namapanggilan" name="namapanggilan" placeholder="Kamu biasanya dipanggil apa?" value="" required>
              </div>
                <label for="emailpersonal">Email Personal</label>
                <input type="email" class="form-control" id="emailpersonal" name="emailpersonal" placeholder="Bukan email STIS ya :)" value="">
              </div>
              <div class="form-group">
                <label for="himada">Himada</label>
                <input class="form-control" id="himada" name="himada" placeholder="Himadamu apa?" value="" required>
              </div>
              <button type="submit" class="btn btn-success mr-2">Save</button>
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>