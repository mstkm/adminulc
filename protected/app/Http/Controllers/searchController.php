<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Post;
use App\Customer;
use App\Service;
use App\Level;
use Auth;

use App\Http\Requests;

class searchController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function customer(Request $request){
        $service=Service::orderBy('type','asc')->get();
        $level=Level::all();
        $cari = $request->get('search');  
        $customer = Customer::where('customers.name','LIKE','%'.$cari.'%')->orderBy('name', 'ASC')->paginate(30);
        
        return view('customer.index', compact('customer','service','level'));        
    }

    public function nota(Request $request){
        $service=Service::orderBy('type','asc')->get();
        $level=Level::all();
        $date = \DB::table('services')->join('levels','services.id','=','levels.service_id')->where('type','test')->get();
        $sid = $request->get('service');
        $lid = $request->get('level');
        $did = $request->get('date');
        $cari = $request->get('search');  

            $customer = \DB::table('customers')->select('customers.*','notas.reference','notas.created_at as tanggal','notas.harga as harga','notas.id as idn','customers.name as nama','services.name as service','levels.name as level','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.date as tgltest','levels.umum as umum','levels.ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->leftjoin('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where('customers.name','LIKE','%'.$cari.'%')->orwhere('notas.id','LIKE','%'.$cari.'%')->orderBy('customers.created_at', 'DESC')->paginate(15);
        return view('nota.index', compact('customer','service','date','level'));        
    }
}
