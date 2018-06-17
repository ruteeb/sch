<?php

namespace App\Http\Controllers;

use ReflectionClass;
use App\Model\Lessons;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

// use Symfony\Component\HttpKernel\Client;

   use IlluminateHttpRequest;
   use TwilioRestClient;
   use TwilioJwtAccessToken;
   use TwilioJwtGrantsVideoGrant;
   use Twilio\Rest\Client;
   use Illuminate\Http\Request;
   use Auth;

class VideoRoomsController extends Controller
{
    
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

    public function index() {
        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read([]);
        
                $rooms = array_map(function($room) {
                return $room->uniqueName;
                }, $allRooms);
        
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return view('index', ['rooms' => $rooms]);
    }

    public function indexjoinRoom() {
         
         
        return view('joinToRoom' );
    }
    

    public function createRoom(Request $request){
       
       $client = new Client($this->sid, $this->token);
       $roomRequest = $request->roomName."_".$request->roomName_extention;
       $exists = $client->video->rooms->read([ 'uniqueName' => $roomRequest]);
       
        // echo  "اثقث" . ;
       if(auth::user()['level']== "teacher"){
      
            if (empty($exists)) {
                $resultCreation = $client->video->rooms->create([
                    'uniqueName' => $roomRequest,
                    'type' => 'group',
                    'recordParticipantsOnConnect' => true
                ]);
            
                \Log::debug("created new room: ".$roomRequest);
                // echo "<pre>";
                //    print_r($resultCreation);
            }else{
                
                
            }


            // echo "<pre>";
            // echo $request->roomName_extention."<br>";
            // echo  $request->roomName.$request->roomName_extention."<br>";
            
            // echo $room->sid."<br>";
            // echo $request->class_id;
            $room = $client->video->rooms($roomRequest)->fetch();
            $inputs = array ();
            $inputs['sid'] = $room->sid;
            $inputs['title'] = $roomRequest;
            $inputs['teacher_id'] = auth::user()['id']; 
            $inputs['class_id'] = $request->class_id; // يجب أن يكرر من صفحة البلييد بنفس طريقة ربط الطالب بالصفوف- وهنا فورايتش

            // foreach($arrayClass_id as $element){
            //     $inputs['class_id'] = $element;
                Lessons::create($inputs);
            // }
           
            return redirect()->action('VideoRoomsController@joinRoom', [
                   'roomName' => $roomRequest
            ]); 

        }else{
            echo "you don't have permisions";
        }

       

    //    $lessons = new Lessons;
    // //    $lessons->name = $request->name;
    //    $lessons->save();
    // $videoGrant = new VideoGrant();
    // print_r($exists);



   
    } 
    




    
    public function joinRoom($roomName)   
    {  
        // A unique identifier for this user
        $identity = Auth::user()->first_name; 
        
        \Log::debug("joined with identity: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);
        
        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($roomName);
        
        $token->addGrant($videoGrant);
        
        return view('room', [ 'accessToken' => $token->toJWT(), 'roomName' => $roomName ]);
    }






    // -------------------


    
}
