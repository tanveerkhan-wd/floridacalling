<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\FrontHelper;
use App\DisneyResort;
use App\Hotel;
use App\Location;
use App\Facility;
use App\HotelDet;
use App\whereToStay;
use App\BoardingMeal;
use App\Airline;
use App\Airports;
use App\RatingImages;
use App\RatingMaster;
use App\ExploreFlorida;
use Storage;
use File;
use Image;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        
        //Check for data
        $check_search = isset($input['search']) && !empty($input['search']) ? $input['search'] : false;
        
        //GET Hotels
        $hotel = Hotel::with('location')->orderBy('id','DESC');
        if ($check_search) {
            $hotel = $hotel->where('name','LIKE','%'.$check_search.'%')->orWhereHas('location',function($query) use($check_search){
                $query->where('name','LIKE','%'.$check_search.'%');
            });    
        }
        
        $hotel = $hotel->paginate(10);
        return view('admin.hotels.index',compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disneyResortType = DisneyResort::select('title','id')->where('status',1)->get();
        $streams = Location::get()->toArray();
        $getData = FrontHelper::buildtree($streams);
        $location = FrontHelper::getCategoryWithSubCat($getData);
        $facility = Facility::select('id','name')->orderBy('id','DESC')->get();
        $meal = BoardingMeal::where('status','=',1)->get()->toArray();
        $ratingImage = RatingImages::select('id','rating')->where('status','=',1)->get();
        return view('admin.hotels.create',compact('meal','location','facility','disneyResortType','ratingImage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'location_id' =>'required',
            'name' =>'required',
            'image' =>'required',
            'price' =>'required',
            'days' =>'required',
            'rating' =>'required',
            'multi_images' =>'required',
            'description' =>'required',
            'facility' =>'required',
        ]);
        $hotel = new Hotel;

        if($request->hasFile('image')){
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $org_img_name = $image_path->getClientOriginalName();
            $hotelName = str_replace(' ', '_', $request->name);
            $image_name = 'hotel/'.$hotelName.'/'.$org_img_name;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $hotel->image = $image_name;

            $source = Storage::get($image_name);
            Storage::disk('public')->makeDirectory('thumbnail/200x140/hotel/'.$hotelName);
            $target = public_path('uploads/thumbnail/200x140/' .$image_name);
            Image::make($source)->resize(200,140)->save($target);
        }

        $hotel->location_id = $request->location_id;
        $hotel->disney_resort_id = $request->disney_resort_id;
        $hotel->name = $request->name;
        $hotel->slug = Str::slug($request->name, '-');
        $hotel->price = $request->price;
        $hotel->days = $request->days;
        $hotel->saving = $request->saving;
        $hotel->rating = $request->rating;
        $hotel->hotel_rating = $request->c_hotel_rating ? $request->c_hotel_rating:4;
        $hotel->type = $request->type;
        $hotel->save();


        /*HOTEL DETAILS*/

        if($request->hasFile('multi_images')){
            $multi_images = array();
            foreach ($request->file('multi_images') as $mulimage) {
                $extension = $mulimage->getClientOriginalExtension();
                $org_img_name = $mulimage->getClientOriginalName();
                $hotelName = str_replace(' ', '_', $request->name);
                $image_name = 'hotel/'.$hotelName.'/'.$org_img_name.'.'.$extension;
                Storage::disk('public')->put($image_name,  File::get($mulimage));
                $multi_images[] = $image_name;     

                $source = Storage::get($image_name);
                Storage::disk('public')->makeDirectory('thumbnail/250x220/hotel/'.$hotelName);
                $target = public_path('uploads/thumbnail/250x220/' .$image_name);
                Image::make($source)->resize(250,220)->save($target);       
            }
        }
        $hotelDet = new HotelDet;
        $hotelDet->hotel_id = $hotel->id;
        $hotelDet->images = json_encode($multi_images);
        $hotelDet->description = $request->description;
        $hotelDet->facility = json_encode($request->facility);
        $hotelDet->near_by = isset($request->nearby) && !empty($request->nearby) ? json_encode($request->nearby):null;
        $hotelDet->latitude = $request->latitude;
        $hotelDet->longitude = $request->longitude;
        $hotelDet->departure_date = json_encode($request->departure_date);
        $hotelDet->airport = isset($request->airport) && !empty($request->airport) ? json_encode($request->airport):null;
        $hotelDet->airline = isset($request->airline) && !empty($request->airline) ? json_encode($request->airline):null;
        $hotelDet->mealboard = $request->board;
        $hotelDet->guests = $request->guests;
        $hotelDet->save();

        $rating = new RatingMaster;
        $rating->hotel_id = $hotel->id;
        $rating->total_review = $request->total_review;
        $rating->excellent = $request->excellent;
        $rating->very_good = $request->very_good;
        $rating->average = $request->average;
        $rating->poor = $request->poor;
        $rating->terrible = $request->terrible;
        $rating->sleep_quality = isset($request->sleep_quality) && !empty($request->sleep_quality)? $request->sleep_quality:0;
        $rating->location = $request->location;
        $rating->rooms = isset($request->rooms) && !empty($request->rooms) ? $request->rooms:0;
        $rating->service = $request->service;
        $rating->value = $request->value;
        $rating->cleanliness = $request->cleanliness;
        $rating->save();

        return redirect()->route('admin.hotels')->with('success','Hotel Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $faciliId = [];
        $streams = Location::get()->toArray();
        $getData = FrontHelper::buildtree($streams);
        $location = FrontHelper::getCategoryWithSubCat($getData);
        
        $disneyResortType = DisneyResort::select('title','id')->where('status',1)->get();
        $hotelDet = HotelDet::where('hotel_id','=',$hotel->id)->first();
        if ($hotelDet->facility != null) {
            $faciliId = json_decode($hotelDet->facility);
        }
        $getSelectedCat = Facility::select('id','name')->whereIn('id',$faciliId)->get();
        $facility = Facility::select('id','name')->whereNotIn('id',$faciliId)->get();

        $ratingImage = RatingImages::select('id','rating')->where('status','=',1)->get();
        $ratingMaster = RatingMaster::where('hotel_id',$hotel->id)->first();
        $meal = BoardingMeal::where('status','=',1)->get()->toArray();
        $aAirport = json_decode($hotelDet->airport);
        if ($aAirport!=null) {
            $getAirportData = Airports::whereIn('id',$aAirport)->get()->toArray();
        }else{
            $getAirportData =[];
        }
        $aAirline = json_decode($hotelDet->airline);
        if ($aAirline !=null) {
            $getAirlineData = Airline::whereIn('id',$aAirline)->get()->toArray();
        }else{
            $getAirlineData =[];
        }
        return view('admin.hotels.create',compact('getSelectedCat','disneyResortType','hotel','location','hotelDet','facility','ratingImage','ratingMaster','meal','getAirportData','getAirlineData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $this->validate($request,[
            'location_id' =>'required',
            'name' =>'required',
            'price' =>'required',
            'days' =>'required',
            'description' =>'required',
            'facility' =>'required',
        ]);
        $oldFilename = $hotel->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
                Storage::disk('public')->delete($oldFilename);
                Storage::disk('public')->delete('thumbnail/200x140/'.$oldFilename);
            }
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $org_img_name = $image_path->getClientOriginalName();
            $hotelName = str_replace(' ', '_', $request->name);
            $image_name = 'hotel/'.$hotelName.'/'.$org_img_name;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $hotel->image = $image_name;


            $source = Storage::get($image_name);
            Storage::disk('public')->makeDirectory('thumbnail/200x140/hotel/'.$hotelName);
            $target = public_path('uploads/thumbnail/200x140/' .$image_name);
            Image::make($source)->resize(200,140)->save($target);
        }

        $hotel->location_id = $request->location_id;
        $hotel->disney_resort_id = $request->disney_resort_id;
        $hotel->name = $request->name;
        $hotel->slug = Str::slug($request->name, '-');
        $hotel->price = $request->price;
        $hotel->days = $request->days;
        $hotel->saving = $request->saving;
        $hotel->type = $request->type;
        $hotel->rating = $request->rating;
        $hotel->hotel_rating = $request->c_hotel_rating ? $request->c_hotel_rating:4;
        $hotel->update();

        /*UPDATE HOTEL DETAILS*/

        $aryNewImage = array();
        $hotelDetUpdate =  HotelDet::findOrFail($request->hotelDetId);
        if($request->hasFile('multi_images')) {
            if (!empty($hotelDetUpdate->images)) {
                $aryImage = json_decode($hotelDetUpdate->images);
                foreach ($aryImage as $key => $value) {
                    $aryNewImage[] = $value;
                }            
            }
            foreach ($request->file('multi_images') as $mulimage) {
                $extension = $mulimage->getClientOriginalExtension();
                $org_img_name = $mulimage->getClientOriginalName();
                $hotelName = str_replace(' ', '_', $request->name);
                $image_name = 'hotel/'.$hotelName.'/'.$org_img_name.'.'.$extension;
                Storage::disk('public')->put($image_name,  File::get($mulimage));
                $aryNewImage[]=$image_name;

                $source = Storage::get($image_name);
                Storage::disk('public')->makeDirectory('thumbnail/250x220/hotel/'.$hotelName);
                $target = public_path('uploads/thumbnail/250x220/' .$image_name);
                Image::make($source)->resize(250,220)->save($target);
            }
            $hotelDetUpdate->images = json_encode($aryNewImage);
        }
        $hotelDetUpdate->description = $request->description;
        $hotelDetUpdate->latitude = $request->latitude;
        $hotelDetUpdate->longitude = $request->longitude;
        $hotelDetUpdate->facility = json_encode($request->facility);
        $hotelDetUpdate->near_by = isset($request->nearby) && !empty($request->nearby)?json_encode($request->nearby):null;
        $hotelDetUpdate->departure_date = json_encode($request->departure_date);
        $hotelDetUpdate->airport = isset($request->airport) && !empty($request->airport)?json_encode($request->airport):null;
        $hotelDetUpdate->airline = isset($request->airline) && !empty($request->airline)? json_encode($request->airline):null;
        $hotelDetUpdate->mealboard = $request->board;
        $hotelDetUpdate->guests = $request->guests;
        $hotelDetUpdate->update();

        $rating['total_review'] = $request->total_review;
        $rating['excellent'] = $request->excellent;
        $rating['very_good'] = $request->very_good;
        $rating['average'] = $request->average;
        $rating['poor'] = $request->poor;
        $rating['terrible'] = $request->terrible;
        $rating['sleep_quality'] = isset($request->sleep_quality) && !empty($request->sleep_quality)? $request->sleep_quality:0;
        $rating['location'] = $request->location;
        $rating['rooms'] = isset($request->rooms) && !empty($request->rooms) ? $request->rooms:0;
        $rating['service'] = $request->service;
        $rating['value'] = $request->value;
        $rating['cleanliness'] = $request->cleanliness;
        RatingMaster::where('hotel_id',$hotel->id)->update($rating);

        return redirect()->route('admin.hotels')->with('success','Hotel Update Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotelDet = HotelDet::where('hotel_id',$hotel->id)->first();
        $hotelImage = isset($hotelDet->images) && !empty($hotelDet->images) ? json_decode($hotelDet->images):[];
        foreach ($hotelImage as $value) {
            Storage::delete($value);
        }
        Storage::delete($hotel->image);
        $hotelDet->delete();
        $hotel->delete();
        RatingMaster::where('hotel_id',$hotel->id)->delete();
        return redirect()->route('admin.hotels')->with('success','Hotel Deleted Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotelDet
     * @return \Illuminate\Http\Response
     */
    public function singleImageDestroy(Request $request)
    {
        $aryResponse = array(); 
        $media_id = $request->media_id;
        $media_image = $request->media_image;

        $singleRowData = HotelDet::where('id', $media_id)->first();
        $aryImage = json_decode($singleRowData->images);            
        $aryNewImage = array();
        foreach ($aryImage as $key => $value) {
            if ($value!=$media_image) {
               $aryNewImage[] = $value;
            } else {                
                Storage::disk('public')->delete($value);
            }   
        }        
        $mediaData = json_encode($aryNewImage);
        $result = HotelDet::where("id", '=',  $media_id)
        ->update(['images'=> $mediaData]);
        if ($result>0) {
           $aryResponse['status']=true;
        } else {
            $aryResponse['status']=false;
        }
        echo json_encode($aryResponse);

    }

     /**
     * Change the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function status(Hotel $hotel)
    {
        $hotel->status=$hotel->status==1?0:1;
        $hotel->update();
        return redirect()->route('admin.hotels')->with('success','Hotel Status Changed Successfully');
    }

     /**
     * Change the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function hotDeals(Hotel $hotel)
    {
        $hotel->hot_deal = $hotel->hot_deal == 1?0:1;
        $hotel->update();
        return redirect()->route('admin.hotels')->with('success','Hot Deals  Status Changed Successfully');
    }

     /**
     * Change the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function fav(Hotel $hotel)
    {
        $hotel->fav = $hotel->fav == 1?0:1;
        $hotel->update();
        return redirect()->route('admin.hotels')->with('success','Fav Status Changed Successfully');
    }

     /**
     * Change the specified resource from storage.
     *
     * @param  \App\Hotel  $id
     * @return \Illuminate\Http\Response
     */
    public function viewHotelDet($id)
    {
        /*$info = HotelDet::where('hotel_id','=',$id)->first();
        return view('admin.hotels.hotel-detail',compact($info));*/
    }

    /*======================================================= */
    /*====================EXPLORE FLORIDA==================== */
    /*======================================================= */
     /**
     * View the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function exploreFlorida()
    {
        $exploreFlorida = ExploreFlorida::orderBy('id','DESC')->get();
        return view('admin.exploreFlorida.index',compact('exploreFlorida'));
    }
    public function exploreFloridaEdit(ExploreFlorida $id)
    {
        return view('admin.exploreFlorida.edit',compact('id'));
    }
    public function exploreFloridaUpdate(Request $request, ExploreFlorida $id)
    {
        $this->validate($request,[
            'title' =>'required',
            'price' =>'required',
        ]);
        $oldFilename = $id->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
            }
        }
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/hotel');
            $id->image = $image_path;
        }
        $id->title = $request->title;
        $id->price = $request->price;
        $id->update();
        return redirect()->route('admin.exploreFlorida')->with('success','Explore Florida Updated Successfully');
    }
    public function exploreFloridaStatus(ExploreFlorida $id)
    {
        $id->status = $id->status==1?0:1;
        $id->update();
        return redirect()->route('admin.exploreFlorida')->with('success','Explore Florida Status Changed Successfully');
    }
    public function exploreFloridaCreate()
    {
        return view('admin.exploreFlorida.edit');
    }
    public function exploreFloridaStore(Request $request)
    {   
        $this->validate($request,[
            'title' =>'required',
            'price' =>'required',
            'image' =>'required',
        ]);
        
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/hotel');
        }
        $explorFlorida = new ExploreFlorida;
        $explorFlorida->image = $image_path;
        $explorFlorida->title = $request->title;
        $explorFlorida->price = $request->price;
        $explorFlorida->save();
        return redirect()->route('admin.exploreFlorida')->with('success','Explore Florida Stored Successfully'); 
    }
    public function exploreFloridaDestroy(ExploreFlorida $explor)
    {
        $explor->delete();
        return redirect()->route('admin.exploreFlorida')->with('success','Explore Florida Deleted Successfully'); 
    }


    /*====================================================*/
    /*==============WHEREE TO STAY MANAGE=================*/
    /*====================================================*/
    public function whereToStay()
    {
        $whereToStay = whereToStay::orderBy('id','DESC')->get();
        return view('admin.exploreFlorida.where_to_stay',compact('whereToStay'));
    }
    public function whereToStayCreate()
    {
        $location = Location::select('id','name')->where('base_name','like','%florida%')->where('status','=',1)->get();
        return view('admin.exploreFlorida.where_to_stay_create',compact('location'));
    }
    public function whereToStayStore(Request $request)
    {
        $this->validate($request,[
            'title' =>'required',
            'price' =>'required',
            'image' =>'required',
        ]);
        
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/hotel');
        }
        $explorFlorida = new whereToStay;
        $explorFlorida->image = $image_path;
        $explorFlorida->title = $request->title;
        $explorFlorida->price = $request->price;
        $explorFlorida->save();
        return redirect()->route('admin.whereToStay')->with('success','Where To Stay Stored Successfully'); 
    }


    public function whereToStayEdit(whereToStay $whereTo)
    {
        $location = Location::select('id','name')->where('status','=',1)->get();
        return view('admin.exploreFlorida.where_to_stay_create',compact('whereTo','location'));
    }

    public function whereToStayUpdate(Request $request, whereToStay $whereTo)
    {
        $this->validate($request,[
            'title' =>'required',
            'price' =>'required',
        ]);
        $oldFilename = $whereTo->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
            }
        }
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/hotel');
            $whereTo->image = $image_path;
        }
        $whereTo->title = $request->title;
        $whereTo->price = $request->price;
        $whereTo->update();
        return redirect()->route('admin.whereToStay')->with('success','Where To Stay Updated Successfully');
    }
    public function whereToStayStatus(whereToStay $whereToStay)
    {
        $whereToStay->status = $whereToStay->status==1?0:1;
        $whereToStay->update();
        return redirect()->route('admin.whereToStay')->with('success','Where To Stay Status Changed Successfully');
    }
    public function whereToStayDestroy(whereToStay $whereToStay)
    {
        Storage::delete($whereToStay->image);
        $whereToStay->delete();
        return redirect()->route('admin.whereToStay')->with('success',' Where To Stay Deleted Successfully');
    }

    public function getSubLocation(Request $request)
    {
        $input = $request->all();
        $getLoc = SubLocation::where('location_id',$input['location_id'])->get();
        if (!$getLoc->isEmpty()) {
            $response['status'] = true;
            $response['message'] = "success";
            $response['data'] = $getLoc;
        }else{
            $response['status'] = false;
            $response['message'] = "error";
        }
        return response()->json($response);
    }

    public function searchData(Request $request)
    {
        $input = $request->all();

        if ($input['type']=='airport') {
            $getData = Airports::select('id','airport_code')->where('airport_code','LIKE','%'.$input['search'].'%')->get()->toArray();
        }
        if($input['type']=='airline'){
            $getData = Airline::select('id','airline_name')->where('airline_name','LIKE','%'.$input['search'].'%')->get()->toArray();   
        }

        if (!empty($getData)) {
            $response['status'] = true;
            $response['message'] = "success";
            $response['data'] = $getData;
        }else{
            $response['status'] = false;
            $response['message'] = "error";
        }
        return response()->json($response);
    }

    /*
    * Upload with CSV file
    */
    public function csvFile()
    {
        $streams = Location::get()->toArray();
        $getData = FrontHelper::buildtree($streams);
        $location = FrontHelper::getCategoryWithSubCat($getData);
        $ratingImage = RatingImages::select('id','rating')->where('status','=',1)->get();
        return view('admin.hotels.upload-csv',compact('location','ratingImage'));
    }


    /*
    * Post CSV file data to DB
    */
    public function postCsvFile(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'csv' => 'required',
        ]);

        if($request->hasFile('csv')){
            $image_path = $request->file('csv');
            $extension = $image_path->getClientOriginalExtension();
        }

        if ($extension == 'csv') 
        {
            if($request->hasFile('csv')){
                $image_path = $request->file('csv');
                $extension = $image_path->getClientOriginalExtension();
                $hotelName = time();
                $image_name = 'csv_file/'.$hotelName.'.'.$extension;
                Storage::disk('public')->put($image_name,  File::get($image_path));
            }

            $csv_file = public_path('uploads').'/'.$image_name;
            $file = fopen($csv_file,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );
                if($i == 0){
                    $i++;
                    continue; 
                }
                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            //STORE Airline
            foreach ($importData_arr as $key => $value) {
                $getData = new Hotel;
                $getData->location_id = $input['location_id']; 
                $getData->name = $value[0]; 
                $getData->slug = Str::slug($value[0],'-');
                $getData->price = $value[1];
                $getData->days = $value[2];
                $getData->saving = $value[3];
                $getData->hotel_rating = $value[4];
                $getData->type = $value[5];
                $getData->rating = $value[8];
                $getData->save();

                $getDetData[$key]['hotel_id'] = $getData->id;
                $getDetData[$key]['description'] = $value[6];
                $getDetData[$key]['guests'] = $value[7];
                $getDetData[$key]['latitude'] = $value[21];
                $getDetData[$key]['longitude'] = $value[22];
                $getDetData[$key]['address'] = $value[23];

                $getRating[$key]['hotel_id'] = $getData->id;
                $getRating[$key]['total_review'] = $value[9];
                $getRating[$key]['excellent'] = $value[10];
                $getRating[$key]['very_good'] = $value[11];
                $getRating[$key]['average'] = $value[12];
                $getRating[$key]['poor'] = $value[13];
                $getRating[$key]['terrible'] = $value[14];
                $getRating[$key]['sleep_quality'] = $value[15];
                $getRating[$key]['location'] = $value[16];
                $getRating[$key]['rooms'] = $value[17];
                $getRating[$key]['service'] = $value[18];
                $getRating[$key]['value'] = $value[19];
                $getRating[$key]['cleanliness'] = $value[20];
                

            }
                HotelDet::insert($getDetData);
                RatingMaster::insert($getRating);
        }else{
            return redirect()->route('admin.hotel.csv')->with('error','Not a valid file');
        }

        return redirect()->route('admin.hotels')->with('success','Added Successfully');

    }
}
