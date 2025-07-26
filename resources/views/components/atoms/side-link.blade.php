@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'flex items-center text-black py-4 pl-6 nav-item bg-slate-300' : 'flex items-center active-nav-link text-white py-4 pl-6 nav-item hover:bg-slate-200 hover:text-gray-700' }} rounded-md  px-3 py-2 text-md font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
