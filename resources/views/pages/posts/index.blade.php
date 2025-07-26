<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3>Halaman </h3>
@foreach ($posts as $post)
  <article class="col">
    <div class="card h-100 bg-white shadow-lg rounded-lg overflow-hidden">
      {{-- @if ($post->image !== null)
      <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover" ">
      @else
      <img src="https://source.unsplash.com/1200x700?{{$post->title}}" class="w-full h-48 object-cover">
      @endif --}}
      <div class="p-4">
        <a href="/posts/{{ $post->slug }}"> <h5 class="text-xl font-semibold mb-2">{{$post->title}}</h5></a>
        <h6 class="mb-4">
          {{-- Khusus format date --> akhiran ->format('j F Y') / ->diffForHumans() --}}
          <a href="{{ route('user.posts', $post->user) }}" class="text-blue-500 hover:underline">{{$post->user->username}}</a> | {{ $post->created_at->diffForHumans()}}
          {{-- in
          <a href="/posts?category={{$post->category->slug}}" class="text-blue-500 hover:underline">{{$post->category->name}}</a> --}}
        </h6>
        <p class="text-gray-700 mb-4">{{ Str::limit($post->body, 120) }}</p>
        <small class="text-gray-500">{{$post->created_at}}</small>
      </div>
    </div>
  </article>
@endforeach

</x-layout>