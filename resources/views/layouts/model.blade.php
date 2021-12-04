<!DOCTYPE html>
<html>
<head>
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0">
    <link rel=”stylesheet” href=”css/bootstrap.css”>
    <link rel=”stylesheet” href=”css/bootstrap-responsive.css”>
    <link rel="icon" href="{!! asset('DAR.png') !!}"/>

    <!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>DarElHay-{{ $title ?? 'Center'}}</title>
</head>
<body>
<div id="cadreH" class="container mat-card">
    <div style="float: left;" class="">
        <a type="button" href="/home"><img src="/images/retour1.png" alt="HTML5 Icon" style="width:128px;height:128px;"></a>
    </div>
    <div style="color: #ffffff;font-family:Roboto; font-size:50px; margin-top: 20px; display: inline-block" class="text-center font-weight-bold">{{ $service }}</div>
    <div style="float: right;text-align: right"><img src="DAR.jpg" alt="HTML5 Icon" style="margin-top: 10px;width:128px;height:100px;"></div>
</div>



<div id="cadreContent" class="container">
<!--
<div id="cadreVert" class="">
</div>
-->
    <div style="float: right;" class="">
      <!-- <a type="button" href=javascript:history.go(-1)><img src="/images/retour1.png" alt="HTML5 Icon" style="width:128px;height:128px;"></a>-->
    </div>
    @yield('menu')


</div>
@yield('content')

 <div id="footer2" class="container mat-card" style="color: #ffffff;">
        <h3 style="color: #ffffff;font-family:Roboto;font-weight:bold"> مركز التربية و التكوين دار الحي المسيرة - مرتيل</h3>
    </div>


</body>
</html>

