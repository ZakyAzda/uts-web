@extends('layouts.app')

@section('content')
  <div class="max-w-7xl mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4 text-gray-900">Data Karyawan yang Dihapus</h1>

    @if ($karyawans->isEmpty())
        <p class="text-gray-600">Tidak ada data karyawan yang dihapus.</p>
    @else
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nama Karyawan</th>
                        <th class="px-4 py-2 text-left">Bidang Keahlian</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Nomor Telepon</th>
                        <th class="px-4 py-2 text-left">Tanggal Mulai</th>
                        <th class="px-4 py-2 text-left">Durasi Kontrak</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawans as $karyawan)
                        <tr>
                            <td class="px-4 py-2">{{ $karyawan->id }}</td>
                            <td class="px-4 py-2">{{ $karyawan->nama_karyawan }}</td>
                            <td class="px-4 py-2">{{ $karyawan->bidang_keahlian }}</td>
                            <td class="px-4 py-2">{{ $karyawan->email }}</td>
                            <td class="px-4 py-2">{{ $karyawan->nomor_telepon }}</td>
                            <td class="px-4 py-2">{{ $karyawan->tanggal_mulai }}</td>
                            <td class="px-4 py-2">{{ $karyawan->durasi_kontrak }} bulan</td>
                            <td class="px-4 py-2">{{ ucfirst($karyawan->status) }}</td>
                            <td class="px-4 py-2">
                                <div class="flex space-x-2">
                                    <!-- Tombol restore -->
                                    <form action="{{ route('karyawan.restore', $karyawan->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                            Pulihkan
                                        </button>
                                    </form>

                                    <!-- Tombol force delete -->
                                    <form action="{{ route('karyawan.forceDelete', $karyawan->id) }}" method="POST" class="flex" onsubmit="return confirm('Yakin ingin menghapus permanen data karyawan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                            Hapus Permanen
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $karyawans->links() }}
        </div>
    @endif
  </div>
@endsection
