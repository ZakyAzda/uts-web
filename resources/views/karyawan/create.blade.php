@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-semibold text-gray-900 mb-6">Tambah Data Karyawan</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 border border-red-300 p-4 mb-6 rounded-lg">
            <strong>Ups!</strong> Ada kesalahan input.<br><br>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf


            <!-- <div class="mb-4">
            <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
            <input type="text" name="id" id="id"
                    class="mt-1 p-3 block w-full border {{ $errors->has('id') ? 'border-red-500' : 'border-gray-300' }} rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('id') }}" required>
                @error('id')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div> -->

            <div class="mb-4">
            <label for="id" class="block text-md font-semibold text-blue-600 mb-2">ID</label>
    <input type="text" name="id" id="id"
        class="mt-1 p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
        value="{{ old('id', $newId) }}" readonly>
    </div>



        <div class="mb-4">
            <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" id="nama_karyawan"
                   class="mt-1 p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('nama_karyawan') }}" required>
        </div>

        <div class="mb-4">
            <label for="bidang_keahlian" class="block text-sm font-medium text-gray-700">Bidang Keahlian</label>
            <input type="text" name="bidang_keahlian" id="bidang_keahlian"
                   class="mt-1 p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('bidang_keahlian') }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email"
                   class="mt-1 p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('email') }}" required>
        </div>

        <div class="mb-4">
            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon"
                   class="mt-1 p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('nomor_telepon') }}" required>
        </div>

        <div class="mb-4">
            <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                   class="mt-1 p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('tanggal_mulai') }}" required>
        </div>

        <div class="mb-4">
            <label for="durasi_kontrak" class="block text-sm font-medium text-gray-700">Durasi Kontrak (bulan)</label>
            <input type="number" name="durasi_kontrak" id="durasi_kontrak"
                   class="mt-1 p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('durasi_kontrak') }}" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 p-3 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">-- Pilih Status --</option>
                <option value="aktif" {{ old('status')=='aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak aktif" {{ old('status')=='tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                <option value="selesai" {{ old('status')=='selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-medium text-lg rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Simpan</button>
            <a href="{{ route('karyawan.index') }}" class="px-6 py-3 bg-gray-300 text-gray-700 font-medium text-lg rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">Batal</a>
        </div>
    </form>
</div>
@endsection
