<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Model\Post;
use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ORDINATI IN DECRESCENTE
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        $validateData = $request->validate([
            'title'=> 'required|max:255',
            'content' => 'required',
            'author' => 'required',
        ]);

        $slug = Str::slug($data['title'], '-');
        $postExist = Post::where('slug', $slug)->first();

        $counter = 0;
        while ($postExist) {
            $slug = $slug . '-' . $counter;
            $postExist = Post::where('slug', $slug)->first();
            $counter++;
        }

        $newPost = new Post();

        $newPost->fill($data);
        $newPost->slug = $slug;
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', ['post' => $post]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $validateData = $request->validate($this->ruleValidation);

        $data = $request->all();
        //validazione
        $post->update($data);

        return redirect()->route('admin.posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('status', "post $post->slug deleted!");
    }
}
