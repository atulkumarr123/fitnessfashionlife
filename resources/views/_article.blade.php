<div class="col-md-9" id="main-content-holder">
    <div class="row">
        <div class="col-md-12" id="google-ad-1">
            <h4>Google Ad</h4>
            This is a google ad template.</p>
        </div>
    </div>
    @foreach ($article as $oneArticle)
        <div class="row">
            <div class="col-md-12 article-design-on-article-page">
                    <article class="media">
                        <h4 class="article-details-title-class">{{$oneArticle->counter.'.  '.$oneArticle->heading}}</h4>
                        <img class="media-object" src="/images/.{{$oneArticle->get(0)->img_name}}">
                        <p class="article-details-body-class">
                            {{$oneArticle->body}}
                        </p>
                    </article>
            </div>
        </div>
    @endforeach
</div>
