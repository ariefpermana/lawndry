<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Add User Merchant</h3>
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
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No. Handphone</label>
              <input type="number" class="form-control" name="hp" placeholder="No. Handphone" required>
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
            </div>
          </div>
          <!-- /.box-body -->


          <div class="box-footer">
            <a href="<?php echo site_url('user/merchant') ?>" class="btn btn-danger">Back</a>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</section>