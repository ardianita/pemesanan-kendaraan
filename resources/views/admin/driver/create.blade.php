@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="title">Tambah Driver</div>
            <form action="{{ route('drivers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Nama Driver</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama Lengkap">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Jenis Kelamin</label>
                    <select class="form-select @error('name') is-invalid @enderror" name="gender">
                        <option selected>--- Pilih Jenis Kelamin ---</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="mt-4 btn btn-dark">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection