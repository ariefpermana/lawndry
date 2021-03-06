<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data My Orders</h3>
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
                <th>Tanggal Transaksi</th>
                <th>Alamat Penjemputan</th>
                <th>Total Harga</th>
                <?php if($this->session->userdata('kategori') == '1') : ?>
                <th>Status Order</th>
                <?php endif; ?>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $i = 1;
              if($orders) : foreach($orders as $key) : ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $key->id_order; ?></td>
                <td><?php echo $key->tanggal_transaksi; ?></td>
                <td><?php echo $key->alamat_penjemputan; ?></td>
                <td><?php if($this->session->kategori == '1' )  echo $key->subtotal; else echo $key->total_harga; ?></td>
                <?php if($this->session->kategori == '1') : ?>
                  <td><?php echo $key->status; ?></td>
                <?php endif; ?>
                <td>
                <?php
                  echo form_open();
                  echo form_hidden('id_order',$key->id_order);

                  ?>
                  <?php if($this->session->userdata('kategori') == '1') : ?>
                    <a href="<?php echo site_url('home/admin'); ?>" class="btn btn-danger">Back</a>
                    <a href="<?php echo site_url('order/detail/').$key->id; ?>" class="btn btn-primary">Detail</a>
                  <?php else : ?>
                    <a href="<?php echo site_url('order/detail/').$key->id_order; ?>" class="btn btn-primary">Detail</a>
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
