
  <style type="text/css">
    .multi_step_form{
        background: #f6f9fb;
        display: block;
        overflow: hidden;
    }

    #msform {
        text-align: center;
        position: relative;
        padding-top: 50px;
        min-height: 150px;  
        max-width: 810px;
        margin: 0 auto;
        background: #f8f9fa !important;
        z-index: 1; 
    }

    #progressbar {
        margin-bottom: 30px;
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

    .multi_step_form li:nth-child(2)::before{content: "\f00c";}
    .multi_step_form li:nth-child(3)::before{content: "\f00c";}

    .multi_step_form li:before {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f00c";
        font-size: 25px;
        width: 50px;
        height: 50px;
        line-height: 50px;
        display: block; 
        background: #d6dfe3;
        border-radius: 50%;
        margin: 0 auto 10px auto;
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

  <!-- Search -->
  <section class="py-5">
    <div class="container pt-5">
      <div class="row">
        <div class="col">
          <!-- register -->
          <h3>Register</h3>
          <form class="user" method="POST" action="<?=base_url('user/auth/save')?>">
              <div class="form-group mb-3">
                <label class="text-dark">Nama</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap..." name="nama" value="<?=set_value('nama') ?>">
                <?=form_error('nama', "<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 ">
                  <div class="form-group">
                    <label class="text-dark">Username</label>
                    <input type="text" class="form-control" placeholder="Username..." name="username" value="<?=set_value('username') ?>">
                    <?=form_error('username',"<small class='text-danger'>",'</small>') ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-dark">Whatsapp</label>
                    <input type="text" class="form-control" placeholder="Nomer Whatsapp..." name="whatsapp" value="<?=set_value('whatsapp') ?>">
                    <?=form_error('whatsapp',"<small class='text-danger'>",'</small>') ?>
                  </div>
                </div>
              </div>
              <div class="form-group row pb-3">
                <div class="col-sm-6 ">
                  <label class="text-dark">Password</label>
                  <input type="password" class="form-control" placeholder="Password.." name="password1">
                   <?=form_error('password1',"<small class='text-danger'>",'</small>') ?> 
                </div>
                <div class="col-sm-6">
                  <label class="text-dark">Ulangi Password</label>
                  <input type="password" class="form-control" placeholder="Ulangi password.." name="password2">
                </div>
              </div>

              <hr>
              <div class="d-flex text-right">
              <button type="submit" class="btn btn-primary mr-3">Simpan</button>
              </div>
            </form>  


        </div>
      </div>
    </div>  
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>