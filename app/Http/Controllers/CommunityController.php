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

        $listdata = DB::table('activity_lists')
        ->get()->pluck('contents','id');
        $listdata = $listdata->toArray();

        return view('createnewcommunity', compact('listdata'));
    }

    public function sub_community_su(Request $request){
        if($request->get('value')){
            $inputselect = DB::table('sub_interests')
            ->where('main','=', $request->get('value'))
            ->get()->pluck('did','sub');
            $inputselect = $inputselect->toArray();
            $inputselect = json_encode($inputselect);
            // dd($inputselect);
            echo $inputselect;
            // echo $request->get('value');
           }
    }

    public function new_community(Request $request)
    {

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
            $CommunitiesMdetail->subc = $input['subc'];
            $CommunitiesMdetail->save();
        }

        $UserCommunity = new UserCommunity;
        $UserCommunity->user = $user->id;
        $UserCommunity->community = 1;
        $UserCommunity->save();

        return redirect('/home');
    }
}
