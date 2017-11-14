<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = \DB::table('posts')->select('posts.id','posts.judul','posts.isi','posts.slug_judul','users.name')->join('users','posts.user_id','=','users.id')->orderBy('posts.created_at', 'DESC')->paginate(10);
        return view('post.index')->with('datas', $datas);
       
    }
    public function add()
    {
        return view('post.add');
    }
    
     public function store(Request $request)
    {
        
        $tambah = new Post();
        $tambah->judul = $request->get('judul');
        //Judul kita jadikan slug

        $tambah->slug_judul = substr($request->get('nama'),0,20);
        $isinl=$request->get('isi');
        $tambah->isi = $isinl;
        $tambah->user_id = $request->get('user_id');

        if($request->file('gambar') == "")
        {
            $tambah->gambar = '';
        } 
        else
        {
        $file       = $request->file('gambar');
        $filename = uniqid('img_'). '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->move("images/post/", $filename);
            $tambah->gambar = $filename;
        }

        $tambah->save();
        return redirect()->to('/admin/post');
    }    
 
    public function edit($id)
    {
        $tampiledit = Post::where('id', $id)->first();
        return view('post.edit')->with('tampiledit', $tampiledit);
    }
    

    public function update(Request $request, $id)
    {
        $update = Post::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->slug_nama =  substr($request->get('nama'),0,20);
        $update->keterangan = $request['keterangan'];

        if($request->file('gambar') == "")
        {
            $update->gambar = $update->gambar;
        } 
        else
        {
        $file       = $request->file('gambar');
        $filename = uniqid('img_'). '.' . $file->getClientOriginalExtension();
            $request->file('gambar')->move("images/post/", $filename);
            $update->gambar = $filename;
        }
        
        $update->update();
        return redirect()->to('/admin/post');
    }

    public function destroy($id)
    {       
        Post::destroy($id);
        return redirect('/admin/post');
    } 
}
