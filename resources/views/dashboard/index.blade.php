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
					<h3>Dashboard</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	@if (Auth::user()->role == 'admin')
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card px-4 py-4-5">
								<div class="card-title">
									<h6 class="text-muted font-semibold">Peserta Didik</h6>
								</div>
								<div class="card-body p-0">
									<div class="row">
										<div class="col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
											<div class="stats-icon blue">
												<i class="iconly-boldProfile"></i>
											</div>
										</div>
										<div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
											<h6 class="font-medium fs-1 mb-0">{{ App\Models\Student::count() }}</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card px-4 py-4-5">
								<div class="card-title">
									<h6 class="text-muted font-semibold">Administrator</h6>
								</div>
								<div class="card-body p-0">
									<div class="row">
										<div class="col-md-2 col-lg-12 col-xl-12 col-xxl-4 d-flex justify-content-start ">
											<div class="stats-icon blue">
												<i class="iconly-boldProfile"></i>
											</div>
										</div>
										<div class="col-md-10 col-lg-12 col-xl-12 col-xxl-8">
											<h6 class="font-medium fs-1 mb-0">{{ App\Models\User::where('role', 'admin')->count() }}</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card px-4 py-4-5">
								<div class="card-title">
									<h6 class="text-muted font-semibold">Pembimbing Siswa</h6>
								</div>
								<div class="card-body p-0">
									<div class="row">
										<div class="col-md-2 col-lg-12 col-xl-12 col-xxl-4 d-flex justify-content-start ">
											<div class="stats-icon blue">
												<i class="iconly-boldProfile"></i>
											</div>
										</div>
										<div class="col-md-10 col-lg-12 col-xl-12 col-xxl-8">
											<h6 class="font-medium fs-1 mb-0">{{ App\Models\User::where('role', 'ps')->count() }}</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="row">
				<div class="col-12 col-lg-12">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card px-4 py-4-5">
								<div class="card-title">
									<h6 class="text-muted font-semibold">Rombel</h6>
								</div>
								<div class="card-body p-0">
									<div class="row">
										<div class="col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
											<div class="stats-icon blue">
												<i class="iconly-boldBookmark"></i>
											</div>
										</div>
										<div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
											<h6 class="font-medium fs-1 mb-0">{{ App\Models\Rombel::count() }}</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="card px-4 py-4-5">
								<div class="card-title">
									<h6 class="text-muted font-semibold">Rayon</h6>
								</div>
								<div class="card-body p-0">
									<div class="row">
										<div class="col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
											<div class="stats-icon blue">
												<i class="iconly-boldBookmark"></i>
											</div>
										</div>
										<div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
											<h6 class="font-medium fs-1 mb-0">{{ App\Models\Rayon::count() }}</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	@else
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card px-4 py-4-5">
								<div class="card-title">
									@php
										setlocale(LC_ALL, 'IND');
										$user = auth()->user();
										$rayon = $user->rayon;
										$student = $rayon->student()->where('rayon_id', $rayon->id);
										$lateStudents = $rayon->student()->whereHas('late', function ($query) {
											$query->whereDate('date_time_late', Carbon\Carbon::today());
										});
									@endphp
									<h6 class="text-muted font-semibold">Peserta Didik Rayon {{ $user->rayon->rayon }}</h6>
								</div>
								<div class="card-body p-0">
									<div class="row">
										<div class="col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
											<div class="stats-icon blue">
												<i class="iconly-boldProfile"></i>
											</div>
										</div>
										<div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
											<h6 class="font-medium fs-1 mb-0">{{ $student->count() }}</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="card px-4 py-4-5">
								<div class="card-title">
									<h6 class="text-muted font-semibold">Keterlambatan {{ $rayon->rayon }} Hari Ini</h6>
									<h6>{{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</h6>
								</div>
								<div class="card-body p-0">
									<div class="row">
										<div class="col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
											<div class="stats-icon blue">
												<i class="iconly-boldProfile"></i>
											</div>
										</div>
										<div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
											<h6 class="font-medium fs-1 mb-0">{{ $lateStudents->count() }}</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	@endif
@endsection