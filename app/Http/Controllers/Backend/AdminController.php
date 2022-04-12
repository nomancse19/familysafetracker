<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Super_admin');
    }


    public function add_new_user_form(){
        $user_list= User::all()->sortBy('user_id');
        $share=array_keys(get_defined_vars());
        return view('Backend.user.add_new_user',compact($share));
    }


    public function save_new_user(Request $request){
            $request->validate(
                [
                    'user_type'=>'required',
                    'name'=>'required',
                    'number'=>'required|size:11',
                    'password' => 'required|confirmed|min:6',
                ]
            );
            $user_type=$request->user_type;
            $check_user_number_exist= User::where('number',$request->number)->first();
            if($check_user_number_exist==NULL){
                $user_save= New User();
                $user_save->name=$request->name;
                $user_save->number=$request->number;
                $user_save->email=$request->email;
                $user_save->password= Hash::make($request->password);
                $user_save->user_type=$request->user_type;
                $user_save->save();
                Session::flash('message','New User Saved Successfully.. '); 
                Session::flash('alert-type','success');
                return redirect()->back();
            }else{
                Session::flash('message','User Record Found This Number Try With Another Number.! '); 
                Session::flash('alert-type','error');
                return redirect()->back();
            }
        

        
    }

















}
