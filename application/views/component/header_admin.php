<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LawN'Dry</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/bower_components/morris.js/morris.css"> -->
  <!-- jvectormap -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/bower_components/jvectormap/jquery-jvectormap.css"> -->
  <!-- Date Picker -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/bower_components/bootstrap-daterangepicker/daterangepicker.css"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>vendors/Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
        .star::before{
          content: '\2606';    /* star outline */
          cursor: pointer;
        }
        .star.rated::before{
          /* the style for a selected star */
          content: '\2605';  /* filled star */
        }
        
        .stars{
            counter-reset: rateme 0;   
            font-size: 2.0rem;
            font-weight: 900;
        }
        .star.rated{
            counter-increment: rateme 1;
        }
        .stars::after{
            content: counter(rateme) '/5';
        }
  </style>

</head>

<?php if($this->uri->segment(2) == 'checkout' || ($this->uri->segment(1) == 'review') && $this->uri->segment(2) == 'detail') : ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
   <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>" class="logo" style="background-color:#f39c12;">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>L</b>N'D</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>LawN'</b>Dry</span>
          </a>
         
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- Collect the nav links, forms, and other content for toggling -->
       <!--  <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('home/admin') ?>"">Dashboard</a></li>
          </ul>
        </div> -->
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
             <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama'); ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('user/reset_password'); ?>" class="btn btn-primary btn-flat">Reset Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('user/logout'); ?>" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
          <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        <?php if($this->uri->segment(2) == 'checkout'): ?>
          Checkout Pesanan Anda
        <?php else: ?>
          Ulasan Pelanggan
        <?php endif; ?>
          <!-- <small>Example 2.0</small> -->
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">

  <?php else : ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>N'D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LawN'</b>Dry</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-primary"><?php echo $count_status; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" style="background-color:#37d7c5;">You have <?php echo $count_status; ?> notifications status order</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php if($status_history) : foreach($status_history as $stat => $value) : ?>
                  <li style="background-color:#fbe33780;">
                    <a href="#">
                      <i class="fa fa-warning text-blue"></button></i> 
                      Order #<?php echo $value->id_order; ?>
                    </a>
                  </li>
                  <li style="background-color:#f3bf57cc;">
                    <i>
                      <div class="row" style="padding:10px;">
                        <div class="col-md-12">
                          <?php echo $value->status; ?>
                        </div>
                      </div>
                    </i>
                  
                  </li>
                <?php endforeach; else : ?>
                  <li>
                  <a>
                    <p><i>empty notification</i></p>
                  </a>
                  </li>
                <?php endif; ?>
                </ul>
              </li>
              <li class="footer"><a href="#"><!-- View all --></a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama'); ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('user/reset_password'); ?>" class="btn btn-primary btn-flat">Reset Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('user/logout'); ?>" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         <!--  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php if(isset($active_home)) : echo 'class="active"'; endif; ?>>
          <a href="<?php echo base_url('home/admin'); ?>">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <?php if($this->session->userdata('kategori') == '0') : ?>
        <li class="<?php if(isset($active_pelanggan) || isset($active_merchant)) : echo 'active'; endif; ?> treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($active_pelanggan)) : echo 'active'; endif; ?>"><a href="<?php echo site_url('user/pelanggan'); ?>"><i class="fa fa-circle-o"></i> Pelanggan</a></li>
            <li class="<?php if(isset($active_merchant)) : echo 'active'; endif; ?>"><a href="<?php echo site_url('user/merchant'); ?>"><i class="fa fa-circle-o"></i> Merchant</a></li>
          </ul>
        </li>
      <?php endif; ?>

      <?php if($this->session->userdata('kategori') == '1') : ?>
        <li class="<?php if(!empty($profile) || !empty($kiloan) || !empty($satuan)) echo 'active'; ?> treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Data Merchant</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(!empty($profile)) echo $profile; ?>"><a href="<?php echo site_url('merchant/profile'); ?>"><i class="fa fa-circle-o"></i> Profile Laundry</a></li>
            
              <li class="<?php if(!empty($kiloan) || !empty($satuan)) echo 'active'; ?> treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Layanan
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php if(!empty($kiloan)) echo $kiloan; ?>"><a href="<?php echo site_url('merchant/kiloan') ?>"><i class="fa fa-circle-o"></i> Kiloan</a></li>
                  <li class="<?php if(!empty($satuan)) echo $satuan; ?>"><a href="<?php echo site_url('merchant/satuan') ?>""><i class="fa fa-circle-o"></i> Satuan</a></li>
                </ul>
              </li>
          </ul>
        </li>
      <?php endif; ?>
      <?php if($this->session->userdata('kategori') != '0') : ?>
        <li class="<?php if(!empty($my_orders) || !empty($order_history) || !empty($verifikasi)) echo 'active'; ?> treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if($this->session->userdata('kategori') != '0') : ?>
            <li class="<?php if(!empty($my_orders)) echo $my_orders; ?>"><a href="<?php echo site_url('order/my_orders'); ?>"><i class="fa fa-circle-o"></i> My Orders</a></li>
            <li class="<?php if(!empty($order_history)) echo $order_history; ?>"><a href="<?php echo site_url('order/order_history'); ?>"><i class="fa fa-circle-o"></i> Orders History</a></li>
          <?php endif; ?>
            <?php if($this->session->userdata('kategori') == '1') : ?>
            <li class="<?php if(!empty($verifikasi)) echo $verifikasi; ?>"><a href="<?php echo site_url('order/verifikasi'); ?>"><i class="fa fa-circle-o"></i> Verifikasi Pembayaran</a></li>
          <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>

      <?php if($this->session->userdata('kategori') == '2') : ?>
        <li class="<?php if(!empty($review)) echo 'active'; ?> treeview">
          <a href="#">
            <i class="fa fa-comments"></i> <span>Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(!empty($history)) echo $history; ?>"><a href="<?php echo site_url('review/history'); ?>"><i class="fa fa-circle-o"></i> History</a></li>
          </ul>
        </li>
      <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php 
        if($this->uri->segment(1) == 'home') {
          echo 'HOME';
        }else{
          echo str_replace('_',' ', strtoupper($this->uri->segment(2)));
        } 
      ?>
        <!-- <small>Control panel</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
  <?php endif; ?>