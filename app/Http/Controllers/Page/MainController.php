<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $product_feature = Product::where('type', '=', 'Featured')->get();
        $product_seller = Product::where('type', '=', 'Best Seller')->get();
        $product_popular = Product::where('type', '=', 'Popular Products')->get();
        $product_special = Product::where('type', '=', 'Special Offers')->get();
        $product_top = Product::where('type', '=', 'Top Rated Products')->get();
        $products = Product::orderBy('created_at', 'desc')->limit(8)->get();
        $blogs = News::all();
        $lang = app()->getLocale() ?? 'ru';
        return view('pages.home', compact('categories', 'product_feature', 'product_seller', 'blogs', 'lang', 'product_popular', 'product_special', 'product_top', 'products'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function products()
    {
        $products = Product::paginate(10);
        $categories = Category::all();
        $lang = app()->getLocale() ?? 'ru';
        $product_top = Product::where('type', '=', 'Top Rated Products')->get();
        return view('pages.page-products', compact('products', 'categories', 'lang', 'product_top'));
    }
    public function singleProduct($slug)
    {
        $lang = app()->getLocale() ?? 'ru';

        // 2. Shu kategoriyaga tegishli productlarni olish
        $product = Product::where('slug_' . $lang, $slug)->firstOrFail();

        $products = Product::latest()->limit(6)->get();
        return view('pages.single-product', compact('product', 'products', 'lang'));
    }
    public function categoryProduct($slug)
    {
        $lang = app()->getLocale() ?? 'ru';

        // 1. Slug bo‘yicha kategoriyani topamiz
        $category = Category::where('slug_' . $lang, $slug)->firstOrFail();

        // 2. Shu kategoriyaga tegishli productlarni olish
        $products = Product::where('category_id', $category->id)->paginate(10);

        $categories = Category::all();
        $product_top = Product::where('type', '=', 'Top Rated Products')->get();

        return view('pages.page-products', compact('products', 'categories', 'lang', 'product_top', 'category'));
    }


    public function blogs()
    {
        $blogs = News::paginate(3);
        $lang = app()->getLocale() ?? 'ru';
        $categories = Category::all();
        $resentBlogs = News::inRandomOrder()->take(3)->get(); // rand() o‘rniga shu

        return view('pages.page-blogs', compact('blogs', 'lang', 'categories', 'resentBlogs'));
    }


    public function singleBlog($slug)
    {
        $lang = app()->getLocale() ?? 'ru';
        $blog = News::where('slug_' . $lang, $slug)->firstOrFail();
        $categories = Category::all();
        $resentBlogs = News::inRandomOrder()->take(3)->get(); // rand() o‘rniga shu
        return view('pages.single-blog', compact('blog', 'categories', 'resentBlogs', 'lang'));
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
