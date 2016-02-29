$(document).ready(function() {
    $('#alertDiv').not('.alert-important').delay(3000).slideUp(300);
});

$(document).ready(function(){
    if(this.location.pathname=='/'){
        $('a[href="'+this.location.pathname+'"]').addClass('activeHome');
    }
    else{
        $('a[href="'+this.location.pathname+'"]').parent().addClass('active');
    }
});

function confirmDel(){
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this article!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plz!",
        closeOnConfirm: true,   closeOnCancel: true },
        function(isConfirm){   if (isConfirm) {
            //window.open('/articles/'+$('#articleId').val()+'/delete');
            window.location = '/articles/'+$('#articleId').val()+'/delete';
            swal("Deleted!", "Your imaginary file has been deleted.", "success");   }
        else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } });
}