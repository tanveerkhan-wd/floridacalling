$(function() {  
  
  $.ajaxSetup({
	   	headers: {
	     	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   	}
	});

  	/*======== show input according Holiday type =========*/
  	$("input[name='holiday_type']").on("change",function () {
  		
      $("input[name='holiday_type']").prop('checked',false);
  		$(this).prop('checked',true);
  		if ($(this).val()==1) {
  			viewAccomodationOnly();
  		}else if($(this).val()==2){
        viewMultiCenterOnly();

  		}else if($(this).val()==3){
        hideHolidayTypeSelectBox();
        showWhereFlightVehicle()  			
  		}else if($(this).val()==4){
        viewCrusStayOnly();        
        showWhereCruseDesti();
      }else if($(this).val()==5){
        viewAccomodationOnly();
      }else{}

  	});

});//END FUNCTION


function viewAccomodationOnly() {
  hideHolidayTypeSelectBox();
  hideWhereStepInput();
  $(".accomodation-box").removeClass('hide_content');
}

function viewMultiCenterOnly() {
  hideHolidayTypeSelectBox();
  hideWhereStepInput();
  $(".destination-box").removeClass('hide_content');
}

function viewCrusStayOnly() {
  hideHolidayTypeSelectBox();
  hideWhereStepInput();
  $(".cruse_stay-box").removeClass('hide_content');
}

function showWhereFlightVehicle() {
  hideWhereStepInput();
  $(".vehicle-type").removeClass('hide_content');
}
function showWhereCruseDesti() {
  hideWhereStepInput();
  $(".cruse-destination").removeClass('hide_content');
}

function hideHolidayTypeSelectBox() {
  $(".destination-box").addClass('hide_content');
  $(".accomodation-box").addClass('hide_content');
  $(".cruse_stay-box").addClass('hide_content');
}

function hideWhereStepInput() {
  $(".vehicle-type").addClass('hide_content');
  $(".cruse-destination").addClass('hide_content');
}






/*================================*/
/* SERACH LOCATION FROM Query Page */
/*================================*/
$(function() {
  $.ajaxSetup({
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
  });
  $(document).on('click','.setLocData',function(){
    $(".book-desti-search").css('display','none');
    var address = $(this).text();
    var addressId = $(this).data("id");
    $(".destin_name").text(' in '+address);
    $("input[name='location_id']").val(addressId);
    $(".book-desti-search-address").val(address);
  });
  
  $(document).on('keyup','.book-desti-search-address',function(){
    var data = $(this).val();
    if (data.length >= 1) {
      showLoder();
      $.ajax({
          url: base_url+'/qf/search/destination',
          type: 'POST',
          dataType:'json',
          cache: false,              
          data: {'data':data},
          success: function(result)
          {

            $(".book-desti-search").css('display','none');
            $(".book-desti-search").html('');
              if(result.status){
                var suggest = '';
                $.each(result.data,function(key , val){
                  var loc = '';
                  loc= val.name;
                  locid= val.id;
                  suggest+= '<li class="list-group-item setLocData" data-id="'+locid+'">'+loc+'</li>';
                });
                $(".book-desti-search").css('display','block');
                $(".book-desti-search").html(suggest);
              }
              hideLoder();
          },
          error: function(result) {
            hideLoder();            
          }
      });
    }
  });
});


/*================================*/
/* Query form hide unhide process */
/*================================*/
$(function() {
  
  $('.step-btn').on("click",function () {
    if(formValidation()){
      /*SET MULTICITY WHREN HOLIDAY TYPE SELECT MULTICITY*/
      var step = parseInt($(this).data('step'));
      var holiday_type =  parseInt($("input[name='holiday_type']:checked").val());
      if (step==1 && holiday_type==2) {
        var number_stops = parseInt($("select[name='number_stops']").val());
        generateNumberOfStops(number_stops);
      }
      /*END*/
      showAnHideQueryFormNext(step);
    }
  });

  $('.prev-step-btn').on("click",function () {
    var step = parseInt($(this).data('step'));
    if (step==2) {
      prevMultiCenter();
    }
    showAnHideQueryFormPrev(step);
  });

});

