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
  <?php if($merchant) : foreach($merchant as $data) : ?>
  <div class="col-md-12">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user-2">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-yellow">
        <div class="widget-user-image">
          <?php if($data->logo == NULL) : ?>
            <img class="img-circle" src="<?php echo base_url() ?>img/logo.png" alt="User Avatar">
          <?php else: ?>
            <img class="img-circle" src="<?php echo base_url() ?>img/logo/<?php echo $data->logo;?>" alt="User Avatar" style="width:70px;height:70px;">
          <?php endif; ?>
        </div>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username"><?php if(empty( $data->nama_laundry)) echo 'LawnDry'; else echo $data->nama_laundry; ?></h3>
        <h5 class="widget-user-desc"><?php echo $data->nama_administrator; ?></h5>
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-md-2">
            <p>Email </p>
          </div>
          <div class="col-md-1">
            <p> : </p>
          </div>
          <div class="col-md-2">
            <?php echo $data->email; ?>
          </div>
          <div class="col-md-2">
            <p>No. Handphone </p>
          </div>
          <div class="col-md-1">
            <p> : </p>
          </div>
          <div class="col-md-2">
            <?php echo $data->no_hp; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <p>Alamat </p>
          </div>
          <div class="col-md-1">
            <p>: </p>
          </div>
          <div class="col-md-8">
            <?php echo $data->alamat; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <p>Deskripsi </p>
          </div>
          <div class="col-md-1">
            <p> : </p>
          </div>
          <div class="col-md-8"> 
            <?php echo $data->deskripsi; ?> 
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <p>Syarat & Ketentuan </p>
          </div>
          <div class="col-md-1">
            <p> : </p>
          </div>
          <div class="col-md-8">  
            <?php echo character_limiter($data->syarat_ketentuan,300); ?> 
          </div>
        </div>
        <div style="text-align:right;">
          <?php 
            echo form_open();

            echo form_hidden('id',$data->id);
          ?>
            <input name="submit" type="submit" value="Edit" class="btn btn-warning">
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
<?php endforeach;endif; ?>

<?php if(count($merchant) > 1) : ?>
<!-- Pagination -->
<div class="row">
  <div class="col-md-7">
    <?php echo $pagination ?>
  </div>
</div>
<!-- End Pagination -->
<?php endif; ?>
</div>