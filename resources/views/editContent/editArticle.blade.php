@extends('commons.layout')
<script type="text/javascript"
        src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript"
        src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript"
        src="/js/createNewEditorScript.min.js">
</script>
@section('createArticleForm')
    <div class="col-md-9" id="main-content-holder">
        @include("ads._ad1")
        {!! Form::open(['method'=>'patch','files' => true,'action'=>['ArticlesController@update',$article->id],
        'enctype'=>'multipart/form-data"',
        'novalidate' => 'novalidate',
        'files' => true])!!}
        <div class="row">
            @include("commons._errors")
            <div class="col-md-12" id="outerDiv">
                {{--<form enctype="multipart/form-data" action="/articles/{{$articleDetails->get(0)->article_id}}" method="put">--}}
                <input type="hidden" name="numberOfTextAreas" id="numberOfTextAreas" value="1" class="form-control">
                <input type="hidden" name="articleId" id="articleId" value="{{$article->id}}" class="form-control">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$article->title}}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{$article->description}}" required>
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
                            CKEDITOR.config.allowedContent = true;
                            CKEDITOR.inline('articleBody'+ count, {
                                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                            });
                        </script>
                    </div>
                    <?php $index = $index+1 ?>
                @endforeach
                <div class="form-group">
                    {!! Form::label('Select Cover of this Article:') !!}
                    {!! Form::file('image', null!!}
                    {{--<input type="file" name="image" id="image" required/>--}}
                </div>
                @if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
                    @if($article->isPublishedByAdmin==0)
                    <div class="form-group">
                        <label for="isPublishedByAdmin">Publish By Admin:</label>
                        <input type="checkbox" name="isPublishedByAdmin"
                               id="isPublishedByAdmin">
                    </div>
                        @else
                        <div class="form-group">
                            <label for="isPublishedByAdmin">Publish By Admin:</label>
                            <input type="checkbox" name="isPublishedByAdmin"
                                   id="isPublishedByAdmin"  checked>
                        </div>
                        @endif

                    @if($article->isPublished==0)
                        <div class="form-group">
                            <label for="isPublished">Publish:</label>
                            <input type="checkbox" name="isPublished"
                                   id="isPublished" disabled>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="isPublished">Publish:</label>
                            <input type="checkbox" name="isPublished"
                                   id="isPublished"  checked disabled>
                        </div>
                    @endif
                    @else
                    @if($article->isPublished==0)
                        <div class="form-group">
                            <label for="isPublished">Publish:</label>
                            <input type="checkbox" name="isPublished"
                                   id="isPublished">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="isPublished">Publish:</label>
                            <input type="checkbox" name="isPublished"
                                   id="isPublished"  checked>
                        </div>
                    @endif
                        @endif
                </div>
            </div>
            @include("tagging._tagsAndButtonsContainer")
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
            //        function newEditor() {
            //            var count = $('textarea').length;
            //            $('#numberOfTextAreas').val(count+1);
            //            var textArea = CKEDITOR.dom.element.createFromHtml('<textarea id="articleBody'+count+'" name="articleBody'+count+'" class="form-control"></textarea>');
            //            $("#outerDiv").append($('<div class="form-group classToFetchPlaceToAddCk" id="editor"></div>'));
            //            var editorDivs = document.getElementsByClassName('classToFetchPlaceToAddCk');
            //            var lastEditorDiv = new CKEDITOR.dom.element(editorDivs[editorDivs.length-1]);
            //            textArea.appendTo(lastEditorDiv);
            //            // Create editor instance on the new element.
            //            CKEDITOR.inline(textArea, {
            //                        toolbarGroups: [
            //                            {name: 'clipboard', groups: ['clipboard', 'undo']},
            //                            {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
            //                            {name: 'links'},
            //                            {name: 'insert'},
            //                            {name: 'forms'},
            //                            {name: 'tools'},
            //                            {name: 'document', groups: ['mode', 'document', 'doctools']},
            //                            {name: 'others'},
            //                            '/',
            //                            {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
            //                            {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
            //                            {name: 'styles'},
            //                            {name: 'colors'},
            //
            //                        ],
            //                        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            //                        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
            //                    }
            //            );
            //            CKEDITOR.disableAutoInline = true;
            //        }
        </script>
    @stop






