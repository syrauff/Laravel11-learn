<x-layout.app>
    {{-- 1. Siapkan state Alpine.js yang lebih lengkap --}}
    <div x-data="{
        isModalOpen: false,
        isEditMode: false,
        modalTitle: '',
        formAction: '',
        formMethod: 'POST',
        category: { id: null, name: '', slug: '', description: '' },
        allCategories: {{ $categories->toJson() }},

            // Fungsi untuk membuka modal create
        openCreateModal() {
            this.isModalOpen = true;
            this.isEditMode = false;
            this.modalTitle = 'Create New Category';
            this.formAction = '{{ route("dashboard.categories.store") }}';
            this.category = { id: null, name: '', slug: '', description: '' };
        },

        // Fungsi untuk membuka modal edit
        openEditModal(categoryId) {
            let categoryToEdit = this.allCategories.find(c => c.id === categoryId);

            if (categoryToEdit) {
                this.isModalOpen = true;
                this.isEditMode = true;
                this.modalTitle = 'Edit Category: ' + categoryToEdit.name;
                this.formAction = `/dashboard/categories/${categoryToEdit.slug}`;
                this.category = { ...categoryToEdit };
            }
        }
    }" @keydown.escape.window="isModalOpen = false">

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Categories</h2>
                
                {{-- 2. Tombol Create akan memanggil fungsi 'openCreateModal' --}}
                <button @click="openCreateModal" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Create New Category
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Post Count</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($categories as $category)
                            <tr class="border-b">
                                <td class="w-1/3 text-left py-3 px-4">{{ $category->name }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $category->slug ?? 'N/A' }}</td>
                                <td class="text-left py-3 px-4">
                                    {{-- 3. Tombol Edit akan memanggil fungsi 'openEditModal' dengan data kategori --}}
                                    <button @click="openEditModal({{ $category->id }})" class="text-yellow-600 hover:text-yellow-800">Edit</button>
                                    
                                    <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center py-4">No categories found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 4. Modal yang dinamis --}}
        <div x-show="isModalOpen" x-transition @click.self="isModalOpen = false"
             class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" style="display: none;">
            
            <div class="relative bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h3 class="text-xl font-semibold text-gray-900 mb-4" x-text="modalTitle"></h3>

                {{-- Atribut 'action' di-bind ke state Alpine --}}
                <form :action="formAction" method="POST">
                    @csrf
                    {{-- Method spoofing untuk PUT jika mode edit --}}
                    <template x-if="isEditMode">
                        @method('PUT')
                    </template>

                    {{-- Input di-bind ke state Alpine menggunakan x-model --}}
                    <x-atoms.input name="name" label="Nama Category" x-model="category.name" required />
                    <x-atoms.input name="slug" label="Slug" x-model="category.slug" required />
                    <x-atoms.input name="description" label="Description" x-model="category.description" required />

                    <div class="flex items-center justify-end mt-6 space-x-4">
                        <button @click="isModalOpen = false" type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout.app>