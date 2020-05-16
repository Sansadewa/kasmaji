<div class="row">
  <div class="col-md-12  grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title text-danger">Yang Masih Kosong Gan!</h1>
            <p class="card-description">
            </p>
            <div class="table-responsive sebuah-tabelWrapper">
              <table id="sebuah-tabel1" class="table table-striped" width="100%">
                <thead>
                <tr>
                  <th>Daerah</th>
                  <th>Sisa SK</th>
                  <th>Sisa SE</th>
                  <th>Sisa KS</th>

                </tr>
                </thead>
                <tbody>
                  <?php foreach ($kosong->result() as $row) { ?>
                    <tr>
                      <td><?php echo substr($row->deskripsi,13); ?></td>
                      <td><?php echo $row->sisa_sk; ?></td>
                      <td><?php echo $row->sisa_se; ?></td>
                      <td><?php echo $row->sisa_ks; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
