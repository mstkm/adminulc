<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Nota;
use DB;
use App\User;
use App\Post;
use App\Customer;
use App\Service;
use App\Level;
use Auth;

class languageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    { 
        $daftar=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','daftar'],['reference',null],['type','language']])->count();
        $lunas=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','kursus'],['reference',null],['type','language']])->orwhere([['bayar','lunas'],['reference',null],['type','language']])->count();
        $retur=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','retur'],['reference',null],['type','language']])->count();
        $service = Level::select('services.id as sid', 'services.name as sname','levels.id as lid','levels.name as lname')->join('services','levels.service_id','=','services.id')->where('services.type','=','language')->orderBy('services.name', 'ASC')->get();
        return view('language.index',compact('service','daftar','lunas','retur'));
    } 


    public function show($id)
    {


       $daftar=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','daftar'],['reference',null],['notas.level_id',$id]])->count();
        $lunas=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','kursus'],['reference',null],['notas.level_id',$id]])->orwhere([['bayar','lunas'],['reference',null],['notas.level_id',$id]])->count();
        $retur=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','retur'],['reference',null],['notas.level_id',$id]])->count();


    $customer = \DB::table('customers')->select('levels.name as level','notas.reference','customers.*','notas.bayar as bayar','notas.id as idn','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where([['levels.id', $id],['notas.bayar','!=','retur'],['notas.course_status',0],['notas.reference',null]])->orderBy('notas.bayar', 'DESC')->paginate();
    $service=Service::select('services.name as sname','levels.name as lname')->join('levels','levels.service_id','=','services.id')->where('levels.id',$id)->first();

    return view('language.customer',compact('customer','daftar','lunas','retur','service'));        
    }
}
