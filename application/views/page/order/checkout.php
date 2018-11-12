
<div class="box box-default">
  <div class="box-header with-border">
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
    <?php if(!empty($items)) : ?>
        <h3 class="box-title">Order Number #<?php echo $order_number; ?></h3>
    <?php endif; ?>
  </div>
  <div class="box-body">
    <div class="table-responsive">
     <table class="table">
        <tr>
          <th style="width: 10px">No.</th>
          <th style="width: 100px">ID Merchant</th>
          <th>Nama Layanan</th>
          <th style="width: 100px">Jumlah / Berat(kg)</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
        <?php 
          $i = 1;
          foreach($items as $key => $value) : 
        ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $value['option']['id_merchant']; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td><?php echo $value['qty']; if($value['option']['jenis_layanan'] == 'Kiloan') echo ' Kg';?></td>
          <td><?php echo $value['price']; ?></td>
          <td><a href="<?php echo site_url('order/delete/'.$key); ?>"><button class="btn btn-danger fa fa-trash"></button></a></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Subtotal</td>
          <td></td>
          <td><?php echo $value['subtotal']; ?></td>
          <td></td>
        </tr>
      <?php endforeach; 
        if(!empty($items)) :
      ?>
        <tr>
          <td></td>
          <td></td>
          <td><b>Total Harga (Estimasi)</b></td>
          <td></td>
          <td><b><?php echo $this->cart->total(); ?></b></td>
          <td></td>
        </tr>
      <?php else: ?>
        <tr style="text-align:center;">
          <td colspan="6"> - Empty Order - </td>
        </tr>
      <?php endif; ?>
    </table>
    </div>
    <div style="text-align:right;">
      <div class="row">
        <div class="col-md-6">
          <?php echo form_open() ?>
          <?php echo form_hidden('order_number',$order_number); ?>
          <?php if(!empty($items)) : ?>
            <button class="btn btn-success" type="submit" name="submit" value="finish"> FINISH ORDER</button>
          <?php endif; ?>
          <?php echo form_close() ?>
        </div>
        <div class="col-md-6">
          <a href="<?php echo site_url('home/admin'); ?>"><button class="btn bg-purple" type="submit" name="submit" value="finish"><li class="fa fa-home"></li> MY DASHBOARD</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box --> 