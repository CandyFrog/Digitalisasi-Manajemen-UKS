<x-app-layout>
    <div class="mb-6">
        <a href="{{ route('classes.index') }}" class="text-sm font-medium text-emerald-500 hover:text-emerald-600 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-2xl">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800">Edit Data Kelas</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan ubah nama kelas.</p>
        </div>
        
        <form action="{{ route('classes.update', $class->id) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-5">
                <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" value="{{ old('nama_kelas', $class->nama_kelas) }}" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 transition duration-150" required>
                @error('nama_kelas')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2 rounded-lg font-medium transition duration-150 shadow-sm">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
