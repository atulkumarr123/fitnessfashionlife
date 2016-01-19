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
       <form>
           <div class="form-group">
               <label for="title">Title:</label>
               <input type="text" name="title" id="title" class="form-control" value="">
           </div>
           <div class="form-group">
               <label for="description">Description:</label>
               <input type="text" name="description" id="description" class="form-control" value="">
           </div>
           <label for="articleBody">Article:</label>
           <div class="form-group" id="articleBody" contenteditable="true">
      <script>
          CKEDITOR.inline( 'articleBody', {
              filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
              filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
//              filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
//              filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?type=Flash',
//              filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//              filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
          } );
       </script>
           </div>
       </form>
               </div>
           </div>
   </div>

@stop









