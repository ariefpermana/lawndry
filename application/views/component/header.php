<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lawndry - Cleaner</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>vendors/startbootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>vendors/startbootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>vendors/startbootstrap/css/agency.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url() ?>">LawN'Dry</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <?php if($this->uri->segment(2) == NULL) : ?>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#About">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#Merchant">Merchant</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#Service">Our Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#Testimonial">Testimonial</a>
                </li>
            <?php endif; ?>

            <?php if($this->uri->segment(2) == 'detail' || $this->uri->segment(1) == 'order') : ?>
                <?php if($this->uri->segment(1) == 'order') :  ?>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo site_url('home/detail/'.$this->uri->segment(3)); ?>">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo site_url('order/checkout') ?>">Go to Cart</a>
                    </li>
                <?php else : ?>
                <li class="nav-item">
                   <a class="nav-link js-scroll-trigger" href="#Service">Layanan</a>
                </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($this->uri->segment(2) == 'detail') : ?>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#syarat">Syarat & Ketentuan</a>
              </li>
            <?php endif; ?>

            <li class="nav-item">
              <?php if(empty($id)){ ?>
                <a class="nav-link js-scroll-trigger" href="<?php echo site_url('user/login'); ?>">Login</a>
              <?php }else{ ?>
                <a class="nav-link js-scroll-trigger" href="<?php echo site_url('home/admin'); ?>"><?php echo $this->session->userdata('nama');?></a>
              <?php } ?>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>