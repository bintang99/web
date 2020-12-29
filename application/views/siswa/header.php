<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Siswa | Smk Pasim Plus Sukabumi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/logo.png">
  <link rel="stylesheet" href="<?=base_url(); ?>assets/auth/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url(); ?>assets/auth/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url(); ?>assets/auth/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url(); ?>assets/auth/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url(); ?>assets/auth/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url(); ?>assets/auth/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="<?=base_url(); ?>assets/auth/bower_components/sweetalert/sweetalert2.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
  <body class="skin-blue fixed" data-spy="scroll" data-target="#scrollspy" onload="document.getElementById('no_reg').focus();">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <!-- Logo -->
        <a href="<?=base_url()?>assets/admin/index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>PSB</b>FORM</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href='<?=base_url()?>login_siswa/logout'>
                  <i class="fa fa-sign-out"></i> <span>Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="sidebar" id="scrollspy">
          <?php
            if($header=='profile'){
          ?>
            <ul class="nav sidebar-menu">
            <li class="header">Tahap 2</li>
            <li class="active"><a href="#" onclick="window.print()">Print</a></li>
          </ul>
          <?php
          }else{
          ?>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="nav sidebar-menu">
            <li class="header">Tahap 1</li>
            <li class="treeview active" id="scrollspy-components">
              <a href="#"> Isi data</a>
            <ul class="nav treeview-menu">
              <li class="treeview active"><a href="#siswa"><i class="fa fa-circle-o"></i> Isi Data Siswa</a></li>
              <li><a href="#ortu"><i class="fa fa-circle-o"></i> Data Orangtua</a></li>
              <li><a href="#akademik"><i class="fa fa-circle-o"></i> Potensi Akademik</a></li>
              <li><a href="#sekolah"><i class="fa fa-circle-o"></i> Data Asal Sekolah</a></li>
              <li><a href="#dokumen"><i class="fa fa-circle-o"></i> Dokumen</a></li>
            </ul>
            </li>
          </ul>

        <?php 
      }
         ?>
        </div>
        <!-- /.sidebar -->
      </aside>
