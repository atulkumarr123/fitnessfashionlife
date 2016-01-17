<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Fitness Fashion Life</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
@include('_navbar')
<div class="container">
    <div class="row">
        @yield('recentUpdates')
        @include('_adplaceholder')
    </div>
    <div id="copyright text-right">© Copyright 2013 Scotchy Scotch Scotch</div>
</div>
<script type="text/javascript"
        src="js/jquery.min.js"></script>
<script type="text/javascript"
        src="js/bootstrap.min.js"></script>
</body>
</html>