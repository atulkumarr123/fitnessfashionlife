@extends('layout')



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
            <div class="row">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right"> Save</button>
                    <button type="button" class="btn btn-primary pull-right" onclick="newEditor()">Create new
                        editor
                    </button>
                </div>
                </div>
        </form>
    </div>

@stop

@section('addDivScript')
    <script type="text/javascript">

        CKEDITOR.on('instanceCreated', function (evt) {
            console.log('instanceCreated', evt, evt.editor);
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






