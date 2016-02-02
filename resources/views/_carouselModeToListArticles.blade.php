<script type="text/javascript"
        src="/js/customJs/socialIcons.js"></script>
<div class="col-md-9" id="main-content-holder">
    <div class="row">
        <div class="col-md-12" id="google-ad-1">
            <h4>Google Ad</h4>
            This is a google ad template.</p>
        </div>
    </div>
    <?php $index = 0 ?>
    @foreach ($articleDetails as $articleDetail)
        {{--{!!$articleDetails->getDisabledTextWrapper()  !!}--}}{{-- {!! $articleDetails->currentPage()!!} {!! $articleDetails->lastPage()!!}sss--}}
        <div class="row">
             {!! $articleDetails->render(new \App\Library\MyPaginationPresenter($articleDetails))!!}
{{--            @if($articleDetails->currentPage()==$articleDetails->currentPage())--}}
                <div class="form-group">
                        @include('_socialIcons')
                            <div class="cke_custom_textarea_inline cke_editable cke_editable_inline cke_contents_ltr cke_show_borders">
                            <h3 class="article-detail-counter">#{!!$articleDetail->counter+1 !!}.</h3>
                            {!!$articleDetail->body!!}
                            </div>
                </div>
            @include('_tagsViewMode')
            @include('_fbCommentSection')
            {{--@endif--}}
        </div>
        <?php $index = $index+1 ?>
    @endforeach
</div>







