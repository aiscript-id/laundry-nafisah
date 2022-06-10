<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data <?=$section?></h1>
<?=$this->session->flashdata('flash') ?>
  <!-- DataTales Example -->
  <div class="row justify-content-center">
    <div class="col-7">
      <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-header mb-4">
          <h6 class="card-title mb-0"><?= $chat->nama ?>
          <a href="<?=base_url('admin/chat') ?>" class="btn btn-sm btn-white float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </h6>
          <!-- kembali -->
        </div>
        <div class="card-body" >
        <!-- message chat -->
        <div class="row" id="chat-body" style="height: 300px; overflow-y:scroll; overflow-x:hidden">
        <?php foreach ($messages as $msg):?>
            <div class="col-md-8 <?php if($msg->side == '2') : echo ''; else : echo 'offset-4'; endif;  ?>">
              <div class="card mb-0">
                <div class="card-body p-1 px-2">
                  <div class="row">
                    <div class="col-md-10">
                      <p class="card-text mb-0"><?= $msg->message?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" <?php if($msg->side == '2') : echo ''; else : echo 'text-right'; endif;  ?>">
                <small class="text-muted" style="font-size: 7pt;"><?= $msg->created_at?></small>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="card-footer">
          <!-- create message -->
          <form action="<?= base_url('admin/chat/send_message/'.$chat->user_id) ?>" method="post">
            <!-- input with button send -->
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Type your message here..." name="message">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Send</button>
              </div>
            </div>
          
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var scrolled = false;
  function updateScroll(){
      if(!scrolled){
          var element = document.getElementById("chat-body");
          element.scrollTop = element.scrollHeight;
      }
  }

  $("#chat-body").on('scroll', function(){
      scrolled=true;
  });
</script>