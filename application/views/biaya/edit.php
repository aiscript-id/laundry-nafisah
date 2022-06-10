<?=$this->session->flashdata('flash') ?>

<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-11">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Input Data <?=$section ?></h1>
            </div>
            <form class="user" method="POST" action="<?=base_url('admin/biaya/update')?>">
              <input type="hidden" name="id" value="<?= $tampil->id ?>">
              <div class="form-group mb-3">
                <label class="text-dark">Nama Pengeluaran</label>
                <input type="text" class="form-control" placeholder="Nama Pengeluaran..." name="nama_pengeluaran" value="<?= $tampil->nama_pengeluaran ?>">
                <?=form_error('nama_pengeluaran', "<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 ">
                  <label class="text-dark">Tanggal</label>
                  <input type="date" class="form-control" placeholder="Tanggal.." name="tanggal" value="<?=set_value('tanggal', $tampil->tanggal) ?>">
                   <?=form_error('tanggal',"<small class='text-danger'>",'</small>') ?> 
                </div>
                <?php   
                  $jenis = ['Bahan Baku', 'Alat', 'Perbaikan', 'Lain-lain'];
                ?>
                <div class="col-sm-6">
                  <label class="text-dark">Jenis</label>
                  <select class="form-control text-dark" name="jenis">
                    <option value="">Pilih Jenis</option>
                    <?php foreach ($jenis as $j) : ?>
                      <option value="<?= $j ?>" <?=set_select('jenis',$j) ?>  <?=($tampil->jenis==$j)?'selected':'' ?>><?= $j ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 ">
                  <label class="text-dark">Qty</label>
                  <input type="number" class="form-control" placeholder="qty.." name="qty" onkeypress="return inputAngka(event)" value="<?=set_value('qty', $tampil->qty) ?>">
                   <?=form_error('qty',"<small class='text-danger'>",'</small>') ?> 
                </div>
                <div class="col-sm-6">
                  <label class="text-dark">Harga per item</label>
                  <input type="number" class="form-control" placeholder="Harga per item.." name="harga" onkeypress="return inputAngka(event)" value="<?=set_value('harga', $tampil->harga) ?>">
                   <?=form_error('harga',"<small class='text-danger'>",'</small>') ?> 
                </div>
              </div>
              <div class="form-group pb-3">
                <!-- deskiripsi -->
                <label class="text-dark">Keterangan</label>
                <textarea class="form-control" rows="3" placeholder="Keterangan..." name="keterangan"><?=set_value('keterangan', $tampil->keterangan) ?></textarea>
                <?=form_error('keterangan',"<small class='text-danger'>",'</small>') ?>
              </div>
              <hr>
              <div class="d-flex">
              <button type="submit" class="btn btn-primary mr-3">Simpan</button>
            </form>        
            <a href="<?=base_url('admin/biaya') ?>" class="btn btn-secondary">Kembali</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  function inputAngka(evt){
      var charCode = (evt.charCode);
      // console.log(charCode)
      // jika charCode lebih dari 31(spasi) dan carCode kurang dari 48 atau charCode besar dari 57
      if(charCode>32 && (charCode<48 || charCode>57) && charCode!=45)
      {
        return false;
      }
      else
      {
        return true;
      }
  }
</script>