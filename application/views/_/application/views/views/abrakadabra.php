<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Ayok-Ayok Kawan diisi yang jujur ya.</h4>
            <p class="card-description">
             <i class="text-danger">Kalo ga ngisi jujur, rasakan sanksi sosiyal.</i>
            </p>
            <?php $report=$this->session->flashdata('result');
            if(!empty($report)){ ?>
              <div class="alert alert-success">
              <?php echo $report; ?>
              </div>
            <?php } ?>
            <form class="forms-sample" action="<?php echo base_url().'akun/duarr' ?>" method="post">

              <div class="col-lg">
                <div class="form-group row">
                  <label class="col-3 col-form-label">Pilihan 1</label>
                  <div class="col-9">
                    <select name="hoho1" class="form-control">
                     <?php foreach ($formasi as $key) {
                      echo '<option value="'.$key['id'].'" >'.$key['deskripsi'].'</option>';
                     } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group row">
                  <label class="col-3 col-form-label">Pilihan 2</label>
                  <div class="col-9">
                    <select name="hoho2" class="form-control">
                     <?php foreach ($formasi as $key) {
                      echo '<option value="'.$key['id'].'" >'.$key['deskripsi'].'</option>';
                     } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group row">
                  <label class="col-3 col-form-label">Pilihan 3</label>
                  <div class="col-9">
                    <select name="hoho3" class="form-control">
                     <?php foreach ($formasi as $key) {
                      echo '<option value="'.$key['id'].'" >'.$key['deskripsi'].'</option>';
                     } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="bersama">NIM Pasangan Bersama</label>
                <input class="form-control" id="bersama" name="bersama" placeholder="NIM" required>
              </div>
              
              <button type="submit" class="btn btn-success mr-2">Kirim!</button>
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>