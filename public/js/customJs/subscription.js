//Subscription
$(document).ready(function() {
    if(!$("input[name=isSubscribed]").val()){
        setTimeout(function(){
            $("#myModal").modal({effect: 'fadein', direction : 'left',duration:'2000', backdrop:'static',keyboard:false});
        }, 5000)
    }
});

$(function(){
    $('#subscribe').on('submit',function(e){
        //var token = $("input[name=_token]").val();
        //var email = $("input[name=email]").val();
        e.preventDefault(e);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
            type:"post",
            url:'subscribe',
            data:{'email': $("input[name=email]").val()},
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('.close').click();
                window.location = '/';
            },
            error: function(data){
                var errors = data.responseJSON;
                console.log(errors);
                $('#errors').show().html(errors['email']);
            }
        })
    });
});
