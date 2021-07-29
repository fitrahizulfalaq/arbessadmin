<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('video');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Kategori</label>
              <select name="kategori_id" class="form-control select2" id="kategori_id" required>
                <option value="<?= set_value('kategori_id');?>">Pilihan : </option>
                <?php
                  foreach ($this->fungsi->pilihan("cat_video")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->deskripsi?></option>
                <?php }?>
              </select>
              <?php echo form_error('kategori_id')?>
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
              <label>Deskripsi</label>
              <div class="input-group mb-3">
                <textarea class="form-control" rows="3" name="deskripsi" id="summernote" required style="width: 100%"><?php echo form_error('deskripsi')?></textarea>                
              </div>                                                                  
            </div>                        
            <div class="form-group">
              <label>Foto</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
              <small>Maksimal ukuran file 514 Kb</small>                     
            </div>
            <div class="form-group">
              <label>Kode Youtube</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-anchor"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="link" placeholder="Ex: Pengumuman Pendataan Alumni" value="<?= set_value('link');?>">
              </div>                            
              <?php echo form_error('link')?>                        
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
                <input type="date" class="form-control" name="created" placeholder="Ex: Pengumuman Pendataan Alumni" value="<?= set_value('created');?>" required>
              </div>                            
              <?php echo form_error('created')?>                        
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
