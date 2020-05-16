<div class="row">
  <div class="col-md-12  grid-margin">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title text-danger">Yang Belom Pada Ngisi di Angkatan 57</h1>
            <p class="card-description">
            </p>
            <div class="table-responsive sebuah-tabelWrapper">
              <table id="sebuah-tabel" class="table table-striped" width="100%">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Ranking</th>

                </tr>
                </thead>
                <tbody>
                  <?php foreach ($belom->result() as $row) { ?>
                    <tr>
                      <td><?php echo wordwrap($row->nama,16,"<br>\n"); ?></td>
                      <td><?php echo $row->prodi; ?></td>
                      <td><?php echo $row->ranking; ?></td>
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
