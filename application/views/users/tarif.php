<!-- Contact -->
  <div class="harga mb-5">
    <div class="container ">
      <div class="row py-5">
        <div class="col text-center ">
          <h2 class="font-weight-bold text-dark">Daftar Tarif Laundry</h2> 
          <hr width="400px">
        </div>
      </div>
      <div class="row justify-content-center ">
      <?php $i=1; foreach($data as $d): ?>
        <div class="col-md-4 mb-5">
          <!-- <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?= $d->nama_tarif ?></h4>
              <p class="card-text"><?=$d->biaya_tarif?> <span style="font-size: 12px"><?="/".$d->jenis_tarif ?></span>
                <span class="text-muted float-right" style="font-size: 12px;"><?=$d->waktu_tarif ?> hari</span>
              </p>
              <hr>
              <p class="card-text text-muted" style="font-size: 12px;"><?=$d->deskripsi ?></p>
            </div>
          </div> -->
          <!-- card border primary -->
          
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal"><?= $d->nama_tarif ?></h4>
            </div>
            <div class="card-body">
              <!-- change 1000 to 1k -->
              <?php 
                $biaya = $d->biaya_tarif;
                $biaya = number_format($biaya, 0, ',', '.');
                $biaya = "Rp ".$biaya;

              ?>
              <h1 class="card-title pricing-card-title text-md"><?=$biaya?> <small class="text-muted"><?="/".$d->jenis_tarif ?></small></h1>
              <p class="card-text text-muted" style="font-size: 12px;"><?=$d->deskripsi ?></p>
              <!-- <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button> -->
            </div>
          </div>
        </div>
      <?php $i++; endforeach; ?>
        <div class="col-lg-12 d-none">
        	 <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="background-color: #3fa1c6; color:#eaeaea">
                  <th width="20px">No</th>
                  <th>Paket</th>
                  <th>Waktu Proses</th>
                  <th>Biaya</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($data as $d): ?>
                <tr>
                  <td align="center"><?=$i ?></td>
                  <td><?=$d->nama_tarif ?></td>
                  <td><?=$d->waktu_tarif ?></td>
                  <td ><?=$d->biaya_tarif?> <span style="font-size: 12px"><?="/".$d->jenis_tarif ?></span></td>
                </tr>
                <?php $i++ ; endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- End Contact -->
