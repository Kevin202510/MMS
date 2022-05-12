<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            h5 {
                background: #ffffff;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-weight: bold;
                font-family: -webkit-body;
                font-size: 60px;
                padding-top: 50px;
                padding-right: 20px;
                padding-bottom: 50px;
                padding-left: 20px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .bg-image{
                background-image: url("../img/bg2.jpg");
                height: 100%;
                filter: blur(5px);
                -webkit-filter: blur(5px);
                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            * {
                box-sizing: border-box;
            }
            #content{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                width: 90%;
                padding: 20px;
            }
        </style>
    </head>
    <body id="bodykoto">
        <div class="bg-image"></div>
        <div class="flex-center position-ref full-height" id="content">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md" style="border-top: 2px; background-color: rgb(0 0 0 / 30%); border-radius: 25px;">
                    <h5>Web-Based Mushroom Monitoring System <br> with <br> Smart Sprinkler</h5>
                </div>
        </div>
    </body>
</html>
