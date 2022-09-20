<?php
namespace App\Repositories\Coach;

interface CoachInterface{

    public function getTimezoneData($timezone);
    public function getCoachData($timezone,$user_name);
    
}