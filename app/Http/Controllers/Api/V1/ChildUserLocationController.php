<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Api\ChildUserLocationDataModel;
use App\Models\Api\ChildUserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChildUserLocationController extends Controller
{
    

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
    
        $child_user_location_data['admin_user_id']                      = $child_user_check->user_id;
        $child_user_location_data['user_type']                          = $child_user_check->user_type;
        $child_user_location_data['child_user_location_emergency_is']   = $request->child_user_location_emergency_is;
        $child_user_location_data['child_user_location_time']           = Carbon::now();

    }



    }




}
