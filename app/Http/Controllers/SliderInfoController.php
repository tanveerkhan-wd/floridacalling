<?php

namespace App\Http\Controllers;

use App\SliderInfo;
use Illuminate\Http\Request;
use Storage;
use File;
class SliderInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderInfo = SliderInfo::orderBy('type','DESC')->get();
        return view('admin.sliderInfo.index',compact('sliderInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliderInfo.create');
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
            'desc' => 'required',
        ]);
        $slider = new SliderInfo;
        if($request->hasFile('image')){
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'slider/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
        }

        $slider->image = $image_name;
        $slider->title = $request->title;
        $slider->description = $request->desc;
        $slider->type = $request->type;
        $slider->save();
        return redirect()->route('admin.sliderinfo')->with('success','Slider Info Stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function show(SliderInfo $sliderInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(SliderInfo $slider)
    {
        return view('admin.sliderInfo.create',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SliderInfo $slider)
    {
        $this->validate($request,[
            'title' => 'required',
            'desc' => 'required',
        ]);
        $oldFilename = $slider->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
                Storage::disk('public')->delete($oldFilename);
            }
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'slider/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $slider->image = $image_name;
        }
        $slider->title = $request->title;
        $slider->description = $request->desc;
        $slider->type = $request->type;
        $slider->update();
        return redirect()->route('admin.sliderinfo')->with('success','Slider Info Updaated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SliderInfo $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliderinfo')->with('success','Slider Info Deleted Successfully');
    }


    /**
     * Status Change the specified resource from storage.
     *
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function status(SliderInfo $slider)
    {
        $slider->status = $slider->status == 1?0:1;
        $slider->update();
        return redirect()->route('admin.sliderinfo')->with('success','Slider Info Updated Successfully');
    }
}
