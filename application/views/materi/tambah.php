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
              <label>Petemuan ID</label>
              <div class="input-group mb-3">
                <select name="pertemuan_id" class="form-control" required>
                    <option value="<?= set_value('pertemuan_id'); ?>">Pilih : <?= set_value('pertemuan_id'); ?></option>
                    <?php
                      foreach ($this->fungsi->pilihan("tb_pertemuan")->result() as $key => $pilihan) {;
                    ?>
                    <option value="<?= $pilihan->id?>"><?= $pilihan->deskripsi?></option>
                    <?php }?>
                  </select>
              </div>                            
              <?php echo form_error('judul')?>                        
            </div>
            <div class="form-group">
              <label>Judul</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="judul" placeholder="Ex: Pengumuman Pendataan Alumni" value="<?= set_value('judul');?>" required>
              </div>                            
              <?php echo form_error('judul')?>                        
            </div>
            <div class="form-group">
              <label>File</label>
              <input type="file" class="form-control" accept=".doc,.docx,.pdf,.ppt,.pptx" name="file" required="">
              <small>Maksimal ukuran file 4 Mb</small>                     
            </div>            
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Tambah</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>
