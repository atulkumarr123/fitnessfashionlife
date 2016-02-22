<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <li><a class="navbar-brand" id="homeBrand" href="/"><i class="fa fa-home fa-2x"></i></a></li>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/articles/filter/fitness">Fitness</a></li>
                <li><a href="/articles/filter/fashion">Fashion</a></li>
                <li><a href="/articles/filter/life">Life</a></li>
                <li><a href="/articles/filter/relations">Relationships</a></li>
                <li><a href="/articles/filter/crazyFacts">Crazy Facts</a></li>
                <li><a href="/articles/filter/mediaStories">Media Stories</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-inverse" >
                <li><a href="/articles/create"> Write Blog <i class="fa fa-pencil"></i></a></li>
                <li><a id="myBtn" style="cursor:pointer">Read regularly</a></li>
                <li role="separator" class="divider"></li>
                    @if(Auth::check())
                        <li><a href="/auth/logout">Log Out <i class="fa fa-sign-out"></i>{{Auth::user()->name}}</a></li>
                    @endif
                    @if(Auth::guest())
                    <li><a href="/auth/login">Sign In <i class="fa fa-sign-in"></i></a></li>
                    <li><a href="/auth/register">Sign Up <i class="fa fa-chevron-up"></i></a></li>
                    @endif
                </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                {{--<li><a href="/talkToUs">Talk to Us</a></li>--}}
                {{--<li><a href="/about">About Us</a></li>--}}
                <li>
                    <form class="navbar-left navbar-search" id="searchForm" action="/search">
                        <div class="" style="padding-top:7px;padding-bottom:7px">
                            <div class="col-md-12" style="padding-right:0px">
                                <div style=" display: flex;">
                                    <input type="text" class="form-control empty" name = "search" id="search"  onfocus="this.placeholder = ''" onblur="this.placeholder = '&#xF002;  Search...'"  placeholder="&#xF002; Search..." required/>
                                    <button type="submit" id="searchButton" class="fa fa-search"></button>

                                </div>

                            </div>

                            </div>
                    </form>
                </li>
            </ul>
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li><a href=""><i class="fa fa-user"></i></a></li>--}}
            {{--</ul>--}}
        </div><!--/.nav-collapse -->

    </div>
</nav>


