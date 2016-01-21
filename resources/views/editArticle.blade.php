@extends('layout')



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
                    <input type="hidden" name="numberOfTextAreas" id="numberOfTextAreas" value="1" class="form-control">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control" value="" required>
                    </div>
                    @foreach ($articleDetails as $articleDetail)
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
                            CKEDITOR.inline('articleBody'+ count, {
                                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                            });
                        </script>

                    </div>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right"> Save</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary pull-right" onclick="newEditor()">Create new
                            editor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('addDivScript')
    <script type="text/javascript">

        CKEDITOR.on('instanceCreated', function (evt) {
            console.log('instanceCreated', evt, evt.editor);
        });

        function newEditor() {
            var count = $('textarea').length+1;
//            alert(count);
            $('#numberOfTextAreas').val(count);
//            alert(DOMDocument.getElementsByTagName('textarea').length);
            var textarea = CKEDITOR.dom.element.createFromHtml('<textarea id="articleBody'+count+'" name="articleBody'+count+'" class="form-control"></textarea>');
            var outerDiv = new CKEDITOR.dom.element(document.getElementById('editor'));
            textarea.appendTo(outerDiv);

            // Create editor instance on the new element.
            CKEDITOR.inline(textarea, {
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






