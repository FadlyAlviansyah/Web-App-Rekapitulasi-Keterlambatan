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
					<h3>Data Siswa</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
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
          <a class="btn btn-primary" href="{{ route('siswa.create') }}">Tambah</a>
          <div class="table-responsive">
            <table class="table table-hover table-lg" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Rombel</th>
                  <th>Rayon</th>
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
                    <td>{{ $item['rombel']['rombel'] }}</td>
                    <td>{{ $item['rayon']['rayon'] }}</td>
                    <td class="d-flex justify-content-center">
                      <a href="{{ route('siswa.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                      <form action="{{ route('siswa.delete', $item['id']) }}" method="post">
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