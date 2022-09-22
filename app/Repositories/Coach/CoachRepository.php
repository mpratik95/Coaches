<?php

namespace App\Repositories\Coach;
use App\Repositories\Coach\CoachInterface as CoachInterface;
use App\Models\Coach;

class CoachRepository implements CoachInterface
{
    public $coach;

    function __construct(Coach $coach){
        $this->coach = $coach;
    }

    public function getTimezoneData($timezone)
    {
        return $this->coach->getTimezoneBasedData($timezone);
    }

    public function getCoachData($timezone,$user_name)
    {
        return $this->coach->getCoachesBasedData($timezone,$user_name);
    }

    public function getAll(){
        return $this->coach->getAllData();
    }
}