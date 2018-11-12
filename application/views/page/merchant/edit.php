<div class="row">
        <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Laundry</h3>
      </div>
      <div class="box-header with-border">
        <!-- Alert Validation form -->
        <?php if($this->session->flashdata('success')): ?>
            <p class="alert alert-success"><?php echo $this->session->flashdata('success') ?></p>
        <?php elseif($this->session->flashdata('failed')): ?>
            <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
        <?php endif; ?>
        
        <?php if(validation_errors()): ?>
            <ul class="alert alert-danger" style="padding-left:30px;">
                <?php echo validation_errors('<li>', '</li>') ?>
            </ul>
        <?php endif; ?>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <?php echo form_open_multipart() ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Nama Laundry</label>
                <input type="text" class="form-control" name="nama_laundry" placeholder="Enter Nama Laundry" value="<?php if(!empty($merchant->nama_laundry)) echo $merchant->nama_laundry; ?>" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php if(!empty($merchant->email)) echo $merchant->email; ?>" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>No. Handphone</label>
                <input type="number" class="form-control" name="handphone" placeholder="Enter No. Handphone" value="<?php if(!empty($merchant->no_hp)) echo $merchant->no_hp; ?>" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>No. Rekening</label>
                <input type="number" class="form-control" name="no_rek" placeholder="Enter No. Rekening" value="<?php if(!empty($merchant->no_rek)) echo $merchant->no_rek; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                <label>Alamat</label>
                <textarea type="text" class="form-control" name="alamat" placeholder="Enter Alamat" required><?php if(!empty($merchant->alamat)) echo $merchant->alamat; ?> </textarea>
              </div>
            </div>
            <div class="col-md-3">
              <label>Kelurahan</label>
                <input type="text" class="form-control" name="kelurahan" placeholder="Enter Kelurahan" value="<?php if(!empty($merchant->kelurahan)) echo $merchant->kelurahan; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Enter Deskripsi" value="<?php if(!empty($merchant->deskripsi)) echo $merchant->deskripsi; ?>" required>
          </div>
          <div class="form-group">
            <label>Syarat & Ketentuan</label>
            <textarea type="text" class="form-control" name="syarat_ketentuan" placeholder="Enter Syarat & Ketentuan" required><?php if(!empty($merchant->syarat_ketentuan)) echo $merchant->syarat_ketentuan; ?></textarea>
          </div>
          <div class="form-group">
            <label>Logo</label>
            <br>
            <?php if(!empty($merchant->logo)) echo form_hidden('temp_logo', $merchant->logo); echo '<p name="temp_logo">Logo uploaded before '. $merchant->logo.'</p>'?>
            <input name="logo" type="file">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a href="<?php echo site_url('merchant/profile') ?>" class="btn btn-danger">Back</a>
          <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>