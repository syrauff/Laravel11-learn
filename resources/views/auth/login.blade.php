<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

    {{-- Form untuk Login --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
                <span class="text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <input type="password" id="password" name="password" required
                class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password')
                <span class="text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Login
            </button>
        </div>

        <p class="text-center text-sm text-gray-600 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-bold text-blue-500 hover:text-blue-700">
                Daftar di sini
            </a>
        </p>
    </form>
</x-layout>
