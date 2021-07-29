<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= $url; ?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Download</a>          
      <a href="<?= base_url('tugas');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>
    <?php $this->view('message'); ?>
    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-info card-outline">
          <div class="card-body box-profile">
            <div class="text-justify">
              <iframe frameborder="0" src="<?= 'https://docs.google.com/viewer?url=' . $url . '&embedded=true'?>" allow allowfullscreen height="800px" width="100%">Sedang Meload</iframe>
              refresh bila tidak muncul
            </div>
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
