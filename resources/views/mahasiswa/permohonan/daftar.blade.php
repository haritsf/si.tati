@extends('layouts.back')

@section('content')

@section('pages','mahasiswa')
@section('title','daftar tugas akhir')

<section class="section">
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

    @elseif($message = Session::get('danger'))
    <div class="alert alert-danger alert-dismissible fade show alert-has-icon" role="alert">
        <div class="alert-icon">
            <i class="far fa-trash-alt"></i>
        </div>
        <div class="alert-body">
            <div class="alert-title" style="font-weight:normal">Peringatan</div>
            {{$message}}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @elseif($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade show alert-has-icon" role="alert">
        <div class="alert-icon">
            <i class="far fa-lightbulb"></i>
        </div>
        <div class="alert-body">
            <div class="alert-title" style="font-weight:normal">Pemberitahuan</div>
            {{$message}}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @php
        $array = explode(", ", @$datas['TA']->dosen);
        // dd($array);
    @endphp

    <div class="row">
        <div class="col-md"></div>
        <div class="col-md-6">
            <div class="card shadow rounded">
                <div class="card-body">
                    <form action="{{route('mhs.submit.ta')}}" method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <div class="form-group">
                            <h5 class="label-control">Nama</h5>
                            <input class="form-control" type="text" name="name" value="{{$datas['Mahasiswa']->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <h5 class="label-control">NIM</h5>
                            <input class="form-control" type="text" name="nim" value="{{$datas['Mahasiswa']->nim}}" readonly>
                        </div>
                        <div class="form-group">
                            <h5 class="label-control">Tema</h5>
                            <select class="form-control selectric" name="tema" @if ($datas['TA'] !=NULL) value="{{$datas['TA']->tema}}" @endif
                                required>
                                @if ($datas['TA'] == NULL)
                                    <option value="Human Integrated System">Human Integrated System</option>
                                    <option value="Logistics and Supply Chain System">Logistics and Supply Chain System</option>
                                    <option value="Quality System">Quality System</option>
                                @else
                                    <option value="{{$datas['TA']->tema}}">{{$datas['TA']->tema}}</option>
                                    <option value="Human Integrated System">Human Integrated System</option>
                                    <option value="Logistics and Supply Chain System">Logistics and Supply Chain System</option>
                                    <option value="Quality System">Quality System</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <h5 class="label-control">Judul</h5>
                            <input class="form-control" type="text" name="judul" @if ($datas['TA'] !=NULL) value="{{$datas['TA']->judul}}" @endif>
                        </div>
                        <div class="form-group">
                            <h5 class="label-control">Dosen Pembimbing</h5>
                            <select class="form-control selectric" name="dosen" @if ($datas['TA'] != NULL) value="{{$datas['TA']->dosen}}"
                                @endif>
                                <option value="{{@$datas['TA']->dosen}}">{{@$datas['Dosen']->name}}</option>
                                @foreach ($datas['AllDosen'] as $dosen)
                                <option value="{{ $dosen->kode }}">{{ $dosen->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h5 class="label-control">Berkas</h5>
                            @if (@$datas['TA']->berkas == NULL)
                            {{-- <input type="file" name="berkas"> --}}
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="berkas">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @else
                            <label>{{$datas['TA']->berkas}}</label>
                            <a class="badge badge-primary" href="{{url('/berkas/'.$datas['TA']->berkas)}}" target="_blank">Lihat</a>
                            @endif
                        </div>
                        @if (@$datas['TA']->status == NULL)
                        <button class="btn btn-success btn-md" type="submit" value="Upload">Proses</button>   
                        @endif                   
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md"></div>
    </div>
</section>
@endsection