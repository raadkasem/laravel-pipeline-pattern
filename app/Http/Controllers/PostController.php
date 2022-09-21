<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function index()
    {
        $pipeline = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class,
            ])
            ->thenReturn();
        $posts = $pipeline->get();
        return view('post.index', compact('posts'));

//        dd($pipeline->get());
//
//          if(request()->has('active')){
//
//              $posts->where('active' , request()->get('active'));
//          }
//        if(request()->has('sort')){
//            $posts->orderBy('title' , request()->get('sort'));
//        }
////        $posts = $posts->paginate(10);
//        $posts = $posts->get();
//        return view('post.index' , compact('posts'));
    }
}
