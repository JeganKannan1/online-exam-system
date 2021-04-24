<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sparkout tech</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /* color: #; */
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 54px;
            }
            
            .m-b-md {
                margin-bottom: 30px;
            }



            .button {
                border-radius: 8px;
                background-color: #f4511e;
                border: none;
                color: #FFFFFF;
                text-align: center;
                font-size: 20px;
                padding: 16px;
                width: 140px;
                transition: all 0.5s;
                cursor: pointer;
                margin: 5px;
            }

            .button span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
            }

            .button span:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }

            .button:hover span {
                padding-right: 25px;
            }

            .button:hover span:after {
                opacity: 1;
                right: 0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img src="assets/img/sparkout.png">
                    <br>
                        <div class="title m-b-md">
                            Welcome To
                            Sparkout Tech solutions
                        </div>
                    <div>        
                        <a href="{{ route('login') }}"><button class="button"><span>Login</span></button></a>
                 </div> 
            </div>
        </div>
    </body>
</html>
