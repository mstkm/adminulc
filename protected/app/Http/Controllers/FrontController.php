<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Product;
use App\User;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $tampilkan = Post::where('slug_judul', $slug)->firstorFail();
        return view('post.tampil')->with('tampilkan', $tampilkan);
    }  
    public function showKursus($slug)
    {
       $tampilkan = Product::where('slug_nama', $slug)->firstorFail();
        return view('product.tampil')->with('tampilkan', $tampilkan);
    }

    public function services(){
        $datas = Product::orderBy('created_at', 'ASC')->GET();
        return view('front.service')->with('datas', $datas);
    }
    public function contacts(){
        return view('front.contact');
    }
   
    public function index()
    {
        $datas = Post::orderBy('created_at', 'DESC')->paginate(4);
        return view('front.index')->with('datas', $datas);
    }

    public function news()
    {
        $datas = Post::orderBy('created_at', 'DESC')->paginate(9);
        return view('front.news')->with('datas', $datas);
    }    
    public function abouts()
    {
        $datas = User::where('admin', 'dosen')->get();
        return view('front.about')->with('datas', $datas);
    }
}
 