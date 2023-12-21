{{-- <div class="container-fluid">
  <div class="row flex-nowrap "> --}}
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
              <hr>
          </div>
      </div>
  {{-- </div>
</div> --}}