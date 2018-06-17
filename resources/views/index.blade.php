<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
 
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            } 

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600; 
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
         







 







    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

             
 
            <div class="content">
                <div class="title m-b-md">
                    Video Chat Roomsddd
                </div>

                <form action="room/create" method="POST">
                    {{ csrf_field() }}
                <label>Room Name</label>
               
                <div>
                    <select  name="courcesID" id="courcesID" required>
                        <option value=""></option>
                        <option value="1">ONA</option>
                        <option value="2">A2 leesen</option>
                    </select>
                    <select  name="class_id" id="class_id" required>
                            <option value=""></option>
                            <option value="1">may</option>
                            <option value="2">augustus</option>
                        </select>
                </div>
                <br>
                <input type="text" name="roomName" id="roomName" placeholder="Room Name" disabled="true" required>
                <input type="text" name="roomName_extention" id="roomName_extention" placeholder="Extention" readonly="readonly"  required  >
                 
                <input type="submit" name="submit" value="Go">
                </form>
                
                


                @if($rooms)
                @foreach ($rooms as $room)
                    <a href="{{ url('/room/join/'.$room) }}">{{ $room }}</a>
                @endforeach
                @endif
            </div>


            <?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
// require_once  'C:\Windows\SysWOW64\vendor\autoload.php';

// use Twilio\Rest\Client;

// // Your Account Sid and Auth Token from twilio.com/console
// $sid    = "AC56259e6617a799bd5816e3ea6216b43c";
// $token  = "964ddd1456f87228e1623e681c410bb0";
// $twilio = new Client($sid, $token);

// $recording = $twilio->video->v1->recordings("RT45627adb3af61738a13d6597c95541fa")
//                                ->fetch();

// print($recording->trackName);?>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script>
    $( "#class_id" ).change(function() {
        
        $( "#roomName" ).prop( "disabled", false );


        $('#roomName_extention').attr('readonly', false);
            courcesID = $( "#courcesID option:selected" ).html()  ;
            class_id = $( "#class_id option:selected" ).html()  ;
            var auth_= "{{auth::user()['id']}}";
        $( "#roomName_extention" ).val(courcesID+"_"+class_id+'_'+);
        $('#roomName_extention').attr('readonly', true);
    });
    // /important from somur: we have to set condtions 
</script>
        </div>
    </body>
</html>
