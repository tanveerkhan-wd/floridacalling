<?php

namespace App\Http\Controllers;

use App\DisneyResort;
use Illuminate\Http\Request;
use Storage;
class DisneyResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dr = DisneyResort::orderBy('id','DESC')->get();
        return view('admin.disneyResort.index',compact('dr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.disneyResort.create');
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
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $disney = new DisneyResort;
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/disney');
        }
        $disney->image = $image_path;
        $disney->title = $request->title;
        $disney->price = $request->price;
        $disney->description = $request->description;
        $disney->update();
        return redirect()->route('admin.disneyResort')->with('success','Disney Resort Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DisneyResort  $disneyResort
     * @return \Illuminate\Http\Response
     */
    public function show(DisneyResort $disneyResort)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DisneyResort  $disneyResort
     * @return \Illuminate\Http\Response
     */
    public function edit(DisneyResort $disneyResort)
    {
        return view('admin.disneyResort.create',compact('disneyResort'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DisneyResort  $disneyResort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DisneyResort $disneyResort)
    {
        $this->validate($request,[
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $oldFilename = $disneyResort->image;
        if($request->hasFile('image')){
            if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
            }
        }
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/disney');
            $disneyResort->image = $image_path;
        }
        $disneyResort->title = $request->title;
        $disneyResort->price = $request->price;
        $disneyResort->description = $request->description;
        $disneyResort->save();
        return redirect()->route('admin.disneyResort')->with('success','Disney Resort Stored Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DisneyResort  $disneyResort
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisneyResort $disneyResort)
    {
        $disneyResort->delete();
        Storage::delete($disneyResort->image);
        return redirect()->route('admin.disneyResort')->with('success','Disney Resort Deleted Successfully');
    }

    /**
     * Change status the specified resource from storage.
     *
     * @param  \App\DisneyResort  $disneyResort
     * @return \Illuminate\Http\Response
     */
    public function status(DisneyResort $disneyResort)
    {
        $disneyResort->status = $disneyResort->status==1?0:1;
        $disneyResort->update();
        return redirect()->route('admin.disneyResort')->with('success','Disney Resort Status Changed Successfully');
    }
}
