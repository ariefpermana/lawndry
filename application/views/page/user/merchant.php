<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Merchant</h3>
      </div>
      <div class="box-header">
        <?php if($this->session->flashdata('failed')): ?>
          <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('success')): ?>
            <p class="alert alert-success"><?php echo $this->session->flashdata('success') ?></p>
        <?php endif; ?>
      </div>

      <div class="box-header">
          <a href="<?php echo site_url('user/add_merchant') ?>"><button type="submit" class="btn btn-primary">Add User Merchant</button></a>
      </div>
      <br>
      <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>No. Handphone</th>
              <th>Address</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            if($user) : foreach($user as $key) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $key->username; ?></td>
              <td><?php echo $key->nama; ?></td>
              <td><?php echo $key->email; ?></td>
              <td><?php echo $key->handphone; ?></td>
              <td><?php echo $key->address; ?></td>
              <td>
                <?php 
                  if($key->status == '1') {
                    echo 'Active';
                  }else{
                    echo 'Inactive';
                  } 
                ?>
              </td>
              <td>
              <?php 
                echo form_open();
                echo form_hidden('kode',$key->kode);

                if($key->status == '1') :
              ?>
                <input name="submit" type="submit" value="Inactivated" class="btn btn-danger">
              <?php 
                endif;

                if($key->status == '0') :
              ?>
                <input name="submit" type="submit" value="Verified" class="btn btn-success">
              <?php 
                endif;
              ?>
                <input name="submit" type="submit" value="Edit" class="btn btn-warning">

              <?php echo form_close(); ?>
              </td>
            </tr>
          <?php endforeach; endif; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
    </div>
  </div>
</div>
