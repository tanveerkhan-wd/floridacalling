<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FrontHelper;
use App\SubLocation;
use App\Location;
use Storage;
use File;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::with('parent')->paginate(10);
        return view('admin.location.index',compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $streams = Location::get()->toArray();
        $getData = FrontHelper::buildtree($streams);
        $getLocData = FrontHelper::getCategoryWithSubCat($getData);
        return view('admin.location.create',compact('getLocData'));
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
            'name' => 'required',
        ]);
        $location = new Location;
        if($request->hasFile('image')){
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'location/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $location->image = $image_name;
        }
        $location->name = $request->name;
        $location->parent_category = $request->parent_category;
        $location->description = $request->description;
        $location->save();
        return redirect()->route('admin.location')->with('success','Location Added Successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $streams = Location::get()->toArray();
        $getData = FrontHelper::buildtree($streams);
        $getLocData = FrontHelper::getCategoryWithSubCat($getData);
        return view('admin.location.edit',compact('getLocData','location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        
        $this->validate($request,[
            'name' => 'required',
            
        ]);
        $oldFilename = $location->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
                Storage::disk('public')->delete($oldFilename);
            }   
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('image');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'location/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $location->image = $image_name;
        }
        $location->name = $request->name;
        $location->parent_category = $request->parent_category;
        $location->description = $request->description;
        $location->update();
        return redirect()->route('admin.location')->with('success','Location Updated Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('admin.location')->with('success','Location Deleted Successfully');
    }

    /**
     * Change the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function status(Location $location)
    {
        $location->status=$location->status==1?0:1;
        $location->update();
        return redirect()->route('admin.location')->with('success','Location Status Changed Successfully');
    }


    /*===============================================*/
    /*===============ADD SUB LOCATION====================*/
    /*===============================================*/

    public function subLovcationIndex()
    {
        $sublocation = SubLocation::all();
        return view('admin.location.subLocIndex',compact('sublocation'));
    }
    public function subLovcationCreate()
    {
        $location = Location::where('status',1)->get();
        return view('admin.location.subLocCreate',compact('location'));
    }
    public function subLovcationStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'location_id' => 'required',
        ]);
        $location = new SubLocation;
        $location->name = $request->name;
        $location->location_id = $request->location_id;
        $location->save();
        return redirect()->route('admin.subLocation')->with('success','Sub Location Store Successfully');
    }
    public function subLovcStatus(SubLocation $subLoc)
    {
        $subLoc->status = $subLoc->status==1?0:1;
        $subLoc->update();
        return redirect()->route('admin.subLocation')->with('success','Sub Location Status Changed Successfully');
    }

    public function subLovcdestroy(SubLocation $subLoc)
    {
        $subLoc->delete();
        return redirect()->route('admin.subLocation')->with('success','Sub Location Store Successfully');
    }

}
