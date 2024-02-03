@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="title">Update Kendaraan</div>
            <form method="POST" action="{{ route('transportations.update', $transportation['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Jenis Kendaraan</label>
                    <select class="form-select @error('type') is-invalid @enderror" name="type">
                        <option selected>--- Pilih Jenis Kendaraan ---</option>
                        <option value="mobil" ({{ $transportation['type'] == 'mobil' }} ? selected : '' )>Mobil</option>
                        <option value="motor" ({{ $transportation['type'] == 'motor' }} ? selected : '' )>Motor</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Nama Kendaraan</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $transportation['name'] }}">
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