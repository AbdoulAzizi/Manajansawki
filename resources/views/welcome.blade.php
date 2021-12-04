<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title>Dar El HAy Massira</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                //background-color: #fff;
               // color: #636b6f;
                //font-family: 'Nunito', sans-serif;
                //font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
               // height: 100vh;
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
                //right: 10px;
               // top: 18px;
            }

            .content {
                text-align: center;

            }

            .title {
                font-size:5vw;
                font-family: "Roboto";
                //background-color:rgba(0,0.5,0.5,0.5);
                color: white;
                font-family: 'Bodoni MT';
                 border-radius: 15px;
                 padding:10px;



            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
               text-align: center;

            }

            .police{
                font-family: "Roboto";
                font-size: 20px;


            }
            .bg {
                width: 100%;
                height: auto;
               // background-image: url('/images/bg.png');
                background-size: 100% 100%;


            }

            .div-wrapper {
            //  background-image: url('/images/banniere_darelhay.jpg');
                position: absolute;
                bottom: 0;

              height: 50%;




            }
            .col{
            color:#ffffff;
            background-color:#191970 ;

            }
            .imbg{

            background-image: url('/images/darelhay.png');
                            //position: absolute;
                            top: 0;
                            width: 100%;
                            height: 50%;

            }

            }
        </style>
    </head>
    <body >

            <div  class="h-100">
             <div  class="h-50 col">

                     <div  class="title" >
                        <p style="text-align:center"> Application de Gestion Administrative</p>

                     </div>

                    <marquee class="" behavior="alternate" style="font-size:3vw; font-family: Britannic Bold;" >
                                  <b> « دار الحي المسيرة/Dar El Hay Massira »  </b>
                     </marquee>



                      <div class="flex-center position-ref">
                                @if (Route::has('login'))

                                        @auth

                                                <a class="btn btn-light custom-bt" style="font-size: 3vw;font-weight:bold" href="{{ url('/home') }}">Retourner à la page Administration</a>
                                        @else

                                                <a type="button"  class="btn btn-danger  btn-lg  float-left"  href="{{ route('login') }}">Se connecter</a>

                                            @if (Route::has('register'))

                                                <a type="button" class="btn btn-success btn-lg float-right " style="margin-left:20px" href="{{ route('register') }}">Inscription</a>

                                            @endif
                                        @endauth

                                @endif
                            </div>
                </div>

                <div style="bottom:0px" class="h-50">
                      <img  src="/images/banniere_darelhay.jpg" alt="HTML5 Icon" class="img-fluid w-100 mh-100">

                </div>

 </div>
    </body>
</html>
