@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','cek permohonan')
<div class="row">
    <div class="col"></div>
    <div class="col-6">
        <div class="card shadow rounded">
            <div class="card-body">
                <form action="{{route('admin.up.permohonan', $datas['TA']->id)}}" method="POST" class="form">
                    {{ csrf_field() }}
                    <br>
                    <div class="form-group">
                        <h5 class="label-control">NIM</h5>
                        <input class="form-control" type="text" name="nim" value="{{$datas['Mahasiswa']->nim}}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Nama</h5>
                        <input class="form-control" type="text" name="name" value="{{$datas['Mahasiswa']->name}}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Judul</h5>
                        <input class="form-control" type="text" name="judul" value="{{$datas['TA']->judul}}" readonly>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Tema</h5>
                        <input class="form-control" type="text" name="tema" value="{{$datas['TA']->tema}}" readonly>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Dosen Pembimbing</h5>
                        <select class="form-control selectric" style="width: 50%" name="dosen" value="{{ @$datas['Dosen']->name }}" required>
                            <option value="{{ @$datas['Dosen']->kode }}">{{ @$datas['Dosen']->name }}</option>
                            @foreach ($datas['AllDosen'] as $data)
                            <option value="{{ $data->kode }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Berkas</h5>
                        <label>{{$datas['TA']->berkas}}</label>
                        <a class="badge badge-primary" href="{{url('/berkas/'.$datas['TA']->berkas)}}" target="_blank">Lihat</a>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Status</h5>
                        <select class="form-control selectric" name="status" @if ($datas['TA'] !=NULL)
                            value="{{$datas['TA']->status}}" @endif>
                            <option value="{{@$datas['TA']->status}}">{{@$datas['TA']->status}}</option>
                            <option value="Daftar">Daftar</option>
                            <option value="Terverifikasi">Terverifikasi</option>
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