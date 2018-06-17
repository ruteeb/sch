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
         


    <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
    <h2>{{auth::user()['id']}}</h2>
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
                    Join to room
                </div>

                <form action="room/create" method="POST">
                  
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Room Name</label>
               
                <div id="resultRooms">

                </div>
                 
                 
                
                 
                {{-- <input type="submit" name="submit" value="Go"> --}}
                </form>
                
                
                <input type="button" name="target" id="target" value="target">

                 
            </div>


           

                           

 
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script>
    // $( "#class_id" ).change(function() {

        
        $( "#target" ).click(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            var request = $.ajax({
                url: '{{url('')}}/GetOnlineRooms' ,
                type: 'post',
                // dataType: 'json',
                data: {
                    userID: {{auth::user()['id']}} ,
                    } ,
                // contentType: 'application/json; charset=utf-8'
            });
            request.done(function(data) {
                var elementTemp = "";
                // console.log(data[1])
                // 
                    for(i=0; i< data.length;i++){
                        if(data[i]!=null){
                        console.log(data[i]);
                        elementTemp = elementTemp + "<a href='{{url('')}}/room/join/"+data[i]  +"'>"+data[i][0] +"</a>"   + "<br>";
                        }
                    }
                   
                        
                    
                
                // }else{
                //     alert()
                // }
               
                // console.log(data)
                $( "#resultRooms" ).html(elementTemp);            
            });
            request.fail(function(jqXHR, textStatus) {
                $( "#resultRooms" ).html("هناك خطأ حاول مرة أخرى!!!")
            });
        });

        
        // $( "#resultRooms" ).prop( "disabled", false );


        // $('#roomName_extention').attr('readonly', false);
            // courcesID = $( "#courcesID option:selected" ).html()  ;
            // class_id = $( "#class_id option:selected" ).html()  ;
            
       
        // $('#roomName_extention').attr('readonly', true);
    // });
    // /important from somur: we have to set condtions 


</script>
        </div>
    </body>
</html>
