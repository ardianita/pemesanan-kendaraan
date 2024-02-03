@extends('admin.layouts.app')

@section('content')
<div class="container">
    @if (session()->has('success'))
    <div class="container">
        <div class="alerts alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="card card-pemesanan">
        <div class="card-body">
            <div class="title">Pemesanan Kendaraan</div>
            <a class="btn btn-info btn-sm mb-2" href="{{ route('pemesanan.create') }}">Tambah</a>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pemesan</th>
                        <th scope="col">Kendaraan</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Driver</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($pemesanans as $p)
                    <tr>
                        <th scope="row">{{ $no++; }}</th>
                        <td>{{ $p['pemesan'] }}</td>
                        <td>{{ $p['transportation']->name }}</td>
                        <td>{{ Ucfirst($p['transportation']->type) }}</td>
                        <td>{{ $p['driver']->name }}</td>
                        <td>
                            @if ($p['status'] == 0)
                            <span class="badge text-bg-warning">belum disetujui</span>
                            @elseif ($p['status'] == 1)
                            <span class="badge text-bg-success">telah disetujui</span>
                            @else
                            <span class="badge text-bg-warning">ditolak</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('pemesanan.edit', $p['id']) }}">Edit</a>
                            <form action="{{ route('pemesanan.destroy', $p['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection