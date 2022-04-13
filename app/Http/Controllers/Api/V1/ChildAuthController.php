<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Api\ChildUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\SmsServerTraits;
use Illuminate\Support\Facades\DB;

class ChildAuthController extends Controller
{
    
    use SmsServerTraits;

    public function check_child_assign_family_member(Request $request){

    }

    public function test_sms(Request $request){
        $number=$request->number;
        $msg='Hello This Is Test SMS ';
        return $this->Send_Sms_GW($number,$msg);
    }

    public function send_user_otp(Request $request){
        $validator = Validator::make($request->all(),[
            'child_user_number' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json(
                [   'status'=>false,
                    'active_status'=>true,
                    'message' => 'Number Is Required',
                    'data'=>null,
                    'status_code' => 200,
                ]);
        }else{

                  
        $empty_user_check=  ChildUserModel::where('child_user_number',$request->child_user_number)->first();  
        if($empty_user_check!=null){
            $OTP=mt_rand(1111,9999);
            $number= $request->number;
            $otp_code=$OTP;
            $msg="Your Family Safe Tracker OTP Code:  ".$otp_code.". It Will Expire in 5 Minutes.";
            $sms_sent= $this->Send_Sms_GW($number,$msg);
            if($sms_sent==1){
                return response()->json(
                    [   'status'=>true,
                        'active_status'=>true,
                        'message' => 'Your OTP Sent SuccessFully',
                        'data'=>$otp_code,
                        'status_code' => 200,
                    ]);
            }else{
                return response()->json(
                    [   'status'=>false,
                        'active_status'=>false,
                        'message' => 'Number Is Invalid Or Server No Response...Try Correct Number',
                        'data'=>null,
                        'status_code' => 200,
                    ]);
                }
        }else{
            return response()->json(
                [   'status'=>false,
                    'active_status'=>false,
                    'message' => 'User Not Registered Or User ID Is Deactive',
                    'data'=>null,
                    'status_code' => 200,
                ]);
        }
        
    }


}




public function login(Request $request)
{   
    $user = ChildUserModel::where('child_user_number', $request->child_user_number)->first();
    
   /* $previous_token_data= DB::table('personal_access_tokens')
                        ->where('tokenable_id',$user->victim_user_id)
                        ->get();*/
    DB::table('personal_access_tokens')->where('tokenable_id', $user->child_user_id)
                                        ->where('tokenable_type','App\Models\Api\ChildUserModel')
                                        ->delete();
    $token = $user->createToken('api_login_auth_token')->plainTextToken;
        return response()->json(
            [   'status'=>true,
                'is_userexist'=>true,
                'message' => 'User Login Success',
                'data' => $user,
                'access_token' => $token, 
                'token_type' => 'Bearer',
                'status_code' => 200,
            ]);
}





        // method for user logout and delete token
        public function logout(Request $request)
        {
            Auth()->user()->tokens()->delete();
        // return Auth()->user();
            //$request->user()->tokens()->delete();
            return [
                'message' => 'You have successfully logged out and the token was successfully deleted'
            ];
        }


    
    












}
