<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RatingImages;
use Storage;
use File;
class RatingImagesController extends Controller
{
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$data = RatingImages::paginate(10);
    	return view('admin.taRatingImage.index',compact('data'));
    }

    /**
     * Create rating.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	return view('admin.taRatingImage.create');
    }

    /**
     * Store RatingImage meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$getData = [];
     	$extension = '';
    	$input = $request->all();
    	$this->validate($request,[
            'image' => 'required',
            'rating' => 'required',
        ]);

    	$add = new RatingImages;
        if($request->hasFile('image')){
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'rating/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $add->image = $image_name;
    	}

    	$add->rating = $input['rating'];
    	$add->save();
    	return redirect()->route('admin.ratingImages')->with('success','RatingImage Added Successfully');
    }

    /**
     * edit RatingImage meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,RatingImages $id)
    {
    	return view('admin.taRatingImage.edit',compact('id'));
    }


    /**
     * edit RatingImage meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RatingImages $id)
    {
    	$input = $request->all();
    	$this->validate($request,[
            'rating' => 'required',
        ]);
        $oldFilename = $id->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
            	Storage::disk('public')->delete($oldFilename);
            }
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'rating/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $input['image'] = $image_name;
        }
        $id->update($input);
    	return redirect()->route('admin.ratingImages')->with('success','RatingImage Updated Successfully');
    }


    /**
     * status RatingImage meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,RatingImages $id)
    {
    	$id->status = $id->status==1?0:1;
        $id->update();
    	return redirect()->route('admin.ratingImages')->with('success','RatingImage Status Updated Successfully');
    }

    /**
     * destroy RatingImage meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,RatingImages $id)
    {	
    	$oldFilename = $id->image;
        if(isset($oldFilename) && !empty($oldFilename)){
        	Storage::disk('public')->delete($oldFilename);
        }
    	$id->delete();
    	return redirect()->route('admin.ratingImages')->with('success','RatingImage Deleted Successfully');
    }


}
