<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildUserLocationDataModel extends Model
{
    use HasFactory;

    
    protected $table="child_user_location_data";
    protected $primarykey="child_user_location_id";

    protected $fillable=[
        'child_user_location_lat','child_user_location_lon',
        'child_user_location_emergency_is','child_user_id',
        'admin_user_id','user_type','child_user_location_time',
    ];


}
