<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-5 text-gray-800">Data <?=$section?></h1>
<?=$this->session->flashdata('flash') ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
      <div>
        <span class="m-0 font-weight-bold text-primary">Data <?=$section ?></span>
      </div>
      <!-- button create -->
      <div class="ml-auto">
        <a href="<?=base_url('admin/biaya/add')?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
      </div>
    </div>
    <div class="card-body">
      <!-- search by date -->
      <div class="row">
        <div class="col-md-12 d-none">
          <form action="<?=base_url('admin/biaya')?>" method="get">
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
                  <a href="<?=base_url('admin/biaya')?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Reset</a>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th width="100px" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($tampil as $t){ 
                  $id = str_replace(['=','+','/'],['-','_','~',], $this->encryption->encrypt($t->id));
                  ?>
                <tr>
                  <td><?=$t->nama_pengeluaran ?></td>
                  <td><?=$t->tanggal ?></td>
                  <td><?= $t->qty ?></td>
                  <td><?= rupiah($t->harga) ?></td>
                  <td><?= rupiah($t->total_harga) ?></td>
                  <td>
                    <!-- reply pesan -->
                    <a href="<?=base_url('admin/biaya/edit/'.$t->id) ?>" class="btn btn-sm btn-warning" title="Edit">Edit</a>
                    <button href="" onclick="deleteConfirm('<?=base_url('admin/biaya/delete/'.$id) ?>')" class="btn btn-sm btn-danger" title="Hapus" data-target="#modalDelete" data-toggle="modal">Hapus</button>
    
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>

</div>


<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-sm btn-danger btn-ok" id="btn-delete">Hapus</a>
      </div>
    </div>
  </div>
</div>

<script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    };  
</script>