<div class="row">
        <!-- left column -->
  <div class="col-md-5">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Order</h3>
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
          <div class="form-group">
            <label>Tanggal Transaksi</label>
            <input type="text" class="form-control" value="<?php if(!empty($order->tanggal_transaksi)) echo $order->tanggal_transaksi; ?>" disabled>
          </div>
          <div class="form-group">
            <label>Nama Layanan</label>
            <input type="text" class="form-control" value="<?php if(!empty($order->nama_layanan)) echo $order->nama_layanan; ?>" disabled>
          </div>
        <?php if($order->jenis_layanan == "Kiloan") : ?>
          <div class="form-group">
            <label>Berat Cucian</label>
            <input type="number" class="form-control" id="berat" name="berat_cucian" onChange="getTotal()" value="<?php if(!empty($order->berat_cucian)) echo $order->berat_cucian; ?>" required>
          </div>
          <div class="form-group">
            <label>Jumlah Satuan</label>
            <input type="number" class="form-control" name="jumlah_satuan" value="<?php if(!empty($order->jumlah_satuan)) echo $order->jumlah_satuan; ?>" required>
          </div>
        <?php else : ?>
          <div class="form-group">
            <label>Jumlah Satuan</label>
            <input type="number" class="form-control" id="satuan" name="jumlah_satuan" onChange="getTotal()" value="<?php if(!empty($order->jumlah_satuan)) echo $order->jumlah_satuan; ?>" required>
          </div>
        <?php endif; ?>
         
          <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="harga" value="<?php if(!empty($order->harga)) echo $order->harga; ?>" disabled>
          </div>
          <div class="form-group">
            <label>Total Harga</label>
            <input type="text" class="form-control" id="total" name="total" value="<?php if(!empty($order->subtotal)) echo $order->subtotal; ?>" disabled>
            <input type="hidden" id="total_harga" name="total_harga" value="<?php if(!empty($order->subtotal)) echo $order->subtotal; ?>">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a href="<?php echo site_url('order/detail/').$order->id; ?>" class="btn btn-danger">Back</a>
          <button type="submit" name="submit" value="save" class="btn btn-primary">Save</button>
        </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>