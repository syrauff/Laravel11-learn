<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <article class="max-w-2xl mx-auto p-4">
        
        {{-- Tampilkan gambar jika ada --}}
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mb-4 rounded-lg">
        @endif

        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            {{ $post->title }}
        </h1>

        <div class="text-sm text-gray-500 mb-4">
            Oleh {{ $post->author }} - {{ $post->created_at }}
        </div>

        <div class="prose max-w-none">
            {!! $post->body !!}
        </div>

        <a href="{{ route('posts.index') }}" class="inline-block mt-6 text-blue-500 hover:underline">
            &larr; Kembali ke semua blog
        </a>

    </article>
</x-layout>