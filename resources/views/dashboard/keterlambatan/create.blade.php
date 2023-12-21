{{-- @extends('dashboard.layouts.main')

@section('container')
  <h1>Tambah Data Keterlambatan</h1>
  <p>Home / Data Keterlambatan / Tambah Data Keterlambatan</p>

  <div class="card px-3">
    <div class="card-body">
      <form action="{{ route('keterlambatan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
    
        <div class="mb-3">
          <label for="student_id" class="form-label">Siswa</label>
          <select class="form-select" name="student_id" id="student_id" required>
            <option selected hidden disabled>Pilih</option>
            @foreach ($students as $student)
              <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="date" class="form-label">Tanggal</label>
          <input type="datetime-local" class="form-control @error('date_time_late') is-invalid @enderror" id="date" name="date_time_late">
          @error('date_time_late')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="information" class="form-label">Keterangan Keterlambatan</label>
          <textarea class="form-control @error('information') is-invalid @enderror" id="information" name="information"></textarea>
          @error('information')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="bukti" class="col-sm-2 col-form-label">Bukti</label>
          <input type="file" class="form-control @error('bukti') is-invalid @enderror" id="bukti" name="bukti">
          @error('bukti')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary my-3 col-sm-3">Tambah</button>
      </form>
    </div>
  </div>
@endsection --}}

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
					<h3>Tambah Data Keterlambatan</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('keterlambatan.home') }}">Data Keterlambatan</a></li>
							<li class="breadcrumb-item active" aria-current="page">Tambah Data Keterlambatan</li>
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
          <form class="form form-vertical" action="{{ route('keterlambatan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="student_id">Siswa</label>
                    <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" name="student_id">
                      <option selected disabled hidden>Pilih</option>
                      @foreach ($students as $student)  
                        <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
                      @endforeach
                    </select>
                    @error('student_id')
                      <div class="invalid-feedback">
                        The student field is required
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="date">Tanggal</label>
                    @php
                      setlocale(LC_ALL, 'IND');
                    @endphp
                    <input type="datetime-local" class="form-control @error('date_time_late') is-invalid @enderror" id="date" name="date_time_late"
                      value="{{ Carbon\Carbon::now() }}"
                    >
                    @error('date_time_late')
                      <div class="invalid-feedback">
                        The date field is required
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="information">Informasi</label>
                    <textarea id="information" class="form-control @error('information') is-invalid @enderror" name="information"></textarea>
                    @error('information')
                      <div class="invalid-feedback">
                        The information field is required</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="bukti">Bukti</label>
                    <input type="file" class="form-control @error('bukti') is-invalid @enderror" id="bukti" name="bukti">
                    @error('bukti')
                      <div class="invalid-feedback">
                        {{ $message }}
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