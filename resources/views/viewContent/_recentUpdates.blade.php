<div class="col-md-12" id="main-content-holder">
    @include("ads._ad1")
    @foreach ($articles->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk as $article)
                <div class="col-md-4 article-design-on-home-page">
                    <a href="{{url("/articles",$article->id)}}" class="recent-updates-block-anchor">
                        <article class="media">
                            <h4 class="article-title-class">{{$article->title}}</h4>
                            {{--<h4 class="article-title-class"><span style="color: red">sdkkfg</span>sdfg</h4>--}}
                            <h6 class="pull-right" style="margin:0px">{{Carbon\Carbon::parse($article->updated_at)->toFormattedDateString().' By '}}<span style="font-weight: 600;">{{$article->user->name}}</span></h6>
                            @if(property_exists ($article,'articleDetails'))
                            <img class="media-object" src="/images/{{$article->articleDetails->get(0)->img_name}}">
                            @else
                                <img class="media-object" src="@include("commons._coverImagePath")">
                           @endif
                            <p class="article-body-class">
                            <h5> {{substr($article->description,0,75)}}{{'...'}}</h5>
                            </p>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
