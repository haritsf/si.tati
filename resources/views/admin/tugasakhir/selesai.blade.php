@extends('layouts.back')

@section('content')

@section('pages','admin')
@section('title','tugas akhir selesai')

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
                                <th>DAFTAR</th>
                                <th>SEMINAR</th>
                                <th>SIDANG</th>
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
                                <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($data->seminar)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($data->sidang)) }}</td>
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
                                <th>DAFTAR</th>
                                <th>SEMINAR</th>
                                <th>SIDANG</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection