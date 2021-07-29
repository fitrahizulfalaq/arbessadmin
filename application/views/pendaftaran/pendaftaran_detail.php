<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('pendaftaran');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>

    <?php $this->view('message'); ?>

    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-orange card-outline">
          <div class="card-body box-profile">

            <h2 class="text-center"><?=$row->nama?></h2>
            <p class="text-muted text-center"><?= ucfirst($this->fungsi->pilihan("tb_tipe_user",$row->tipe_user)->row("deskripsi"))?></p>
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
                <b>Agama</b> <a class="float-right"><?=$row->agama?></a>
              </li>
              <li class="list-group-item">
                <b>Kelamin</b> <a class="float-right"><?= $row->kelamin?></a>
              </li>
              <li class="list-group-item">
                <b>HP</b> <a class="float-right text-muted" href="http://wa.me/+62<?=$row->hp?>">+62 <?=$row->hp?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?=$row->email?></a>
              </li>
              <li class="list-group-item">
                <b>Pernikahan</b> <a class="float-right"><?= $row->pernikahan ?></a>
              </li>              
              <li class="list-group-item">
                <b>Asal</b> <a class="float-right"><?= $this->fungsi->get_deskripsi_advanced("villages","id",$row->kelurahan,"name")?>, <?= $this->fungsi->get_deskripsi_advanced("districts","id",$row->kecamatan,"name")?> , <?= $this->fungsi->get_deskripsi_advanced("regencies","id",$row->kota,"name")?> , <?= $this->fungsi->get_deskripsi_advanced("provinces","id",$row->provinsi,"name")?></a>
              </li>
            </ul>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Lengkap Domisili</strong>
            <p class="text-muted"><?=$row->domisili?> <br> <a class="btn btn-sm btn-info" href="https://www.google.com/maps/search/<?=$row->domisili?>">Lihat Maps</a></p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Pendidikan Terakhir</b> <a class="float-right"><?=$row->pendidikan_terakhir?></a>
              </li>
              <li class="list-group-item">
                <b>Pekerjaan Utama</b> <a class="float-right"><?= $this->fungsi->get_deskripsi("tb_pekerjaan",$row->pekerjaan_utama)?></a>
              </li>
              <li class="list-group-item">
                <b>Keanggotaan</b> <a class="float-right"><?= $this->fungsi->get_deskripsi("tb_kategori_keanggotaan",$row->keanggotaan)?></a>
              </li>
              <li class="list-group-item">
                <b>Tahun Bergabung</b> <a class="float-right"><?= $row->tahun_bergabung?></a>
              </li>
              <li class="list-group-item">
                <b>Alasan</b> <a class="float-right"><?= $this->fungsi->pilihan("tb_alasan",$row->alasan)->row("deskripsi")?></a>
              </li>
              <li class="list-group-item">
                <b>Diajukan tanggal</b> <a class="float-right"><?= date('d - m - Y',strtotime($row->created))?></a>
              </li>                                         
            </ul>
            <!-- End Biodata Diri -->

            <!-- Button Edit -->
            <?php if ($this->session->tipe_user >= 3) { ?> 
            <div class="text-center">
              <a href="<?= site_url('pendaftaran/acc/'.$row->id);?>" class="btn btn-sm btn-success"><i class='fas fa-check'></i> ACC Pendaftar</a>
              <a href="<?= site_url('pendaftaran/hapus/'.$row->id);?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i> Tolak Pendaftar</a>
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
