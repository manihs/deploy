<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
        ->select('posts.id','users.name as user','communities.cname as community','posts.type as post_type','posts.src as src','posts.caption as caption')
        ->leftJoin('community_shared_withs', 'posts.id', '=', 'community_shared_withs.postId')
        ->join('users', 'users.id', '=', 'posts.uid')
        ->leftJoin('communities', 'communities.id', '=', 'community_shared_withs.cmtyId')
        // ->where('user','=', $user->id)
        ->get();

        if($posts){
            // dd($posts);
            return view('home',compact('posts'));
        }
        return view('home');
    }
}
