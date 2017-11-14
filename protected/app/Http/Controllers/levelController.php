<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use App\Level;
use DB;

class levelController extends Controller
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
    public function create()    
    {
        $service=DB::table('services')->distinct()->select('type')->get();
        return view('service.level', compact('service'));
    }

    public function getService($id){
            $service = Service::where('type','=',$id)->get();
        return $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lname=strtolower($request['name']);
        $sid=$request['service_id'];
        $service=Service::whereId($sid)->first();
        $daftar=$request['daftar'];
        $ubaya=$request['ubaya'];
        $umum=$request['umum'];
        $min=$request['min'];
        $service=Service::where('id',$sid)->first();
        if (Level::where([['name', '=', $lname],['service_id',$sid]])->exists()) 
        { 
            return back()->withInput()->with('status', 'Layanan '.strtoupper($service->name).' Level '.strtoupper($lname).' Sudah Ada!');
        }
        else
        {
            $level = new level();
            $level->service_id=$sid;
            $level->name=$lname;
            $level->harga_daftar=$daftar;
            $level->harga_ubaya=$ubaya;
            $level->harga_umum=$umum;
            $level->minimal_customer=$min;
            $level->save();
        }
        
        return Redirect('/admin/service/'.$service->type)->with('status', 'Layanan '.strtoupper($service->name).' Level '.strtoupper($lname).' Berhasil ditambahkan!');
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
        $tampiledit=Level::whereId($id)->first();
        //return $tampiledit;
        return view('service.editlevel',compact('tampiledit'));
    }



    public function update(Request $request)
    {
        $this->validate($request, [
            'ubaya' => 'required|numeric',
            'umum' => 'required|numeric',
            'daftar' => 'required|numeric',
            'min' => 'required|numeric|min:1'
        ]);
        $id=$request['id'];

        $lname=strtolower($request['name']);
        $daftar=$request['daftar'];
        $ubaya=$request['ubaya'];
        $umum=$request['umum'];
        $min=$request['min'];
        $level=Level::whereId($id)->first();
            $level->name=$lname;
            $level->harga_daftar=$daftar;
            $level->harga_ubaya=$ubaya;
            $level->harga_umum=$umum;
            $level->minimal_customer=$min;
        $level->update();
        return redirect('admin/service/language');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $level=Level::whereId($id)->first();
        Level::destroy($id);
        return back()->with('status', 'Bahasa '.strtoupper($request['service']).' Level '.strtoupper($level->name).' Berhasil dihapus!!');;
    }
}
