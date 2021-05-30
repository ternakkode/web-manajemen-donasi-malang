<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @yield('meta')
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <title>@yield('title') | Ketimbang Ngemis Malang</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
  @yield('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <form method="POST" action="{{ url('auth/logout')}}" class="d-inline mr-4">
              @csrf
              <a class="font-weight-bold text-white" href="#" onclick="$(this).closest('form').submit()"><i class="fas fa-sign-out-alt fa-xs fa-fw mr-1 text-gray-400"></i> Keluar</a>
            </form>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('') }}">Ketimbang Ngemis</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('') }}">KM</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Pilihan Menu</li>
            <li><a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-home"></i> <span>Halaman Awal</span></a></li>
            <li><a class="nav-link" href="{{ url('admin/user-management/admin') }}"><i class="fas fa-users"></i> <span>Data Admin</span></a></li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i>
                <span>Publikasi</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('admin/publication/information-category') }}">Kategori Informasi</a></li>
                <li><a class="nav-link" href="{{ url('admin/publication/information') }}">Informasi</a></li>
                <li><a class="nav-link" href="{{ url('admin/publication/faq') }}">Pertanyaan Umum</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="{{ url('admin/charity/solia') }}"><i class="fas fa-people-carry"></i> <span>Solia</span></a></li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hand-holding-usd"></i>
                <span>Penggalangan Dana</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('admin/charity/campaign-type') }}">Kategori</a></li>
                <li><a class="nav-link" href="{{ url('admin/charity/campaign') }}">Data</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-wallet"></i>
                <span>Keuangan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('admin/financial/donation') }}">Donasi</a></li>
                <li><a class="nav-link" href="{{ url('admin/financial/outcome') }}">Pengeluaran</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="{{ url('admin/setting') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Halaman Awal</a></div>
              @yield('breadcrumbs')
            </div>
          </div>

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Ketimbang Ngemis Malang</a>
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
  <script src="{{ asset('js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  @yield('js')
</body>

</html>