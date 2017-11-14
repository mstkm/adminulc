<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Room;
use App\Service;
use App\Schedule;
use App\RoomSchedule;
use App\Level;
use DB;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $room=Room::all();
        
        return view('room.index',compact('room','service','level'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.add');
    }


    public function addschedule()
    {
        $room=Room::all();
        return view('room.addschedule',compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Room::where('name','=', $request->name)->exists()) 
        { 
            return redirect('/admin/class/room/add')->withInput()->with('status', 'Data Ruang '.strtoupper($request->name).' Sudah Ada!');
        }
        else{
        $room=Room::create($request->all());
        $room->save();
        return redirect('/admin/class/room')->with('status', 'Data Ruang '.strtoupper($request->name).' Tersimpan!');
        }       

    }


    public function storeschedule(Request $request){
        $day=$request->get('day'); 
        $start=$request->get('start'); 
        $end=$request->get('end'); 

        $rid=$request->get('rid'); 
        $sid=0;

        for ($i=0; $i <sizeof($day) ; $i++) {
            $schedule= new Schedule(array(
            'day'=>$day[$i],
            'start'=>$start[$i],
            'end'=>$end[$i]
            )); 
            $schedule->save(); 
            $sid=Schedule::max('id');

            $roomschedule=new RoomSchedule();
            $roomschedule->schedule_id=$sid;
            $roomschedule->room_id=$rid;
            $roomschedule->save();
        }
        
//        $schedule = Schedule::create($request->all());
        
        return Redirect('/admin/class/room')->with('status', 'Jadwal Ruang '.strtoupper($request->rname).' Tersimpan!');      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $name=Room::whereid($id)->first();
        $room=DB::table('rooms')->select('rooms.name as rname','schedules.name as sname','schedules.start','schedules.end')->join('room_schedules','rooms.id','=','room_schedules.room_id')->join('schedules','schedules.id','=','room_schedules.schedule_id')->where('rooms.id',$id)->get();
        
        return view('room.show',compact('room','name'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tampiledit=Room::whereid($id)->first();
        return view('room.edit',compact('tampiledit'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
        public function destroy($id)
    {   
        $room=Room::where('id',$id)->first();
        Room::destroy($id);

        return back()->with('status', 'Data Ruang '.strtoupper($room->name).' Terhapus!');
    } 
    
}
