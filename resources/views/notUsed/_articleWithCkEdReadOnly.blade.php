<link rel="stylesheet" href="/css/overridingCustom.css">
<div class="col-md-9" id="main-content-holder">
    <div class="row">
        <div class="col-md-12" id="google-ad-1">
            <h4>Google Ad</h4>
            This is a google ad template.</p>
        </div>
    </div>
    <?php $index = 0 ?>
@foreach ($articleDetails as $articleDetail)
        <div class="row">
            <div class="form-group" id="editor">
                <h3><strong>#{!!$articleDetail->counter+1 !!}.</strong></h3>
                <div class="form-group" id="editor">
                    <div class="cke_textarea_inline cke_editable cke_editable_inline cke_contents_ltr cke_show_borders">
                        {!! $articleDetail->body!!}
                    </div>
                        {{--<textarea id="articleBody" name="articleBody" class="form-control" disabled required>--}}
                            {{--{!!$articleDetail->body !!}--}}
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
        </div>
        <?php $index = $index+1 ?>
    @endforeach
</div>







