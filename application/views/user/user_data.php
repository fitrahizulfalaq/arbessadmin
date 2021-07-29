<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    <?php $this->view('message') ?>     
    <div class="col-12">     
      <div class="card-header">          
        <a href="<?=site_url('user/tambah/')?>" class="btn btn-success btn-sm"><i class='fas fa-plus'></i> Tambah</a>
        <a href="<?=base_url("");?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
      </div>

      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped" id="example3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Hp</th>
                    <th>Tipe</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
                <tr>
                  <td scope="row"><?= $no++?></td>
                  <td scope="row"><?= $data->nama?> <br> <small><?= $data->email?> </small></td>
                  <td scope="row"><?= $data->hp ?></td>
                  <td scope="row"><?= $this->fungsi->get_deskripsi("tb_tipe_user",$data->tipe_user) ?></td>
                  <td>                    
                    <a href="<?= site_url('user/edit/'.$data->id);?>" class="btn btn-sm btn-warning btn-sm"><i class='fas fa-edit'></i></a>
                    <a href="<?= site_url('user/hapus/'.$data->id);?>" class="btn btn-sm btn-danger btn-sm" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a>
                  </td>
                </tr>
              <?php }?>
            </tbody>             
          </table>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <span class="tableTools-container btn btn-sm"></span>
        </div>

      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
