<div class="col-md-9" id="main-content-holder">
    <div class="row">
        <div class="col-md-12" id="google-ad-1">
            <h4>Google Ad</h4>
            This is a google ad template.</p>
        </div>
    </div>
    @foreach ($articles->chunk(2) as $chunk)
        <div class="row">
            @foreach ($chunk as $article)
                <div class="col-md-6 article-design-on-home-page">
                    <a href="{{url("/articles",$article->id)}}" class="recent-updates-block-anchor">
                        <article class="media">
                            <img class="media-object" src="images/{{$article->articleDetails->get(0)->img_name}}">
                            <h4 class="article-title-class">{{$article->description}}</h4>
                            <p class="article-body-class">
                                {{substr($article->body,0,75)}}{{'...'}}
                            </p>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
