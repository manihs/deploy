<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\DB
};

use App\{
    Community,
    CommunitiesMdetail,
    UserCommunity,
};
use Auth;
use Redirect;


class CommunityController extends Controller
{
    public function new_community_form(){

        return view('createnewcommunity');
    }
    public function new_community(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $user = Auth::user();

        $Community = new Community;
        $Community->cname = $input['cname'];
        $Community->uid = $user->id;
        $Community->type = $input['type'];
        if (request()->hasFile('img')) {
            $file = request()->file('img');
            if($file->move('./uploads', 'demo.jpg')){
                $Community->url = '/upload/demo.jpg';          
            }
        }else{
            $Community->url = 'default.jpg';   
        }
        $Community->save();    
        $ids = $Community->id;

        if($input['type'] == 2){
            $CommunitiesMdetail = new CommunitiesMdetail;
            $CommunitiesMdetail->cid = 1;
            $CommunitiesMdetail->category = $input['category'];
            // $CommunitiesMdetail->subc = $input['subc'];
            $CommunitiesMdetail->subc = 1;
            $CommunitiesMdetail->save();
        }

        $UserCommunity = new UserCommunity;
        $UserCommunity->user = $user->id;
        $UserCommunity->community = 1;
        $UserCommunity->save();
        // dd($request->all());

        return redirect('/home');
    }
}
