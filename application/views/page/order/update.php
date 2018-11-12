<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Update Status Order</h3>
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
        <?php echo form_open() ?>
          <div class="box-body">
            <div class="form-group">
              <label>ID ORDER #<?php echo $detail->id_order; ?></label>
            </div>
            <div class="form-group">
              <label>Jenis Layanan</label>
              <input type="text" class="form-control" value="<?php echo $detail->jenis_layanan; ?>" disabled>
            </div>
            <div class="form-group">
              <label>Berat/Jumlah Cucian</label>
              <input type="email" class="form-control" value="<?php if(!empty($detail->berat_cucian)) echo $detail->berat_cucian.' Kg'; else echo $detail->jumlah_satuan;?>" disabled>
            </div>
            <?php if($detail->id_status_order == 3) : ?>
             <div class="form-group">
              <label>Input Tanggal Penjemputan</label>
              <input type="date" class="form-control"  name="tgl_penjemputan" required>
            </div>
            <?php endif; ?>
            <?php if($detail->id_status_order == 10) : ?>
             <div class="form-group">
              <label>Input Tanggal Pengembalian</label>
              <input type="date" class="form-control"  name="tgl_pengembalian" required>
            </div>
            <?php endif; ?>
              <div class="form-group">
                <label>Select Status</label>
                <select class="form-control" name="status">
                  <option value="0">Pilih Status ..</option>
                  <?php foreach ($status as $key) : ?>
                    <option value="<?php echo $key->id; ?>"><?php echo $key->status; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
          </div>
          <!-- /.box-body -->


          <div class="box-footer">
            <a href="<?php echo site_url('order/my_orders'); ?>" class="btn btn-warning">Back</a>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </div>

        <?php echo form_close() ?>

      </div>
    </div>
  </div>
</section>