<x-app-layout>
    <div class="mb-6">
        <a href="{{ route('treatments.index') }}" class="text-sm font-medium text-emerald-500 hover:text-emerald-600 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm max-w-3xl">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800">Catat Kunjungan UKS</h2>
            <p class="text-sm text-gray-500 mt-1">Masukkan data siswa yang sakit dan obat yang diberikan.</p>
        </div>
        
        <form action="{{ route('treatments.store') }}" method="POST" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div>
                    <label for="tanggal_kunjungan" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kunjungan</label>
                    <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="{{ old('tanggal_kunjungan', date('Y-m-d')) }}" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                    @error('tanggal_kunjungan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="student_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Siswa</label>
                    <!-- Idealnya pakai select2, tapi ini versi standard -->
                    <select name="student_id" id="student_id" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                        <option value="">-- Cari Siswa --</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                {{ $student->nis }} - {{ $student->nama }} ({{ $student->schoolClass->nama_kelas ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-5">
                <label for="keluhan" class="block text-sm font-medium text-gray-700 mb-2">Keluhan</label>
                <textarea name="keluhan" id="keluhan" rows="3" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" placeholder="Contoh: Pusing, mual, sakit perut" required>{{ old('keluhan') }}</textarea>
                @error('keluhan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8 border-b pb-8 border-gray-100">
                <label for="diagnosa" class="block text-sm font-medium text-gray-700 mb-2">Diagnosa Awal (Opsional)</label>
                <input type="text" name="diagnosa" id="diagnosa" value="{{ old('diagnosa') }}" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" placeholder="Contoh: Masuk Angin, Maag">
                @error('diagnosa')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Pemberian Obat</h3>
                    <button type="button" id="addMedicineBtn" class="text-sm bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg font-medium transition duration-150 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Obat
                    </button>
                </div>

                <div id="medicine-container">
                    <!-- Medicine Row 1 -->
                    <div class="flex items-center space-x-3 mb-3 medicine-row">
                        <div class="flex-1">
                            <select name="medicines[]" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150 text-sm">
                                <option value="">Pilih Obat (Opsional)</option>
                                @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->id }}">
                                        {{ $medicine->nama_obat }} (Stok: {{ $medicine->stok }} {{ $medicine->satuan }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-32">
                            <input type="number" name="jumlah_obat[]" placeholder="Jumlah" min="1" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150 text-sm">
                        </div>
                        <button type="button" class="remove-btn p-2 text-gray-400 hover:text-red-500 rounded-lg transition duration-150 invisible">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-8 border-t pt-6 border-gray-100">
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-2.5 rounded-lg font-medium transition duration-150 shadow-sm text-lg w-full md:w-auto">
                    Simpan Kunjungan
                </button>
            </div>
        </form>
    </div>

    <!-- Script for Dynamic Medicine Rows -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('medicine-container');
            const addBtn = document.getElementById('addMedicineBtn');

            addBtn.addEventListener('click', function() {
                const firstRow = container.querySelector('.medicine-row');
                const newRow = firstRow.cloneNode(true);
                
                // Clear values
                newRow.querySelector('select').value = '';
                newRow.querySelector('input').value = '';
                
                // Show remove button
                newRow.querySelector('.remove-btn').classList.remove('invisible');
                
                // Add remove functionality
                newRow.querySelector('.remove-btn').addEventListener('click', function() {
                    newRow.remove();
                });

                container.appendChild(newRow);
            });
        });
    </script>
</x-app-layout>
