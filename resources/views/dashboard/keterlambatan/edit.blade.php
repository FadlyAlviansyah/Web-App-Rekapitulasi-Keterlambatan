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
					<h3>Edit Data Keterlambatan</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('keterlambatan.home') }}">Data Keterlambatan</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Data Keterlambatan</li>
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
          <form class="form form-vertical" action="{{ route('keterlambatan.update', $late['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="student_id">Siswa</label>
                    <select class="form-select @error('student_id') is-invalid @enderror" id="stdent_id" name="student_id" required>
                      <option disabled hidden>Pilih</option>
                      @foreach ($students as $student)  
                        <option value="{{ $student['id'] }}" {{ $student['id'] == $late['student_id'] ? 'selected' : '' }}>{{ $student['name'] }}</option>
                      @endforeach
                    </select>
                    @error('student_id')
                      <div class="invalid-feedback">
                        The siswa field is required
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="date">Tanggal</label>
                    @php
                      setlocale(LC_ALL, 'IND');
                    @endphp
                    <input type="datetime-local" id="date" class="form-control @error('date_time_late') is-invalid @enderror" value="{{ Carbon\Carbon::parse($late['date_time_late']) }}" name="date_time_late">
                    @error('date_time_late')
                      <div class="invalid-feedback">
                        The tanggal field is required
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="information">Keterangan Keterlambatan</label>
                    <textarea name="information" id="information" class="form-control">{{ $late['information'] }}</textarea>
                    @error('information')
                      <div class="invalid-feedback">
                        The keterangan keterlambatan field is required
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="bukti">Bukti</label>
                    <input type="file" class="form-control" id="bukti" name="bukti">
                    <input type="hidden" name="buktiOld" value="{{ $late['bukti'] }}">
                    <img src="{{ asset('storage/' . $late['bukti']) }}" class="img-preview img-fluid my-3 col-sm-5">
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