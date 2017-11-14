<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;
use App\Service;
use App\level;
use App\Nota;
use App\Periode;
use App\Schedule;
use App\LevelSchedule;
use Excel;
use PDF;
use DB;
use App\Mahasiswa;

class customerController extends Controller
{   


     public function __construct()
    {
        $this->middleware('auth');
    }


    public function ceknrp($id)
    {        
        $customer = Mahasiswa::where('nrp',$id)->first();
        if (is_null($customer)) {
            $customer=Customer::where('username',$id)->first();
        }
        return $customer;
    }


    public function addubaya(){
        $service=Service::all();
            return view('customer.cek',compact('service'));
    }


    public function getLevel($id){
            $level = Level::where('service_id','=',$id)->get();
        return $level;
    }

    public function getDate($id){
        $date=DB::table('schedules')->distinct()->select('schedules.id','schedules.start','schedules.capacity')->join('level_schedules','level_schedules.schedule_id','=','schedules.id')->where('level_id',$id)->whereRaw('Date(schedules.start) >= NOW()')->orderBy('schedules.start')->get();
        return $date;
    }
    public function getpick($id)
    {
        //$customer=Customer::where('username',$id)->first();
        $schedule = Schedule::whereNotNull('day')->get();
        /*return $schedule;
        $pick[];

        for ($i=0; $i < sizeof($schedule) ; $i++) { 
            $pick[$i,0]=$schedule[$i]->day;
            $pick[$i,1]=$schedule[$i]->start;
        }
        return $pick;*/
        return view('customer.schedule',compact('schedule','id'));
    }


    public function editSchedule($id)
    {
        $customer=Customer::where('username',$id)->first();
        $schedule = Schedule::where('cust_id',$customer->id)->get();
        return view('schedule.customer',compact('customer','schedule'));
    }
   
    public function index()
    {        
        $customer = Customer::orderBy('created_at','DESC')->get();
        $service=Service::orderBy('type','asc')->get();
        $level=Level::all();      
        return view('customer.index',compact('customer','service','level'));        
    }

    public function show($id)
        {
        $customer = Customer::where('username',$id)->first();
        $history= \DB::table('customers')->distinct()
        ->select('customers.id as idc','reports.grade','notas.created_at as tanggal','notas.id','notas.book_status','notas.harga as harga','notas.id as idn','customers.name as nama','services.name as service','levels.name as level','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','notas.reference as ref','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->leftjoin('reports','notas.id','=','reports.nota_id')->where([['customers.id',$customer->id],['notas.bayar','!=','daftar'],['notas.bayar','!=','retur']])->orderBy('notas.created_at', 'DESC')->get();
        $schedule=Schedule::join('customer_schedules','schedules.id','=','customer_schedules.schedule_id')->where('cust_id',$customer->id)->get();
        return view('customer.profile',compact('customer','history','schedule'));    
        }
    
    public function kursus()
    {   
        $customer=0;
        $service = Service::where('type','!=','test')->get();
        return view('nota.addc',compact('service','customer'));
    }

    public function test()
    {
         $customer=0;
        $service = Service::where('type','test')->get();
        $date = \DB::table('services')->select('levels.name as name','schedules.start as tgl', 'schedules.id as sid','schedules.capacity')->join('levels','levels.service_id','=','services.id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->where('type','test')->whereRaw('Date(schedules.start) >= CURDATE()')->orderBy('schedules.start', 'ASC')->get();
        return view('nota.addt',compact('service','preparation','test','customer','date'));
    }


    



 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tampiledit = Customer::where('id', $id)->first();
        
        return view('customer.edit')->with('tampiledit', $tampiledit);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setKursus($id)
    {       
        $nota = Nota::where('id', $id)->first();

        $price=Level::where('id',$nota->level_id)->first();
        $harga=0;
        if ($bayar=='daftar') 
        {
            $harga=$price->harga_daftar;;
        }
        else
        {
            if($asal=='ubaya')
            {
            $harga=$price->harga_ubaya;
            }
            elseif ($asal=='umum') 
            {
            $harga=$price->harga_umum;
            }
        }   


        $new= new Nota(array(
            'asal'=>$nota->asal,
            'bayar'=>$nota->bayar,
            'harga'=>$harga,
            'cust_id'=>$nota->customer_id,
            'user_id'=>$user_id,
            'level_id'=>$nota->level_id,
            'periode_id'=>$nota->periode_id
            
            ));  
        $new->save();



        $customer = \DB::table('customers')->select('customers.id as idu','notas.created_at as tanggal','customers.name as nama','services.name as service','levels.name as level','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya','notas.id as nonota')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where('notas.id',$id)->first(); 
        return view('nota.nota')->with('customer',$customer);
    }  


    public function setRetur($id)
    {       
        $update = Nota::where('id', $id)->first();
        $update->bayar = 'retur';
        $update->update();

        $customer = \DB::table('customers')->select('customers.id as idu','notas.created_at as tanggal','customers.name as nama','services.name as service','levels.name as level','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya','notas.id as nonota')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id'
            )->where('notas.id',$id)->first(); 
        return view('nota.nota')->with('customer',$customer);
    }


    public function destroy($id)
    {       
        Customer::destroy($id);
        return redirect('/admin/customers');
    } 

}
