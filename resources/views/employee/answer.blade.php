<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
   </head>
    <body>
        <div class="container">
            <img src="{{asset('assets/img/thankyou.png')}}" class="img-fluid">
                <div class="col-md-9" style="margin: 20px 200px">
                    <p class="h2">Your score is {{$user->score}}/{{$user->total}}</p>
                    <p class="h3">You Skipped {{$user->skiped}} question.</p>
                </div>
        </div>
    </body>
</html>
 