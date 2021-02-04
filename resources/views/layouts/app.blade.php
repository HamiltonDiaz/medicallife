<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Medical Life') }}</title>        
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png')}}">

    <title>{{ __('Medical Life') }}</title>
    <!-- Fonts -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{ asset('css/styles.css')}} " rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
</head>
<body>
    <div id="app">
        @include('layouts.navbars.homeNav')
         <div class="">
            @yield('content')
        </div>
        @if (Request::path()!="login" and Request::path()!="register" and Request::path()!="contact" )
            @include('layouts.footers.homeFooter')
        @endif
    </div>

    <div class="btn-whatsapp">
        <a href="https://api.whatsapp.com/send?phone=573208178127&text=Hola%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s%20sobre%20tus%20productos" target="_blank">
        <img src=" {{asset('img/api-whatsapp.png')}}" style="width: 80px" alt="">
        </a>

    </div>
    <a href="#menu" id="irinicio" class="ir-inicio" style="position: fixed; z-index: 999; display: inline;"><span class="fa fa-home" style="color: white; font-size:40px" ></span></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> 
    <script src=" {{asset('js/functions.js')}}"></script>
</body>
</html>
