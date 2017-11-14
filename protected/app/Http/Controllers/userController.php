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
use App\Schedule;
use Calendar;
use App\Periode;
use App\Report;
use Lava;
class userController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index()
    {
        $user = User::orderBy('status','ASC')->get();
        return view('user.index')->with('user',$user);       
    }
    public function add()
    {
        return view('user.add');
    }
    public function profile()
    {
        return view('auth.profile');
    }
    public function status($id)
    {       
        $update = User::where('id', $id)->first();
        if($update->status=='blocked')
        {
            $update->status='active';
        }
        else
        {
            $update->status='blocked';
        }
            $update->update();
        
        return back()->with('status', 'Data Sudah Diperbarui!');;
    }

    public function show($id)
    {       
        $user = User::where('username', $id)->first();




          $periode=Periode::whereStatus(1)->first();
        //return $periode;
        $votes  =  \Lava::DataTable();  
        /*$laporan=Nota::select(
           'attendances.user_id','attendances.status_user'
            ,
            DB::raw('COUNT(attendances.status_user) as bln')
            //,
            //'notas.created_at as tgl'
 )      
        ->leftjoin('attendances','notas.id','=','attendances.nota_id') 
        ->leftjoin('levels','levels.id','=','notas.level_id')
        ->leftjoin('services','services.id','=','levels.service_id')        
        ->leftjoin('reports','notas.id','=','reports.nota_id') 
        ->leftjoin('periodes','periodes.id','=','reports.periode_id') 
        
        ->where([['periodes.year',$periode->year],['attendances.user_id','!=',null]])
        ->get();*/


        $laporan=Report::distinct()
        ->select(
            'periodes.quarter as Periode', 'periodes.year as year',
            DB::raw('((select COUNT(status_user) from attendances where status_user = 1)) as Hadir'),
            DB::raw('((select COUNT(status_user) from attendances where status_user != 1)) as Tidak'))
        ->join('users','users.id','=','reports.user_id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->join('notas','reports.nota_id','=','notas.id')
        ->join('attendances','attendances.user_id','=','users.id')
        ->join('schedules','attendances.schedule_id','=','schedules.id')
        //->where('attendances.user_id','!=','null')
        ->where('attendances.user_id',$user->id)
        //->groupby('users.id')
        //->orderBy('periodes.created_at','ASC')
        ->groupby('periodes.quarter')
        ->get();

        //return $laporan;

        $listperiode=Periode::all();


            $votes->addStringColumn('Year')
            ->addNumberColumn('Hadir')->addNumberColumn('Tidak Hadir');
           

        foreach($laporan as $nota){
            $votes->addRows([[$nota->year.'-'.$nota->Periode,$nota->Hadir,$nota->Tidak]]);
            }




        Lava::BarChart('Votes')
            ->setOptions(array(
                'datatable' => $votes,
                'orientation' => 'horizontal',

            ));

   


        //return $laporan;

             $year=DB::table('notas')->select(DB::raw('year(notas.created_at) as tahun'))->groupby(DB::raw('year(notas.created_at)'))->get();

        //$history= \DB::table('customers')->distinct()->select('customers.id as idc','reports.grade','notas.created_at as tanggal','notas.harga as harga','notas.id as idn','customers.name as nama','services.name as service','levels.name as level','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','notas.reference as ref','schedules.date as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->leftjoin('reports','notas.id','=','reports.nota_id')->where('customers.id',$customer->id)->orderBy('notas.created_at', 'DESC')->get();
        $schedule=Schedule::select('schedules.id','schedules.name','schedules.start','schedules.end')->join('user_schedules','schedules.id','=','user_schedules.schedule_id')->join('users','user_schedules.user_id','=','users.id')->where('users.id',$user->id)->get();


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
        return view('user.profile',compact('user','history','schedule','calendar','year','listperiode'));  
    }
    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required|alpha|unique:users,username|min:5',
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email|max:255',
            'admin' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);       
      

        $user = User::create($request->all());
             $user->password = bcrypt($request->get('password')); 
        if($request->file('photo') == "")
        {
            $user->photo = $user->photo;
        } 
        else
        {
            $file       = $request->file('photo');
            $filename = uniqid('img_'). '.' . $file->getClientOriginalExtension();
            $request->file('photo')->move("images/user/", $filename);
            $user->photo = $filename;
        }
        $user->save();
        return Redirect('/admin');
        

              
    }
    public function edit($id)
    {
        $tampiledit = User::where('id', $id)->first();
        return view('user.edit')->with('tampiledit', $tampiledit);
    }
    public function update(Request $request, $id)
    {        
        $update = User::where('id', $id)->first();
        $update->name = $request['name'];
        $update->username = $request['username'];
        
        
        if($update->password!=$request->get('password'))
        {
        $update->password = bcrypt($request->get('password')); 
        }

        $update->email = $request['email'];
        
        if($request->file('photo') == "")
        {
            $update->photo = $update->photo;
        } 
        else
        {
            $file       = $request->file('photo');
            $filename = uniqid('img_'). '.' . $file->getClientOriginalExtension();
            $request->file('photo')->move("images/user/", $filename);
            $update->photo = $filename;
        }
        
        $update->update();
        return redirect()->to('admin');
    }
    public function destroy($id)
    {       
        User::destroy($id);        
        return redirect('/admin');
    }  
}
