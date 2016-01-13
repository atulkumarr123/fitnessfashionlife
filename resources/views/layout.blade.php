<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Fitness Fashion Life</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Atul Kumar Club</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Fitness</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../navbar/">Default</a></li>
                <li><a href="./">Static top <span class="sr-only">(current)</span></a></li>
                <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="row">
        <div class="col-md-9">
            <div class="jumbotron" id="jumbotron">
                <div class="row">
                    <div class="col-md-5">
                        <h4>Navbar example</h4>
                        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.
                            It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
                        </div>
                    <div class="col-md-2">
                        <h4>Google Ad</h4>
                        <p>This is a google ad template.</p>
                    </div>
                    <div class="col-md-5">
                        <h4>Navbar example</h4>
                        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.
                            It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-md-4">
                        <h4>Navbar example</h4>
                        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.
                            It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
                    </div>

                </div>

            </div>
        </div>
        @include('_adplaceholder')
    </div>

</div> <!-- /container -->




<script type="text/javascript"
        src="js/jquery.min.js"></script>
<script type="text/javascript"
        src="js/bootstrap.min.js"></script>

</body>
</html>