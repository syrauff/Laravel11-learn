<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
        public function index()
    {


        return view('dashboard.categories', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'required|string|max:255',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);

        Category::create($validatedData);

        return redirect()->route('dashboard.categories')->with('success', 'Category created successfully.');
    }

    /**
     * Menampilkan form untuk mengedit kategori.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Memperbarui kategori di database.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'required|string|max:255' . $category->id,
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        
        $category->update($validatedData);

        return redirect()->route('dashboard.categories')->with('success', 'Category updated successfully.');
    }

    /**
     * Menghapus kategori dari database.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect()->route('dashboard.categories')->with('success', 'Category deleted successfully.');
    }
}
