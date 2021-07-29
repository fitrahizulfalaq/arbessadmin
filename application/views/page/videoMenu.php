<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('page/kursusMenu');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>
    <?php $this->view('message') ?>    
    <div class="row">      
      <!-- Menu-->
      <div class="col-lg-2 col-4">      	
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/videoSeni')?>">
            <img src="<?= base_url("")?>/assets/dist/img/videoSeni.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/videoSeni')?>" class="small-box-footer">
            Seni
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('page/videoTeknikDasar')?>">
            <img src="<?= base_url("")?>/assets/dist/img/videoTeknikDasar.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/videoTeknikDasar')?>" class="small-box-footer">
            Teknik Dasar
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content