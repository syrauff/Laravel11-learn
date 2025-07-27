<x-layout.app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3>woe</h3>
    @foreach ($posts as $post)
        <article class="col w-full">
            <div class="mx-auto h-100 bg-white max-w-xl shadow-lg rounded-lg overflow-hidden">
                {{-- @if ($post->image !== null)
      <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover" ">
      @else
      <img src="https://source.unsplash.com/1200x700?{{$post->title}}" class="w-full h-48 object-cover">
      @endif --}}
                <div class="p-4">
                    <a href="/posts/{{ $post->slug }}">
                        <h5 class="text-xl font-semibold mb-2">{{ $post->title }}</h5>
                    </a>
                    <h6 class="mb-4">
                        {{-- Khusus format date --> akhiran ->format('j F Y') / ->diffForHumans() --}}
                        <a href="{{ route('user.posts', $post->user) }}"
                            class="text-blue-500 hover:underline">{{ $post->user->username }}</a> |
                            {{ $post->created_at->diffForHumans() }} | 
                            {{ $post->category->name }}
                        {{-- in
          <a href="/posts?category={{$post->category->slug}}" class="text-blue-500 hover:underline">{{$post->category->name}}</a> --}}
                    </h6>
                    @if ($post->image)
                        {{-- Jika ada gambar, tampilkan dari storage --}}
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                    @else
                        {{-- Jika tidak ada, tampilkan placeholder dari service seperti unsplash --}}
                        <img src="https://picsum.photos/seed/{{ $post->slug }}/300/200" alt="{{ $post->title }}">
                    @endif

                    <p class="text-gray-700 mb-4">{{ Str::limit($post->body, 120) }}</p>
                    <small class="text-gray-500">{{ $post->created_at }} |
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-yellow-600">EDIT</a> |
                        <form action="{{ route('dashboard.posts.destroy', $post) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus post ini?')">
                                DELETE
                            </button>
                        </form>
                    </small>
                </div>
            </div>
        </article>
    @endforeach

</x-layout.app>
