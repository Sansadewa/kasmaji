<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile Panel Sipaju</title>

  <!-- plugins:css -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/css/style.css">
  <!-- endinject -->

  <link rel="shortcut icon" href="<?php echo base_url();?>/public/images/favicon.png" />
  <style type="text/css">
    .sebuah-tabelWrapper {
    width: 100%;
    margin: 0 auto;
}
  </style>
</head>

<body style="padding:0; min-height: 100%">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>/public/images/sipaju.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>/public/images/logo57fix.png" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><?php echo $this->session->userdata('nama'); ?></span>
              <img class="img-xs rounded-circle" src="<?php echo base_url();?>public/images/user.png" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" href="<?php echo base_url();?>akun/logout" aria-labelledby="UserDropdown">
              <a class="dropdown-item mt-2" href="<?php echo base_url();?>akun/logout">
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav> 

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
               <!-- <div class="profile-image">
                  <img src="images/faces/face1.jpg" alt="profile image"> 
                </div> -->
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo wordwrap(strtoupper($this->session->userdata('nama')),20,"<br>\n"); ?></p>
                  <div>
                    <small class="designation text-muted"><?php echo $this->session->userdata('nim'); ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>/akun">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Profil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-library-books"></i>
              <span class="menu-title">Skripsi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>akun/topik/<?php echo $this->session->userdata('nim'); ?>">Topik Saya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>akun/alltopik">Seluruh Topik</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>akun/IPK">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Kalkulator IPK</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>akun/BTM">
              <i class="menu-icon mdi mdi-book-open-page-variant"></i>
              <span class="menu-title">Buku Tahunan Mahasiswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uii-basic" aria-expanded="false" aria-controls="uii-basic">
              <i class="menu-icon mdi mdi-library-books"></i>
              <span class="menu-title">Simsalabim!</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uii-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>akun/abrakadabra">Entri Pilihan Simulasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>akun/simsalabim">Hasil Simulasi</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>akun/simsalabim">
              <i class="menu-icon mdi mdi-book-open-page-variant"></i>
              <span class="menu-title">SIMULASI GAES</span>
            </a>
          </li>

          <?php $nim=$this->session->userdata('nim');
                if($nim=='15.8658' || $nim== '15.8918' || $nim== '15.8605' || $nim== '15.8889' || $nim=='15.8792' || $nim=='15.8507' || $nim== '15.8825' || $nim== '15.8888' || $nim== '15.8898' || $nim== '15.8608' || $nim== '15.8493' || $nim== '15.8756' || $nim== '15.8873' || $nim== '15.8893'  || $nim== '15.8861' || $nim== '15.8636' ||  $nim== '15.8668'|| $nim== '15.8643'|| $nim== '15.8468'|| $nim== '15.8680'|| $nim== '15.8770'|| $nim== '15.8499' || $nim=='15.8725') { ?>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>akun/rekap_btm">
                    <i class="menu-icon mdi mdi-book-open-page-variant"></i>
                    <span class="menu-title">Rekap BTM</span>
                    </a>
                  </li>

                <?php  
                } ?>
         

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>akun/logout">
              <i class="menu-icon mdi mdi-logout-variant"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>RANK DISINI NIH</p>
                  <a class="btn ml-auto purchase-button d-none d-md-block" href="<?php echo base_url(); ?>akun/rank">PENCET SINI</a>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>

          <!--CONTENT MASUK SINI-->
