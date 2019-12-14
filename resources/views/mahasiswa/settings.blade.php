@extends('layouts.back')

@section('content')

@section('pages','mahasiswa')
@section('title','settings')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show alert-has-icon" role="alert">
    <div class="alert-icon">
        <i class="far fa-check-circle"></i>
    </div>
    <div class="alert-body">
        <div class="alert-title" style="font-weight:normal">Sukses</div>
        {{$message}}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col"></div>
    <div class="col-6">
        <div class="card shadow rounded">
            <div class="card-body">
                <form action="{{route('mhs.settings.update', $datas->id)}}" method="POST" class="form">
                    {{ csrf_field() }}
                    <br>
                    <div class="form-group">
                        <h5 class="label-control">NIM</h5>
                        <input class="form-control" type="text" name="username" value="{{$datas->username}}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Nama</h5>
                        <input class="form-control" type="text" name="name" value="{{$datas->name}}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Akses</h5>
                        <input class="form-control" type="text" name="role" value="{{$datas->role}}" readonly>
                    </div>
                    <div class="form-group">
                        <h5 class="label-control">Ganti Password</h5>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button class="btn btn-success btn-md" type="submit">Proses</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
@endsection