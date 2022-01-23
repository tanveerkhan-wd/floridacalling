<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use App\Quote;
use App\Testimonial;
use App\Suggestion;
use Storage;
use File;
use Image;

class BookingController extends Controller
{
	/*
	* Query Form
	* get 
	*/
    public function queryForm()
    {
    	return view('frontPages.query_forms.booking');
    }

	/*
	* Query Form Search destination
	* post return  ajax request 
	*/
    public function searchDestinaion(Request $request)
    {
    	$loc = [];
        $data = $request->all();
        $destination = isset($data['data']) && !empty($data['data']) ? $data['data'] : false;
        if ($destination) {
            $loc = Location::select('id','name')->where('name','LIKE','%'.$destination.'%')->get();
	        if (!$loc->isEmpty()) 
	        {
	            $response['status'] = true;
	            $response['message'] = "Data Get Successfully";
	            $response['data']= $loc;
	        }else{
	            $response['status'] = false;
	            $response['message'] = "No data found";
	        }
        }else{
            $response['status'] = false;
            $response['message'] = "Something went wrong!";
        }
        return response()->json($response);
    }

	/*
	* Contact Form
	* get 
	*/
    public function conatctUs()
    {
    	return view('frontPages.query_forms.contact-form');
    }

    /*
	* Contact Form POST
	* POST
	*/
    public function conatctUsPost(Request $request)
    {
    	$input = $request->all();
    	$this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $add = new Quote;
        $add->name = $input['name'];
        $add->email = $input['email'];
        $add->phone_number = $input['phone'];
        $add->message =  $input['text'];
        $add->enquiry_type = 1;
        $add->save();
    	return redirect()->back()->with('success','Submitted successfully');
    }
    

    /*
    * Get a Quote POST
    * POST
    */
    public function queryFormPost(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $add = new Quote;
        $add->name = $input['name'];
        $add->email = $input['email'];
        $add->phone_number = $input['phone'];
        $add->message =  isset($input['text']) ? $input['text']:null;
        $add->enquiry_type = 1;
        $add->save();
        return redirect()->back()->with('success','Submitted successfully');
    }
    
    /*
    * Add Testimonial
    */
    public function tetimonialAdd(Request $request)
    {
        $input = $request->all();
        $add = new Testimonial;
        if($request->hasFile('upload_image')){
            $fileName = 'upload_image';
            $thumb = 1;
            $img_folder = 'testimonial/';
            $add->image = $this->uploadedImageFile($request,$fileName,$thumb,$img_folder);
        }
        $add->name = $input['name'];
        $add->profession = $input['profesion'];
        $add->description = $input['text'];
        $add->status = 0;
        $add->save();
        return redirect()->back();
    }

    /*
    * Add Suggeston
    */
    public function suggestionAdd(Request $request)
    {
        $input = $request->all();
        $add = new Suggestion;
        $add->name = $input['name'];
        $add->description = $input['text'];
        $add->status = 0;
        $add->save();
        return redirect()->back();
    }

    /*
    * Upload Single Image 
    */
    public function uploadedImageFile($request,$fileName,$thumb,$img_folder)
    {
        $name = time().rand(100,999);
        $image_path = $request->file($fileName);
        $extension = $image_path->getClientOriginalExtension();
        $image_name = $img_folder.'/'.$name.'.'.$extension;
        
        Storage::disk('public')->put($image_name,  File::get($image_path));    

        if ($thumb==1) {
            $source = Storage::disk('public')->get($image_name);
            Storage::disk('public')->makeDirectory('thumbnail/128x128/'.$img_folder);
            $target = public_path('uploads/thumbnail/128x128/' .$image_name);
            Image::make($source)->resize(128,128)->save($target);
        }
        return $image_name;
    }
}
