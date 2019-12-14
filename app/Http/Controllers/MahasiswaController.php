<?php

namespace App\Http\Controllers;

use Auth;
use App\Dosen;
use App\Mahasiswa;
use App\TugasAkhir;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Settings()
    {
        $get = Mahasiswa::where('nim', '=', Auth::user()->username)->first();
        $datas = User::where('username', '=', $get->nim)->first();
        return view('mahasiswa/settings', compact('datas'));
    }

    public function SettingsUpdate(Request $request)
    {
        $update = User::find($request->id);
        $update->password = Hash::make($request->password);
        $update->save();
        return back()->with('success', 'Password berhasil diganti');
    }

    public function Review()
    {
        $check = TugasAkhir::where('nim', (Auth::user()->username))->first();
        $datas['Mahasiswa'] = Mahasiswa::where('nim', '=', (Auth::user()->username))->first();
        $datas['TA'] = TugasAkhir::where('nim', '=', $datas['Mahasiswa']->nim)->first();
        @$datas['Dosen'] = Dosen::where('kode', '=', $datas['TA']->dosen)->first();
        $datas['Wali'] = Dosen::where('kode', '=', $datas['Mahasiswa']->dosen)->first();
        return view('mahasiswa/review', compact('datas', 'check'));
    }

    public function DaftarTA()
    {
        $check = TugasAkhir::where('nim', (Auth::user()->username))->first();
        $datas['TA'] = TugasAkhir::where('nim', (Auth::user()->username))->first();
        $datas['Mahasiswa'] = Mahasiswa::where('nim', (Auth::user()->username))->first();
        if ($check != NULL) {
            $datas['Dosen'] = Dosen::where('kode', ($datas['TA']->dosen))->first();
        }
        $datas['AllDosen'] = Dosen::all();
        return view('mahasiswa/permohonan/daftar', compact('datas'));
    }

    public function PostDaftarTA(Request $request)
    {
        $this->validate($request, [
            'berkas' => 'required|mimes:pdf|max:10000',
        ]);
        $file = $request->file('berkas');
        $berkas = time() . "_" . $file->getClientOriginalName();
        $folder = 'berkas';

        $check = TugasAkhir::where('nim', Auth::user()->username)->first();
        if ($check == NULL) {
            $datas = new TugasAkhir();
            $datas->nim = Auth::user()->username;
            $datas->tema = $request->tema;
            $datas->judul = $request->judul;
            $datas->dosen = $request->dosen;
            $datas->berkas = $berkas;
            $datas->status = 'Daftar';
            $file->move($folder, time() . "_" . $file->getClientOriginalName());
            $datas->save();
        } else {
            $update = TugasAkhir::where('nim', Auth::user()->username)->first();
            $update->tema = $request->tema;
            $update->judul = $request->judul;
            $update->dosen = $request->dosen;
            $update->status = 'Daftar';
            $update->save();
        }
        return back()->with('success', 'Permohonan berhasil diberikan');
    }
}
