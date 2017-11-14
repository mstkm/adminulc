<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionReport;
use App\Http\Requests;
use DB;
use App\Nota;
use App\Customer;
use App\Periode;
use Khill\Lavacharts\Lavacharts;
use Lava;
use App\User;
use App\Report;
use App\Level;
use App\Schedule;
use Carbon\Carbon;
use Excel;


class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode=Periode::all();
        $finance=Nota::all();
        return view('report.finance',compact('finance','periode'));
    }

    function finance(){

        $bln=0;
        $thnpil=date('Y');
        //return $thn;
        $customer= \DB::table('customers')->select('customers.id as idu','customers.username','notas.created_at as tanggal','notas.harga','notas.id as idn','customers.name as nama','services.name as service','levels.name as level','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','notas.reference as ref','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->orderBy('notas.created_at', 'DESC')->paginate(5);

        $user=User::orderBy('birthdate','ASC')->paginate(5);

        $year=DB::table('notas')->select(DB::raw('year(notas.created_at) as tahun'))->groupby(DB::raw('year(notas.created_at)'))->get();


        $all=Nota::whereBetween('notas.created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])->sum('harga');
        //return $all;
        $daftar=Nota::where([['bayar','daftar'],['reference',null]])->whereBetween('notas.created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])->sum('harga');
        $kursus=Nota::where([['bayar','kursus'],['reference',null]])->orwhere([['bayar','lunas'],['reference',null]])->whereBetween('notas.created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])->sum('harga');
        $retur=Nota::where([['bayar','retur'],['reference',null]])->whereBetween('notas.created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])->sum('harga');
    
        $votes  =  \Lava::DataTable();        
        $dataNota = \DB::table('notas')
        ->select(
            DB::raw('MONTH(notas.created_at) as bln'),'notas.created_at as tgl', 
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="language" AND MONTH(n.created_at) = bln) as language'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="preparation" AND MONTH(n.created_at) = bln ) as prepration'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="test" AND MONTH(n.created_at) = bln) as test'))
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')        
        ->groupBy('bln')
        ->whereBetween('notas.created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])
        ->get();

        //return $dataNota;

        $votes->addStringColumn('Bulan')
            ->addNumberColumn('Kursus Bahasa')
            ->addNumberColumn('Prepration')                       
            ->addNumberColumn('Test');


            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

        foreach($dataNota as $nota){

            //$tgl= date("Y-m-d",strtotime($nota->tgl));

            //return $tgl;

            $votes->addRows([[$bulan[$nota->bln-1],$nota->language,$nota->prepration,$nota->test]]);
            }



        \Lava::BarChart('Votes')
            ->setOptions(array(
                'datatable' => $votes,
                'orientation' => 'horizontal',

            ));

   
        //PIECHART
        $nilai = \Lava::DataTable();
        $dataNilai = DB::Table('notas')->select(DB::raw('COUNT(notas.id) as tot'),'services.name as sname','levels.name as lname','level_id')->join('levels','levels.id','=','notas.level_id')->join('services','services.id','=','levels.service_id')->whereBetween('notas.created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])->groupBy('level_id')
        ->orderBy('tot','DESC')
        ->paginate(5);

        $nilai->addColumn('string','Reasons')
            ->addColumn('number','Percent');
        foreach($dataNilai as $n){
            $nilai->addRow(
                array(
                    strtoupper($n->sname.' - '.$n->lname),DB::Table('notas')->where('level_id','=',$n->level_id)
                    ->whereBetween('notas.created_at', [
                        Carbon::now()->startOfYear(),
                        Carbon::now()->endOfYear()
                    ])->count()
                )
            );
        }

        \Lava::PieChart('level_id')->setOptions(
            array(
                'datatable'=>$nilai,
                'is3D'=>false,
                'slices'=>array(
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    ))
                )
            )
        );



        //PIECHART
        $nilai = \Lava::DataTable();
        $dataNilai = DB::Table('notas')->select('services.type as tname','levels.name as lname','level_id')->join('levels','levels.id','=','notas.level_id')->join('services','services.id','=','levels.service_id')->whereBetween('notas.created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])->groupBy('type')->get();
        $nilai->addColumn('string','Reasons')
            ->addColumn('number','Percent');
        foreach($dataNilai as $n){
            $nilai->addRow(
                array(
                    strtoupper($n->tname),DB::Table('notas')->where('level_id','=',$n->level_id)
                    ->whereBetween('notas.created_at', [
                        Carbon::now()->startOfYear(),
                        Carbon::now()->endOfYear()
                    ])->count()
                )
            );
        }

        \Lava::PieChart('type')->setOptions(
            array(
                'datatable'=>$nilai,
                'is3D'=>false,
                'slices'=>array(
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    ))
                )
            )
        );

        
        return view('report.finance',compact('periode','all','daftar','lunas','kursus','retur','user','customer','year','thnpil','bln'));
    }


    function attendance(){

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
            'periodes.quarter as Periode','schedules.start as Jadwal',
            'attendances.keterangan as Materi',
            'attendances.status_user as Kehadiran',
            DB::raw('((select COUNT(attendances.status_user) from attendances a where status_user=1)/COUNT(*))*100 as Hadir'),


             DB::raw('((select COUNT(attendances.status_user) from attendances a where status_user=0)/COUNT(*))*100 as Tidak'),
             'notas.level_id')
        ->join('users','users.id','=','reports.user_id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->join('notas','reports.nota_id','=','notas.id')
        ->join('attendances','attendances.user_id','=','users.id')
        ->join('schedules','attendances.schedule_id','=','schedules.id')
        ->where('attendances.user_id','!=','null')
        ->where('periodes.year',$periode->year)
        //->groupby('users.id')
        ->orderBy('schedules.start','ASC')
        ->groupby('periodes.quarter')
        ->get();

        //return $laporan;

        $listperiode=Periode::all();


            $votes->addStringColumn('Year')
            ->addNumberColumn('Hadir')->addNumberColumn('Tidak Hadir');
           

        foreach($laporan as $nota){
            $votes->addRows([[$nota->Periode,$nota->Hadir,$nota->Tidak]]);
            }




        Lava::BarChart('Votes')
            ->setOptions(array(
                'datatable' => $votes,
                'orientation' => 'horizontal',

            ));

   


        //return $laporan;

             $year=DB::table('notas')->select(DB::raw('year(notas.created_at) as tahun'))->groupby(DB::raw('year(notas.created_at)'))->get();

        return view('report.satisfaction',compact('year','listperiode'));
    }

    function jadwal(){
        $votes  =  \Lava::DataTable();
        $jadwal=Schedule::join('customers','schedules.cust_id','=','customers.id')->whereNotNull('cust_id')->get();
        $votes->addStringColumn('Name');


        foreach($jadwal as $item){
            $votes->addRows([[$item->end]]);
            }

        \Lava::BarChart('data')
            ->setOptions(array(
                'datatable' => $votes,
                'orientation' => 'vertical',
            ));

        return view('course.jadwal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id)
    {
         $customer = DB::table('customers')
         ->select('customers.username','notas.id as notaid','customers.name as nama',
            'attendances.kelas as kelas','notas.level_id as lid','services.name as service','services.type',
            'levels.name as level','notas.bayar as bayar','notas.asal as asal',
            'notas.schedule_id as test','periodes.year as tahun',
            'periodes.quarter as triwulan','notas.reference as ref',
            'levels.harga_umum as umum','levels.harga_ubaya as ubaya')
         ->join('notas','notas.cust_id','=','customers.id')
         ->join('levels','levels.id','=','notas.level_id')
         ->join('services','levels.service_id','=','services.id')
         ->leftjoin('attendances','attendances.nota_id','=','notas.id')
         ->leftjoin('reports','reports.nota_id','=','notas.id')
         ->leftjoin('periodes','periodes.id','=','reports.periode_id')
         ->where('notas.id',$id)
         ->first();  

       
  
        $userquestion=Question::distinct()->select('users.name','questions.question','question_reports.question_value','question_reports.id')->join('question_reports','question_reports.question_id','=','questions.id')
        ->join('reports','question_reports.report_id','=','reports.id')->join('users','users.id','=','reports.user_id')
        ->where([['nota_id',$id],['question_for','pengajar']])->get();

        //return $userquestion;
        
       
        $waktuquestion=Question::select('questions.question','question_reports.question_value','question_reports.id')->join('question_reports','question_reports.question_id','=','questions.id')
        ->join('reports','question_reports.report_id','=','reports.id')
        ->where([['nota_id',$id],['question_type','waktu']])     
        ->get();

        //return $waktuquestion;

        //  $userQ=Question::where([['question_for','pengajar'],['service_type','kursus']])->get();
        // return $userQ;
        $materiquestion=Question::select('questions.question','question_reports.question_value','question_reports.id')->join('question_reports','question_reports.question_id','=','questions.id')
        ->leftjoin('reports','question_reports.report_id','=','reports.id')
        ->where([['nota_id',$id],['question_type','materi']])
        ->get();

        $kepuasanquestion=Question::select('questions.question','question_reports.question_value','question_reports.id')->join('question_reports','question_reports.question_id','=','questions.id')
        ->join('reports','question_reports.report_id','=','reports.id')
        ->where([['nota_id',$id],['question_type','kepuasan']])
        ->groupby('questions.id')
        ->get();


         $user=DB::table('notas')
         ->select('reports.user_id as userid','users.name as name')
         ->join('reports','reports.nota_id','=','notas.id')
         ->join('users','users.id','=','reports.user_id')
         ->where('notas.id',$id)
         ->groupBy('users.id')
         ->get();




        return view('report.add',compact('customer','user','userquestion','userquestion','waktuquestion','materiquestion','kepuasanquestion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $kp=$request['kp'];
        $id=$request['id'];
        //$user_id=$request['userid'];
        $nota_id=$request['notaid'];
        
        $materi=$request['materi'];
        $materi_id=$request['materi_id'];

         $waktu=$request['waktu'];
        $waktu_id=$request['waktu_id'];

        $pembelajaran_id=$request['pembelajaran_id'];
        $pembelajaran=$request['pembelajaran'];

        
        $kepuasan_id=$request['kepuasan_id'];


       
        $advice=$request['advice'];

        for ($i=0; $i < sizeof($materi) ; $i++) { 
 
        $simmateri=QuestionReport::whereId($materi_id[$i])->first();
        $simmateri->question_value=$materi[$i];
        $simmateri->save();
        }

        for ($i=0; $i < sizeof($waktu) ; $i++) { 
 
        $simmateri=QuestionReport::whereId($waktu_id[$i])->first();
        $simmateri->question_value=$waktu[$i];
        $simmateri->save();
        }


        for ($i=0; $i < sizeof($pembelajaran); $i++) { 
 
        $simmateri=QuestionReport::whereId($pembelajaran_id[$i])->first();
        $simmateri->question_value=$pembelajaran[$i];
        $simmateri->save();
        }


        for ($i=0; $i < sizeof($kepuasan_id) ; $i++) { 
 
        $simmateri=QuestionReport::whereId($kepuasan_id[$i])->first();

        return $simmateri;
        $simmateri->question_value=$request['kepuasan'.$i];
        $simmateri->save();
        }


        $simmateri=Report::where('nota_id',$nota_id)->first();
        $simmateri->advice=$request['advice'];;
        $simmateri->save();



       // $report=Report::where('nota_id',$nota_id)->first();


     

 
      return redirect('admin/course/')->with('status','Data evaluasi Berhasil disimpan!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showreportcourse($lid,$kp,$pid)
    {    $level = DB::Table('reports')->join('periodes','periodes.id','=','reports.periode_id')->distinct()
        ->select('levels.id','levels.name','periodes.quarter as quarter')
        ->join('notas','reports.nota_id','=','notas.id')
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')
        ->where('levels.id',$lid)
        ->first();

       $customer=Report::distinct()
        ->select('services.name as Bahasa','levels.name as Level','customers.name as Nama','reports.grade as Nilai')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->join('notas','reports.nota_id','=','notas.id')
        ->join('customers','notas.cust_id','=','customers.id')
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')
           ->where([['level_id',$lid],['periodes.id',$pid]])
        ->get();


        $pengajar=Report::distinct()
        ->select('users.name as Nama','schedules.start as Jadwal','attendances.status_user as Kehadiran','attendances.keterangan as Materi')
        ->join('users','users.id','=','reports.user_id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->join('notas','reports.nota_id','=','notas.id')
        ->join('attendances','attendances.user_id','=','users.id')
        ->join('schedules','attendances.schedule_id','=','schedules.id')
        ->where([['level_id',$lid],['periodes.id',$pid]])
        //->groupby('users.id')
        ->orderBy('schedules.start','ASC')
        ->get();

        //return $pengajar;


        Excel::create($level->name.' - '.$level->quarter, function($excel)  use($customer,$pengajar)
            {
                $excel->sheet('peserta', function($sheet) use($customer)
                    {
                        $sheet->fromArray($customer);
                    });

                $excel->sheet('pengajar', function($sheet) use($pengajar)
                    {
                        $sheet->fromArray($pengajar);
                    });
            })->download('xls');
        return back();



       
       /* $id=$pid;

        $level = DB::Table('reports')->distinct()
        ->select('levels.id','levels.name')
        ->join('notas','reports.nota_id','=','notas.id')
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')
        ->where('reports.periode_id',$id)
        ->first();

       $q1avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])->avg('q1');
       $q2avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])->avg('q2');
       $q3avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])->avg('q3');
       $q4avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])->avg('q4');
       $q5avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])->avg('q5');
       $q6avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])->avg('q6');

        $periode=Periode::all();
   
        //PIECHART
        $nilai = \Lava::DataTable();  
        $nilai->addColumn('string','Reasons')
            ->addColumn('number','Percent')
            ->addRow(['Puas', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['q19',1],['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])->count()])
            ->addRow(['Tidak Puas', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['q19',0],['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])->count()]);  

        \Lava::PieChart('kursus')->setOptions(
            array(
                'datatable'=>$nilai,
                'is3D'=>false,
                'slices'=>array(
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    ))
                )
            )
        );

        $lagi = \Lava::DataTable();  
        $lagi->addColumn('string','Reasons')
            ->addColumn('number','Percent')
            ->addRow(['Ya', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['q20',1],['reports.periode_id',$id],['notas.level_id',$lid]])->count()])
            ->addRow(['Tidak', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['q20',0],['reports.periode_id',$id],['notas.level_id',$lid]])->count()]);  

        \Lava::PieChart('lagi')->setOptions(
            array(
                'datatable'=>$lagi,
                'is3D'=>false,
                'slices'=>array(
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    ))
                )
            )
        );

        $layanan = \Lava::DataTable();  
        $layanan->addColumn('string','Reasons')
            ->addColumn('number','Percent')
            ->addRow(['Puas', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['q21',1],['reports.periode_id',$id],['notas.level_id',$lid]])->count()])
            ->addRow(['Tidak Puas', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->join('attendances','attendances.nota_id','=','notas.id')->where([['q21',0],['reports.periode_id',$id],['notas.level_id',$lid]])->count()]);  

        \Lava::PieChart('layanan')->setOptions(
            array(
                'datatable'=>$layanan,
                'is3D'=>false,
                'slices'=>array(
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    ))
                )
            )
        );

        $user=DB::Table('notas')->distinct()->select(
            DB::raw('AVG(q7) as q7'),
            DB::raw('AVG(q8) as q8'),
            DB::raw('AVG(q9) as q9'),
            DB::raw('AVG(q10) as q10'),
            DB::raw('AVG(q11) as q11'),
            DB::raw('AVG(q12) as q12'),
            DB::raw('AVG(q13) as q13'),
            DB::raw('AVG(q14) as q14'),
            DB::raw('AVG(q15) as q15'),
            DB::raw('AVG(q16) as q16'),
            DB::raw('AVG(q17) as q17'),
            DB::raw('AVG(q18) as q18'),
            DB::raw('(COUNT(status_user)/COUNT(attendances.user_id))/100 as present'),
            'users.name','users.id')
        ->join('reports','reports.nota_id','=','notas.id')
        ->join('attendances','attendances.nota_id','=','notas.id')
        ->join('users','users.id','=','reports.user_id')
        ->where([['reports.periode_id',$id],['attendances.kelas',$kp],['notas.level_id',$lid]])
        ->groupby('users.id')->get();

         return view('course.report',compact('periode','q1avd','q2avd','q3avd','q4avd','q5avd','q6avd','level','customer','user','lid','pid','kp'));*/
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function course()
    {
        $now=Periode::where('status',1)->first();
        $id=$now->id;
        $level = DB::Table('reports')->distinct()
        ->select('levels.id','levels.name')
        ->join('notas','reports.nota_id','=','notas.id')
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')
        ->where('reports.periode_id',$id)
        ->first();

       $q1avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['reports.periode_id',$id]])->avg('q1');
       $q2avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['reports.periode_id',$id]])->avg('q2');
       $q3avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['reports.periode_id',$id]])->avg('q3');
       $q4avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['reports.periode_id',$id]])->avg('q4');
       $q5avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['reports.periode_id',$id]])->avg('q5');
       $q6avd=DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['reports.periode_id',$id]])->avg('q6');

       
        /*$user=DB::table('notas')->select('reports.user_id as userid','users.name as name')->join('reports','reports.nota_id','=','notas.id')->join('users','users.id','=','reports.user_id')->where([['notas.level_id',$id],['user_id']])->groupBy('users.id')->get();*/
        
        $periode=Periode::all();



   
        //PIECHART
        $nilai = \Lava::DataTable();  
        $nilai->addColumn('string','Reasons')
            ->addColumn('number','Percent')
            ->addRow(['Puas', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['q19',1],['reports.periode_id',$id]])->count()])
            ->addRow(['Tidak Puas', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['q19',0],['reports.periode_id',$id]])->count()]);  

        \Lava::PieChart('kursus')->setOptions(
            array(
                'datatable'=>$nilai,
                'is3D'=>false,
                'slices'=>array(
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    ))
                )
            )
        );

        $lagi = \Lava::DataTable();  
        $lagi->addColumn('string','Reasons')
            ->addColumn('number','Percent')
            ->addRow(['Ya', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['q20',1],['reports.periode_id',$id]])->count()])
            ->addRow(['Tidak', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['q20',0],['reports.periode_id',$id]])->count()]);  

        \Lava::PieChart('lagi')->setOptions(
            array(
                'datatable'=>$lagi,
                'is3D'=>false,
                'slices'=>array(
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    ))
                )
            )
        );

        $layanan = \Lava::DataTable();  
        $layanan->addColumn('string','Reasons')
            ->addColumn('number','Percent')
            ->addRow(['Puas', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['q21',1],['reports.periode_id',$id]])->count()])
            ->addRow(['Tidak Puas', DB::Table('notas')->join('reports','reports.nota_id','=','notas.id')->where([['q21',0],['reports.periode_id',$id]])->count()]);  

        \Lava::PieChart('layanan')->setOptions(
            array(
                'datatable'=>$layanan,
                'is3D'=>false,
                'slices'=>array(
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    )),
                    \Lava::Slice(array(
                        'offset' => 0.05
                    ))
                )
            )
        );
        
        return view('report.course',compact('periode','q1avd','q2avd','q3avd','q4avd','q5avd','q6avd','level','customer'));
    
        
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
        //
    }
}
