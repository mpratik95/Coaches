<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'timezone','day','available_at','available_until'
    ];

    public function getTimezoneBasedData($timezone)
    {
    
        return static::where('timezone',$timezone)->get(['emp_id','name','day','available_at','available_until']);
    }

    public function getCoachesBasedData($timezone,$user_name)
    {
    
        return static::where('timezone',$timezone)->where('name','like','%'.$user_name.'%')->get(['emp_id','name','day','available_at','available_until']);
    }

    public function getAllData(){

        return static::all();
    }
}
