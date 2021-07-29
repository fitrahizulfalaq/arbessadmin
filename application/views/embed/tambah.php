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
              <label>Username</label>              
              <input type="text" class="form-control" name="username" placeholder="Masukkan user" required="" value="<?= set_value('username'); ?>">
              <?php echo form_error('username')?>                        
            </div>
            <div class="form-group">
              <label>Password</label>              
              <input type="password" class="form-control" name="password" placeholder="Masukkan password" required="" value="<?= set_value('password'); ?>">
              <?php echo form_error('password')?>                        
            </div>
            <div class="form-group">
              <label>Rayon</label>
              <select class="form-control" name="nama" required="">
                <?php
                  foreach ($nama->result() as $key => $data) {;
                ?>
                <option value="<?= $data->nama?>"><?= $data->nama?></option>
                <?php }?>
                <option value="Komisariat">Komisariat</option>
              </select>
              <?php echo form_error('nama')?>
            </div>                                   
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success"><?=$menu?></button>
            <button type="reset" class="btn btn-danger">Ulangi</button>
            <a href="<?=base_url();?>pengurus" class="btn btn-info float-right">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>