
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title ?></h1>
          </div><!-- /.col -->
          <div class="col-12 pt-3">
          <?php echo $this->session->flashdata('msg') ?>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <?php $kode = $_GET['kode']; ?>
                <?php echo form_open_multipart('page/bukti');?>
                  <input type="hidden" value="<?php echo $kode?>" name="kode">
                  <div class="form-group">
                    <label for="exampleInputFile">Bukti Pembayaran</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                        <label class="custom-file-label" for="exampleInputFile">Upload Bukti Pembayaran</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary">Submit</button>
              </div>
              <?php echo form_close(); ?> 
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
