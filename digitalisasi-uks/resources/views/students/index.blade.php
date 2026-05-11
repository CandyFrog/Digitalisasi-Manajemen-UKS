<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Data Siswa</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola data siswa SMKN 1 Purwokerto</p>
        </div>
        <a href="{{ route('students.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg font-medium transition duration-150 flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            Tambah Siswa
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
                        <th class="py-4 px-6">NIS</th>
                        <th class="py-4 px-6">Nama Siswa</th>
                        <th class="py-4 px-6">Kelas</th>
                        <th class="py-4 px-6 text-center">L/P</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($students as $student)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="py-4 px-6 font-medium text-gray-900">{{ $student->nis }}</td>
                            <td class="py-4 px-6 font-medium">{{ $student->nama }}</td>
                            <td class="py-4 px-6">
                                <span class="bg-blue-50 text-blue-600 py-1 px-3 rounded-full text-xs font-semibold">{{ $student->schoolClass->nama_kelas ?? '-' }}</span>
                            </td>
                            <td class="py-4 px-6 text-center font-medium">{{ $student->jenis_kelamin }}</td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('students.edit', $student->id) }}" class="p-2 text-indigo-500 hover:bg-indigo-50 rounded-lg transition duration-150" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data siswa ini?');" class="inline">
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
                            <td colspan="5" class="py-8 text-center text-gray-400">Belum ada data siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
