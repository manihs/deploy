<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use auth;
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
        $user = Auth::user();

        $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->get()->pluck('icode');
        $userinterest = $userinterest->toArray();

        $community = DB::table('user_communities')->where('user','=', $user->id)->get()->pluck('community');
        $community = $community->toArray();

        $posts = DB::table('posts')
        ->select('posts.id','users.name as user','communities.cname as community','posts.type as post_type','posts.src as src','posts.caption as caption')
        ->leftJoin('community_shared_withs', 'posts.id', '=', 'community_shared_withs.postId')
        ->join('users', 'users.id', '=', 'posts.uid')
        ->leftJoin('communities', 'communities.id', '=', 'community_shared_withs.cmtyId')
        // ->orWhere(function ($query) use ($userinterest,$community){
        //     $query->whereIn('posts.uid', $userinterest)
        //           ->whereNotIn('community_shared_withs.cmtyId', $community);
        // })
        ->whereIn('community_shared_withs.cmtyId', $community)
        ->orderBy('posts.created_at', 'DESC')
        ->get();

        if($posts){
            // dd($posts);
            return view('home',compact('posts'));
        }
        return view('home');
    }

    public function setting(){
        
        return view('setting');
    }
}
