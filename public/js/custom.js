$( document ).ready(function() {
    
  $.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

  //AIRPORT
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.airportMaster').select2({
      ajax: { 
        url: base_url+'/admin/hotels/search/data',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term, // search term
            type: 'airport'  // search term
          };
        },
        processResults: function (response) {
          return {
            results:  $.map(response.data, function (item) {
                    return {
                        text: item.airport_code,
                        id: item.id
                    }
                })
          };
        },
        cache: true
      }
  });

  //AIRLINES
  $('.airlineMaster').select2({
      ajax: { 
        url: base_url+'/admin/hotels/search/data',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term, // search term
            type: 'airline'  // search term
          };
        },
        processResults: function (response) {
          return {
            results:  $.map(response.data, function (item) {
                    return {
                        text: item.airline_name,
                        id: item.id
                    }
                })
          };
        },
        cache: true
      }
  });


  //Remove Image
  $( ".delete-image" ).click(function() {
    $(this).parent().parent().remove();
    var media_id = $(this).attr('media-id');
    var media_image = $(this).attr('media-image');
    var formData = new FormData;
    formData.append('media_id',media_id);
    formData.append('media_image',media_image);
    $.ajax({
        url: base_url+'/admin/hotels/Singleimage',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
             $("#image-msg").removeClass('hide'); 
            }
        },
        error: function(data)
        {
            
        }
      });
  });

});
