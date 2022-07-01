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
<!-- End Contact -->

<div class="container mt-4 pt-4">
  <div class="row justify-content-center">
    <div class="col-7">
      <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-header mb-4">
          <h6 class="card-title mb-0">Admin Laundry Napisah
            <a href="<?=base_url('dashboard') ?>" class="btn btn-sm btn-white float-right"><i class="fa fa-arrow-left"></i> Kembali</a>

            
          </h6>
        </div>
        <div class="card-body">
        <!-- message chat -->
        <!-- <div class="row"> -->
        <div class="row" id="chat-body" style="height: 300px; overflow-y:scroll; overflow-x:hidden">

        <?php foreach ($messages as $msg):?>
            <div class="col-md-8 <?php if($msg->side == '1') : echo ''; else : echo 'offset-4'; endif;  ?> mb-3">
              <div class="card mb-0">
                <div class="card-body p-1 px-2">
                  <div class="row">
                    <div class="col-md-10">
                      <p class="card-text mb-0"><?= $msg->message?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" <?php if($msg->side == '1') : echo ''; else : echo 'text-right'; endif;  ?>">
                <small class="text-muted" style="font-size: 7pt;"><?= $msg->created_at?></small>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="card-footer">
          <!-- create message -->
          <form action="<?= base_url('user/chat/send_message') ?>" method="post">
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

