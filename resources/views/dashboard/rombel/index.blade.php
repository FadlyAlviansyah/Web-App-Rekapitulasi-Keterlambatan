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
					<h3>Data Rombel</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data Rombel</li>
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
          @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
              {{ Session::get('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (Session::get('successEdit'))
            <div class="alert alert-success alert-dismissible show fade">
              {{ Session::get('successEdit') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (Session::get('deleted'))
            <div class="alert alert-danger alert-dismissible show fade">
              {{ Session::get('deleted') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <a class="btn btn-primary" href="{{ route('rombel.create') }}">Tambah</a>
          <div class="table-responsive">
            <table class="table table-hover table-lg" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Rombel</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @foreach ($rombels as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['rombel'] }}</td>
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('rombel.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                      <form action="{{ route('rombel.delete', $item['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
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
@endsection