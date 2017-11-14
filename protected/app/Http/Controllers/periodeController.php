<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Periode;
use DB;

class periodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $all = Periode::all();
        return view('periode.index',compact('all'));
    } 

    public function create()
    { 
        
        return view('periode.add',compact('all'));
    } 

    public function status($id)
    {        
        $aktiv=Periode::all();
        foreach ($aktiv as $item) {
            $update = Periode::whereId($item->id)->first();     
            $update->status=0;
            $update->update();
        }

        $update = Periode::whereId($id)->first();     
        $update->status=1;
        $update->update();
        
        return back()->with('status', 'Data Sudah Diperbarui!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year=$request['year'];
        $quarter=$request['quarter'];
        $status=0;

        $periode=new Periode (array(
            'year'=>$year,
            'quarter'=>$quarter,
            'status'=>$status
            ));
       
        $periode->save();
        return redirect('admin/periode')->with('status', 'Data Sudah Disimpan!');
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
    public function edit($id)
    {
        $tampiledit=Periode::whereId($id)->first();
        return view('periode.edit',compact('tampiledit','id'));
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
        $year=$request['year'];
        $quarter=$request['quarter'];
        $tampiledit=Periode::whereId($id)->first();
        $tampiledit->year=$year;
        $tampiledit->quarter=$quarter;
        $tampiledit->update();
            return redirect('admin/periode')->with('status','Data berhasil diperbarui!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Periode::destroy($id);
        return back()->with('status','Data telah terhapus!!');
    }
}
