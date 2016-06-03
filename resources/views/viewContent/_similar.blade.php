<div class="col-md-3" id="main-content-holder">
    <div class="row">
        <div class="col-md-12">
            <div class="similarPosts">
                <p class="blink_me">You might be interested in </p>
                &nbsp;&nbsp;&nbsp;<i class="fa fa-hand-o-down fa-2x"></i>
            </div>
        </div>
    </div>
    @foreach ($similarArticles as $articleSet)
        @foreach ($articleSet as $oneArticle)
        <div class="row">
            <div class="col-md-12 article-design-on-article-page">
                <a href="{{url("/articles",$oneArticle->id)}}" class="recent-updates-block-anchor">
                <article class="media">
                    <h4 class="article-title-class">{{$oneArticle->title}}</h4>
                    {{--<h6 class="pull-right" style="margin:0px">{{Carbon\Carbon::parse($oneArticle->updated_at)->toFormattedDateString()}}</h6>--}}
                    <h6 class="pull-right" style="margin:0px">{{Carbon\Carbon::parse($oneArticle->updated_at)->toFormattedDateString().' By '}}<span style="font-weight: 600;">{{$article->user->name}}</span></h6>
                    <img class="media-object_forRelatedArticles" src="@include("commons._coverImagePath")">
                    <p class="article-body-class">
                    <h5> {{substr($oneArticle->description,0,75)}}{{'...'}}</h5>
                    </p>
                </article>
                </a>
            </div>
        </div>
            @endforeach
    @endforeach
    <div class="row">
        <div class="col-md-12 article-design-on-article-page">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- NationPollsAd1 -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-1585513772912319"
         data-ad-slot="9014494184"
         data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
        </div>
    </div>
</div>
