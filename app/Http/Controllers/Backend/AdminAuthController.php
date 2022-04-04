<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
  


    public function admin_login_page(){
        return view('Backend.login');
    }


    public function check_admin_login_data(Request $request){
        return $request->all();
    }

    public function do_direct_login(Request $request){
        
    }










}
