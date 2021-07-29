<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label>Link</label>
              <input type="hidden" class="form-control" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">              
              <input type="link" class="form-control" name="link" placeholder="https://google.com" required="" value="<?= $this->input->post('link') ?? $row->link ?>">
              <?php echo form_error('link')?>                        
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm"><?=$menu?></button>
            <button type="reset" class="btn btn-danger btn-sm">Ulangi</button>
            <a href="<?= base_url("embed")?>" class="btn btn-info float-right btn-sm">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>