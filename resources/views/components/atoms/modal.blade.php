@if (session()->has('success') || session()->has('error') || session()->has('info'))
<div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-4"
         class="fixed top-4 left-1/2 -translate-x-1/2 z-50"
         style="display: none;">

    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->

            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                    @if (session()->has('success'))
                        <p class="text-base leading-relaxed text-green-600 dark:text-gray-400">
                            {{ session('success') }}
                        </p>
                    @elseif (session()->has('error'))
                        <p class="text-base leading-relaxed text-red-500 dark:text-red-400">
                            {{ session('error') }}
                        </p>
                    @elseif (session()->has('info'))
                        <p class="text-base leading-relaxed text-blue-500 dark:text-blue-400">
                            {{ session('info') }}
                        </p>
                    @endif
            </div>
            <!-- Modal footer -->

        </div>
    </div>
</div>
@endif