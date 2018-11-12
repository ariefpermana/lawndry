<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Layanan Kiloan</h3>
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
        <?php echo form_open()  ?>
          <?php echo form_hidden('id', $this->session->userdata('kode')); ?>
          <button type="submit" name="submit" value="add" class="btn btn-primary">Add Layanan</button>  
        <?php echo form_close()  ?>
      </div>
      <br>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Nama Laundry</th>
              <th>Jenis Layanan</th>
              <th>Nama Layanan</th>
              <th>Biaya</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            if($data_kiloan) : foreach($data_kiloan as $key) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php if(isset($key->nama_laundry)) echo $key->nama_laundry; ?></td>
              <td><?php if(isset($key->jenis_layanan)) echo $key->jenis_layanan; ?></td>
              <td><?php if(isset($key->nama_layanan)) echo $key->nama_layanan; ?></td>
              <td><?php if(isset($key->biaya)) echo $key->biaya; ?></td>
              <td>
              <?php 
                echo form_open();
                if(isset($key->id)){
                  echo form_hidden('kode',$key->id);
                }
              ?>
                <input name="submit" type="submit" value="Edit" class="btn btn-success">
              <?php
                echo form_close();
              ?>
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
