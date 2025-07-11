<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',

            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',

            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',

            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'type' => 'nullable|string',

            'price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
        ]);

        // Main rasm (bitta rasm)
        $mainImage = null;
        if ($request->hasFile('image')) {
            $mainImage = $request->file('image')->store('products', 'public');
        }

        // Bir nechta rasm (images[])
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $images[] = $img->store('products', 'public');
            }
        }

        // Product yaratish
        Product::create([
            'category_id' => $request->category_id,

            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,

            'content_uz' => $request->content_uz,
            'content_ru' => $request->content_ru,
            'content_en' => $request->content_en,

            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,

            'image' => $mainImage,
            'images' => $images,

            'type' => $request->type,

            'price' => $request->price,
            'discount_percent' => $request->discount_percent,
            // final_price va sluglar modelda avtomatik hosil bo'ladi
        ]);

        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli yaratildi.');
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',

            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',

            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',

            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'type' => 'nullable|string',

            'price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('images')) {
            // eski rasmlarni o‘chirish (xohlasangiz)
            if ($product->images && is_array($product->images)) {
                foreach ($product->images as $img) {
                    Storage::disk('public')->delete($img);
                }
            }

            $newImages = [];
            foreach ($request->file('images') as $img) {
                $newImages[] = $img->store('products', 'public');
            }

            $product->images = $newImages;
        }

        $product->update([
            'category_id' => $request->category_id,

            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,

            'content_uz' => $request->content_uz,
            'content_ru' => $request->content_ru,
            'content_en' => $request->content_en,

            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,

            'type' => $request->type,
            'price' => $request->price,
            'discount_percent' => $request->discount_percent,
        ]);

        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli yangilandi.');
    }



    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Mahsulot muvaffaqiyatli o\'chirildi.');
    }
}
