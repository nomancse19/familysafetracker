<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Api\ChildUserLocationDataModel;
use App\Models\Api\ChildUserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ParentController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add_new_child_user(){
        $user_number= Session::get('user_number');
        $user_type= Session::get('user_type');
        if($user_type==2){
        $user_list= ChildUserModel::where('user_number',$user_number)->orderBy('child_user_id','DESC')->get();
        }
        else if($user_type==1){
            $user_list= ChildUserModel::all()->sortByDesc("child_user_id");
        }
        $share= array_keys(get_defined_vars());
        return view('Backend.childuser.manage_child_user',compact($share));
    }




    public function save_new_child_user(Request $request){
        $request->validate(
            [
                'child_user_name'=>'required',
                'child_user_number'=>'required|size:14',
            ]
        );
        $check_user_number_exist= ChildUserModel::where('child_user_number',$request->child_user_number)->first();
        if($check_user_number_exist==NULL){
            $user_save= New ChildUserModel();
            $user_save->child_user_name=$request->child_user_name;
            $user_save->child_user_number=$request->child_user_number;
            $user_save->child_user_email=$request->child_user_email;
            $user_save->child_user_gender=$request->child_user_gender;
            $user_save->user_id=Auth::id();
            $user_save->user_number=Session::get('user_number');
            $user_save->child_user_created_user_id=Auth::id();
            $user_save->child_user_created_time=Carbon::now();
            $user_save->child_user_is_active=1;
            $user_save->save();
            Session::flash('message','New Child User Saved Successfully.. '); 
            Session::flash('alert-type','success');
            return redirect()->back();
        }else{
            Session::flash('message','Child User Record Found This Number Try With Another Number.! '); 
            Session::flash('alert-type','error');
            return redirect()->back();
        }
    

    }




    public function manage_child_user_location(){
        $user_number= Session::get('user_number');
        $user_type= Session::get('user_type');
        $user_id= Auth::id();
        $data=array();
         if($user_id==1){
           // $user_location= ChildUserLocationDataModel::all()->sortByDesc("child_user_location_id");
            $user_location = DB::table('child_user_location_data')
            ->leftjoin('child_user', 'child_user.child_user_id', '=', 'child_user_location_data.child_user_id')
            ->leftjoin('users', 'users.user_id', '=', 'child_user_location_data.admin_user_id')
            ->orderBy('child_user_location_data.child_user_location_id','DESC')
            ->get();
        }
         else if($user_id==2){
           // $user_location= ChildUserLocationDataModel::where('admin_user_id',$user_id)->orderBy('child_user_location_id','DESC')->get();
            $user_location = DB::table('child_user_location_data')
            ->leftjoin('child_user', 'child_user.child_user_id', '=', 'child_user_location_data.child_user_id')
            ->leftjoin('users', 'users.user_id', '=', 'child_user_location_data.admin_user_id')
            ->where('child_user_location_data.admin_user_id',$user_id)
            ->orderBy('child_user_location_data.child_user_location_id','DESC')
            ->get();
         }
        
       
        $share= array_keys(get_defined_vars());
        return view('Backend.childuser.manage_child_user_location',compact($share));
    }



    public function view_child_live_location(Request $request){
        $child_user_location_id=$request->child_user_location_id;
        $location_data= ChildUserLocationDataModel::where('child_user_location_id',$child_user_location_id)->first();
        $share=array_keys(get_defined_vars());
        return view('Backend.childuser.child_user_live_location_view',compact($share));
    }
    



   





}