/*ONCLICK PREVIOUS BUTTON SHOW AND HIDE PREVIOS STEP*/
function showAnHideQueryFormNext(step) {
    for (var i = 1; i <= 5; i++) {
      var nextStep = 10;
      if (i==step) {
        nextStep = i+1;
        $(".step-"+i).addClass('hide_content');
        $(".step-"+nextStep).removeClass('hide_content');
      }
    }
}

/*ONCLICK PREVIOUS BUTTON SHOW AND HIDE PREVIOS STEP*/
function showAnHideQueryFormPrev(step) {
    for (var i = 5; i >= 1; i--) {
      var prevStep = 10;
      if (i==step) {
        prevStep = i-1;
        $(".step-"+i).addClass('hide_content');
        $(".step-"+prevStep).removeClass('hide_content');
      }
    }
}

/*GENERATE NUMBER OF STOPS*/
function generateNumberOfStops(number_stops) {
  $(".next-destination-btn").data("number",number_stops);
  $(".next-destination-btn").data("activenumber",1);
  $(".where-box .search-destination-box").addClass('hide_content');
  $(".where-box .length-stay-box").addClass('hide_content');
  $(".fd-1").removeClass('hide_content');
  $(".where-box-btn").addClass('hide_content');
  $(".next-destination-btn").parent().parent().removeClass('hide_content');
}

function unselectMultiCenter() {
  $(".next-destination-btn").data('activenumber','');
  $(".wheer-destination-lable").text('Select Your 1st Destination.');
  $(".where-box").html('');
  $(".fd-1").addClass('hide_content');
  $("select[name='number_stops']").val('');
  $(".where-box-btn").removeClass('hide_content');
  $(".next-destination-btn").parent().parent().addClass('hide_content');
  $( ".search-destination-box" ).removeClass('hide_content');
  $( ".length-stay-box" ).removeClass('hide_content');
}

function prevMultiCenter() {
  $(".next-destination-btn").data('activenumber','');
  $(".wheer-destination-lable").text('Select Your 1st Destination.');
  $(".where-box-btn").removeClass('hide_content');
  $(".next-destination-btn").parent().parent().addClass('hide_content');
  $( ".search-destination-box" ).removeClass('hide_content');
  $( ".length-stay-box" ).removeClass('hide_content');
}

$(document).on("click",".next-destination-btn",function () {
  var numberOfStop = parseInt($(this).data('number'));
  var activenumber = parseInt($(this).data('activenumber'))+1;
  if (numberOfStop>=activenumber) {
    $(this).data('activenumber',activenumber);
    $(".wheer-destination-lable").text('Select Your '+activenumber+' Destination.')
    
    $( ".search-destination-box" ).addClass('hide_content');
    $( ".length-stay-box" ).addClass('hide_content');

    $( ".search-destination-box:last" ).clone().appendTo(".where-box");
    $( ".search-destination-box:last" ).closest("select").val("");
    $( ".length-stay-box:last" ).clone().appendTo(".where-box");
    $( ".length-stay-box:last" ).closest("select").val("");

    $( ".search-destination-box:last" ).removeClass('hide_content');
    $( ".length-stay-box:last" ).removeClass('hide_content');
  }
  if (numberOfStop==activenumber) {
    $(".next-destination-btn").parent().parent().addClass('hide_content');
    $(".where-box-btn").removeClass('hide_content');
  }

});

function formValidation() {
    var ret = true;
    var holiday_type = $("input[name=holiday_type]:checked").val();
    if (holiday_type==undefined) {
      ret = false;
      $("#holiday-type-error").css('display','block');
    }else{
      $("#holiday-type-error").css('display','none');
      ret = true;
    }

    if (holiday_type==1) {
      
      var acc_type = $("select[name=accommodation_type]").val();
      if (acc_type=='' || acc_type==undefined) {
        $("#acc-type-error").css('display','block');
        ret = false;
      }else{
        $("#acc-type-error").css('display','none');
        ret = true;
      }

    }else if(holiday_type==2){
      
      var number_stops = $("select[name=number_stops]").val();
      if (number_stops=='' || number_stops==undefined) {
        $("#number-stops-error").css('display','block');
        ret = false;
      }else{
        $("#number-stops-error").css('display','none');
        ret = true;
      }

    }else if(holiday_type==3){
      
    }else if(holiday_type==4){
      
    }else if(holiday_type==5){
      
    }

    if (ret==true) {
      return ret;
    }
}
