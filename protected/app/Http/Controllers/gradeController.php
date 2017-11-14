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

class gradeController extends Controller
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
            $customer = DB::table('customers')->distinct()->select(/*DB::raw('COUNT(*) as absen'),*/'notas.bayar','customers.name','notas.id')->join('notas','notas.cust_id','=','customers.id')
            ->join('attendances','attendances.nota_id','=','notas.id')
            ->join('reports','reports.nota_id','=','notas.id')
            ->join('periodes','periodes.id','=','reports.periode_id')
            ->where([['kelas',$kp],['notas.level_id',$id],['periodes.status','1']])
            ->groupby('reports.nota_id')->get();
        //    return $customer;
        return view('course.addgrade',compact('customer','id','kp'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notaid=$request['notaid'];
        $nilai=$request['nilai'];
        $id=$request['id'];
        $kp=$request['kp'];

        $customer = DB::table('customers')->distinct()->select(/*DB::raw('COUNT(*) as absen'),*/'notas.bayar','customers.name','notas.id','reports.grade')
            ->join('notas','notas.cust_id','=','customers.id')
            ->join('attendances','attendances.nota_id','=','notas.id')
            ->join('reports','reports.nota_id','=','notas.id')
            ->join('periodes','reports.periode_id','=','periodes.id')
            ->where([['kelas',$kp],['notas.level_id',$id],['periodes.status','1']])->groupby('reports.nota_id')->get();

        for ($i=0; $i <sizeof($notaid) ; $i++) { 
            DB::table('reports')
            ->where('nota_id', $customer[$i]->id)
            ->update(['grade' => $nilai[$i]]);         
        }
        return redirect('admin/course');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$kp)
    {
    //    $level=Schedule::join('level')
            $customer = DB::table('customers')->distinct()->select(/*DB::raw('COUNT(*) as absen'),*/'notas.bayar','customers.name','reports.id','reports.grade')
            ->join('notas','notas.cust_id','=','customers.id')
            ->join('attendances','attendances.nota_id','=','notas.id')
            ->join('reports','reports.nota_id','=','notas.id')
            ->join('periodes','reports.periode_id','=','periodes.id')
            ->where([['kelas',$kp],['notas.level_id',$id],['periodes.status','1']])->groupby('reports.nota_id')->get();
           //return $customer;
        return view('course.editgrade',compact('customer','id','kp'));
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
