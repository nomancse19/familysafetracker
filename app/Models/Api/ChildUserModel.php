<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class ChildUserModel extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table="child_user";
    protected $primaryKey="child_user_id";

    protected $fillable=[
        'child_user_name','child_user_number','child_user_gender',
        'child_user_email','user_id','user_number','child_user_created_user_id',
        'child_user_created_time','child_user_is_active','child_user_device_id',
        'child_user_apps_login_active','child_user_apps_location_status',
        'child_user_apps_net_status'
    ];




}
