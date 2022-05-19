<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laundry Nafisah - Landing Page</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url('assets/users/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?=base_url('assets/users/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/users/')?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=base_url('assets/users/')?>css/landing-page.css" rel="stylesheet">

   <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>

  <style type="text/css">
    /* nav .active { color: #3fa1c6 !important; } */
  </style>

</head>

<body>
<?php $hal    = $this->uri->segment(1); ?>

  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top p-3 shadow">
      <div class="container">
        <a class="navbar-brand font-weight-bold " href="<?=base_url('')?>">Laundry Nafisah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link font-weight-bold <?=($hal=='')?'active':''; ?>" href="<?=base_url('')?>">Home</a>
            <a class="nav-item nav-link font-weight-bold <?=($hal=='tarif')?'active':''; ?>" href="<?=base_url('tarif')?>">Daftar Tarif</a>
            <a class="nav-item nav-link font-weight-bold <?=($hal=='cari')?'active':''; ?>" href="<?=base_url('cari')?>">Cari</a>
            <a class="nav-item nav-link font-weight-bold <?=($hal=='kontak')?'active':''; ?>" href="<?=base_url('kontak')?>">Kontak</a>
            <!-- to id signup  -->
            <?php if ($this->session->userdata('masuk') != TRUE) { ?>
              <!-- slow down animated to signup -->
              <a class="nav-item nav-link font-weight-bold <?=($hal=='auth')?'active':''; ?>" href="<?=base_url('auth')?>">Login</a>
            <?php } else { ?>
              <!-- dropdown logout -->
              <div class="dropdown">
                <a class="nav-item nav-link font-weight-bold dropdown-toggle <?=($hal=='dashboard')?'active':''; ?>" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?=$this->session->userdata('nama')?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?=base_url('dashboard')?>">Dashboard</a>
                  <a class="dropdown-item" href="<?=base_url('user/auth/logout')?>">Logout</a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>

    <?php 
      if(!defined('BASEPATH')) exit ('No direct script access allowed');
      if($content){$this->load->view($content);}
    ?>


  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url('assets/users/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/users/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Page data table -->
  <script src="<?=base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url('assets/') ?>js/demo/datatables-demo.js"></script>

</body>

</html>
