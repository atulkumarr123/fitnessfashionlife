<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Fitness Fashion Life</title>
    <link rel="stylesheet" href="/css/fromGulp/app.css">
    <link rel="stylesheet" href="/css/socialMediaFontsFamily.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/font-awesome.css">

    <script type="text/javascript"
            src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript"
            src="/ckfinder/ckfinder.js"></script>
    <script type="text/javascript"
            src="/js/jquery.min.js"></script>
    <script type="text/javascript"
            src="/js/bootstrap.min.js">
    </script>

</head>
<body>
@include('_navbar')
<div class="container">
    <div class="row" id="mainRow">
        @yield('createArticleForm')
        @yield('article')
        @yield('recentUpdates')
        @include('_adplaceholder')
    </div>

</div>
@include('_footer')
</body>
@yield('addDivScript')
</html>