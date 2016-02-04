
<div class="col-md-9" id="main-content-holder">
@include("ads._ad1")
    <?php $index = 0 ?>
    @foreach ($articleDetails as $articleDetail)
        {{--{!!$articleDetails->getDisabledTextWrapper()  !!}--}}{{-- {!! $articleDetails->currentPage()!!} {!! $articleDetails->lastPage()!!}sss--}}
        <div class="row">
             {!! $articleDetails->render(new \App\Library\MyPaginationPresenter($articleDetails))!!}
{{--            @if($articleDetails->currentPage()==$articleDetails->currentPage())--}}
                <div class="form-group">
                        @include('socialMedia._socialIcons')
                            <div class="cke_custom_textarea_inline cke_editable cke_editable_inline cke_contents_ltr cke_show_borders">
                            <h3 class="article-detail-counter">#{!!$articleDetail->counter+1 !!}.</h3>
                            {!!$articleDetail->body!!}
                            </div>
                </div>
            @include('tagging._tagsViewMode')
            @include('socialMedia._fbCommentSection')
            {{--@endif--}}
        </div>
        <?php $index = $index+1 ?>
    @endforeach
</div>







