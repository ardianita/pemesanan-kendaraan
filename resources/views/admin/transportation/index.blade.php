@extends('admin.layouts.app')

@section('content')
@if (session()->has('success'))
<div class="container">
    <div class="alerts alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="title">Kendaraan</div>
            <a class="btn btn-info btn-sm mb-2" href="{{ route('transportations.create') }}">Tambah</a>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kendaraan</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($transportations as $transportation)
                    <tr>
                        <th scope="row">{{ $no++; }}</th>
                        <td>{{ $transportation['name'] }}</td>
                        <td>{{ Ucfirst($transportation['type']) }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('transportations.edit', $transportation['id']) }}">Edit</a>
                            <form action="{{ route('transportations.destroy', $transportation['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection