<x-app-layout>
    <div class="mb-6">
        <a href="{{ route('medicines.index') }}" class="text-sm font-medium text-emerald-500 hover:text-emerald-600 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-2xl">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800">Edit Data Obat</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan ubah detail obat di bawah ini.</p>
        </div>
        
        <form action="{{ route('medicines.update', $medicine->id) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-5">
                <label for="nama_obat" class="block text-sm font-medium text-gray-700 mb-2">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" value="{{ old('nama_obat', $medicine->nama_obat) }}" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                @error('nama_obat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div>
                    <label for="satuan" class="block text-sm font-medium text-gray-700 mb-2">Satuan</label>
                    <input type="text" name="satuan" id="satuan" value="{{ old('satuan', $medicine->satuan) }}" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                    @error('satuan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-700 mb-2">Stok Tersedia</label>
                    <input type="number" name="stok" id="stok" value="{{ old('stok', $medicine->stok) }}" min="0" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                    @error('stok')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2 rounded-lg font-medium transition duration-150 shadow-sm">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
