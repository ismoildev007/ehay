<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $mainImage = null;
        if ($request->hasFile('image')) {
            $mainImage = $request->file('image')->store('categories', 'public');
        }

        // Product yaratish
        Category::create([
            'category_id' => $request->category_id,

            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,

            'image' => $mainImage,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category muvaffaqiyatli yaratildi.');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([

            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,

        ]);

        return redirect()->route('categories.index')->with('success', 'Category muvaffaqiyatli yangilandi.');
    }



    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            Storage::delete('public/' . $category->image);
        }
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoriya muvaffaqiyatli o\'chirildi.');
    }
}
