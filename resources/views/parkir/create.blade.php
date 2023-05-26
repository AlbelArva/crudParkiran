@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Data Parkir</h2>

        <form action="{{ route('parkir.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jenis_kendaraan">Jenis Kendaraan:</label>
                <select name="jenis_kendaraan" class="form-control">
                    <option value="motor">Motor</option>
                    <option value="mobil">Mobil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jam_masuk">Jam Masuk:</label>
                <input type="datetime-local" name="jam_masuk" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jam_keluar">Jam Keluar:</label>
                <input type="datetime-local" name="jam_keluar" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('parkir.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
