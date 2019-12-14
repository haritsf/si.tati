@extends('layouts.back')

@section('content')

@section('pages','mahasiswa')
@section('title','review')

<section class="section">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-statistic-1 rounded">
                <div class="card-wrap">
                    <div class="card-header">
                        <h3>Detail</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="nim">NIM</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="nim" value="{{ $datas['Mahasiswa']->nim }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="nama">Nama</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="nama"
                                    value="{{ $datas['Mahasiswa']->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="gender">Jenis Kelamin</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="gender"
                                    value="{{ $datas['Mahasiswa']->gender }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="date_birth">Tanggal Lahir</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="date_birth"
                                    value="{{ date('d-m-Y', strtotime($datas['Mahasiswa']->date_birth)) }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="address">Alamat</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="address"
                                    value="{{ $datas['Mahasiswa']->address }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="dosen">Dosen Wali</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="dosen" value="{{ $datas['Wali']->name }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-statistic-1 rounded">
                <div class="card-wrap">
                    <div class="card-header">
                        <h3>Tugas Akhir</h3>
                    </div>
                    @if ($check != NULL)
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="tema">Tema</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="tema" value="{{ @$datas['TA']->tema }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="judul">Judul</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="judul" value="{{ @$datas['TA']->judul }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="name">Dosen Pembimbing</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="name" value="{{ @$datas['Dosen']->name }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="berkas">Berkas</label>
                            </div>
                            <div class="form-group col-md">
                                <a class="badge badge-primary" id="berkas"
                                    href="{{url('/berkas/'.@$datas['TA']->berkas)}}" target="_blank">Lihat</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="status">Status</label>
                            </div>
                            <div class="form-group col-md">
                                <span class="badge @if (@$datas['TA']->status == 'Daftar') badge-warning @elseif (@$datas['TA']->status == 'Terverifikasi') badge-info @elseif (@$datas['TA']->status == 'Selesai') badge-success @endif" id="status">{{ @$datas['TA']->status }}</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="label-control" for="created_at">Tanggal Daftar</label>
                            </div>
                            <div class="form-group col-md">
                                <input type="text" class="form-control" id="created_at"
                                    value="{{ date('d-m-Y', strtotime(@$datas['TA']->created_at)) }}" readonly>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card-body">
                        <span class="badge badge-danger">Anda Belum Mendaftar Tugas Akhir</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection