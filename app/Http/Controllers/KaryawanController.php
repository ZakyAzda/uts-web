<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::paginate(10);
        return view('karyawan.index', compact('karyawans'));
    }



   

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'bidang_keahlian' => 'required',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'nomor_telepon' => 'required',
            'tanggal_mulai' => 'required|date',
            'durasi_kontrak' => 'required|integer',
            'status' => 'required|in:aktif,tidak aktif,selesai',
        ], [
            'email.unique' => 'Email sudah digunakan, silahkan gunakan email lain.',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diupdate.');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }

  
    public function restore($id)
    {
        $karyawan = Karyawan::onlyTrashed()->findOrFail($id);
        $karyawan->restore();

        return redirect()->route('karyawan.deleted')->with('success', 'Data karyawan berhasil dipulihkan.');
    }

    public function allKaryawan()
    {
        // Menampilkan semua data karyawan, termasuk yang sudah dihapus
        $karyawans = Karyawan::withTrashed()->get();
        return view('karyawan.all', compact('karyawans'));
    }

    public function forceDelete($id)
    {
        // Menghapus permanen data karyawan yang sudah di-soft delete
        $karyawan = Karyawan::withTrashed()->findOrFail($id);
        $karyawan->forceDelete(); // Menghapus permanen karyawan
    
        return redirect()->route('karyawan.deleted')->with('success', 'Data karyawan dihapus permanen.');
    }
    public function deleted()
{
    // Menampilkan data karyawan yang sudah dihapus (soft deleted)
    $karyawans = Karyawan::onlyTrashed()->paginate(10);
    return view('karyawan.deleted', compact('karyawans'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|unique:karyawans,id',
        'nama_karyawan' => 'required',
        'bidang_keahlian' => 'required',
        'email' => 'required|email',
        'nomor_telepon' => 'required',
        'tanggal_mulai' => 'required|date',
        'durasi_kontrak' => 'required|integer',
        'status' => 'required',
    ], [
        'id.unique' => 'ID sudah digunakan, silahkan masukkan ID yang lain.',
        'email.unique' => 'Email sudah digunakan, silahkan gunakan email lain.',
    ]);

    Karyawan::create($validated);

    return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan');
}
public function create()
{
    // Ambil ID terakhir
    $lastId = \App\Models\Karyawan::max('id');

    // Jika belum ada data, mulai dari 1
    $newId = $lastId ? $lastId + 1 : 1;

    // Kirim ke view
    return view('karyawan.create', compact('newId'));
}


}
