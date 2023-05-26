<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Parkir;
use Illuminate\Http\Request;


class ParkirController extends Controller
{
    public function index()
{
    $parkirs = Parkir::latest()->paginate(10);
    return view('parkir.index', compact('parkirs'));
}

public function create()
{
    return view('parkir.create');
}

public function store(Request $request)
{
    $request->validate([
        'jenis_kendaraan' => 'required',
        'jam_masuk' => 'required',
        'jam_keluar' => 'required',
    ]);

    $parkir = new Parkir();
    $parkir->jenis_kendaraan = $request->jenis_kendaraan;
    $parkir->jam_masuk = $request->jam_masuk;
    $parkir->jam_keluar = Carbon::parse($request->jam_keluar); // Ubah menjadi objek Carbon

    // Hitung total biaya berdasarkan jenis kendaraan dan jam parkir
    
    $jamParkir = $parkir->jam_keluar->diffInHours($parkir->jam_masuk);
    if ($parkir->jenis_kendaraan === 'motor') {
    $biayaPerJam = $jamParkir > 2 ? 2000 : 1000;
    $parkir->total_biaya = $biayaPerJam * $jamParkir - 1000;

    // Diskon 5% jika total biaya lebih dari Rp10.000
    if ($parkir->total_biaya > 10000) {
        $parkir->total_biaya -= $parkir->total_biaya * 0.05;
    }
    } elseif ($parkir->jenis_kendaraan === 'mobil') {
    $biayaPerJam = $jamParkir > 2 ? 5000 : 3000;
    $parkir->total_biaya = $biayaPerJam * $jamParkir;

    // Diskon 10% jika total biaya lebih dari Rp10.000
    if ($parkir->total_biaya > 10000) {
        $parkir->total_biaya -= $parkir->total_biaya * 0.1;
    }
}
    // Simpan total biaya ke dalam atribut 'total_biaya'
    $parkir->save();

    return redirect()->route('parkir.index')->with('success', 'Data parkir berhasil disimpan.');
}
public function edit($id)
{
    $parkir = Parkir::find($id);
    return view('parkir.edit', compact('parkir'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'jenis_kendaraan' => 'required',
        'jam_masuk' => 'required',
        'jam_keluar' => 'required',
    ]);

    $parkir = Parkir::find($id);
    $parkir->jenis_kendaraan = $request->jenis_kendaraan;
    $parkir->jam_masuk = $request->jam_masuk;
    $parkir->jam_keluar = Carbon::parse($request->jam_keluar); // Ubah menjadi objek Carbon


    // Hitung total biaya berdasarkan jenis kendaraan dan jam parkir
    $jamParkir = $parkir->jam_keluar->diffInHours($parkir->jam_masuk);
    if ($parkir->jenis_kendaraan === 'motor') {
    $biayaPerJam = $jamParkir > 2 ? 2000 : 1000;
    $parkir->total_biaya = $biayaPerJam * $jamParkir;

    // Diskon 5% jika total biaya lebih dari Rp10.000
    if ($parkir->total_biaya > 10000) {
        $parkir->total_biaya -= $parkir->total_biaya * 0.05;
    }
    } elseif ($parkir->jenis_kendaraan === 'mobil') {
    $biayaPerJam = $jamParkir > 2 ? 5000 : 3000;
    $parkir->total_biaya = $biayaPerJam * $jamParkir;

    // Diskon 10% jika total biaya lebih dari Rp10.000
    if ($parkir->total_biaya > 10000) {
        $parkir->total_biaya -= $parkir->total_biaya * 0.1;
    }
}
    // Simpan total biaya ke dalam atribut 'total_biaya'

    $parkir->save();

    return redirect()->route('parkir.index')->with('success', 'Data parkir berhasil diperbarui.');
}
public function destroy($id)
{
    $parkir = Parkir::find($id);
    $parkir->delete();

    return redirect()->route('parkir.index')->with('success', 'Data parkir berhasil dihapus.');
}
}
