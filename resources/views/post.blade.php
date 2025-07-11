<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h1>{{ $post -> title }}</h1>
    <p><strong>Author:</strong> {{ $post->author}}</p>
    <p><strong>Slug:</strong> {{ $post->slug }}</p>
    <div>{{ $post->body }}</div>

</x-layout>