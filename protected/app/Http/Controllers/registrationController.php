<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\User;
use App\Post;
use App\Customer;
use App\Service;
use App\Level;
use Auth;

class registrationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
}
