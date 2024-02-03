<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::all();
        return view('persetujuan', [
            'pemesanans' => $pemesanans,
        ]);
    }

    public function persetujuan_disetujui(Pemesanan $idPemesanan)
    {
        $idPemesanan->update(['status' => '1']);
        return redirect()->route('persetujuan');
    }

    public function persetujuan_ditolak(Pemesanan $idPemesanan)
    {
        $idPemesanan->update(['status' => '2']);
        return redirect()->route('persetujuan');
    }
}
