<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Requests\DriverRequest;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('admin.driver.index', [
            'drivers' => $drivers,
        ]);
    }

    public function create()
    {
        return view('admin.driver.create');
    }

    public function store(DriverRequest $driverRequest)
    {
        $data = $driverRequest->validated();
        Driver::create($data);
        return redirect()->route('drivers.index')->with('success', 'Berhasil Dibuat!');
    }

    public function edit(Driver $idDriver)
    {
        return view('admin.driver.edit', [
            'driver' => $idDriver,
        ]);
    }

    public function update(DriverRequest $driverRequest, Driver $idDriver)
    {
        $data = $driverRequest->validated();
        $idDriver->update($data);
        return redirect()->route('drivers.index')->with('success', 'Berhasil Diubah!');
    }

    public function destroy(Driver $idDriver)
    {
        $idDriver->delete();
        return redirect()->route('drivers.index')->with('success', 'Berhasil Dihapus!');
    }
}
