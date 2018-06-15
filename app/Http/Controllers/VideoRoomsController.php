<?php

namespace App\Http\Controllers;

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

    public function createRoom(Request $request){
       
       $client = new Client($this->sid, $this->token);
     
       $exists = $client->video->rooms->read([ 'uniqueName' => $request->roomName]);
     
       if (empty($exists)) {
           $client->video->rooms->create([
               'uniqueName' => $request->roomName,
               'type' => 'group',
               'recordParticipantsOnConnect' => true
           ]);
     
           \Log::debug("created new room: ".$request->roomName);
       }
       
     
       return redirect()->action('VideoRoomsController@joinRoom', [
           'roomName' => $request->roomName
       ]); 
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