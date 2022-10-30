<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index',[
            'posts' => Post::where('user_id',auth()->user()->id)->get(),
            'categories' => Category::all(),
        ]);
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
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|max:2048',
            'category_id' => 'required',
        ],
        [
            'required' => 'Harap bagian :attribute di isi',
            'image.required' => 'Harap unggah gambar terlebih dahulu',
            'image.mimes' => 'Format file harus gambar',
            'image.max' => 'Ukuran file tidak boleh melebihi 2MB',
        ]
        );
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => Storage::disk('public')->putFile('image', $request->file('image')),
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/article')->with('status', 'Artikel Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('article.edit',[
            'article' => Post::findOrFail($id),
            'categories' => Category::all(),
        ]);
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
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|max:2048',
            'category_id' => 'required',
        ],
        [
            'required' => 'Harap bagian :attribute di isi',
            'image.required' => 'Harap unggah gambar terlebih dahulu',
            'image.mimes' => 'Format file harus gambar',
            'image.max' => 'Ukuran file tidak boleh melebihi 2MB',
        ]
        );
        Post::where('id',$id)->
                update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'image' => Storage::disk('public')->putFile('image', $request->file('image')),
                    'category_id' => $request->category_id,
                    'user_id' => auth()->user()->id,
                ]);

        return redirect('/article')->with('status', 'Data Artikel Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect('/article')->with('status', 'Artikel Berhasil Dihapus!');
    }
}
