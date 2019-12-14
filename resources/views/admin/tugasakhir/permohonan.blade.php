@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','permohonan tugas akhir')

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

    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded">
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered table-hover table-md" id="Data">
                        <thead>
                            <tr align="center">
                                <th>NO.</th>
                                <th>NIM</th>
                                <th>JUDUL</th>
                                <th>TEMA</th>
                                <th>DOSEN</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>

                        <tbody align="center">
                            @foreach ($datas['TA'] as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{{ $data->tema }}</td>
                                <td>{{ $data->dosen }}</td>
                                <td>
                                <a class="btn btn-warning btn-md" href="{{route('admin.cek.permohonan',$data->id)}}"><i class="far fa-window-maximize"></i></a>
                                    <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#modaldelete{{$data->id}}"><i class="fas fa-times"></i></button>
                                    <div class="modal fade" id="modaldelete{{$data->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Permohonan</h5>
                                                </div>
                                                <div class="modal-body" align="left">
                                                    <h6 style="font-weight:normal">Apakah anda ingin menolak permohonan {{$data->nim}}?</h6>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">
                                                    <div style="display:none">
                                                        <input type="text" name="id" value="{{$data->id}}">
                                                    </div>
                                                    <button class="btn btn-md btn-default" data-dismiss="modal">Tidak</button>
                                                    <a href="{{route('admin.del.permohonan', $data->id)}}" class="btn btn-md btn-danger">Iya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr align="center">
                                <th>NO.</th>
                                <th>NIM</th>
                                <th>JUDUL</th>
                                <th>TEMA</th>
                                <th>DOSEN</th>
                                <th>OPSI</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection