@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="title">Persetujuan Pemesanan Kendaraan</div>
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
                            <span class="badge text-bg-danger">ditolak</span>
                            @endif
                        </td>
                        <td>
                            @if ($p['status'] == 1 || $p['status'] == 2)
                            <span class="badge text-bg-info">berhasil</span>
                            @else
                            <form action="{{ route('persetujuan-failed', $p['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-outline-danger btn-sm">Tolak</button>
                            </form>
                            <form action="{{ route('persetujuan-success', $p['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-outline-success btn-sm">Disetujui</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection