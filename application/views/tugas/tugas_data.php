<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <?php $this->view('message'); ?>

      <div class="card-header">          
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>

      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="full">
            <thead>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td width="5%"><?= $data->pertemuan_id ?></td>
                  <td width="15%"><?= $data->nama ?> <br> <?= $data->nim ?></td>
                  <td width="10%">                    
                    <a href="<?= site_url('tugas/detail/'.$data->id);?>" class="btn btn-sm btn-warning"><i class='fas fa-eye'></i></a>
                    <a href="https://inobelum-arbes.com/tugas/hapustugas/<?= $data->id?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a>
                  </td>
                </tr>
              <?php }?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --