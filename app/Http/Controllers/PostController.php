<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.post-index', [
            'posts' => $posts
        ]);
    }

    public function show($postId, $view = 'posts.post-show')
    {
        $post = Post::findOrFail($postId);

        $post_data = explode("\n", $post->content);
        $post->content = "<p>" . implode("</p><p>", array_values($post_data)) . "</p>";
        if ($post->postimg == '') {
            $post->postimg = 'images/services/no-image.png';
        }
        $currentCategory = PostCategory::find($post->post_category_id);
        return view($view, ['post' => $post, 'currentCat' => $currentCategory]);
    }

    public function adminShow($postId)
    {
        return $this->show($postId, 'admin.post-show');
    }

    public function showBySlug($postSlug)
    {
        $post = Post::where('slug', $postSlug)->firstOrFail();

        $post_data = explode("\n", $post->content);
        $post->content = "<p>" . implode("</p><p>", array_values($post_data)) . "</p>";
        if ($post->postimg == '') {
            $post->postimg = 'images/services/no-image.png';
        }
        $currentCategory = PostCategory::find($post->post_category_id);
        return view('posts.post-show', ['post' => $post, 'currentCat' => $currentCategory]);
    }

    public function edit($postId)
    {
        $post = Post::findOrFail($postId);
        $categories = PostCategory::all();
        return view('admin.post-edit', ['post' => $post, 'categories' => $categories]);
    }

    public function create($catId)
    {
        $categories = PostCategory::all();
        return view('admin.post-create', ['catId' => $catId, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        /*
          // validate
          // read more on validation at http://laravel.com/docs/validation
          $rules = array(
          'name' => 'required',
          'email' => 'required|email',
          'shark_level' => 'required|numeric'
          );
          $validator = Validator::make(Input::all(), $rules);

          // process the login
          if ($validator->fails()) {
          return Redirect::to('sharks/create')
          ->withErrors($validator)
          ->withInput(Input::except('password'));
          } else {
          // store
          $shark = new shark;
          $shark->name = Input::get('name');
          $shark->email = Input::get('email');
          $shark->shark_level = Input::get('shark_level');
          $shark->save();

          // redirect
          Session::flash('message', 'Successfully created shark!');
          return Redirect::to('sharks');
          }

         */
        $post = new Post();
        $post->title = $request->input('title');
        if ($request->input('slug') > '') {
            $slug = $request->input('slug');
        } else {
            $slug = 'post-' . date('d.m.y-H:i:s');
        }
        $post->slug = $slug;
        $post->description = $request->input('description');
        $post->alterpreview = $request->input('alterpreview');
        $post->content = $request->input('content');
        $post->post_category_id = $request->input('category_id');
        $post->user_id = Auth::id();

        if ($request->hasFile('postimg')) {

        //    $request->validate([
        //        'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        //    ]);
            $post->postimg = $request->file('postimg')->store('images/uploads', 'public');
        } else {
            $post->postimg = 'images/services/no-image.png';
        }
        $post->save();

        // redirect
        // Session::flash('message', 'Successfully updated post!');
        return redirect()->route('admin.post.show', ['postId' => $post->id]);
    }

    public function update(Request $request, $postId)
    {
        /*
         * 
         * 
         * 
         *             $table->id();
          $table->timestamps();
          $table->string('title');
          $table->string('slug');
          $table->text('description')->nullable();
          $table->text('alterpreview')->nullable();
          $table->text('content');
          $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $rules = array(
          'title' => 'required',
          'slug' => 'required|email',
          'shark_level' => 'required|numeric'
          );
          $validator = Validator::make(Input::all(), $rules);

          // process the login
          if ($validator->fails()) {
          return Redirect::to('sharks/' . $id . '/edit')
          ->withErrors($validator)
          ->withInput(Input::except('password'));
          } else { */
        // store
        $post = Post::findOrFail($postId);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->description = $request->input('description');
        $post->alterpreview = $request->input('alterpreview');
        $post->content = $request->input('content');
        $post->post_category_id = $request->input('category_id');

        $post->save();

        // redirect
        // Session::flash('message', 'Successfully updated post!');
        return redirect()->route('admin.post.show', ['postId' => $postId]);
        //  }
    }

    public function destroy($id)
    {
        // delete
        $shark = shark::find($id);
        $shark->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the shark!');
        return Redirect::to('sharks');
    }
}
