@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('parkir.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link href="template/css/sb-admin-2.min.css" rel="stylesheet">    
            <link href="template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Jenis Kendaraan</th>
                    <th>Total Biaya Parkir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parkirs as $parkir)
                    <tr>
                        <td>{{ $parkir->jam_masuk }}</td>
                        <td>{{ $parkir->jam_keluar }}</td>
                        <td>{{ $parkir->jenis_kendaraan }}</td>
                        <td>{{ $parkir->total_biaya }}</td>
                        <td>
                            <a href="{{ route('parkir.edit', $parkir->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('parkir.destroy', $parkir->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $parkirs->links() }}
    </div>
@endsection

