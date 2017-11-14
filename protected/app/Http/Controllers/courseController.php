<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Post;
use App\Customer;
use App\Service;
use App\Level;
use App\LevelSchedule;
use Auth;
use DB;
use App\Room;
use App\RoomSchedule;
use App\Schedule;
use App\UserSchedule;
use App\Attendance;
use App\Periode;
use App\Report;
use App\Nota;
use Carbon\Carbon;
use App\Question;
use App\QuestionReport;

class courseController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
}


public function add()
{      

    $service=Service::where('type','!=','test')->get();
    $schedule = Schedule::whereNotNull('day')->get();
    $room=Room::all();
    $user=User::where('admin','dosen')->get();    
    return view('course.add',compact('service','user','suggest','customer','room','schedule'));        
}

public function getPick($id)
{
    $cust = Schedule::distinct()
    ->select('schedules.id','schedules.day','schedules.start',DB::raw('count(customer_schedules.schedule_id) as tot'))
    ->join('customer_schedules','schedules.id','=','customer_schedules.schedule_id')
    ->join('customers','customer_schedules.cust_id','=','customers.id')
    ->join('notas','notas.cust_id','=','customers.id')
    ->where([['course_status',0],['bayar','!=','retur'],['reference',null],['schedules.day','!=',null],['notas.level_id',$id]])
    ->groupby('schedules.id')
    ->orderBy('tot','DESC')->get();

    return $cust;
}

public function getCustomer($id)
{
    $cust = DB::table('customers')->select('notas.bayar','customers.phone1','customers.phone2','customers.name','notas.id')->join('notas','notas.cust_id','=','customers.id')->where([['course_status',0],['bayar','!=','retur'],['reference',null],['notas.level_id',$id]])->get();
    return $cust;
}




public function edit($id,$kp)
{

    $room=Room::all();
    $user=User::where('admin','dosen')->get();  

    $customer = DB::table('attendances')->select('attendances.kelas','customers.name','notas.id as nid','attendances.id as id','customers.name','notas.nilai','level_schedules.level_id as lid',DB::raw('count(attendances.nota_id) as kehadiran','attendances.nota_id'))->join('notas','notas.id','=','attendances.nota_id')->join('schedules','attendances.schedule_id','=','schedules.id')->join('level_schedules','level_schedules.schedule_id','=','schedules.id')->join('customers','notas.cust_id','=','customers.id')->where([['attendances.kelas',$kp],['level_schedules.level_id',$id]])->groupby('attendances.nota_id')->get();
    $service=DB::table('services')->select('levels.name as lname','services.name as sname','levels.id')->join('levels','levels.service_id','=','services.id')->where('levels.id',$id)->first();
    return view('course.edit',compact('customer','service','user','suggest','customer','room')); 
}

public function addcustomer($id,$kp)
{

    $existcustomer = DB::table('attendances')->select('attendances.kelas','customers.name','notas.id as nid','attendances.id as id','customers.name','notas.nilai','level_schedules.level_id as lid',DB::raw('count(attendances.nota_id) as kehadiran','attendances.nota_id'))->join('notas','notas.id','=','attendances.nota_id')->join('schedules','attendances.schedule_id','=','schedules.id')->join('level_schedules','level_schedules.schedule_id','=','schedules.id')->join('customers','notas.cust_id','=','customers.id')->where([['attendances.kelas',$kp],['level_schedules.level_id',$id]])->groupby('attendances.nota_id')->get();

    $newcustomer = Customer::select('customers.name','notas.id','notas.bayar')->join('notas','notas.cust_id','=','customers.id')->where([['course_status',0],['bayar','!=','retur'],['reference',null],['level_id',$id]])->get();

    $service=DB::table('services')->select('levels.name as lname','services.name as sname','levels.id')->join('levels','levels.service_id','=','services.id')->where('levels.id',$id)->first();
    return view('course.addc',compact('customer','service','user','suggest','existcustomer','newcustomer','id','kp')); 
}


