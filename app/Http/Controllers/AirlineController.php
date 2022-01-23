<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airline;
use Storage;
use File;
class AirlineController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$data = Airline::paginate(10);
    	return view('admin.airline.index',compact('data'));
    }

    /**
     * Create Airline meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	return view('admin.airline.create');
    }

    /**
     * Store Airline meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$getData = [];
     	$extension = '';
    	$input = $request->all();
    	$this->validate($request,[
            'file' => 'required',
        ]);


        if($request->hasFile('file')){
            $image_path = $request->file('file');
            $extension = $image_path->getClientOriginalExtension();
        }

        if ($extension == 'csv') 
        {
            if($request->hasFile('file')){
            	$image_path = $request->file('file')->store('csv_file');
        	}

            $csv_file = public_path('storage').'/'.$image_path;
            $file = fopen($csv_file,"r");
            $importData_arr = array();
            $i = 0;

            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata );
                if($i == 0){
                    $i++;
                    continue; 
                }
                for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                }
                $i++;
            }
            fclose($file);
            //STORE Airline
            foreach ($importData_arr as $key => $value) {
            	$getData[$key]['airline_name'] = $value[1]; 
            	$getData[$key]['ext'] = $value[2];
            	$getData[$key]['airline_code'] = $value[3];
            	$getData[$key]['misc'] = $value[4];
            	$getData[$key]['short_code'] = $value[5];
           	}
           	Airline::insert($getData);
        }else{
			return redirect()->route('admin.airlines')->with('error','Not a valid file');
        }

    	return redirect()->route('admin.airlines')->with('success','Airline Added Successfully');
    }

    /**
     * edit Airline meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Airline $id)
    {
    	return view('admin.airline.edit',compact('id'));
    }


    /**
     * edit Airline meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Airline $id)
    {
    	$input = $request->all();
    	$this->validate($request,[
            'airline_name' => 'required',
            'ext' => 'required',
            'airline_code' => 'required',
            'misc' => 'required',
            'short_code' => 'required',
        ]);
        $oldFilename = $id->airline_icon;
        if($request->hasFile('airline_icon')){
            if(isset($oldFilename) && !empty($oldFilename)){
                Storage::disk('public')->delete($oldFilename);
            }
            $gen_rand = rand(100,9999).time();
            $image_path = $request->file('airline_icon');
            $extension = $image_path->getClientOriginalExtension();
            $image_name = 'airline/'.$gen_rand.'.'.$extension;
            Storage::disk('public')->put($image_name,  File::get($image_path));
            $input['airline_icon'] = $image_name;
        }
        $id->update($input);
    	return redirect()->route('admin.airlines')->with('success','Airline Updated Successfully');
    }


    /**
     * status Airline meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,Airline $id)
    {
    	$id->status = $id->status==1?0:1;
        $id->update();
    	return redirect()->route('admin.airlines')->with('success','Airline Status Updated Successfully');
    }

    /**
     * destroy Airline meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Airline $id)
    {	
    	$oldFilename = $id->airline_icon;
        if(isset($oldFilename) && !empty($oldFilename)){
        	Storage::delete($oldFilename);
        }
    	$id->delete();
    	return redirect()->route('admin.airlines')->with('success','Airline Deleted Successfully');
    }

}
