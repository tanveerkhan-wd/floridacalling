<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Storage;
use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Testimonial::orderBy('id','DESC')->paginate(10);
        return view('admin.testimonial.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.testimonial.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPost(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        $add = new Testimonial;
        if($request->hasFile('image')){
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'testimonial/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
        }
        $add->image = $image_name;
        $add->name = $request->name;
        $add->description = $request->description;
        $add->save();
        $url = url('admin/testimonials');
        return redirect()->to($url)->with('success','Testimonial Stored Successfully');
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
    public function edit(Testimonial $id)
    {
        $data = $id;
        return view('admin.testimonial.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function editPost(Request $request, Testimonial $data)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);
        $oldFilename = $data->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
                Storage::disk('public')->delete($oldFilename);
            }
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'testimonial/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $data->image = $image_name;
        }
        $data->title = $request->title;
        $data->description = $request->description;
        $data->update();
        $url = url('admin/testimonials');
        return redirect()->to($url)->with('success','Testimonial Updaated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $id)
    {
        if ($id->image!=null || $id->image!='') {
            Storage::disk('public')->delete($id->image);
        }
        $id->delete();
        $url = url('admin/testimonials');
        return redirect()->to($url)->with('success','Testimonial Deleted Successfully');
    }


    /**
     * Status Change the specified resource from storage.
     *
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function status(Testimonial $id)
    {
        $id->status = $id->status == 1?0:1;
        $id->update();
        $url = url('admin/testimonials');
        return redirect()->to($url)->with('success','Testimonial Status Changed Successfully');
    }
}
