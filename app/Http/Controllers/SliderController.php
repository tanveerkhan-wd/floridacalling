<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Hotel;
use Storage;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderBy('id','DESC')->paginate();
        return view('admin.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = Hotel::select('id','name')->where('status','=',1)->get();
        return view('admin.slider.create',compact('hotel'));
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
            'sub_title' => 'required',
            'start_price' => 'required',
            'hotel_id' => 'required',
        ]);
        $slider = new Slider;
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/slider');
            $slider->image = $image_path;
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->start_price = $request->start_price;
        $slider->hotel_id = $request->hotel_id;
        $slider->save();
        return redirect()->route('admin.slider')->with('success','Slider Add SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $hotel = Hotel::select('id','name')->where('status','=',1)->get();
        return view('admin.slider.create',compact('slider','hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'start_price' => 'required',
            'hotel_id' => 'required',
        ]);
        $oldFilename = $slider->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
            }
        }
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/slider');
            $slider->image = $image_path;
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->start_price = $request->start_price;
        $slider->hotel_id = $request->hotel_id;
        $slider->update();
        return redirect()->route('admin.slider')->with('success','Slider Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $oldFilename = $slider->image;
        if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
        }
        $slider->delete();
        return redirect()->route('admin.slider')->with('success','Slider Deleted Successfully');
    }

    /**
     * Change the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function status(Slider $slider)
    {
        $slider->status = $slider->status == 1?0:1;
        $slider->update();
        return redirect()->route('admin.slider')->with('success','Slider Deleted Successfully');
    }
}
