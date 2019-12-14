@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','edit '.$dosen->nip)
<div class="row">
  <div class="col"></div>
  <div class="col-6">
    <div class="card shadow rounded">
      <div class="card-body">
        <form action="{{route('admin.update.dsn', $dosen->id)}}" method="POST" class="form">
          {{ csrf_field() }}
          <br>
          <div class="form-group">
            <h5 class="label-control">Nama</h5>
            <input class="form-control" type="text" name="name" value="{{$dosen->name}}" readonly>
          </div>
          <div class="form-group">
            <h5 class="label-control">NIP</h5>
            <input class="form-control" readonly type="text" name="nip" value="{{$dosen->nip}}">
          </div>
          <div class="form-group">
            <h5 class="label-control">Kode</h5>
            <input class="form-control" readonly type="text" name="kode" value="{{$dosen->kode}}">
          </div>
          <div class="form-group">
            <h5 class="label-control">Alamat</h5>
            <input class="form-control" type="text" name="address" value="{{$dosen->address}}">
          </div>
          <div class="form-group">
            <h5 class="label-control">Kontak</h5>
            <input class="form-control" type="text" name="contact" value="{{$dosen->contact}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
          </div>
          <button class="btn btn-success btn-md" type="submit">Proses</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col"></div>
</div>
@endsection