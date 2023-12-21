{{-- @extends('dashboard.layouts.main')

@section('container')
  <h1>Edit Data User</h1>
  <p>Home / Data User / Edit Data User</p>

  <div class="card px-3">
    <div class="card-body">
      <form action="{{ route('user.update', $user['id']) }}" method="post">
        @csrf
        @method('PATCH')

        @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif
    
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control @error('name') is-invvalid @enderror" id="name" name="name" value="{{ $user['name'] }}" >
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invvalid @enderror" id="email" name="email" value="{{ $user['email'] }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <input type="hidden" name="password" id="password">
        <div class="mb-3">
          <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna:</label>
          <select class="form-select" id="role" name="role" required>
            <option selected disabled hidden>Open this select menu</option>
            <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="ps" {{ $user['role'] == 'ps' ? 'selected' : '' }}>Pembimbing Siswa</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="hidden" name="oldPassword" value="{{ $user['password'] }}">
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary my-3 col-sm-3">Edit</button>
      </form>
    </div>
  </div>
@endsection --}}

@extends('.dashboard.layouts.main')

@section('container')
  <header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>
	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3>Edit Data User</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('user.home') }}">Data User</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Data User</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="page-content">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <form class="form form-vertical" action="{{ route('user.update', $user['id']) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user['name'] }}" name="name">
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user['email'] }}" name="email">
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                      <option disabled hidden>Pilih</option>
                        <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                      <option value="ps" {{ $user['role'] == 'ps' ? 'selected' : '' }}>Pembimbing Siswa</option>
                    </select>
                    @error('role')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="hidden" name="oldPassword" value="{{ $user['password'] }}">
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                  <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
	</div>
@endsection