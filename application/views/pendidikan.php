<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="">Pendidikan Kamu</h4>
            <p class="card-description">
            </p>
            <?php $report=$this->session->flashdata('result');
            if(!empty($report)){ ?>
              <div class="alert alert-success">
              <?php echo $report; ?>
              </div>
            <?php } ?>
            <hr class="mb-0">
            <div class="row text-right">
              <hr class="mb-0">
              <div>
                <a  class="text-right" data-toggle="modal" data-target="#ModalPendidikanForm" style="color:#259b87;cursor: pointer;">Edit Data Pendidikan ></a>
              </div>
            </div>
          <div class="row mt-1 justify-content-center">
            <div class="col-lg-12 col-sm-12 col-md-12 ml-lg-4">
              <form class="forms-sample" action="<?php echo base_url().'input/profil' ?>" method="post"> <?php foreach ($pendidikan->result() as $row) { ?>
                  <br>
                  <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                      <label for="nim" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Pendidikan yg sedang/telah selesai ditempuh setelah lulus SMA</label>
                      <input class="form-control" id="" value="<?php echo $row->sedang_or_selesai; ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                      <label for="nama" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Tahun Masuk</label>
                      <input class="form-control" id="nama" value="<?php echo strtoupper($row->th_masuk);?>" readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                      <label for="nama" style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Tahun Keluar</label>
                      <input class="form-control" id="nama" value="<?php echo strtoupper($row->th_keluar);?>" readonly>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                      <label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Instansi Pendidikan</label> 
                      <input class="form-control" value="<?php echo $row->instansi;?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for='date' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jurusan</label> 
                      <input class="form-control" value="<?php echo $row->jurusan;?>" readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                    <label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Instansi S2</label> 
                            <input class="form-control asn" placeholder="Instansi (S2/Profesi)" Value="<?php echo $row->instansi_lanjut;?>" name="instansi_lanjut" readonly>
                        
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                    <label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Jurusan S2</label> 
                            <input class="form-control asn" placeholder="Jurusan (S2/Profesi)" Value="<?php echo $row->jurusan_lanjut;?>" name="jurusan_lanjut" readonly>
                        
                    </div>
                    <hr>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label for='email' style="line-height: 15px; margin-bottom:0.7em; font-size: 15px; ">Beasiswa</label> 
                            <input class="form-control asn" placeholder="Jurusan (S2/Profesi)" Value="<?php echo $row->beasiswa;?>" name="jurusan_lanjut" readonly>
                        
                    </div>
                  </div>
            </div>
          </div> 
        </form> <?php } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="">Pendidikan Teman-Teman</h4>
            <p class="card-description">
            </p>
        
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
            <!-- Modal HTML Markup -->
            <div id="ModalPendidikanForm" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-xs-center">Edit Data Dasar</h4>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url().'input/pendidikan' ?>" method="post">
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Pendidikan yg sedang/telah selesai ditempuh setelah lulus SMA</label>
                            <div class=" col-sm-9">
                                <div class="row" style="margin-bottom:0.3em;">
                                    <div class="form-radio col-sm-3">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="pendidikan" id="d1" value="D1" required> D1
                                        <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-radio col-sm-3">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="pendidikan" id="d2" value="D2"> D2
                                        <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-radio col-sm-3">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="pendidikan" id="d3" value="D3"> D3
                                        <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-radio col-sm-3">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="pendidikan" id="d4" value="D4"> D4/S1
                                        <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  col-md-6">
                                        <label for="tahun_masuk" style="margin-bottom:0.5em;">Tahun Masuk</label>
                                        <input class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" id="tahun_masuk" reqiured>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label for="tahun_keluar" style="margin-bottom:0.5em;">Tahun Keluar</label>
                                        <input class="form-control" placeholder="Tahun Keluar" name="tahun_keluar" reqiured>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row" >
                            <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Instansi Pendidikan</label>
                            <div class=" col-sm-9">
                                <input class="form-control" placeholder="Instansi Pendidikan" name="instansi" reqiured>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:0;">
                            <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Jurusan</label>
                            <div class=" col-sm-9">
                                <input class="form-control" placeholder="Jurusan" name="jurusan" reqiured>
                            </div>
                        </div>
                        <hr>
                        <fieldset id="huha">
                        <div class="form-group row" style="margin-bottom:0.36em;" id="huha">
                            <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Sedang studi pascasarjana (S2/Profesi) ?</label>
                            
                            <div class=" col-sm-9">
                            <div class="row">
                                <div class="form-radio col-sm-6">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="pascasarjana" id="yes" value="1" required> Ya
                                <i class="input-helper"></i></label>
                                </div>
                                <div class="form-radio col-6">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="pascasarjana" id="no" value="0"> Tidak
                                <i class="input-helper"></i></label>
                                </div>
                            </div>
                            </div>
                        </div>
                        </fieldset>
                        
                        <div class="form-group row" id="instansi_lanjut_div" hidden>
                            <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Instansi Pendidikan (S2/Profesi)</label>
                            <div class=" col-sm-9">
                                <input class="form-control asn" placeholder="Instansi (S2/Profesi)" Value="" name="instansi_lanjut">
                            </div>
                        </div>

                        <div class="form-group row" id="jurusan_lanjut_div" hidden>
                            <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Jurusan (S2/Profesi)</label>
                            <div class=" col-sm-9">
                                <input class="form-control asn" placeholder="Jurusan (S2/Profesi)" Value="" name="jurusan_lanjut">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" style="line-height=0;vertical-align: middle">Program Beasiswa</label>
                            <div class=" col-sm-9">
                                <input class="form-control asn" placeholder="Program Beasiswa" Value="" name="beasiswa">
                            </div>
                        </div>
                        <hr>
                        <a class="text-danger"><?php
                            $informasi = $this->session->flashdata('informasi');
                            if(!empty($informasi)){
                            echo $informasi;
                            }
                            ?></a>

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success mr-2 btn-primary">Submit</button>
                        </form>
                       </div>  <!--  endofmodalbody -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                <script>
      $(document).ready(function () {

      $('#huha input[type="radio"]').change(function() {

            if (this.value == '1') {
                $("#instansi_lanjut_div").attr("hidden",false);
                $(".asn").attr("required",true);

                $("#jurusan_lanjut_div").attr("hidden",false);
            }
            else if (this.value == '0') {
                $("#instansi_lanjut_div").attr("hidden",true);
                $(".asn").attr("required",false);
                $("#jurusan_lanjut_div").attr("hidden",true);
            }
      });
    });

  </script>
            </div><!-- /.modal -->

            

