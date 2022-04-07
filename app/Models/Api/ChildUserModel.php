<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class ChildUserModel extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table="";
    protected $primaryKey="";

    protected $fillable=[
        ''
    ]




}
