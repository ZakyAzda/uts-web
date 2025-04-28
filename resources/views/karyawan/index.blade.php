@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
  <h2 class="text-2xl font-semibold">Data Karyawan Freelance</h2>
  <div class="space-x-2">
    <a href="{{ route('karyawan.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      Tambah Karyawan
    </a>
    <a href="{{ route('karyawan.deleted') }}"
       class="bg-red-600 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">
      Data Dihapus
    </a>
  </div>
</div>

@if(session('success'))
  <div class="mb-4 p-4 bg-green-100 border border-green-300 rounded text-green-800">
    {{ session('success') }}
  </div>
@endif

<div class="overflow-x-auto bg-white rounded-lg shadow">
  <table class="min-w-full border border-gray-300">
    <thead class="bg-gray-100">
      <tr>
        @foreach(['ID', 'Nama', 'Bidang', 'Email', 'No Telepon', 'Tanggal Mulai', 'Durasi', 'Status', 'Aksi'] as $col)
          <th class="px-4 py-3 text-left text-base font-bold text-black border-b border-gray-300">
            {{ $col }}
          </th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach($karyawans as $karyawan)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border-t border-gray-300">{{ $karyawan->id }}</td>
          <td class="px-4 py-2 border-t border-gray-300">{{ $karyawan->nama_karyawan }}</td>
          <td class="px-4 py-2 border-t border-gray-300">{{ $karyawan->bidang_keahlian }}</td>
          <td class="px-4 py-2 border-t border-gray-300">{{ $karyawan->email }}</td>
          <td class="px-4 py-2 border-t border-gray-300">{{ $karyawan->nomor_telepon }}</td>
          <td class="px-4 py-2 border-t border-gray-300">{{ $karyawan->tanggal_mulai->format('d-m-Y') }}</td>
          <td class="px-4 py-2 border-t border-gray-300">{{ $karyawan->durasi_kontrak }} bln</td>
          <td class="px-4 py-2 border-t border-gray-300 capitalize">{{ $karyawan->status }}</td>
          <td class="px-4 py-2 border-t border-gray-300">
            <div class="flex space-x-2">
              <a href="{{ route('karyawan.edit', $karyawan) }}"
                 class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                Edit
              </a>
              <form action="{{ route('karyawan.destroy', $karyawan) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus?')"
                        class="bg-red-600 hover:bg-red-600 text-white px-3 py-1 rounded">
                  Hapus
                </button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

 <div class="mt-4 flex justify-end">
  {{ $karyawans->links('vendor.pagination.tailwind') }}
</div>




@endsection
