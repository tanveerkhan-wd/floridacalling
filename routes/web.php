<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
	
Route::get('/clear', function() {
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   return "Cleared!";
});


Route::get('/migrate', function() {
   Artisan::call('migrate');
   /*Artisan::call('migrate:refresh --path=/database/migrations/2021_07_05_191031_create_testimonials_table.php');*/
   return "Migrated!";
});

Auth::routes();
/*============FRONT ROUTES============*/
Route::group(['namespace'=>'Front'],function(){
	
	Route::get('/slug','HotelController@slug');

	/*============HOME PAGE AND HOTELS ROUTES============*/
	Route::get('/','HomeController@index');
	Route::get('hotel-listing','HotelController@index')->name('front.hotel.listing');	
	Route::get('hotel-details/{id}','HotelController@singleDetail')->name('front.hotel.single.detail');
	Route::post('hotels-filter','HotelController@hotelFilter');	
	
	/*============STATIC PAGE ROUTES============*/
	Route::get('about_us','HomeController@about')->name('front.about_us');	
	Route::get('terms_condition','HomeController@terms')->name('front.terms');	
	Route::get('privacy_policy','HomeController@privacy')->name('front.privacy');

	/*============Home page Search ROUTES============*/
	Route::post('/search/destination','HomeController@searchDestinaion');	
	
	/*============ Query Forms  ============*/
	Route::get('/query-form','BookingController@queryForm');	
	Route::post('/query-form','BookingController@queryFormPost');	
	Route::post('/qf/search/destination','BookingController@searchDestinaion');	
	
	/*CONATCT US*/
	Route::get('/contact-us','BookingController@conatctUs');		
	Route::post('/contact-us','BookingController@conatctUsPost');		
	Route::post('/testimonial/add','BookingController@tetimonialAdd');		
	Route::post('/suggestion/add','BookingController@suggestionAdd');		
	/*END*/

	/*Coming Soon Page*/
	Route::get('/coming-soon','HomeController@comingSoon');		


});	
/*============ADMIN ROUTES============*/
Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
	Route::get('/', 'HomeController@index')->name('admin.home');
	/*MANAGE PASSWORD ROUTE*/
	Route::get('/manage-password', 'HomeController@managePassword')->name('admin.manage-password');
	Route::post('/password/update/{user}', 'HomeController@PasswordUpdate')->name('admin.passwordUpdate');
	/*CONTACT US ROUTE*/
	Route::get('/contact-info', 'ContactController@index')->name('admin.contactus');
	Route::post('/contact-us/update/{contact}', 'ContactController@update')->name('admin.contactUpdate');
	
	/*ADD LOCATION ROUTE*/
	Route::get('/location', 'LocationController@index')->name('admin.location');
	Route::get('/location/create', 'LocationController@create')->name('admin.create.location');
	Route::post('/location/create', 'LocationController@store');
	Route::get('/location/edit/{location}', 'LocationController@edit')->name('admin.location.edit');
	Route::post('/location/edit/{location}', 'LocationController@update');
	Route::get('/location/status/{location}', 'LocationController@status')->name('admin.location.status');
	Route::get('/location/destroy/{location}', 'LocationController@destroy')->name('admin.location.destroy');
	
	/*ADD SUB LOCATION*/
	Route::get('/location/sub', 'LocationController@subLovcationIndex')->name('admin.subLocation');
	Route::get('/location/sub/create', 'LocationController@subLovcationCreate')->name('admin.subLocation.create');
	Route::post('/location/sub/create', 'LocationController@subLovcationStore');
	Route::get('/location/sub/status/{subLoc}', 'LocationController@subLovcStatus')->name('admin.sublocation.status');
	Route::get('/location/sub/destroy/{subLoc}', 'LocationController@subLovcdestroy')->name('admin.sublocation.destroy');

	/*HOTELS*/
	Route::get('/hotels', 'HotelController@index')->name('admin.hotels');
	Route::get('/hotels/create', 'HotelController@create')->name('admin.hotel.create');	
	Route::post('/hotels/create', 'HotelController@store');	
	Route::get('/hotels/edit/{hotel}', 'HotelController@edit')->name('admin.hotel.edit');	
	Route::post('/hotels/edit/{hotel}', 'HotelController@update');	
	Route::get('/hotels/destroy/{hotel}', 'HotelController@destroy')->name('admin.hotel.destroy');	
	Route::get('/hotels/status/{hotel}', 'HotelController@status')->name('admin.hotel.status');	
	Route::get('/hotels/hot-deals/{hotel}', 'HotelController@hotDeals')->name('admin.hotel.hotDeals');	
	Route::get('/hotels/fav/{hotel}', 'HotelController@fav')->name('admin.hotel.fav');
	Route::post('/hotels/Singleimage', 'HotelController@singleImageDestroy')->name('singleImageDestroy');
	Route::post('/hotels/getSubLocation', 'HotelController@getSubLocation');
	Route::post('/hotels/search/data', 'HotelController@searchData');
	
	/* Hotel CSV File */
	Route::get('/hotels/upload/csv', 'HotelController@csvFile')->name('admin.hotel.csv');
	Route::post('/hotels/upload/csv', 'HotelController@postCsvFile');

	/* GET QUOTE */
	Route::get('/quote', 'QuoteController@index')->name('admin.quote');
	Route::get('/quote/destroy/{quote}', 'QuoteController@destroy')->name('admin.quote.destroy');
	Route::get('/quote/status/{quote}', 'QuoteController@status')->name('admin.quote.status');
	Route::get('/quote/view/{quote}', 'QuoteController@show')->name('admin.quote.viewAllData');
	
	/*CALL BACK*/
	Route::get('/call-back','ContactController@callBack')->name('admin.callBack');
	Route::get('/call-back/status/{callback}','ContactController@callBackStatus')->name('admin.callback.status');
	Route::get('/call-back/destroy/{callback}','ContactController@callBackDestroy')->name('admin.callback.destroy');
	
	/*FOLLOW ON*/
	Route::get('/follow-on','ContactController@followOn')->name('admin.follow-on');
	Route::post('/follow-on/update/{followOn}','ContactController@followOnUpdate')->name('admin.follow-on.update');
	
	/*SLIDER*/
	Route::get('/slider','SliderController@index')->name('admin.slider');
	Route::get('/slider/create','SliderController@create')->name('admin.slider.create');
	Route::post('/slider/create','SliderController@store');
	Route::get('/slider/edit/{slider}','SliderController@edit')->name('admin.slider.edit');
	Route::post('/slider/update/{slider}','SliderController@update')->name('admin.slider.update');
	Route::get('/slider/destroy/{slider}','SliderController@destroy')->name('admin.slider.destroy');
	Route::get('/slider/status/{slider}','SliderController@status')->name('admin.slider.status');
	
	/*FACIITY*/
	Route::get('/facility','FacilityController@index')->name('admin.facility');
	Route::get('/facility/create','FacilityController@create')->name('admin.facility.create');
	Route::post('/facility/create','FacilityController@store');
	Route::get('/facility/edit/{facility}','FacilityController@edit')->name('admin.facility.edit');
	Route::post('/facility/edit/{facility}','FacilityController@update');
	Route::get('/facility/destroy/{facility}','FacilityController@destroy')->name('admin.facility.destroy');
	Route::get('/facility/status/{facility}','FacilityController@status')->name('admin.facility.status');
	Route::get('/facility/create/csv','FacilityController@createWithCsv')->name('admin.facility.createWithCsv');
	Route::post('/facility/create/csv','FacilityController@storeWithCsv');
	
	
	/*FREE DISNEY DINING*/
	Route::get('/free-disney-dining','StaticContentController@freeDisneyDining')->name('admin.freeDisneyDining');
	Route::get('/free-disney-dining/edit/{freeddc}','StaticContentController@freeDisneyDiningEdit')->name('admin.freeDisneyDining.edit');
	Route::post('/free-disney-dining/edit/{freeddc}','StaticContentController@freeDisneyDiningUpdate');
	Route::get('/free-disney-dining/status/{freeddc}','StaticContentController@freeDisneyDiningStatus')->name('admin.freeDisneyDining.status');
	
	/*DISNEY RESORT*/
	Route::get('/disney-resort','DisneyResortController@index')->name('admin.disneyResort');
	Route::get('/disney-resort/create','DisneyResortController@create')->name('admin.disneyResort.create');
	Route::post('/disney-resort/create','DisneyResortController@store');
	Route::get('/disney-resort/edit/{disneyResort}','DisneyResortController@edit')->name('admin.disneyResort.edit');
	Route::post('/disney-resort/edit/{disneyResort}','DisneyResortController@update');
	Route::get('/disney-resort/destroy/{disneyResort}','DisneyResortController@destroy')->name('admin.disneyResort.destroy');
	Route::get('/disney-resort/status/{disneyResort}','DisneyResortController@status')->name('admin.disneyResort.status');
	
	/*BOOKING ADD*/
	Route::get('/book-ad','BookingAddController@edit')->name('admin.bookingAdd');
	Route::post('/book-ad/{book}','BookingAddController@update')->name('admin.bookingAdd.update');
	
	/*SLIDER INFO*/
	Route::get('/slider-info','SliderInfoController@index')->name('admin.sliderinfo');
	Route::get('/slider-info/create','SliderInfoController@create')->name('admin.sliderinfo.create');
	Route::post('/slider-info/create','SliderInfoController@store');
	Route::get('/slider-info/edit/{slider}','SliderInfoController@edit')->name('admin.sliderinfo.edit');
	Route::post('/slider-info/edit/{slider}','SliderInfoController@update');
	Route::get('/slider-info/destroy/{slider}','SliderInfoController@destroy')->name('admin.sliderinfo.destroy');
	Route::get('/slider-info/status/{slider}','SliderInfoController@status')->name('admin.sliderinfo.status');
	
	/*EXPLORE FLORIDA*/
	Route::get('/explore-florida','HotelController@exploreFlorida')->name('admin.exploreFlorida');
	Route::get('/explore-florida/create','HotelController@exploreFloridaCreate')->name('admin.exploreFlorida.create');
	Route::post('/explore-florida/create','HotelController@exploreFloridaStore');
	Route::get('/explore-florida/edit/{id}','HotelController@exploreFloridaEdit')->name('admin.exploreFlorida.edit');
	Route::post('/explore-florida/edit/{id}','HotelController@exploreFloridaUpdate');
	Route::get('/explore-florida/status/{id}','HotelController@exploreFloridaStatus')->name('admin.exploreFlorida.status');
	Route::get('/explore-florida/destroy/{explor}','HotelController@exploreFloridaDestroy')->name('admin.exploreFlorida.destroy');
	
	/*WHERE TO STAY */
	Route::get('/where-to-stay','HotelController@whereToStay')->name('admin.whereToStay');
	Route::get('/where-to-stay/create','HotelController@whereToStayCreate')->name('admin.whereToStay.create');
	Route::post('/where-to-stay/create','HotelController@whereToStayStore');
	Route::get('/where-to-stay/edit/{whereTo}','HotelController@whereToStayEdit')->name('admin.whereToStay.edit');
	Route::post('/where-to-stay/edit/{whereTo}','HotelController@whereToStayUpdate');
	Route::get('/where-to-stay/status/{whereToStay}','HotelController@whereToStayStatus')->name('admin.whereToStay.status');
	Route::get('/where-to-stay/destroy/{whereToStay}','HotelController@whereToStayDestroy')->name('admin.whereToStay.destroy');
	
	/*Parks And Passes*/
	Route::get('/parks-passes','ParkTicketController@index')->name('admin.parksPasses');
	Route::get('/parks-passes/create','ParkTicketController@create')->name('admin.parksPasses.create');
	Route::post('/parks-passes/create','ParkTicketController@store');
	Route::get('/parks-passes/edit/{passes}','ParkTicketController@edit')->name('admin.parksPasses.edit');
	Route::post('/parks-passes/edit/{passes}','ParkTicketController@update');
	Route::get('/parks-passes/status/{passes}','ParkTicketController@status')->name('admin.parksPasses.status');
	Route::get('/parks-passes/destroy/{passes}','ParkTicketController@destroy')->name('admin.parksPasses.destroy');
	
	/*STATIC PAGES*/
	Route::get('static-pages','StaticPagesController@index')->name('admin.staticPages');
	Route::get('static-pages/create','StaticPagesController@create')->name('admin.staticPages.create');
	Route::post('static-pages/create','StaticPagesController@store');
	Route::get('static-pages/edit/{page}','StaticPagesController@edit')->name('admin.staticPages.edit');
	Route::post('static-pages/edit/{page}','StaticPagesController@update');
	Route::get('static-pages/destroy/{page}','StaticPagesController@destroy')->name('admin.staticPages.destroy');
	Route::get('static-pages/status/{page}','StaticPagesController@status')->name('admin.staticPages.status');

	/*Mix It Up*/
	Route::get('mix-it-up','MixItUpController@index')->name('admin.mixItUp');
	Route::get('mix-it-up/create','MixItUpController@create')->name('admin.mixItUp.create');
	Route::post('mix-it-up/create','MixItUpController@store');
	Route::get('mix-it-up/edit/{mixItUp}','MixItUpController@edit')->name('admin.mixItUp.edit');
	Route::post('mix-it-up/edit/{mixItUp}','MixItUpController@update');
	Route::get('mix-it-up/destroy/{mixItUp}','MixItUpController@destroy')->name('admin.mixItUp.destroy');
	Route::get('mix-it-up/status/{mixItUp}','MixItUpController@status')->name('admin.mixItUp.status');

	/**__ OFFERS __**/
	Route::get('offers','OfferController@index')->name('admin.offer');
	Route::get('offers/create','OfferController@create')->name('admin.offer.create');
	Route::post('offers/create','OfferController@store');
	Route::get('offers/edit/{offer}','OfferController@edit')->name('admin.offer.edit');
	Route::post('offers/edit/{offer}','OfferController@update');
	Route::get('offers/destroy/{offer}','OfferController@destroy')->name('admin.offer.destroy');
	Route::get('offers/status/{offer}','OfferController@status')->name('admin.offer.status');

	/**__ Admin Boarding __**/
	Route::get('boarding','BoardingMealController@index')->name('admin.boarding');
	Route::get('boarding/create','BoardingMealController@create')->name('admin.boarding.create');
	Route::post('boarding/create','BoardingMealController@store');
	Route::get('boarding/edit/{id}','BoardingMealController@edit')->name('admin.boarding.edit');
	Route::post('boarding/edit/{id}','BoardingMealController@update');
	Route::get('boarding/status/{id}','BoardingMealController@status')->name('admin.boarding.status');
	Route::get('boarding/destroy/{id}','BoardingMealController@destroy')->name('admin.boarding.destroy');

	/**__ Admin Airports __**/
	Route::get('airports','AirportsController@index')->name('admin.airports');
	Route::get('airport/create','AirportsController@create')->name('admin.airport.create');
	Route::post('airport/create','AirportsController@store');
	Route::get('airport/edit/{id}','AirportsController@edit')->name('admin.airport.edit');
	Route::post('airport/edit/{id}','AirportsController@update');
	Route::get('airport/status/{id}','AirportsController@status')->name('admin.airport.status');
	Route::get('airport/destroy/{id}','AirportsController@destroy')->name('admin.airport.destroy');

	/**__ Admin Airlines __**/
	Route::get('airlines','AirlineController@index')->name('admin.airlines');
	Route::get('airline/create','AirlineController@create')->name('admin.airline.create');
	Route::post('airline/create','AirlineController@store');
	Route::get('airline/edit/{id}','AirlineController@edit')->name('admin.airline.edit');
	Route::post('airline/edit/{id}','AirlineController@update');
	Route::get('airline/status/{id}','AirlineController@status')->name('admin.airline.status');
	Route::get('airline/destroy/{id}','AirlineController@destroy')->name('admin.airline.destroy');

	/**__ trip-adviser rating Image master __**/
	Route::get('rating_images','RatingImagesController@index')->name('admin.ratingImages');
	Route::get('rating_image/create','RatingImagesController@create')->name('admin.ratingImage.create');
	Route::post('rating_image/create','RatingImagesController@store');
	Route::get('rating_image/edit/{id}','RatingImagesController@edit')->name('admin.ratingImage.edit');
	Route::post('rating_image/edit/{id}','RatingImagesController@update');
	Route::get('rating_image/status/{id}','RatingImagesController@status')->name('admin.ratingImage.status');
	Route::get('rating_image/destroy/{id}','RatingImagesController@destroy')->name('admin.ratingImage.destroy');

	/**__ Testimonial master __**/
	Route::get('testimonials','Admin\TestimonialController@index');
	Route::get('testimonial/add','Admin\TestimonialController@add');
	Route::post('testimonial/add','Admin\TestimonialController@addPost');
	Route::get('testimonial/edit/{id}','Admin\TestimonialController@edit');
	Route::post('testimonial/edit/{id}','Admin\TestimonialController@editPost');
	Route::get('testimonial/status/{id}','Admin\TestimonialController@status');
	Route::get('testimonial/destroy/{id}','Admin\TestimonialController@destroy');

	/**__ Suggestion master __**/
	Route::get('suggestions','Admin\SuggestionController@index');
	Route::get('suggestion/status/{id}','Admin\SuggestionController@status');
	Route::get('suggestion/destroy/{id}','Admin\SuggestionController@destroy');
	
});
