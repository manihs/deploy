<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\DB
};

use Auth;

class SignupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function phaseone(){
        
        $user = Auth::user();

        $listdata = DB::table('activity_lists')
        ->join('sub_interests', 'activity_lists.did', '=', 'sub_interests.main')
        ->select('sub_interests.sub', 'activity_lists.did', 'sub_interests.did')
        ->get();
        dd($listdata);
        $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->get()->pluck('icode');
        $userinterest = $userinterest->toArray();

        return view('interestselection', compact('listdata','userinterest'));
    }
}
