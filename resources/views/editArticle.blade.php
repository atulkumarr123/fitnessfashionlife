@extends('layout')



@section('createArticleForm')
    <div class="col-md-9" id="main-content-holder">
        <div class="row">
            <div class="col-md-12" id="google-ad-1">
                <h4>Google Ad</h4>
                This is a google ad template.</p>
            </div>
        </div>
        {!! Form::open(['method'=>'patch','action'=>['ArticlesController@update',$articleDetails->get(0)->article_id],'enctype'=>'multipart/form-data"'])!!}
        <div class="row">
            <div class="col-md-12" id="outerDiv">
                {{--<form enctype="multipart/form-data" action="/articles/{{$articleDetails->get(0)->article_id}}" method="put">--}}


                    <input type="hidden" name="numberOfTextAreas" id="numberOfTextAreas" value="1" class="form-control">
                    <input type="hidden" name="articleId" id="articleId" value="{{$articleDetails->get(0)->article_id}}" class="form-control">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{$description}}" required>
                    </div>
                <?php $index = 0 ?>
                <label for="articleBody">
                    Edit Your Article Points:</label>
                    @foreach ($articleDetails as $articleDetail)
                        <input type="hidden" name="articleDetailId[]" id="articleDetailId[]" value="{{$articleDetail->id}}" class="form-control">
                    <div class="form-group classToFetchPlaceToAddCk" id="editor">
                        <textarea id="articleBody" name="articleBody" class="form-control" required>
                            {{$articleDetail->body }}
                        </textarea>
                        <script type="text/javascript">
                            var count = "{{$articleDetail->counter}}";
                            document.getElementById('articleBody').id = 'articleBody'+count;
                            document.getElementById('articleBody'+count).name = 'articleBody'+count;
                            CKEDITOR.disableAutoInline = true;
                            CKEDITOR.inline('articleBody'+ count, {
                                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                            });
                        </script>
                    </div>
                    <?php $index = $index+1 ?>
                    @endforeach
            </div>
        </div>
        @include("_tagsAndButtonsContainer")
        {!! Form::close() !!}
    </div>

@stop

@section('addDivScript')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#numberOfTextAreas').val($('textarea').length);
            for (i = 0; i < $('textarea').length; i++) {
                CKEDITOR.instances['articleBody'+i].on('change', function()
                {
                    CKEDITOR.currentInstance.updateElement();
                });
            }
        });
        function newEditor() {
            var count = $('textarea').length;
            $('#numberOfTextAreas').val(count+1);
            var textArea = CKEDITOR.dom.element.createFromHtml('<textarea id="articleBody'+count+'" name="articleBody'+count+'" class="form-control"></textarea>');
            $("#outerDiv").append($('<div class="form-group classToFetchPlaceToAddCk" id="editor"></div>'));
            var editorDivs = document.getElementsByClassName('classToFetchPlaceToAddCk');
            var lastEditorDiv = new CKEDITOR.dom.element(editorDivs[editorDivs.length-1]);
            textArea.appendTo(lastEditorDiv);
            // Create editor instance on the new element.
            CKEDITOR.inline(textArea, {
                        toolbarGroups: [
                            {name: 'clipboard', groups: ['clipboard', 'undo']},
                            {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
                            {name: 'links'},
                            {name: 'insert'},
                            {name: 'forms'},
                            {name: 'tools'},
                            {name: 'document', groups: ['mode', 'document', 'doctools']},
                            {name: 'others'},
                            '/',
                            {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                            {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
                            {name: 'styles'},
                            {name: 'colors'},

                        ],
                        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                    }
            );
            CKEDITOR.disableAutoInline = true;
        }
    </script>
@stop






