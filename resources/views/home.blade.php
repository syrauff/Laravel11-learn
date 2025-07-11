@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3>Halaman Home</h3>
</x-layout>