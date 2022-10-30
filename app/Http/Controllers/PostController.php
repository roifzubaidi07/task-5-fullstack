<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();
 
        return response()->json([
            'data' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ],
        [
           'required' => 'Harap bagian :attribute di isi!',
        ]);

        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'category_id' => $request->category_id,
        ]);
        return response()->json([
            'message' => 'Postingan berhasil ditambahkan',
            'data' => $post
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = auth()->user()->posts->find($id);
        
        if (!$post) {
            return response()->json([
                'message' => 'Post tidak Ditemukan'
            ], 400);
        }
 
        return response()->json([
            'data' => $post->toArray()
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = auth()->user()->posts->find($id);
        if (!$post) {
            return response()->json([
                'message' => 'Post tidak ditemukan'
            ], 400);
        }

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ],
        [
           'required' => 'Harap bagian :attribute di isi!',
        ]);
 
        $updated = Post::where('id',$id)->
            update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'category_id' => $request->category_id,
            ]);

        if ($updated)
            return response()->json([
                'message' => 'Post berhasil diperbaharui'
            ]);
        else
            return response()->json([
                'message' => 'Post tidak bisa diperbaharui'
            ], 500);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = auth()->user()->posts->find($id);
 
        if (!$post) {
            return response()->json([
                'message' => 'Post tidak ditemukan'
            ], 400);
        }
 
        if (!$post->delete()) {
            return response()->json([
                'message' => 'Post tidak bisa dihapus'
            ], 500);
        }
        return response()->json([
            'message' => 'Post berhasil dihapus'
        ]);
    }
}
