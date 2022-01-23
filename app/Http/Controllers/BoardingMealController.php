<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardingMeal;

class BoardingMealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$meal = BoardingMeal::get();
    	return view('admin.boardingMeal.index',compact('meal'));
    }

    /**
     * Create boardingMeal meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	return view('admin.boardingMeal.create');
    }

    /**
     * Store boardingMeal meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$input = $request->all();
    	$this->validate($request,[
            'meal_code' => 'required',
            'meal_name' => 'required',
        ]);
        $meal = new BoardingMeal;
        $meal->meal_code = $input['meal_code'];
        $meal->meal_name = $input['meal_name'];
        $meal->save();
    	return redirect()->route('admin.boarding')->with('success','Meal Added Successfully');
    }

    /**
     * edit boardingMeal meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,BoardingMeal $id)
    {
    	return view('admin.boardingMeal.edit',compact('id'));
    }


    /**
     * edit boardingMeal meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BoardingMeal $id)
    {
    	$input = $request->all();
    	$this->validate($request,[
            'meal_code' => 'required',
            'meal_name' => 'required',
        ]);
        $id->meal_code = $input['meal_code'];
        $id->meal_name = $input['meal_name'];
        $id->update();
    	return redirect()->route('admin.boarding')->with('success','Meal Updated Successfully');
    }


    /**
     * status boardingMeal meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,BoardingMeal $id)
    {
    	$id->status = $id->status==1?0:1;
        $id->update();
    	return redirect()->route('admin.boarding')->with('success','Meal Status Updated Successfully');
    }

    /**
     * destroy boardingMeal meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,BoardingMeal $id)
    {
    	$id->delete();
    	return redirect()->route('admin.boarding')->with('success','Meal Deleted Successfully');
    }
   
}
