 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-sm-right"><i class="fas fa-plus"></i> Buat Orderan</button>
          </div><!-- /.col -->
          <div class="col-12 pt-3">
          <?php echo $this->session->flashdata('msg') ?>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Orderan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('page/tambah_proses');?>
          <div class="form-group">
            <label for="exampleInputPassword1">No.HP</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="No.HP Aktif" name="hp">
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
                  <button type="submit" class="btn btn-primary">Order</button>
                </div>
                <?php echo form_close(); ?> 
    </div>
  </div>
</div>


    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Orderan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Selesai</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">NO</th>
                          <th>Nomor Pesanan</th>
                          <th>Tanggal Pesanan</th>
                          <th>file</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                                <?php
                                  $no = 1;
                                  foreach($hasil as $data){
                                ?>
                        <tr>
                          <td class="pt-4"><?php echo $no++ ?></td>
                          <td class="pt-4"><?php echo htmlentities($data->kode, ENT_QUOTES, 'UTF-8');?></td>
                          <td class="pt-4"><?php echo htmlentities($data->tgl_pesanan, ENT_QUOTES, 'UTF-8');?></td>
                          <td class="pt-4"> <a href="<?php echo base_url('assets/gambar/'.$data->file) ?>" target="_blank">LIHAT</a> </td>
                          <td><a href="<?php echo base_url('page/cancel/'.$data->id) ?>" class="btn btn-danger" onclick="hapus()" ><i class="fas fa-trash"></i> Cancel</a></td>
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
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">NO</th>
                          <th>Tanggal</th>
                          <th class="text-center">file</th>
                        </tr>
                      </thead>
                      <tbody>
                                <?php
                                  $no = 1;
                                  foreach($hasil1 as $data){
                                ?>
                        <tr>
                          <td class="pt-4"><?php echo $no++ ?></td>
                          <td class="pt-4"><?php echo htmlentities($data->tgl, ENT_QUOTES, 'UTF-8');?></td>
                          <td class="text-center"><a href="<?php echo base_url('assets/gambar/'.$data->file) ?>" class="btn btn-info" target="_blank"><i class="fas fa-download"></i> Download</a></td>
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
            </div>
              </div>
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