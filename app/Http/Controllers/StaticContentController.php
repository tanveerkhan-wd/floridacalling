<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FreeDisneyDiningContent;
use App\FreeDisneyDiningTital;
use App\DisneyResort;
use Storage;
class StaticContentController extends Controller
{
    /*
	* SHOW Free Disney Dining	
    */
    public function freeDisneyDining()
    {
    	$freeDisneyDiningCo = FreeDisneyDiningContent::orderBy('id','DESC')->get();
    	return view('admin.freeDisneyDining.index',compact('freeDisneyDiningCo'));
    }
    /*
	* Edit Free Disney Dining	
    */
    public function freeDisneyDiningEdit(FreeDisneyDiningContent $freeddc)
    {
    	$freeddt = FreeDisneyDiningTital::where('status',1)->first();
    	$disneyResort = DisneyResort::where('status',1)->orderBy('id','DESC')->get();
    	return view('admin.freeDisneyDining.create',compact('freeddc','disneyResort','freeddt'));
    }

    /*
	* Updae Free Disney Dining	
    */
    public function freeDisneyDiningupdate(Request $request, FreeDisneyDiningContent $freeddc)
    {
    	$this->validate($request,[
    		'title' => 'required',
    		'sub_title' => 'required',
    		'url' => 'required',
    	]);
    	$freeddt = FreeDisneyDiningTital::where('status',1)->first();
    	$oldFilename = $freeddc->image;
        if($request->hasFile('cimage')){
            if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
            }
        }
        $oldFilename = $freeddt->image;
        if($request->hasFile('timage')){
            if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
            }
        }

        if($request->hasFile('cimage')){
            $image_path = $request->file('cimage')->store('public/disney');
            $freeddc->image = $image_path;
        }
        if($request->hasFile('timage')){
            $image_path = $request->file('timage')->store('public/disney');
            $freeddt->image = $image_path;
        }
    	$freeddc->title = $request->title;
    	$freeddc->sub_title = $request->sub_title;
    	$freeddc->url = $request->url;
    	/*STORE TITLES*/
    	$freeddt->title = $request->ttitle;
    	$freeddt->sub_title = $request->tsub_title;
    	$freeddt->update();
    	$freeddc->update();
    	return redirect()->route('admin.freeDisneyDining')->with('success','Free Disney Dining Updated Successfully');
    }
     /*
	* Change Status Free Disney Dining	
    */
    public function freeDisneyDiningStatus(FreeDisneyDiningContent $freeddc)
    {
    	$freeddc->status = $freeddc->status==1?0:1;
    	$freeddc->update();
    	return redirect()->route('admin.freeDisneyDining')->with('success','Free Disney Dining Status Changed Successfully');
    }
}
