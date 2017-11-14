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

class attendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$kp)
    {
        $customer=Nota::distinct()->select('reports.grade as nilai','customers.name','notas.id','attendances.status_customer','attendances.id as aid','attendances.kelas')->join('customers','customers.id','=','notas.cust_id')
        ->join('attendances','attendances.nota_id','=','notas.id')
        ->join('schedules','schedules.id','=','attendances.schedule_id')
        ->join('level_schedules','schedules.id','=','level_schedules.schedule_id')
        ->join('reports','reports.nota_id','=','notas.id')->where([['attendances.kelas',$kp],['level_schedules.level_id',$id]])->groupby('attendances.nota_id')->get();

        // $customer = Nota::with(['attendance' => function($query) use ($kp) {
        //     $query->kelas = $kp;
        // }], ['level' => function($query) use ($id) {
        //     $query->kelas = $id;
        // }])->get();

        // print($customer);
        // print($customer2);

        return view('attendance.add',compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request['absen'];
        for ($i=0; $i <sizeof($data) ; $i++) {

            $absen=Attendance::whereId($data[$i])->first();
            if($absen->status_customer=='1'){}
                else{
                    $absen->status_customer=1;
                    $absen->update();
                }
            }
            return $data;
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    public function setabsen(Request $request)
    {
        //return $request->all();
        $attendance_id=$request['attendance_id'];
        $kehadiran=$request['kehadiran'];
        $pengganti_id=$request['pengganti'];
        $keterangan=$request['keterangan'];
        $absen=Attendance::whereId($attendance_id)->first();
       
        $ket='';
     
        $ref=Attendance::where('reference_id',$attendance_id)->get();
        if (!is_null($ref)) {
            foreach ($ref as $value) {
               Attendance::whereId($value->id)->delete();
           }
       }

       if($pengganti_id!=''){
        $usr=User::whereId($pengganti_id)->first();
            $ket='Digantikan oleh '.$usr->name; 
       }

       if($kehadiran==1)
       {

        $absen=Attendance::whereId($attendance_id)->first(); 
        $absen->status_user=$kehadiran;
        $absen->keterangan=$keterangan;
        $absen->update(); 
        return back()->with('status','Absensi Berhasil diperbarui!!');
        }
        else
        {
        if($pengganti_id==''){
            $absena=Attendance::whereId($attendance_id)->first(); 
            $absena->status_user=$kehadiran;
            $absena->keterangan=$keterangan;
            $absena->update(); 
            return back()->with('status','Absensi Berhasil diperbarui!!');
        }
        else
        {
           
            $absena=Attendance::whereId($attendance_id)->first(); 
            $absena->status_user='0';
            $absena->keterangan=$ket;
            $absena->update(); 

            $user= new Attendance(array(
                'schedule_id'=>$absen->schedule_id,
                'user_id'=>$pengganti_id,
                'status_user'=>'2',
                'kelas'=>$absen->kelas,
                'keterangan'=>$keterangan,
                'reference_id'=>$attendance_id
                )); 
            $user->save();
            return back()->with('status','Absensi Berhasil diperbarui!!');
        }

    }
}






public function setabsencust($id,$a)
{

    $absen=Attendance::whereId($id)->first(); 
    $absen->status_customer=$a;
    $absen->update(); 
    /*  return $absen;*/

    return back()->with('status','Absensi Berhasil diperbarui!!');
}

public function setall($sid,$a)
{

    $absen=Attendance::where([['schedule_id',$sid],['user_id',null]])->get(); 
        //return $absen;
    foreach ($absen as $item) {
        $absen=Attendance::whereId($item->id)->first(); 
        $absen->status_customer=$a;
        $absen->update(); 
    }
    return back()->with('status','Absensi Berhasil diperbarui!!');            
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
