
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
                    <th>No. pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Tanggal</th>
                    <th>No. HP</th>
                    <th>File</th>
                    <th>Pembayaran</th>
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
                    <td><?php echo htmlentities($data->kode, ENT_QUOTES, 'UTF-8');?></td>
                    <td><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></td>
                    <td><?php echo htmlentities($data->tgl_pesanan, ENT_QUOTES, 'UTF-8');?></td>
                    <td><?php echo htmlentities($data->hp, ENT_QUOTES, 'UTF-8');?></td>
                    <td><a href="<?php echo base_url('assets/gambar/'.$data->bukti) ?>" class="btn btn-info"><i class="fas fa-eye"></i> Lihat</a></td>
                    <td><?php if( $data->bukti== null){echo'<span class="badge badge-warning">Belum Melakukan Pembayaran</span>';}else{echo'<a href="'.base_url('assets/gambar/'.$data->bukti).'" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat</a>';} ?></td>
                    <td><a href="<?php echo base_url('admin/hapus_pesanan/'.$data->id); ?>" class="btn btn-danger" onclick="hapus()" ><i class="fas fa-trash"></i> Cancel</a></td>
                  </tr>
                                                        <?php } ?>
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