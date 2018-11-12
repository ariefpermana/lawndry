
   <!-- Services -->
  <?php echo form_open() ?>
    <section id="syarat" style="padding-top:50px;background-color:#343a40;color:white;">
    <br>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Order Laundry</h2><br><br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
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
          <div class="col-md-3">
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-2">
              <label>Jenis Layanan </label>
          </div>
          <div class="col-md-1">
              <label> : </label>
          </div>
          <div class="col-md-5">
              <input class="form-control" type="text" name="jenis_layanan" value="KILOAN" disabled>
              <?php echo form_hidden('jenis_layanan','Kiloan') ?>
          </div>
        </div>
        <br>
        <div class="row text-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-2">
              <label>Nama Layanan </label>
          </div>
          <div class="col-md-1">
              <label> : </label>
          </div>
          <div class="col-md-5">
            <select class="form-control" id="layanan" name="layanan" onChange="getBiaya()" required>
              <option value="0">Pilih Layanan</option>
                <?php  foreach ($kiloan as $key => $value) : ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['nama_layanan']; ?></option>
                <?php endforeach; ?>
            </select>    
            <input type="hidden" id="nama_layanan" name="nama_layanan">      
          </div>
        </div>
        <br>
        <div class="row text-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-2">
              <label>Harga (Rp)</label>
          </div>
          <div class="col-md-1">
              <label> : </label>
          </div>
          <div class="col-md-5">
              <input class="form-control" id="biaya" type="text" name="biaya" disabled>
              <input type="hidden" id="total" name="biaya">
          </div>
        </div>
        <br>
        <div class="row text-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-2">
              <label>Jumlah Satuan Pakaian</label>
          </div>
          <div class="col-md-1">
              <label> : </label>
          </div>
          <div class="col-md-5">
              <input class="form-control" id="satuan" type="text" name="satuan" onChange="getBerat()" required>
          </div>
        </div>
        <br>
        <div class="row text-center">
          <div class="col-md-2">
          </div>
          <div class="col-md-2">
              <label>Estimasi Berat (Kg)</label>
          </div>
          <div class="col-md-1">
              <label> : </label>
          </div>
          <div class="col-md-5">
              <input class="form-control" id="estberat" type="text" disabled>
              <input type="hidden" id="berat" name="berat">
          </div>
        </div>
      </div>
      <br>
      <br>
        <div class="row text-center">
          <div class="col-md-7">
          </div> 
          <button class="btn btn-warning" type="submit" name="submit" value="cart" style="margin-right:10px;">Add To Cart</button> 
          <button class="btn btn-success" type="submit" name="submit" value="checkout">Checkout</button> 
      </section>
    <?php echo form_close() ?>

    <!-- Footer -->
    <footer  style="background-color:#000000e8;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <!-- <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul> -->
            <span  style="color:white;" class="copyright">Copyright &copy; LawN'Dry 2018</span>
          </div>
          <div class="col-md-4">
           <!--  <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul> -->
          </div>
        </div>
      </div>
    </footer>