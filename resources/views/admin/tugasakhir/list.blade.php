@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','rekap tugas akhir')

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
                                <th>JADWAL</th>
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
                                    <button class="btn btn-warning btn-md" data-toggle="modal" data-target="#modaljadwal{{$data->id}}"><i class="far fa-clock"></i></button>
                                    <form action="{{route('admin.list.update',$data->id)}}" method="POST" class="form">
                                        @csrf
                                        <div class="modal fade" id="modaljadwal{{$data->id}}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Penjadwalan {{ $data->nim }}</h5>
                                                    </div>
                                                    <div class="modal-body" align="left">
                                                        <div class="form-group">
                                                            <h5 class="label-control">Seminar Proposal</h5>
                                                            <input type="text" class="form-control datetimepicker" @if ($data->seminar != NULL) value="{{$data->seminar}}" disabled @endif name="seminar">
                                                        </div>
                                                        @if ($data->seminar != NULL)
                                                        <div class="form-group">
                                                            <h5 class="label-control">Sidang</h5>
                                                            <input type="text" class="form-control datetimepicker" @if ($data->sidang != NULL) value="{{$data->sidang}}" disabled @endif name="sidang">
                                                        </div>
                                                        @endif
                                                        @if ($data->seminar != NULL && $data->sidang != NULL)
                                                        <div class="form-group">
                                                            <h5 class="label-label">Selesai</h5>
                                                            <label class="custom-switch">
                                                                <input type="checkbox" name="status" @if ($data->status == 'Terverifikasi') value="Selesai" @endif class="custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                                <span class="custom-switch-description">Apakah mahasiswa sudah menyelesaikan semua tahap?</span>
                                                            </label>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <div style="display:none">
                                                            <input type="text" name="id" value="{{$data->id}}">
                                                        </div>
                                                        <button class="btn btn-success btn-md" type="submit">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                                <th>JADWAL</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection