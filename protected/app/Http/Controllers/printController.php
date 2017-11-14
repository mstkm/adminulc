<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Report;
use App\Nota;
use DB;
use App\User;
use App\Post;
use App\Customer;
use App\Service;
use App\Level;
use Auth;
use PDF;
use App\Schedule;
use Excel;
use App\Periode;
use App\Attendance;

class printController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function excel()
    {
       $customer=Customer::all();
        Excel::create('doc', function($excel) use($customer)
        {$excel->sheet('doc', function($sheet) use($customer)
        {$sheet->fromArray($customer);});
        })->download('xls');
    }


    public function absen()
    {
       $customer=Customer::all();
        Excel::create('doc', function($excel) use($customer)
        {$excel->sheet('doc', function($sheet) use($customer)
        {$sheet->fromArray($customer);});
        })->download('xls');
    }


    public function printolaporankursus($lid,$kp,$pid)
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



        $laporan=Attendance::distinct()->select('questions.question as Question','users.name as Pengajar',DB::raw('AVG(question_value) as Ratarata'))
        ->join('notas','notas.id','=','attendances.nota_id')
        ->join('reports','reports.nota_id','=','notas.id')
        ->join('question_reports','question_reports.report_id','=','reports.id')
        ->join('questions','questions.id','=','question_reports.question_id')
        ->leftjoin('users','users.id','=','reports.user_id')
        ->where([['notas.level_id',$lid],['attendances.kelas',$kp],['reports.periode_id',$pid]])
        ->groupby('question_reports.id')->orderBy('questions.question_for','DESC')->get();

        //return $laporan;


        Excel::create($level->name.' - '.$level->quarter, function($excel)  use($customer,$pengajar,$laporan)
            {
                $excel->sheet('peserta', function($sheet) use($customer)
                    {
                        $sheet->fromArray($customer);
                    });

                $excel->sheet('pengajar', function($sheet) use($pengajar)
                    {
                        $sheet->fromArray($pengajar);
                    });

                $excel->sheet('laporan', function($sheet) use($laporan)
                    {
                        $sheet->fromArray($laporan);
                    });
            })->download('xls');
        return back();
        }

  
    public function printkeuangan($bid,$tid)
    {

      
        if($bid<1)
        {
            $dataNota = Nota::select(
            DB::raw('MONTH(notas.created_at) as Bulan'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="language" AND MONTH(n.created_at) = Bulan) as Language'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="preparation" AND MONTH(n.created_at) = Bulan ) as Preparation'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="test" AND MONTH(n.created_at) = Bulan) as Test'))
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')        
        ->groupBy('Bulan')
        ->whereRaw('YEAR(notas.created_at) = '.$tid)
        ->get();

          $nota = Customer::select('users.name as Staff','customers.name as Nama','notas.created_at as tanggal','notas.harga as Harga','notas.id as No.Nota','services.name as Layanan','levels.name as Level','notas.bayar as Bayar','notas.asal as Asal','schedules.start as TanggalTest')
        ->join('notas','notas.cust_id','=','customers.id')
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','levels.service_id','=','services.id')
        ->join('users','users.id','=','notas.user_id')
        ->leftjoin('schedules','notas.schedule_id','=','schedules.id')
        ->whereRaw('YEAR(notas.created_at) = '.$tid)
        ->orderBy('notas.created_at', 'DESC')
        ->get();

        }
        else
        {
             $dataNota = Nota::select(
                 DB::raw('MONTH(notas.created_at) as Bulan'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="language" AND MONTH(n.created_at) = Bulan) as Language'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="preparation" AND MONTH(n.created_at) = Bulan ) as Preparation'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="test" AND MONTH(n.created_at) = Bulan) as Test'))
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')        
        ->groupBy('Bulan')
        ->whereRaw('YEAR(notas.created_at) = '.$tid.' AND MONTH(notas.created_at) ='.$bid)
        ->get();
          $nota = Customer::select('users.name as Staff','customers.name as Nama','notas.created_at as tanggal','notas.harga as Harga','notas.id as No.Nota','services.name as Layanan','levels.name as Level','notas.bayar as Bayar','notas.asal as Asal','schedules.start as TanggalTest')
        ->join('notas','notas.cust_id','=','customers.id')
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','levels.service_id','=','services.id')
        ->join('users','users.id','=','notas.user_id')
        ->leftjoin('schedules','notas.schedule_id','=','schedules.id')
        ->whereRaw('MONTH(notas.created_at) ='.$bid.' AND YEAR(notas.created_at) = '.$tid)
        ->orderBy('notas.created_at', 'DESC')
        ->get();

        }

        //return $dataNota;

        Excel::create('laporankeuangan', function($excel)  use($dataNota,$nota)
            {
                $excel->sheet('peserta', function($sheet) use($dataNota)
                    {
                        $sheet->fromArray($dataNota);
                    });

                $excel->sheet('daftar nota', function($sheet) use($nota)
                    {
                        $sheet->fromArray($nota);
                    });

            })->download('xls');
        return back();

    }
    

    public function printabsen($id,$kp){
        $customer = DB::table('attendances')->select('customers.name','notas.nilai')
        ->join('notas','notas.id','=','attendances.nota_id')
        ->join('customers','notas.cust_id','=','customers.id')
        ->join('schedules','schedules.id','=','attendances.schedule_id')
        ->join('level_schedules','level_schedules.schedule_id','=','schedules.id')
        ->join('reports','notas.id','=','reports.nota_id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id],['periodes.status','1']])
        ->groupby('attendances.nota_id')->get();

        $pengajar=DB::table('level_schedules')->distinct()->select('users.name as cname','rooms.name as rname','schedules.day','schedules.start','schedules.end')->join('schedules','schedules.id','=','level_schedules.schedule_id')
        ->join('attendances','attendances.schedule_id','=','schedules.id')
        ->join('user_schedules','user_schedules.schedule_id','=','schedules.id')
        ->join('users','users.id','=','user_schedules.user_id')
        ->join('room_schedules','room_schedules.schedule_id','=','schedules.id')
        ->join('rooms','rooms.id','=','room_schedules.room_id')
        ->join('notas','notas.id','=','attendances.nota_id')
        ->join('reports','notas.id','=','reports.nota_id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id],['periodes.status','1']])
        ->groupby('users.id')->get();
        $jumweek=Schedule::distinct()
        ->join('attendances','attendances.schedule_id','=','schedules.id')
        ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
        ->join('users','users.id','=','attendances.user_id')
        ->join('reports','reports.user_id','=','users.id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id],['periodes.status','1']])->count('schedules.id');
    //return $jumweek;
        $periode=DB::table('level_schedules')->distinct()
        ->join('schedules','schedules.id','=','level_schedules.schedule_id')
        ->join('attendances','attendances.schedule_id','=','schedules.id')
        ->join('notas','attendances.nota_id','=','notas.id')
        ->where('level_schedules.level_id',$id)->join('reports','reports.nota_id','=','notas.id')->join('periodes','reports.periode_id','=','periodes.id')->first();      

        $level=DB::table('levels')->select('services.name as sname','levels.name as lname')->join('services','services.id','=','levels.service_id')->where('levels.id',$id)->first();

        $pdf = PDF::loadView('course.absen',compact('customer','pengajar','jumweek','periode','level'))->setPaper('a4')->setOrientation('landscape');
            return $pdf->stream();

            //return view('course.absen',compact('customer','pengajar','jumweek','periode'));        
    }


    public function printberita($id,$kp){
    
        $pengajar=DB::table('level_schedules')->distinct()->select('users.name as cname','rooms.name as rname','schedules.day','schedules.start','schedules.end')->join('schedules','schedules.id','=','level_schedules.schedule_id')
        ->join('attendances','attendances.schedule_id','=','schedules.id')
        ->join('user_schedules','user_schedules.schedule_id','=','schedules.id')
        ->join('users','users.id','=','user_schedules.user_id')
        ->join('room_schedules','room_schedules.schedule_id','=','schedules.id')
        ->join('rooms','rooms.id','=','room_schedules.room_id')
        ->join('notas','notas.id','=','attendances.nota_id')
        ->join('reports','notas.id','=','reports.nota_id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id],['periodes.status','1']])
        ->groupby('users.id')->get();
        $jumweek=Schedule::distinct()
        ->join('attendances','attendances.schedule_id','=','schedules.id')
        ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
        ->join('users','users.id','=','attendances.user_id')
        ->join('reports','reports.user_id','=','users.id')
        ->join('periodes','periodes.id','=','reports.periode_id')
        ->where([['attendances.kelas',$kp],['level_schedules.level_id',$id],['periodes.status','1']])->count('schedules.id');
    //return $jumweek;
        $periode=DB::table('level_schedules')->distinct()
        ->join('schedules','schedules.id','=','level_schedules.schedule_id')
        ->join('attendances','attendances.schedule_id','=','schedules.id')
        ->join('notas','attendances.nota_id','=','notas.id')
        ->where('level_schedules.level_id',$id)->join('reports','reports.nota_id','=','notas.id')->join('periodes','reports.periode_id','=','periodes.id')->first();      

        $level=DB::table('levels')->select('services.name as sname','levels.name as lname')->join('services','services.id','=','levels.service_id')->where('levels.id',$id)->first();

            $pdf = PDF::loadView('course.berita',compact('pengajar','jumweek','periode','level'));
            return $pdf->stream();       
    }


    public function printnota($id){
       
        $customer = \DB::table('customers')->select('customers.id as idu','periodes.year as year ','notas.created_at as tanggal','customers.name as nama','services.name as service','levels.name as level','schedules.day as day','notas.bayar as bayar','notas.harga as harga','notas.asal as asal','notas.schedule_id as test','schedules.date as tgltest','notas.id as nonota')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->join('periodes','periodes.id','=','notas.periode_id')->leftjoin('schedules','notas.schedule_id','=','schedules.id'
            )->where('notas.id',$id)->first();

            view()->share('customer',$customer);
            $pdf = PDF::loadView('nota.nota')->setPaper('a5')->setOption('margin-left',10)->setOption('margin-right',10)->setOption('margin-top',5)->setOption('margin-bottom',0);
            return $pdf->stream();      
            
    }
    public function printabsentest($id){
        $customer = DB::table('schedules')->select('customers.name','notas.asal')->join('notas','notas.schedule_id','=','schedules.id')->join('customers','notas.cust_id','=','customers.id')->where('schedules.id',$id)->get();

        $jumlah = \DB::table('customers')->select('levels.name as level','customers.*','notas.bayar as bayar','notas.id as idn','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where('schedules.id', $id)->count();
        $pdf = PDF::loadView('test.absen',compact('customer','jumlah'))->setPaper('a4');
            return $pdf->stream();
              
    }
    public function printberitatest($id){
        
            $schedule =Schedule::whereId($id)->first(); 
            $jumlah = \DB::table('customers')->select('levels.name as level','customers.*','notas.bayar as bayar','notas.id as idn','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where('schedules.id', $id)->count();

         
        $pdf = PDF::loadView('test.berita',compact('schedule','jumlah'))->setPaper('a4');
            return $pdf->stream(); 
            //return view('course.absen',compact('customer','pengajar','jumweek','periode'));        
    }

}
