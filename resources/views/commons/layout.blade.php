<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Atulya Perspectives</title>
    <link rel="stylesheet" href="/css/fromGulp/app.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/select2-4.0.1/css/select2.min.css">
    <link rel="stylesheet" href="/css/subscription.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/socialMediaFontsFamily.css">
    <link rel="stylesheet" href="/css/fromGulp/carouselModeToListArticles.css">
    <link rel="stylesheet" href="/css/searchBar.css">
    {{--<link rel="stylesheet" href="/css/modal.css">--}}


    <script type="text/javascript"
            src="/js/jquery.min.js"></script>
    <script
            type="text/javascript"
            src="/js/jquery-ui.min.js">
    </script>
    <script type="text/javascript"
            src="/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
            src="/select2-4.0.1/js/select2.min.js">
    </script>
    <script type="text/javascript"
            src="/js/customJs/socialIcons.js"></script>
    <script
            type="text/javascript"
            src="/js/customJs/searchBar.js">
    </script>
    <script
            type="text/javascript"
            src="/js/customJs/custom.js">
    </script>
    <script
            type="text/javascript"
            src="/js/customJs/subscription.js">
    </script>

</head>
<body>

@include('commons._navbar')
<div class="container">
        <div class="row" id="mainRow">
        @include('flash::message')
        @yield('createArticleForm')
        @yield('article')
        @yield('recentUpdates')
        @yield('similar')
        @yield('aboutUs')
        @yield('registerUser')
        @yield('login')
        @yield('resetPassword')
        @yield('home')
{{--        @include('ads._adplaceholder')--}}
        @include('miscellaneous._subscribeForm')
        </div>
</div>
    @include('commons._footer')
</body>
@yield('addDivScript')
</html>