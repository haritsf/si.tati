@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','dashboard')

<section class="section">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-statistic-1 shadow rounded">
        <div class="card-icon bg-secondary">
          <i class="fas fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Tugas Akhir</h4>
          </div>
          <div class="card-body">
            {{ count($datas['ta']) }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-statistic-1 shadow rounded">
        <div class="card-icon bg-secondary">
          <i class="fas fa-user-tie"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Dosen</h4>
          </div>
          <div class="card-body">
            {{ count($datas['dosen']) }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-statistic-1 shadow rounded">
        <div class="card-icon bg-secondary">
          <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Mahasiswa</h4>
          </div>
          <div class="card-body">
            {{ count($datas['mahasiswa']) }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection