<div class="register-box">

  <div class="register-box-body">
  <div class="register-logo">
    <a href="<?php echo base_url(); ?>"><b>LawN'</b>Dry</a>
  </div>
  <br>
    <p class="login-box-msg">Register a new membership</p>

    <?php if($this->session->flashdata('failed')): ?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
    <?php endif; ?>
    <?php if(validation_errors()): ?>
        <ul class="alert alert-danger" style="padding-left:30px;">
            <?php echo validation_errors('<li>', '</li>') ?>
        </ul>
    <?php endif; ?>
    
    <?php echo form_open() ?>
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="name" type="text" class="form-control" placeholder="Full name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="handphone" type="handphone" class="form-control" placeholder="No. Handphone" required>
        <span class="glyphicon glyphicon-book form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="address" type="handphone" class="form-control" placeholder="Address" required>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="repassword" type="password" class="form-control" placeholder="Retype password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <!-- <input type="checkbox"> I agree to the <a href="#">terms</a> -->
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" value="register" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close() ?>

    <br>

    <a href="<?php echo site_url('user/login') ?>" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>