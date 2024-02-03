@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="title">Pemesanan Kendaraan</div>
            <form action="{{ route('pemesanan.update', $pemesanan['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Pemesan</label>
                    <input type="text" class="form-control @error('pemesan') is-invalid @enderror" name="pemesan" value="{{ $pemesanan['pemesan'] }}">
                    @error('pemesan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Jenis Kendaraan</label>
                    <select class="form-select @error('transportation_id') is-invalid @enderror" name="transportation_id">
                        <option selected>--- Pilih Jenis Kendaraan ---</option>
                        @foreach ($transportations as $transportation)
                        <option value="{{ $transportation['id'] }}" ({{ $pemesanan['transportation_id'] == $transportation['id'] }}) ? selected : ''>{{ $transportation['name'] }} ({{ Ucfirst($transportation['type']) }})</option>
                        @endforeach
                    </select>
                    @error('transportation_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Driver</label>
                    <select class="form-select @error('driver_id') is-invalid @enderror" name="driver_id">
                        <option selected>--- Pilih Driver ---</option>
                        @foreach ($drivers as $driver)
                        <option value="{{ $driver['id'] }}" ({{ $pemesanan['driver_id'] === $driver['id'] }} ? selected : '' )>{{ $driver['name'] }}</option>
                        @endforeach
                    </select>
                    @error('driver_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="mt-4 btn btn-dark">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection