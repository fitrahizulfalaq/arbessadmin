<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card">
        <div class="mailbox-controls with-border text-center">
          <iframe class="rounded" width="100%" height="500px" src="https://www.youtube.com/embed/<?= $data->link?>?rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="card card-primary card-outline">
        <div class="mailbox-read-message">
          <h4><?= $data->judul?></h4>
          <p>
            <?= $data->deskripsi?>
          </p>                
        </div>          
        <!-- /.card-footer -->
        <div class="card-footer">
          <div class="float-right">
            <a class="btn btn-primary btn-sm" href="javascript:window.history.back()"><i class="fas fa-reply"></i> Kembali</a>
          </div>
          <?php if ($this->fungsi->user_login()->tipe_user < 2) { } else {;?>
          <a href="<?= site_url('video/hapus/'.$data->id);?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin mau dihapus?')"><i class="far fa-trash-alt"></i> Hapus</a>
          <a href="<?= site_url('video/edit/'.$data->id);?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Edit</a>
          <?php } ?>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->