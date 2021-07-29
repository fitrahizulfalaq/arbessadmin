<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('materi');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Pertemuan Ke</label>
              <input type="text" class="form-control" value="Pertemuan ke - <?= $row->pertemuan_id ?>" readonly>
            </div>
            <div class="form-group">
              <label>Judul</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
                <input type="text" class="form-control" name="judul" placeholder="Ex: Pendataan Keanggotaan Alumni" value="<?= $this->input->post('judul') ?? $row->judul ?>" required>
              </div>                            
              <?php echo form_error('judul')?>                        
            </div>            
            <?php if($row->file != null) {?>
            <div>
              <h4>File : <a href="<?= base_url('assets/dist/img/file-materi/'.$row->file)?>" class="text-primary"><?= $this->input->post('file') ?? $row->file; ?></h4>
              <a href="<?= site_url('materi/hapusfile/'.$row->id);?>"><small>Hapus file?</small></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>File</label>
              <input type="file" class="form-control" accept=".doc,.docx,.pdf,.ppt,.pptx" name="file" required="">
              <small>Maksimal ukuran file 514 Kb</small>
              <br>                     
            </div>            
            <?php } ?>            
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
