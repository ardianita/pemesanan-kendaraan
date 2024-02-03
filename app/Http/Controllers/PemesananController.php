<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Http\Requests\PemesananRequest;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('admin.pemesanan.index', [
            'pemesanans' => $pemesanan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = Driver::all();
        $transportations = Transportation::all();
        return view('admin.pemesanan.create', [
            'drivers' => $drivers,
            'transportations' => $transportations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PemesananRequest $pemesananRequest)
    {
        $data = $pemesananRequest->validated();
        Pemesanan::create($data);
        return redirect()->route('pemesanan.index')->with('success', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $idPemesanan)
    {
        $drivers = Driver::all();
        $transportations = Transportation::all();
        return view('admin.pemesanan.edit', [
            'pemesanan' => $idPemesanan,
            'drivers' => $drivers,
            'transportations' => $transportations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PemesananRequest $pemesananRequest, Pemesanan $idPemesanan)
    {
        $data = $pemesananRequest->validated();
        $idPemesanan->update($data);
        return redirect()->route('pemesanan.index')->with('success', 'Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $idPemesanan)
    {
        $idPemesanan->delete();
        return redirect()->route('pemesanan.index')->with('success', 'Berhasil Dihapus!');
    }
}
