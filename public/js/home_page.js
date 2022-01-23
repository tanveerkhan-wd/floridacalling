
/*================================*/
/* SERACH LOCATION FROM HOME PAGE */
/*================================*/

$(function() {
  $.ajaxSetup({
    headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }    


});
  

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

  $(document).on('click','.setLoc',function(){
    $(".desti_search_list").css('display','none');
    var address = $(this).text();
    $("#home_destination").val(address);
  });
  
  $(document).on('keyup','#home_destination',function(){
    var data = $(this).val();
    if (data.length >= 3) {
      showLoder();
      $.ajax({
          url: base_url+'/search/destination',
          type: 'POST',
          dataType:'json',
          cache: false,              
          data: {'data':data},
          success: function(result)
          {

            console.log(result);
            $(".desti_search_list").css('display','none');
            $(".desti_search_list").html('');
              if(result.status){
                var suggest = '';
                $.each(result.data,function(key , val){
                  var loc = '';
                  loc= val.name;
                  suggest+= '<li class="list-group-item setLoc">'+loc+'</li>';
                });
                $(".desti_search_list").css('display','block');
                $(".desti_search_list").html(suggest);
              }else{
                $(".desti_search_list").css('display','block');
                $(".desti_search_list").html('<div class="list-group-item text-danger">'+result.message+'</div>');
              }
              hideLoder();
          }
      });
    }
  });
});