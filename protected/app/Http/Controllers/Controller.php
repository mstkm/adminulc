<?php

namespace App\Http\Controllers;
use App\Customer;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;


    public function __construct()
  {
    //its just a dummy data object.
   // $user = Customer::all();

    // Sharing is caring
    //View::share('layouts.app', $user);
  }
}
