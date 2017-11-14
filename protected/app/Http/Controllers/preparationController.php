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



class preparationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    { 
       
        $daftar=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','daftar'],['reference',null],['type','preparation']])->count();
        $lunas=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','kursus'],['reference',null],['type','preparation']])->orwhere([['bayar','lunas'],['reference',null],['type','preparation']])->count();
        $retur=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','retur'],['reference',null],['type','preparation']])->count();
        $service = \DB::table('services')->select('services.name as name','services.id as sid','levels.name as level', 'levels.id as lid')->leftjoin('levels','levels.service_id','=','services.id')->where('services.type','=','preparation')->orderBy('services.name', 'ASC')->get();
        return view('preparation.index',compact('service','daftar','lunas','retur'));
    } 


    public function show($id)
    {
        $daftar=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','daftar'],['reference',null],['type','preparation'],['notas.level_id',$id]])->count();
        $lunas=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','kursus'],['reference',null],['type','preparation'],['notas.level_id',$id]])->orwhere([['bayar','lunas'],['reference',null],['type','preparation'],['notas.level_id',$id]])->count();
        $retur=Nota::join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->where([['bayar','retur'],['reference',null],['type','preparation'],['notas.level_id',$id]])->count();

 
    $customer = \DB::table('customers')->select('levels.name as level','customers.id as cid','customers.name as nama','notas.bayar as bayar','notas.id as idn','notas.asal as asal','notas.schedule_id as test','schedules.date as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where([['levels.id', $id],['notas.bayar','!=','daftar'],['notas.bayar','!=','retur'],['notas.course_status',0]])->orderBy('notas.bayar', 'DESC')->paginate();

    return view('preparation.Customer',compact('customer','daftar','lunas','retur'));
    }

   
}
