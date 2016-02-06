<div class="col-md-9" id="main-content-holder">
    @include("ads._ad1")
{{--    @foreach ($article as $oneArticle)--}}
        <div class="row">
            <div class="col-md-12 article-design-on-article-page">
                    <article class="media">
                        {{--<h4 class="article-details-title-class">{{$oneArticle->counter.'.  '.$oneArticle->heading}}</h4>--}}
                        {{--<img class="media-object" src="/images/.{{$oneArticle->get(0)->img_name}}">--}}
                        <p class="article-details-body-class">
                            {!!$article->body!!}
                        </p>
                    </article>
            </div>
            @include('tagging._tagsViewMode')
            @include('socialMedia._fbCommentSection')
        </div>
    {{--@endforeach--}}
</div>
