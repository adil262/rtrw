<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>AdminLTE 3 | Starter</title>
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome Icons -->
 <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
 @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">


   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
     <li class="nav-item">
       <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
         <i class="fas fa-th-large"></i>
       </a>
     </li>
   </ul>
 </nav>
 <!-- /.navbar -->
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">AdminLTE 3</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Alexander Pierce</a>
       </div>
     </div>
     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>
     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
           <a href="/home" class="nav-link">
             <i class="nav-icon fas fa-home"></i>
             <p>
               Home
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="/aset_warga" class="nav-link">
             <i class="nav-icon fas fa-toolbox"></i>
             <p>
               Aset Warga
             </p>
           </a>
         </li>
         <li class="nav-item">
          <a href="/pengeluaran_kas" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              Pengeluaran Kas
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/posyandu" class="nav-link">
            <i class="nav-icon fas fa-clinic-medical"></i>
            <p>
              Posyandu
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/riwayat_iuran" class="nav-link">
            <i class="nav-icon fas fa-search-dollar"></i>
            <p>
              Riwayat Iuran
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/transaksi_iuran" class="nav-link">
            <i class="nav-icon fas fa-hand-holding-usd"></i>
            <p>
              Transaksi Iuran
            </p>
          </a>
        </li>
         <li class="nav-item">
           <a href="/datatamu" class="nav-link">
             <i class="nav-icon fas fa-user-check"></i>
             <p>
               Data Tamu
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="/ronda" class="nav-link">
             <i class="nav-icon fas fa-chalkboard-teacher"></i>
             <p>
               Ronda
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="/jadwalronda" class="nav-link">
             <i class="nav-icon fas fa-calendar-day"></i>
             <p>
               Jadwal Ronda
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="/arsiprtrw" class="nav-link">
             <i class="nav-icon fas fa-folder-open"></i>
             <p>
               Arsip RT RW
             </p>
           </a>
         </li>
         <li class="nav-item">
          <a href="/usahawarga" class="nav-link">
            <i class="nav-icon fas fa-store"></i>
            <p>
              Usaha Warga
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/wargas" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p>
              Warga
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/sarankel" class="nav-link">
            <i class="nav-icon fas fa-bullhorn"></i>
            <p>
              Saran dan Keluhan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/berita" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Berita
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/informasi_warga" class="nav-link">
            <i class="nav-icon fas fa-info"></i>
            <p>
              Informasi Warga
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/pengajuan_surat" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Pengajuan Surat
            </p>
          </a>
        </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">


   <!-- Main content -->
   <div class="content">
     <div class="container-fluid">
     @yield('content')
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
</aside>
 <!-- /.control-sidebar -->

 <!-- Main Footer -->
 <footer class="main-footer">
   <!-- To the right -->
   <div class="float-right d-none d-sm-inline">
     Anything you want
   </div>
   <!-- Default to the left -->
   <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
 </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>
@yield('js')
</body>
</html>
