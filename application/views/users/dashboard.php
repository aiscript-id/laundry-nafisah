<!-- Contact -->


<style type="text/css">
    .multi_step_form{
        /* background: #f6f9fb; */
        display: block;
        overflow: hidden;
    }

    #msform {
        text-align: center;
        position: relative;
        padding-top: 10px;
        /* min-height: 150px;   */
        max-width: 810px;
        margin: 0 auto;
        background: #f8f9fa !important;
        z-index: 1; 
    }

    #progressbar {
        /* margin-bottom: 30px; */
        overflow: hidden;  
        
    } 

    .multi_step_form li {
        list-style-type: none !important;
        color: #99a2a8;   
        font-size: 20px;
        width: calc(100%/5);
        float: left;
        position: relative; 
        font: 500 13px/1 sans-serif; 
    }

    .multi_step_form li:nth-child(2)::before{
      content: "\f00c";
    }
    .multi_step_form li:nth-child(3)::before{
      content: "\f00c";
    }

    .multi_step_form li:before {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f00c";
        font-size: 15px;
        width: 30px;
        height: 30px;
        line-height: 35px;
        display: block; 
        background: #d6dfe3;
        border-radius: 50%;
        margin: 10px auto 20px auto;
        } 
    .multi_step_form li:after {
            content: '';
            width: 100%;
            height: 10px;
            background: #cdd2d5;
            position: absolute;
            left: -50%;
            top: 21px;
            z-index: -1; 
        } 
    .multi_step_form li:last-child:after{width: 150%;}
    .multi_step_form li.active{
            color: #5cb85c;
        }
    .multi_step_form li.active:before, li.active:after{
            background: #5cb85c;
            color: white;
        }
  </style>
<style>
  .text-dark-blue {
    color: #3fa1c6;
  }
</style>
<div class="contact">
  <div class="container ">
      <div class="row justify-content-center mb-5 py-4 my-3 ">
        <div class="col-lg-4 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="text-center mb-3">
                <img class="img-profile rounded-circle mr-2" width="100" height="100" src="https://ui-avatars.com/api/?name=<?= $this->session->nama ?>">
              </div>

              <!-- <h4 class="card-title">Title</h4> -->
              <p class="card-text"><?= $this->session->nama ?>
              <br>
              <b><?= $this->session->username ?></b>
              </p>
              <!-- chat penjual -->
              <a href="<?= base_url('chat/create_chat') ?>" class="btn btn-primary btn-block">Chat Penjual</a>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
          <h6 class="border-bottom border-gray pb-2 mb-0">Riwayat</h6>
          <!-- foreach transaksi -->
          <?php $this->load->model(['model']); ?>
          <?php foreach($transaksi as $t): ?>
          <div class="media text-muted pt-3">
            <?php
            // color red if status is 0
            if($t->status == 1){
              $color = "#28a745";
              $status = "Selesai";
            }else{
              $color = "#dc3545";
              $status = "Belum Selesai";
            };

            $rp = 'Rp. ' . number_format($t->total_transaksi,0,",",".");

            $jam = date('H:i', strtotime($t->jam_transaksi));
            $tanggal = date('d-m-Y', strtotime($t->tgl_transaksi));

            $progress = $this->model->get_by('transaksi_status', 'id_transaksi_s', $t->id_transaksi)->result_array();
            ?>
            <svg class="bd-placeholder-img bg-danger mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="<?= $color ?>"></rect><text x="50%" y="50%" fill="<?= $color ?>" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark"><?= $t->paket_transaksi ?> x <?= $t->berat_jumlah?></strong>
                <span href="#"><?= $tanggal ?></span>
              </div>
              <p class=""><?=$rp?></p>
              <div class="row">
                <div class="col-2">
                  <span class="d-block">
                    <!-- <?=$status?> -->
                  </span>
                </div>
                <div class="col-12">
                <section class="multi_step_form bg-light pb-4">  
                    <div id="msform"> 
                      <ul id="progressbar">
                        <li class="<?=($progress[0]['cuci']=='1')?'active':'';?>">Proses Cuci</li>  
                        <li class="<?=($progress[0]['kering']=='1')?'active':'';?>">Proses Pengeringan</li> 
                        <li class="<?=($progress[0]['strika']=='1')?'active':'';?>">Strika</li>
                        <li class="<?=($progress[0]['siap']=='1')?'active':'';?>">Siap diambil</li>
                        <li class="<?=($progress[0]['selesai']=='1')?'active':'';?>">Selesai</li>
                      </ul>
                    </div>  
                  </section>
                </div>
              </div>

              
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        </div>
      </div>
    </div>
  </div>
<!-- End Contact -->

