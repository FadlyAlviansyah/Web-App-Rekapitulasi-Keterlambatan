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
					<h3>Edit Data Rayon</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ route('rayon.home') }}">Data Rayon</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Data Rayon</li>
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
          <form class="form form-vertical" action="{{ route('rayon.update', $rayon['id']) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="name">Rayon</label>
                    <input type="text" id="name" class="form-control @error('rayon') is-invalid @enderror" value="{{ $rayon['rayon'] }}" name="rayon">
                    @error('rayon')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="user_id">Pembimbing Siswa</label>
                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                      <option disabled hidden>Pilih</option>
                      @foreach ($ps as $item)  
                        <option value="{{ $item->id }}" {{ $item->id = $rayon['user_id'] ? 'selectd' : '' }}>{{ $item->name }}</option>
                      @endforeach
                    </select>
                    @error('user_id')
                      <div class="invalid-feedback">
                        The pembimbing siswa field is required
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