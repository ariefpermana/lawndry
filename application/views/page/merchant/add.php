<div class="row">
        <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Input Layanan Laundry</h3>
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
      <?php echo form_open() ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Jenis Layanan</label>
                <input type="text" class="form-control" name="nama_laundry" value="<?php echo $this->session->userdata('jenis_layanan'); ?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Layanan</label>
                <input type="text" class="form-control" name="nama_layanan" placeholder="Enter Nama Layanan" value="<?php if(!empty($detail_layanan->nama_layanan)) echo $detail_layanan->nama_layanan; ?>" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Biaya</label>
                <input type="text" class="form-control" name="biaya" placeholder="Enter Biaya" value="<?php if(!empty($detail_layanan->biaya)) echo $detail_layanan->biaya; ?>" required>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a href="<?php echo site_url('merchant/'.$this->session->userdata('jenis_layanan')) ?>" class="btn btn-danger">Back</a>
          <button type="submit" name="submit" value="add" class="btn btn-primary">Save</button>
        </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>