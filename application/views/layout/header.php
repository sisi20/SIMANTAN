<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?= $judul ?></title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets1/custom.css'); ?>">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header fonts">
        <h3 class="fonts">SiManTan-PCR</h3>
        <img src="<?= base_url('assets1/img/Politeknik_Caltex_Riau.png') ?>" class="img-fluid">
      </div>

      <ul class="list-unstyled components container-fluid">
        <li><a href="<?= base_url('kegiatan') ?>" class="font">List Kegiatan</a></li>
        <li><a href="<?= base_url('kegiatan/tambah') ?>" class="font">Tambah Kegiatan</a></li>

        <!-- <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li> -->
      </ul>

      <ul class="list-unstyled CTAs naik">
        <li>
          <a href="<?=base_url('login/logout')?>" class="download font-weight-bold">Logout</a>
        </li>
      </ul>

      <span class="fixed-bottom"><a href="https://pcr.ac.id/">&copy;2021 Politeknik Caltex Riau</a></span>
    </nav>
    <!-- Page Content  -->
    <div id="content">

      <div class="row" style="margin-top: 10px;">
        <div class="col-md-12 font"> <p style="margin-top: 10px; margin-bottom: 10px;"><center>Selamat Datang</center></p> </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-success">
            <i class="fas fa-bars white"></i>
          </button>

          <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fas fa-align-justify"></i>
                    </button> -->

          <div class="col-md-6 collapse navbar-collapse" id="navbarSupportedContent">
            <ul style=" list-style-type: none; margin-bottom: auto; margin-left: -20px;">
              <li>
                <div class="font FontKiri">SiManTan-PCR</div>
              </li>
              <li>
                <div class="font FontKiri" style="font-size: 14px;">Sistem Manajemen Kegiatan PCR</div>
              </li>
            </ul>
          </div>

          <div class="col-md-6 collapse navbar-collapse" id="navbarSupportedContent">
            <div class=" font FontKanan"><?= $user['nama'] ?></div>
          </div>

        </div>
      </nav>