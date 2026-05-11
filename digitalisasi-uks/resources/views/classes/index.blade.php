<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Data Kelas</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola data kelas yang ada di SMKN 1 Purwokerto</p>
        </div>
        <a href="{{ route('classes.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg font-medium transition duration-150 flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Kelas
        </a>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-sm font-semibold uppercase tracking-wider">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Nama Kelas</th>
                        <th class="py-4 px-6 text-center">Jumlah Siswa</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($classes as $class)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="py-4 px-6">{{ $loop->iteration }}</td>
                            <td class="py-4 px-6 font-medium">{{ $class->nama_kelas }}</td>
                            <td class="py-4 px-6 text-center">
                                <span class="bg-gray-100 text-gray-600 py-1 px-3 rounded-full text-xs font-semibold">{{ $class->students_count }} Siswa</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('classes.edit', $class->id) }}" class="p-2 text-indigo-500 hover:bg-indigo-50 rounded-lg transition duration-150" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelas ini? Siswa di dalamnya juga akan terhapus!');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition duration-150" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-400">Belum ada data kelas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
