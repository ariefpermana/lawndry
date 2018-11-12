    <!-- merchant Grid -->
    <section class="bg" id="Merchant" style="padding-top:50px;background-color:#212529;">
      <div class="container" style="color:white;">
        <div class="row">
          <div class="col-lg-12 text-center">
          <br>
          <br>
          <br>
          <br>
            <h2 class="section-heading text-uppercase">Our Merchant</h2>
            <!-- <h3 class="section-subheading text-muted">Let See Who In There?</h3> -->
            <p>Cari Merchant berdasarkan Nama Laundry/ Kelurahan :</p> 
            <?php echo form_open('home/search'); ?>
              <input class="section-heading text-uppercase" type="text" name="search" style="width: 500px;height:38px;margin-top:35px;">
              <button type="submit" name="submit" value="search" class="btn btn-primary" style="margin: 10px;border-radius:0px;">Seacrh</button>            
            </p>

            <?php echo form_close(); ?>
            
            <a href="<?php echo site_url('home/more') ?>" class="btn btn-danger" style="height: 30px;padding-top: 2px;border-radius:0px;">Clear</a>

            <?php echo form_close(); ?>
        </div>
          </div>
        </div>
        <br>
        <div class="row">
        <?php if(!empty($merchant)) : foreach($merchant as $data) : ?>
          <div class="col-md-4 col-sm-6 Merchant-item">
            <a class="Merchant-link" data-toggle="modal" href="#Modal<?php echo $data->id; ?>">
              <div class="Merchant-hover">
                <div class="Merchant-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo base_url('img/logo/').$data->logo; ?>" alt="">
            </a>
            <div class="Merchant-caption">
              <h4><?php echo $data->nama_laundry ?></h4>
              <p class="text-muted"><?php echo $data->deskripsi; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
        <?php else : ?>
           <div class="col-md-12 col-sm-12 Merchant-item">
              <div class="Merchant-hover">
                <div class="Merchant-hover-content">
                </div>
              </div>
            </a>
            <div class="Merchant-caption">
              <h4>No Merchant Available</h4>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- Pagination -->
        <div class="row">
          <div class="col-md-7">
            <?php echo $pagination ?>
          </div>
        </div>
        <!-- End Pagination -->
      </div>
    </section>


    <!-- Footer -->
    <footer  style="background-color:#000000e8;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <span  style="color:white;" class="copyright">Copyright &copy; LawN'Dry 2018</span>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <?php if(!empty($merchant)) : foreach($merchant as $data): ?>
    <!-- Modal 1 -->
    <div class="Merchant-modal modal fade" id="Modal<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase"><?php echo $data->nama_laundry; ?></h2>
                  <p class="item-intro text-muted"><?php echo $data->alamat; ?></p>
                  <!-- <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt=""> -->
                  <p><?php echo $data->deskripsi; ?></p>
                  <p>Info Lebih Lanjut Klik Button</p>
                  <a href="<?php echo site_url('home/detail/').$data->id; ?>">
                    <button class="btn btn-primary" type="button">
                      <i class="fa fa-info"></i>
                      Detail</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; endif;?>