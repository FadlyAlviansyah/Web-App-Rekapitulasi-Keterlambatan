@extends('dashboard.layouts.main')

@section('container')

  <h1 class="fs-2 fw-bold">Data Keterlambatan</h1>
  <p>Home / Data Keterlambatan</p>

  <div class="card px-3">
    <div class="card-body">
      @if (Session::get('added'))
        <div class="alert alert-success">{{ Session::get('added') }}</div>
      @endif
      @if (Session::get('edited'))
        <div class="alert alert-success">{{ Session::get('edited') }}</div>
      @endif
      @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
      @endif
      <a class="btn btn-primary" href="{{ route('keterlambatan.create') }}">Tambah</a>
      <a class="btn btn-info text-white" href="{{ route('keterlambatan.rekap.export-excel') }}">Export Data Keterlambatan</a>
      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('keterlambatan.home') }}">Keseluruhan Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('keterlambatan.rekap.home') }}">Rekapitulasi Data</a>
        </li>
      </ul>      
      <table class="table table-hover">
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
              <td><a href="" class="text-decoration-none">Lihat</a></td>
              <td>
                @if ($item['late']->count() >= 3)
                  <a href="{{ route('keterlambatan.rekap.download', $item['id']) }}" class="btn btn-primary">Centak Surat Pernyataan</a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection