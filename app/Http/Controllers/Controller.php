<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Contact;
use App\FollowOn;
use View;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $contact;
    public $follow;

    public function __construct(){
    	$this->middleware(function ($request, $next) {
    		$this->follow = FollowOn::first();
			$this->contact = Contact::first();
			View::share('contact', $this->contact);
			View::share('follow', $this->follow);
    	
	        return $next($request);    	
    	});
   	}
}
