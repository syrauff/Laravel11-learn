<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-4 md:p-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
            {{-- TAMBAHKAN BLOK INI --}}
            @if ($errors->any())
                <div class="mb-4 rounded-md bg-red-100 p-4 text-sm text-red-700">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Buat Postingan Baru</h1>

            {{-- Form untuk membuat postingan baru --}}
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- Token keamanan Laravel --}}

                {{-- <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                        required>
                    @error('title')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div> --}}

                <x-atoms.input name="title" label="Judul" required />

                {{-- <x-atoms.input name="user_id", label="Penulis" value="{{ auth()->user()->name }}" disabled/> --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Penulis:</label>
                    <p class="text-gray-900">{{ auth()->user()->name }}</p>
                </div>

                <x-atoms.input name="image" label="Gambar (Opsional)" type="file" />

                <div class="mb-6">
                    <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Isi Postingan:</label>
                    <textarea id="body" name="body" rows="10"
                        class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('body') border-red-500 @enderror"
                        required>{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan Postingan
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layout>
