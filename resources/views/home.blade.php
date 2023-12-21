@extends('dashboard.layouts.main')

@section('container')
  <h1>Dashboard</h1>
  <p>Home / Dashboard</p>
  <div class="container text-center">
    <div class="row">
      <div class="card col-sm-6">
        <div class="card-body">
          <h4>Peserta Didik</h4>
        </div>
      </div>
      <div class="card col-sm-3">
        <div class="card-body">
          <h4>Administrator</h4>
        </div>
      </div>
      <div class="card col-sm-3">
        <div class="card-body">
          <h4>Pembimbing Siswa</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card col-sm-6">
        <div class="card-body">
          <h4>Rombel</h4>
        </div>
      </div>
      <div class="card col-sm-6 ">
        <div class="card-body">
          <h4>Rayon</h4>
        </div>
      </div>
    </div>
  </div>
@endsection