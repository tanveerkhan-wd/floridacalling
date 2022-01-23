<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Callback;
use App\FollowOn;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = Contact::where('status','=',1)->first();
        return view('admin.contactUs.index',compact('getData'));
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
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request,[
            'phone_number' => 'required',
            'email' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        $contact->phone_number = $request->phone_number; 
        $contact->email = $request->email; 
        $contact->location = $request->location; 
        $contact->description = $request->description;
        $contact->update();
        return redirect()->route('admin.contactus')->with('success','Contact Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }


    /*=========================================*/
    /*===========CALL BACK=============*/
    /*=========================================*/
    
    public function callBack()
    {
        $callBack = Callback::orderBy('id','DESC')->paginate(20);
        return view('admin.contactUs.call-back',compact('callBack'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function callBackDestroy(Callback $callback)
    {
        $callback->delete();
        return redirect()->route('admin.callBack')->with('success','Deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function callBackStatus(Callback $callback)
    {
        $callback->status = $callback->status==1?0:1;
        $callback->update();
        return redirect()->route('admin.callBack')->with('success','Status Changed Successfully');
    }

    /**
     * Show the specified resource from storage.
     *
     * @param  \App\Contact  $followon
     * @return \Illuminate\Http\Response
     */
    public function followOn()
    {
        $follow = FollowOn::first();
        return view('admin.contactUs.follow-on',compact('follow'));
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Contact  $followon
     * @return \Illuminate\Http\Response
     */
    public function followOnUpdate(Request $request, FollowOn $followOn)
    {
        $this->validate($request,[
            'facebook' => 'required',
            'pinterest' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
        ]);

        $followOn->facebook = $request->facebook;
        $followOn->instagram = $request->instagram;
        $followOn->tweet = $request->twitter;
        $followOn->pinterest = $request->pinterest;
        $followOn->update();
        return redirect()->route('admin.follow-on')->with('success','Updated Successfully');
    }
}
