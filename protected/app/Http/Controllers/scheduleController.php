<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use DB;
use App\User;
use App\Post;
use App\CustomerSchedule;
use App\Customer;
use App\Service;
use App\Level;
use App\Schedule;
use Auth;
use App\Nota;
use Calendar;
use App\Room;
use Carbon\Carbon;

class scheduleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
	 public function index($id)
    {
        if (is_numeric($id)) 
        {
            $schedule = \DB::table('services')->select('services.type','schedules.name as name','levels.name as level','schedules.start as date','schedules.start as start','schedules.end as end','schedules.capacity as capacity','schedules.id as sid','levels.id as lid')->rightjoin('levels','services.id','=','levels.service_id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->where('schedules.id',$id)->orderBy('schedules.start', 'ASC')->first();
            if($schedule->type=='test')
            {
                 return redirect('admin/service/test/'.$schedule->lid.'/schedule/'.$id.'/customer');
            }
            else
            {
                $schedule=Schedule::select('attendances.kelas as kp','level_id')
                ->join('attendances','attendances.schedule_id','=','schedules.id')
                ->join('level_schedules','level_schedules.schedule_id','=','schedules.id')
                ->where('schedules.id',$id)->first();
                 return redirect('/admin/course/'.$schedule->level_id.'/class/'.$schedule->kp.'/schedule/'.$id);
            }     
        }
        else
        {
            if ($id=='all') 
            {
                $schedule = \DB::table('services')->select('schedules.name as name','levels.name as level','schedules.start as date','schedules.start as start','schedules.end as end','schedules.capacity as capacity','schedules.id as sid','levels.id as lid')->rightjoin('levels','services.id','=','levels.service_id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->where('schedules.day',null)->orderBy('schedules.start', 'ASC')->get();
            }
            elseif ($id=='room') {
                $schedule = \DB::table('rooms')->select('schedules.name as name','schedules.name as level','schedules.start as date','schedules.start as start','schedules.end as end','schedules.capacity as capacity','schedules.id as sid','rooms.id as lid')->join('room_schedules','rooms.id','=','room_schedules.room_id')->join('schedules','room_schedules.schedule_id','=','schedules.id')->orderBy('schedules.start', 'ASC')->get();
            }
            elseif ($id=='course') {
                $schedule = \DB::table('services')->select('schedules.name as name','levels.name as level','schedules.start as date','schedules.start as start','schedules.end as end','schedules.capacity as capacity','schedules.id as sid','levels.id as lid')->rightjoin('levels','services.id','=','levels.service_id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->where('services.type','!=','test')->orderBy('schedules.start', 'ASC')->get();
            }
            elseif ($id=='test') {
                $schedule = \DB::table('services')->select('schedules.name as name','levels.name as level','schedules.start as date','schedules.start as start','schedules.end as end','schedules.capacity as capacity','schedules.id as sid','levels.id as lid')->rightjoin('levels','services.id','=','levels.service_id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->where('services.type',$id)->orderBy('schedules.start', 'ASC')->get();
            }
            elseif ($id=='pick') {
                $schedule = Schedule::where('day','!=',null)->get();
                return view('schedule.list',compact('schedule'));
            }
            

        }
        
    /*$schedule = \DB::table('services')->select('services.name as name','levels.name as level','schedules.start as date','schedules.start as start','schedules.end as end','schedules.capacity as capacity','schedules.id as sid','levels.id as lid')->rightjoin('levels','services.id','=','levels.service_id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->where('schedules.cust_id',null)->orderBy('schedules.start', 'ASC')->get();*/

   $events = [];       
      
          foreach ($schedule as $key => $value) {
            $events[] = Calendar::event(
                strtoupper($value->name),
                false,
                new \DateTime($value->start.''),
                new \DateTime($value->end.''),$value->sid
                , //optional event ID
            [
                'url' => ''.$value->sid,
                //any other full-calendar supported parameters
            ]
            );
          }
       
      $calendar = Calendar::addEvents($events); 

    return view('schedule.index',compact('schedule','id','calendar'));

    }  

    
    public function create()
    {
        $room=Room::all();
        $tgl = \DB::table('services')->where('type','test')->orderBy('services.name', 'ASC')->get();
        return view('room.addschedule',compact('service','level','room'));
    }

    public function pick()
    {

        return view('schedule.pick');
    }

    public function pickstore(Request $request)
    {
        //return $request->all();
        $day=$request['day'];
        $start=$request['start'];
        $end=$request['end'];

            $schedule= new Schedule(array(
            'day'=>$day,
            'start'=>$start,
            'end'=>$end
            )); 
        $schedule->save();
        

        return redirect('admin/schedule/pick');
    }

    public function pickset(Request $request)
    {
        //return $request->all();
        $jadwal=$request['pick_id'];
        $customer_id=Customer::where('username',$request['customer_id'])->first();
        for ($i=0; $i < sizeof($jadwal); $i++) { 
            $schedule= new CustomerSchedule(array(
            'schedule_id'=>$jadwal[$i],
            'cust_id'=>$customer_id->id
            )); 
        $schedule->save();
        }      

        return redirect('admin/customer/'.$request['customer_id'].'/profile');
    }

    public function delpick($id)
    {
        //return $pid;
        $customer=Schedule::destroy($id);
        return back();
    }

    public function custdelpick($cid,$pid)
    {
        //return $pid;
        $customer=Customer::where('username',$cid)->first();
        $pick=CustomerSchedule::where([['id',$pid],['cust_id',$customer->id]])->delete();
        //return $pick;
        return back();
    }
    
    
    public function store(Request $request){
       $day=$request['day'];
        $start=$request['start'];
        $end=$request['end'];
        $date=$request['date']; 

        $cust_id=$request['customer_id']; 
        $level_id=$request['level_id'];
        $capcity=$request['capacity'];
        $room=$request['room'];
        $service=Service::select('services.name as sname','levels.name as lname')->join('levels','levels.service_id','=','services.id')->where('levels.id',$level_id)->first();
        if (is_null($cust_id)) {
            $schedule= new Schedule(array(
            'name'=>$service->sname.' - '.$service->lname.' di '.$room,
            'start'=>$start,
            'end'=>$end,
            'date'=>$end,
            'capcity'=>$capcity
            )); 
            $schedule->save(); 
            $sid=Schedule::max('id');
            $lvlschedule= new LevelSchedule(array(
            'schedule_id'=>$sid,           
            'level_id'=>$level_id
            )); 
            $lvlschedule= new RoomSchedule(array(
            'schedule_id'=>$sid,           
            'room_id'=>$room
            )); 
            $lvlschedule->save();
            return Redirect('admin/service/test/'.$level_id);  
            
         } 

         else{         
          for ($i=0; $i <sizeof($day) ; $i++) {
            $schedule= new Schedule(array(
            'day'=>$day[$i],
            'start'=>$start[$i],
            'end'=>$end[$i],
            'cust_id'=>$cust_id
            )); 
            $schedule->save();
            $id=Customer::whereId($cust_id)->first();        
        
            }
            return Redirect('admin/customer/'.$id->username.'/profile'); 
    }
         
    }
     public function edit($id)
    {
        $tampiledit = Schedule::where('id', $id)->first();
        //return $tampiledit;
        return view('test.edit')->with('tampiledit', $tampiledit);
    }

    public function update(Request $request)
    {
        //return $request->all();
        $id=$request['id'];
        $durasi=$request['durasi'];
        $date = Carbon::parse($request['date']);

        $jumcust=Nota::where('schedule_id',$id)->count();
        //return $jumcust;
        $update = Schedule::where('id', $id)->first();
        if($update->start==$request['date']){}
        else
        {
        $update->start= $date;
        }        
        
        if($update->capacity==$request['capacity']){}
        else
        {
        $update->capacity= ($request['capacity']-$jumcust);
        }
        $update->update();   



                    $end=Schedule::whereId($id)->first();
                    $end->end=$date->addMinutes($durasi);
                    $end->update();

        return Redirect('admin/service/test');
    }
}
