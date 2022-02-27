
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data <?php echo $title ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No.HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                                                        <?php
                                                            $no=1;
                                                            foreach($hasil as $data){
                                                        ?>
                  <tr>
                  <td><?php echo $no++ ?></td>
                    <td><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></td>
                    <td><?php echo htmlentities($data->email_pelanggan, ENT_QUOTES, 'UTF-8');?></td>
                    <td><?php echo htmlentities($data->hp, ENT_QUOTES, 'UTF-8');?></td>
                    <td><?php echo htmlentities($data->alamat, ENT_QUOTES, 'UTF-8');?></td>
                    <td><a href="<?php echo base_url('admin/hapus_pelanggan/'.$data->id); ?>" class="btn btn-danger" onclick="hapus()" ><i class="fas fa-trash"></i> Hapus</a></td>
                  </tr>
                                                        <?php
                                                            }
                                                        ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           </div> 
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->