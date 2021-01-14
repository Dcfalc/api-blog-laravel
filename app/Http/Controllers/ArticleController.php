<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Article::get();
        // Get only 100 chars of text
        $posts = DB::table('articles')
            ->select(DB::raw('id, author, title, SUBSTRING(text,1, 100) AS text, image'))
            ->get();
        
        return response()->json(compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = Article::find($id);
        return response()->json(compact('post'));
    }
}
