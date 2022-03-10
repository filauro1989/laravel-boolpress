<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(8);
        return response()->json([
            'response' => true,
            'results' => $posts,
        ]);
    }

    public function inRandomOrder()
    {
        $posts = Post::inRandomOrder()->limit(4)->get();
        return response()->json([
            'response' => true,
            'results' => [
                'data' => $posts
            ]
        ]);
    }

    public function search(Request $request)
    {
        // $data = $request->all();
        // if (
        //     array_key_exists('orderbycolumn', $data) &&
        //     array_key_exists('orderbysort', $data)
        // ) {
        //     $posts->orderBy($data['orderbycolumn'], $data['orderbysort']);
        // }

        // if (array_key_exists('tags', $data)) {
        //     foreach ($data['tags'] as $tag) {
        //         $posts->whereHas('tags', function (Builder $query) use ($tag) {
        //             $query->where('name', '=', $tag);
        //         });
        //     }
        // }

        // $posts = $posts->with(['tags', 'category'])->get();

        // return response()->json([
        //     'response' => true,
        //     'count' =>  $posts->count(),
        //     'results' =>  [
        //         'data' => $posts
        //     ],
        // ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return response()->json([
            'response' => true,
            'count' => $post ? 1 : 0,
            'results' => [
                'data' => $post
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
