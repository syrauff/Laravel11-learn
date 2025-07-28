<aside class="bg-sidebar h-screen w-12 fixed hover:w-64 hidden sm:block shadow-xl bg-slate-600">
    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button
            class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Report
        </button>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <x-atoms.side-link href="{{ route('dashboard.index') }}" :active="request()->routeIs('dashboard.index')">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </x-atoms.side-link>
        <x-atoms.side-link href="{{ route('dashboard.posts.index') }}" :active="request()->routeIs('dashboard.posts.index')">
            <i class="fa-solid fa-signs-post mr-3"></i>
            Posts
        </x-atoms.side-link>
        @if (auth()->check() && auth()->user()->role === 'admin')
            <x-atoms.side-link href="{{ route('dashboard.categories') }}" :active="request()->routeIs('dashboard.categories.*')">
                <i class="fas fa-table mr-3"></i>
                Category
            </x-atoms.side-link>
        @endif
        <x-atoms.side-link href="{{ route('dashboard.posts.index') }}" :active="request()->routeIs('#')">
            <i class="fas fa-align-left mr-3"></i>
            Group
        </x-atoms.side-link>

    </nav>
    <a href="#"
        class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
        <i class="fas fa-arrow-circle-up mr-3"></i>
        Upgrade to Pro!z
    </a>
</aside>
