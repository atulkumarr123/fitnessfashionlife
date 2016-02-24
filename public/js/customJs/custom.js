$(document).ready(function() {
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
});

$(document).ready(function(){
    if(this.location.pathname=='/'){
        $('a[href="'+this.location.pathname+'"]').addClass('activeHome');
    }
    else{
        $('a[href="'+this.location.pathname+'"]').parent().addClass('active');
    }
});