<x-app-layout>
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Laporan Bulanan UKS</h2>
            <p class="text-sm text-gray-500 mt-1">Rekapitulasi kunjungan dan penggunaan obat</p>
        </div>
        <button onclick="window.print()" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium transition duration-150 flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Cetak Laporan
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6 print:hidden">
        <form action="{{ route('reports.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
            <div>
                <label for="month" class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                <select name="month" id="month" class="rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-150">
                    @for($m=1; $m<=12; $m++)
                        <option value="{{ sprintf('%02d', $m) }}" {{ $month == sprintf('%02d', $m) ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $m, 10)) }}
                        </option>
                    @endfor
                </select>
            </div>
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                <select name="year" id="year" class="rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-150">
                    @for($y=date('Y'); $y>=date('Y')-5; $y--)
                        <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
            </div>
            <div>
                <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-6 py-2 rounded-lg font-medium transition duration-150 h-[42px]">
                    Tampilkan
                </button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-emerald-50 rounded-xl border border-emerald-100 p-6">
            <p class="text-emerald-800 text-sm font-medium mb-1">Total Kunjungan</p>
            <h3 class="text-3xl font-bold text-emerald-600">{{ $totalKunjungan }} <span class="text-lg font-normal">Siswa</span></h3>
        </div>
        <div class="bg-blue-50 rounded-xl border border-blue-100 p-6">
            <p class="text-blue-800 text-sm font-medium mb-1">Total Obat Keluar</p>
            <h3 class="text-3xl font-bold text-blue-600">{{ $totalObatDiberikan }} <span class="text-lg font-normal">Unit</span></h3>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 bg-gray-50 border-b border-gray-100 hidden print:block text-center">
            <h3 class="text-xl font-bold">Laporan Kunjungan UKS SMKN 1 Purwokerto</h3>
            <p class="text-gray-600">Bulan: {{ date('F', mktime(0, 0, 0, $month, 10)) }} {{ $year }}</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-sm font-semibold uppercase tracking-wider">
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6">NIS / Nama Siswa</th>
                        <th class="py-4 px-6">Kelas</th>
                        <th class="py-4 px-6">Keluhan & Diagnosa</th>
                        <th class="py-4 px-6">Pemberian Obat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($treatments as $treatment)
                        <tr>
                            <td class="py-4 px-6 whitespace-nowrap">{{ \Carbon\Carbon::parse($treatment->tanggal_kunjungan)->format('d/m/Y') }}</td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-900">{{ $treatment->student->nama }}</div>
                                <div class="text-xs text-gray-500">{{ $treatment->student->nis }}</div>
                            </td>
                            <td class="py-4 px-6">{{ $treatment->student->schoolClass->nama_kelas ?? '-' }}</td>
                            <td class="py-4 px-6">
                                <div class="text-sm"><span class="font-semibold">K:</span> {{ $treatment->keluhan }}</div>
                                <div class="text-sm mt-1"><span class="font-semibold">D:</span> {{ $treatment->diagnosa ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6">
                                @if($treatment->medicines->count() > 0)
                                    <ul class="list-disc list-inside text-sm">
                                        @foreach($treatment->medicines as $med)
                                            <li>{{ $med->nama_obat }} ({{ $med->pivot->jumlah_obat }})</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-400 text-sm italic">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-400">Tidak ada data kunjungan pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <style>
        @media print {
            aside, nav, .print\:hidden { display: none !important; }
            main { padding: 0 !important; background: white !important; }
            .shadow-sm { box-shadow: none !important; }
            .bg-emerald-50, .bg-blue-50 { background: white !important; border: 1px solid #e5e7eb !important; }
        }
    </style>
</x-app-layout>
