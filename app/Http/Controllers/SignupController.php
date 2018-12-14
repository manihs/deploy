<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\DB
};

use Auth;
use UserInterest;

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

        $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->get()->pluck('icode');
        $userinterest = $userinterest->toArray();
        
        return view('interestselection', compact('listdata','userinterest'));
    }

    public function fetch_interest(Request $request)
    {
        if($request->get('query')){

            $user = Auth::user();

            $query = strtoupper($request->get('query'));
            $listdata = DB::table('activity_lists')
            ->join('sub_interests','sub_interests.main','=','activity_lists.id')
            ->where('activity_lists.contents', 'LIKE', $query.'%')
            ->orWhere('sub_interests.sub','LIKE',$query.'%')
            ->get();
            

            $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->get()->pluck('icode');
            $userinterest = $userinterest->toArray();

            $output = '';
            foreach($listdata as $row){
                $output .= '<div class="card m-2" style="width: 9.4rem;">';
                $output .= '<img class="card-img-top" src="https://dummyimage.com/200x100/000/fff" alt="Card image cap">';
                $output .= '<div class="card-body">';
                $output .= '    <h5 class="card-title">'.$row->sub.'</h5>';
                if(in_array($row->did, $userinterest)){
                $output .= '    <div class="btn btn-danger Man-intra-de">Cancel<input type="hidden" value="'.$row->did.'"></div>';
                }else{
                $output .= '    <div class="btn btn-success Man-intra">Select<input type="hidden" value="'.$row->did.'"></div>';
                }
                $output .= '</div>';
                $output .= '</div>';
            }
            $output .= '';

            echo $output;
        
        }
    }

    public function all_interest(Request $request)
    {
        $user = Auth::user();

        $data = DB::table('activity_lists')
        ->join('sub_interests','sub_interests.main','=','activity_lists.id')
        ->get();

        
        $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->get()->pluck('icode');
        $userinterest = $userinterest->toArray();


        $output = '';
        foreach($data as $row){
            $output .= '<div class="card m-2" style="width: 9.4rem;">';
            $output .= '<img class="card-img-top" src="https://dummyimage.com/200x100/000/fff" alt="Card image cap">';
            $output .= '<div class="card-body">';
            $output .= '    <h5 class="card-title">'.$row->sub.'</h5>';
            if(in_array($row->did, $userinterest)){
                $output .= '    <div class="btn btn-danger Man-intra-de">Cancel<input type="hidden" value="'.$row->did.'"></div>';
            }else{
                $output .= '    <div class="btn btn-success Man-intra">Select<input type="hidden" value="'.$row->did.'"></div>';
            }
            $output .= '</div>';
            $output .= '</div>';
        }
        $output .= '';

        echo $output;
    }

    public function add_interest(Request $request)
    {
        if($request->get('value')){
            
            $user = Auth::user();

            $add = DB::table('user_interests')->insert(['uid'=>$user->id,'icode'=>$request->get('value')]);

            echo $request->get('value');
        }
    }

    public function remove_interest(Request $request)
    {
        if($request->get('value')){

            $user = Auth::user();

            $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->where('icode','=',$request->get("value"));
            $userinterest->delete();

            echo $request->get('value');
        }
    }

    // 

    function phasetwo(){

        $user = Auth::user();

        $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->get()->pluck('icode');            
        $userinterest = $userinterest->toArray();        
       
        $community = DB::table('user_communities')->where('user','=', $user->id)->get()->pluck('community');
        $community = $community->toArray();
        
        $listdata = DB::table('communities')
        ->join('communities_mdetails','communities_mdetails.cid','=','communities.id')
        ->where('communities.type', '=', '2')
        ->whereIn('communities_mdetails.category',  $userinterest)
        ->orWhereIn('communities_mdetails.subc',  $userinterest)
        ->get();
        
        return view('communityselection', compact('listdata','community'));
    }

    public function fetch_communities(Request $request)
    {
        if($request->get('value')){

            // $user = Auth::user();

            // $query = strtoupper($request->get('query'));
            // $listdata = DB::table('activity_lists')
            // ->join('sub_interests','sub_interests.main','=','activity_lists.id')
            // ->where('activity_lists.contents', 'LIKE', $query.'%')
            // ->orWhere('sub_interests.sub','LIKE',$query.'%')
            // ->get();
            

            // $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->get()->pluck('icode');
            // $userinterest = $userinterest->toArray();

            // $output = '';
            // foreach($listdata as $row){
            //     $output .= '<div class="card m-2" style="width: 9.4rem;">';
            //     $output .= '<img class="card-img-top" src="https://dummyimage.com/200x100/000/fff" alt="Card image cap">';
            //     $output .= '<div class="card-body">';
            //     $output .= '    <h5 class="card-title">'.$row->sub.'</h5>';
            //     if(in_array($row->did, $userinterest)){
            //     $output .= '    <div class="btn btn-primary Man-intra-de">Cancel<input type="hidden" value="'.$row->did.'"></div>';
            //     }else{
            //     $output .= '    <div class="btn btn-primary Man-intra">Select<input type="hidden" value="'.$row->did.'"></div>';
            //     }
            //     $output .= '</div>';
            //     $output .= '</div>';
            // }
            // $output .= '';

            // echo $output;
        echo "one";
        }
    }
    
    public function all_communities(Request $request)
    {
        // $user = Auth::user();

        // $data = DB::table('activity_lists')
        // ->join('sub_interests', 'activity_lists.did', '=', 'sub_interests.main')
        // ->select('sub_interests.sub', 'activity_lists.did', 'sub_interests.did')
        // ->get();

        
        // $userinterest = DB::table('user_interests')->where('uid','=', $user->id)->get()->pluck('icode');
        // $userinterest = $userinterest->toArray();


        // $output = '';
        // foreach($data as $row){
        //     $output .= '<div class="card m-2" style="width: 9.4rem;">';
        //     $output .= '<img class="card-img-top" src="https://dummyimage.com/200x100/000/fff" alt="Card image cap">';
        //     $output .= '<div class="card-body">';
        //     $output .= '    <h5 class="card-title">'.$row->sub.'</h5>';
        //     if(in_array($row->did, $userinterest)){
        //         $output .= '    <div class="btn btn-primary Man-intra-de">Cancel<input type="hidden" value="'.$row->did.'"></div>';
        //     }else{
        //         $output .= '    <div class="btn btn-primary Man-intra">Select<input type="hidden" value="'.$row->did.'"></div>';
        //     }
        //     $output .= '</div>';
        //     $output .= '</div>';
        // }
        // $output .= '';

        // echo $output;
        echo "two";

    }

    public function add_communities(Request $request)
    {
        if($request->get('value')){

            $user = Auth::user();

            $add = DB::table('user_communities')->insert(['community'=>$request->get('value'),'user'=> $user->id]);

            echo $request->get('value');
        }
    }

    public function remove_communities(Request $request)
    {
        if($request->get('value')){

            $user = Auth::user();

            $delete = DB::table('user_communities')->where('user','=', $user->id)->where('community','=',$request->get("value"));
            $delete->delete();

            echo $request->get('value');
        }
    }
}
