<?php

namespace App\Http\Controllers;

use App\BookingAdd;
use Illuminate\Http\Request;

class BookingAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookingAdd  $bookingAdd
     * @return \Illuminate\Http\Response
     */
    public function show(BookingAdd $bookingAdd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookingAdd  $bookingAdd
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingAdd $bookingAdd)
    {
        $book = BookingAdd::where('status',1)->first();
        return view('admin.bookingAd.index',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookingAdd  $bookingAdd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingAdd $book)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->update();
        return redirect()->route('admin.bookingAdd')->with('success','Booking Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookingAdd  $bookingAdd
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingAdd $bookingAdd)
    {
        
    }
}
