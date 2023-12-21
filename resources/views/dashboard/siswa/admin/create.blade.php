@extends('dashboard.layouts.main')

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
					<h3>Tambah Data Siswa</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('siswa.home') }}">Data Siswa</a></li>
							<li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
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
          <form class="form form-vertical" action="{{ route('siswa.store') }}" method="post">
            @csrf
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" id="nis" class="form-control @error('nis') is-invalid @enderror" name="nis">
                    @error('nis')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="rombel_id">Rombel</label>
                    <select class="form-select @error('rombel_id') is-invalid @enderror" id="rombel_id" name="rombel_id" required>
                      <option selected disabled hidden>Pilih</option>
                      @foreach ($rombels as $item)  
                        <option value="{{ $item->id }}">{{ $item->rombel }}</option>
                      @endforeach
                    </select>
                    @error('rombel_id')
                      <div class="invalid-feedback">
                        The rombel field is required
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="rayon_id">Rayon</label>
                    <select class="form-select @error('rayon_id') is-invalid @enderror" id="rayon_id" name="rayon_id" required>
                      <option selected disabled hidden>Pilih</option>
                      @foreach ($rayons as $item)  
                        <option value="{{ $item->id }}">{{ $item->rayon }}</option>
                      @endforeach
                    </select>
                    @error('rayon_id')
                      <div class="invalid-feedback">
                        The rayon field is required
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
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