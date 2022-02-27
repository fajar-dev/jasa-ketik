
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title pt-2">Data <?php echo $title ?></h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Kiriman</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Tanggal</th>
                    <th>Kepada</th>
                    <th>file</th>
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
                    <td><?php echo htmlentities($data->tgl, ENT_QUOTES, 'UTF-8');?></td>
                    <td><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></td>
                    <td><a href="<?php echo base_url('assets/gambar/'.$data->file); ?>" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i> Lihat</a></td>
                    <td><a href="<?php echo base_url('admin/hapus_kirim/'.$data->id); ?>" class="btn btn-danger" onclick="hapus()" ><i class="fas fa-trash"></i> Hapus</a></td>
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

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('admin/tambah');?>
          <div class="form-group">
            <label for="exampleInputPassword1">Kepada</label>
            <select class="form-control select2bs4" name="id">
                          <?php
                              foreach($hasil1 as $data){
                          ?>
                    <option value="<?php echo htmlentities($data->id, ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></option>
                          <?php
                            }
                          ?>
          </select>
          </div>
          <div class="form-group">
                    <label for="exampleInputFile">File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                        <label class="custom-file-label" for="exampleInputFile">Upload</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?php echo form_close(); ?> 
    </div>
  </div>
</div>