public function customer($id,$kp,$pid){    

    $customer=Nota::distinct()->select('reports.grade as nilai','customers.name','customers.username','notas.id','attendances.status_customer','attendances.id as aid','attendances.kelas')
    ->join('customers','customers.id','=','notas.cust_id')
    ->join('attendances','attendances.nota_id','=','notas.id')
    ->join('schedules','schedules.id','=','attendances.schedule_id')
    ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
    ->join('reports','reports.nota_id','=','notas.id')
    ->join('periodes','reports.periode_id','=','periodes.id')
    /*->join('question_reports','reports.id','=','question_reports.report_id')*/
    ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id],['periodes.status','1']])
    ->groupby('customers.id')->get();

    $pengajar=User::distinct()
    ->join('attendances','attendances.user_id','=','users.id')
    ->join('schedules','schedules.id','=','attendances.schedule_id')
    ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
    ->join('reports','reports.user_id','=','users.id')
    ->join('periodes','periodes.id','=','reports.periode_id')
    ->select('attendances.user_id', 'users.name','attendances.status_user','attendances.id as id','attendances.kelas','attendances.keterangan','users.username','schedules.start')
    ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id],['periodes.status','1']])
    ->orderBy('schedules.start','ASC')->get();



    //$pengajar = User::find(2)->attendance()->where('kelas', $kp)->get();
   
    //return $pengajar;

    $jumweek=Schedule::distinct()->join('attendances','attendances.schedule_id','=','schedules.id')
    ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
    ->join('users','users.id','=','attendances.user_id')
    ->join('reports','reports.user_id','=','users.id')
    ->join('periodes','periodes.id','=','reports.periode_id')
    ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id],['periodes.id',$pid]])
    ->count('schedules.id');
    $jumweek= $jumweek/2;
    
      $level=DB::table('schedules')
    ->join('level_schedules','level_schedules.schedule_id','=','schedules.id')
    ->select('levels.id','attendances.kelas as kelas','levels.id as level_id', 'levels.name as name','schedules.start')
    ->join('levels','levels.id','=','level_schedules.level_id')
    ->join('attendances','attendances.schedule_id','=','schedules.id')
    ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id]])->first();

    

    return view('course.customer', compact('customer','level','pengajar','id','kp','jumweek','pid'));        
}


public function detail($lid,$kp,$sid){    

    $pgj=User::select('users.id','users.name')->join('attendances','attendances.user_id','=','users.id')->join('schedules','schedules.id','=','attendances.schedule_id')->where('schedules.id',$sid)->first();

    $user=User::select('users.id','users.name')
    ->where([['admin','dosen'],['id','!=',$pgj->id]])
    ->groupby('users.name')
    ->get();

    $ischeck=Attendance::distinct()->where([['schedule_id',$sid],['status_customer','!=',null]])->get();
    //return $ischeck;

    $customer=Nota::distinct()
    ->join('customers','customers.id','=','notas.cust_id')
    ->join('attendances','attendances.nota_id','=','notas.id')
    ->join('schedules','schedules.id','=','attendances.schedule_id')
    ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
    ->join('reports','reports.nota_id','=','notas.id')
    ->leftjoin('question_reports','reports.id','=','question_reports.report_id')
    ->join('periodes','reports.periode_id','=','periodes.id')
    ->select('reports.grade as nilai','customers.name','customers.username','notas.id','attendances.status_customer','attendances.id as aid','attendances.kelas','notas.book_status','question_reports.question_value')->groupby('notas.id')
    ->where('schedules.id',$sid)->get();
    // return $customer;


    $periode=Nota::distinct()
    ->join('customers','customers.id','=','notas.cust_id')
    ->join('attendances','attendances.nota_id','=','notas.id')
    ->join('schedules','schedules.id','=','attendances.schedule_id')
    ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
    ->join('reports','reports.nota_id','=','notas.id')
    ->leftjoin('question_reports','reports.id','=','question_reports.report_id')
    ->join('periodes','reports.periode_id','=','periodes.id')
    ->select('periodes.id')
    ->where('schedules.id',$sid)->first();

    $pengajar=User::distinct()
    ->join('attendances','attendances.user_id','=','users.id')
    ->join('schedules','schedules.id','=','attendances.schedule_id')
    ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
   
    ->select('attendances.user_id', 'users.name','attendances.status_user',
        'attendances.id as id','attendances.kelas','attendances.keterangan','users.username')
    ->where('schedules.id',$sid)->get();  
    //return $pengajar;

    $level=DB::table('schedules')
    ->join('level_schedules','level_schedules.schedule_id','=','schedules.id')
    ->select('levels.id','attendances.kelas as kelas','levels.id as level_id', 'levels.name as name','schedules.start')
    ->join('levels','levels.id','=','level_schedules.level_id')
    ->join('attendances','attendances.schedule_id','=','schedules.id')
    ->where([['attendances.kelas',$kp],['level_schedules.level_id',$lid]])->first();

    return view('course.detail', compact('customer','level','pengajar','user','sid','lid','kp','ischeck','periode'));        
}

