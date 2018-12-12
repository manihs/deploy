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
        ->join('sub_interests','sub_interests.main','=','activity_lists.id')
        ->get();
        
        return view('interestselection', compact('listdata'));
    }
}
