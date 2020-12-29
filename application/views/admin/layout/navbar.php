<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?=base_url('backend/dashboard')?>" class="logo">
      <span class="logo-mini"></span>
      <span class="logo-lg"><i></i><b>Administrator</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href='<?=base_url()?>backend/login/logout'>
              <i class="fa fa-sign-out"></i> <span>Log Out</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

    <aside class="main-sidebar">
      <section class="sidebar">
      <div class="user-panel">
        <div style="margin-left: 50px">
          <img src="<?=base_url();?>assets/auth/user.png" height="100" width="100" alt="User Image">
        </div>
        <div style="color: white;margin-top: 10px; margin-left: 32px">
          Log as : <?=$this->session->userdata('level')?>
        </div>
      </div>
      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href='<?=base_url('backend/dashboard'); ?>'><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php
        if ($this->session->userdata('level') == 'Super Admin') {
        ?>
        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-share'></i> <span>Blog</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu'>
            <li><a href='<?=site_url('backend/berita/dt_ktg_berita')?>'><i class='fa fa-list'> Data Kategori Berita</i></a></li>
            <li><a href='<?=site_url('backend/berita')?>'><i class='fa fa-list'> Data Berita</i></a></li>
            <li><a href='<?=site_url('backend/slide')?>'><i class='fa fa-list'> Data Slide</i></a></li>
            <li><a href='<?=site_url('backend/video')?>'><i class='fa fa-list'> Data Video</i></a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-share'></i> <span>Galeri</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu'>
            <li><a href='<?=site_url('backend/berita/dt_ktg_galery')?>'><i class='fa fa-list'> Data Kategori Galeri</i></a></li>
            <li><a href='<?=site_url('backend/galery')?>'><i class='fa fa-list'> Data GAleri</i></a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-share'></i> <span>Teaching Factori</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu'>
            <li><a href='<?=site_url('backend/tefa')?>'><i class='fa fa-list'> Data Tefa Konten</i></a></li>
            <li><a href='<?=site_url('backend/tefa_kegiatan')?>'><i class='fa fa-list'> Data Tefa Kegiatan</i></a></li>
            <li><a href='<?=site_url('backend/tefa_galeri')?>'><i class='fa fa-list'> Data Tefa Galeri</i></a></li>
          </ul>
        </li>

        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-share'></i> <span>Data Master</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu'>
              <li><a href='<?=site_url('backend/siswa')?>'><i class='fa fa-list'> Data Siswa</i></a></li>
            <li><a href='<?=site_url('backend/prestasi')?>'><i class='fa fa-list'> Data Prestasi</i></a></li>
            <li><a href='<?=site_url('backend/profile')?>'><i class='fa fa-list'> Data Profile</i></a></li>
            <li><a href='<?=site_url('backend/guru')?>'><i class='fa fa-list'> Data Guru</i></a></li>
            <li><a href='<?=site_url('backend/jurusan')?>'><i class='fa fa-list'> Data Jurusan</i></a>
            </li>
          </ul>
        </li>

        <li><a href='<?=site_url('backend/setting')?>'><i class='fa fa-list'> Profil Sekolah</i></a>



        <li>
          <a href='<?=site_url('backend/pendaftaran')?>'>
            <i class='fa fa-list'> Data Pendaftaran</i>
          </a>
        </li>
        
        <?php
        }
        ?> 
        <li class="header">Akun</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span> Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?=site_url('backend/Pengguna/'); ?>"><i class="fa fa-list"> Daftar Pengguna</i></a></li>
              <li><a href="<?php echo site_url('backend/Pengguna/myakun') ?>"><i class="fa fa-user"> Akun Saya</i></a></li>
          </ul>
        </li>
      </ul>
      </section>
    </aside>