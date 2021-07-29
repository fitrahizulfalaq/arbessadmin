<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <?php if ($this->fungsi->user_login()->tipe_user == "1") {;?>
        <a href="javascript:history.back()" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
        <?php } else {?>
        <a href="<?=base_url('video/tambah');?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a>          
        <a href="<?=base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
        <?php }?>
      </div>

      <?php        
        foreach ($row->result() as $key => $data) {;
      ?>
      <div class="col-md-3 float-md-left">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-rounded" src="<?= base_url()?>assets/dist/img/foto-video/<?= ($data->foto != null) ? $data->foto : "foto-default.png"; ?>" alt="User profile picture" style="width: 300px; height: 200px">
          </div>

          <h3 class="profile-username text-center"><?=$data->judul?></h3>

          <p class="text-muted text-center">
            <i class="fas fa-user"></i> <?= $this->fungsi->pilihan_selected("tb_user",$data->user_id)->row("nama")?> 
          </p>          

          <center>
          <a href="<?= site_url('video/detail/'.$data->id);?>" class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i><b> Lihat</b></a>
          
          <?php if ($this->fungsi->user_login()->tipe_user < 2) { } else {;?> 
          <a href="<?= site_url('video/edit/'.$data->id);?>" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i><b> Edit</b></a>
          <a href="<?= site_url('video/hapus/'.$data->id);?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah yakin mau dihapus?')"><i class="fas fa-trash"></i><b> Hapus</b></a>
          </center>
          <?php } ?>
        </div>
        <!-- /.card-body -->
      </div>
    </div>    
    <?php }?>      
    <div class="col-12">
      <?= $this->pagination->create_links(); ?>
    </div>
  </div>
</section>