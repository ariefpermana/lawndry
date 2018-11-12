<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Konfirmasi Pembayaran Order #<?php echo $id_order; ?></h3>
        </div>
        <!-- /.box-header -->

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

        <!-- form start -->
        <?php echo form_open_multipart() ?>
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">ID Order</label>
              <input type="text" class="form-control" value="#<?php echo $id_order; ?>" name="id_order" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama Rekening Pelanggan</label>
              <input type="text" class="form-control" name="nama_rek" placeholder="Nama Rekening Yang Tertera di Rekening" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Upload Bukti Pembayaran</label>
              <input name="bukti_pembayaran" type="file" required>
          </div>
          <!-- /.box-body -->


          <div class="box-footer">
            <a href="<?php echo site_url('order/my_orders'); ?>" class="btn btn-danger">Back</a>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </div>

        <?php echo form_close() ?>

      </div>
    </div>
  </div>
</section>