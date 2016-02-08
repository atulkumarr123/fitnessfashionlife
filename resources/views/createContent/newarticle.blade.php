@extends('commons.layout')

<script type="text/javascript"
        src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript"
        src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript"
        src="/js/customJs/createNewEditorScript.js">
</script>

@section('createArticleForm')
    <div class="col-md-9" id="main-content-holder">
        <div class="row">
            <div class="col-md-12" id="google-ad-1">
                <h4>Google Ad</h4>
                This is a google ad template.</p>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/articles" method="post">
        <div class="row">
            <div class="col-md-12" id="outerDiv">
                    {{csrf_field()}}
                    <input type="hidden" name="numberOfTextAreas" id="numberOfTextAreas" value="1" class="form-control">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control" value="" required>
                    </div>
                    <div class="form-group classToFetchPlaceToAddCk" id="editor">
                        <label for="articleBody0">
                            Write your Article:</label>
                        <textarea id="articleBody0" name="articleBody0" class="form-control" required>

                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.disableAutoInline = true;
                            CKEDITOR.inline('articleBody0', {
                                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                            });
                        </script>
                    </div>
            </div>
        </div>
            @include("tagging._tagsAndButtonsContainer")
        </form>
    </div>

@stop

{{--@section('addDivScript')--}}

    {{--</script>--}}
    {{--@include("public.js.customJs.createNewEditorScript")--}}
{{--    {{ script('public.js.customJs.createNewEditorScript') }}--}}
    {{--<script type="text/javascript" src="{!! asset('public/js/customJs/createNewEditorScript') !!}"></script>--}}
    {{--<script type="text/javascript"--}}
            {{--src="/js/customJs/socialIcons.js"></script>--}}
{{--@stop--}}






