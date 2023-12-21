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
					<h3>Detail Data Keterlambatan</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('ps.keterlambatan.home') }}">Data Keterlambatan</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail Data Keterlambatan</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
  <ol class="breadcrumb d-flex align-items-end gap-2">
    <li><h4 class="m-0">{{ $student['name'] }}</h4></li>
    |
    <li class="active">{{ $student['nis'] }}</li>
    |
    <li class="active">{{ $student['rombel']['rombel'] }}</li>
    |
    <li class="active">{{ $student['rayon']['rayon'] }}</li>
    |
  </ol>
	<div class="page-content">
    <div class="row">
      @php $no = 1; @endphp
      @foreach ($student['late'] as $item)
        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="card p-3">
            <div class="card-content">
              <div class="card-body p-0">
                <h4 class="card-title m-0">Keterlambatan Ke-{{ $no++ }}</h4>
                <p class="card-text">{{ Carbon\Carbon::parse($item['date_time_late'])->formatLocalized('%d %B %Y %H:%M') }}</p>
                <p class="card-text text-primary fw-bold">{{ $item['information'] }}</p>
              </div>
              <div class="card-image mt-3 text-center">
                <img class="img-fluid" src="{{ asset('storage/' . $item['bukti']) }}" style="height: 200px;">
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
	</div>
@endsection