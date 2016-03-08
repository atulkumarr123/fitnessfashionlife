<div class="customContainer1">
    <input type="hidden" name="articleId" id="articleId" value="{{$article->id}}" class="form-control">
            <a  class="btn btn-primary" style="align:center" href="/articles/{{$article->id}}/edit" role="button"><i class="fa fa-edit"></i> Edit</a>
            <a  id="delete" class="btn btn-danger btn-mini" onclick="confirmDel();" style="align:center" {{--href="--}}{{--/articles/{{$article->id}}/delete--}}{{--"--}} role="button"><i class="fa fa-trash-o"></i> Delete</a>
</div>