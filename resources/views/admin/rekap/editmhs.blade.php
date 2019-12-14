@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','edit '.$datas['Mahasiswa']->nim)
<div class="row">
  <div class="col"></div>
  <div class="col-6">
    <div class="card shadow rounded">
      <div class="card-body">
        <form action="{{route('admin.update.mhs', $datas['Mahasiswa']->id)}}" method="POST" class="form">
          {{ csrf_field() }}
          <br>
          <div class="form-group">
            <h5 class="label-control">Nama</h5>
            <input class="form-control" type="text" name="name" value="{{$datas['Mahasiswa']->name}}" readonly>
          </div>
          <div class="form-group">
            <h5 class="label-control">NIM</h5>
            <input class="form-control" readonly type="text" name="nim" value="{{$datas['Mahasiswa']->nim}}">
          </div>
          <div class="form-group">
            <h5 class="label-control">Tanggal Lahir</h5>
            <input class="form-control datepicker" type="text" name="date_birth" value="{{$datas['Mahasiswa']->date_birth}}">
          </div>
          <div class="form-group">
            <h5 class="label-control">Jenis Kelamin</h5>
            <select class="form-control selectric" style="width: 50%" name="gender" value="{{$datas['Mahasiswa']->gender}}" required>
              <option name="gender" value="{{$datas['Mahasiswa']->gender}}">{{$datas['Mahasiswa']->gender}}
              </option>
              <option value="Laki">Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <h5 class="label-control">Alamat</h5>
            <input class="form-control" type="text" name="address" value="{{$datas['Mahasiswa']->address}}">
          </div>
          <div class="form-group">
            <h5 class="label-control">Dosen Wali</h5>
            <select class="form-control selectric" style="width: 50%" name="dosen" value="{{$datas['Mahasiswa']->dosen}}" required>
              {{-- <option value="{{ @$datas['Mahasiswa']->dosen }}">{{ @$datas['Dosen']->name }}</option> --}}
              @foreach ($datas['Dosen'] as $data)
              <option value="{{ $data->kode }}">{{ $data->name }}</option>
              @endforeach
            </select>
          </div>
          <button class="btn btn-success btn-md" type="submit">Proses</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col"></div>
</div>
@endsection