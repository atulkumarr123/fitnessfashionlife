<link rel="stylesheet" href="/css/overridingCustom.css">
<link rel="stylesheet" href="/css/fromGulp/carouselModeToListArticles.css">
<style>
</style>
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
            <div class="form-group" id="editor">
                <div class="form-group" id="editor">

                    <div class="cke_textarea_inline cke_editable cke_editable_inline cke_contents_ltr cke_show_borders">
                        <h3 class="article-detail-counter">#{!!$articleDetail->counter+1 !!}.</h3>
                        {!!$articleDetail->body!!}
                        </div>
                        {{--<textarea id="articleBody" name="articleBody" class="form-control" disabled required>--}}
                            {{--{!! $articleDetail->body!!}--}}
                        {{--</textarea>--}}
                    {{--<script type="text/javascript">--}}
                        {{--var count = "{{$index}}";--}}
                        {{--document.getElementById('articleBody').id = 'articleBody'+count;--}}
                        {{--document.getElementById('articleBody'+count).name = 'articleBody'+count;--}}
                        {{--CKEDITOR.disableAutoInline = true;--}}
                        {{--CKEDITOR.inline('articleBody'+count, {--}}
                            {{--removePlugins: 'toolbar',--}}
                        {{--} );--}}
                        {{--CKEDITOR.config.allowedContent = true;--}}
                    {{--</script>--}}
                </div>
            </div>
            {{--@endif--}}
        </div>

        <?php $index = $index+1 ?>
    @endforeach
</div>







