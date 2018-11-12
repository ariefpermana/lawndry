<div class="row">
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
  <?php if($this->session->userdata('kategori') == 2) { ?>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $item;?></h3>

        <p>Checkout</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="<?php echo site_url('order/checkout'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3><?php echo $konfirmasi;?></h3>

        <p>Konfirmasi Pembayaran</p>
      </div>
      <div class="icon">
        <i class="ion ion-checkmark"></i>
      </div>
      <a href="<?php echo site_url('order/detail/'.$this->session->userdata('kode').'/8'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <?php } ?>

  <?php if($this->session->userdata('kategori') == 1) { ?>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $order_status;?></h3>

        <p>Verifikasi Orders</p>
      </div>
      <div class="icon">
        <i class="ion ion-checkmark"></i>
      </div>
      <a href="<?php echo site_url('order/my_orders/verified'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3><?php echo $ver_pembayaran;?></h3>

        <p>Verifikasi Pembayaran</p>
      </div>
      <div class="icon">
        <i class="ion ion-checkmark"></i>
      </div>
      <a href="<?php echo site_url('order/Verifikasi/'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <?php } ?>

  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $orders; ?></h3>

        <p>Total Orders</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="<?php echo site_url('order/my_orders'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <?php if($this->session->userdata('kategori') == 0) { ?>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
      <div class="inner">
        <h3><?php echo $activeUser; ?></h3>

      <p>User Active</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="<?php echo site_url('user/pelanggan/active'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $inactiveUser; ?></h3>

      <p>User Registrations</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="<?php echo site_url('user/pelanggan/register'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $merchant; ?></h3>

        <p>Total Merchant</p>
      </div>
      <div class="icon">
        <i class="ion ion-grid"></i>
      </div>
      <a href="<?php echo site_url('user/merchant'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <?php } ?>
</div>