<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\TugasAkhir;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Welcome()
    {
        $datas['TA'] = TugasAkhir::where('status', '=', 'Terverifikasi')->orWhere('status', '=', 'Selesai')->get();
        $datas['Dosen'] = Dosen::all();
        return view('welcome', compact('datas'));
    }
}
