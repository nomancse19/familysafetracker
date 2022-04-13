<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Api\ChildUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChildAuthController extends Controller
{
    
    public function check_child_assign_family_member(Request $request){

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

                  
        $empty_user_check=  ChildUserModel::where('number',$request->number)->first();  
        if($empty_user_check==null){
            $OTP=mt_rand(1111,9999);
            $number= $request->number;
            $otp_code=$OTP;
            $msg="Your CyberTeens OTP Code:  ".$otp_code.". It Will Expire in 5 Minutes.";
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

            $check_number_is_active=  ChildUserModel::where('victim_user_status',1)
            ->where('number',$request->number)->first();
            if($check_number_is_active==null){
                return response()->json(
                    [   'status'=>false,
                        'active_status'=>false,
                        'message' => 'Your Number Is Deactive',
                        'data'=>null,
                        'status_code' => 200,
                    ]);
            }else{

            $OTP=mt_rand(1111,9999);
            $number= $request->number;
            $otp_code=$OTP;
            $msg="Your CyberTeens OTP Code:  ".$otp_code.". It Will Expire in 5 Minutes.";
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
                        'message' => 'Number Is Invalid...Try Correct Number',
                        'data'=>null,
                        'status_code' => 200,
                    ]);
                }
            }
             }
        }
     }

    
    












}
