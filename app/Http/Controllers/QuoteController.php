<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailable;
use App\Quote;
use Mail;
class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();

        //Check for data
        $check_search = isset($input['search']) && !empty($input['search']) ? $input['search'] : false;

        //GET Qutes
        $quote = Quote::orderBy('id','DESC');
        if ($check_search) {
            $quote = $quote->where('name','LIKE','%'.$check_search.'%')->orWhere('email','LIKE','%'.$check_search.'%')->orWhere('phone_number','LIKE','%'.$check_search.'%');
        }

        $quote = $quote->paginate(20);
        $viewquote = Quote::where('enquiry_type',1)->where('viewed',0)->get();
        foreach ($viewquote as $value) {
            $value->viewed = $value->viewed =1;
            $value->update();
        }
        return view('admin.quote.index',compact('quote'));
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
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        $quote->viewed = $quote->viewed =1;
        $quote->update();
        return view('admin.quote.view',compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('admin.quote')->with('success','Quote Delete Successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function status(Quote $quote)
    {
        $quote->status = $quote->status==1?0:1;
        $quote->update();
        return redirect()->route('admin.quote')->with('success','Status Delete Successfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAllQuateInfo(Request $request)
    {
        $storeNewQuate = new Quote;
        if (!empty($request->ref)) {
            print_r($storeNewQuate->ref = $request->ref); 
        }
        if (!empty($request->refname)) {
            print_r($storeNewQuate->ref_name = $request->refname);
        }
        $storeNewQuate->name = $request->f_name.' '.$request->l_name; 
        $storeNewQuate->email = $request->email; 
        $storeNewQuate->phone_number = $request->mobile_numbber;
        $storeNewQuate->enquiry_type = $request->enquiry_type;
        $storeNewQuate->message = $request->Notes;
        $storeNewQuate->holiday_type = $request->holiday_type;
        $storeNewQuate->hotel_destination = implode(',',array_filter($request->dest_name));
        
        
        $storeNewQuate->departure_date = $request->departure_date;
        $storeNewQuate->flying_from = $request->flying_from;
        
        $storeNewQuate->adults = $request->number_adults;
        $storeNewQuate->children = $request->number_children;
        $storeNewQuate->infants = $request->number_infants;

        $storeNewQuate->transport_req = $request->transport_req;
        
        $storeNewQuate->accommodation_type = $request->accommodation_type;
        $storeNewQuate->preferred_cruise = $request->preferred_cruise;
        $storeNewQuate->cabin_type = $request->cabin_type;
        $storeNewQuate->stay_time = implode(',',array_filter($request->stay_time));
        $storeNewQuate->flexible_date = $request->flexible_date;
        $storeNewQuate->number_stops = $request->number_stops;
        


        /*SEND MAIL*/
        /*$name = $request->name;
        $email = $request->email;
        $mail= Mail::send('pages.mail.send_mail',['request'=>$request],function($message) use($name,$email){
                $message->from($email,$name);
                $message->to('testing85000@gmail.com')->subject('New Registeration For Hotel');
            });*/
        $storeNewQuate->save();

        return redirect()->route('getAquote')->with('success','Your Request Is Successfully Submitted !We Contact Soon');
    }
}
