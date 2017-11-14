<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Customer;
use App\Service;
use App\Level;
use Auth;
use App\Periode;
use DB;
use App\Http\Requests;
use App\Nota;
use Khill\Lavacharts\Lavacharts;
use Lava;
use Carbon\Carbon;

class filterController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function customer(Request $request){
        $service=Service::orderBy('type','asc')->get();
        $level=Level::all();
        $sid = $request->get('service');
        $lid = $request->get('level');
        if($sid==0||$lid==0)
        {
            $customer=Customer::all();

        }
        else
        {

            $customer = \DB::table('customers')->distinct()->select('customers.username','notas.created_at as tanggal','notas.harga as harga','notas.id as idn','customers.*','services.name as service','levels.name as level','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','notas.reference as ref','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where([['services.id','=',$sid],['levels.id','=',$lid],['notas.status','=',0]])->groupBy('customers.username')->orderBy('customers.created_at', 'DESC')->get();
        }
        return view('customer.index', compact('customer','service','level'));        
    }
    public function nota(Request $request){
        $sid = $request->get('service');
        $tid = $request->get('type');
        $lid = $request->get('level');
        $pid = $request->get('periode');

        $service=Service::orderBy('type','asc')->get();
        $level=Level::all();
        $periode=Periode::orderBy('updated_at','asc')->get();     

       /* if(is_null($sid)&&is_null($lid)||is_null($pid))
        {
            $nota = \DB::table('customers')->select('notas.reference','users.name as staff','customers.id as idu','customers.username','customers.name as cname','notas.created_at as tanggal','notas.harga as harga','notas.id as idn','customers.name as nama','notas.reference as ref','services.name as sname','levels.name as lname','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->join('periodes','periodes.id','=','notas.periode_id')->join('users','users.id','=','notas.user_id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->where('periodes.id',$pid)->orderBy('notas.created_at', 'DESC')->get();
        }
        else{
*/
            $nota = \DB::table('customers')->select('notas.reference','users.name as staff','customers.id as idu','customers.username','customers.name as cname','notas.created_at as tanggal','notas.harga as harga','notas.id as idn','customers.name as nama','notas.reference as ref','services.name as sname','levels.name as lname','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')
            ->join('notas','notas.cust_id','=','customers.id')
            ->join('levels','levels.id','=','notas.level_id')
            ->join('services','levels.service_id','=','services.id')
            ->join('users','users.id','=','notas.user_id')
            ->leftjoin('schedules','notas.schedule_id','=','schedules.id')
            ->where([['services.type',$tid],['services.id',$sid],['levels.id',$lid],['periode_id',$tid]])
            ->orderBy('notas.created_at', 'DESC')->get();
        /*}*/
        return view('nota.index', compact('nota','service','level','periode'));        
    }