public function index()
{      
    $periode=Periode::orderBy('updated_at')->get();
    $service = DB::table('services')->distinct()
    ->select('notas.book_status','services.name as name','attendances.kelas as kelas','schedules.id','rooms.name as room','schedules.day as day','users.name as pengajar','schedules.start as start','levels.name as level','levels.id as lid','periodes.id as periode_id')
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
    ->where([['periodes.status','1']])
    ->groupby('schedules.id')
    ->orderBy('schedules.start', 'ASC')->get();      

    return view('course.index',compact('periode','service'));        
}

public function show(Request $request)
{  
    $periode=Periode::orderBy('year')->get();   

    $service = DB::table('services')->distinct()
    ->select('services.name as name','attendances.kelas as kelas','schedules.id','rooms.name as room','schedules.day as day','users.name as pengajar','schedules.start as start','levels.name as level','levels.id as lid','reports.periode_id')
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
    ->where('periodes.id',$request['periode'])
    ->orderBy('levels.name', 'ASC')->get();      

    return view('course.index',compact('periode','service'));        
}
public function store(Request $request)
{
    
    //return $request->all();
    
   $level=$request['level'];
    $service=Service::select('services.name as sname','levels.name as lname','levels.minimal_customer as min')
    ->join('levels','levels.service_id','=','services.id')->where('levels.id',$level)->first();
    $user_temp=0;
    $customer=$request['customer'];
    $day=$request['day'];
    $start=$request['jadwal'];
    $user=$request['pengajar'];
    $room=$request['room'];
    $kelas=$request['kelas'];
    $pertemuan=$request['pertemuan'];
    $durasi=$request['durasi'];

    if(sizeof($customer)==0||is_null($customer))
    {
        return back()->withinput()->with('status','Customer belum dipilih!!!');
    }

    if(sizeof($customer)<$service->min)
    {
        return back()->withinput()->with('status','Jumlah customer '.sizeof($customer).' min '.$service->lname.' dibuka = '.$service->min.'!!!');
    }
    if(sizeof($user)==0||is_null($user))
    {
        return back()->withinput()->with('status','Pengajar belum dipilih!!!');
    }
    if(sizeof($room)==0||is_null($room))
    {
        return back()->withinput()->with('status','Ruang belum dipilih!!!');
    }

     for ($a=0; $a < $pertemuan/sizeof($start); $a++) {
        for ($b=0; $b < sizeof($user) ; $b++) {
        $try =Carbon::parse($start[$b]); 
            $pgj=UserSchedule::
            join('schedules','schedules.id','=','user_schedules.schedule_id')
            ->where([['user_id',$user[$b]],['schedules.start', $try]])
            ->get();

            $pgj2=UserSchedule::
            join('schedules','schedules.id','=','user_schedules.schedule_id')
            ->where([['user_id',$user[$b]],['schedules.start', $try]])
            ->first();


            $userzx=User::whereId($user[$b])->first();
        if(sizeof($pgj)>0){
        return back()->withinput()->with('status','Jadwal '.$userzx->name.' bertabrakan pada tanggal '.$pgj2->start.' !!!');
          $try->addWeek();
             }
        }
    }


     for ($v=0; $v < $pertemuan/sizeof($start); $v++) {
        
        for ($c=0; $c < sizeof($room) ; $c++) {
        $trx =Carbon::parse($start[$c]); 
            $pgj=RoomSchedule::
            join('schedules','schedules.id','=','room_schedules.schedule_id')
            ->where([['room_id',$room[$c]],['schedules.start', $trx]])->get();
        if(sizeof($pgj)>0){
        return back()->withinput()->with('status','Jadwal ruang bertabrakan !!!');
          $try->addWeek();
             }
        }
    }
    

    $cekkp=Schedule::join('attendances','attendances.schedule_id','=','schedules.id')->join('level_schedules','level_schedules.schedule_id','=','schedules.id')->join('notas','notas.id','=','attendances.nota_id')->join('reports','reports.nota_id','=','notas.id')->join('periodes','reports.periode_id','=','periodes.id')->where([['attendances.kelas',$kelas],['periodes.status','1'],['notas.level_id',$level]])->get();
    if(sizeof($cekkp)>0)
    {
        return back()->withinput()->with('status','Level '.$service->lname.' Kelas '.$kelas.' Sudah Ada!!!');
    }

    $periode=Periode::where('status','1')->first();
    
    if(Schedule::join('level_schedules','level_schedules.schedule_id','=','schedules.id')->join('attendances','attendances.schedule_id','=','schedules.id')->where([['start',$start],['level_id',$level],['attendances.kelas',$kelas]])->exists())
    {
        return back()->withinput()->with('status','Data Sudah Ada');
    }
    else
    {
        for ($i=0; $i < $pertemuan/sizeof($start) ; $i++) 
        { 
            for ($j=0; $j <sizeof($start) ; $j++) 
            {
                $rm=Room::whereId($room[$j])->first();
                $td =Carbon::parse($start[$j]);
                $starts= new Schedule(array(
                    'name'=>'kursus '.$service->sname.' - '.$service->lname.' di '.$rm->name,
                    'start'=>$td,
                    'durasi'=>$durasi
                    )); 
                $starts->save();
                $schedule_id=Schedule::max('id');
                $end=Schedule::whereId($schedule_id)->first();
                $end->end=$td->addMinutes($durasi);
                $end->update();

                $td->subMinutes($durasi);
                $start[$j]=$td->addWeek();


                $levelSchedule=new LevelSchedule(array(
                    'level_id'=>$level,
                    'schedule_id'=>$schedule_id
                    ));   
                $levelSchedule->save();

                $roomSchedule=new RoomSchedule(array(
                    'room_id'=>$room[$j],
                    'schedule_id'=>$schedule_id
                    )); 
                $roomSchedule->save();     
                 /*   if($user[$j]==$user[$j-1])
                    {}
                    else{*/
                        $userSchedule=new UserSchedule(array(
                            'user_id'=>$user[$j],
                            'schedule_id'=>$schedule_id
                            )); 
                        $userSchedule->save();
                        /*}*/

                        for ($l=0; $l <sizeof($customer) ; $l++) {                         
                            $cattendance=new Attendance(array(
                                'nota_id'=>$customer[$l],
                                'schedule_id'=>$schedule_id,
                                'kelas'=>$kelas
                                ));  
                            $cattendance->save();
                        } 
                        /*          for ($m=0; $m <sizeof($user) ; $m++) { */ 
                            $uattendance=new Attendance(array(
                                'user_id'=>$user[$j],
                                'schedule_id'=>$schedule_id,
                                'kelas'=>$kelas
                                ));  
                            $uattendance->save();
                    //}
                        }
                    }         
                }
                //$custquest=Question::where([['type','kursus'],['question_for']])

                for ($r=0; $r <sizeof($customer) ; $r++) {                    
                    for ($z=0; $z <sizeof($user) ; $z++) 
                    { 
                        if(Report::where([['user_id',$user[$z]],['nota_id',$customer[$r]]])->exists()){
                        }
                        else{
                            $report=new Report(array(
                                'nota_id'=>$customer[$r],
                                'user_id'=>$user[$z],
                                'periode_id'=>$periode->id
                                ));
                              $report->save();

                              $reportmax_id=Report::max('id');

                            $userQ=Question::where([['question_for','pengajar'],['service_type','kursus'],['question_type','pembelajaran']])->get();
                            for ($i=0; $i <sizeof($userQ) ; $i++) { 
                                $reportq=new QuestionReport(array(
                                'report_id'=>$reportmax_id,
                                'question_id'=>$userQ[$i]->id
                                ));
                            $reportq->save();
                            }
                             


                            $nota=Nota::where('id',$customer[$r])->first();
                            $nota->course_status=1;
                            $nota->update();
                            $user_temp=$user[$z];
                        }     
                    }

                }

                for ($z=0; $z <sizeof($customer) ; $z++) 
                    { 
                       
                            $report=new Report(array(
                                'nota_id'=>$customer[$z],
                                'periode_id'=>$periode->id
                                ));
                            $report->save();   

                            $reportmax_id=Report::max('id');

                            $userQ=Question::where([['question_for','peserta'],['service_type','kursus']])->get();
                            for ($i=0; $i <sizeof($userQ) ; $i++) { 
                                $reportq=new QuestionReport(array(
                                'report_id'=>$reportmax_id,
                                'question_id'=>$userQ[$i]->id
                                ));
                            $reportq->save();                     
                         }

                    }


                return Redirect('/admin/course')->with('status', 'Kelas Bahasa Berhasil ditambahkan!');
            }


            public function updatecustomer(Request $request)
            {
                //return $request->all();

                $customer=$request['cust_id'];
                $level_id=$request['level_id'];
                $kp=$request['kp'];

               $service=DB::table('level_schedules')->select('schedules.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')
               ->join('attendances','attendances.schedule_id','=','schedules.id')
               ->where([['level_id',$level_id],['attendances.kelas',$kp]])->groupby('schedules.id')->get();


               $user=DB::table('level_schedules')->select('user_id')->join('schedules','level_schedules.schedule_id','=','schedules.id')
               ->join('attendances','attendances.schedule_id','=','schedules.id')
               ->where([['level_id',$level_id],['attendances.kelas',$kp],['attendances.user_id','!=',null]])->groupby('user_id')->get();
               $periode=Periode::where('status',1)->first();
              
               //return $user;

               foreach ($service as $item) {
                for ($r=0; $r <sizeof($customer) ; $r++) {   
                $att= new Attendance(array(
                    'nota_id'=>$customer[$r],
                    'schedule_id'=>$item->id,
                    'kelas'=>$kp
                    )); 
                $att->save(); 
                foreach ($user as $items) {
                $report= new Report(array(
                    'nota_id'=>$customer[$r],
                    'user_id'=>$items->user_id,
                    'periode_id'=>$periode->id
                    )); 
                $report->save(); 
            }
                    $nota=Nota::where('id',$customer[$r])->first();
                    $nota->course_status=1;
                    $nota->update(); 

                }

               }

   


            return Redirect('/admin/course')->with('status', 'Kelas Bahasa Berhasil ditambahkan!');
        }


        public function destroy($id,$kp)
        {
            $kelas=DB::table('attendances')->distinct()->select('attendances.nota_id','attendances.schedule_id')
            ->join('schedules','attendances.schedule_id','=','schedules.id')
            ->join('level_schedules','level_schedules.schedule_id','=','schedules.id')
            ->join('notas','attendances.nota_id','=','notas.id')
            ->join('reports','reports.nota_id','=','notas.id')
            ->join('periodes','reports.periode_id','=','periodes.id')
            ->where([['level_schedules.level_id',$id],['attendances.kelas',$kp],['periodes.status','1']])->get();
            foreach ($kelas as $value){
                if(!is_null($value->nota_id)){
                    $nota=Nota::whereId($value->nota_id)->first();
                    $nota->course_status=0;
                    $nota->update();
                    Report::where('nota_id',$value->nota_id)->delete();  
                }
                Schedule::destroy($value->schedule_id);

                $att=Attendance::where('schedule_id',$value->schedule_id)->first();
                    if(!is_null($att))
                    {
                        $att->delete();
                    }
            }
            return back()->with('status','Kelas berhasil  dihapus!!');
        }
        public function hapuspeserta($nid)
        {
            $customer=DB::table('schedules')->distinct()->select('attendances.nota_id','attendances.schedule_id')->join('level_schedules','level_schedules.schedule_id','=','schedules.id')->join('levels','levels.id','=','level_schedules.level_id')->join('attendances','attendances.schedule_id','=','schedules.id')->where([['attendances.nota_id',$nid]])->get();
            Report::where('nota_id',$nid)->delete();
            Attendance::where('nota_id',$nid)->delete();
            $nota=Nota::whereId($nid)->first();
            $nota->course_status=0;
            $nota->update();
            return back();
        }
    } 