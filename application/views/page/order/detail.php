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
              <th>Tanggal Transaksi</th>
              <th>Alamat Penjemputan</th>
              <th>Jenis Layanan</th>
              <th>Nama Layanan</th>
              <th>Berat Cucian</th>
              <th>Jumlah Satuan</th>
              <th>Harga</th>
              <th>Total Harga</th>
              <th>Tanggal Penjemputan</th>
              <th>Tanggal Pengembalian</th>
              <th>Status Order</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            if($orders) : foreach($orders as $key) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
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
              <td>
              <?php 
                echo form_open();
                echo form_hidden('id_detail',$key->id);
                echo form_hidden('id_order',$key->id_order);
                echo form_hidden('id_laundry',$key->id_laundry);

                if($this->session->userdata('kategori') == '2' && ($key->id_status_order == '8')) :
              ?>
                <input name="submit" type="submit" value="Konfirmasi" class="btn btn-warning">

              <?php elseif($key->id_status_order == '1' && $this->session->userdata('kategori') == '1') : ?>
                <input name="submit" type="submit" value="Verify Order" class="btn btn-success">
                <input name="submit" type="submit" value="Cancel Order" class="btn btn-danger">

              <?php elseif($this->session->userdata('kategori') == '1' && ($key->id_status_order != '2' && $key->id_status_order != '1' && $key->id_status_order != '8' && $key->id_status_order != '9' &&  $key->id_status_order != '14')) : ?>
                <a href="<?php echo site_url('order/update/').$key->id; ?>" class="btn btn-success">Update Status</a>
                <?php if($key->id_status_order == '7'): ?>
                  <a href="<?php echo site_url('order/edit/').$key->id; ?>" class="btn btn-primary">Edit Order</a>
                <?php endif; ?>
  
              <?php elseif($this->session->userdata('kategori') == '2' && $key->id_status_order == 14) : 
              ?>
                <input name="submit" type="submit" value="Finish" class="btn btn-success">
                <!-- <input name="submit" type="submit" value="Complaint" class="btn btn-warning"> -->
              <?php else : ?>
                <a href="<?php echo site_url('order/my_orders'); ?>" class="btn btn-danger">Back</a>
              <?php 
                endif;
              ?>
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
