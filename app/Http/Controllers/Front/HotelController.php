<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\FrontHelper;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\Location;
use App\Facility;
use App\Airports;
use App\RatingImages;
use Storage;
use Config;
class HotelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $getAllcityData = [];
        $getParent = Location::whereNull('parent_category')->pluck('id'); 
        $all_city = Location::whereNotNull('parent_category')->whereIn('parent_category',$getParent)->get()->toArray();
        foreach ($all_city as $key => $value) {
            $getLoc = Location::where('parent_category',$value['id'])->pluck('id');
            $value['countItem'] = Hotel::whereIn('location_id',$getLoc)->orWhere('location_id',$value['id'])->count();
            $getAllcityData[$key] = $value;
        }
        $all_city =  $getAllcityData;
        return view('frontPages.hotel.index',compact('all_city'));
    }

    /**
     * Display a single Hotel details resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singleDetail(Request $request,$id)
    {
        $getData = Hotel::with('hotel_det','location','ta_rating','ratingMaster')->where('slug',$id)->where('status',true)->first();
        $faci_id = isset($getData->hotel_det->facility) && $getData->hotel_det->facility!=null ? json_decode($getData->hotel_det->facility):[];
        $getFacility = Facility::whereIn('id',$faci_id)->get();
        $streams = Location::get()->toArray();
        $getLocData = FrontHelper::buildtree($streams);
        $location = FrontHelper::getSingleHeararcyofCat($getLocData,$getData->location_id);
        $locationWithArr = FrontHelper::getSingleHeararcyofCatWithArr($getLocData,$getData->location_id);
        $getData->full_location_with_arrow = $locationWithArr;
        $getData->full_location = $location;
        $getData->facility_data = $getFacility;
        $getFiveStar = RatingImages::select('id')->where('id',$getData->rating)->first();
        $related_item = Hotel::with('hotel_det','location','ta_rating','ratingMaster')->where('status',true)->where('location_id',$getData->location_id)->limit(8)/*->orWhere('rating',$getFiveStar->id)*/->get();
        foreach ($related_item as $key => $value) {
            $location = FrontHelper::getSingleHeararcyofCat($getLocData,$value->location_id);
            $value->full_location = $location;
            $related_item[$key] = $value;
        } 
    	return view('frontPages.hotel.single_hotel_det',compact('getData','related_item'));
    }

    /**
     * hotelFilter.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotelFilter(Request $request)
    {
        $input = $request->all();
        $output = '';
        $listView = '';
        $limit = 10;
        $counter = 1;
        $getLocName = '';
        $getCtyWthCnt = '';
        $getCtyWthCnt1 = '';
        $ifCityExist = false;

        $itemId = $input['item_id']  != null ? $input['item_id']:false;
        if ($itemId) {
            $counter = $counter+$itemId;
            $limit = $limit*$counter;
        }
        $check_destination = $input['destination']  != null ? $input['destination'] :false;

        $check_trip_type = $input['select_type']  != null ? $input['select_type'] :false;

        $check_star_rating = $input['star_rating']  != null ? $input['star_rating'] :false;

        $check_price_range = $input['price_range']  != null ? $input['price_range'] :false;
        
        $check_city = $input['city_id']  != null ? $input['city_id'] :false;

        $check_get_recommend = $input['get_recommend'] == "true" ? $input['get_recommend'] : false;

        $sort_star_rating = $input['sort_star_rating'] != null ? $input['sort_star_rating'] : false;

        $sort_price = $input['sort_price'] != null ? $input['sort_price'] : false;
        
        $check_ztoanatoz = $input['ztoanatoz'] != null ? $input['ztoanatoz'] : false;

        //GET LOCATION
        $streams = Location::get()->toArray();
        $getLocData = FrontHelper::buildtree($streams);
        //--END

        $getData = Hotel::with('hotel_det','location','ta_rating','ratingMaster')->where('status',true);
        
        if ($check_destination) {
            //GET ALL LOCATION ID 
            $getLocId = Location::where('name','like','%'.$check_destination.'%')->pluck('id');
            $locationId = FrontHelper::getAllChilCategoryId($getLocData,$getLocId);
            if (empty($locationId) && $getLocId) {
                $getSubLocData = $getData->whereIn('location_id',$getLocId);   
                $getData = $getSubLocData;
            }else{
                $getData = $getData->whereIn('location_id',$locationId);
            }
            /*======== GET ALL CITY WITH COUNTER AND NAME ===============*/
            $getDataForCity = Location::whereIn('parent_category',$getLocId)->get()->toArray();
            if (!empty($getDataForCity)) {
                $ifCityExist = true;
                foreach ($getDataForCity as $key => $value) {
                    $countCityList = $key+1;
                    $isSelected = '';
                    if ($check_city) {
                        $check_city1 = explode(",", $check_city);
                        $isSelected = in_array($value['id'], $check_city1) ? 'checked':'';
                    }
                    $getLoc = Location::where('parent_category',$value['id'])->pluck('id');
                    $countItem = Hotel::whereIn('location_id',$getLoc)->orWhere('location_id',$value['id'])->count();
                    if($key < 4){
                    $getCtyWthCnt.='<div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3"><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="brandamsterdam'.$key.'" name="location_ids[]" value="'.$value['id'].'" '.$isSelected.'> <label class="custom-control-label" for="brandamsterdam'.$key.'">'.$value['name'].'</label></div><span>'.$countItem.'</span></div>';
                    }
                    if($key >= 4){
                    $getCtyWthCnt1 .='<div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3"><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="gucci'.$key.'" name="location_ids[]" value="'.$value['id'].'" '.$isSelected.'> <label class="custom-control-label" for="gucci'.$key.'">'.$value['name'].'</label></div> <span>'.$countItem.'</span></div>';
                    }
                }
            }
            /*======= --END-- =========*/
        }
        if ($check_trip_type) {
            $getData = $getData->where('type',$check_trip_type);   
        }
        if ($check_star_rating) {
            $check_star_rating = explode(",", $check_star_rating);
            foreach ($check_star_rating as $value) {
                if ($value==5) {
                    $check_star_rating[4] = 4.5;
                }
                if ($value==4) {
                    $check_star_rating[5] = 3.5;
                }
                if ($value==3) {
                    $check_star_rating[6] = 2.5;
                }
            }
            $getStarRatingId = RatingImages::whereIn('rating',$check_star_rating)->pluck('id');
            $getData = $getData->whereIn('rating',$getStarRatingId);
        }
        if ($check_price_range) {
            $getRange = explode(";", $check_price_range);
            $getRange_min = $getRange[0]; 
            $getRange_max = $getRange[1];
            $getData = $getData->whereBetween('price',[$getRange_min,$getRange_max]);
            $input['price_range'] = $getRange;
        }
        if ($check_city) {
            $check_city = explode(",", $check_city);
            $getSubLoc = Location::select('id')->whereIn('parent_category',$check_city)->orWhereIn('id',$check_city)->get()->toArray();
            foreach($getSubLoc as $key => $value) {
                $getId[] = $value['id'];
            }
            $getData = $getData->whereIn('location_id',$getId);
        }
        if ($check_get_recommend==true) {
            $getData = $getData->where('hot_deal',1);
        }
        if ($sort_star_rating) {
            $check_star_rating = [];
            if ($sort_star_rating=='5') {
                $check_star_rating[0] = 5;
                $check_star_rating[1] = 4.5;
            }
            if ($sort_star_rating=='4') {
                $check_star_rating[0] = 4;
                $check_star_rating[1] = 3.5;
            }
            if ($sort_star_rating=='3') {
                $check_star_rating[0] = 3;
                $check_star_rating[1] = 2.5;
            }
            if ($sort_star_rating=='2') {
                $check_star_rating[0] = 2;
            }
            $getStarRatingId = RatingImages::whereIn('rating',$check_star_rating)->pluck('id');
            if (!empty($getStarRatingId)) {
                $getData = $getData->whereIn('rating',$getStarRatingId);
            }
        }
        if ($sort_price) {
            $getData = $getData->orderBy('price',$sort_price);
        }
        //A To Z Sorting 
        if ($check_ztoanatoz) {
            $getData = $getData->orderBy('name',$check_ztoanatoz);
        }
        //GET ALL IEM COUNTING
        $countAll = $getData->count();
        //COUNTING FOR SHOW AND HIDE LOAD MORE BUTTON
        $count = $getData->count();
        if ($count <= $limit) {
            $count = false;
        }elseif ($count == $limit) {
            $count = true;
        }else{
            $count = true;
        }
        //--END
        //FIND MINIMUM AND MAXIMUM PRICE
        $getMinimumPrice = $getData->min('price');
        $getMaxPrice = $getData->max('price');
        
        $getData =  $getData->limit($limit)->get();

        if (!$getData->isEmpty()) {
            foreach ($getData as $key => $value) {
                //GET FULL LOCATION
                $location = FrontHelper::getSingleHeararcyofCat($getLocData,$value['location_id']);
                if ($key==0) {
                    $getLocName = $location;
                }
                //---END
                //GET ALL AIRPORTS
                $getAirportId = json_decode($value->hotel_det->airport);
                if ($getAirportId!=null) {
                    $airport_data = Airports::whereIn('id',$getAirportId)->get();
                }else{
                    $airport_data = [];
                }
                //---END
                //LIST VIEW
                $images = !empty($value->hotel_det->images) || $value->hotel_det->images!=null ? json_decode($value->hotel_det->images) :[];
                $listView .='   
                <li class="card mb-5 overflow-hidden">
                    <div class="product-item__outer w-100">
                        <div class="row">
                            <div class="col-md-5 col-xl-4">
                                <div class="product-item__header">
                                    <div class="position-relative">
                                        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                                            data-slides-show="1"
                                            data-slides-scroll="1"
                                            data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v4 u-slick__arrow-classic--v4 u-slick__arrow-centered--y rounded-circle"
                                            data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left"
                                            data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right"
                                            data-pagi-classes="js-pagination text-center u-slick__pagination u-slick__pagination--white position-absolute right-0 bottom-0 left-0 mb-3 mb-0">
                                            ';
                                            if (!empty($images)) {
                                                foreach($images as $singleImage){
                                                    $listView .='
                                                    <div class="js-slide w-100">
                                                        <a href="'.route('front.hotel.single.detail',$value->slug).'" class="d-block w-100"><img class="img-fluid w-100" src="'.asset('uploads/thumbnail/250x220/'.$singleImage).'" alt="No Image Found"></a>
                                                    </div>';
                                                }
                                            }else{
                                                $listView .='
                                                    <div class="js-slide">
                                                        <a href="'.route('front.hotel.single.detail',$value->slug).'" class="d-block "><img class="img-fluid min-height-230" src="'.asset('img/no_image.png').'" alt="No Image Found"></a>
                                                    </div>
                                                ';
                                            }

                                        $listView .='
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-xl-5 flex-horizontal-center">
                                <div class="w-100 position-relative m-4 m-md-0">
                                    <div class="mb-2 pb-1">';
                                    if($value->hot_deal){
                                    $listView .= '
                                        <a class="badge badge-pill bg-badge text-black px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1">Recommended</a>';
                                    }
                                    /*if($value->saving){
                                    $listView .= '
                                        <a class="badge badge-pill bg-badge text-black px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1 ml-2">-£ '.$value->saving.' </a>';
                                    }*/
                                    if($value->type){
                                    $listView .= '
                                        <a class="badge badge-pill bg-badge text-black px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1 ml-2">'.Config::get('constant.hotel_type')[$value->type].'</a>';
                                    }
                                    $listView .= '
                                        
                                    </div>

                                    
                                    <a href="'.route('front.hotel.single.detail',$value->slug).'">
                                        <span class="font-weight-bold font-size-17 text-dark d-flex mb-1"><i class="icon flaticon-hotel font-size-20 mr-2"></i>'.$value->name.'</span>
                                    </a>';
                                    
                                    $listView .= '
                                    <div class="d-flex align-items-center">
                                        <i class="icon flaticon-clock-circular-outline mr-2 font-size-17"></i>
                                        <span class="text-primary ml-md-2 font-weight-bold font-size-14 d-block">'.$value->days.' Nights</span>
                                        <span class="text-yellow-lighter-2 ml-md-2 d-block">';
                                        if(isset($value->hotel_rating)){
                                            for($i=0; $i<round($value->hotel_rating); $i++){
                                                $listView .= '<small class="fas fa-star font-size-11"></small>';
                                            }
                                        }

                                        if(isset($value->hotel_rating)){
                                            for($i=0; $i<5-round($value->hotel_rating); $i++){
                                                $listView .= '<small class="white-star fas fa-star font-size-11"></small>';
                                            }
                                        }
                                        $listView .= '
                                        </span>
                                    </div>

                                    <div class="card-body p-0">
                                        <a href="'.route('front.hotel.single.detail',$value->slug).'" class="d-block">
                                            <div class="d-flex flex-wrap flex-xl-nowrap align-items-center font-size-14 text-gray-1">
                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i>
                                                '.$location.'
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-wrap flex-xl-nowrap align-items-center font-size-14 text-gray-1">';
                                            if(!empty($airport_data)){
                                            $listView .= '<i class="icon flaticon-airplane mr-2 font-size-20"></i>';
                                            foreach($airport_data as $airDat){
                                                $listView .= $airDat->airport_name.'&nbsp;&nbsp; <img src="'.asset('/img/ic_info.png').'" alt="info" data-toggle="tooltip" class="pointer" data-placement="top" title="Departure from - '.$airDat->airport_name.'"> <br>';
                                                }
                                            }
                                        $listView .= '
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-wrap flex-xl-nowrap align-items-center font-size-14 text-gray-1">
                                        <span class="text-secondary d-flex font-size-11 mt-1 align-items-center">';
                                        if(isset($value->ta_rating) && $value->ta_rating->image != null){
                                            $imgurl = asset('uploads/'.$value->ta_rating->image);
                                            $imgurl1 = asset('img/taowl.png');
                                            $listView .= '<img src="'.$imgurl1.'"> <img src="'.$imgurl.'" style="width: 90px;height: 19px;" class="mr-1 ml-1">(';
                                        }
                                        if(isset($value->ratingMaster)){  $listView .= number_format($value->ratingMaster->total_review); } $listView .=' Reviews) </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-xl-3 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                <div class="border-xl-left border-color-7">
                                    <div class="ml-md-4 ml-xl-0">
                                        <div class="text-center text-md-left text-xl-center d-flex flex-column mb-2 pb-1 ml-md-3 ml-xl-0">
                                            <div class="d-flex flex-column mb-2">
                                                <span class="font-weight-normal font-size-15 text-gray-1">

                                                ';
                                                /*if($value->days == 1){
                                                    $listView .= '<strong><h4 class="night-count-circle badge-orange">'.$value->days .'</strong></h4> Night';
                                                }
                                                else{
                                                    $listView .= '<strong><h4 class="night-count-circle badge-orange">'.$value->days .'</strong></h4> Nights';
                                                }*/
                                                 $listView .='
                                                </span>
                                            </div>
                                            <div class="mb-0">';
                                                $savin = $value->saving?$value->saving:0;
                                                $pric = $value->price?$value->price:0;
                                                $totalp = $pric+$savin;
                                                $perc = 0;
                                                if ($pric) {
                                                    $perc = number_format($savin/$pric*100);
                                                    $listView .='
                                                    <a class="badge text-white badge-pill bg-success">'.$perc.'% Off</a><br>
                                                    <span class="font-weight-bold font-size-22" style="text-decoration: line-through;">£'.$totalp.'</span><br>';
                                                }
                                                $listView .='
                                                <span class="mr-1 font-size-14 text-gray-1">From</span>';
                                                if($value->price >= 1){
                                                    $listView .= '
                                                    <span class="font-weight-bold font-size-22">£'.$value->price.'</span>';
                                                }else{
                                                    $listView .= '
                                                    <span class="text-danger font-size-12">Call to find</span>';
                                                }
                                            $listView .= '
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center justify-content-md-start justify-content-xl-center">
                                            <a href="'.route('front.hotel.single.detail',$value->slug).'" class="btn btn-outline-primary d-flex align-items-center justify-content-center font-weight-bold min-height-50 border-radius-3 border-width-2 px-2 px-5 py-2">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>';
                //--END LIST_VIEW

                $imgName = $value->image != null ? 'uploads/thumbnail/200x140/'.$value->image : 'img/no_image.png';
                //GRID VIEW 
                $output .='
                <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                    <div class="card mb-1 transition-3d-hover shadow-hover-2 tab-card h-100">
                        <div class="position-relative mb-2">
                            <a href="'.route('front.hotel.single.detail',$value->slug).'" class="d-block ">
                                <img class="min-height-230 bg-img-hero card-img-top" src="'.asset($imgName).'" alt="'.$value->name.'">
                            </a>
                            <div class="position-absolute top-0 left-0 pt-5 pl-2">';
                            if($value->hot_deal){
                            $output .= '
                                <span class="badge badge-pill bg-blue-1 text-white px-4 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1">Recommend</span>
                            ';
                            }

                            if($value->saving){
                            $output .= '
                                <span class="badge badge-pill bg-pink-1 text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1 ml-2">-£ '.$value->saving.' </span>';
                            }
                            if($value->type){
                            $output .= '
                                <span class="badge badge-pill bg-orange text-white px-3 py-1 font-size-14 font-weight-normal text-lh-1dot6 mb-1 ">'.Config::get('constant.hotel_type')[$value->type].'</span>';
                            }

                            $output .= 
                            '</div>
                            <div class="position-absolute bottom-0 left-0 right-0">
                                <div class="px-3 pb-2">
                                    <h2 class="h5 text-white mb-0 font-weight-bold"><small class="mr-2">From</small>£'.$value->price.'</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 py-2">
                            <a href="'.route('front.hotel.single.detail',$value->slug).'" class="d-block">
                                <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                    <i class="icon flaticon-pin-1 mr-2 font-size-15"></i> '.$location.'
                                </div>
                            </a>
                            <a href="'.route('front.hotel.single.detail',$value->slug).'" class="card-title font-size-17 font-weight-bold mb-0 text-dark"><i class="icon flaticon-hotel font-size-20 mr-2"></i>'.$value->name.'</a>
                            <div class="my-2">
                                <div class="d-inline-flex align-items-center font-size-17 text-lh-1 text-primary">
                                        <div class="green-lighter">';
                                            if(isset($value->hotel_rating)){
                                                for($i=0; $i<round($value->hotel_rating); $i++){
                                                    $output .= '<small class="fas fa-star"></small>';
                                                }
                                            }
                            $output .= '</div>
                                        <div class="white-star mr-2">';
                                            if(isset($value->hotel_rating)){
                                                for($i=0; $i<5-round($value->hotel_rating); $i++){
                                                    $output .= '<small class="fas fa-star"></small>';
                                                }
                                            }
                            $output .= '</div>
                                    
                                </div>
                            </div>
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">
                                <i class="icon flaticon-clock-circular-outline mr-2 font-size-17"></i><strong>'
                                . $value->days .'&nbsp;</strong> Night
                            </div>
                            <div class="mb-1 d-flex align-items-center font-size-12 text-gray-1 align-items-center">';
                                if(isset($value->ta_rating) && $value->ta_rating->image != null){
                                    $imgurl = asset('uploads/'.$value->ta_rating->image);
                                    $imgurl1 = asset('img/taowl.png');
                                    $output .= '<img src="'.$imgurl1.'"><img src="'.$imgurl.'" style="width: 90px;height: 19px;" class="mr-1 ml-1">(';
                                        if(isset($value->ratingMaster)){  $output .= number_format($value->ratingMaster->total_review); } $output .=' Reviews)';
                                }
                            $output .='
                            </div>
                            <div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">';
                                if (!empty($airport_data)) {
                                    $output .= '<i class="icon flaticon-airplane mr-2 font-size-20"></i>';
                                    foreach($airport_data as $airDat){
                                       $output .=  $airDat->airport_name;
                                    }
                                }
                        $output .= '
                            </div>
                        </div>
                    </div>
                </div>';
                

            }
        }
        if ($count) {

            $output .= '
            <div class="text-center m-auto load_more_button col-md-12 col-xl-12">
                <button type="button" data-counter="'.$counter.'" id="load_more_button" class="btn btn-primary p-2 transition-3d-hover" style="width: 160px;">Load more</button>
            </div>';
            $listView .= '
            <div class="text-center m-auto load_more_button col-md-12 col-xl-12">
                <button type="button" data-counter="'.$counter.'" id="load_more_button" class="btn btn-primary p-2 transition-3d-hover" style="width: 160px;">Load more</button>
            </div>';
        }
        if ($itemId > 0) {
            $isLoadMore = true;
        }

        if (!empty($output)) {
            $response['status'] = true;
            $response['message'] = "Data Get Successfully";
            $response['data']= $output;
            $response['isLoadMore']= $isLoadMore ?? false;
            $response['countData']=  $countAll ?? false;
            $response['listView']=  $listView ?? false;
            $response['viewFullLoc'] = $check_destination ? $getLocName : 'Destinations';
            $response['cityWthCnt'] = $getCtyWthCnt;
            $response['cityWthCnt1'] = $getCtyWthCnt1;
            $response['ifCityExist'] = $ifCityExist ? true:false;
            $response['countCityList'] = isset($countCityList) ? $countCityList : false;
            $response['getMinimumPrice'] = isset($getMinimumPrice) ? $getMinimumPrice : false;
            $response['getMaxPrice'] = isset($getMaxPrice) ? $getMaxPrice : false;
            
        }else{
            $noDataFound = "Sorry we've found no results";

            $response['status'] = false;
            $response['message'] = $noDataFound;
        }

        return response()->json($response);

    }
    public function slug()
    {
        $get = Hotel::get();
        foreach ($get as $value) {
            $slug = Str::slug($value->name,'-');
            Hotel::where('id',$value->id)->update(['slug'=>$slug]);
        }
        return true;
    }
}

