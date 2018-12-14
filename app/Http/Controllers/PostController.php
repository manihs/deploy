<?php

namespace App\Http\Controllers;

use auth;
use App\Post;
use App\CommunitySharedWith;

use Illuminate\{
    Http\Request,
    Support\Facades\DB
};

class PostController extends Controller
{
    public function new_image_post_form(){

        $user = Auth::user();

        $community = DB::table('user_communities')
        ->select('communities.id','communities.cname')
        ->join('communities', 'communities.id', '=', 'user_communities.community')
        ->where('user','=', $user->id)->get();
        
        return view('postimage', compact('community'));
    }

    public function new_image_post(Request $request)
    {
        if (request()->hasFile('img')) {
            $user = Auth::user();
            $input = $request->all();
            $file = request()->file('img');
            $name = 'IMG'.now()->timestamp.'.'.$file->getClientOriginalExtension();
            $path = './Users/'.$user->id.'/image'.'/'.date("Y-m-d").'/';
            
            if($file->move($path, $name)){   
                $post = new Post;
                $post->src = $path."".$name;
                $post->type = 'IMG';
                $post->uid = $user->id;
                $post->caption = $input['name'];
                $post->save();

                $temp = $post->id;

                foreach ($input['community'] as $value) {
                    $CommunitySharedWith = new CommunitySharedWith;
                    $CommunitySharedWith->postId = $temp;
                    $CommunitySharedWith->cmtyId = $value;
                    $CommunitySharedWith->save();
                }
            }
        }
        return redirect('/');
    }
}