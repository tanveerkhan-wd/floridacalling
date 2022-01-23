

$(document).on("change",".alpha-only", function(){
  var regexp = /[^a-zA-Z ]/g;
  if($(this).val().match(regexp)){
    $(this).val( $(this).val().replace(regexp,''));
  }
});


$(document).on('keyup','.email-validate',function(){
    var userinput = $(this).val();
    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

    if(!pattern.test(userinput))
    {
        $("#signinSrEmail-error").remove();
        $(this).parent().append('<div id="signinSrEmail-error" class="invalid-feedback" style="display: block;">Please enter a valid email address.</div>');
        $(this).parent().addClass('u-has-error');
    }else{
        $(this).parent().removeClass('u-has-error');
        $("#signinSrEmail-error").remove();
    }
});