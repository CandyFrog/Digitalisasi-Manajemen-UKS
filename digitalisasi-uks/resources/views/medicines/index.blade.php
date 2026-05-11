<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Data Obat</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola stok dan jenis obat di UKS</p>
        </div>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('medicines.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg font-medium transition duration-150 flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Obat
        </a>
        @endif
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center">
            <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-lg flex items-center justify-center mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Jenis Obat</p>
                <p class="text-2xl font-bold text-gray-800">{{ $medicines->count() }}</p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-lg flex items-center justify-center mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Stok Tersedia</p>
                <p class="text-2xl font-bold text-gray-800">{{ $medicines->sum('stok') }}</p>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center">
            <div class="w-12 h-12 bg-red-50 text-red-500 rounded-lg flex items-center justify-center mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Stok Menipis (<= 10)</p>
                <p class="text-2xl font-bold text-gray-800">{{ $medicines->where('stok', '<=', 10)->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-sm font-semibold uppercase tracking-wider">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Nama Obat</th>
                        <th class="py-4 px-6 text-center">Satuan</th>
                        <th class="py-4 px-6 text-center">Stok</th>
                        @if(auth()->user()->role === 'admin')
                        <th class="py-4 px-6 text-right">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($medicines as $medicine)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6 font-medium">{{ $medicine->nama_obat }}</td>
                            <td class="py-4 px-6 text-center text-sm">{{ $medicine->satuan }}</td>
                            <td class="py-4 px-6 text-center">
                                @if($medicine->stok <= 10)
                                    <span class="bg-red-100 text-red-600 py-1 px-3 rounded-full text-xs font-semibold inline-flex items-center">
                                        <span class="w-2 h-2 rounded-full bg-red-500 mr-1.5 animate-pulse"></span>
                                        {{ $medicine->stok }}
                                    </span>
                                @else
                                    <span class="bg-emerald-50 text-emerald-600 py-1 px-3 rounded-full text-xs font-semibold">
                                        {{ $medicine->stok }}
                                    </span>
                                @endif
                            </td>
                            @if(auth()->user()->role === 'admin')
                            <td class="py-4 px-6 text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('medicines.edit', $medicine->id) }}" class="p-2 text-indigo-500 hover:bg-indigo-50 rounded-lg transition duration-150" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus obat ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition duration-150" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? 5 : 4 }}" class="py-8 text-center text-gray-400">Belum ada data obat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
