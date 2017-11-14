<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use App\User;
use App\Room;
use App\Service;
use Carbon\Carbon;
use App\Schedule;
use App\LevelSchedule;
use App\RoomSchedule;
use Calendar;
use App\Level;
use App\Http\Requests;

class testController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
 

     public function index()
    { 
        $service = \DB::table('services')->select('services.name as name','services.id as sid','levels.name as level', 'levels.id as lid')->leftjoin('levels','levels.service_id','=','services.id')->where('services.type','=','test')->orderBy('services.name', 'ASC')->paginate(15);; 
        return view('test.index',compact('service'));
    } 



    public function showSchedule($id)
    {


    $schedule = \DB::table('services')->select('services.name as name','levels.name as level','schedules.start as date','schedules.start as start','schedules.end as end','schedules.capacity as capacity','schedules.id as sid','levels.id as lid')->rightjoin('levels','services.id','=','levels.service_id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->whereRaw('schedules.start > NOW()')->where('type','test')->orderBy(DB::Raw('schedules.start'), 'ASC')->get();
    return view('test.schedule',compact('schedule','id'));  
        
    }


    public function showallSchedule($id)
    {
   $schedule = \DB::table('services')->select('schedules.name as name','levels.name as level','schedules.start as date','schedules.start as start','schedules.end as end','schedules.capacity as capacity','schedules.id as sid','levels.id as lid')->rightjoin('levels','services.id','=','levels.service_id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->where('levels.id',$id)->orderBy('schedules.start', 'ASC')->get();
    return view('test.list',compact('schedule','id'));
        
    }



    public function showCustomer($lid,$sid)
    {
    $customer = \DB::table('customers')->select('levels.name as level','customers.*','notas.bayar as bayar','notas.id as idn','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where([['level_id',$lid],['schedules.id', $sid]])->orderBy('notas.bayar', 'DESC')->get();
    $jumlah = \DB::table('customers')->select('levels.name as level','customers.*','notas.bayar as bayar','notas.id as idn','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where([['level_id',$lid],['schedules.id', $sid]])->count();
    
    $level=Level::select('levels.name as lname','services.name as sname','schedules.start')->join('services','services.id','=','levels.service_id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','schedules.id','=','level_schedules.schedule_id')->where('schedules.id',$sid)->first();
    return view('test.customer',compact('customer','sid','level','jumlah'));
        
    }




    public function add()
    {
        $service = \DB::table('services')->where('type','test')->orderBy('services.name', 'ASC')->get(); 
        $room=Room::all();
        $tgl = \DB::table('services')->where('type','test')->orderBy('services.name', 'ASC')->get();
        return view('test.add',compact('service','level','room'));
    }



    public function store(Request $request){
        //return $request->all();
        $day=$request['day']; 
        $date=$request['date']; 
        $start=$request['start'];
        $jadwal=$request->get('jadwal'); 
        $room=$request['room_id']; 

        $user_id=$request['user_id']; 
        $level_id=$request['level_id']; 
        $service=Service::select('services.name as sname','levels.name as lname')->join('levels','levels.service_id','=','services.id')->where('levels.id',$level_id)->first();
        $capacity=$request['capacity']; 
        $durasi=$request['durasi']; 
        $cust_id=$request['cust_id']; 

        if(Schedule::join('level_schedules','level_schedules.schedule_id','=','schedules.id')->where([['start',$start],['level_schedules.level_id',$level_id]])->exists())
        {
            return back()->withinput()->with('status', 'Data Sudah Ada!');
        }
        else
        {

             $rm=Room::whereId($room)->first();
                    $td =Carbon::parse($jadwal);
                    $starts= new Schedule(array(
                        'name'=>'test '.$service->sname.' - '.$service->lname.' di '.$rm->name,
                        'start'=>$td,
                        'capacity'=>$capacity,
                        'cust_id'=>$cust_id
                        )); 
                    $starts->save();
                    $schedule_id=Schedule::max('id');
                    $end=Schedule::whereId($schedule_id)->first();
                    $end->end=$td->addMinutes($durasi);
                    //$end->course_status=0;
                    $end->update();

            $schedulelevel = new LevelSchedule(array(          
                'schedule_id'=>$schedule_id,            
                'level_id'=>$level_id           
                )); 
            $schedulelevel->save(); 
            $roomschedule = new RoomSchedule(array(          
                'schedule_id'=>$schedule_id,            
                'room_id'=>$room           
                )); 
            $roomschedule->save();       
        }        
        return Redirect('/admin/service/test'.$level_id.'schedule')->with('status','Jadwal test tersimpan');      
    }
/*
    public function edit($id)
    {
        $tampiledit = Customer::where('id', $id)->first();
        return view('customer.edit')->with('tampiledit', $tampiledit);
    }*/
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Customer::where('id', $id)->first();
        $update->name = $request['name'];
        $update->phone = $request['phone'];
        $update->username = $request['username'];
        $update->email = $request['email'];
        
        if($request->file('photo') == "")
        {
            $update->photo = $update->photo;
        } 
        else
        {
            $file       = $request->file('photo');
            $filename = uniqid('img_'). '.' . $file->getClientOriginalExtension();
            $request->file('photo')->move("images/customer/", $filename);
            $update->photo = $filename;
        }
        
        $update->update();
        return redirect()->to('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        customers::destroy($id);
        return redirect('/admin');
    }  
}
