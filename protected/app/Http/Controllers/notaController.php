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
use App\Nota;
use App\Schedule;
use App\Periode;
use Auth;
use App\Mahasiswa;
use Carbon\Carbon;

class notaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
          $nota = \DB::table('customers')->select('notas.reference','users.name as staff','customers.id as idu','customers.username','customers.name as cname','notas.created_at as tanggal','notas.harga as harga','notas.id as idn','customers.name as nama','notas.reference as ref','services.name as sname','levels.name as lname','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya')
          ->join('notas','notas.cust_id','=','customers.id')
          ->join('levels','levels.id','=','notas.level_id')
          ->join('services','levels.service_id','=','services.id')
          ->join('users','users.id','=','notas.user_id')
          ->leftjoin('schedules','notas.schedule_id','=','schedules.id')
          ->orderBy('notas.created_at', 'DESC')->get();
        $service=Service::orderBy('type','asc')->get();
        $level=Level::all();
        $periode=Periode::orderBy('updated_at','asc')->get();    
        return view('nota.index',compact('nota','service','level','periode'));        
    }

    public function show($id)
    {
        $customer = \DB::table('customers')->select('customers.id as idu','notas.created_at as tanggal','customers.name as nama','services.name as service','levels.name as level','schedules.day as day','notas.bayar as bayar','notas.harga as harga','notas.asal as asal','notas.schedule_id as test','schedules.start as tgltest','notas.id as nonota')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id'
            )->where('notas.id',$id)->first();
        $periode=Periode::where('status','1')->first();
        return view('nota.nota',compact('customer','periode'));
    }

    public function edit($id)
    {        
        $tampiledit = \DB::table('customers')->select('customers.id as idu','notas.created_at as tanggal','customers.name as nama','customers.username as username','services.name as service','levels.name as level','schedules.day as day','notas.bayar as bayar','notas.asal as asal','notas.schedule_id as sid','schedules.start as tgltest','levels.harga_umum as umum','levels.harga_ubaya as ubaya','notas.id as nid')->join('notas','notas.cust_id','=','customers.id')->join('levels','levels.id','=','notas.level_id')->join('services','levels.service_id','=','services.id')->leftjoin('schedules','notas.schedule_id','=','schedules.id'
            )->where('notas.id',$id)->first();


        $date = \DB::table('services')->select('levels.name as name','schedules.start as tgl', 'schedules.id as sid','schedules.capacity')->join('levels','levels.service_id','=','services.id')->join('level_schedules','level_schedules.level_id','=','levels.id')->join('schedules','level_schedules.schedule_id','=','schedules.id')->where([['type','test'],['schedules.id','!=',$tampiledit->sid]])->whereRaw('Date(schedules.start) >= CURDATE()')->orderBy('schedules.start', 'ASC')->get();

    
        return view('nota.edit')->with('tampiledit', $tampiledit)->with('date',$date);
    }

    public function setbook($id)
    {


        $absen=Nota::whereId($id)->first(); 
        if($absen->book_status=='1')
            {$absen->book_status='0';}        
        else
            {$absen->book_status='1';}

        $absen->update(); 
       

        return back()->with('status','Data Berhasil diperbarui!!');
    }
    public function reschedule(Request $request,$id){


        $idLama=$request['oldid']; 
        $idbaru=$request['newid'];
        if ($idLama==$idbaru) 
        {
            return redirect('admin');            
        }
        else
        {   
        $nota = Nota::where('id', $id)->first();
        $nota->schedule_id=$idbaru;
        $nota->update();

        $schedule = Schedule::where('id', $idbaru)->first();
        $schedule->capacity-=1;
        $schedule->update();
       

        
        $oldschedule = Schedule::where('id', $idLama)->first();
        $oldschedule->capacity+=1;
        $oldschedule->update();

        return redirect('admin');
        }
    }

    public function update(Request $request, $id){   
        $user_id=$request['user_id']; 
        $bayar=$request['bayar']; 

        $nota=Nota::where('id',$id)->first();
        $price=Level::where('id',$nota->level_id)->first();
        if ($bayar=='kursus') 
        {
            if($nota->asal=='ubaya')
            {
            $harga=$price->harga_ubaya-$price->harga_daftar;
            }
            elseif ($nota->asal=='umum') 
            {
            $harga=$price->harga_umum-$price->harga_daftar;
            }
        }  
        elseif ($bayar=='retur') {
            if ($nota->bayar=='lunas') {
                $harga=-1*($nota->harga-$price->harga_daftar);
            } else {
                $harga=-1*$nota->harga;
            }            
        }

        $new= new Nota(array(
            'asal'=>$nota->asal,
            'bayar'=>$bayar,
            'harga'=>$harga,
            'cust_id'=>$nota->cust_id,
            'user_id'=>$user_id,
            'level_id'=>$nota->level_id,
            ));
        $new->save();

        $nota->reference=Nota::max('id');
        $nota->update();

        $notaid=Nota::max('id');

        return redirect('admin/nota/'.$notaid);
    }

 
    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required|numeric|min:1',
            'name' => 'required|max:255',
            'level' => 'required|numeric|min:1'
        ]); 

        $nama=strtolower($request['name']); 
        $username=$request['username'];       
       
        $asal=$request['asal'];
        $bayar=$request['bayar']; 
        $user_id=$request['user_id'];
        $level_id=$request['level'];
        $schedule_id=$request['schedule'];      
        $periode=Periode::where('status','1')->first();
        $price=DB::table('services')
        ->select('services.name as service', 'levels.name as level','levels.harga_daftar','levels.harga_ubaya','levels.harga_umum','levels.id')->join('levels', 'levels.service_id','=','services.id')
        ->where('levels.id',$level_id)
        ->first();

        $chkscd=Nota::join('customers','customers.id','=','notas.cust_id')->where([['username',$username],['level_id',$level_id],['schedule_id',$schedule_id]])->get();;

        if(count($chkscd)>0)
        {
            return back()->withInput()->with('status', 'Data sudah ada, harap cek data customer!!');
        }

        $harga=$price->harga_daftar;
        if ($bayar=='lunas') 
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
        elseif($bayar=='kursus')
        {
            $lsttrx=Nota::join('customers','customers.id','=','notas.cust_id')->where('customers.username',$username)->max('notas.created_at');

            if(strtotime($lsttrx) < strtotime('-365 days'))
            {
                return back()->withInput()->with('status', 'Transaksi terakhir lebih dari 1 tahun');
            }
            else
            {
                if (Nota::join('customers','customers.id','=','notas.cust_id')
                    ->where([['customers.username',$username],['level_id',$level_id],['reference',null],['bayar','!=','daftar']])->exists()||Nota::join('customers','customers.id','=','notas.cust_id'
                        )->where([['customers.username',$username],['level_id',$level_id],['reference',null],['bayar','!=','retur']])->exists()) {
                    return back()->withInput()->with('status', 'Data Sudah ada, silahkan cek di data pribadi customer!!'); 
                }
                else{
                    if($asal=='ubaya')
                    {
                    $harga=$price->harga_ubaya-$price->harga_daftar;
                    }
                    elseif ($asal=='umum') 
                    {
                    $harga=$price->harga_umum-$price->harga_daftar;
                    }    
                } 
                 
            }
        }
        if (Customer::where('username', '=', $username)->exists()) 
        {
        }
        else
        {
            $customer = new Customer(array(
            'username'=>$username,
            'name'=>$nama,
            ));        
            $customer->save();
        }

        $customer_id=Customer::where('username',$username)->first();       
        if (Nota::where([['cust_id',$customer_id->id],['level_id',$level_id],['schedule_id',$schedule_id]])->exists()||
            Nota::where([['cust_id',$customer_id->id],['level_id',$level_id],['course_status',0],['bayar','!=','retur'],['reference',null]])->exists()) 
        { 
            return back()->withInput()->with('status', 'Data customer '.strtoupper($request->name).' dengan '.strtoupper($price->service).' level '.strtoupper($price->level).' Periode '.strtoupper($periode->year).' Triwulan '.strtoupper($periode->quarter).' Sudah ada!');
        }
        else
        {               
        $nota= new Nota(array(
            'asal'=>$asal,
            'bayar'=>$bayar,
            'harga'=>$harga,
            'cust_id'=>$customer_id->id,
            'user_id'=>$user_id,
            'level_id'=>$level_id,
            'schedule_id'=>$schedule_id
            ));  
        $nota->save();

        if(is_null($schedule_id))
        {    
        }
        else
        {
        $schedule = Schedule::where('id', $schedule_id)->first();
        $schedule->capacity-=1;
        $schedule->update();
        }
        }        

        $notaid=Nota::max('id');

        return redirect('admin/nota/'.$notaid);

    }
    public function destroy($id)
    {
        Nota::destroy($id);
        return redirect('/admin');
    }
}
