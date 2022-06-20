<!-- Masthead -->
    <section class="call-to-action bg-white text-center scroll-down" id="signup">
      <div class="container position-relative">
          <div class="row justify-content-center">
              <div class="col-xl-6">
                  <h2 class="mb-4">Login</h2>
                  <form class="user" method="POST" action="<?=base_url('user/auth/login')?>"> 
                    <?=$this->session->flashdata('flash') ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Your Username..." name="username" value="<?=set_value('username')?>" required>
                      <?= form_error('username',"<small class='text-danger ml-3'>","</small>")  ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" id="exampleInputPassword" placeholder="Password" name="password" required>
                      <?=form_error('password',"<small class='text-danger ml-3'>","</small>")?>
                    </div>
                    <!-- inline button login and register -->
                    <button type="submit" class="btn btn-primary px-5 btn-lg btn-block ">Login</button>
                    <a href="<?=base_url('user/auth/register')?>" class="btn btn-link btn-block px-5 mt-3"> Belum punya akun? Register</a>
                  </form>

                  <p>Jika lupa password. Hubungi Admin</p>

              </div>
          </div>
      </div>
    </section>


<!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
  function inputAngka(evt){
      var charCode = (evt.charCode);
      if(charCode>31 && (charCode<48 || charCode>57) && charCode!=45) { return false; } else { return true; }
  }
</script>