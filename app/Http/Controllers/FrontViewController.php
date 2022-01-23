<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\HotelDet;
use App\SubLocation;
use App\Location;
use App\Slider;
use App\SliderInfo;
use App\BookingAdd;
use App\FreeDisneyDiningContent;
use App\FreeDisneyDiningTital;
use App\ExploreFlorida;
use App\Contact;
use App\Quote;
use App\Callback;
use App\ParkTicket;
use App\whereToStay;
use App\DisneyResort;
use App\StaticPages;
use App\MixItUp;
use Storage;
use App\Offer;
use Illuminate\Http\Request;

class FrontViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$whereToLoc = Location::where('base_name','like','%florida%')->where('status',1)->get();
        $whereTOStay = whereToStay::orderBy('id','DESC')->where('status',1)->limit(6)->get();
        $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->limit(6)->get(); 
        $exploreFlorida = ExploreFlorida::orderBy('id','DESC')->where('status',1)->limit(6)->get();
        $favStay = Hotel::where('status',1)->orderBy('id','DESC')->where('fav',1)->limit(6)->get();
        $SliderInfo = SliderInfo::where('status',1)->where('type',1)->limit(6)->get();
        $loveFlorida = SliderInfo::where('status',1)->where('type',2)->limit(6)->get();
        $bookingAdd = BookingAdd::where('status',1)->first();
        $fddContent = FreeDisneyDiningContent::where('status',1)->limit(3)->get();
        $fddTitle = FreeDisneyDiningTital::where('status',1)->first();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();*/
        return view('index');
    }
    

    /*================================================*/
    /*==============PARKS AND TICKETS================*/
    /*================================================*/
    public function parksTickets($name)
    {
        if ($name=="disney") {
            $parkTicket = ParkTicket::where('location','disney')->orderBy('id','DESC')->where('status',1)->paginate(4);
            return view('pages.hotels.parks_passes',compact('parkTicket'));
        }
        if ($name=="universal") {
            $parkTicket = ParkTicket::where('location','universal')->orderBy('id','DESC')->where('status',1)->paginate(4);
            return view('pages.hotels.parks_passes',compact('parkTicket'));
        }
    }

    /*CONTACT US REF*/
    public function contactUsRef($ref,$name)
    {
        $loveFlorida = SliderInfo::where('status',1)->where('type',2)->get();
        $allDisneyResort = DisneyResort::select('id','title')->where('status',1)->get();
        $allLocdestination = Location::select('id','name')->where('status',1)->get();
        $allSubLocdestination = SubLocation::select('id','name')->where('status',1)->get();
        $contactInfo = Contact::where('status',1)->first();
        return view('pages.contact-form',compact('ref','name','contactInfo','allSubLocdestination','allLocdestination','allDisneyResort','loveFlorida'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    /*SHOW ALL HOHTELS*/
    public function showAllHotels(Request $request)
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
        $showAllHotels = Hotel::where('status',1)->where('type',1)->orderBy('id','DESC')->paginate(9);
        return view('pages.hotels.hotels',compact('showAllHotels','hotDeals','location'));
    }

    /*SHOW ALL VILLAS*/
    public function showAllVillas()
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
        $showAllVillas = Hotel::where('status',1)->where('type',2)->orderBy('id','DESC')->paginate(9);
        return view('pages.hotels.villas',compact('showAllVillas','hotDeals','location'));
    }
    
    /*SHOW ALL HOTELDETAL*/
    public function showAllHotDeal()
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->paginate(9);
        return view('pages.hotels.hotdeal',compact('hotDeals','location'));
    }
    
    /*SHOW ALL EXPLORE FLORDA*/
    public function showAllExploreFlorida()
    {
        $whereToLoc = Location::where('base_name','like','%florida%')->where('status',1)->get();
        $whereTOStay = whereTOStay::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.hotels.explore_florida',compact('whereTOStay','whereToLoc'));
    }
    
    /*SHOW ALL PARKS AND TICKET*/
    public function showAllParksTicket()
    {
        $parkTicket = ParkTicket::orderBy('id','DESC')->where('status',1)->paginate(4);
        return view('pages.hotels.parks_passes',compact('parkTicket'));
    }

    /*SHOW ALL DISNEY*/
    public function showAllDisneyHolidays()
    {
        $disney = DisneyResort::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.hotels.disney',compact('disney'));
    }

    /*SHOW ALL UNIVERSAL*/
    public function showAllUniversalHoliday()
    {
        $universal = Hotel::orderBy('id','DESC')->where('status',1)->where('type',4)->paginate(6);
        return view('pages.hotels.universal',compact('universal'));
    }

    /*SHOW ALL USA */
    public function viewAllUsa($name ,Location $id)
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        $usa = Hotel::orderBy('id','DESC')->where('status',1)->where('location_id',$id->id)->get();
        return view('pages.hotels.restUsa',compact('usa','id','name','location'));
    }

    /*SHOW ALL HOTLES DEATLS*/
    public function moreDetails(Hotel $hotel)
    {
        if(!empty($hotel->sublocation)){
            $allLocationData = Hotel::where('sublocation',$hotel->sublocation)->where('status',1)->get();
        }
        else{
            $allLocationData = Hotel::where('location_id',$hotel->location_id)->where('status',1)->get();
        }
        return view('pages.hotels.moreDetails',compact('hotel','allLocationData'));
    }

    /*SHOW FLORIDA*/
    public function viewSubFloridaDeta($locname, $name, SubLocation $id)
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        $usa = Hotel::orderBy('id','DESC')->where('status',1)->where('sublocation',$id->id)->get();
        return view('pages.hotels.restUsa',compact('usa','id','locname','name','location'));
    }

    /*SHOW DISNEY HOTLS*/
    public function disneyHolidaysHotels($name, $id)
    {
        $disneyHotel = Hotel::orderBy('id','DESC')->where('status',1)->where('disney_resort_id',$id)->where('type',3)->paginate(9);
        return view('pages.hotels.disneyResortHotel',compact('disneyHotel','id','name'));
    }

    /*VIEW ALL TYPE HOTLS IN PARTICULAR LOCATION*/
    public function viewAllTypeHotels($name, $id)
    {
        $name = preg_replace("/[^a-zA-Z0-9\s]/", " ", $name);
        $sublocation = SubLocation::where('id',$id)->where('name','like',$name)->first();
        if (!empty($sublocation)) {
            $allTypeHotels = Hotel::orderBy('id','DESC')->where('status',1)->where('sublocation',$id)->paginate(6);
        }else{
            $allTypeHotels = Hotel::orderBy('id','DESC')->where('status',1)->where('location_id',$id)->paginate(6);
        }
        return view('pages.hotels.all-type-hotels',compact('name','allTypeHotels','id'));
    }

    /*VIEW LOCATION RELTED ALL TYPE OF HOT DEALS */
    public function viewAllTypeHotDeal($name, $id)
    {
        $name = preg_replace("/[^a-zA-Z0-9\s]/", " ", $name);
        $sublocation = SubLocation::where('id',$id)->where('name','like',$name)->first();
        if (!empty($sublocation)) {
            $allTypeHotels = Hotel::where('hot_deal',1)->orderBy('id','DESC')->where('status',1)->where('sublocation',$id)->paginate(6);
        }else{
            $allTypeHotels = Hotel::where('hot_deal',1)->orderBy('id','DESC')->where('status',1)->where('location_id',$id)->paginate(6);
        }
        return view('pages.hotels.all-type-hot-deal',compact('name','allTypeHotels','id'));
    }
    /*end*/

    public function contactUs(Request $request)
    {
        $loveFlorida = SliderInfo::where('status',1)->where('type',2)->get();
        $allDisneyResort = DisneyResort::select('id','title')->where('status',1)->get();
        $allLocdestination = Location::select('id','name')->where('status',1)->get();
        $allSubLocdestination = SubLocation::select('id','name')->where('status',1)->get();
        $contactInfo = Contact::where('status',1)->first();
        return view('pages.contact-form',compact('request','contactInfo','allSubLocdestination','allLocdestination','allDisneyResort','loveFlorida'));
    }

    /*REDIRETC TO ABOUT US PAGE */
    public function aboutUs()
    {
        $contact = Contact::where('status',1)->first();
        $loveFlorida = SliderInfo::where('status',1)->where('type',2)->limit(6)->get();
        return view('pages.staticPage.about-us',compact('contact','loveFlorida'));
    }
    public function privacyPolicy()
    {
        $contact = Contact::where('status',1)->first(); 
        $staticPage = StaticPages::where('type',2)->where('status',1)->get();
        return view('pages.staticPage.privacy-policy',compact('contact','staticPage'));
    }
    public function termsConditions()
    {
        $contact = Contact::where('status',1)->first();
        $staticPage = StaticPages::where('type',1)->where('status',1)->get();
        return view('pages.staticPage.terms-condition',compact('contact','staticPage'));
    }

    public function showAllMixItUp()
    {
        $mixItUp = MixItUp::where('status',1)->paginate(6);
        return view('pages.hotels.mix_it_up',compact('mixItUp'));
    }
    public function moreMixItDetail(MixItUp $mixItUp)
    {
        return view('pages.hotels.mix_it_up_detail',compact('mixItUp'));
    }

    /*SEARCH RATING*/
    public function searchRating($star,$for)
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        //HOTDEALS
        if ($for=="hotdeal") {
            if ($for=="hotdeal") {
                $hotDeals = Hotel::where('hot_deal',1)->where('rating',$star)->where('status',1)->orderBy('id','DESC')->paginate(9);
                return view('pages.hotels.hotdeal',compact('hotDeals','location'));
            }
            elseif ($for=="universal") {
                $universal = Hotel::where('type',4)->where('rating',$star)->where('status',1)->orderBy('id','DESC')->paginate(9);
                return view('pages.hotels.universal',compact('universal','location'));
            }else{
                return view('pages.hotels.universal',compact('location'));
            }
        }

        //HOTELS
        if ($for=="hotels") {
            if ($for=="hotels") {
                $showAllHotels = Hotel::where('rating',$star)->where('type',1)->where('status',1)->orderBy('id','DESC')->paginate(9);
                $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
                return view('pages.hotels.hotels',compact('showAllHotels','location','hotDeals'));
            }
        }

        //RESTFLORIDA
        $for = preg_replace('/[-]+/', ' ', $for); 
        $hotelName = Location::select('id','name')->where('name','like','%'.$for.'%')->first();
        if (empty($hotelName)) {
            $hotelName = SubLocation::select('id','name')->where('name','like','%'.$for.'%')->first();
        }
        if (!empty($hotelName)) {
            if ($for==$hotelName->name) {
                $id = $hotelName->id;
                $name = $hotelName->name;
                if ($for==$hotelName->name) {
                    $usa = Hotel::where('rating',$star)->orderBy('id','DESC')->where('status',1)->where('location_id',$hotelName->id)->get();
                    $name = preg_replace('/[\s]+/', '-', $name);
                    return view('pages.hotels.restUsa',compact('usa','id','name','location'));
                }
            }
        }

        //Villas
        if ($for=="villas") {
            $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
            $showAllVillas = Hotel::where('rating',$star)->where('status',1)->where('type',2)->orderBy('id','DESC')->paginate(9);
            return view('pages.hotels.villas',compact('showAllVillas','hotDeals','location'));
        }       
    }

    /*SEACR LOCATION */
    public function searchLocation($name,$for,$locId)
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        //For HOTDEALS
        if ($name=="hot-deals") {
            if($name=="hot-deals" && $for=="florida") {
                $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->paginate(9);
                return view('pages.hotels.hotdeal',compact('hotDeals','location'));
            }elseif ($name=="hot-deals") {
                $hotDeals = Hotel::where('location_id',$locId)->where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->paginate(9);
                return view('pages.hotels.hotdeal',compact('hotDeals','location'));
            }
        }
        //For HOTELS
        if ($name=="hotels") {
            if($name=="hotels" && $for=="florida") {
                $showAllHotels = Hotel::where('type',1)->where('status',1)->orderBy('id','DESC')->paginate(9);
                $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
                return view('pages.hotels.hotels',compact('showAllHotels','location','hotDeals'));
            }elseif ($name=="hotels") {
                $showAllHotels = Hotel::where('type',1)->where('status',1)->orderBy('id','DESC')->where('location_id',$locId)->paginate(9);
                $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
                return view('pages.hotels.hotels',compact('showAllHotels','location','hotDeals'));
            }
        }

        //For VIllas
        //For HOTELS
        if ($name=="villas") {
            if($name=="villas" && $for=="florida") {
                $showAllVillas = Hotel::where('type',2)->where('status',1)->orderBy('id','DESC')->paginate(9);
                $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
                return view('pages.hotels.villas',compact('showAllVillas','location','hotDeals'));
            }elseif ($name=="villas") {
                $showAllVillas = Hotel::where('type',2)->where('status',1)->orderBy('id','DESC')->where('location_id',$locId)->paginate(9);
                $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
                return view('pages.hotels.villas',compact('showAllVillas','location','hotDeals'));
            }
        }
    }

    /*SORT PRICE*/
    public function sortPrice($name,$for)
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        //HOT DEALS
        if ($name=='hot-deals') {
            if($for=="low-to-high") {
                $hotDeals = Hotel::orderBy('price','ASC')->where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->paginate(9);
                return view('pages.hotels.hotdeal',compact('hotDeals','location'));
            }elseif($for=="high-to-low") {
                $hotDeals = Hotel::orderBy('price','DESC')->where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->paginate(9);
                return view('pages.hotels.hotdeal',compact('hotDeals','location'));
            }
        }

        //HOTELS
        if ($name=='hotels') {
            if($for=="low-to-high") {
                $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
                $showAllHotels = Hotel::orderBy('price','ASC')->where('status',1)->orderBy('id','DESC')->where('type',1)->paginate(9);
                return view('pages.hotels.hotels',compact('hotDeals','showAllHotels','location'));
            }elseif($for=="high-to-low") {
                $hotDeals = Hotel::where('status',1)->orderBy('id','DESC')->where('hot_deal',1)->get();
                $showAllHotels = Hotel::orderBy('price','DESC')->where('status',1)->orderBy('id','DESC')->where('type',1)->paginate(9);
                return view('pages.hotels.hotels',compact('hotDeals','showAllHotels','location'));
            }
        }

        //all location
        //RESTFLORIDA
        $name = preg_replace('/[-]+/', ' ', $name); 
        $hotelName = Location::select('id','name')->where('name','like','%'.$name.'%')->first();
        if (empty($hotelName)) {
            $hotelName = SubLocation::select('id','name')->where('name','like','%'.$name.'%')->first();
        }
        if ($name==$hotelName->name) {
            $id = $hotelName->id;
            $name = $hotelName->name;
            if($for=="low-to-high") {
                $usa = Hotel::orderBy('price','ASC')->where('status',1)->where('location_id',$hotelName->id)->get();
            }elseif($for=="high-to-low") {
                $usa = Hotel::orderBy('price','DESC')->where('status',1)->where('location_id',$hotelName->id)->get();
            }
            $name = preg_replace('/[\s]+/', '-', $name);
            return view('pages.hotels.restUsa',compact('usa','id','name','location'));  
        }
    }

    /*ALL OTHER OFFERS*/
    public function otherOffers($name)
    {
        $offer = Offer::where('status',1)->orderBy('id','DESC')->get();
        return view('pages.view-offer',compact('offer','name'));
    }

    /*Get a Quote*/
    public function getAquote(Request $request)
    {
        $location = Hotel::select('id','location_id')->groupBy('location_id')->where('status',1)->orderBy('id','DESC')->get();
        return view('pages.get-quote',compact('request','location'));
    }
}