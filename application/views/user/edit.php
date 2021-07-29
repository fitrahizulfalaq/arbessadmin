<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('user');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Username</label>
              <div class="input-group mb-3">
                <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
                <input type="text" class="form-control" name="username" placeholder="username" value="<?= $this->input->post('username') ?? $row->username ?>" readonly required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-users"></span>
                  </div>
                </div>
              </div>                            
              <?php echo form_error('username')?>                        
            </div>
            <div class="form-group">
              <label>Password</label><small> (Kosongkan bila tidak diganti)</small>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Ex: Maksimal 20 digit" minlength="8" maxlenght="50" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock" onclick="showPassword()"></span>
                  </div>
                </div>
              </div>                            
              <?php echo form_error('password')?>                        
            </div>
            <div class="form-group">
              <label>Nama</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="nama" placeholder="Ex: Fitrah Izul Falaq" value="<?= $row->nama?>" minlength="6" maxlenght="50" required>
              </div>                            
              <?php echo form_error('nama')?>                        
            </div>
            <div class="form-group">
              <label>Kota Kelahiran</label>
              <input type="text" class="form-control" name="tempat_lahir" placeholder="Ex: Kota Probolinggo" value="<?= $row->tempat_lahir?>" minlength="3" maxlenght="50" required>
            </div>
            <div class="form-group">
              <label>Tanggal lahir</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span><i class="fas fa-building"></i></span></div></div>
                <input type="date" class="form-control" name="tgl_lahir" placeholder="Ex: 09/01/1998" value="<?= $row->tgl_lahir?>" required>
              </div>                            
              <?php echo form_error('tgl_lahir')?>                        
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="kelamin" class="form-control" required>
                <option value="<?= $row->kelamin?>">Pilihan : <?= $row->kelamin?></option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <?php echo form_error('kelamin')?>
            </div>
            <div class="form-group">
              <label>HP</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span>+62</span></div></div>
                <input type="number" class="form-control" name="hp" placeholder="Ex: 85231519519" value="<?= $row->hp?>" minlength="11" maxlenght="50" required>
              </div>                            
              <?php echo form_error('hp')?>                        
            </div>
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="domisili" placeholder="Ex: Jl. Semarang No. 5, Sumbersari, Klojen, Kota Malang" value="<?= $row->domisili?>" minlength="30" maxlenght="100" required>
              </div>                            
              <?php echo form_error('domisili')?>                        
            </div>
            <?php if($row->foto != null) {?>
            <div>
              <img src="<?=base_url('assets/dist/img/foto-user/'.$row->foto)?>" style="width: 10%"><br>
              <input type="hidden" name="foto" value="<?= $this->input->post('foto') ?? $row->foto; ?>">
              <a href="<?= site_url('user/hapusfoto/'.$row->id);?>"><small>Hapus foto?</small></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>Foto</label>
              <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
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

<script type="text/javascript">
  function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>