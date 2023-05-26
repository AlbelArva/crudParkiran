@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Edit Data Parkir</h2>
        <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link href="template/css/sb-admin-2.min.css" rel="stylesheet">    
            <link href="template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <form action="{{ route('parkir.update', $parkir->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="jenis_kendaraan">Jenis Kendaraan:</label>
                <select name="jenis_kendaraan" class="form-control">
                    <option value="motor" {{ $parkir->jenis_kendaraan === 'motor' ? 'selected' : '' }}>Motor</option>
                    <option value="mobil" {{ $parkir->jenis_kendaraan === 'mobil' ? 'selected' : '' }}>Mobil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jam_masuk">Jam Masuk:</label>
                <input type="datetime-local" name="jam_masuk" class="form-control" value="{{ $parkir->jam_masuk }}" required>
            </div>
            <div class="form-group">
                <label for="jam_keluar">Jam Keluar:</label>
                <input type="datetime-local" name="jam_keluar" class="form-control" value="{{ $parkir->jam_keluar }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('parkir.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="template/js/sb-admin-2.min.js"></script>
    <script src="/templatevendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/templatevendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/templatejs/demo/datatables-demo.js"></script>

@endsection
