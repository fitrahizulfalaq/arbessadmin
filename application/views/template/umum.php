<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $menu?></title>

  <!-- Ikon -->
  <link rel="shortcut icon" href="<?=base_url()?>/assets/dist/img/favicon.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url()?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition layout-top-nav layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-green navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <div class="image">
          <a href="<?=base_url()?>"><img src="<?=base_url()?>/assets/dist/img/logo-lembaga.png" style="width: 180px; height: 55px;" alt="User Image"></a>
        </div>
      </li>           
    </ul>
  </nav>
  <!-- /.navbar -->

  <div class="content-wrapper" style="background-image: url(<?= base_url('/assets/dist/img/tiles-transparan.jpg')?>); background-repeat: repeat; background-attachment: fixed;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col"></div>
          <div class="col-lg-12">
          <?= $contents ?>      
          </div>
          <div class="col"></div>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer d-none d-sm-inline-block">
    <strong>&copy; <?= date("Y")?> <a href="http://fitrahizulfalaq.blogspot.com"><?= ucfirst($this->fungsi->pilihan_advanced("setting","kode","pengembang")->row("keterangan"))?></a>.</strong>.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> <?= ucfirst($this->fungsi->pilihan_advanced("setting","kode","versi")->row("keterangan"))?>
    </div>
  </footer>

  <footer class="main-footer text-center bg-success d-lg-none">
    <div class="row text-white">
      <div class="col"><a class="text-white" href="<?= base_url('profil')?>"><i class="fas fa-user-cog"></i></a></div>
      <div class="col"><a class="text-white" href="<?= base_url('')?>"><i class="fas fa-home"></i></a></div>
      <div class="col"><a class="text-white" href="<?= base_url('page/tentang')?>"><i class="fas fa-info"></i></a></div>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url()?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>/assets/dist/js/adminlte.min.js"></script>

<!-- Select2 -->
<script src="<?=base_url()?>/assets/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  })
</script>


<?php
  // Script JS Tambahan
  if ($this->uri->segment(1)=="pendaftaran") {
    $this->load->view("script/pendaftaran");
  }
?>


</body>
</html>