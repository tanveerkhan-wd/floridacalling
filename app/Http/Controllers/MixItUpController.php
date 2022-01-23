<?php

namespace App\Http\Controllers;

use App\MixItUp;
use App\Hotel;
use App\HotelDet;

use Illuminate\Http\Request;

class MixItUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mixItUp = MixItUp::orderBy('id','DESC')->paginate(20);
        return view('admin.mixItUp.index',compact('mixItUp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = Hotel::select('id','name')->where('status',1)->get();
        return view('admin.mixItUp.create',compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fHotelDet = HotelDet::select('id','location_id','sublocation')->where('hotel_id',$request->fh_id)->first();
        $sHotelDet = HotelDet::select('id','location_id','sublocation')->where('hotel_id',$request->sh_id)->first();

         $this->validate($request,[
            'fh_id' =>'required',
            'sh_id' =>'required',
            'name' =>'required',
            'price' =>'required',
            'save' =>'required',
            'fh_night' =>'required',
            'sh_night' =>'required',
            'description' =>'required'
        ]);
         $mixItUp = new MixItUp;
         $mixItUp->location_id = $fHotelDet->location_id;
         $mixItUp->s_location_id = $sHotelDet->location_id;
         $mixItUp->sublocation_id = $fHotelDet->sublocation;
         $mixItUp->s_sublocation_id = $sHotelDet->sublocation;
         $mixItUp->fh_id = $request->fh_id;
         $mixItUp->fhd_id = $fHotelDet->id;
         $mixItUp->sh_id = $request->sh_id;
         $mixItUp->shd_id = $sHotelDet->id;
         $mixItUp->name = $request->name;
         $mixItUp->price = $request->price;
         $mixItUp->save = $request->save;
         $mixItUp->fh_night = $request->fh_night;
         $mixItUp->sh_night = $request->sh_night;
         $mixItUp->desc_title = $request->desc_title;
         $mixItUp->description = $request->description;
         $mixItUp->save();
         return redirect()->route('admin.mixItUp')->with('success','MixItUp Stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MixItUp  $mixItUp
     * @return \Illuminate\Http\Response
     */
    public function show(MixItUp $mixItUp)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MixItUp  $mixItUp
     * @return \Illuminate\Http\Response
     */
    public function edit(MixItUp $mixItUp)
    {
        $hotel = Hotel::select('id','name')->where('status',1)->get();
        return view('admin.mixItUp.edit',compact('mixItUp','hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MixItUp  $mixItUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MixItUp $mixItUp)
    {
         $this->validate($request,[
            'name' =>'required',
            'price' =>'required',
            'save' =>'required',
            'fh_night' =>'required',
            'sh_night' =>'required',
            'description' =>'required'
        ]);
         $mixItUp->name = $request->name;
         $mixItUp->price = $request->price;
         $mixItUp->save = $request->save;
         $mixItUp->fh_night = $request->fh_night;
         $mixItUp->sh_night = $request->sh_night;
         $mixItUp->desc_title = $request->desc_title;
         $mixItUp->description = $request->description;
         $mixItUp->update();
         return redirect()->route('admin.mixItUp')->with('success','MixItUp Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MixItUp  $mixItUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(MixItUp $mixItUp)
    {
        $mixItUp->delete();
         return redirect()->route('admin.mixItUp')->with('success','MixItUp Destroyed Successfully');
    }
    /**
     * change the specified resource from storage.
     *
     * @param  \App\MixItUp  $mixItUp
     * @return \Illuminate\Http\Response
     */
    public function status(MixItUp $mixItUp)
    {
        $mixItUp->status=$mixItUp->status==1?0:1;
        $mixItUp->update();
         return redirect()->route('admin.mixItUp')->with('success','MixItUp Status Changed Successfully');
    }
}
