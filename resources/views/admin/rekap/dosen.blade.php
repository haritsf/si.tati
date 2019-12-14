@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','rekap dosen')

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
    
    {{-- <div class="card shadow rounded">
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
                                <input class="form-control" type="number" name="nip" placeholder="..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md">
                            <div class="form-group">
                                <h6 class="label-control">Tanggal Lahir</h5>
                                <input class="form-control" type="date" name="date_birth">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <h5 class="label-control">Jenis Kelamin</h5>
                                <select class="form-control select2" style="width: 50%" name="gender" required>
                                    <option name="gender" value="Laki">Laki
                                    </option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <h6 class="label-control">Alamat</h6>
                                <input class="form-control" type="text" name="address" placeholder="Alamat" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-md" type="submit">Proses</button>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded">
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered table-hover table-md" id="Data">
                        <thead>
                            <tr align="center">
                                <th>NO.</th>
                                <th>NIP</th>
                                <th>NAMA</th>
                                <th>KODE</th>
                                <th>ALAMAT</th>
                                <th>KONTAK</th>
                                @if (Auth::user()->role == "administrator")
                                <th>OPSI</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($dosens as $data)
                            <tr align="center">
                                <td>{{$no++}}</td>
                                <td>{{$data->nip}}</td>
                                <td align="left">{{$data->name}}</td>
                                <td>{{$data->kode}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->contact}}</td>
                                @if (Auth::user()->role == "administrator")
                                <td>
                                    <a class="btn btn-warning btn-md"
                                        href="{{route('admin.edit.dsn',$data->id)}}"><i class="far fa-window-maximize"></i></a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr align="center">
                                <th>NO.</th>
                                <th>NIP</th>
                                <th>NAMA</th>
                                <th>KODE</th>
                                <th>ALAMAT</th>
                                <th>KONTAK</th>
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