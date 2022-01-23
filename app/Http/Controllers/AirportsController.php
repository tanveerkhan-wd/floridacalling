<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airports;
use Storage;
class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$data = Airports::paginate(10);
    	return view('admin.airports.index',compact('data'));
    }

    /**
     * Create Airports meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	return view('admin.airports.create');
    }

    /**
     * Store Airports meal plan.
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
            //STORE AIRPORTS
            foreach ($importData_arr as $key => $value) {
            	$getData[$key]['airport_name'] = $value[1]; 
            	$getData[$key]['city_name'] = $value[2];
            	$getData[$key]['country_name'] = $value[3];
            	$getData[$key]['airport_code'] = $value[4];
            	$getData[$key]['latitude'] = $value[5];
            	$getData[$key]['longitude'] = $value[6];
            	$getData[$key]['gmt'] = $value[7];
            	$getData[$key]['timezone'] = $value[8];
            	$getData[$key]['country_code'] = $value[9];
           	}
           	Airports::insert($getData);
        }else{
			return redirect()->route('admin.airports')->with('error','Not a valid file');
        }

    	return redirect()->route('admin.airports')->with('success','Airports Added Successfully');
    }

    /**
     * edit Airports meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Airports $id)
    {
    	return view('admin.airports.edit',compact('id'));
    }


    /**
     * edit Airports meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Airports $id)
    {
    	$input = $request->all();
    	$this->validate($request,[
            'airport_name' => 'required',
            'airport_code' => 'required',
            'city_name' => 'required',
            'country_name' => 'required',
            'country_code' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'gmt' => 'required',
            'timezone' => 'required',
        ]);

        $id->update($input);
    	return redirect()->route('admin.airports')->with('success','Airport Updated Successfully');
    }


    /**
     * status Airports meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,Airports $id)
    {
    	$id->status = $id->status==1?0:1;
        $id->update();
    	return redirect()->route('admin.airports')->with('success','Airports Status Updated Successfully');
    }

    /**
     * destroy Airports meal plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Airports $id)
    {
    	$id->delete();
    	return redirect()->route('admin.airports')->with('success','Airports Deleted Successfully');
    }
}
