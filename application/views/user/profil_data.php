<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= ($row->id == $this->session->userdata("id")) ? base_url('') : base_url('user');?>" class="btn btn-info float-right"><i class="fas fa-backward"></i> Kembali</a>          
    </div>

    <?php $this->view('message'); ?>

    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-orange card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="<?=base_url()?>/assets/dist/img/fotouser/<?= ($row->foto != null) ? $row->foto : "foto-default.png"; ?>"
                   alt="User profile picture" style="width: 150px; height: 150px">
            </div>


            <h3 class="profile-username text-center"><?=$row->nama?></h3>

            <p class="text-muted text-center"><?= ucfirst($this->fungsi->tipe_user($row->tipe_user)->row("deskripsi"))?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>TTL</b> <a class="float-right"><?=$row->tempat_lahir?>, <?= date('d-m-Y',strtotime($row->tgl_lahir))?></a>
              </li>
              <li class="list-group-item">
                <b>Keanggotaan</b> <a class="float-right"><?=$row->fakultas?> / <?=$row->jurusan?> / <?=$row->prodi?></a>
              </li>
              <li class="list-group-item">
                <b>Tahun Masuk</b> <a class="float-right"><?=$row->tahun_masuk?></a>
              </li>
              <li class="list-group-item">
                <b>Tahun Lulus</b> <a class="float-right"><?=$row->tahun_lulus?></a>
              </li>
              <li class="list-group-item">
                <b>Telepon</b> <a class="float-right"><?=$row->telp?></a>
              </li>
              <li class="list-group-item">
                <b>HP</b> <a class="float-right">+62 <?=$row->hp?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?=$row->email?></a>
              </li>
              <li class="list-group-item">
                <b>Facebook</b> <a class="float-right"><?=$row->facebook?></a>
              </li>
              <li class="list-group-item">
                <b>Domisili Asal</b> <a class="float-right"><?=$row->alamat_asal?></a>
              </li>
              <li class="list-group-item">
                <b>Domisili Sekarang</b> <a class="float-right"><?=$row->alamat_domisili?></a>
              </li>
              <li class="list-group-item">
                <b>Pekerjaan</b> <a class="float-right"><?=$row->pekerjaan?></a>
              </li>
              <li class="list-group-item">
                <b>Gaji Per Bulan</b> <a class="float-right"><?=$row->gaji_perbulan?></a>
              </li>
              <li class="list-group-item">
                <b>Nama Kantor</b> <a class="float-right"><?=$row->nama_kantor?>, <?=$row->kota_kantor?></a>
              </li>
              <li class="list-group-item">
                <b>Agama</b> <a class="float-right"><?=$row->agama?></a>
              </li>
              <li class="list-group-item">
                <b>Status</b> <a class="float-right"><?= $row->status == 1 ? "<span class='badge bg-warning'>Aktif</span>" : "<span class='badge bg-success'>Tidak Aktif</span>"?></a>
              </li>
              <li class="list-group-item">
                <b>Bergabung Sejak</b> <a class="float-right"><?=$row->created?></a>
              </li>
              <li class="list-group-item">
                <b>Username</b> <a class="float-right"> <?=$row->username?></a>
              </li>
            </ul>

          </div>
          <!-- /.card-body -->
          <div class="card-body">

          <center>           
          <?php if ($row->id == $this->fungsi->user_login()->id or $this->session->userdata('tipe_user') >= $row->tipe_user) { ?>            
          <a href="<?= site_url('user/edit/'.$row->id);?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i><b> Edit</b></a>
          </center>
          <?php } ?>

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
