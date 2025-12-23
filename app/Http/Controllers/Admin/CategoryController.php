<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->paginate(10);
        return view('categorias.index', compact('categories'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:categories',
            'descripcion' => 'nullable|string|max:1000',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.unique' => 'Esta categoría ya existe',
        ]);

        Category::create($validated);
        return redirect()->route('admin.categories.index')->with('success', 'Categoría creada exitosamente');
    }

    public function show(Category $category)
    {
        $category->loadCount('products');
        $category->load('products');
        return view('categorias.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categorias.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:categories,nombre,' . $category->id,
            'descripcion' => 'nullable|string|max:1000',
        ]);

        $category->update($validated);
        return redirect()->route('admin.categories.show', $category)->with('success', 'Categoría actualizada exitosamente');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categoría eliminada exitosamente');
    }
}
