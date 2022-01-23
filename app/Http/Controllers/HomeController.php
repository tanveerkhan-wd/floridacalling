<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Location;
use App\User;
use App\Hotel;
use App\Quote;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counter['hotel'] = Hotel::count();
        $counter['leads'] = Quote::count();
        $counter['active_leads'] = Quote::where('viewed',0)->where('status',1)->count();
        $counter['location'] = Location::where('status',1)->count();
        return view('admin.index',compact('counter'));
    }

    /**
     * Show the application change password field.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managePassword()
    {
        $getData = User::where('id','=',Auth::User()->id)->first();
        return view('admin.managePassword.index',compact('getData'));
    }

    /**
     * Update password field.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function PasswordUpdate(Request $request , User $user)
    {
        $this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->route('admin.manage-password')->with('success','Password Updated Successfullly '); 
    }
}
