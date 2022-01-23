<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\FrontHelper;
use App\Location;
use App\Hotel;
use App\StaticPages;
use App\Contact;
use App\FollowOn;
use App\SliderInfo;
class HomeController extends Controller
{
	/*
	* Return to website home page
	* with @request
	*/
    public function index(Request $request)
    {
    	//GET LOCATION
        $getTrendData= [];
        $getFavData = [];
        $cntFav = 0;
        $cntTrend = 0;

        $streams = Location::get()->toArray();
        $getLocData = FrontHelper::buildtree($streams);
    	$getLoc = Hotel::with('hotel_det','location','ta_rating','ratingMaster')->orderBy('id','DESC')->where('status',true)->get();
    	foreach ($getLoc as $key => $value) {
    		$location = FrontHelper::getSingleHeararcyofCat($getLocData,$value->location_id);
    		$value->full_location = $location;
            if($value->hot_deal == true && $cntTrend<=7){
                $cntTrend++;
                $getTrendData[$key] = $value;    
            }
            if($value->fav == true && $cntFav<=3){
                $cntFav++;
                $getFavData[$key] = $value;    
            }
    	}
        $all_state = Location::whereNull('parent_category')->first();
        
        $all_state = Location::where('parent_category',$all_state->id)->limit(6)->get();
        $sliderInfo = SliderInfo::where('status',1)->orderBy('title','DESC')->get();
        return view('index',compact('all_state','getFavData','getTrendData','sliderInfo'));
    }


    /*
    * Return to website about us page
    * with @request
    */
    public function about()
    {
        $sliderInfo = SliderInfo::where('status',1)->orderBy('title','DESC')->get();
        return view('frontPages.static.about_us',compact('sliderInfo'));
    }


    /*
    * Return to website privacy us page
    * with @request
    */
    public function privacy()
    {
        $staticPage = StaticPages::where('type',2)->where('status',1)->get();
        return view('frontPages.static.privacy',compact('staticPage'));
    }


    /*
    * Return to website terms us page
    * with @request
    */
    public function terms()
    {
        $staticPage = StaticPages::where('type',1)->where('status',1)->get();
        return view('frontPages.static.terms',compact('staticPage'));
    }

    /*
    * Return to website with Search destinations
    * with @request
    */
    public function searchDestinaion(Request $request)
    {
        $loc = [];
        $data = $request->all();
        $destination = isset($data['data']) && !empty($data['data']) ? $data['data'] : false;
        if ($destination) {
            $loc = Location::where('name','LIKE','%'.$destination.'%')->get()->toArray();
        }
        if (!empty($loc)) 
        {
            $response['status'] = true;
            $response['message'] = "Data Get Successfully";
            $response['data']= $loc;
        }else{
            $response['status'] = false;
            $response['message'] = "No data found";
        }
        return response()->json($response);  

    }

    /*
    * Comming Soon Page
    */
    public function comingSoon()
    {
       return view('other.coming_soon');
    }
}
