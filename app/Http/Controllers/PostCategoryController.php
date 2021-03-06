<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Models\Post;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    //public function show(PostCategory $postCategory)
    public function show($catId)
    {
        $currentCategory = PostCategory::find($catId);
        $posts = $currentCategory->listPosts()->orderBy('id', 'desc')->paginate(20);
        foreach ($posts as $key => $post) {
            $post-setPTag();
            if ($posts[$key]->postimg == '') {
                $posts[$key]->postimg = 'images/services/no-image.png';
            }
        }

        $categories = PostCategory::getSub($catId);
        return view('post-index', [
            'posts' => $posts,
            'categories' => $categories,
            'currentCat' => $currentCategory
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    //public function show(PostCategory $postCategory)
    public function showBySlug($catSlug, $view = 'posts.post-index')
    {
        $currentCategory = PostCategory::getBySlug($catSlug);
        $posts = $currentCategory->listPosts()->orderBy('id', 'desc')->paginate(20);
        foreach ($posts as $key => $post) {
            $post->setPTag();
            if ($posts[$key]->postimg == '') {
                $posts[$key]->postimg = 'images/services/no-image.png';
            }
        }

        $categories = PostCategory::getSub(PostCategory::getBySlug($catSlug)->id);
        return view($view, [
            'posts' => $posts,
            'categories' => $categories,
            'currentCat' => $currentCategory
        ]);
    }
    public function showBlog()
    {
        return $this->showBySlug('blog', 'posts.post-index');
    }
    public function showNews()
    {
        return $this->showBySlug('news', 'posts.post-index');
    }
    public function showPrograms()
    {
        return $this->showBySlug('programs', 'posts.post-index');
    }
    public function showProjects()
    {
        return $this->showBySlug('projects', 'posts.post-index');
    }
    public function showSessions()
    {
        return $this->showBySlug('sessions', 'posts.post-index');
    }


    public function adminShowBlog()
    {
        return $this->showBySlug('blog', 'admin.post-index');
    }
    public function adminShowNews()
    {
        return $this->showBySlug('news', 'admin.post-index');
    }
    public function adminShowPrograms()
    {
        return $this->showBySlug('programs', 'admin.post-index');
    }
    public function adminShowProjects()
    {
        return $this->showBySlug('projects', 'admin.post-index');
    }
    public function adminShowSessions()
    {
        return $this->showBySlug('sessions', 'admin.post-index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $postCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        //
    }
}
