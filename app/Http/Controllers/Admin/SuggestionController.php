<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suggestion;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Suggestion::orderBy('id','DESC')->paginate(10);
        return view('admin.suggestion.index',compact('data'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $id)
    {
        $id->delete();
        $url = url('admin/suggestions');
        return redirect()->to($url)->with('success','Suggestion Deleted Successfully');
    }


    /**
     * Status Change the specified resource from storage.
     *
     * @param  \App\SliderInfo  $sliderInfo
     * @return \Illuminate\Http\Response
     */
    public function status(Suggestion $id)
    {
        $id->status = $id->status == 1?0:1;
        $id->update();
        $url = url('admin/suggestions');
        return redirect()->to($url)->with('success','Suggestion Status Changed Successfully');
    }
}
