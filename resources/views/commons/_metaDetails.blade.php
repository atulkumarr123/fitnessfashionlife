@if(isset($article))
    @if(!empty($article->title)) @section('metaTitleForSeo'){{$article->title}}@stop
    @else                     @section('metaTitleForSeo')@include('commons._defaultTitle')@stop
    @endif
@else @section('metaTitleForSeo')@include('commons._defaultTitle')@stop
@endif
@section('image'){{url('/')}}@include("commons._coverImagePath")@stop
@section('url'){{Request::url()}}@stop
@if(isset($article))@if(!empty($article->title)) @section('description'){{$article->title}}@stop @endif @endif