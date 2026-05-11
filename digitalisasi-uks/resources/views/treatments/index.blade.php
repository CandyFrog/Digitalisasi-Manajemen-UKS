<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-bold text-cyan-900 tracking-tight">Catatan Kunjungan UKS</h2>
            <p class="text-sm text-emerald-700 font-medium mt-1">Daftar siswa yang datang ke UKS</p>
        </div>
        <a href="{{ route('treatments.create') }}" class="bg-gradient-to-r from-teal-500 to-emerald-500 hover:from-teal-600 hover:to-emerald-600 text-white px-5 py-2.5 rounded-xl font-bold transition duration-150 flex items-center shadow-lg shadow-emerald-500/30">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Catat Kunjungan
        </a>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded-2xl shadow-sm font-medium">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-2xl shadow-sm font-medium">
            {{ session('error') }}
        </div>
    @endif

    <div class="soft-card rounded-3xl overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-500 text-xs font-bold uppercase tracking-wider">
                        <th class="py-4 px-6 border-b border-gray-200/50">Tanggal</th>
                        <th class="py-4 px-6 border-b border-gray-200/50">Siswa</th>
                        <th class="py-4 px-6 border-b border-gray-200/50">Keluhan & Diagnosa</th>
                        <th class="py-4 px-6 border-b border-gray-200/50">Obat Diberikan</th>
                        <th class="py-4 px-6 border-b border-gray-200/50 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($treatments as $treatment)
                        <tr class="hover:bg-white/50 transition duration-150 border-b border-gray-100/50 last:border-0">
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="font-bold text-sm text-gray-800">{{ \Carbon\Carbon::parse($treatment->tanggal_kunjungan)->format('d M Y') }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-gray-800 text-sm">{{ $treatment->student->nama }}</div>
                                <div class="text-xs text-gray-500 font-medium">{{ $treatment->student->schoolClass->nama_kelas ?? '-' }} | {{ $treatment->student->nis }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm font-medium"><span class="font-bold text-rose-500">Keluhan:</span> {{ $treatment->keluhan }}</div>
                                <div class="text-sm mt-1 font-medium"><span class="font-bold text-cyan-600">Diagnosa:</span> {{ $treatment->diagnosa ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6">
                                @if($treatment->medicines->count() > 0)
                                    <ul class="list-disc list-inside text-sm text-gray-600 font-medium">
                                        @foreach($treatment->medicines as $med)
                                            <li>{{ $med->nama_obat }} <span class="bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded text-xs ml-1">{{ $med->pivot->jumlah_obat }} {{ $med->satuan }}</span></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="bg-gray-100 text-gray-500 px-2 py-1 rounded-lg text-xs font-bold">Tanpa obat</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex justify-end space-x-2">
                                    <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat kunjungan ini? Stok obat akan dikembalikan.');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition duration-150" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-400 font-medium">Belum ada catatan kunjungan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
