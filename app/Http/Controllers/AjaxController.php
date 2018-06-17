<?php

namespace App\Http\Controllers;

use App\Model\Lessons;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Model\ClassesStudent;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //
    protected $sid;
    protected $token;
    protected $key;
    protected $secret;
     
    public function __construct() 
    {
       $this->sid = config('services.twilio.sid');
       $this->token = config('services.twilio.token');
       $this->key = config('services.twilio.key');
       $this->secret = config('services.twilio.secret');
    }

    public function GetOnlineRooms(Request $request ) {
        $rooms = [];
        
        try {
                $client = new Client($this->sid, $this->token);
                $allRooms = $client->video->rooms->read([]);
                
                $rooms = array_map(function($room) {
                    $roomsTemp = [];
                    $lessons =  Lessons::where('sid', '=', $room->sid)->get();
                        
                    foreach($lessons as $key  => $lesson  ){
                            
                        $lessonID = $lesson->id;
                        $class_id = $lesson->class_id;
                        $userID = Auth::user()['id'];
                        
                        $result = ClassesStudent::where('student_id','=', $userID)->where('class_id','=', $class_id)->first();
                        
                        if($result['id']!="") {
                            
                            return [$room->uniqueName,$lesson->sid];
                                
                        } 
                            
                    }
                }, $allRooms);
            
        
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
         
        return response()->json($rooms);
         


    }
}