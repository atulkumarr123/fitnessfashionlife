{{--/images/{{Helper::underScoreIt($article->title).'/'.$article->img_name}}--}}
@if(isset($article))@if(!empty($article->title)&&!empty($article->img_name))/images/{{(Helper::processTheDirName($article->title)).'/'.$article->img_name}}@endif
@endif