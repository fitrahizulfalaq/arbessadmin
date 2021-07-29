<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>

    <?php $this->view('message'); ?>

    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-info card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="<?=base_url()?>/assets/dist/img/foto-user/<?= ($row->foto != null) ? $row->foto : "foto-default.png"; ?>"
                   alt="User profile picture" style="width: 150px; height: 150px">
            </div>

            <h3 class="profile-username text-center"><?=$row->nama?></h3>
            <p class="text-muted text-center"><?= ucfirst($this->fungsi->pilihan("tb_tipe_user",$this->session->tipe_user)->row("deskripsi"))?></p>
            <!-- Biodata Diri -->
            <h5>Biodata Diri</h5>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Username</b> <a class="float-right"> <?=$row->username?></a>
              </li>
              <li class="list-group-item">
                <b>TTL</b> <a class="float-right"><?=$row->tempat_lahir?>, <?= date('d-m-Y',strtotime($row->tgl_lahir))?></a>
              </li>
              <li class="list-group-item">
                <b>Kelamin</b> <a class="float-right"><?= $row->kelamin ?></a>
              </li>
              <li class="list-group-item">
                <b>HP</b> <a class="float-right text-muted" href="http://wa.me/+62<?=$row->hp?>">+62 <?=$row->hp?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?=$row->email?></a>
              </li>
            </ul>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Lengkap Domisili</strong>
            <p class="text-muted"><?=$row->domisili?> <br> <a class="btn btn-sm btn-info" href="https://www.google.com/maps/search/<?=$row->domisili?>">Lihat Maps</a></p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Diajukan tanggal</b> <a class="float-right"><?= date('d - m - Y',strtotime($row->created))?></a>
              </li>                                         
            </ul>
            <!-- End Biodata Diri -->

            <!-- Button Edit -->
            <?php if ($row->id == $this->session->id) { ?> 
            <div class="text-center">
              <a href="<?= site_url('profil/edit/'.$row->id);?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i><b> Edit</b></a>              
            </div>           
            <?php } ?>
            <!-- End Button -->

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->        
      </div>      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
