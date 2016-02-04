//        CKEDITOR.on('instanceCreated', function (evt) {
//            console.log('instanceCreated', evt, evt.editor);
//        });

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
