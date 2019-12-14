<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Mahasiswa;
use App\TugasAkhir;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Dashboard()
    {
        $datas['mahasiswa'] = User::where('role', '=', 'mahasiswa')->get();
        $datas['dosen'] = User::where('role', '=', 'dosen')->get();
        $datas['ta'] = TugasAkhir::where('status', '!=', NULL)->get();
        return view('admin/dashboard', ['datas' => $datas]);
    }

    public function CreateMhs(Request $request)
    {
        $user = new User();
        $user->username = $request->nim;
        $user->password = Hash::make('000000');
        $user->name = $request->nama;
        $user->role = 'mahasiswa';
        $user->save();

        $data = new Mahasiswa();
        $data->name = $request->nama;
        $data->nim = $request->nim;
        $data->gender = $request->gender;
        $data->date_birth = $request->date_birth;
        $data->address = $request->address;
        $data->dosen = $request->dosen;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();

        return back()->with('success', 'Mahasiswa berhasil ditambah');
    }

    public function RekapMhs()
    {
        $datas['Mahasiswa'] = Mahasiswa::all();
        $datas['Dosen'] = Dosen::all();
        return view('admin/rekap/mahasiswa', compact('datas'));
    }

    public function EditMhs($id)
    {
        $datas['Mahasiswa'] = Mahasiswa::find($id);
        $datas['Dosen'] = Dosen::all();
        return view('admin.rekap.editmhs', compact('datas'));
    }

    public function UpdateMhs(Request $request)
    {
        $update = Mahasiswa::find($request->id);
        $update->gender = $request->gender;
        $update->date_birth = $request->date_birth;
        $update->address = $request->address;
        $update->dosen = $request->dosen;
        $update->save();
        return redirect(route('admin.rekap.mhs'))->with('info', 'Mahasiswa berhasil diperbarui');
    }

    public function DeleteMhs(Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->id);
        $user = User::where('username', $mahasiswa->nim)->first();
        $mahasiswa->delete();
        $user->delete();
        return back()->with('danger', 'Mahasiswa berhasil dihapus');
    }

    public function CreateDsn(Request $request)
    {
       dd($request->all());
    }

    public function RekapDsn()
    {
        $dosens = Dosen::all();
        return view('admin/rekap/dosen', compact('dosens'));
    }

    public function EditDsn($id)
    {
        $dosen = Dosen::find($id);
        return view('admin.rekap.editdsn', compact('dosen'));
    }

    public function UpdateDsn(Request $request)
    {
        $update = Dosen::find($request->id);
        $update->kode = $request->kode;
        $update->address = $request->address;
        $update->contact = $request->contact;
        $update->save();
        return redirect(route('admin.rekap.dsn'))->with('info', 'Dosen berhasil diperbarui');
    }

    public function DeleteDsn(Request $request)
    {
        $data = Mahasiswa::find($request->id);
        $data->delete();
        return back()->with('danger', 'Mahasiswa berhasil dihapus');
    }

    public function PermohonanTA()
    {
        $datas['TA'] = TugasAkhir::where('status', '=', 'Daftar')->get();
        return view('admin/tugasakhir/permohonan', compact('datas'));
    }

    public function CekPermohonanTA($id)
    {
        $datas['TA'] = TugasAkhir::find($id);
        $datas['Mahasiswa'] = Mahasiswa::where('nim', $datas['TA']->nim)->first();
        $datas['Dosen'] = Dosen::where('kode', $datas['TA']->dosen)->first();
        $datas['AllDosen'] = Dosen::all();
        return view('admin/tugasakhir/cek', compact('datas'));
    }

    public function UpdatePermohonanTA(Request $request)
    {
        $update = TugasAkhir::find($request->id);
        $update->dosen = $request->dosen;
        $update->status = $request->status;
        $update->save();
        return redirect(route('admin.permohonan.ta'))->with('success', 'Permohonan berhasil diverifikasi');
    }

    public function DeletePermohonanTA(Request $request)
    {
        $delete = TugasAkhir::find($request->id);
        $delete->delete();
        return back()->with('danger', 'Permohonan berhasil ditolak');
    }
    
    public function ListTA()
    {
        $datas['TA'] = TugasAkhir::where('status', '=', 'Terverifikasi')->get();
        return view('admin/tugasakhir/list', compact('datas'));
    }

    public function UpdateListTA(Request $request)
    {
        $update = TugasAkhir::find($request->id);
        if ($update->seminar != NULL && $update->sidang == NULL) {
            $update->sidang = $request->sidang;
            $update->save();
            return redirect(route('admin.list.ta'))->with('info', 'Jadwal Sidang berhasil disimpan');
        } elseif ($update->sidang == NULL) {
            $update->seminar = $request->seminar;
            $update->save();
            return redirect(route('admin.list.ta'))->with('info', 'Jadwal Seminar berhasil disimpan');
        } elseif ($update->seminar != NULL && $update->sidang != NULL) {
            $update->status = $request->status;
            $update->save();
            return redirect(route('admin.list.ta'))->with('success', 'Mahasiswa berhasil menyelesaikan semua tahap');
        }
    }
    
    public function SelesaiTA()
    {
        $datas['TA'] = TugasAkhir::where('status', '=', 'Selesai')->get();
        return view('admin/tugasakhir/selesai', compact('datas'));
    }
}
