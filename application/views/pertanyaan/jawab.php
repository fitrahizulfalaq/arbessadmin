<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('pertanyaan');?>" class="btn btn-info float-right"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label>Pertanyaan</label>              
              <textarea class="form-control" name="pertanyaan" readonly=""><?= $row->pertanyaan ?></textarea>
              <label>Jawaban</label>              
              <input type="hidden" class="form-control" name="id" value="<?= $this->input->post('id') ?? $row->id ?>">
              <textarea class="form-control" name="jawaban"><?= $this->input->post('jawaban') ?? $row->jawaban ?></textarea>
              <?php echo form_error('jawaban')?>                        
            </div>                                                           
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Jawab</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>