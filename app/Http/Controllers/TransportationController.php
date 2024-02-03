<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Http\Requests\TransportationRequest;

class TransportationController extends Controller
{
    public function index()
    {
        $transportations = Transportation::all();
        return view('admin.transportation.index', [
            'transportations' => $transportations,
        ]);
    }

    public function create()
    {
        return view('admin.transportation.create');
    }

    public function store(TransportationRequest $transportationRequest)
    {
        $data = $transportationRequest->validated();
        Transportation::create($data);
        return redirect()->route('transportations.index')->with('success', 'Berhasil Dibuat!');
    }

    public function edit(Transportation $idTransportation)
    {
        return view('admin.transportation.edit', [
            'transportation' => $idTransportation,
        ]);
    }

    public function update(TransportationRequest $transportationRequest, Transportation $idTransportation)
    {
        $data = $transportationRequest->validated();
        $idTransportation->update($data);
        return redirect()->route('transportations.index')->with('success', 'Berhasil Diubah!');
    }

    public function destroy(Transportation $idTransportation)
    {
        $idTransportation->delete();
        return redirect()->route('transportations.index')->with('success', 'Berhasil Dihapus!');
    }
}
