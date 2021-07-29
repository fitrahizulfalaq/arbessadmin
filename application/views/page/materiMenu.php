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
            <a href="<?= base_url('page/embed/kurikulum')?>">
            <img src="<?= base_url("")?>/assets/dist/img/kurikulum.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('page/embed/kurikulum')?>" class="small-box-footer">
            Kurikulum
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('modul')?>">
            <img src="<?= base_url("")?>/assets/dist/img/modul.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('modul')?>" class="small-box-footer">
            Modul Materi
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content