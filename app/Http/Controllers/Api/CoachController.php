<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Coach;
use DB;
use App\Repositories\Coach\CoachInterface as CoachInterface;

class CoachController extends Controller
{
    public $coach;
    public function __construct(CoachInterface $coach)
    {
        $this->coach = $coach;
    }
    public function getTimeZoneData(Request $request){
        $validateData = Validator::make($request->all(),[
            'timezone' => 'required|exists:coaches,timezone' ,
        ]);

        if($validateData->fails()){
            return response([
                'status' => false,
                'status_code' => 400,
                'status_message' => $validateData->errors()
            ]);
        }
        try{
            $timezone = strtoupper($request->timezone);            
            $user_data = $this->coach->getTimezoneData($timezone);  //Call to Coach Repository to Fetch Data
            $data = $this->formTimeSlotDataJson($user_data,$timezone); // Function Call to Form Final Json
            if(!empty($data['coaches'])){
                return response([
                    'status' => true,
                    'status_code' => 200,
                    'status_message' => 'Coaches Availability Retrieved Sucessfully',
                    'data' => $data
                ]);
            }
            else{
                return response([
                    'status' => false,
                    'status_code' => 400,
                    'status_message' => 'Coaches Availability Not Found'
                ]);
            }
        }catch(Exception $e){
            return response([
                'status' => false,
                'status_code' => 500,
                'status_message' => $e->getMessage()
            ]);
        }
    }

    public function getCoachAndTimeWiseData(Request $request){
        $validateData = Validator::make($request->all(),[
            'timezone' => 'required|exists:coaches,timezone' ,
            'user_name' => 'required' ,
        ]);

        if($validateData->fails()){
            return response([
                'status' => false,
                'status_code' => 400,
                'status_message' => $validateData->errors()
            ]);
        }
        try{
            $timezone = strtoupper($request->timezone); 
            $user_name = $request->user_name;           
            $user_data = $this->coach->getCoachData($timezone,$user_name);  //Call to Coach Repository to Fetch Data
            $data = $this->formTimeSlotDataJson($user_data,$timezone); // Function Call to Form Final Json
            if(!empty($data['coaches'])){
                return response([
                    'status' => true,
                    'status_code' => 200,
                    'status_message' => 'Coaches Availability Retrieved Sucessfully',
                    'data' => $data
                ]);
            }
            else{
                return response([
                    'status' => false,
                    'status_code' => 400,
                    'status_message' => 'Coaches Availability Not Found'
                ]);
            }
        }catch(Exception $e){
            return response([
                'status' => false,
                'status_code' => 500,
                'status_message' => $e->getMessage()
            ]);
        }
    }

    /** Function to break entire time slot into 1 hour slots */
    public function getTimeSlots($from,$to){
        $time_slot = array();
        
        for($i = 0 ; strtotime($from) < strtotime($to) ; $i++){
            $end = date('h:i:s a',strtotime($from) + strtotime('01:00:00'));
            if(strtotime($end) > strtotime($to)){
                $end = $to;
            }
            $time_slot[$i]['start_time'] = date('h:i:s a',strtotime($from));
            $time_slot[$i]['end_time'] = date('h:i:s a',strtotime($end));
            $from = $end;
        }
        return $time_slot;
    }
    /** Ends Here */

    /** Function to Form Final Json to avoid Code Dupluication  */
    public function formTimeSlotDataJson($user_data,$timezone){

        $data = array();
        $data['zone'] = $timezone;
        $data['coaches'] = array();
        foreach($user_data as $value){
            $time_slot_array = $this->getTimeSlots($value->available_at, $value->available_until); //Function call to break time slot into 1 hours
            if(isset($data['coaches']['emp_id']) && isset($data['coaches']['emp_id']) == $value->emp_id){
                if(isset($data['coaches']['timeslots'][$value->day])){
                    array_push($data['coaches']['timeslots'][$value->day],$time_slot_array);
                }
                else{
                    $data['coaches']['timeslots'][$value->day]= $time_slot_array;
                }
            }
            else{
                $data['coaches']['emp_id'] = $value->emp_id;
                $data['coaches']['name'] = $value->name;
                $data['coaches']['timeslots'][$value->day] = $time_slot_array;
            }                
        }
        return $data;
    }
}
