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
              <th>No. Order</th>
              <th>Tanggal Transaksi</th>
              <th>Alamat Penjemputan</th>
              <th>Jenis Layanan</th>
              <th>Nama Layanan</th>
              <th>Berat Cucian</th>
              <th>Jumlah Satuan</th>
              <th>Harga</th>
              <th>Total Harga</th>
              <th>Tangga Penjemputan</th>
              <th>Tanggal Pengembalian</th>
              <th>Status Order</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            if($orders) : foreach($orders as $key) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td>#<?php echo $key->id_order; ?></td>
              <td><?php echo $key->tanggal_transaksi; ?></td>
              <td><?php echo $key->alamat_penjemputan; ?></td>
              <td><?php echo $key->jenis_layanan; ?></td>
              <td><?php echo $key->nama_layanan; ?></td>
              <td><?php echo $key->berat_cucian; ?> Kg</td>
              <td><?php echo $key->jumlah_satuan; ?></td>
              <td><?php echo $key->harga; ?></td>
              <td><?php echo $key->subtotal; ?></td>
              <td><?php echo $key->tanggal_penjemputan; ?></td>
              <td><?php echo $key->tanggal_pengembalian; ?></td>
              <td><?php echo $key->status; ?></td>
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
