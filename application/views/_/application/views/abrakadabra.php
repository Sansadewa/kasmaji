<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Ayok-Ayok Kawan diisi yang jujur ya.</h3>
            <a class="card-description text-danger">
             Cara mainnya :<ul><li>Kalo ga ngisi jujur, rasakan sanksi sosiyal.</li><li>Penempatan bersama harus saling mengisi NIM, dan mengisi pilihan yang sama.</li><!-- <li>Kabupaten/Kota <b>TIDAK DISIMULASIKAN, HANYA DICATAT</b></li> --></ul>
            </a>
            <?php $report=$this->session->flashdata('result');
            if(!empty($report)){ ?>
              <div class="alert alert-warning">
              <?php echo $report; ?>
              </div>
            <?php } ?>
            <hr>  
            <form class="forms-sample" action="<?php echo base_url().'akun/duarr' ?>" method="post">
              <?php 
              if ($datanya[0]['pil_1']==NULL) {$datanya[0]['pil_1']=999;} 
              if ($datanya[0]['pil_2']==NULL) {$datanya[0]['pil_2']=999;} 
              if ($datanya[0]['pil_3']==NULL) {$datanya[0]['pil_3']=999;} 
              ?>
              <div class="col-lg">
                <div class="form-group row">
                  <label class="col-lg-3 col-xs-12">Pilihan 1</label>
                  <div class="col-lg-9">
                    <select name="hoho1" class="form-control">
                    <option value="999" echo <?php 999==$datanya[0]['pil_1'] ? 'selected':'';?> >TIDAK MEMILIH</option>
                     <?php foreach ($formasi as $key) {
                      if ($key['id']>92) {
                        continue;
                      }
                      echo '<option value="'.$key['id'].'"';
                      echo $key['id']==$datanya[0]['pil_1'] ? 'selected>':'>';
                      echo $key['deskripsi'].'</option>';
                     } ?>
                     } ?>
                    </select>
                  </div>
                </div>
              </div><!-- 
              <div class="col-lg">
	              <div class="form-group row">
	                <label class="col-lg-3 col-xs-12" for="hoho4">Kabupaten Kota Pilihan 1</label>
	                <div class="col-lg-9">
	                	<input class="form-control" id="hoho4" name="hoho4" placeholder="Kabupaten/Kota Pilihan 1" value="<?php echo $datanya[0]['kab_1'];?>" >
	                </div>
	              </div>
	          </div> -->
              <div class="col-lg">
                <div class="form-group row">
                  <label class="col-lg-3 col-xs-12">Pilihan 2</label>
                  <div class="col-lg-9">
                    <select name="hoho2" class="form-control">
                    <option value="999" echo <?php 999==$datanya[0]['pil_2'] ? 'selected':'';?> >TIDAK MEMILIH</option>
                     <?php foreach ($formasi as $key) {
                      if ($key['id']>92) {
                        continue;
                      }
                      echo '<option value="'.$key['id'].'"';
                      echo $key['id']==$datanya[0]['pil_2'] ? 'selected>':'>';
                      echo $key['deskripsi'].'</option>';
                     } ?>
                    </select>
                  </div>
                </div>
              </div><!-- 
              <div class="col-lg">
	              <div class="form-group row">
	                <label class="col-lg-3 col-xs-12" for="hoho5">Kabupaten Kota Pilihan 2</label>
	                <div class="col-lg-9">
	                	<input class="form-control" id="hoho5" name="hoho5" placeholder="Kabupaten/Kota Pilihan 2" value="<?php echo $datanya[0]['kab_2'];?>" >
	              	</div>
	              </div>
	          </div> -->
              <div class="col-lg">
                <div class="form-group row">
                  <label class="col-lg-3 col-xs-12">Pilihan 3</label>
                  <div class="col-lg-9">
                    <select name="hoho3" class="form-control">
                      <option value="999" echo <?php 999==$datanya[0]['pil_3'] ? 'selected':'';?> >TIDAK MEMILIH</option>
                     <?php foreach ($formasi as $key) {
                      if ($key['id']>92) {
                        continue;
                      }
                      echo '<option value="'.$key['id'].'"';
                      echo $key['id']==$datanya[0]['pil_3'] ? 'selected>':'>';
                      echo $key['deskripsi'].'</option>';
                     } ?>
                     } ?>
                    </select>
                  </div>
                </div>
              </div><!-- 
              <div class="col-lg">
	              <div class="form-group row">
	                <label class="col-lg-3 col-xs-12" for="hoho6">Kabupaten Kota Pilihan 3</label>
	                <div class="col-lg-9">
	                	<input class="form-control" id="hoho6" name="hoho6" placeholder="Kabupaten/Kota Pilihan 3" value="<?php echo $datanya[0]['kab_3'];?>" >
	            	</div>
	              </div>
	          </div> -->
              <div class="col-lg">
                <div class="form-group row">
                  <label class="col-lg-3 col=xs-12">NIM Pasangan Bersama</label>
                  <div class="form-group col-lg-9 col-xs-12 ">
                    <input class="form-control" id="bersama" name="bersama" placeholder="NIM" value="<?php echo $datanya[0]['bersama']==NULL ? '':$datanya[0]['bersama'];?>" pattern=".{7,7}" title="NIM salah.">
                  </div>
                </div>
              </div>
              
              
              <button type="submit" class="btn btn-success mr-2">Update!</button>
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>