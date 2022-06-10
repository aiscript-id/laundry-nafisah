<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-5 text-gray-800">Overview Data Keuangan</h1>
<?=$this->session->flashdata('flash') ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div>
        <span class="m-0 font-weight-bold text-primary">Data Pendapatan dan Pengeluaran</span>
      </div>
    </div>
    
    <?php if(!@$print): ?>
    <div class="card-body">
      <div class="row">
        
        <div class="col-md-12">
            <small>Masukan tanggal awal dan akhir untuk mendapatkan data pendapatan dan pengeluaran</small>
            <form action="<?=base_url('admin/laporan')?>" method="get">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <!-- <label for="">Tanggal Awal</label> -->
                    <input type="date" name="tanggal_awal" class="form-control" value="<?=$this->input->get('tanggal_awal')?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <!-- <label for="">Tanggal Akhir</label> -->
                    <input type="date" name="tanggal_akhir" class="form-control" value="<?=$this->input->get('tanggal_akhir')?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">&nbsp; </label>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Cari</button>
                    <!-- reset button -->
                    <a href="<?=base_url('admin/laporan')?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Reset</a>
                    <?php if ($this->input->get('tanggal_awal') && $this->input->get('tanggal_akhir')) : ?>
                      <a target="_blank" href="<?=base_url('admin/laporan/print_keuangan/'.$this->input->get('tanggal_awal').'/'. $this->input->get('tanggal_akhir'))?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</a>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if ($this->input->get('tanggal_awal') && $this->input->get('tanggal_akhir') or @$print) : ?>

    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <h6 class="card-title font-weight-bold mt-2">Pendapatan</h6>
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No. Struk</th>
                    <th>Tanggal</th>
                    <th>Paket</th>
                    <th>Berat/Jumlah</th>
                    <th>Biaya</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $total_pendapatan = 0; ?>
                  <?php foreach($tampil as $t){ 
                    ?>
                  <tr>
                    <td><?=$t->id_transaksi ?></td>
                    <td><?=$t->tgl_transaksi ?></td>
                    <td><?=$t->paket_transaksi ?></td>
                    <td><?=$t->berat_jumlah.' ('.$t->jenis_paket.')' ?></td>
                    <td><?=rupiah($t->total_transaksi) ?></td>
                  </tr>
                  <?php $total_pendapatan += $t->total_transaksi; ?>
                <?php } ?>
                <tr>
                  <td colspan="4" class="font-weight-bold">Total Pendapatan</td>
                  <td><?= rupiah(@$total_pendapatan) ?></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-12">
            <h6 class="card-title font-weight-bold mt-2">Biaya Operasional</h6>
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $total_biaya = 0; ?>
                  <?php foreach($biaya as $b){ 
                    ?>
                  <tr>
                    <td><?=$b->nama_pengeluaran ?></td>
                    <td><?=$b->tanggal ?></td>
                    <td><?= $b->qty ?></td>
                    <td><?= $b->harga ?></td>
                    <td><?= rupiah($b->total_harga) ?></td>
                  </tr>
                  <?php $total_biaya += $b->total_harga; ?>
                <?php } ?>
                <tr>
                  <td colspan="4" class="font-weight-bold">Total Biaya Operasional</td>
                  <td><?= rupiah(@$total_biaya) ?></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

  </div>


  <div class="card shadow">
    <div class="card-body">
    <h6 class="card-title font-weight-bold mt-2">Total Keuangan</h6>
    <small>Hasil perhitungan pendapatan dan pengeluaran pada periode 
      <?php if ($this->input->get('tanggal_awal') && $this->input->get('tanggal_akhir')) : ?>
        <?=$this->input->get('tanggal_awal')?> s/d <?=$this->input->get('tanggal_akhir')?>
      <?php else : ?>
        <?=date('d-m-Y')?>
      <?php endif ?>
    </small>
      <table class="table table">
        <tbody>
          <tr>
            <td>Pendapatan</td>
            <td class="text-success">+ <?= rupiah($total_pendapatan) ?></td>
          </tr>
          <tr>
            <td>Biaya Operasional</td>
            <td class="text-danger">- <?= rupiah($total_biaya) ?></td>
          </tr>
          <tr>
            <td class="font-weight-bold">Total Keuangan</td>
            <td class="text-primary font-weight-bold"> <?= rupiah($total_pendapatan - $total_biaya) ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <?php endif; ?>

  <!-- window.print get print -->
  <?php if (@$print) : ?>
  <script>
    window.print();
  </script>
  <?php endif; ?>


</div>


<script>
  function deleteConfirm(url)
  {
    $('#hapus').attr('href',url);
    $('#modalDelete').modal();
  }

</script>