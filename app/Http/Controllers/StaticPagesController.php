<?php

namespace App\Http\Controllers;

use App\StaticPages;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = StaticPages::orderBy('id','DESC')->paginate(20);
        return view('admin.staticPages.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staticPages.create');
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
            'title' =>'required',
            'description' =>'required',
            'page_type' => 'required',

        ]);
        $pages = new StaticPages;
        $pages->title = $request->title;
        $pages->description = $request->description;
        $pages->type = $request->page_type;
        $pages->save();
        return redirect()->route('admin.staticPages')->with('success','Stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaticPages  $staticPages
     * @return \Illuminate\Http\Response
     */
    public function show(StaticPages $staticPages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaticPages  $staticPages
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticPages $page)
    {
        return view('admin.staticPages.create',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaticPages  $staticPages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaticPages $page)
    {
        $this->validate($request,[
            'title' =>'required',
            'description' =>'required',
            'page_type' => 'required',
        ]);
        $page->title = $request->title;
        $page->description = $request->description;
        $page->type = $request->page_type;
        $page->update();
        return redirect()->route('admin.staticPages')->with('success','Stored Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaticPages  $staticPages
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaticPages $page)
    {
        $page->delete();
        return redirect()->route('admin.staticPages')->with('success','Static Page Deleted Successfully');
    }

    /**
     * Changed the specified resource from storage.
     *
     * @param  \App\StaticPages  $staticPages
     * @return \Illuminate\Http\Response
     */
    public function status(StaticPages $page)
    {
        $page->status = $page->status==1?0:1;
        $page->update();
        return redirect()->route('admin.staticPages')->with('success','Static Page Status Changed  Successfully');
    }
}
