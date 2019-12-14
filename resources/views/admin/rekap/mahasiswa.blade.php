@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','rekap mahasiswa')

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
    
    @if (Auth::user()->role == "administrator")
    <div class="card shadow rounded">
        <div class="card-body">
            <button class="btn btn-primary btn-md" type="button" data-toggle="collapse" data-target="#collapseTambah"
                aria-expanded="false" aria-controls="collapseTambah">
                Tambah
            </button>
            <div class="collapse" id="collapseTambah">
                <form action="{{route('admin.rekap.mhs.create')}}" method="POST" class="form">
                    {{ csrf_field() }}
                    <br>
                    <div class="row">
                        <div class="col-md">
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                <h6 class="label-control">Nama Mahasiswa</h6>
                                <input class="form-control" type="text" name="nama" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <h6 class="label-control">NIM</h6>
                                <input class="form-control" type="text" name="nim" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <h5 class="label-control">Jenis Kelamin</h5>
                                <select class="form-control selectric" style="width: 50%" name="gender" required>
                                    <option value="Laki">Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md">
                            <div class="form-group">
                                <h6 class="label-control">Tanggal Lahir</h5>
                                <input class="form-control datepicker" type="text" name="date_birth">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <h6 class="label-control">Alamat</h6>
                                <input class="form-control" type="text" name="address" placeholder="Alamat" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <h6 class="label-control">Dosen Wali</h6>
                                <select class="form-control selectric" style="width: 50%" name="dosen" required>
                                    @foreach ($datas['Dosen'] as $data)
                                    <option value="{{ $data->kode }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-md" type="submit">Proses</button>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded">
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered table-hover table-md" id="Data">
                        <thead>
                            <tr align="center">
                                <th>NO.</th>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>ALAMAT</th>
                                <th>DOSWAL</th>
                                @if (Auth::user()->role == "administrator")
                                <th>OPSI</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($datas['Mahasiswa'] as $data)
                            <tr align="center">
                                <td>{{$no++}}</td>
                                <td>{{$data->nim}}</td>
                                <td align="left">{{$data->name}}</td>
                                <td>{{$data->gender}}</td>
                                <td>{{$data->date_birth}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->dosen}}</td>
                                @if (Auth::user()->role == "administrator")
                                <td>
                                    <a class="btn btn-warning btn-md"
                                        href="{{route('admin.edit.mhs',$data->id)}}"><i class="far fa-window-maximize"></i></a>
                                    <button class="btn btn-danger btn-md" data-toggle="modal"
                                        data-target="#modaldelete{{$data->id}}"><i class="fas fa-times"></i></button>
                                    <div class="modal fade" id="modaldelete{{$data->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Mahasiswa</h5>
                                                </div>
                                                <div class="modal-body" align="left">
                                                    <h6 style="font-weight:normal">Apakah anda ingin menghapus
                                                        {{$data->name}}?</h6>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">
                                                    <div style="display:none">
                                                        <input type="text" name="id" value="{{$data->id}}">
                                                    </div>
                                                    <button class="btn btn-md btn-default"
                                                        data-dismiss="modal">Tidak</button>
                                                    <a href="{{route('admin.delete.mhs',$data->id)}}"
                                                        class="btn btn-md btn-danger">Iya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr align="center">
                                <th>NO.</th>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>ALAMAT</th>
                                <th>DOSWAL</th>
                                @if (Auth::user()->role == "administrator")
                                <th>OPSI</th>
                                @endif
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection