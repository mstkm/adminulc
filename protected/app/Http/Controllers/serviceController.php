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

class serviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function add()
    {    
        return view('service.add');
    }

    
    public function store(Request $request){
        $name=$request['name'];
        $type=$request['type'];
        if (Service::where([['name', '=', $name],['type',$type]])->exists()) 
        { 
            return back()->with('status', 'Bahasa '.strtoupper($request->name).' Sudah Ada!');
        }
        else
        {
            $service = Service::create($request->all());
            $service->save();
            if($type=='lenguage')
            return Redirect('/admin/service/language')->with('status', 'Bahasa '.strtoupper($request->name).' Berhasil ditambahkan!');
            elseif ($type=='preparation') 
            {
                        return Redirect('/admin/service/preparation')->with('status', 'Bahasa '.strtoupper($request->name).' Berhasil ditambahkan!');
            }      
            else
            {
                        return Redirect('/admin/service/test')->with('status', 'Bahasa '.strtoupper($request->name).' Berhasil ditambahkan!');
            }
        }
    }


 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tampiledit = Service::where('id', $id)->first();
        return view('edit')->with('tampiledit', $tampiledit);
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
        $update = Service::where('id', $id)->first();
        $update->judul = $request['judul'];
        $update->slug_judul = $request->get('judul');
        $update->isi = $request['isi'];

        if($request->file('gambar') == "")
        {
            $update->gambar = $update->gambar;
        } 
        else
        {
        $file       = $request->file('gambar');
        $filename = uniqid('img_'). '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->move("images/services/", $filename);
            $update->gambar = $filename;
        }
        
        $update->update();
        return redirect()->to('/admin/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $type=Service::whereId($id)->first();
        Service::destroy($id);
        return redirect('/admin/service/'.$type->type)->with('status', 'Bahasa '.strtoupper($type->name).' Berhasil dihapus!');
    }  

}