    public function finance(Request $request)
    {
        $year=$request->get('year');
        $month=$request->get('month');

        $user=User::orderBy('birthdate','ASC')->paginate(5);
        if(is_null($month)||$month=='0')
        {
        $all=Nota::whereRaw(' YEAR(notas.created_at) = '.$year)->sum('harga');
        $daftar=Nota::where([['bayar','daftar'],['reference',null]])
            ->whereRaw(' YEAR(notas.created_at) = '.$year)->sum('harga');
        $lunas=Nota::where([['bayar','lunas'],['reference',null]])
            ->whereRaw(' YEAR(notas.created_at) = '.$year)->sum('harga');
        $kursus=Nota::where([['bayar','kursus'],['reference',null]])
            ->whereRaw(' YEAR(notas.created_at) = '.$year)->sum('harga');
        $retur=Nota::where([['bayar','retur'],['reference',null]])
            ->whereRaw(' YEAR(notas.created_at) = '.$year)->sum('harga');
        
              
       $dataNota = \DB::table('notas')
        ->select(DB::raw('MONTH(notas.created_at) as bln'),'notas.created_at as tgl', \DB::raw('sum(notas.harga) as jumlah'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="language" AND MONTH(n.created_at) = bln) as language'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="preparation" AND MONTH(n.created_at) = bln ) as prepration'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="test" AND MONTH(n.created_at) = bln) as test'))
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')        
        ->groupBy('bln')
        ->whereRaw(' YEAR(notas.created_at) = '.$year)
        ->get();
        $dataNilai = DB::Table('notas')->select('services.name as sname','levels.name as lname','level_id')->join('levels','levels.id','=','notas.level_id')->join('services','services.id','=','levels.service_id')
            ->whereRaw('YEAR(notas.created_at) = '.$year)
            ->groupBy('level_id')->get();
        }
            else
        {
        $all=Nota::whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)->sum('harga');
        $daftar=Nota::where([['bayar','daftar'],['reference',null]])
            ->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)->sum('harga');
        $lunas=Nota::where([['bayar','lunas'],['reference',null]])
            ->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)->sum('harga');
        $kursus=Nota::where([['bayar','kursus'],['reference',null]])
            ->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)->sum('harga');
        $retur=Nota::where([['bayar','retur'],['reference',null]])
            ->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)->sum('harga');
        
              
       $dataNota = \DB::table('notas')
        ->select(DB::raw('MONTH(notas.created_at) as bln'),'notas.created_at as tgl', \DB::raw('sum(notas.harga) as jumlah'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="language" AND MONTH(n.created_at) = bln) as language'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="preparation" AND MONTH(n.created_at) = bln ) as prepration'),
            DB::raw('(SELECT SUM(n.harga) FROM services s INNER JOIN levels l on l.service_id=s.id INNER JOIN notas n on n.level_id=l.id WHERE type="test" AND MONTH(n.created_at) = bln) as test'))
        ->join('levels','levels.id','=','notas.level_id')
        ->join('services','services.id','=','levels.service_id')        
        ->groupBy('bln')
        ->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)
        ->get();


        $dataNilai = DB::Table('notas')->select('services.name as sname','levels.name as lname','level_id')->join('levels','levels.id','=','notas.level_id')->join('services','services.id','=','levels.service_id')
            ->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)
            ->groupBy('level_id')->get();
            
        }
         $votes  =  \Lava::DataTable(); 
        

        $votes->addDateColumn('Year')
            ->addNumberColumn('Kursus Bahasa')
            ->addNumberColumn('Prepration')                       
            ->addNumberColumn('Test');


        foreach($dataNota as $nota){
            $votes->addRows([[$nota->tgl,$nota->language,$nota->prepration,$nota->test]]);
            }

        \Lava::BarChart('Votes')
            ->setOptions(array(
                'datatable' => $votes,
                'orientation' => 'horizontal',

            ));


   
        //PIECHART
        $nilai = \Lava::DataTable();
        
        $nilai->addColumn('string','Reasons')
            ->addColumn('number','Percent');
        foreach($dataNilai as $n){
                 if(is_null($month)||$month=='0')
        {
            $jum=DB::Table('notas')->where('level_id','=',$n->level_id)->whereRaw('YEAR(notas.created_at) = '.$year)->count();
            
        }else{
            $jum=DB::Table('notas')->where('level_id','=',$n->level_id)->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)->count();

        }
            $nilai->addRow(
                array(
                    strtoupper($n->sname.' - '.$n->lname),$jum
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

         if(is_null($month)||$month=='0')
        {
            $dataNilai = DB::Table('notas')->select('services.type as tname','levels.name as lname','level_id')
            ->join('levels','levels.id','=','notas.level_id')->join('services','services.id','=','levels.service_id')
            ->where('level_id','=',$n->level_id)
            ->whereRaw('YEAR(notas.created_at) = '.$year)
            ->groupBy('type')->get();


            $jumlah = DB::Table('notas')->select('services.type as tname','levels.name as lname','level_id')
            ->join('levels','levels.id','=','notas.level_id')->join('services','services.id','=','levels.service_id')
            ->where('level_id','=',$n->level_id)
            ->whereRaw('YEAR(notas.created_at) = '.$year)
            ->groupBy('type')->count();

           
        }else{

            $dataNilai = DB::Table('notas')->select('services.type as tname','levels.name as lname','level_id')
            ->join('levels','levels.id','=','notas.level_id')
            ->join('services','services.id','=','levels.service_id')
            ->where('level_id','=',$n->level_id)
            ->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)
            ->groupBy('type')->get();

             $jumlah = DB::Table('notas')->select('services.type as tname','levels.name as lname','level_id')
            ->join('levels','levels.id','=','notas.level_id')
            ->join('services','services.id','=','levels.service_id')
            ->where('level_id','=',$n->level_id)
            ->whereRaw('MONTH(notas.created_at) = '.$month.' AND YEAR(notas.created_at) = '.$year)
            ->groupBy('type')->count();

        }

        
        $nilai->addColumn('string','Reasons')
            ->addColumn('number','Percent');
        foreach($dataNilai as $n){
            $nilai->addRow(
                array(
                    strtoupper($n->tname),$jumlah
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

            $customer= \DB::table('customers')->select('customers.id as idu','customers.username','notas.created_at as tanggal','notas.harga','notas.id as idn','customers.name as nama','services.name as service','levels.name as level','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','notas.reference as ref','levels.harga_umum as umum','levels.harga_ubaya as ubaya')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id')->orderBy('notas.created_at', 'DESC')->paginate(5);

            $year=DB::table('notas')->select(DB::raw('year(notas.created_at) as tahun'))->groupby(DB::raw('year(notas.created_at)'))->get();

            $bln=$month;

            $thnpil=$year[0]->tahun;
        return view('report.finance',compact('periode','all','daftar','lunas','kursus','retur','user','customer','thnpil','bln','year')); 
    }

}
