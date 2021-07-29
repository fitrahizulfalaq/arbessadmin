<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  <?php $this->view('message') ?>     
    <div class="row">      
      <!-- Menu-->
      <div class="col-lg-2 col-4">      	
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('profil')?>">
            <img src="<?= base_url("")?>/assets/dist/img/profil.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('profil')?>" class="small-box-footer">
            Profil
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('materi')?>">
            <img src="<?= base_url("")?>/assets/dist/img/materi.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('materi')?>" class="small-box-footer">
            Materi
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('pertanyaan')?>">
            <img src="<?= base_url("")?>/assets/dist/img/pertanyaan.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('pertanyaan')?>" class="small-box-footer">
            Pertanyaan
          </a>
        </div>
      </div>
      <!-- Menu-->
      <div class="col-lg-2 col-4">        
        <!-- small card -->
        <div class="small-box bg-white">
          <div class="inner text-center">
            <a href="<?= base_url('tugas')?>">
            <img src="<?= base_url("")?>/assets/dist/img/tugas.png" alt="" width="100%">
            </a>
          </div>          
          <a href="<?= base_url('tugas')?>" class="small-box-footer">
            Tugas
          </a>
        </div>
      </div>      
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content