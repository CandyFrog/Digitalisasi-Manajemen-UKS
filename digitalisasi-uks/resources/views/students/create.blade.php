<x-app-layout>
    <div class="mb-6">
        <a href="{{ route('students.index') }}" class="text-sm font-medium text-emerald-500 hover:text-emerald-600 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-2xl">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800">Tambah Data Siswa</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan masukkan data siswa baru.</p>
        </div>
        
        <form action="{{ route('students.store') }}" method="POST" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">NIS (Nomor Induk Siswa)</label>
                    <input type="text" name="nis" id="nis" value="{{ old('nis') }}" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                    @error('nis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div>
                    <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ old('kelas_id') == $class->id ? 'selected' : '' }}>{{ $class->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan (P)</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2 rounded-lg font-medium transition duration-150 shadow-sm">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
