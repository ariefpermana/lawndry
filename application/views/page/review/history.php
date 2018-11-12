<style>
  .star{
          color: goldenrod;
          font-size: 2.0rem;
          padding: 0 1rem; /* space out the stars */
        }
</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">History Ulasan</h3>
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
              <th>Tanggal Komentar</th>
              <th>Nama Laundry</th>
              <th>Nilai</th>
              <th>Komentar</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $n = 1;
            if($review) : foreach($review as $key) : ?>
            <tr>
              <td><?php echo $n++; ?></td>
              <td><?php echo $key->tanggal_komentar; ?></td>
              <td><?php echo $key->nama_laundry; ?></td>
              <td>
                <div class="stars" data-rating="<?php echo $key->nilai; ?>">
                  <?php for($i=0; $i < $key->nilai; $i++) { ?>
                    <span class="star rated">&nbsp;</span>
                  <?php } ?>
                  <?php 
                  $value = 5 - intval($key->nilai);
                  for($i=0; $i < $value; $i++) { ?>
                    <span class="star">&nbsp;</span>
                  <?php } ?>
                </div>
              </td>
              <td><?php echo $key->komentar; ?></td>
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
