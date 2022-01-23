<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use Storage;
use File;
use Image;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facility = Facility::orderBy('id','DESC')->paginate(20);
        return view('admin.facility.index',compact('facility'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.create');
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
            'name' => 'required',
            'icon' => 'required',
        ]);

        $facility = new Facility;

        if($request->hasFile('icon')){
            $fileName = 'icon';
            $thumb = 1;
            $img_folder = 'facility/';
            $facility->icon = $this->uploadedImageFiles($request,$fileName,$thumb,$img_folder);
        }

        $facility->name = $request->name;
        $facility->save();
        return redirect()->route('admin.facility')->with('success','Hotel Facility Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        return view('admin.facility.edit',compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $oldFilename = $facility->icon;
        if($request->hasFile('icon')){
            if ($oldFilename) {
                Storage::disk('public')->delete($oldFilename);    
            }
            $fileName = 'icon';
            $thumb = 1;
            $img_folder = 'facility/';
            $facility->icon = $this->uploadedImageFiles($request,$fileName,$thumb,$img_folder);
        }
        $facility->name = $request->name;
        $facility->update();
        return redirect()->route('admin.facility')->with('success','Hotel Facility Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        $oldFilename = $facility->icon;
        if(isset($oldFilename) && !empty($oldFilename)){
            Storage::delete($oldFilename);
        }
        $facility->delete();
        return redirect()->route('admin.facility')->with('success','Hotel Facility Deleted Successfully');
    }


    /**
     * Change Status the specified resource from storage.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function status(Facility $facility)
    {
        $facility->status = $facility->status==1?0:1;
        $facility->update();
        return redirect()->route('admin.facility')->with('success','Hotel Facility Status Changed Successfully');
    }

    /**
     * Get Upload with CSV Option insert all
     * 
     */
    public function createWithCsv()
    {
        return view('admin.facility.uploadCsv');
    }

    public function storeWithCsv(Request $request)
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
                $image_path = $request->file('file');
                $extension = $image_path->getClientOriginalExtension();
                $hotelName = time();
                $image_name = 'csv_file/'.$hotelName.'.'.$extension;
                Storage::disk('public')->put($image_name,  File::get($image_path));
            }

            $csv_file = public_path('uploads').'/'.$image_name;
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
                $getData[$key]['name'] = $value[1];
            }
            Facility::insert($getData);
        }else{
            return redirect()->route('admin.facility.uploadCsv')->with('error','Not a valid file');
        }

        return redirect()->route('admin.facility')->with('success','Facility Added Successfully');
    }


    /*
    * Upload Single Image 
    */
    public function uploadedImageFiles($request,$fileName,$thumb,$img_folder)
    {
        $name = time().rand(100,999);
        $image_path = $request->file($fileName);
        $extension = $image_path->getClientOriginalExtension();
        $image_name = $img_folder.'/'.$name.'.'.$extension;
        Storage::disk('public')->put($image_name,  File::get($image_path));    

        if ($thumb==1) {
            $source = Storage::disk('public')->get($image_name);
            Storage::disk('public')->makeDirectory('thumbnail/40x40/'.$img_folder);
            $target = public_path('uploads/thumbnail/40x40/' .$image_name);
            Image::make($source)->resize(40,40)->save($target);
        }
        return $image_name;
    }
}
