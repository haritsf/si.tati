@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','berkas tugas akhir')

<div class="row">
    <div class="col-md-8 mx-auto my-5">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br />
            @endforeach
        </div>
        @endif

        <form action="{{route('mhs.post.ta')}}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group">
                <b>File Gambar</b><br />
                <input type="file" name="berkas">
            </div>
        
            <div class="form-group">
                <b>Keterangan</b>
                <textarea class="form-control" name="keterangan"></textarea>
            </div>
        
            <input type="submit" value="Upload" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection