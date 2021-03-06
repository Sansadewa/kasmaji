<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KASMAJI</title>

  <!-- plugins:css -->
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/jquery.dataTables.min.css"> -->

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
  <link rel="shortcut icon" href="<?php base_url();?>public/images/favicon.ico" />

  <style type="text/css">
    .sebuah-tabelWrapper {
    width: auto;
    margin: 0 auto;
}

#searchbox{
background:transparent; border:none; border-bottom:1px solid white;
}
#searchbox::placeholder {color: white;opacity: 1;}


  </style>
  <script src="<?php echo base_url();?>/public/vendors/js/vendor.bundle.base.js"></script>
</head>

<body style="padding:0; min-height: 100%">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>" style="height:63">
          <img src="<?php echo base_url(); ?>/public/images/kasmaji-panjang.png" alt="logo" height="60" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>/public/images/logo-mini.jpeg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <!-- //Searchbox -->
        <div style="float:left" class="d-inline-block">
        <form action="<?php echo base_url().'search' ?>" method="get" style="margin-bottom:0;">
          <a  style="cursor: pointer;" class=""><i id="searchbutton" class="icon mdi mdi-magnify mdi-lg lg"></i>
            <span>
                <input style="display:none" id="searchbox" class="text-white" placeholder="Cari Teman" name="search">
                <!-- <button class="btn btn-sm text-white">Cari!</button> -->
            </span>
          </a>
        </form>
        </div>


        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-lg-inline-block d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><?php echo $this->session->userdata('nama'); ?></span>
              <img class="img-xs rounded-circle" style="border: 2px solid #ffffff;
    padding: 1px;" src="<?php echo base_url()."lihatfoto/".$this->session->userdata('username');?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" href="<?php echo base_url();?>akun/logout" aria-labelledby="UserDropdown">
            <a class="dropdown-item mt-2" href="<?php echo base_url();?>akun/gantipassword">
                Ganti Password
            </a>
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
      <hr class="my-0">
        <ul class="nav">
          <li class="nav-item nav-profile align-self-center">
            <div class="nav-link align-self-center">
              <div class="user-wrapper">
                <br>
               <div class="profile-image">
                  <!-- <img src="<?php echo base_url(); ?>foto/masukinlinkdisini.jpg" alt="profile image">  -->
                  <img style="border: 2px solid #259b87;
    padding: 1px;" src="<?php echo base_url()."lihatfoto/".$this->session->userdata('username');?>" alt="profile image"> 

                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo wordwrap(strtoupper($this->session->userdata('nama')),20,"<br>\n"); ?></p>
                  <div>
                    <small class="designation text-muted"><?php echo $this->session->userdata('kelas'); ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-0">
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>/akun">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Profil</span>
            </a>
          </li>

          <!-- <li class="nav-item">
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
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>akun/pendidikan">
              <i class="menu-icon mdi mdi-book-open-page-variant"></i>
              <span class="menu-title">Pendidikan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>akun/pekerjaan">
              <i class="menu-icon mdi mdi-briefcase"></i>
              <span class="menu-title">Pekerjaan</span>
            </a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>akun/usaha">
              <i class="menu-icon mdi mdi-clipboard-text"></i>
              <span class="menu-title">Usaha</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>akun/sharing">
              <i class="menu-icon mdi mdi-human-greeting"></i>
              <span class="menu-title">Sharing Kasmaji</span>
            </a>
          </li>
          <?php if ($this->session->userdata('role')==99){ ?>
          


                <li class="nav-item" id="entri">
                  <a class="nav-link" data-toggle="collapse" href="#ui-basicc" aria-expanded="false" aria-controls="ui-basicc">
                  <i class="menu-icon mdi mdi-account"></i>

                    <span class="menu-title">Admin</span>
                    <i class="menu-arrow"></i>
                  </a>
                <div class="collapse" id="ui-basicc" >
                  <ul class="nav flex-column sub-menu" >
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url(); ?>akun/allprofil"><i class="menu-icon mdi mdi-contacts"></i>Profil Alumni</a>
                    </li>
                  </ul>
                </div>
              </li>
              
          <?php } ?>
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
          
          

          <!--CONTENT MASUK SINI-->
