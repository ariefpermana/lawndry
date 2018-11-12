<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Reset Password</h3>
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
              <label for="password">New Password</label>
              <input type="password" class="form-control" name="newpassword" placeholder="New Password" required>
            </div>
            <div class="form-group">
              <label for="password">Confirm Password</label>
              <input type="password" class="form-control" name="repassword" placeholder="Confirm Password" required>
            </div>
          </div>
          <!-- /.box-body -->


          <div class="box-footer">
            <a href="<?php echo site_url('home/admin') ?>" class="btn btn-danger">Cancel</a>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</section>