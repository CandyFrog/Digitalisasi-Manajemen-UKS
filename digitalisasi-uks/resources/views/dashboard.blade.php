<x-app-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-cyan-900 tracking-tight">Welcome back, {{ auth()->user()->name }} 👋</h2>
        <p class="text-emerald-700 mt-2 font-medium">Berikut adalah ringkasan informasi UKS SMKN 1 Purwokerto saat ini.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Kunjungan Hari Ini -->
        <div class="soft-card rounded-3xl p-6 transition duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-indigo-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-1">Kunjungan</p>
                    <h3 class="text-4xl font-black text-gray-800">{{ $todayTreatments }}</h3>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200/50 text-sm font-medium text-gray-500 flex justify-between">
                <span>Bulan ini</span>
                <span class="text-blue-600 font-bold bg-blue-100 px-2 py-0.5 rounded-lg">{{ $monthTreatments }} total</span>
            </div>
        </div>

        <!-- Stok Obat Menipis -->
        <div class="soft-card rounded-3xl p-6 transition duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-rose-400 to-red-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-red-500/30">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-1">Stok Menipis</p>
                    <h3 class="text-4xl font-black text-gray-800">{{ $lowStockMedicines }}</h3>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200/50 text-sm font-medium text-gray-500 flex justify-between">
                <span>Total Obat</span>
                <span class="text-red-600 font-bold bg-red-100 px-2 py-0.5 rounded-lg">{{ $totalMedicines }} jenis</span>
            </div>
        </div>

        <!-- Total Siswa -->
        <div class="soft-card rounded-3xl p-6 transition duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-teal-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-1">Total Siswa</p>
                    <h3 class="text-4xl font-black text-gray-800">{{ $totalStudents }}</h3>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200/50 text-sm font-medium text-gray-500 flex justify-between">
                <span>Data Master</span>
                <span class="text-emerald-600 font-bold bg-emerald-100 px-2 py-0.5 rounded-lg">Aktif</span>
            </div>
        </div>
        
        <!-- Quick Action -->
        <div class="bg-gradient-to-br from-cyan-500 via-teal-500 to-emerald-500 rounded-3xl p-6 text-white transition duration-300 hover:-translate-y-1 shadow-xl shadow-teal-500/30 flex flex-col justify-center items-center text-center relative overflow-hidden">
            <!-- Decorative circles -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 w-24 h-24 rounded-full bg-white opacity-10"></div>
            <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-32 h-32 rounded-full bg-white opacity-10"></div>
            
            <h3 class="text-xl font-black mb-2 relative z-10">Ada Siswa Sakit?</h3>
            <p class="text-emerald-50 text-sm font-medium mb-5 relative z-10">Catat kunjungan dan obat dengan cepat.</p>
            <a href="{{ route('treatments.create') }}" class="bg-white text-teal-700 px-5 py-2.5 rounded-xl font-bold text-sm transition hover:bg-emerald-50 w-full shadow-md relative z-10">
                + Catat Kunjungan
            </a>
        </div>
    </div>

    <!-- Recent Treatments -->
    <div class="soft-card rounded-3xl overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-200/50 flex justify-between items-center">
            <h3 class="text-xl font-bold text-cyan-900">Kunjungan Terakhir</h3>
            <a href="{{ route('treatments.index') }}" class="text-teal-600 hover:text-teal-700 text-sm font-bold bg-teal-50 px-3 py-1.5 rounded-lg transition">Lihat Semua &rarr;</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-500 text-xs font-bold uppercase tracking-wider">
                        <th class="py-4 px-6 border-b border-gray-200/50">Tanggal</th>
                        <th class="py-4 px-6 border-b border-gray-200/50">Nama Siswa</th>
                        <th class="py-4 px-6 border-b border-gray-200/50">Kelas</th>
                        <th class="py-4 px-6 border-b border-gray-200/50">Keluhan</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($recentTreatments as $treatment)
                    <tr class="hover:bg-white/50 transition duration-150 border-b border-gray-100/50 last:border-0">
                        <td class="py-4 px-6 text-sm font-medium">{{ \Carbon\Carbon::parse($treatment->tanggal_kunjungan)->format('d M Y') }}</td>
                        <td class="py-4 px-6 font-bold text-sm text-gray-800">{{ $treatment->student->nama }}</td>
                        <td class="py-4 px-6 text-sm">
                            <span class="bg-cyan-50 text-cyan-700 py-1 px-2.5 rounded-lg text-xs font-bold">{{ $treatment->student->schoolClass->nama_kelas ?? '-' }}</span>
                        </td>
                        <td class="py-4 px-6 text-sm truncate max-w-xs font-medium">{{ $treatment->keluhan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-8 text-center text-gray-400 text-sm font-medium">Belum ada kunjungan terbaru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
