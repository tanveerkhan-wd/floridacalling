<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Hotel;
use Storage;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer = Offer::orderBy('id','DESC')->get();
        return view('admin.offers.index',compact('offer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = Hotel::select('id','name')->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.offers.create',compact('hotel'));
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
            'image' => 'required',
            'title' => 'required',
            'hotel_id' => 'required'
        ]);

        $offer = new Offer;
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('hotel');
            $offer->image = $image_path;
        }
        $offer->title = $request->title;
        $offer->hotel_id = $request->hotel_id;
        $offer->description = $request->description;
        $offer->save();
        return redirect()->route('admin.offer')->with('success','Offer Added  Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $hotel = Hotel::select('id','name')->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.offers.edit',compact('hotel','offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $this->validate($request,[
            'title' => 'required',
            'hotel_id' => 'required'
        ]);

        $oldFilename = $offer->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
            }
        }
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('hotel');
            $offer->image = $image_path;
        }

        $offer->title = $request->title;
        $offer->hotel_id = $request->hotel_id;
        $offer->description = $request->description;
        $offer->update();
        return redirect()->route('admin.offer')->with('success','Offer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        Storage::delete($offer->image);
        $offer->delete();
        return redirect()->route('admin.offer')->with('success','Offer Deleted Successfully');
    }
    public function status(Offer $offer)
    {
        $offer->status=$offer->status==1?0:1;
        $offer->update();
        return redirect()->route('admin.offer')->with('success','Offer Status Changed Successfully');
    }
}
