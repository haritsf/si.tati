@extends('layouts.front')

@section('content')

<div class="row" style="font-family:Nunito">
    <div class="col-lg-12 pl-0 pr-0">
        <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('img/ti-undip.jpg');">
            <div class="container">
                <div class="text text-center text-lg-left animated fadeInUp delay-0.5s">
                    <h1>Sistem Informasi Tugas Akhir</h1>
                    <p>
                        Teknik Industri Universitas Diponegoro
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-lg-12">
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md-10" style="margin-top:-5em;">
                <div class="card card-light shadow rounded">
                    <div class="card-header">
                        <h2>Beban Bimbingan</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($datas['Dosen'] as $data)
                            <div class="col-md">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>{{ $data->name }}</h4>
                                        </div>
                                        <div class="card-body">
                                            {{ rand(0,10) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md"></div>
        </div>
    </div> --}}

    <div class="col-lg-12 mb-5">
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md-10" style="margin-top:-5em;">
                <div class="card card-light shadow rounded">
                    <div class="card-header">
                        <h2>Daftar Peserta Tugas Akhir</h2>
                    </div>
                    <div class="card-body">
                        <table width="100%" class="table table-striped table-bordered table-hover table-md" id="Data">
                            <thead>
                                <tr align="center">
                                    <th>NO.</th>
                                    <th>NIM</th>
                                    <th>JUDUL/DOSBING</th>
                                    <th>DAFTAR</th>
                                    <th>SEMPRO</th>
                                    <th>SIDANG</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($datas['TA'] as $data)
                                <tr align="center" @if ($data->status == 'Selesai') style="background-color:#E7FAC5" @endif>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->nim }}</td>
                                    <td>
                                        <p align="left">
                                            Tema : {{ $data->tema }}<br>
                                            Judul : {{ $data->judul }}<br>
                                            Dosen : {{ $data->dosen }}
                                        </p>
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                    <td>@if ($data->seminar != NULL){{ date('d-m-Y', strtotime($data->seminar)) }}@endif</td>
                                    <td>@if ($data->sidang != NULL){{ date('d-m-Y', strtotime($data->sidang)) }}@endif</td>
                                </tr>
                                 @endforeach
                            </tbody>
                            <tfoot>
                                <tr align="center">
                                    <th>NO.</th>
                                    <th>NIM</th>
                                    <th>JUDUL/DOSBING</th>
                                    <th>DAFTAR</th>
                                    <th>SEMPRO</th>
                                    <th>SIDANG</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md"></div>
        </div>
    </div>
</div>

@endsection