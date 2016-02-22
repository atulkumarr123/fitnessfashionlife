<div class="col-md-9" id="main-content-holder">
    @include("ads._ad1")
        <div class="row">
            @include('socialMedia._socialIcons')
            <div class="col-md-12 article-design-on-article-page">
                    <article class="media">
                        <p class="article-details-body-class">
                            {!!$article->body!!}
                        </p>
                    </article>
            </div>
            @include('tagging._tagsViewMode')
            <div class="customContainer1">
            @if($userOfThisArticle==Auth::user()||
            (Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin')))
            <a  class="btn btn-primary" style="align:center" href="/articles/{{$article->id}}/edit" role="button">Click here to edit this article</a>
            @endif
            </div>
            @include('socialMedia._socialIcons')
            @include('socialMedia._fbCommentSection')
        </div>
</div>
