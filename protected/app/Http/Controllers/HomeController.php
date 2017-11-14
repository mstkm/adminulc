<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Post;
use App\Customer;
use App\Service;
use App\Level;
use Auth;
use App\Periode;
use App\Schedule;
use App\Http\Requests;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::user()->admin=='dosen'){
            $periode=Periode::orderBy('updated_at')->get();
        $service = DB::table('services')->distinct()
        ->select('services.name as name','attendances.kelas as kelas','schedules.id','rooms.name as room','schedules.day as day','users.name as pengajar','schedules.start as start','levels.name as level','levels.id as lid','periodes.id as periode_id')
        ->join('levels','levels.service_id','=','services.id')
        ->join('level_schedules','levels.id','=','level_schedules.level_id')
        ->join('schedules','schedules.id','=','level_schedules.schedule_id')
        ->join('user_schedules','user_schedules.schedule_id','=','schedules.id')
        ->join('users','users.id','=','user_schedules.user_id')
        ->join('attendances','attendances.schedule_id','=','schedules.id')
        ->join('room_schedules','room_schedules.schedule_id','=','schedules.id')
        ->join('rooms','rooms.id','=','room_schedules.room_id')
        ->join('notas','notas.id','=','attendances.nota_id')
        ->join('reports','notas.id','=','reports.nota_id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->where([['periodes.status','1'],['users.id',Auth::user()->id]])
        ->orderBy('schedules.start', 'ASC')->get(); 
            return view('course.index',compact('periode','service'));
        }
        else{
           $customer = \DB::table('customers')->select('notas.reference','users.name as staff','customers.id as idu','customers.username','customers.name as cname','notas.created_at as tanggal','notas.harga as harga','notas.id as idn','customers.name as nama','notas.reference as ref','services.name as sname','levels.name as lname','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->join('users','users.id','=','notas.user_id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->whereRaw('Date(notas.created_at) = CURDATE()')->orderBy('notas.created_at', 'DESC')->get();

           $schedule=Schedule::whereRaw('Date(schedules.start) > CURDATE()')->orwhereRaw('Date(schedules.start) = NOW()')->orderBy('start','ASC')->first();
           return view('home',compact('customer','schedule'));

       }   
   }
}
