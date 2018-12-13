<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\DB
};

use App\{
    Community,
    UserCommunity,
    CommunitiesMdetail
};
use Auth;


class CommunityController extends Controller
{
    public function new_community(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();

        $Community = new Community;
        $Community->cname = $input['name'];
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
        $id = $Community->id;

        if($input['type'] = 2){
            $CommunitiesMdetail = new CommunitiesMdetail;
            $CommunitiesMdetail->cid = $id;
            $CommunitiesMdetail->category = $input['category'];
            $CommunitiesMdetail->subc = $input['subc'];
            $CommunitiesMdetail->save();
        }

        $UserCommunity = new UserCommunity;
        $UserCommunity->user = $user->id;
        $UserCommunity->community = $id;
        $UserCommunity->save();
        return 'creating community';
    }
}
