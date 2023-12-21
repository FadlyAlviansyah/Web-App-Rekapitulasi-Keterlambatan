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
					<h3>Data Keterlambatan</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data Keterlambatan</li>
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
          @if (Session::get('added'))
            <div class="alert alert-success alert-dismissible show fade">
              {{ Session::get('added') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (Session::get('edited'))
            <div class="alert alert-success alert-dismissible show fade">
              {{ Session::get('edited') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (Session::get('deleted'))
            <div class="alert alert-danger alert-dismissible show fade">
              {{ Session::get('deleted') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <a class="btn btn-primary" href="{{ route('keterlambatan.create') }}">Tambah</a>
          <a class="btn btn-info text-white" href="{{ route('keterlambatan.rekap.export-excel') }}">Export Data Keterlambatan</a>
          <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" data-bs-toggle="tab" href="#keseluruhan-data" role="tab" aria-controls="home" aria-selected="true">Keseluruhan Data</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rekapitulasi Data</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="keseluruhan-data" role="tabpanel" aria-labelledby="home-tab">
              <div class="table-responsive my-2">
                <table class="table table-hover table-lg" id="table2">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Informasi</th>
                      <th>Bukti</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach ($lates as $item)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                          <li class="list-group-item border-0 p-0">{{ $item['student']['nis'] }}</li>
                          <li class="list-group-item border-0 p-0">{{ $item['student']['name'] }}</li>
                        </td>
                        @php
                          setlocale(LC_ALL, 'IND');
                        @endphp
                        <td>
                          {{ Carbon\Carbon::parse($item['date_time_late'])->formatLocalized('%d %B %Y %H:%M') }}
                        </td>
                        <td>{{ $item['information']}}</td>
                        <td>
                          <img src="{{ asset('storage/' . $item['bukti']) }}" style="max-width: 100px">
                        </td>
                        <td>
                          <div class="buttons d-flex justify-content-center">
                            <a href="{{ route('keterlambatan.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                            <form action="{{ route('keterlambatan.delete', $item['id']) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="table-responsive my-2">
                <table class="table table-hover table-lg" id="table1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Jumlah Keterlambatan</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach ($students as $item)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item['nis'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['late']->count() }}</td>
                        <td><a href="{{ route('keterlambatan.detail', $item['id']) }}" class="text-decoration-none">Lihat</a></td>
                        <td>
                          @if ($item['late']->count() >= 3)
                            <a href="{{ route('keterlambatan.rekap.download', $item['id']) }}" class="btn btn-primary">Cetak Surat Pernyataan</a>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
@endsection