<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Fitness Fashion Life</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/custom.css">
    {{--<link rel="stylesheet" href="css/contact-buttons.css">--}}
    {{--<link rel="stylesheet" href="css/demo.css">--}}
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">--}}

</head>
<!-- Go to www.addthis.com/dashboard to customize your tools -->

<body>

@include('_navbar')
{{--<div id="for-social-media-sidebar" style="display:inline-block">atul--}}
{{--</div>--}}
<div class="container">
    <div class="row">
        @yield('recentUpdates')
        @include('_adplaceholder')
    </div>
    <div id="copyright text-right">© Copyright 2013 Scotchy Scotch Scotch</div>
</div>
{{--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-569637614e7281f1" async="async"></script>--}}
{{--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-569637614e7281f1" async="async"></script>--}}
<script type="text/javascript"
        src="js/jquery.min.js"></script>
<script type="text/javascript"
        src="js/bootstrap.min.js"></script>
{{--<script src="js/jquery.contact-buttons.js"></script>--}}
{{--<script src="js/demo.js"></script>--}}
{{--<script>--}}
    {{--$("#recent-update").click(function() {--}}
        {{--window.location = $(this).find("a").attr("href");--}}
        {{--return false;--}}
    {{--});--}}
{{--</script>--}}

</body>
</html>