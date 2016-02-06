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
                    <h6 class="pull-right" style="margin:0px">{{Carbon\Carbon::parse($oneArticle->updated_at)->toFormattedDateString()}}</h6>
                    <img class="media-object_forRelatedArticles" src="/images/{{$oneArticle->img_name}}">
                    <p class="article-body-class">
                    <h5> {{substr($oneArticle->description,0,75)}}{{'...'}}</h5>
                    </p>
                </article>
                </a>
            </div>

        </div>
            @endforeach
    @endforeach
</div>
