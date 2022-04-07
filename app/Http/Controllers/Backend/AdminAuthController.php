<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
class AdminAuthController extends Controller
{
  


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    use ThrottlesLogins;
    protected $maxAttempts = 5;
    protected $decayMinutes = 10;

    public function username()
    {
        return 'number';
    }


    public function admin_login_page(){
        return view('Backend.login');
    }


    public function check_admin_login_data(Request $request){
        $validated = Validator::make($request->all(),[
            'number' => 'required|numeric',
            'password' => 'required|string'
           ]);
           $user_data=  User::where('number',$request->number)
                                    ->where('is_active',1)
                                    ->first();
         if ($validated->fails()){        
            Session::flash('message','Error! Validation Failed.. '.$validated->errors()->first()); 
            Session::flash('type','error'); 
            return redirect()->route('login');
         }
         elseif($user_data==''){
            Session::flash('message','Error! User Is Deactive Please Contact Administrator.'); 
            Session::flash('type','error'); 
            return redirect()->route('login');
         }
         
         else{ 

           return $this->do_direct_login($request);

         }
    }




    public function do_direct_login(Request $request){
      
            $credentials=[
                 'number'=>$request->number,
                 'password'=>$request->password,
             ];

             if(Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user_id=Auth::id();
                $user_data=  User::where('user_id',$user_id)
                                    ->first();
                  Session::put('user_type',$user_data->user_type);
                  Session::put('user_number',$user_data->number);
                  if($user_data->user_type==1){
                    return redirect()->intended('/Backend/Dashboard');
                  }
                  elseif($user_data->user_type==2){
                    return redirect()->intended('Backend/Parent/Dashboard');
                  }
    
            }else{
                Session::flash('message','Error! Your Credentials No Match In Our System'); 
                Session::flash('type','error'); 
                return redirect()->route('login');
            }
         
     }










}
