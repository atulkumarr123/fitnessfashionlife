@extends('layout')
<script type="text/javascript"
        src="ckeditor/ckeditor.js"></script>
<script type="text/javascript"
        src="ckfinder/ckfinder.js"></script>


@section('createArticleForm')
    <div class="col-md-9" id="main-content-holder">
        <div class="row">
            <div class="col-md-12" id="google-ad-1">
                <h4>Google Ad</h4>
                This is a google ad template.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data" action="/articles" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{old('description')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="articleBody">Write your Article:</label>
                        <textarea type="text" name="articleBody" id="articleBody" class="form-control"  rows="5" required>
                            {{old('articleBody')}}
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label for="Image">Add Image:</label>
                        <input type="file" name="image" id="image" class="form-control" value="" required>
                    </div>
                    {{--<label for="articleBody">--}}
                        {{--Write your Article:</label>--}}
                    {{--<div class="form-group dropzone" id="dropzoneDiv">--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right"> Save </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@stop

{{--@section('dropzoneScript')--}}
{{--<script type="text/javascript"--}}
        {{--src="/js/dropzone.js"></script>--}}
{{--<script type="text/javascript">--}}
    {{--Dropzone.autoDiscover = false;--}}
    {{--var myDropzone = new Dropzone("div#dropzoneDiv", { url: "/file/post"});--}}
{{--</script>--}}
{{--@stop--}}
