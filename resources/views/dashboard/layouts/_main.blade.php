<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ndely Blog | Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      nav{
        height: 60px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-white shadow p-0">
      <div class="container-fluid">
        <a class="navbar-brand fw-medium fs-4" href="#" style="color: #084298">Rekam Keterlambatan</a>
        <i class="bi bi-list fs-2 m-0" style="color: #084298"></i>
        <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
          <ul class="navbar-nav w-100 mb-2 mb-lg-0">
            <li class="nav-item dropdown ms-auto">
              <a class="nav-link dropdown-toggle fs-6" style="color: #084298" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill fs-5"></i>
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white shadow p-2" >
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
              <li class="nav-item">
                <a href="/" class="nav-link align-middle px-0">
                  <i class="bi bi-grid fs-6"></i>
                  <span class="ms-1 d-none d-sm-inline" style="font-family: 'Rethink Sans', sans-serif;">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="bi bi-menu-button-wide"></i>
                <span class="ms-1 d-none d-sm-inline">Data Master</span> </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu" style="list-style-type:circle" >
                  <li class="w-100" style="margin: 0px 0px 0px 35px" >
                    <a href="{{ route('rombel.home')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Rombel</span></a>
                  </li>

                  <li style="margin: 0px 0px 0px 35px">
                    <a href="{{ route('rayon.home')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Rayon</span></a>
                  </li>

                  <li style="margin: 0px 0px 0px 35px">
                    <a href="{{ route('siswa.home') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Siswa</span></a>
                  </li>

                  <li style="margin: 0px 0px 0px 35px">
                    <a href="{{ route('user.home') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Data User</span></a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="nav-link px-0 align-middle" aria-current="page" href="{{ route('keterlambatan.home') }}">
                  <i class="bi bi-clipboard-data"></i>
                  <span class="ms-1 d-none d-sm-inline">Data Keterlambatan</span> </a>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 py-3 px-4 container" style="background: #eaf1fb;">
          @yield('container')
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
