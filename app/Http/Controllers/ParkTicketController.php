<?php

namespace App\Http\Controllers;

use App\ParkTicket;
use App\Location;
use Storage;
use Illuminate\Http\Request;

class ParkTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkPass = ParkTicket::orderBy('id','DESC')->get();
        return view('admin.parksPasses.index',compact('parkPass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = Location::groupBy('base_name')->where('status',1)->get();
        $locations = Location::select('name')->where('status',1)->get();
        return view('admin.parksPasses.create',compact('location','locations'));
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
            'title' => 'required',
            'location' => 'required',
            'price' => 'required',
            'days' => 'required',
            'number_of_Passes' => 'required',
            'image' => 'required',
            'description' => 'required',
            'what_include' => 'required',
        ]);
        $passes = new ParkTicket;
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('hotel');
            $passes->image = $image_path;
        }
        $passes->title = $request->title;
        $passes->location = $request->location;
        $passes->price = $request->price;
        $passes->days = $request->days;
        $passes->no_of_passes = $request->number_of_Passes;
        $passes->description = $request->description;
        $passes->what_included = json_encode($request->what_include);
        $passes->save();
        return redirect()->route('admin.parksPasses')->with('success','New Pass Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParkTicket  $parkTicket
     * @return \Illuminate\Http\Response
     */
    public function show(ParkTicket $parkTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParkTicket  $parkTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(ParkTicket $passes)
    {
        $locations = Location::select('name')->where('status',1)->get();
        $location = Location::groupBy('base_name')->where('status',1)->get();
        return view('admin.parksPasses.edit',compact('passes','location','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParkTicket  $parkTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParkTicket $passes)
    {
        $this->validate($request,[
            'title' => 'required',
            'location' => 'required',
            'price' => 'required',
            'days' => 'required',
            'number_of_Passes' => 'required',
            'description' => 'required',
            'what_include' => 'required',
        ]);
        $oldFilename = $passes->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
            }
        }
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('hotel');
            $passes->image = $image_path;
        }
        $passes->title = $request->title;
        $passes->location = $request->location;
        $passes->price = $request->price;
        $passes->days = $request->days;
        $passes->no_of_passes = $request->number_of_Passes;
        $passes->description = $request->description;
        $passes->what_included = json_encode($request->what_include);
        $passes->update();
        return redirect()->route('admin.parksPasses')->with('success','New Pass Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParkTicket  $parkTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParkTicket $passes)
    {
        Storage::delete($passes->image);
        $passes->delete();
        return redirect()->route('admin.parksPasses')->with('success','Pass Deleted Successfully');
    }

    public function status(ParkTicket $passes)
    {
        $passes->status = $passes->status==1?0:1;
        $passes->update();
        return redirect()->route('admin.parksPasses')->with('success','Pass Status Changed Successfully');
    }
}
