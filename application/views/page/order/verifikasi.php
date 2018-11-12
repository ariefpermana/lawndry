<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Orders</h3>
      </div>
      <div class="box-header">
        <?php if($this->session->flashdata('failed')): ?>
          <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('success')): ?>
            <p class="alert alert-success"><?php echo $this->session->flashdata('success') ?></p>
        <?php endif; ?>
      </div>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>ID Order</th>
              <th>ID Pembayaran</th>
              <th>Tanggal Order</th>
              <th>Nama Rekening Pengirim</th>
              <th>Total Harga</th>
              <th>Bukti Pembayaran</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            if($pembayaran) : foreach($pembayaran as $key) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td>#<?php echo $key->id_order; ?></td>
              <td>#<?php echo $key->id_pembayaran; ?></td>
              <td><?php echo ind_date($key->tanggal_transaksi); ?></td>
              <td><?php echo $key->nama_rek_pengirim; ?></td>
              <td><?php echo $key->subtotal; ?></td>
              <td><a href="<?php echo base_url() ?>img/bukti_transaksi/<?php echo $key->bukti_pembayaran; ?>" target="_blank"><img width="50px" src="<?php echo base_url() ?>img/bukti_transaksi/<?php echo $key->bukti_pembayaran; ?>"></a></td>
              <td>
              <?php echo form_open() ?>
              <a href="<?php echo site_url('order/verify/').$key->id_detail; ?>" class="btn btn-success">Verify</a>
             
              <?php echo form_close(); ?>
              </td>
            </tr>
          <?php endforeach; endif; ?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.box-body -->
    </div>
  </div>
</div>
