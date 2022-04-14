<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Api\ChildUserLocationDataModel;
use App\Models\Api\ChildUserModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\SmsServerTraits;
class ChildUserLocationController extends Controller
{
    
use SmsServerTraits;
    public function send_user_location_data(Request $request){
       // ChildUserLocationDataModel::all();
       $validator = Validator::make($request->all(),[
        'child_user_location_lat' => 'required',
        'child_user_location_lon' => 'required',
        'child_user_id' => 'required',
    ]);
    if($validator->fails()){
        return response()->json(
            [   'status'=>false,
                'message' => 'User ID And Lat, Lon Is Required',
                'data'=>null,
                'status_code' => 200,
            ]);
    }else{

        $child_user_location_data=array();

        $child_user_location_data['child_user_location_lat']    = $request->child_user_location_lat;
        $child_user_location_data['child_user_location_lon']    = $request->child_user_location_lon;
        $child_user_location_data['child_user_id']              = $request->child_user_id;
        $child_user_check=  ChildUserModel::where('child_user_id',$request->child_user_id)->first();  
       
        if($child_user_check==''){
            return response()->json(
                [   'status'=>false,
                    'message' => 'Child User ID is Invalid. No User Found With This ID',
                    'data'=>null,
                    'status_code' => 200,
                ]);
            exit();
        }


        if($child_user_check->child_user_location_api_status=='on'){

            $parent_user_get=  User::where('user_id',$child_user_check->user_id)->first();  
            $child_user_location_data['admin_user_id']                      = $child_user_check->user_id;
            $child_user_location_data['user_type']                          = $parent_user_get->user_type;
            $child_user_location_data['child_user_location_emergency_is']   = $request->child_user_location_emergency_is;
            $child_user_location_data['child_user_location_time']           = Carbon::now();
    
           $child_user_location_id= ChildUserLocationDataModel::create(
                 $child_user_location_data
               )->child_user_location_id;
    
    
           $location_data= ChildUserLocationDataModel::where('child_user_location_id',$child_user_location_id)->first();
           return response()->json(
            [   'status'=>true,
                'message' => 'User Location Data Store In Database..',
                'data'=>$location_data,
                'status_code' => 200,
            ]);

    
        }else{
            return response()->json(
                [   'status'=>false,
                    'message' => 'Child User Location Send API status Is OFF..',
                    'data'=>null,
                    'status_code' => 200,
                ]);
        }





    }


    }
    public function send_emergency_user_location_data(Request $request){
       // ChildUserLocationDataModel::all();
       $validator = Validator::make($request->all(),[
        'child_user_location_lat' => 'required',
        'child_user_location_lon' => 'required',
        'child_user_id' => 'required',
    ]);
    if($validator->fails()){
        return response()->json(
            [   'status'=>false,
                'message' => 'User ID And Lat, Lon Is Required',
                'data'=>null,
                'status_code' => 200,
            ]);
    }else{

        $child_user_location_data=array();

        $child_user_location_data['child_user_location_lat']    = $request->child_user_location_lat;
        $child_user_location_data['child_user_location_lon']    = $request->child_user_location_lon;
        $child_user_location_data['child_user_id']              = $request->child_user_id;
        $child_user_location_data['child_user_location_emergency_is'] = 1;
        $child_user_check=  ChildUserModel::where('child_user_id',$request->child_user_id)->first();  
       
        if($child_user_check==''){
            return response()->json(
                [   'status'=>false,
                    'message' => 'Child User ID is Invalid. No User Found With This ID',
                    'data'=>null,
                    'status_code' => 200,
                ]);
            exit();
        }


        if($child_user_check->child_user_location_api_status=='on'){

            $parent_user_get=  User::where('user_id',$child_user_check->user_id)->first();  
            $child_user_location_data['admin_user_id']                      = $child_user_check->user_id;
            $child_user_location_data['user_type']                          = $parent_user_get->user_type;
            $child_user_location_data['child_user_location_time']           = Carbon::now();
    
           $child_user_location_id= ChildUserLocationDataModel::create(
                 $child_user_location_data
               )->child_user_location_id;
    
               $msg="Dear Parent User Your Child ".$child_user_check->child_user_name. " Is Facing Problem, Need Help
Please Check His Last Live Location Click This Link
https://maps.google.com/maps?q=".$request->child_user_location_lat.",".$request->child_user_location_lon."&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp
";
               $this->Send_Sms_GW($child_user_check->user_number,$msg);
           $location_data= ChildUserLocationDataModel::where('child_user_location_id',$child_user_location_id)->first();
           return response()->json(
            [   'status'=>true,
                'message' => 'User Location Data Store In Database..',
                'data'=>$location_data,
                'status_code' => 200,
            ]);

    
        }else{
            return response()->json(
                [   'status'=>false,
                    'message' => 'Child User Location Send API status Is OFF..',
                    'data'=>null,
                    'status_code' => 200,
                ]);
        }





    }


    }




}
