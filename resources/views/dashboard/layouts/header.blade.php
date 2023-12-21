{{-- <header class="navbar sticky-top bg-light flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-4 fw-bold text-primary" href="#">Rekam Keterlambatan</a>
  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="feather-icon" data-feather="menu"></i>
      </button>
    </li>
  </ul>
  <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="nav-link px-3 text-primary">Administrator <i class="feather-icon" data-feather="log-out"></i></button>
      </form>
    </div>
  </div>
</header> --}}

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