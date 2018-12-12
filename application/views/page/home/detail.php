<style>
  .checked {
      color: #ffd400;
  }
</style>
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To</div>
          <div class="intro-heading text-uppercase"><?php echo $merchant['nama_laundry']; ?></div>
          <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#About">discovery me</a> -->
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="About" style="padding-top:50px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-2">
           
          </div>
          <div class="col-md-8">
            <img style="width:210px;height:200px;" class="mx-auto rounded-circle" src="<?php echo base_url() ?>img/logo/<?php echo $merchant['logo']; ?>" alt="">
            <br>
            <br>
            <div class="star">
            <?php for($i=0; $i < $nilai; $i++) { ?>
              <span class="fa fa-star fa-3x checked"></span>
            <?php } 
              $value = 5 - intval($nilai);
              
              for($i=0; $i < $value; $i++) { ?>
                <span class="fa fa-star fa-3x"></span>
            <?php } ?>
            </div>
            <a href="<?php echo site_url('review/detail/').$this->uri->segment(3); ?>"><p>view review</p></a>
            <h3 class="service-heading"><?php echo $merchant['nama_laundry']; ?></h3>
            <p class="text-muted"><?php echo $merchant['alamat']; ?></p>
            <h5 class="service-heading"><?php echo $merchant['deskripsi']; ?></h5>
          </div>
          <div class="col-md-2">
            
          </div>
        </div>
      </div>
    </section>

    <!-- Service -->
    <section class="bg-light" id="Service" style="padding-top:50px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Layanan</h2>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-sm-6">
            <div class="team-member">
              <span class="fa-stack fa-6x">
                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-shopping-basket fa-stack-1x fa-inverse"></i>
              </span>
              <h4>Satuan</h4>
              <p class="text-muted">Laundry dengan pilihan lebih sedikit pakaian menjadi lebih hemat</p>
              <a href="<?php echo site_url('order/satuan/').$merchant['id']; ?>">
                <button class="btn btn-primary" type="button">
                  Order</button>
              </a>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="team-member">
              <span class="fa-stack fa-6x">
                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-weight fa-stack-1x fa-inverse"></i>
              </span>            
              <h4>Kiloan</h4>
              <p class="text-muted">Laundry dengan kiloan tidak membuat anda ribet memilih tipe pakaian</p>
              <a href="<?php echo site_url('order/kiloan/').$merchant['id']; ?>">
                <button class="btn btn-primary" type="button">
                  Order</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section id="syarat" style="padding-top:50px;">
    <br>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Syarat & Ketentuan</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-12 text-center">
            <p>
              <?php echo nl2br($merchant['syarat_ketentuan']); ?>
            </p>
          </div>
        </div>
      </div>
    </section>

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