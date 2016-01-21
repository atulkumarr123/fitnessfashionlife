<link rel="stylesheet" href="/css/overridingCustom.css">
<div class="col-md-9" id="main-content-holder">
    <div class="row">
        <div class="col-md-12" id="google-ad-1">
            <h4>Google Ad</h4>
            This is a google ad template.</p>
        </div>
    </div>
    @foreach ($articleDetails as $articleDetail)
        <div class="row">
            <div class="form-group" id="editor">
                <div class="form-group" id="editor">
                    <label for="articleBody1">
                        Write your Article:</label>
                        <textarea id="articleBody" name="articleBody" class="form-control" required>
                            {!!$articleDetail->body !!}
                        </textarea>
                    <script type="text/javascript">
                        var count = "{{$articleDetail->counter}}";
                        document.getElementById('articleBody').id = 'articleBody'+count;
                        document.getElementById('articleBody'+count).name = 'articleBody'+count;
                        CKEDITOR.disableAutoInline = true;
                        CKEDITOR.inline('articleBody'+count, {
                            removePlugins: 'toolbar',
                        } );
                        CKEDITOR.config.allowedContent = true;
                    </script>

                </div>
            </div>
        </div>
    @endforeach
</div>
@section('addDivScript')
    <script type="text/javascript">
    </script>
@stop






