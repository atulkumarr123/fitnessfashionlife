<input type="hidden" name="isSubscribed" id="isSubscribed" value="{!!Session::get('isSubscribed')!!}" class="form-control">
<div class="container" id="subscribingModel">
    @include('flash::message')
    <!-- Trigger the modal with a button -->
    {{--<button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>--}}

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" id="modalContent">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-header" {{--style="padding:35px 50px;"--}}>

                    <h4><span class="fa fa-smile-o"></span>want to read more stuff like this,
                        Join us and enjoy life</h4>
                </div>
                <div class="modal-body" style="padding-bottom:40px;padding-top:5px">
                    {!! Form::open(['url'=>'subscribe','id'=>'subscribe'])!!}

                        <div class="form-group">
                            <div class="row" id="errors" style="padding-bottom: 5px; padding-left:15px;padding-right:15px;color: red;">
                            </div>
                            <label for="email"><span class="fa fa-user"></span> E-mail</label>
                            <input type="email" name="email"  required class="form-control" id="email" placeholder="Enter email">
                        </div>
                    <div class="form-group">
                        {{--<button type="submit" class="btn btn-success btn-block">--}}{{--<span class="fa fa-off"></span>--}}{{--Go</button>--}}
                        {{--<button type="submit" class="btn btn-success btn-block">--}}{{--<span class="fa fa-off"></span> --}}{{--Join us</button>--}}
                        {{--<button type="button" class="btn btn-primary" style="width:40%;padding-left:5px;">No Thanks!</button>--}}
                        <button type="submit" class="btn btn-success" style="width:100%"> Go</button>
                        </div>
                    {!! Form::close()!!}
</div>
</div>
</div>
</div>
</div>
<script>
$('#flash-overlay-modal').modal();
$(document).ready(function(){
$("#myBtn").click(function(){
$("#myModal").modal({backdrop:'static',keyboard:false});
});
});
</script>