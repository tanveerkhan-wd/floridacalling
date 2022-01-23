$(function() {
  

  $.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

  var destination = $("#destination").val();
  //load_data(id='',destination);
  function slickCarousel() {
      $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
  }
  function destroyCarousel() {
    $(".js-slick-carousel").slick('unslick');      
  }

  get_load_all();
  
  function load_data(id="",destination="",select_type="",checked=[],price_range="",location_ids=[],sort_star_rating="",sort_price="",getRecommend="",ztoanatoz=""){
    var formData = new FormData;
    formData.append('item_id',id);
    formData.append('destination',destination);
    formData.append('select_type',select_type);
    formData.append('star_rating',checked);
    formData.append('price_range',price_range);
    formData.append('city_id',location_ids);
    formData.append('get_recommend',getRecommend);
    formData.append('ztoanatoz',ztoanatoz);
    formData.append('sort_star_rating',sort_star_rating);
    formData.append('sort_price',sort_price);
    
    showLoder();
    $.ajax({
        url: base_url+'/hotels-filter',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
          if(result.status){
            destroyCarousel();
            $(".load_more_button").remove();
            
            $(".product-grid-view").html(result.data);
            $(".prodcut-list-view").html(result.listView);
            
            $(".tours_found").html("We’ve found <strong>"+result.countData +"</strong> hand picked holidays for you!");
            if (result.ifCityExist) {
              $(".cityWthCnt").html(result.cityWthCnt);            
              $(".cityWthCnt1").html(result.cityWthCnt1);  
              $(".link-collapse__default").text("Show all " +result.countCityList);
            }
            slickCarousel();
          }else{
            $(".product-grid-view").html('<div style="display:block; width:100%; text-align:center; color: red;background-color: #c5c5f745;padding: 9px;border-radius: 10px;">'+result.message+'</div>');
            $(".prodcut-list-view").html('<div style="display:block; width:100%; text-align:center; color: red;background-color: #c5c5f745;padding: 9px;border-radius: 10px;">'+result.message+'</div>');
            $(".tours_found").html("Sorry We’ve found No holidays for you!");
          }
          $(".location_header").text(result.viewFullLoc);
          hideLoder();
        }
    });
  }
  
  $(document).on('click', '#load_more_button', function(){
    var counter = $(this).data('counter');
    $('#load_more_button').html('<b>Loading...</b>');
    get_load_all(counter);
  });

  $('#destination').keyup(function(){
    if($(this).val().length >=0){
      $("input[name='location_ids[]']").prop('checked',false);
      get_load_all();
    }
  });

  $(document).change('#select_type',function(){
    get_load_all();
  });

  $("input[name='star_rating_filter[]']").change(function(){
    get_load_all();
  });

  $("#price_range").change(function(){
    get_load_all();
  });

  $(document).on("click","input[name='location_ids[]']",function(){
    get_load_all();
  });

  $(".getRecommend").on('click',function(){
    get_load_all();
  });

  $("#sort_star_rating").change(function(){
    get_load_all();
  });

  $("#sort_price").change(function(){
    get_load_all();
  });

  $("#ztoanatoz").change(function(){
    get_load_all();
  });

  function get_load_all(counter=""){
    var checked = [];
    var location_ids = [];
    if ($("input[name='recommended']").prop("checked")) {
      var getRecommend = true;
    }else{
      var getRecommend = false;
    }
    var ztoanatoz = $('#ztoanatoz').val();
    var sort_price = $("#sort_price").val();
    var sort_star_rating = $("#sort_star_rating").val();
    $("input[name='location_ids[]']:checked").each(function ()
    {
        location_ids.push(parseInt($(this).val()));
    });
    var price_range = $("#price_range").val();

    $("input[name='star_rating_filter[]']:checked").each(function ()
    {
        checked.push(parseInt($(this).val()));
    });
    var select_type = $("#select_type").val();
    var destination = $("#destination").val();
    
    load_data(counter,destination,select_type,checked,price_range,location_ids,sort_star_rating,sort_price,getRecommend,ztoanatoz);
  }

  /*=== Show And Hide Hotel badges ====*/
  
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