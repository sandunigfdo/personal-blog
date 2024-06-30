<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index(Category $category): View
    {
        return view('posts.index',[
            'posts' => $category->posts,
            'currentCategory' => $category,
            'categories' => Category::all(),
        ]);
    }
}
