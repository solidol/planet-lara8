<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Http\Controllers\PostCategoryController;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentCategory = PostCategory::where('slug', 'news')->first();
        $posts = $currentCategory->listPosts()->orderBy('id', 'desc')->paginate(5);
        $categories = PostCategory::getSub(PostCategory::where('slug', 'news')->first()->id);

        foreach ($posts as $key => $post) {
            $post_data = explode("\n", $posts[$key]->content);
            $posts[$key]->content = "<p>" . implode("</p><p>", array_values($post_data)) . "</p>";
            $post_data = explode("\n", $posts[$key]->altpreview);
            $posts[$key]->altpreview = "<p>" . implode("</p><p>", array_values($post_data)) . "</p>";
        }
        
        $sessCategory = PostCategory::where('slug', 'sessions')->first();
        $sess = $sessCategory->listPosts()->orderBy('id', 'desc')->paginate(6);

        foreach ($sess as $key => $post) {
            $post_data = explode("\n", $sess[$key]->content);
            $sess[$key]->content = "<p>" . implode("</p><p>", array_values($post_data)) . "</p>";
            $post_data = explode("\n", $sess[$key]->altpreview);
            $sess[$key]->altpreview = "<p>" . implode("</p><p>", array_values($post_data)) . "</p>";
        }

        $prodCategory = PostCategory::where('slug', 'shop')->first();
        $products = $prodCategory->listPosts()->orderBy('id', 'desc')->paginate(6);

        return view('home', [
            'sessions' => $sess,
            'posts' => $posts,
            'products' => $products,
            'categories' => $categories,
            'currentCat' => $currentCategory
        ]);
    }
}
