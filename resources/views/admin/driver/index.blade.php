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
            <div class="title">Driver</div>
            <a class="btn btn-info btn-sm mb-2" href="{{ route('drivers.create') }}">Tambah</a>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Driver</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($drivers as $driver)
                    <tr>
                        <th scope="row">{{ $no++; }}</th>
                        <td>{{ $driver['name'] }}</td>
                        <td>{{ $driver['gender'] }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('drivers.edit', $driver['id']) }}">Edit</a>
                            <form action="{{ route('drivers.destroy', $driver['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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