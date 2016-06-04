@section('image'){{url('/')}}@include("commons._coverImagePath")@stop
@section('url'){{Request::url()}}@stop
@section('title'){{$article->title}}@stop
@section('description'){{$article->description}}@stop

<div class="col-md-9" id="main-content-holder">
{{--    @include("ads._ad1")--}}
        <div class="row">
            @if($article->isPublishedByAdmin==1)@include('socialMedia._socialIcons')@endif
            <div class="col-md-12 article-design-on-article-page">
                <h3 class="article-title-class">{{$article->description}}</h3>
                    <article class="media" style="margin-top: 0px;">
                        <p class="article-details-body-class">
                         {!!$article->body!!}
                        </p>
                    </article>
            </div>
            @include('tagging._tagsViewMode')
            @if(Auth::check())
                @if(($userOfThisArticle==Auth::user()&&$article->isPublishedByAdmin==0)||
                (Auth::user()->roles()->lists('role')->contains('admin')))
            @include('commons._editAndDelButton')
                @endif
            @endif
            @if($article->isPublishedByAdmin==1)@include('socialMedia._socialIcons')@endif
            @include('socialMedia._fbCommentSection')
</div>
</div>
