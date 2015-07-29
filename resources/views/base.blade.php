<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>美锦红娘</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <!-- Pace -->
    <link href="/css/pace.css" rel="stylesheet">

    <!-- Endless -->
    <link href="/css/endless.min.css" rel="stylesheet">
    <link href="/css/endless-landing.min.css" rel="stylesheet">

    @yield('top_css')
</head>

<body class="overflow-hidden">
<!-- Overlay Div -->
<div id="overlay" class="transparent"></div>

<div id="wrapper" class="preload">
<header class="navbar navbar-fixed-top bg-white">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand"><span class="text-danger">美锦 </span> 红娘</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/" class="top-link">HOME </a>
                </li>
                <li>
                    <a href="/login" class="top-link">LOGIN </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<div id="landing-content">

    @yield('content')

</div><!-- /landing-content -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 padding-md">
                <p class="font-lg">美锦红娘</p>
                <p><small>@copyright 2015</small></p>
            </div><!-- /.col -->
            <div class="col-sm-6 padding-md">
                <p class="font-lg">Contact</p>
                Email : abc@123.com
                <div class="seperator"></div>
                <a class="btn btn-info" href="/contact"><i class="fa fa-envelope"></i> abc@123.com</a>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</footer>
</div><!-- /wrapper -->

<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<script src="/js/jquery-1.10.2.min.js"></script>

<!-- Bootstrap -->
<script src="/bootstrap/js/bootstrap.min.js"></script>

<!-- Waypoint -->
<script src='/js/waypoints.min.js'></script>

<!-- LocalScroll -->
<script src='/js/jquery.localscroll.min.js'></script>

<!-- ScrollTo -->
<script src='/js/jquery.scrollTo.min.js'></script>

<!-- Modernizr -->
<script src='/js/modernizr.min.js'></script>

<!-- Pace -->
<script src='/js/pace.min.js'></script>

<!-- Popup Overlay -->
<script src='/js/jquery.popupoverlay.min.js'></script>

<!-- Slimscroll -->
<script src='/js/jquery.slimscroll.min.js'></script>

<!-- Cookie -->
<script src='/js/jquery.cookie.min.js'></script>

<!-- Flot -->
<script src='js/jquery.flot.min.js'></script>

<!-- Endless -->
<script src="/js/endless/endless.js"></script>
@yield('bottom_js')

<script>
    $(function()	{
        $('.animated-element').waypoint(function() {

            $(this).removeClass('no-animation');

        }, { offset: '70%' });

        $('.nav').localScroll({duration:800});
    });
</script>

</body>
</html>
