<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryCont extends Controller
{
    public function viewAllCat()
    {
        return view('categories', [
            'title' => 'Semua Kategori',
            'categories' => Category::all()
        ]);
    }

    public function viewPostCat(Category $category)
    {
        return view('posts', [
            'title' => "Post By Category : $category->name",
            'posts' => $category->posts->load(['author', 'category']),


        ]);
    }
}
