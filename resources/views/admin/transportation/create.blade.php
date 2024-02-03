@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="title">Tambah Kendaraan</div>
            <form action="{{ route('transportations.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Jenis Kendaraan</label>
                    <select class="form-select @error('type') is-invalid @enderror" name="type">
                        <option selected>--- Pilih Jenis Kendaraan ---</option>
                        <option value="mobil">Mobil</option>
                        <option value="motor">Motor</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Nama Kendaraan</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama Kendaraan">
                    @error('name')
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